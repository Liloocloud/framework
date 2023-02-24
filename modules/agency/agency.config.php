<?php
/**
 * Tabelas do Projeto
 */
define('TB_MATRIX', 'liloo_matrix');
define('TB_MATRIX_ITEMS', 'liloo_matrix_items');
define('TB_MATRIX_PIPELINE', 'liloo_matrix_pipeline');
define('TB_MATRIX_COWORKERS', 'liloo_matrix_coworkers');
define('TB_MATRIX_COWORKER_CATEGORY', 'liloo_matrix_coworker_category');

/**
 * Arquivo básico de configuração do módulo
 */
$Namespace = 'agency';
$This[$Namespace] = [
	'MODULE_ROOT' => ROOT."modules/{$Namespace}/",
	'MODULE_BASE' => BASE."modules/{$Namespace}/",
	'DASH_ROUTES_ROOT' => ROOT."modules/{$Namespace}/dash/routes/",
	'DASH_ROUTES_BASE' => BASE."modules/{$Namespace}/dash/routes/",
	'URL_ADMIN' => BASE_ADMIN."{$Namespace}/",
	'VERSION' => '2.0.0',
	'DESCRIPTION' => 'Gestão de contas de usuários do sistema',
	'TITLE' => 'Conta de usuário',
	'COVER' => BASE."modules/{$Namespace}/img/cover-dash.jpg",
	'ICON' => '<i class="fas fa-sitemap"></i>',
	'USER_LEVEL_MIN' => 7,
	'USER_LEVELS' => [
		11 => 'Super administrador',
		10 => 'Administrador',
		9 => 'Gerente',
		8 => 'Editor',
		7 => 'Colaborador',
		6 => 'Cliente'
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


$Extra['DASH_ROUTES_BASE'] = $This[$Namespace]['DASH_ROUTES_BASE'];
$Extra['MODULE_BASE'] = $This[$Namespace]['MODULE_BASE'];
$Extra['URL_ADMIN'] = $This[$Namespace]['URL_ADMIN'];