<?php
/**
 * Arquivo básico de configuração do módulo
 */
$Namespace = 'orders';
$This[$Namespace] = [
	'MODULE_ROOT' => ROOT."modules/{$Namespace}/",
	'MODULE_BASE' => BASE."modules/{$Namespace}/",
	'DASH_ROUTES_ROOT' => ROOT."modules/{$Namespace}/dash/routes/",
	'DASH_ROUTES_BASE' => BASE."modules/{$Namespace}/dash/routes/",
	'URL_ADMIN' => BASE_ADMIN."{$Namespace}/",
	'VERSION' => '2.0.0',
	'DESCRIPTION' => 'Gestão de Pedidos',
	'TITLE' => 'Representante',
	'COVER' => BASE."modules/{$Namespace}/img/cover-dash.jpg",
	'ICON' => '<i class="fas fa-calendar-check"></i>',
	'USER_LEVEL_MIN' => 10,
	'USER_LEVELS' => [
		11 => 'Super administrador',
		10 => 'Administrador',
		9 => 'Gerente',
		8 => 'Editor',
		0 => 'Cliente'
	],
	'ADDS' => [
		// Limite de Tempo total para validação de conta por email
		'time_validation_accout' 			=> 60,
		// Limite de tempo total para redefinição de senha de usuário
		'time_validation_password_redefine' => 60,
		// Limite de tempo total para validação do PIN SMS
		'time_validation_pin' 				=> 10,
		// Define o level padrão de novos usuário não SUPERADMIN
		'level_user_account' 				=> 8,
	]
];