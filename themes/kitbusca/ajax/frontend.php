<?php
/**
 * Requisições Ajax feitas na frontend
 * @copyright Felipe Oliveira - 23.12.2022
 * @version 2.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../../marketing.config.php";
require_once "../../../_Kernel/_Sync.inout.v2.php";

switch ($Action){

    /****************************************************************************
	 * CARREGAMENTO INICIAL DAS PIPELINES COM OS CARDS
	 */
	case 'search/select/service':
        $JSON = [
            'bool' => false,
            'output' => null,
            'message' => 'Informe seu E-mail',
            'reason' => 'input_empty_email',
            'type' => 'error'
        ];
    break;


}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}