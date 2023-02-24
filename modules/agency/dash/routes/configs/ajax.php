<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

if(isset($_SESSION['account_level']) && $_SESSION['account_level'] < 10){
	exit;
}

require_once "../../../../../_Kernel/___Kernel.php";
require_once "../../../agency.config.php";
require_once "../../../../../_Kernel/_Sync.inout.php";

switch ($Action):

    /****************************************************************************
	 * ALTERA A PIPELINE DOS CARDS ATUALIZANDO OS LINKS
	 */
	case 'agency_config_one':				
		var_dump($Sync);
	break;

    

endswitch;
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}