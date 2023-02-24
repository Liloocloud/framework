<?php
/**
 * Requisição Ajax da rota 'userpage'
 * @copyright Felipe Oliveira - 05.07.2022
 * @version 1.0
 */

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";

switch ($Action){

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
	 * CASE QUE TRABALHA EM CONJUNTO COM O COMPONETE "LIBS/@SEARCHLIST"
     * NESTE CASO COLETANDO UMA LISTA DE CLIENTS
	 */
    case 'get/client/id':
        $Client = _get_data_table(TB_CLIENTS, [ 
            $Sync['fields'][0] => $Sync['id'],
            'client_account_id' => $_SESSION['account_id']
        ]);
        $Client = (isset($Client[0]))? $Client[0] : null;
        if($Client){
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
	 * CASE QUE TRABALHA EM CONJUNTO COM O COMPONETE "LIBS/@SEARCHLIST"
     * NESTE CASO COLETANDO UMA LISTA DE CLIENTS
	 */
    case 'get/clients':
        // Campos Selecionar no fields
        if($Sync['term'] != null OR !empty($Sync['term'])){
            $fields = "WHERE `client_account_id` = {$_SESSION['account_id']}";
            foreach ($Sync['fields'] as $field) {
                $fields.= " `{$field}` LIKE '%{$Sync['term']}%' OR";
            }
            $fields = substr($fields, 0, -3);
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
        $Get = array_reverse($Get);
        if(!empty($Get)){
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
	 * ATUALIZAÇÃO DE CAMPOS DA TABELA TEMPLATE OPTIONS SENDO META=>VALUES 
     * PASSADOS PELO NAME="" DOS CAMPOS. UPDADE GENÉRICO
	 */
    case 'update/meta/values':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_TEMPLATE_OPTIONS, [
                'where' => [ 
                    'opt_account_id' => $_SESSION['account_id'],
                    'opt_meta' => $key
                ],
                'values' => [
                    'opt_values' => $value
                ]
            ]);
            if($Up){
                $JSON = [
                    'bool' => true,
                    'output' => null,
                    'message' => 'Informações atualizadas',
                    'reason' => 'success_update',
                    'type' => 'success',
                ];
            }else{
                $JSON = [
                    'bool' => false,
                    'output' => null,
                    'message' => 'Não foi possível atualizadas informações',
                    'reason' => 'error_update',
                    'type' => 'error',
                ];
                break;
            }
        }        
    break;

    /****************************************************************************
	 * CARREGA TODOS OS WIDGETS CADASTRADOS NO BANCO 
	 */
    case 'portal/userpage/widgets/loading':
        $Widgets = _get_data_table(TB_PORTAL_USERPAGE_WIDGETS);
        $JSON = (isset($Widgets))? $Widgets : null;
    break;

}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}