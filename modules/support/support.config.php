<?php
/**
 * Arquivo básico de configuração do módulo
 * @copyright Felipe Oliveira - 07.02.2023
 * @version 1.0.0
 */
$Namespace = 'support';
$This[$Namespace] = [
	'MODULE_ROOT' => ROOT."modules/{$Namespace}/",
	'MODULE_BASE' => BASE."modules/{$Namespace}/",
	'DASH_ROUTES_ROOT' => ROOT."modules/{$Namespace}/dash/routes/",
	'DASH_ROUTES_BASE' => BASE."modules/{$Namespace}/dash/routes/",
	'URL_ADMIN' => BASE_ADMIN."{$Namespace}/",
	'VERSION' => '1.0.0',
	'DESCRIPTION' => 'Suporte ao Cliente',
	'TITLE' => 'Suporte',
	'COVER' => BASE."modules/{$Namespace}/img/cover-dash.jpg",
	'ICON' => '<i class="far fa-question-circle"></i>',
	'USER_LEVEL_MIN' => 10,
	'USER_LEVELS' => [
		11 => 'Super administrador',
		10 => 'Administrador',
		9 => 'Gerente',
		8 => 'Editor',
		0 => 'Cliente'
	],
];