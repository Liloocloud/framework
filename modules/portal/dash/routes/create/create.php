<?php
$ID = null;
if(isset(URL()[3])){
  $ID = explode('=', URL()[3]);
  $ID = (isset($ID[0]) && $ID[0] == 'id')? $ID[1] : null;
}
$Product = false;
if($ID){
  $Product = _get_data_table(TB_ITEMS, ['item_id' => $ID]);
  $Product = (isset($Product[0]))? $Product[0] : false;
  if($Product){
    $Product['item_price'] = number_format($Product['item_price'],2,",",".");
  }else{
    _redirect_url(BASE_ADMIN.'items/create/', true);
  }
}
?>

<div class="uk-container">
    
    <div class="uk-grid-small" uk-grid>

        <!-- Conteúdo -->
        <div class="uk-width-expand">
            <div class="uk-card uk-card-default">
                
                 <!-- HEADER -->
                 <div class="uk-card-header uk-padding-small">
                  <div class="uk-flex uk-flex-between">
                    <?php if($ID): ?> 
                      <h4 class="uk-margin-remove">Editar Produto</h4>
                    <?php else: ?>
                      <h4 class="uk-margin-remove">Novo Produto</h4>
                    <?php endif; ?>
                    <div>
                      <a href="<?= BASE_ADMIN ?>items/create/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Novo</a>
                      <!-- <a href="<?= BASE_ADMIN ?>client-manager/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Clonar</a> -->
                    </div>
                  </div>

                </div>

                <div class="uk-card-body uk-padding-small">
                    <div class="callback-alert"></div>
                    <div class="callback-alert-buttons uk-text-center" style="display: none"><a href="<?= BASE_ADMIN ?>items/create/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Adicionar Novo</a></div>
                    <form data-liloo class="uk-grid-small" uk-grid>                       
                        <?php if($ID): ?>
                          <input type="hidden" name="action" value="item_update">
                        <?php else: ?>
                          <input type="hidden" name="action" value="item_create">
                        <?php endif; ?>               
                        <input type="hidden" name="path" value="modules/items/ajax/Manager">
                        <input type="hidden" name="item_id" value="<?= $ID ?>">                      
                        <input type="hidden" name="item_account_id" value="<?= $_SESSION['account_id'] ?>">

                        <div class="uk-width-1-1">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-3@m">
                                    <label class="uk-form-label">Código</label>
                                    <div class="uk-form-controls">
                                        <input name="item_code" class="uk-input" type="text" value="<?= (isset($Product['item_code']))? $Product['item_code']: '' ?>" autofocus required>
                                    </div>
                                </div>
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">Nome</label>
                                    <div class="uk-form-controls">
                                        <input name="item_title" class="uk-input" type="text" value="<?= (isset($Product['item_title']))? $Product['item_title']: '' ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="uk-grid-small" uk-grid>
                              
                            
                              <div class="uk-width-1-3@m">
                                  <label class="uk-form-label">Marca</label>
                                  <input name="item_brand" class="uk-input" type="text" value="<?= (isset($Product['item_brand']))? $Product['item_brand']: '' ?>">
                              </div>
                              
                              <!-- Categorias -->
                              <div class="uk-width-1-3@m">
                                  <label class="uk-form-label">Categoria</label>
                                  <div class="uk-form-controls">
                                      <select name="item_category" id="item_category" class="uk-select" onchange="selectSubCateg()" required>
                                        <?php
                                        $Categ = _get_data_full("SELECT `tax_id`,`tax_name` FROM `".TB_TAXONOMIES."` WHERE `tax_inner_id` =:a","a=categ");
                                        $Categ = (isset($Categ))? $Categ : false;
                                        $Item = explode(',', $Product['item_category']);
                                        if($Categ && $ID){
                                          foreach ($Categ as $key => $val) {
                                            if($Item[0] == $val['tax_id']){
                                              echo "<option value=\"{$val['tax_id']}\" selected=\"selected\">{$val['tax_name']}</option>";
                                            }else{
                                              echo "<option value=\"{$val['tax_id']}\">{$val['tax_name']}</option>";
                                            }
                                          }                                     
                                        }else{
                                          echo '<option value="" selected="selected">Selecione...</option>';
                                          foreach ($Categ as $key => $val) {
                                            echo "<option value=\"{$val['tax_id']}\">{$val['tax_name']}</option>";
                                          }
                                        }
                                        ?>                            
                                      </select>
                                  </div>
                              </div>

                              <!-- Subcategoria -->
                              <div class="uk-width-1-3@m">
                                  <label class="uk-form-label">Subcategoria</label>
                                  <div class="uk-form-controls">                            
                                      <select name="item_subcategory" id="item_subcategory" class="uk-select">                       
                                        <?php
                                          $Item = explode(',', $Product['item_category']);
                                          $SubCateg = _get_data_full("SELECT `tax_id`,`tax_name` FROM `".TB_TAXONOMIES."` WHERE `tax_inner_id` =:a","a={$Item[0]}");
                                          if(!empty($SubCateg) && $ID){
                                            foreach ($SubCateg as $key => $val) {
                                              if($Item[1] == $val['tax_id']){
                                                echo "<option value=\"{$val['tax_id']}\" selected=\"selected\">{$val['tax_name']}</option>";
                                              }else{
                                                echo "<option value=\"{$val['tax_id']}\">{$val['tax_name']}</option>";
                                              }
                                            }                                     
                                          }else{
                                            echo '<option value="" selected="selected">Selecione a categoria...</option>';
                                          }
                                        ?> 
                                      </select>                                      
                                  </div>
                              </div>


                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-3@s">
                                    <label class="uk-form-label">Quantidade em Estoque</label>
                                    <div class="uk-form-controls">
                                        <input name="item_amount" class="uk-input" type="number" value="<?= (isset($Product['item_amount']))? $Product['item_amount']: '' ?>" placeholder="0">
                                    </div>
                                </div>
                                <div class="uk-width-1-3@s">
                                    <label class="uk-form-label">Pacote com:</label>
                                    <div class="uk-form-controls">
                                        <input name="item_package" class="uk-input" type="text" value="<?= (isset($Product['item_package']))? $Product['item_package']: '' ?>">
                                    </div>
                                </div>
                                <div class="uk-width-1-3@s">
                                    <label class="uk-form-label">Preço de Venda</label>
                                    <div class="uk-form-controls uk-flex">
                                      <div class="liloo-currency">R$</div><input name="item_price" class="uk-input" type="text" liloo-mask-real value="<?= (isset($Product['item_price']))? $Product['item_price']: '' ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <label class="uk-form-label">Observações</label>
                            <div class="uk-form-controls">
                                <textarea name="item_description" class="uk-textarea"><?= (isset($Product['item_description']))? $Product['item_description']: '' ?></textarea>
                            </div>
                        </div>
                     
                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>

                            <?php if($ID): ?>
                              <button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                            <?php else: ?>
                              <button type="submit" class="uk-button uk-button-primary uk-button-small">Adicionar</button>
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
                    <h4 class="uk-margin-remove">Mais recentes</h4>
                    <div>
                      <a href="<?= BASE_ADMIN ?>items/manager/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-share"></i> Gerenciar</a>
                    </div>
                  </div>
                </div>
                
                <div>
                  <table class="uk-table uk-table-striped uk-margin-remove">
                    <tbody>
                      <?php
                      $Last = _get_data_full("SELECT `item_code`,`item_title` FROM `".TB_ITEMS."` ORDER BY `item_id` DESC LIMIT 5");
                      $Last = (isset($Last))? $Last : false;
                      if($Last){
                          foreach ($Last as $list) {
                            echo "<tr>
                                      <td class='uk-text-xsmall'>
                                        <b>Cód:</b> {$list['item_code']}<br>
                                        <b>Nome:</b> {$list['item_title']}                    
                                      </td>
                                  </tr>";
                          }
                      }else{
                          echo "<tr><td class='uk-text-small'>Nenhum produto cadastrado</td></tr>";
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
  function selectSubCateg(){
    let value = $('select[name="item_category"]').val()
    lilooJS.Event({
        action: 'select_subcateg_per_categ',
        path: 'modules/items/ajax/Manager',
        data: value
    })
    // data: id+','+value                                          
  }
</script>