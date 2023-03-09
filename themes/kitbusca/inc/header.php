<?php
/** 
 * Navbar + Header do TOP 
 */

if(!isset($_SESSION['account_id'])){
	$Extra['menu_top'] = [
        [BASE.'como-funciona/','uk-button-link','"','Como funciona?'],
        [BASE.'seja-um-profissional/','uk-button-link','','Para empresas'],
		[BASE.'cadastre-se/','uk-button-secondary','','Cadastre-se'],
		[BASE_ADMIN.'login/','uk-button-default','target="_blank','Entrar']
	];
}else{
	$Extra['menu_top'] = [
        [BASE.'como-funciona/','uk-button-link','','Como funciona?'],
        [BASE.'seja-um-profissional/','uk-button-link','','Para empresas'],
		[BASE.'meu-painel/','uk-button-default','target="_blank','Voltar ao Painel' ]
	];
}
echo $twig->render('header.twig', $Extra);