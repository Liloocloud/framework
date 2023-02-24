<?php
/**
 * Arquivo básico de configuração do módulo
 */

define('TB_MATRIX', 'liloo_matrix');
define('TB_MATRIX_ITEMS', 'liloo_matrix_items');
define('TB_MATRIX_PIPELINE', 'liloo_matrix_pipeline');
define('TB_MATRIX_COWORKERS', 'liloo_matrix_coworkers');
define('TB_MATRIX_COWORKER_CATEGORY', 'liloo_matrix_coworker_category');

$Namespace = 'crm';
$This[$Namespace] = [
	'MODULE_ROOT' => ROOT."modules/{$Namespace}/",
	'MODULE_BASE' => BASE."modules/{$Namespace}/",
	'ROUTES_ROOT' => ROOT."modules/{$Namespace}/routes/",
	'ROUTES_BASE' => BASE."modules/{$Namespace}/routes/",
	'URL_ADMIN' => BASE_ADMIN."{$Namespace}/",
	'VERSION' => '2.0.0',
	'DESCRIPTION' => 'Gestão de contas de usuários do sistema',
	'TITLE' => 'CRM',
	// 'COVER' => BASE."modules/{$Namespace}/img/cover-dash.jpg",
	'ICON' => '<i class="fas fa-map-signs"></i>',
	'USER_LEVEL_MIN' => 8,
	'USER_LEVELS' => [
		11 => 'Super administrador',
		10 => 'Administrador',
		9 => 'Gerente',
		8 => 'Editor',
		0 => 'Cliente'
	],
	'ADDS' => [
		// Limite de Tempo total para validação de conta por email
		'time_validation_account' 			=> 60,
		// Limite de tempo total para redefinição de senha de usuário
		'time_validation_password_redefine' => 60,
		// Limite de tempo total para validação do PIN SMS
		'time_validation_pin' 				=> 10,
		// Define o level padrão de novos usuário não SUPERADMIN
		'level_user_account' 				=> 8,
	]
];