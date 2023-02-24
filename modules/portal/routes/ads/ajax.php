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
require_once "../../portal.config.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";


switch ($Action):

	/****************************************************************************
	 * CARREGA OS USUÁRIO AO INICIAR
	 */
	case 'ads/refresh':
		$Ads = _get_data_full("SELECT * FROM `".TB_ADS."` LIMIT 10");
		if($Ads){
			$JSON = [
				'bool' => true,
				'output' => $Ads,
				'message' => 'Lista de anúncio'
			];
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Nenhum anúncio encontrado'
			];
		}
	break;

	/****************************************************************************
	 * POVOA A MODAL COM OS DADOS
	 */
	case 'ads/item/modal':	
		if(isset($Sync)){
			$Ads = _get_data_full("SELECT * FROM `".TB_ADS."` WHERE `ads_id` =:a", "a={$Sync}");
			if($Ads){
				$Ads[0]['ads_registered'] 	= format_datetime($Ads[0]['ads_registered']);
				$Ads[0]['ads_modify'] 	  	= format_datetime($Ads[0]['ads_modify']);
				$Ads[0]['ads_status'] 		= (isset($Ads[0]['ads_status']) == 0)? 'Inativo' : 'Ativo';
				$Ads[0]['ads_moderate'] 	= (isset($Ads[0]['ads_moderate']) == 0)? 'Em processo' : 'Validado';
				$JSON = [
					'bool' => true,
					'output' => $Ads,
					'message' => 'Resultados encontrados'
				];
				break;
			}else{
				$JSON = [
					'bool' => false,
					'output' => null,
					'message' => 'Nenhum anúncio encontrado com o termo "'.$Sync.'"'
				];
				break;
			}
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Erro ao abrir modal'
			];
		}
	break;

	/****************************************************************************
	 * FILTRO DE BUSCA
	 */
	case 'ads/users/search':						
		$Accounts = _get_data_full(
			"SELECT * FROM `".TB_ACCOUNTS."`							
				WHERE `account_name` LIKE '%{$Sync['users_search']}%'
				OR `account_lastname` LIKE '%{$Sync['users_search']}%'
				OR `account_cpf` LIKE '%{$Sync['users_search']}%'
				OR `account_cnpj` LIKE '%{$Sync['users_search']}%'
				OR `account_phone` LIKE '%{$Sync['users_search']}%'
				");
		if(!$Accounts){
			$JSON['notify'] = ['Nenhum conta encontrada com o termo "'.$Sync['users_search'].'"', 'error'];
			break;
		}else{
			$JSON = $Accounts;
		}
	break;

	/****************************************************************************
	 * EDITAR
	 */
	case 'ads/users/button/edit':
		$JSON['notify'] = ['Estamos editando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * DELETAR
	 */
	case 'ads/users/button/delete':
		$JSON['notify'] = ['Estamos deletando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * CRIA NOVO
	 */
	case 'ads/users/create':
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
	case 'ads/users/reports':
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
    echo json_encode($JSON);
}