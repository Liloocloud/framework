<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */
require_once "../../../../_Kernel/___Kernel.php";
require_once "../../accounts.config.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";

switch ($Action):

	/****************************************************************************
	 * RETORNA OS DADOS FILTRADOS
	 */
	case 'accounts/configs/options':
        $Opt = _get_data_full(
            "SELECT 
            `opt_title`,
            `opt_description`,
            `opt_values`,
            `opt_meta`
            FROM `".TB_ACCOUNT_CONFIGS."` 
            WHERE `opt_module` =:a 
            AND `opt_meta` =:b",
            "a=accounts&b={$Sync}");
        $JSON = $Opt;
    break;

    /****************************************************************************
	 * ATUALIZA A OPTIONS PELO OPT_META
	 */
    case 'accounts/configs/update';
        $Up = _up_data_table(TB_ACCOUNT_CONFIGS, [
            'where' => ['opt_meta' => $Sync['opt_meta']],
            'values' => ['opt_values' => $Sync['opt_values']]
        ]);
        if($Up){
            $JSON = true;
        }else{
            $JSON = false;
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
				$JSON = $Account;
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
			$JSON['notify'] = ['Nenhum conta encontrada com o termo "'.$Sync['users_search'].'"', 'error'];
			break;
		}else{
			$JSON = $Accounts;
		}
	break;

endswitch;
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}