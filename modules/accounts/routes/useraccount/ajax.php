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
     * CHART - QUANTIDADE DE USUÁRIO ATIVOS POR PLANO
     */
    case 'chart/accounts/per/plan':
        
        $Plans = _get_data_full("SELECT DISTINCT `account_plan` FROM `".TB_ACCOUNTS."`");
        $Labels = [];
        $Data = [];
        foreach ($Plans as $key => $a) {
            array_push($Labels, $a['account_plan']);
            $Count = _get_data_full("SELECT COUNT(`account_plan`) AS total FROM `".TB_ACCOUNTS."` WHERE `account_plan` =:a","a={$a['account_plan']}");           
            foreach ($Count as $key => $b) {
                array_push($Data, (int) $b['total']);         
            }
        }
        $JSON = [
            'bool' => true,
            'output' => [
                'labels' => $Labels,
                'data' => $Data 
            ],
            'message' => 'Informações atualizadas',
            'reason' => 'success_update',
            'type' => 'success',
            'element' => '.callback-message',
        ];


        

    break;



    /****************************************************************************
	 * CONTATOS
	 */
	case 'portal/userpage/contacts':  
        $Up = _up_data_table(TB_PORTAL_USERPAGE, [
            'where' => [ 'page_account_id' => $_SESSION['account_id'] ],
            'values' => $Sync
        ]);
        if($Up){
            $JSON = [
                'bool' => true,
                'output' => null,
                'message' => 'Informações atualizadas',
                'reason' => 'success_update',
                'type' => 'success',
                'element' => '.callback-message',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => 'Não foi possível atualizadas informações',
                'reason' => 'error_update',
                'type' => 'error',
                'element' => '.callback-message',
            ];
            break;
        }
	break;

    /****************************************************************************
	 * SOCIAL MEDIA
	 */
    case 'portal/userpage/socialmedia':
        $Up = _up_data_table(TB_PORTAL_USERPAGE, [
            'where' => [ 'page_account_id' => $_SESSION['account_id'] ],
            'values' => $Sync
        ]);
        if($Up){
            $JSON = [
                'bool' => true,
                'output' => null,
                'message' => 'Informações atualizadas',
                'reason' => 'success_update',
                'type' => 'success',
                'element' => '.callback-message-contact',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => 'Não foi possível atualizadas informações',
                'reason' => 'error_update',
                'type' => 'error',
                'element' => '.callback-message-contact',
            ];
            break;
        }
    break;

    /****************************************************************************
	 * LOCALZAÇÃO 
	 */
    case 'portal/userpage/location':
        $Up = _up_data_table(TB_PORTAL_USERPAGE, [
            'where' => [ 'page_account_id' => $_SESSION['account_id'] ],
            'values' => $Sync
        ]);
        if($Up){
            $JSON = [
                'bool' => true,
                'output' => null,
                'message' => 'Informações atualizadas',
                'reason' => 'success_update',
                'type' => 'success',
                'element' => '.callback-message-contact',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => 'Não foi possível atualizadas informações',
                'reason' => 'error_update',
                'type' => 'error',
                'element' => '.callback-message-contact',
            ];
            break;
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