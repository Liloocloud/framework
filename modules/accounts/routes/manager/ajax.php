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
require_once "../../accounts.config.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";


switch ($Action):

	/****************************************************************************
	 * CARREGA OS USUÁRIO AO INICIAR
	 */
	case 'accounts/users/refresh':
		$Accounts = _get_data_full("SELECT * FROM `".TB_ACCOUNTS."` ORDER BY `account_id` ASC LIMIT 10");
		// var_dump($Accounts);
		if($Accounts){
			$JSON = $Accounts;
		}
	break;

	/****************************************************************************
	 * POVOA A MODAL COM OS DADOS
	 */
	case 'accounts/users/modal':	
		if(isset($Sync)){
			$Account = _get_data_full("SELECT * FROM `".TB_ACCOUNTS."` WHERE `account_id` =:a", "a={$Sync}");
			if(!$Account){
				$JSON['notify'] = ['Nenhum usuário encontrado com o termo "'.$Sync.'"', 'error'];
				break;
			}else{
				$Account[0]['account_registered'] = format_datetime($Account[0]['account_registered']);
				$Account[0]['account_last_login'] = format_datetime($Account[0]['account_last_login']);
				$Account[0]['account_status'] = (isset($Account[0]['account_status']) == 0)? 'Inativa' : 'Ativa';
				$JSON = $Account[0];
			}
			unset($JSON[0]['account_password']);
		}else{
			$JSON['notify'] = ['Erro ao abrir modal', 'error'];
		}
	break;

	/****************************************************************************
	 * FILTRO DE BUSCA
	 */
	case 'accounts/users/search':						
		$Accounts = _get_data_full(
			"SELECT * FROM `".TB_ACCOUNTS."`							
				WHERE `account_name` LIKE '%{$Sync['users_search']}%'
				OR `account_lastname` LIKE '%{$Sync['users_search']}%'
				OR `account_cpf` LIKE '%{$Sync['users_search']}%'
				OR `account_cnpj` LIKE '%{$Sync['users_search']}%'
				OR `account_phone` LIKE '%{$Sync['users_search']}%'
				");
		if(!$Accounts){
			$JSON = [
				'bool' => false,
				'message' => 'Nenhum conta encontrada com o termo "'.$Sync['users_search'].'"'];
			break;
		}else{
			$JSON = [
				'bool' => true,
				'output' => $Accounts
			];
		}
	break;

	/****************************************************************************
	 * EDITAR
	 */
	case 'accounts/users/button/edit':
		$JSON['notify'] = ['Estamos editando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * DELETAR
	 */
	case 'accounts/users/button/delete':
		$JSON['notify'] = ['Estamos deletando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * CRIA NOVO
	 */
	case 'accounts/users/create':
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
	case 'accounts/users/reports':
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