<?php
/**
 * Controladora da página cadastre-se do tema vamove
 * @copyright Felipe Oliveira Lourenço - 08-07-2020
 */

$Extra['content_terms'] = _tpl_fill(ROOT_THEME_ROUTES.'termos-de-uso/termos.tpl', [ 'base' => BASE ], '', false);
$Extra['content_private'] = _tpl_fill(ROOT_THEME_ROUTES.'politica-de-privacidade/politicas.tpl', [ 'base' => BASE ], '', false);
$Extra['content_contract'] = _tpl_fill(ROOT_THEME_ROUTES.'cadastre-se/contrato.tpl', [ 'base' => BASE ], '', false);


_tpl_fill(ROOT_THEME_ROUTES.'cadastre-se/cadastre-se.tpl', $Extra, '');