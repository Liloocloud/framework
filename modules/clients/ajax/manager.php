<?php
/**
 * Grupos de cases do módulo "Cliente"
 * @copyright Felipe Oliveira - 05.07.2022 - update 16.09.2022
 * @version 2.0.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../../../_Kernel/_Sync.inout.v2.php";
header('Access-Control-Allow-Origin: *');

switch ($Action){

    /****************************************************************************
	 * CRIANDO NOVO CLIENTE
	 */
    case 'create/client':
        $Sync['client_code'] = str_replace(' ', '', $Sync['client_code']);
        if(isset($Sync)){   
            // Verificar se o cliente já existe pelo código 
            $Code = _get_data_full(
                "SELECT `client_code` 
                FROM `".TB_CLIENTS."` 
                WHERE `client_code` =:a 
                AND `client_account_id` =:b", 
                "a={$Sync['client_code']}&b={$_SESSION['account_id']}");
            $Code = (isset($Code) && !empty($Code))? true : false;
            if($Code){
                $JSON = [
                    'bool' => false,
                    'output' => $Sync,
                    'message' => "Já existe um cliente com o Código {$Sync['client_code']}",
                    'reason' => 'error_code_duplicate',
                    'type' => 'error',
                ];
                break;
            }
            // Verificar se o cliente já existe pelo e-mail
            $Email = _get_data_full(
                "SELECT `client_email` 
                FROM `".TB_CLIENTS."` 
                WHERE `client_email` =:a 
                AND `client_account_id` =:b", 
                "a={$Sync['client_email']}&b={$_SESSION['account_id']}");
            $Email = (isset($Email) && !empty($Email))? true : false;
            if($Email){
                $JSON = [
                    'bool' => false,
                    'output' => $Sync,
                    'message' => "Já existe um cliente com esse e-mail nesta conta",
                    'reason' => 'error_email_duplicate_this_account',
                    'type' => 'error',
                ];
                break;
            }
            // Verificar se o cliente já existe pelo document
            $Doc = _get_data_full(
                "SELECT `client_document` 
                FROM `".TB_CLIENTS."` 
                WHERE `client_document` =:a  
                AND `client_account_id` =:b",
                "a={$Sync['client_document']}&b={$_SESSION['account_id']}");
            $Doc = (isset($Doc) && !empty($Doc))? true : false;
            if($Doc){
                $JSON = [
                    'bool' => false,
                    'output' => $Sync,
                    'message' => "Já existe um cliente com esse documento",
                    'reason' => 'error_document_duplicate',
                    'type' => 'error',
                ];
                break;
            }

            $Sync['client_account_id'] = $_SESSION['account_id'];
            $Add = _set_data_table(TB_CLIENTS, $Sync);
            if($Add){
                $JSON = [
                    'bool' => true,
                    'output' => $Sync,
                    'message' => "Cliente adicionado com sucesso",
                    'reason' => 'success_create',
                    'type' => 'success',
                ];
                break;
            }else{
                $JSON = [
                    'bool' => false,
                    'output' => $Sync,
                    'message' => "Não foi possível adicionar cliente. Tente novamente",
                    'reason' => 'error_create',
                    'type' => 'error',
                ];
                break;
            }
        }else{
            $JSON = [
                'bool' => false,
                'output' => $Sync,
                'message' => "Não foi possível adicionar cliente. Tente novamente",
                'reason' => 'error_create',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * UPDATE / ATUALIZANDO CLIENTE
	 */
    case 'update/client/id';
        $ID = $Sync['client_id'];
        unset($Sync['client_id']);

        // var_dump($Sync);
        // break;

        $Up = _up_data_table(TB_CLIENTS, [
            'where' => [ 
                'client_id' => $ID,
                // 'client_code' => $Sync['client_code']
            ],
            'values' => $Sync
        ]);
        if($Up){
            $JSON = [
                'bool' => true,
                'output' => $Sync,
                'message' => "Cliente atualizado com sucesso!",
                'reason' => 'success_update_client',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Não foi possível atualizar cliente",
                'reason' => 'error_update_client',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * DELETE CLIENTE
	 */
    case 'delete/client/id':
        $Del = _del_data_table(TB_CLIENTS, [
            'client_id' => $Sync,
            'client_account_id' => $_SESSION['account_id']
        ]);
        $Del = (isset($Del))? true : false;
        if($Del){
            $JSON = [
                'bool' => true,
                'output' => $Sync,
                'message' => "Cliente excluído com sucesso",
                'reason' => 'success_delete_client_id',
                'type' => 'success',
            ]; 
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Erro ao excluir cliente",
                'reason' => 'error_delete_client_id',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * RETORNA O CLIENTE PELO ID PASSADO
	 */
    case 'get/client/id':
        $Client = _get_data_table(TB_CLIENTS, [ 
            $Sync['fields'][0] => $Sync['id'],
            'client_account_id' => $_SESSION['account_id']
        ]);
        $Client = (isset($Client[0]))? $Client[0] : null;
        if($Client){
            $Client['client_registered'] = format_datetime($Client['client_registered']);
            $JSON = [
                'bool' => true,
                'output' => $Client,
                'message' => "Cliente encontrado com sucesso",
                'reason' => 'success_get_client_id',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Cliente não encontrado",
                'reason' => 'error_get_client_id',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * RETORNA UMA LISTA DE CLIENTES
	 */
    case 'get/clients':
        if($Sync['term'] != null OR !empty($Sync['term'])){
            $fields = "WHERE `client_account_id` = {$_SESSION['account_id']} AND (";
            foreach ($Sync['fields'] as $field) {
                $fields.= " `{$field}` LIKE '%{$Sync['term']}%' OR";
            }
            $fields = substr($fields, 0, -3).")";
        }else{
            $fields = "WHERE `client_account_id` = {$_SESSION['account_id']}";
        }
        // Verificando no banco
        $Get = _get_data_full("
            SELECT * FROM `".TB_CLIENTS."` 
            {$fields} 
            ORDER BY `client_id` DESC 
            LIMIT 5"
        ); 
        if(!empty($Get)){
            $Get = array_reverse($Get);
            $JSON = [
                'bool' => true,
                'output' => $Get,
                'message' => "Busca finalizada",
                'reason' => 'success_get_clients',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Nenhum cliente encontrado. Comece a cadastrar seus clientes!",
                'reason' => 'info_get_clients',
                'type' => 'info',
            ];
        }
    break;

    /****************************************************************************
	 * RETORNA UMA LISTA DE CLIENTES
	 */
    case 'get/last/clients':
        // Verificando no banco
        $Get = _get_data_full("
            SELECT 
            `client_code`,
            `client_name`
            FROM `".TB_CLIENTS."` 
            WHERE `client_account_id` = {$_SESSION['account_id']}
            ORDER BY `client_id` DESC 
            LIMIT 5"
        );
        if(!empty($Get)){
            $Get = array_reverse($Get);
            $JSON = [
                'bool' => true,
                'output' => $Get,
                'message' => "Busca finalizada",
                'reason' => 'success_get_last_clients',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Nenhum cliente encontrado. Comece a cadastrar seus clientes!",
                'reason' => 'error_get_last_clients',
                'type' => 'error',
            ];
        }
    break;

}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}