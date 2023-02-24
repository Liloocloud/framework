<?php
/**
 * Arquivo básico de configuração do módulo
 * @copyright Felipe Oliveira - 05.01.2022
 */

/**
 * Configurações padrões
 */
$Namespace = 'marketing';
$This[$Namespace] = [
	'MODULE_ROOT' => ROOT."modules/{$Namespace}/",
	'MODULE_BASE' => BASE."modules/{$Namespace}/",
	'ROUTES_ROOT' => ROOT."modules/{$Namespace}/routes/",
	'ROUTES_BASE' => BASE."modules/{$Namespace}/routes/",
	'IMAGES_BASE' => BASE."modules/{$Namespace}/assets/img/",
	'URL_ADMIN' => BASE_ADMIN."{$Namespace}/",
	'VERSION' => '1.0.0',
	'DESCRIPTION' => 'Marketing',
	'TITLE' => 'Marketing',
	'COVER' => BASE."modules/{$Namespace}/img/cover-dash.jpg",
	'ICON' => '<i class="fas fa-chart-bar"></i>',
	'USER_LEVEL_MIN' => 10,
	'USER_LEVELS' => [
		11 => 'Super administrador',
		10 => 'Administrador',
		9 => 'Gerente',
		8 => 'Editor',
		0 => 'Cliente'
	]
];

/**
 * Retorna todas as configurações salvas na tabela "liloo_options"
 */
$Configs = _get_data_full(
	"SELECT `opt_meta`,`opt_values` FROM `".TB_OPTIONS."` WHERE `opt_module` =:a 
	AND `opt_account_id` =:b","a={$Namespace}&b={$_SESSION['account_id']}"
);
if(isset($Configs) && !empty($Configs)){
	foreach ($Configs as $Value){
		$This[$Namespace]['OPTIONS'][$Value['opt_meta']] = $Value['opt_values']; 
	}
}


/**
 * Regra de nomenclatura dos canais
 */
$This[$Namespace]['CHANNELS'] = [
	'goa', // Canal - Google Ads
	'fba', // Canal - Facebook Ads
	'fbo', // Canal - Facebook Organico
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
	'tmk', // Canal - Telemarketing
  ];