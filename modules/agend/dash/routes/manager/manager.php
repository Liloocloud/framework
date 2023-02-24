<?php
/**
 * Página de gerenciamento de moedas de usuários na plataforma
 * @copyright Felipe Oliveira Loureço - 16.06.2020
 */
if($_SESSION['account_level'] < 10){
	_ERROR('Você não tem permissão para acessar esse conteúdo');
	
}else{
	_tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].'manager/manager.tpl', $Extra, '');
}