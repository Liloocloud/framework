<?php
/**
 * [WIDGET]
 * PREENCHE O FORM APÓS CLICAR NO USUÁRIO PARA ATUALIZAÇÃO DAS INFORMAÇÕES
 * TENTAR CONSTRUIR UM ALTO PREENCHIMENTO DE CAMPO - 20.04.2021
 * @copyright Felipe Oliveira Lourenço - 20.04.2021
 * @version 1.0.0
 */

$User = _get_data_full("SELECT * FROM `" . TB_ACCOUNTS . "`	WHERE `account_id` =:a", "a={$Sync['array']}");

if ($User[0]) {
	$JSON['array'][0] = [
		'element' => '.get_user',
		// 'type' => 'input',
		'content' => $User[0]['account_name']
	];
	// $JSON['array'][1] = [
	// 	'element' => '#account_level',
	// 	'type' => 'input',
	// 	'content' => ($User[0]['account_level']) ? $User[0]['account_level'] : ''
	// ];
	// $JSON['array'][2] = [
	// 	'element' => '#account_name',
	// 	'type' => 'input',
	// 	'content' => ($User[0]['account_name']) ? $User[0]['account_name'] : ''
	// ];
	// $JSON['array'][3] = [
	// 	'element' => '#account_email',
	// 	'type' => 'input',
	// 	'content' => ($User[0]['account_email']) ? $User[0]['account_email'] : ''
	// ];
	// $JSON['array'][4] = [
	// 	'element' => '#account_coin',
	// 	'type' => 'input',
	// 	'content' => ($User[0]['account_coin']) ? $User[0]['account_coin'] : ''
	// ];
	// $JSON['array'][5] = [
	// 	'element' => '#account_status',
	// 	'type' => 'input',
	// 	'content' => ($User[0]['account_status']) ? $User[0]['account_status'] : ''
	// ];
	// $JSON['array'][6] = [
	// 	'element' => '.account_id_text',
	// 	'content' => ($User[0]['account_id']) ? 'ID - ' . $User[0]['account_id'] : ''
	// ];
	// $JSON['array'][7] = [
	// 	'element' => '#account_id_pass',
	// 	'type' => 'input',
	// 	'content' => ($User[0]['account_id']) ? $User[0]['account_id'] : ''
	// ];
	// $JSON['array'][8] = [
	// 	'element' => '#account_email_pass',
	// 	'type' => 'input',
	// 	'content' => ($User[0]['account_email']) ? $User[0]['account_email'] : ''
	// ];
	// $JSON['array'][9] = [
	// 	'element' => '#account_name_pass',
	// 	'type' => 'input',
	// 	'content' => ($User[0]['account_name']) ? $User[0]['account_name'] : ''
	// ];
}
