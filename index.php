<?php
/**
 * Liloo Platform Development @create agosto de 2015
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com
 * @update 29.01.2020
 * @version 6.0.0
 */
ob_start();
require_once "_Kernel/___Kernel.php";
require_once ROOT_THEME."__config.theme.php";
require_once ROOT_THEME."__fun.theme.php";

$Te = new Module\Portal\Page();

var_dump(URL(), $Te);


$Configs = _get_data_table(TB_OPTIONS);
$Config = [];
foreach ($Configs as $Docty){
  	$Config[$Docty['opt_meta']] = $Docty['opt_values']; 
}
if(isset(URL()[0])){ $URL = URL()[0]; }else{ $URL = 'home'; }
require_once ROOT_THEME."inc/doctype.php";

if(!pathinfoURLString(__THEME__['header_pages_disabled'])){
	require_once ROOT_THEME.'inc/header.php';
}

// Sistea de Leitura de Rotas
$ROUTES = new Explore\OpenDirFile(ROOT_THEME_ROUTES); 
$ROUTES = $ROUTES->list();
$URL_Q = array_filter(URL());
require_once ROOT_THEME.'__routes.php';

$Tracking = [
  'goa', // Canal - Google Ads
  'faa', // Canal - Facebook Ads
  'fao', // Canal - Facebook Organico
  'ina', // Canal - Instagram Ads
  'ino', // Canal - Instagram Organico
  'qrc', // Canal - Acesso ao QR-Code
  'ref', // Canal - Link de Acesso direto   
  'rec', // Canal - Link de Recomendação - Indicação
  'blk', // Canal - Backlink
  'ytb', // Canal - Youtube
  'cti', // Canal - Cartão Interativo
  'lka', // Canal - Linkedin Ads
  'emk', // Canal - E-mail Marketing
  'wtl', // Canal - Lista de Transmissão do Whatsapp
];


// Habilita o sistema embarcado de acordo com as configurações que estão na __CONFIG.php
if(isset(URL()[0]) && array_key_exists(URL()[0], __THEME__['embedded_system'])){
	//header("Location: ".BASE_ADMIN);
	if(__THEME__['embedded_system'][URL()[0]]){
		require_once ROOT_THEME.URL()[0].'/index.php';
	}else{
		require_once ROOT_THEME_ROUTES.'404/404.php';
	}
	
}elseif(isset(URL()[0]) && preg_match("/\?/", URL()[0])){
	require_once ROOT_THEME_ROUTES.'home/home.php';

	
// Le a URL de trakeamento 
}elseif(isset(URL()[0]) && in_array(URL()[0], $Tracking) ){
	// var_dump($URL_Q, URL(), $_GET);
	if(isset(URL()[1]) && is_dir(ROOT_THEME_ROUTES.$URL_Q[1]) && array_key_exists($URL_Q[1], __ROUTES__)){
		require_once ROOT_THEME_ROUTES.$URL_Q[1].'/'.__ROUTES__[$URL_Q[1]]['php'];
	}elseif(!isset(URL()[1])){
		require_once ROOT_THEME_ROUTES.'home/home.php';
	}else{
		require_once ROOT_THEME_ROUTES.'404/404.php';
	}
	
// Le as rotas para inclui-las
}elseif(isset($URL_Q[0]) && !empty($URL_Q)){
	if(is_dir(ROOT_THEME_ROUTES.$URL_Q[0]) && array_key_exists($URL_Q[0], __ROUTES__)){
		require_once ROOT_THEME_ROUTES.$URL_Q[0].'/'.__ROUTES__[$URL_Q[0]]['php'];
	}else{
		require_once ROOT_THEME_ROUTES.'404/404.php';
	}

// URL vazia inclui a home
}else{
	require_once ROOT_THEME_ROUTES.'home/home.php';
}

// Footer
if(!pathinfoURLString(__THEME__['footer_pages_disabled'])){
	require_once ROOT_THEME.'inc/footer.php';
}
// Copyright
if(!pathinfoURLString(__THEME__['copyright_pages_disabled'])){
	require_once ROOT_THEME.'inc/copyright.php';
}
require_once ROOT_THEME.'inc/script.php';
ob_end_flush();
_check_filehtaccess();