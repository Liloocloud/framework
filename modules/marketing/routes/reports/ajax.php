<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

if(isset($_SESSION['account_level']) && $_SESSION['account_level'] < 10){
	exit;
}

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../marketing.config.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";

switch ($Action){

	/****************************************************************************
	 * CARREGA A LISTA DE CONTATOS PELO WHATSAPP PELO PARAMETRO 'DATA' PASSADO
	 * NA REQUISIÇÃO AJAX
	 */
	case 'list/leads':
		$Leads = _get_data_full(
			"SELECT * FROM " . TB_MKT_CONTACTS . " 
			WHERE `contact_method` = '{$Sync}'
			AND `contact_account_id` = {$_SESSION['account_id']}
			ORDER BY contact_id DESC");	
		if(!empty($Leads)){
			$JSON = [
				'bool' => true,
				'output' => $Leads,
				'message' => 'Lista de contatos pelo whatsapp',
				'reason' => 'found_leads',
				'type' => 'success'
			];
			break;
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Nenhum contato pelo whatsapp',
				'reason' => 'not_found_leads',
				'type' => 'error'
			];
		}
	break;


	/**
	 * $Dash = _get_data_full("SELECT COUNT(contact_id) AS Form FROM " . TB_MKT_CONTACTS . " WHERE contact_channel = 'ina'");
	 * $Extra['contacts_form'] = (isset($Dash[0])) ? (int) $Dash[0]['Form'] : 0;
	 */


    /****************************************************************************
	 * ALTERA A PIPELINE DOS CARDS ATUALIZANDO OS LINKS
	 */
	case 'followup_alter_pipeline':				
		$Pipeline = (int) explode('-',$Sync['data']['Pipeline'])[1];		
		if(isset($Sync['data']['MatrixOrder'])){
			$MatrixOrder = $Sync['data']['MatrixOrder'];		
			foreach ($MatrixOrder as $Code) {
				$Up = _up_data_table(TB_MATRIX, [
					'values' => [
						'matrix_pipeline' => $Pipeline
					],
					'where' => [
						'matrix_code' => $Code
					]
				]);
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