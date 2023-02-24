<?php
/**
 * Arquivo básico de configuração do módulo
 */
$Namespace = 'configs';
$This[$Namespace] = [
	'MODULE_ROOT' => ROOT."modules/{$Namespace}/",
	'MODULE_BASE' => BASE."modules/{$Namespace}/",
	'DASH_ROUTES_ROOT' => ROOT."modules/{$Namespace}/dash/routes/",
	'DASH_ROUTES_BASE' => BASE."modules/{$Namespace}/dash/routes/",
	'URL_ADMIN' => BASE_ADMIN."{$Namespace}/",
	'VERSION' => '2.0.0',
	'DESCRIPTION' => 'Configurações Gerais',
	'TITLE' => 'Configurações',
	'COVER' => BASE."modules/{$Namespace}/img/cover-dash.jpg",
	'ICON' => '<i class="fas fa-cogs"></i>',
	'USER_LEVEL_MIN' => 9,
	'USER_LEVELS' => [
		11 => 'Super administrador',
		10 => 'Administrador',
		9 => 'Gerente',
		8 => 'Editor',
		0 => 'Cliente'
	],
];