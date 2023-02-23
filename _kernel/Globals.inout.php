<?php
/**
 * Arquivo responsável por guardar todas as constantes principais 
 * para o uso na plataform
 * @copyright Felipe Oliveira - 04.01.2021
 * @version 1.0.0
 */

/*******************************************************************
 * CONFIGURAÇÃO DE SERVIDOR DE E-MAIL PARA A CLASS PHPMAILER
 */
define('FLEX_MAIL', [
	'host' 			=> 'mail.liloo.com.br',
	'port' 			=> 465,
	'user' 			=> 'contato@liloo.com.br',
	'pass' 			=> 'Vu-nrEwS(cjH',
	'from_name' 	=> 'Contato pelo Site',
    // Recomendado ser o mesno do user
    'from_email' 	=> 'contato@liloo.com.br',
]);

define('FLEX_CONFIG', [
	// Limite de Tempo total para validação de conta por email
    'time_validation_accout' => 60,

    // Limite de tempo total para redefinição de senha de usuário
    'time_validation_password_redefine' => 60,

    // Limite de tempo total para validação do PIN SMS
    'time_validation_pin' => 10,      

    // Define o level padrão de novos usuário não SUPERADMIN
    'level_user_account' => 8,          

    // Habilitar loader no painel super admin
    'loader_superadmin' => true
]);

/*******************************************************************
 * CONFIGURAÇÕES DE INFORMAÇÕES DO SITE / PROJETO 
 */
define('SITE_CONFIG', [
	'DASHBOARD' => 'meu-painel/'
]);