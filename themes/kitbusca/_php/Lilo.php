<?php
/**
 * Gerencia Todas as Operações da Frontend que Necessitam de AJAX
 * @copyright Felipe Oliveira -  15-05-2020
 * @version 1.0
 *
 * @see 'search_service_term'		[Sistema de busca redirecionando para uma página especificada]
 */

header('Access-Control-Allow-Origin: *');
require_once "../../../_Kernel/___Kernel.php";
// require_once "../__config.frontend.php";
// require_once "../presets/presets.php";
require_once "../../../_Kernel/_Sync.inout.php";

switch ($Action):

	/****************************************************************************
	 * COMPONENTE CARD DO UIKIT
	 */
	case 'lilo_card':

		// $Accounts = _get_data_full("
		// 	SELECT ".$Sync['array']." FROM `".TB_ACCOUNTS."` 
		// ");

		$View = _tpl_fill(BASE_FRAMEWORKS.'uikit/tpl/card.tpl', [], '', false);

		$Extra = [
			'title' => 'Título',
			'content' => 'lorem',
			'href' => '####',
			'button' => 'Enviar'
		];

		$JSON['callback'] = _tpl_fill(PATH_FRAMEWORK.'tpl/card.tpl', $Extra, '', false);
		// $JSON['callback'] = $Accounts;
		// $JSON['array'][0] = [
		// 	'element' => '#select_company_categories div',
		// 	'content' => 
		// ];

		break;

	/****************************************************************************
	 * TESTE DE NAME
	 */
	case 'lilo_accordion':
		// $Accounts = _get_data_table(TB_ACCOUNTS);
		$JSON['console'] = 'Você está na lilo_accordion';
		// $JSON['array'][0] = [
		// 	'element' => '#select_company_categories div',
		// 	'content' => 
		// ];

		break;

	/****************************************************************************
	 * TESTE DE NAME
	 */
	case 'lilo_api':
		// $Accounts = _get_data_table(TB_ACCOUNTS);
		$JSON['console'] = 'Você está na lilo_api';
		// $JSON['array'][0] = [
		// 	'element' => '#select_company_categories div',
		// 	'content' => 
		// ];

		break;

	
	

endswitch;
if($JSON!=null)
	echo json_encode($JSON);