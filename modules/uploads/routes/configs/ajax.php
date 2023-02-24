<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

// if(isset($_SESSION['account_level']) && $_SESSION['account_level'] < 10){
// 	exit;
// }

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../uploads.config.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";


switch ($Action):

	/****************************************************************************
	 * CRIA LISTA DE CATEGORIAS VINDAS DE UM TEXTAREA
	 */
	case 'portal/categs/create/list':
		// $JSON = nl2br($Sync['tax_listing']);
		if(isset($Sync['tax_listing'])){
			$Categs = explode("\n",trim($Sync['tax_listing']));	
			foreach ($Categs as $Item) {
				$Check = _get_data_full("SELECT `tax_id` FROM `".TB_TAXONOMIES."` WHERE `tax_name` =:a","a={$Item}");
				$Check = ($Check)? true : false;			
				if(!$Check){
					$Set = _set_data_table(TB_TAXONOMIES,[
						'tax_meta' => $Sync['tax_meta'],
						'tax_inner_id' => $Sync['tax_inner_id'],
						'tax_name' => trim($Item)
					]);
				}	
			}
			$JSON = [
				'bool' => true,
				'message' => 'Lista de categorias cadastrada com sucesso!'
			];
		}else{
			$JSON = [
				'bool' => false,
				'message' => 'Nenhum dado passado'
			];
		}
	break;

	/****************************************************************************
	 * CARREGA AO INICIAR
	 */
	case 'portal/categs/refresh':
		$Categs = _get_data_full(
			"SELECT * FROM `".TB_TAXONOMIES."` 
			WHERE `tax_inner_id` = 'categ'
			ORDER BY `tax_id` ASC LIMIT 10");
		if($Categs){
			$JSON = [
				'bool' => true,
				'output' => $Categs,
				'message' => 'Lista carregada com sucesso'
			];
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Nenhuma categoria encontrada'
			];
		}
	break;

	/****************************************************************************
	 * POVOA A MODAL COM OS DADOS
	 */
	case 'portal/users/modal':	
		if(isset($Sync)){
			$Portal = _get_data_full("SELECT * FROM `".TB_TAXONOMIES."` WHERE `tax_id` =:a", "a={$Sync}");
			if(!$Portal){
				$JSON['notify'] = ['Nenhuma categoria encontrada com o termo "'.$Sync.'"', 'error'];
				break;
			}else{
				$Portal[0]['tax_registered'] = format_datetime($Portal[0]['tax_registered']);
				$Portal[0]['tax_active'] = (isset($Portal[0]['tax_active']) == 0)? 'Inativa' : 'Ativa';
				$JSON = $Portal[0];
			}
		}else{
			$JSON['notify'] = ['Erro ao abrir modal', 'error'];
		}
	break;

	/****************************************************************************
	 * FILTRO DE BUSCA
	 */
	case 'portal/categ/search':						
		$Portal = _get_data_full(
			"SELECT * FROM `".TB_TAXONOMIES."`							
				WHERE `tax_name` LIKE '%{$Sync['categ_search']}%'
				OR `tax_id` LIKE '{$Sync['categ_search']}'
				LIMIT 15");
		if(!$Portal){
			$JSON = [
				'bool' => false,
				'message' => 'Nenhum conta encontrada com o termo "'.$Sync['categ_search'].'"'];
			break;
		}else{
			$JSON = [
				'bool' => true,
				'output' => $Portal
			];
		}
	break;

	/****************************************************************************
	 * EDITAR
	 */
	case 'portal/users/button/edit':
		$JSON['notify'] = ['Estamos editando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * DELETAR
	 */
	case 'portal/users/button/delete':
		$JSON['notify'] = ['Estamos deletando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * CRIA NOVO
	 */
	case 'portal/users/create':
		$Email = new Account\Check($Sync['account_email']);
		$Check = $Email->check();
		if(!$Check['BOOL']){
			$Account = _set_data_table(TB_ACCOUNTS, $Sync);
			if($Account){
				$JSON = true;
			}else{
				$JSON = [
					'bool' => false,
					'message' => 'Erro ao cadastrar usuário'
				];
				break;
			}
		}else{
			$JSON = [
				'bool' => false,
				'message' => 'Usuário já existe'
			];
			break;
		}
	break;
	
	/****************************************************************************
	 * CARREGA OS DADOS DO CARD "TOTAL DE USUÁRIOS"
	 */
	case 'portal/users/reports':
		switch ($Sync) {
			case 'valid': $Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `".TB_ACCOUNTS."` WHERE `account_auth` =:a","a=1"); break;
			case 'term': $Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `".TB_ACCOUNTS."` WHERE `account_accept_terms` =:a","a=1"); break;
			case 'active': $Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `".TB_ACCOUNTS."` WHERE `account_status` =:a","a=1"); break;
			case 'inactive': $Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `".TB_ACCOUNTS."` WHERE `account_status` =:a","a=0"); break;
		}
		if($Report && isset($Report[0])){
			$JSON = $Report[0]['Total'];
		}else{
			$JSON = '';
		}
	break;


endswitch;
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON, JSON_UNESCAPED_UNICODE);
}