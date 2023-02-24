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
     * CHECA SE JÁ EXISTE O CÓDGO, SENÃO SALVA
     */
    case 'check_order_code':
        if(!empty($Sync['data'])){
            $Code = _get_data_full("SELECT `order_code` FROM `".TB_ORDERS."` WHERE `order_code` =:a", "a={$Sync['data']}");
            $Code = (isset($Code) && !empty($Code))? true : false;
            if($Code){
                $JSON['notify'] = ["Já existe um pedido com o Código {$Sync['data']}", 'error'];
                $JSON['callback'] = '<script>';
                $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
                $JSON['callback'].= '$("input[name=\'order_code\']").addClass("uk-form-danger");';
                $JSON['callback'].= '</script>';
                break;
            }
        }
        if(empty($Sync['data'])){
            $JSON['notify'] = ["O Campo Código obrigatótio", 'error'];
            $JSON['callback'] = '<script>';
            $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
            $JSON['callback'].= '$("input[name=\'order_code\']").addClass("uk-form-danger");';
            $JSON['callback'].= '</script>';
            break;
        }
        $JSON['callback'] = '<script>';
        $JSON['callback'].= '$("input[name=\'order_code\']").removeClass("uk-form-danger");';
        $JSON['callback'].= '</script>';
        break;

    /****************************************************************************
     * CHECAGEM DO CLIENTE
     */
    case 'check_order_client':
        if(!empty($Sync['data'])){
            $Client = explode(',', $Sync['data']);
            if(!isset($Client[1])){
                $JSON['notify'] = ["Refaça a busca do cliente por favor", 'error'];
                $JSON['callback'] = '<script>';
                $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
                $JSON['callback'].= '$("input[name=\'order_client_code\']").addClass("uk-form-danger");';
                $JSON['callback'].= '</script>';
                break;
            }
        }
        if(empty($Sync['data'])){
            $JSON['notify'] = ["O Campo Nome do Cliente é obrigatótio", 'error'];
            $JSON['callback'] = '<script>';
            $JSON['callback'].= '$("input[name=\'order_client_code\']").removeClass("uk-form-danger");';
            $JSON['callback'].= '$("input[name=\'order_client_code\']").addClass("uk-form-danger");';
            $JSON['callback'].= '</script>';
            break;
        }
        $JSON['callback'] = '<script>';
        $JSON['callback'].= '$("input[name=\'order_client_code\']").removeClass("uk-form-danger");';
        $JSON['callback'].= '</script>';
        break;
        


    /****************************************************************************
     * CASDASTRANDO PEDIDO
     */
    case 'order_create':
        if(isset($Sync)){
            $Sync['order_account_id']       = (int) $Sync['order_account_id'];
            $Sync['order_price_discount']   = (float) $Sync['order_price_discount'];       
            
            // Verifia se o código já existe
            if(!empty($Sync['order_code'])){
                $Sync['order_code'] = trim(str_replace(' ', '', $Sync['order_code']));
                $Code = _get_data_full("SELECT `order_code` FROM `".TB_ORDERS."` WHERE `order_code` =:a", "a={$Sync['order_code']}");
                $Code = (isset($Code) && !empty($Code))? true : false;
                if($Code){
                    $JSON['notify'] = ["Já existe um pedido com o Código {$Sync['order_code']}", 'error'];
                    $JSON['callback'] = '<script>';
                    $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
                    $JSON['callback'].= '$("input[name=\'order_code\']").addClass("uk-form-danger");';
                    $JSON['callback'].= '</script>';
                    break;
                }
            }else{
                $JSON['notify'] = ["O Campo Código obrigatótio", 'error'];
                $JSON['callback'] = '<script>';
                $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
                $JSON['callback'].= '$("input[name=\'order_code\']").addClass("uk-form-danger");';
                $JSON['callback'].= '</script>';
                break;
            }
            $JSON['callback'] = '<script>';
            $JSON['callback'].= '$("input[name=\'order_code\']").removeClass("uk-form-danger");';
            $JSON['callback'].= '</script>';
            
            // Chaca se o Nome do Cliente e o código estão correto e existem
            // Busca o ID o clienta para alimentar a var order_account_id 
            if(!empty($Sync['order_client_code'])){
            
                $Client =  explode(',', $Sync['order_client_code']);
                if(isset($Client[1])){
                    $Client[1] = str_replace(' Cód - ', '', $Client[1]);

                    $Get = _get_data_full("SELECT `client_id`,`client_code` FROM `".TB_CLIENTS."` WHERE `client_code` =:a", "a={$Client[1]}");
                    $Get = (isset($Get) && !empty($Get))? $Get[0] : false;
                    if($Get){
                        $Sync['order_client_id'] = (int) $Get['client_id'];
                        $Sync['order_client_code'] = $Get['client_code'];
                    }else{
                        $Sync['order_client_id'] = null;
                        $Sync['order_client_code'] = null;
                    }
                }else{
                    $JSON['notify'] = ["Refaça a busca do cliente por favor", 'error'];
                    $JSON['callback'] = '<script>';
                    $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
                    $JSON['callback'].= '$("input[name=\'order_client_code\']").addClass("uk-form-danger");';
                    $JSON['callback'].= '</script>';
                    break;
                }
            }else{
                $JSON['notify'] = ["O Campo Nome do Cliente é obrigatótio", 'error'];
                $JSON['callback'] = '<script>';
                $JSON['callback'].= '$("input[name=\'order_client_code\']").removeClass("uk-form-danger");';
                $JSON['callback'].= '$("input[name=\'order_client_code\']").addClass("uk-form-danger");';
                $JSON['callback'].= '</script>';
                break;
            }
            $JSON['callback'] = '<script>';
            $JSON['callback'].= '$("input[name=\'order_client_code\']").removeClass("uk-form-danger");';
            $JSON['callback'].= '</script>';

            // Cadastra o pedido e libera a lista de items
            // $Sync['order_validity'] = date('Y-m-d', strtotime($date));
            if(isset($Sync['order_id'])) unset($Sync['order_id']);
            // var_dump($Sync);        
            $Set = _set_data_table(TB_ORDERS, $Sync);
            if($Set){
                $JSON['notify'] = ['Pedido Iniciado. Agora preencha a lista de produtos','success'];
            }else{
                $JSON['notify'] = ['Não foi possível inicar pedido Iniciado. Tente novamente','error'];                
            }
        }
        break;
    

}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}