<?php
/**
 * Ajax do Contato pelo Whatsapp
 * @copyright Felipe Oliveira - 17.11.2021
 * @version 1.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../../../_Kernel/_Sync.inout.php";
header('Access-Control-Allow-Origin: *');

switch ($Action) {

    /****************************************************************************
     * ATUALIZANDO ITEM V.1 BÁSICO
     */
    case 'item_update':
        if(isset($Sync)){
            $Sync['item_account_id'] = (int) $Sync['item_account_id'];
            $Sync['item_amount'] = (int) $Sync['item_amount'];
            $Sync['item_price'] = (float) str_replace(',','.', $Sync['item_price']);
            $Sync['item_category'] = $Sync['item_subcategory'];
            $ID = $Sync['item_id'];
            unset($Sync['item_id'], $Sync['item_subcategory']);
            usleep(250000);
            $Up = _up_data_table(TB_ITEMS, [
                'where' => ['item_id' => $ID],
                'values' => $Sync
            ]);             
            if($Up){
                $JSON['notify'] = ["Item atualizado com sucesso!", 'success'];
            }else{
                $JSON['notify'] = ["Não foi possível atualizar item. Tente novamente", 'error'];
            }
        }else{
            $JSON['notify'] = ["Erro de Conexão: Tente Novamente", 'error'];
        }       
        break;

    

    /****************************************************************************
     * CADASTRANDO NOVO ITEM V.1 BÁSICO
     */
    case 'item_create':       
        if(isset($Sync)){             
            $Sync['item_code'] = str_replace(' ', '', $Sync['item_code']);
            $Sync['item_amount'] = (int) $Sync['item_amount'];
            $Sync['item_price'] = (float) str_replace(',','.', $Sync['item_price']);
            $Sync['item_category'] = $Sync['item_subcategory'];
            if(isset($Sync['item_id'])) unset($Sync['item_id'], $Sync['item_subcategory']);

            $Code = _get_data_full("SELECT `item_code` FROM `".TB_ITEMS."` WHERE `item_code` =:a", "a={$Sync['item_code']}");
            $Code = (isset($Code) && !empty($Code))? true : false;
            if($Code){
                $JSON['notify'] = ["Já existe um item com o Código {$Sync['item_code']}", 'error'];
                $JSON['callback'] = '<script>';
                $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
                $JSON['callback'].= '$("input[name=\'item_code\']").addClass("uk-form-danger").focus();';
                $JSON['callback'].= '</script>';
                break;
            }

            $Add = _set_data_table(TB_ITEMS, $Sync);
            if($Add){
                // $JSON['notify'] = ['Item adicionado com sucesso', 'success'];
                // $JSON['callback'] = _redirect_url(BASE_ADMIN.'product-manager/&m=Item adicionado com sucesso&t=success');
                $JSON['callback'] = '<script>';
                $JSON['callback'].= '$("[data-liloo]").hide();';
                $JSON['callback'].= '$(".callback-alert-buttons").show();';
                $JSON['callback'].= '</script>';
                $JSON['array'][0] = [ 
                        'element' => '.callback-alert',
                        'content' => _uikit_alert("Item {$Sync['item_code']} adicionado com sucesso!", 'success', false)
                ];
            }else{
                $JSON['notify'] = ['Não foi possível adicionar item. Tente novamente', 'error'];
            }
        }else{
            $JSON['notify'] = ['Não foi possível adicionar item. Tente novamente', 'error'];
        }
        break;

    /****************************************************************************
	 * DELETANDO ITEM PÓS CONFIRMAÇÃO POR DROPDOWN
	 */
	case 'item_delete':
		if(isset($Sync['data'])){
		    $Del = _del_data_table(TB_ITEMS, ['item_id' => $Sync['data']]);	
			if($Del){
                $JSON['notify'] = ["Item excluido com sucesso!", 'success'];
                $JSON['callback'] = '<script>';
                // $JSON['callback'].= '$(\'[liloo-loader]\').show();';
                $JSON['callback'].= 'setInterval(function(){ document.location.reload(true); }, 2000);';
                $JSON['callback'].= '</script>';
            }else{
                $JSON['notify'] = ["Não foi possível excluir o Item", 'error']; 
            }            
        }
		break;

    /****************************************************************************
     * SALVA A MENSAGEM E ENVIA PARA O WHATSAPP PELA URL NA PÁGINA 
     * OBRIGADO DO TEMA
     */
    case 'send_message_whatsapp':      
        if(isset($Sync)){
            $Sync['contact_message'] = $Sync['contact_message'].' '.$Sync['company'];
            $Sync['contact_channel'] = 'Whatsapp';
            $Sync['contact_ip'] = _get_client_ip();
            unset($Sync['company']);
            $Set = _set_data_table(TB_CONTACTS, $Sync);
            if($Set){
                $JSON['callback'] = "
                    <script>window.open(
                        '".BASE.'obrigado/?con=yes&msg='.$Sync['contact_message']."',
                        '_blank'
                    );</script>
                    ";
            }else{
                $JSON['notify'] = ['Erro: Tente novamente', 'error'];
            }
        }else{
            $JSON['notify'] = ['Erro: Tente novamente', 'error'];
        }
        break;

    /****************************************************************************
     * SALVA A MENSAGEM E ENVIA PARA O E-MAIL
     */
    case 'send_form_email':      
        if(isset($Sync)){
            $Sync['contact_channel'] = 'form';
            $Sync['contact_ip'] = _get_client_ip();
            $Set = _set_data_table(TB_CONTACTS, $Sync);
            if($Set){
                $JSON['callback'] = '<script>$(".callback-alert").show()</script>';
                $JSON['array'][0] = [ 
                    'element' => '.callback-alert',
                    'content' => _uikit_alert('Mensagem enviado com sucesso! Entraremos em contato em breve. Obrigado!', 'success', false)
                ];
                // $JSON['notify'] = ['Mensagem enviado com sucesso! Entraremos em contato em breve. Obrigado!', 'success'];

                // Envio do e-mail
                $Message = "<h3><b>Nome:</b> ".$Sync['contact_name']."</h3>\n\r";
                $Message.= "<p><b>E-mail:</b> ".$Sync['contact_email']."</p>\n\r";
                $Message.= "<p><b>Assunto:</b> ".$Sync['contact_subject']."</p>\n\r";
                $Message.= "<p><b>Telefone:</b> ".$Sync['contact_phone']."</p>\n\r";
                $Message.= "<p><b>Mensagem:</b> ".$Sync['contact_message']."</p><hr>\n\r";
                $Message.= "<p><b>Data de envio:</b> ".date("d/m/Y H:i:s")."</p>\n\r";
                $Message.= "<p><b>IP:</b> ".$Sync['contact_ip']."</p>\n\r";    

                $Email = new Email\Email();
                $Email->add(
                    'Fale Conosco - '.$Sync['contact_subject'],
                    $Message,
                    __THEME__['mail_from_name'],
                    __THEME__['mail_from_email']
                );
                $Email->send();
                // if($Email->send()){
                //     $JSON['notify'] = ['Mensagem enviado com sucesso!', 'success'];
                //     // sleep(2);
                //     $JSON['callback'] = "
                //         <script>window.open(
                //             '".BASE."obrigado/?con=yes',
                //             '_blank'
                //         );</script>
                //         ";
                // }
                // else{
                //     $JSON['notify'] = ['Não foi possível enviar mensagem. Tente novamente!', 'error'];
                // }

            }else{
                $JSON['notify'] = ['Erro: Tente novamente', 'error'];
            }
        }else{
            $JSON['notify'] = ['Erro: Tente novamente', 'error'];
        }
        break;

    /****************************************************************************
     * CADASTRANDO NOVA CATEGORIA EM TAXONOMIES
     */
    case 'create_taxonomy_categ':
        if(isset($Sync['data'])){
            $Set = _set_data_table(TB_TAXONOMIES, [
                'tax_meta' => 'items',
                'tax_name' => (string) trim($Sync['data'])
            ]);
            if($Set){
                $JSON['notify'] = ['Categoria adicionada com sucesso', 'success'];
                $JSON['callback'] = '<script>setInterval(function(){document.location.reload(true)}, 1500)</script>';
            }else{
                $JSON['notify'] = ['Não possível adicionar Categoria', 'error']; 
            }
        }else{
            $JSON['notify'] = ["Erro de Conexão: Tente Novamente", 'error']; 
        }
        break;


    /****************************************************************************
     * CADASTRANDO NOVA SUBCATEGORIA EM TAXONOMIES
     */
    case 'create_taxonomy_subcat':
        if(isset($Sync)){
            $Sync = explode(',', $Sync['data']);
            $Set = _set_data_table(TB_TAXONOMIES, [
                'tax_meta' => 'items',
                'tax_inner_id' => $Sync[0],
                'tax_name' => $Sync[1]
            ]);
            if($Set){
                $JSON['notify'] = ['Subcategoria adicionada com sucesso', 'success'];
                $JSON['callback'] = '<script>setInterval(function(){document.location.reload(true)}, 1500)</script>';
            }else{
                $JSON['notify'] = ['Não possível adicionar Subcategoria', 'error']; 
            }
        }else{
            $JSON['notify'] = ["Erro de Conexão: Tente Novamente", 'error'];
        }       
        break;

    /****************************************************************************
     * ATUALIZAR SUBCATEGORIA EM TAXONOMIES
     */
    case 'update_taxonomy_subcat':
        if(isset($Sync['data'])){
            $Sync = explode(',', $Sync['data']);
            usleep(250000);
            $Up = _up_data_table(TB_TAXONOMIES, [
                'where' => ['tax_id' => $Sync[0]],
                'values' => ['tax_name' => $Sync[1]]
            ]);             
            if($Up){
                $JSON['notify'] = ["Subcategoria atualizada com sucesso!", 'success'];
                $JSON['callback'] = '<script>setInterval(function(){document.location.reload(true)}, 1500)</script>';
            }else{
                $JSON['notify'] = ["Não foi possível atualizar subcategoria. Tente novamente", 'error'];
            }
        }else{
            $JSON['notify'] = ["Erro de Conexão: Tente Novamente", 'error'];
        }
        break;


    /****************************************************************************
     * EXCLUIR NOVA SUBCATEGORIA EM TAXONOMIES
     */
    case 'delete_taxonomy_subcat':
        usleep(950000);
        if($Sync['data']){
            $Del = _del_data_table(TB_TAXONOMIES, ['tax_id' => (int) $Sync['data']]);
            if($Del){
                $JSON['notify'] = ['A subcategoria excluída com sucesso', 'success'];
                $JSON['callback'] = '<script>setInterval(function(){document.location.reload(true)}, 1500)</script>';
            }else{
                $JSON['notify'] = ['Não possível excluir a Subcategoria', 'error'];
            }
        }else{
            $JSON['notify'] = ["Erro de Conexão: Tente Novamente", 'error']; 
        }
        break;

    /****************************************************************************
     * CATEG SELECT -> SUBCATEG
     */
    case 'select_subcateg_per_categ':
        $JSON['callback'] = '<script>';
        $JSON['callback'].= '$("#item_category").removeClass("uk-form-danger");';
        $JSON['callback'].= '</script>';
        if(isset($Sync['data'])){
            $SubCateg = _get_data_full("SELECT `tax_id`,`tax_name` FROM `".TB_TAXONOMIES."` WHERE `tax_inner_id` =:a","a={$Sync['data']}");
            $SubCateg = (isset($SubCateg))? $SubCateg : false;
            if($SubCateg){
                $Opt = '';
                foreach ($SubCateg as $val) {
                    $Opt.= "<option value=\"{$Sync['data']},{$val['tax_id']}\">{$val['tax_name']}</option>";
                }
                $JSON['array'][0] = [ 
                    'element' => '#item_subcategory',
                    'content' => $Opt
                ];
            }else{
                $JSON['callback'] = '<script>$("#item_category").addClass("uk-form-danger").focus();</script>';
            }
        }else{
            $JSON['notify'] = ["Erro de Conexão: Tente Novamente", 'error'];
        }
        break;


}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}