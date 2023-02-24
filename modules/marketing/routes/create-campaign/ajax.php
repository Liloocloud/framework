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
	 * RETORNA TODAS AS CAMPANHAS
	 */
    case 'get/campaigns':        
        if($Sync['term'] != null OR !empty($Sync['term'])){
            $fields = "WHERE `camp_account_id` = {$_SESSION['account_id']} AND ";
            foreach ($Sync['fields'] as $field) {
                $fields.= "`{$field}` LIKE '%{$Sync['term']}%' OR ";
            }
            $fields = substr($fields, 0, -3);
        }else{
            $fields = "WHERE `camp_account_id` = {$_SESSION['account_id']}";
        }

        // Verificando no banco
        $Get = _get_data_full(
            "SELECT * FROM `".TB_MKT_CAMPAIGNS."` 
            {$fields} 
            ORDER BY `camp_id` DESC 
            LIMIT 5"
        );
        $Get = array_reverse($Get);
        if(!empty($Get)){
            $JSON = [
                'bool' => true,
                'output' => $Get,
                'message' => "Busca finalizada",
                'reason' => 'success_get_campaigns',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Nenhuma campanha encontrada",
                'reason' => 'info_get_campaign',
                'type' => 'info',
            ];
        }
    break;

    /****************************************************************************
	 * DELETE
	 */
    case 'delete/campaign/id':
        $Del = _del_data_table(TB_MKT_CAMPAIGNS, [
            'camp_id' => $Sync,
            'camp_account_id' => $_SESSION['account_id']
        ]);
        $Del = (isset($Del))? true : false;
        if($Del){
            $JSON = [
                'bool' => true,
                'output' => $Sync,
                'message' => "Campanha excluída com sucesso",
                'reason' => 'success_delete_camp_id',
                'type' => 'success',
            ]; 
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Erro ao excluir campanha",
                'reason' => 'error_delete_camp_id',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * RETORNO POR ID
	 */
    case 'get/campaign/id':
        $Camp = _get_data_table(TB_MKT_CAMPAIGNS, [ 
            $Sync['fields'][0] => $Sync['id'],
            'camp_account_id' => $_SESSION['account_id']
        ]);
        $Camp = (isset($Camp[0]))? $Camp[0] : null;
        if($Camp){
            $JSON = [
                'bool' => true,
                'output' => $Camp,
                'message' => "Campanha encontrada com sucesso",
                'reason' => 'success_get_campaign_id',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Campanha não encontrada",
                'reason' => 'error_get_campaign_id',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * RETORNO POR ID
	 */
    case 'create/campaign':
        $JSON = [
            'bool' => true,
            'output' => null,
            'message' => "Campanha encontrada com sucesso",
            'reason' => 'success_get_campaign_id',
            'type' => 'success',
        ];
        break; 
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