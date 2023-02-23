<?php
/**
 * Controladora da página inicial do painel do usuário
 * @copyright Felipe Oliveira Lourenço - 27-06-2020
 */

if(!isset(URL()[1])){

	$Extra['base_adm'] = $BASE_DASH;
	_tpl_fill($PATH_DASH.'/routes/inicial/inicial.tpl', $Extra, '');
}