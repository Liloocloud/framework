<?php
/**
 * Controladora da página Termos de uso do tema Vamove
 * @copyright Felipe Oliveira Lourenço - 08-07-2020
 */

$Extra = [
	'page_content' => _tpl_fill(PATH_THEME.ROUTES.'termos-de-uso/termos.tpl', [], '', false),
	'base_themes' => BASE_THEMES,
	'base' => BASE,
	'uploads' => BASE_UPLOADS
];

_tpl_fill(PATH_THEME.ROUTES.'termos-de-uso/page-termos.tpl', $Extra, '');