<?php
/**
 * Página de gerenciamento de moedas de usuários na plataforma
 * @copyright Felipe Oliveira Loureço - 16.06.2020
 */


if($_SESSION['account_level'] != 10){
	_ERROR('Você não tem permissão para acessar esse conteúdo');
	
}else{
	$Accounts = new Helpers\Paginator(		
		// Página atual para manter na mesma página
		(isset(URL()[3]))? URL()[3] : 0,
		// Limite de resultados por apagina
		12,
		// Tabela do Bando
		TB_ACCOUNTS,
		// Condições (Where) caso tenha
		'',		
		// URL onde fará a páginação
		BASE.URL()[0].'/'.URL()[1].'/'.URL()[2].'/',	
		// Sintaxe Adicional Utilizando os recuros acima
		'',		
		// SQL Espacífica para casos extremos
		"SELECT * FROM `".TB_ACCOUNTS."` ORDER BY account_id DESC "
	);
	$Res = $Accounts->Results();
	if($Res){
		$view = '';
		foreach ($Res as $field){
			$view.= "
			<tr class='item' onclick='item({$field['account_id']})'>
			<td>{$field['account_id']}</td>
			<td>{$field['account_name']}</td>
			<td>{$field['account_email']}</td>
			<td>{$field['account_coin']} <a href='single'>Ver</a></td>
			<td>{$field['account_registered']}</td>
			</tr>
			";
		}
		$Extra = [
			'pagination' => $Accounts->Navigation(false),
			'link_new_user' => BASE_ADMIN.'accounts/create-account/',
			'list_table' => $view
		];
		_tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].'users/users.tpl', $Extra, '');
	}else{
		$Extra = [
			'pagination' => '',
			'link_new_user' => BASE_ADMIN.'accounts/create-account/',
			'list_table' => ''	
		];
		_tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].'users/users.tpl', $Extra, '');
	}

}