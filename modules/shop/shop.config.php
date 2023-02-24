<?php
/**
 * Arquivo básico de configuração do módulo
 * @copyright Felipe Oliveira Lourenço - 16.06.2017
 * @version 1.3.0 - 08.09.2022
 */
$Namespace = 'shop';
$This[$Namespace] = [
	'MODULE_ROOT' => ROOT."modules/{$Namespace}/",
	'MODULE_BASE' => BASE."modules/{$Namespace}/",
	'ROUTES_ROOT' => ROOT."modules/{$Namespace}/routes/",
	'ROUTES_BASE' => BASE."modules/{$Namespace}/routes/",
	'URL_ADMIN' => BASE_ADMIN."{$Namespace}/",
	'VERSION' => '1.0.0',
	'DESCRIPTION' => 'Liloo Shop',
	'TITLE' => 'Shop',
	'COVER' => BASE."modules/{$Namespace}/assets/img/cover-dash.jpg",
	'ICON' => '<i class="fal fa-shopping-cart"></i>',
	'USER_LEVEL_MIN' => 9,
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