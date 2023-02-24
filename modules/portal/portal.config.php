<?php
/**
 * Arquivo básico de configuração do módulo
 */
$Namespace = 'portal';
$This[$Namespace] = [
	'MODULE_ROOT' => ROOT."modules/{$Namespace}/",
	'MODULE_BASE' => BASE."modules/{$Namespace}/",
	'DASH_ROUTES_ROOT' => ROOT."modules/{$Namespace}/routes/",
	'DASH_ROUTES_BASE' => BASE."modules/{$Namespace}/routes/",
	'URL_ADMIN' => BASE_ADMIN."{$Namespace}/",
	'VERSION' => '2.0.0',
	'DESCRIPTION' => 'Gestão do Portal',
	'TITLE' => 'Portal',
	'COVER' => BASE."modules/{$Namespace}/img/cover-dash.jpg",
	'ICON' => '<i class="fa fa-bullhorn"></i>',
	'USER_LEVEL_MIN' => 8,
	'USER_LEVELS' => [
		11 => 'Super administrador',
		10 => 'Administrador',
		9 => 'Gerente',
		8 => 'Editor',
		0 => 'Cliente'
	]
];