<?php
/**
 * Painel de controle do Anunciante dashboard do tema
 * @copyright Felipe Oliveira Lourenço - 01.04.2020
 */

$Company = _get_data_full("
	SELECT * FROM `".TB_ACCOUNTS."` INNER JOIN 
	`".TB_SMART_COMPANIES."` ON 
	".TB_ACCOUNTS.".account_id = ".TB_SMART_COMPANIES.".company_account_id 
	WHERE `company_account_id` =:a","a={$_SESSION['account_id']}");
$Company = (isset($Company[0]))? $Company[0] : false;

if($Company){

	// Busca os Grupos
	$GroupsTotal = _get_data_table(TB_SMART_SERVICES_GROUP);
	$Company['company_groups_id'] = explode(',', $Company['company_groups_id']);
	$checkbox = ''; $i=0;
	foreach ($GroupsTotal as $option) {
		if(in_array($option['group_id'], $Company['company_groups_id'])){
			$checkbox.= "<label for='company_groups_id[{$i}]'><input type='checkbox' id='company_groups_id[{$i}]' name='company_groups_id[{$i}]' value='{$option['group_id']}' checked> &nbsp;{$option['group_title']}\n\r</label><br>";
		}else{
			$checkbox.= "<label for='company_groups_id[{$i}]'><input type='checkbox' id='company_groups_id[{$i}]' name='company_groups_id[{$i}]' value='{$option['group_id']}'> &nbsp;{$option['group_title']}\n\r</label><br>";
		}
		$i++;
	}

	$Extra = [
		'account_id' => $_SESSION['account_id'],
		'group_select_company' => $checkbox,

		'company_zipcode' => ($Company['company_zipcode'])? $Company['company_zipcode'] : '',
		'company_district' => ($Company['company_district'])? $Company['company_district'] : '',
		'company_city' => ($Company['company_city'])? $Company['company_city'] : '',
		'company_address' => ($Company['company_address'])? $Company['company_address'] : '',
		'company_state' => ($Company['company_state'])? $Company['company_state'] : '',

		'company_phones' => ($Company['company_phones'])? $Company['company_phones'] : '',
		'company_linkedin' => ($Company['company_linkedin'])? $Company['company_linkedin'] : '',
		'company_facebook' => ($Company['company_facebook'])? $Company['company_facebook'] : '',
		'company_instagram' => ($Company['company_instagram'])? $Company['company_instagram'] : '',
		'company_twitter' => ($Company['company_twitter'])? $Company['company_twitter'] : '',
		'company_youtube' => ($Company['company_youtube'])? $Company['company_youtube'] : ''
	];
}
_tpl_fill($PATH_DASH.'routes/completando-cadastro/completando-cadastro.tpl', $Extra, '');