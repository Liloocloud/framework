<?php
/**
 * Controladora da página redefinir senha tema Vamove
 * @copyright Felipe Oliveira Lourenço -29-06-2020
 */

// var_dump(
// 	memory_get_usage(), 
// 	memory_get_peak_usage(), 
// 	ini_get('memory_limit')
// );

// MENSAGEM DE LINK DE SOLICITAÇÃO ENVIADO COM SUCESSO
if(isset(URL()[1]) && URL()[1] == 'enviada'){
	_tpl_fill(PATH_THEME.ROUTES.'redefinir-senha/link-enviado.tpl', [], '');
}elseif(isset(URL()[1]) && URL()[1] == 'sucesso'){
	_tpl_fill(PATH_THEME.ROUTES.'redefinir-senha/link-sucesso.tpl', [], '');
}else{
	_tpl_fill(PATH_THEME.ROUTES.'redefinir-senha/redefinir-senha.tpl', [], '');
}

