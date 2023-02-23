<?php
/**
 * Pega a página Corrente e coloca num array
 * para disponibilizar no template
 * @copyright Felipe Oliveira Lourenço 13.02.2022
 */

 /**
  * Nome de usuário: useraccount@kitbusca.com
  * Senha:	5pa3]dxGelqXnq[;s+PNHk]Yj2S9qF=VvU%c
  * Servidor de entrada:	mail.kitbusca.com
  * IMAP Port: 993 
  * POP3 Port: 995
  * Servidor de saída:	mail.kitbusca.com
  * SMTP Port: 465
  */

define('__THEME__', [
	// MAIL
	'mail_host'		 	=> 'mail.kitbusca.com',
	'mail_port'			=> 465,
	'mail_user'			=> 'useraccount@kitbusca.com',
	'mail_pass'			=> '5pa3]dxGelqXnq[;s+PNHk]Yj2S9qF=VvU%c',
	'mail_from_name' 	=> 'Nova Conta de Usuário',
	// Recomendado ser o mesno do user
	'mail_from_email' 	=> 'useraccount@kitbusca.com', 

	'tpl_mail_password_redefine' => BASE_THEME.'tpl/email_password_redefine.tpl',

    // SOCIAL MEDIA
    'social_youtube' 	=> '',
    'social_linkedin' 	=> '',
    'social_instagram' 	=> '',
    'social_facebook' 	=> '',
    'social_twitter' 	=> '',
    'social_blog' 		=> '',
    
	// VERIFICAÇÃO DO GOOGLE WEB MASTER TOOLS
	'google_verification' 		=> '',

	/**
	 * Menu do tema sendo a chave o HTML e o Value a URL
	 */
	'menu_top' => (!isset($_SESSION['account_id']))?[
		// Não Logado		
		'Como funciona?' 	=> BASE.'como-funciona/',
		'Cadastre-se' 		=> BASE.'cadastre-se/',
		'Entrar' 			=> BASE.'login/'
	]:[
		// Logado
		'Como funciona?' 	=> BASE.'como-funciona/',
		'Voltar ao Painel' 	=> BASE.'meu-painel/'
	],
	
	/**
     * Habilita os sistema embarcado 'admin. loja e etc' onde irão conter todas 
     * as funcionalidades para gestão de conta de usuário, gestão de 
     * produtos, checkout e etc. Lembrando que os recursos disponiveis no sistema
     * embarcado serão configurados previamente
     */
    'embedded_system' => [
        'admin' => true,
        'loja' => false,
    ],

	/************************************************************************
	 * CONFIGURAÇÕES GERAIS
	 */
	// Ativa e desativa o Voltar ao topo do site
	'front_back_to_top' => true,
	// Ativa e desativa o botão do whatsapp
	'front_btn_whatsapp' => true,

	/************************************************************************
	 * SISTEMA INC - INCLUSÃO OU NÃO DAS PARTES INC PARA O TEMA
	 */
	// Desabilita a header das página abaixo
	'header_pages_disabled' => [
		'admin',
		'login',
		'apresentacao',
		'/conta/cadastre-se/',
        '/conta/cadastre-se/free/',
        '/conta/cadastre-se/basic/',
        '/conta/cadastre-se/pro/',
        '/conta/login/',
        '/conta/validacao/',
        '/conta/obrigado/',
        '/conta/redefinir-senha/',
        '/conta/trocar-senha/',
        '/conta/validar-redefinicao/',
	],

	// Desabilita o sistema de busca das página abaixo
	'search_pages_disabled' => [
		'admin',
		'login',
		'apresentacao',
		'conta'
	],

	// Desabilita a footer das página abaixo 
	'footer_pages_disabled' => [
		'admin',
		'login',
		'apresentacao',
		'/conta/cadastre-se/',
        '/conta/cadastre-se/free/',
        '/conta/cadastre-se/basic/',
        '/conta/cadastre-se/pro/',
        '/conta/login/',
        '/conta/validacao/',
        '/conta/obrigado/',
        '/conta/redefinir-senha/',
        '/conta/trocar-senha/',
        '/conta/validar-redefinicao/',
	],

	// Desabilita a copyright das página abaixo
	'copyright_pages_disabled' => [
		'admin',
		'login',
		'apresentacao',
		'/conta/cadastre-se/',
        '/conta/cadastre-se/free/',
        '/conta/cadastre-se/basic/',
        '/conta/cadastre-se/pro/',
        '/conta/login/',
        '/conta/validacao/',
        '/conta/obrigado/',
        '/conta/redefinir-senha/',
        '/conta/trocar-senha/',
        '/conta/validar-redefinicao/',
	],

	// Desabilita o botão do whatsapp das página abaixo
	'whatsapp_pages_disabled' => [],	
]);

/**
 * Menu do tema sendo a chave o HTML e o Value a URL
 */
if(!isset($_SESSION['account_id'])):
	define('MENU_TOP',[
		'Como funciona?' => BASE.'como-funciona/',
		'Cadastre-se' => BASE.'cadastre-se/',
		'Entrar' => BASE_ADMIN.'login/'
	]);
else:
	define('MENU_TOP',[
		'Como funciona?' => BASE.'como-funciona/',
		'Voltar ao Painel' => BASE.'meu-painel/'
	]);
endif;





// /**
//  * Recupera a localização do usuário 
//  * Pelo TB Cookie ou Geo IP
//  */
// $Cookie = _get_data_table(TB_COOKIES, [
// 	'cookie_ip' => _get_client_ip(),
// 	'cookie_name' => 'location'
// 	]);
// $Cookie = ($Cookie)? $Cookie[0] : false ;
// if($Cookie):
// 	$Response = json_decode($Cookie['cookie_values'] ,true);
// 	define('USER_LOCATION', [
// 		'state' => $Response['state'],
// 		'uf' => $Response['uf'],
// 		'city' => $Response['city']
// 		]);
// else:
// 	$Response = _geo_ip_location(_get_client_ip());
// 	define('USER_LOCATION', [
// 		'state' => $Response['region_name'],
// 		'uf' => $Response['region_code'],
// 		'city' => $Response['city']
// 		]);

// 	_set_data_table(TB_COOKIES, [
// 		'cookie_name' => 'location',
// 		'cookie_values' => json_encode(USER_LOCATION),
// 		'cookie_ip' => _get_client_ip()
// 		]);
// endif;