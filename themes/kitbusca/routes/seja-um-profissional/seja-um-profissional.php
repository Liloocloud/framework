<?php
/**
 * Controladora da página Home do tema Vamove
 * @copyright Felipe Oliveira Lourenço - 01-23-2020
 */

// $COOKIE = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SESSION['HTTP_USER_AGENT']);
// var_dump(session_name($COOKIE) );

// $Extra['base_themes'] = BASE_THEMES;
// $Extra['base'] = BASE;
// $Extra['uploads'] = BASE_UPLOADS;


_tpl_fill(ROOT_THEME_ROUTES.'seja-um-profissional/seja-um-profissional.tpl', $Extra, '');

