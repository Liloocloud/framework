<?php
/**
 * [WIDGET]
 * SISTEMA DE BUSCA DENTRO DO PAINEL INTERNO
 * @copyright Felipe Oliveira Lounreço - 20.04.2021
 * @version 1.0.0 
 */

if ($Sync['options'] != 'default') {
    $Opt =  explode(':', $Sync['options']);
    $field = ($Opt[0] == 'id') ? 'account_id' : 'account_name';
    $type  = ($Opt[1] == 'asc') ? 'ASC' : 'DESC';
    $Order = "ORDER BY `{$field}` {$type}";
} else {
    $Order = '';
}
$Term = (array) trim($Sync['term']);
$Term = http_build_query($Term);
$Term = str_replace('0=', '', $Term);
$Accounts = _get_data_full("
			SELECT * FROM `" . TB_ACCOUNTS . "` WHERE
			`account_id` LIKE '%{$Term}%' OR
			`account_name` LIKE '%{$Term}%' OR
			`account_lastname` LIKE '%{$Term}%' OR
			`account_email` LIKE '%{$Term}%' 
			{$Order} LIMIT 15
		");
$Accounts = (isset($Accounts)) ? $Accounts : false;
if ($Accounts) {
    $view = '';
    foreach ($Accounts as $Value) {
        $view .= "
				<tr class='item' onclick='item({$Value['account_id']})'>
				<td>{$Value['account_id']}</td>
				<td>{$Value['account_name']}</td>
				<td>{$Value['account_email']}</td>
				<td>{$Value['account_coin']}</td>
				<td>{$Value['account_registered']}</td>
				</a>
				";
    }
    $JSON['array'][0] = [
        'element' => '#list_table',
        'content' => $view
    ];
    $JSON['array'][1] = [
        'element' => '#pagination',
        'content' => ''
    ];
} else {
    $JSON['array'][0] = [
        'element' => '#list_table',
        'content' => ''
    ];
}