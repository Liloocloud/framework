<?php
/**
 * Controladora da página Política de privacidade do tema Vamove
 * @copyright Felipe Oliveira Lourenço - 08-07-2020
 */


$BASE['base'] = BASE;
$Extra = [
	'page_content' => _tpl_fill(PATH_THEME.ROUTES.'politica-de-privacidade/politicas.tpl', $BASE, '', false),
	'base_themes' => BASE_THEMES,
	'base' => BASE,
	'uploads' => BASE_UPLOADS
];

_tpl_fill(PATH_THEME.ROUTES.'politica-de-privacidade/politica-de-privacidade.tpl', $Extra, '');