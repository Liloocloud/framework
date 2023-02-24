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