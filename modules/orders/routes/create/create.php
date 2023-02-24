<?php
// _tpl_fill(ROOT_ADMIN_ROUTES.'order-create/order-create.tpl', $Extra, '');
$ID = null;
$Order = false;
if(isset(URL()[3])){
  $ID = explode('=', URL()[3]);
  $ID = (isset($ID[0]) && $ID[0] == 'id')? $ID[1] : null;
}
if($ID){
  $Order = _get_data_table(TB_ORDERS, ['order_id' => $ID]);
  $Order = (isset($Order[0]))? $Order[0] : false;
  if($Order){
    $Order['order_price_total'] = number_format($Order['order_price_total'],2,",",".");
    $Order['order_price_discount'] = number_format($Order['order_price_discount'],2,",",".");
  }
}
if($ID){
  $JOIN = _get_data_full("
      SELECT * FROM `".TB_ORDERS."` 
      INNER JOIN `".TB_CLIENTS."` 
      ON `order_client_code` = `client_code` 
      WHERE `client_account_id`=:a 
      AND `order_id`=:b"
      ,"a={$_SESSION['account_id']}&b={$ID}");
  $JOIN = (isset($JOIN[0]))? $JOIN[0] : false;  
}
$Clients = _get_data_full("SELECT `client_id`,`client_code`,`client_name` FROM `".TB_CLIENTS."` WHERE `client_account_id`=:a","a={$_SESSION['account_id']}");
$Clients = (isset($Clients))? $Clients : false;
function lilooFormatDate($date){
  return date('Y-m-d', strtotime($date));
}
?>
<div class="uk-container">
    <div class="uk-grid-small" uk-grid>

        <!-- Conteúdo -->
        <div class="uk-width-expand@m">
            <div class="uk-card uk-card-default">
                
                 <!-- HEADER -->
                 <div class="uk-card-header uk-padding-small">
                  <div class="uk-flex uk-flex-between">
                    <?php if($ID): ?> 
                      <h4 class="uk-margin-remove">Editar Pedido</h4>
                    <?php else: ?>
                      <h4 class="uk-margin-remove">Novo Pedido</h4>
                    <?php endif; ?>
                    <div>
                      <a href="<?= BASE_ADMIN ?>orders/create/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Novo</a>
                      <!-- <a href="<?= BASE_ADMIN ?>client-manager/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Clonar</a> -->
                    </div>
                  </div>

                </div>

                <div class="uk-card-body uk-padding-small">
                    <div class="callback-alert"></div>
                    <div class="callback-alert-buttons uk-text-center" style="display: none"><a href="<?= BASE_ADMIN ?>orders/create/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Adicionar Novo</a></div>
                    <form data-liloo class="uk-grid-small" uk-grid autocomplete="off">                       
                        <?php if($ID): ?>
                          <input type="hidden" name="action" value="order_update">
                          <input type="hidden" name="path" value="modules/orders/ajax/OrderCreate">
                        <?php else: ?>
                          <input type="hidden" name="action" value="order_create">
                          <input type="hidden" name="path" value="modules/orders/ajax/OrderCreate">
                          <input type="hidden" name="order_id" value="<?= $ID ?>">                      
                        <?php endif; ?>               
                        <input type="hidden" name="order_account_id" value="<?= $_SESSION['account_id'] ?>">

                            <div class="uk-width-1-1">
                              <div class="uk-grid-small" uk-grid>
                              
                                <!-- CÓDIDO DO PEDIDO -->
                                <div class="uk-width-1-3@m">
                                    <label class="uk-form-label">Código do Pedido</label>
                                    <div class="uk-form-controls">
                                        <input name="order_code" onblur="Order.Code()" class="uk-input" type="text" value="<?= (isset($Order['order_code']))? $Order['order_code']: '' ?>" autofocus required <?= ($ID)? 'disabled' : '' ?>>
                                    </div>
                                </div>
                                
                                <!-- NOME DO CLIENTE -->
                                <div class="uk-width-expand@m">
                                  <label class="uk-form-label">Buscar cliente</label>
                                  <div class="uk-form-controls">
                                      <div class="uk-form-controls autocomplete">
                                        <input id="myInput" class="uk-input" onblur="Order.Client()" type="text" name="order_client_code" value="<?= (isset($JOIN['client_name']))? $JOIN['client_name'].', Cód - '.$JOIN['client_code'] : '' ?>" required autocomplete="off">
                                      </div>
                                      <?php
                                      if($Clients){
                                        $ArrClients = '[';
                                        foreach ($Clients as $Cli) {
                                          $ArrClients.= "\"".$Cli['client_name'].", Cód - {$Cli['client_code']}\",";
                                        }
                                        $ArrClients = substr($ArrClients, 0, -1);
                                        $ArrClients.= ']';
                                        echo "<script>lilooUX.AutoComplete(\"#myInput\",  {$ArrClients})</script>";
                                      }else{
                                        $ArrClients = [];
                                      }
                                      ?>
                                  </div>
                                </div>

                              </div>
                            </div>

                            <div class="uk-width-1-1">
                              <div class="uk-grid-small" uk-grid>
                                
                                <!-- FORMA DE PAGAMENTO -->
                                <div class="uk-width-1-3@m">
                                    <label class="uk-form-label">Forma de Pagamento</label>
                                    <div class="uk-form-controls">
                                        <select name="order_pay_method" id="order_category" class="uk-select" onchange="selectSubCateg()">
                                          <?php
                                          $MethodPayment = [
                                              'Boleto à vista',
                                              'Parcelamento no Boleto (Carne)',
                                              'Cartão de Débito',
                                              'Cartão de Crédito',
                                              'Transferência Bancária',
                                              'Pix',
                                              'Em dinheiro na entrega'
                                          ];
                                          if($JOIN['order_pay_method']){
                                            foreach ($MethodPayment as $Method) {
                                              if($Method == $JOIN['order_pay_method']){
                                                echo "<option value=\"{$Method}\" selected=\"selected\">{$Method}</option>";
                                              }else{
                                                echo "<option value=\"{$Method}\">{$Method}</option>";
                                              }
                                            }                                     
                                          }else{
                                            echo '<option value="" selected="selected">Selecione...</option>';
                                            foreach ($MethodPayment as $Method) {
                                              echo "<option value=\"{$Method}\">{$Method}</option>";
                                            }
                                          }
                                          ?>                                                             
                                        </select>
                                    </div>
                                </div>

                                <!-- CONDIÇÕES DE PAGAMENTO -->
                                <div class="uk-width-1-3@m">
                                    <label class="uk-form-label">Condições de Pagamento</label>
                                    <input name="order_pay_conditions" class="uk-input" type="text" value="<?= (isset($JOIN['order_pay_conditions']))? $JOIN['order_pay_conditions']: '' ?>">
                                </div>

                                <!-- DETALHES DA ENTREGA -->
                                <div class="uk-width-1-3@m">
                                    <label class="uk-form-label">Detalhes de Entrega</label>
                                    <input name="order_delivery" class="uk-input" type="text" value="<?= (isset($JOIN['order_delivery']))? $JOIN['order_delivery']: '' ?>">
                                </div>
                                
                              </div>
                            </div>

                            <div class="uk-width-1-1">
                              <div class="uk-grid-small" uk-grid>
                                
                                <!-- PERCENTUAL DE DESCONTO -->
                                <div class="uk-width-1-3@m">
                                    <label class="uk-form-label">Desconte de: (%)</label>
                                    <input name="order_price_discount" class="uk-input" type="text" value="<?= (isset($JOIN['order_price_discount']))? $JOIN['order_price_discount']: '' ?>">
                                </div>

                                <!-- VALIDADE DO PEDIDO -->
                                <div class="uk-width-1-3@m">
                                    <label class="uk-form-label">Valido até:</label>
                                    <input name="order_validity" class="uk-input" type="date" value="<?= (isset($JOIN['order_validity']))? lilooFormatDate($JOIN['order_validity']) : '' ?>">
                                </div>

                                <!-- STATUS DO PEDIDO -->
                                <div class="uk-width-1-3@m">
                                    <label class="uk-form-label">Status do Pedido</label>
                                    <select name="order_status" id="order_category" class="uk-select">
                                          <?php
                                          $StatusItems = [
                                              'Pedido Finalizado',
                                              'Proto para Entregar',
                                              'Em Separação no Estoque',
                                              'Pendente',
                                              'Aguardando Pagamento',
                                              'Faturado',
                                              'Entregue ao Cliente'
                                          ];
                                          if($JOIN['order_status']){
                                            foreach ($StatusItems as $Status) {
                                              if($Status == $JOIN['order_status']){
                                                echo "<option value=\"{$Status}\" selected=\"selected\">{$Status}</option>";
                                              }else{
                                                echo "<option value=\"{$Status}\">{$Status}</option>";
                                              }
                                            }                                     
                                          }else{
                                            echo '<option value="" selected="selected">Selecione...</option>';
                                            foreach ($StatusItems as $Status) {
                                              echo "<option value=\"{$Status}\">{$Status}</option>";
                                            }
                                          }
                                          ?>                                                             
                                        </select>
                                </div>
                                
                              </div>
                            </div>

                            <!-- OBSERVAÇÕES -->
                            <div class="uk-width-1-1">
                                <label class="uk-form-label">Observações</label>
                                <div class="uk-form-controls">
                                    <textarea name="order_description" class="uk-textarea"><?= (isset($Order['order_description']))? $Order['order_description']: '' ?></textarea>
                                </div>
                            </div>
                     
                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>

                            <?php if($ID): ?>
                              <button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                            <?php else: ?>
                              <button type="submit" class="uk-button uk-button-primary uk-button-small">Salvar e Continuar</button>
                            <?php endif; ?>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Lateral -->
        <div class="uk-width-1-3@m">
        
            <div class="uk-card uk-card-default">
                
                <div class="uk-card-header uk-padding-small">
                  <div class="uk-flex uk-flex-between">
                    <h4 class="uk-margin-remove">Pedidos recentes</h4>
                    <div>
                      <a href="<?= BASE_ADMIN ?>orders/manager/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-share"></i> Ver todos</a>
                    </div>
                  </div>
                </div>
                
                <div>
                  <table class="uk-table uk-table-striped uk-margin-remove">
                    <tbody>
                      <?php
                      $Last = _get_data_full("SELECT `order_code`,`order_client_id`,`order_price_total` FROM `".TB_ORDERS."` ORDER BY `order_id` DESC LIMIT 5");
                      $Last = (isset($Last))? $Last : false;
                      if($Last){
                          foreach ($Last as $list) {
                            $Client = _get_data_full("SELECT `client_code`,`client_name` FROM `".TB_CLIENTS."` WHERE `client_id` =:a LIMIT 1 ", "a={$list['order_client_id']}");
                            echo "<tr>
                                      <td class='uk-text-xsmall'>
                                        <b>Pedido:</b> {$list['order_code']}<br>
                                        <b>Cliente:</b> {$Client[0]['client_name']}<br>
                                        <b>Cód. Cliente</b> {$Client[0]['client_code']}<br>
                                        <b>Valor:</b> R$ ".number_format($list['order_price_total'],2,",",".")."                    
                                      </td>
                                  </tr>";
                          }
                      }else{
                          echo "<tr><td class='uk-text-small'>Nenhum pedido registrado</td></tr>";
                      }
                      ?>                        
                    </tbody>
                </table>
                </div>
                <div class="uk-card-footer">

                </div>

            </div>
        </div>
    </div>
</div>




<div class="uk-margin-large"></div>

<script>

//   function selectSubCateg(){
//     let value = $('select[name="order_category"]').val()
//     lilooJS.Event({
//         action: 'select_subcateg_per_categ',
//         path: 'modules/orders/ajax/OrderCreate',
//         data: value
//     })
//     // data: id+','+value                                          
//   }
/*
const countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
  */
</script>