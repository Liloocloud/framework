<?php
/**
 * Configuração do módulo 'locations'
 * @copyright Felipe Oliveira - 08.02.2023
 * @version 1.0.0
 */
$Namespace = 'locations';
$This[$Namespace] = [
	'MODULE_ROOT' => ROOT."modules/{$Namespace}/",
	'MODULE_BASE' => BASE."modules/{$Namespace}/",
	'ROUTES_ROOT' => ROOT."modules/{$Namespace}/routes/",
	'ROUTES_BASE' => BASE."modules/{$Namespace}/routes/",
	'IMAGES_BASE' => BASE."modules/{$Namespace}/assets/img/",
	'URL_ADMIN' => BASE_ADMIN."{$Namespace}/",
	'VERSION' => '1.0.0',
	'DESCRIPTION' => 'API de Localizações',
	'TITLE' => 'Localizações',
	'COVER' => BASE."modules/{$Namespace}/img/cover-dash.jpg",
	'ICON' => '<i class="fad fa-map-marker-alt"></i>',
	'USER_LEVEL_MIN' => 10,
	'USER_LEVELS' => [
		11 => 'Super administrador',
		10 => 'Administrador',
		9 => 'Gerente',
		8 => 'Editor',
		0 => 'Cliente'
	]
];