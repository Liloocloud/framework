<?php
/**
 * Credenciais e Configurações do Sistema de Pagamento PayU
 * @copyright Felipe Oliveira Lourenço 10.07.2020
 */

/** CONFIGURAÇÕES BÁSICAS */
// Pagamentos por Produto ou Montante
// Consultas com API
// Pagamentos Recorrentes
// Cancelamento ou reembolso

$THIS = [
	'using' => 'production', // incluir sandbox | production
	'lang' => 'PT', 
	'currency' => 'BRL',
	'url_return' => 'https://vamove.com.br/admin/payment/transactions/',
	
	// SANDBOX
	'api_key_sandbox' => '4Vj8eK4rloUd272L48hsrarnUA',
	'api_login_sandbox' => 'pRRXKOl8ikMmt9u',
	'account_id_sandbox' => '512327',
	'merchant_id_sandbox' => '508029',

	'url_payment_sandbox' => 'https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi',
	'url_consult_sandbox' => 'https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi',
	'url_recurring_sandbox' => 'https://sandbox.api.payulatam.com/payments-api/',
	'url_refund_sandbox' => 'https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi',

	// PRODUCTION
	'api_key_production' => 'Fqa2x6TVwCj2Rs2OBA0Qn0UVLR',
	'api_login_production' => 'yUAJV4Eybs7g9K3',
	'account_id_production' => '853594',
	'merchant_id_production' => '846085',

	'url_payment_production' => 'https://api.payulatam.com/payments-api/4.0/service.cgi',
	'url_consult_production' => 'https://api.payulatam.com/reports-api/4.0/service.cgi',
	'url_recurring_production' => 'https://api.payulatam.com/payments-api/',
	'url_refund_production' => 'https://api.payulatam.com/payments-api/4.0/service.cgi',

];


/**
 * Configurações
 */

if($THIS['using'] == 'sandbox'){

	define('PAYU_CONFIGS', [
		'URL_PAYMENT' 	=> $THIS['url_payment_sandbox'],		
		'URL_CONSULT' 	=> $THIS['url_consult_sandbox'], 
		'URL_RECURRING' => $THIS['url_recurring_sandbox'], 
		'URL_REFUND'	=> $THIS['url_refund_sandbox'], 
		'API_KEY'		=> $THIS['api_key_sandbox'],
		'API_LOGIN'		=> $THIS['api_login_sandbox'],
		'ACCOUNT_ID'	=> $THIS['account_id_sandbox'],
		'MERCHANT_ID'	=> $THIS['merchant_id_sandbox'],
		'LANG'			=> $THIS['lang'],
		'CURRENCY'		=> $THIS['currency'],
		'TEST'			=> true,
		'USING'			=> $THIS['using'],
		'URL_RETURN'	=> $THIS['url_return']
	]);

}else{

	define('PAYU_CONFIGS', [
		'URL_PAYMENT' 	=> $THIS['url_payment_production'],		
		'URL_CONSULT' 	=> $THIS['url_consult_production'], 
		'URL_RECURRING' => $THIS['url_recurring_production'], 
		'URL_REFUND'	=> $THIS['url_refund_production'], 
		'API_KEY'		=> $THIS['api_key_production'],
		'API_LOGIN'		=> $THIS['api_login_production'],
		'ACCOUNT_ID'	=> $THIS['account_id_production'],
		'MERCHANT_ID'	=> $THIS['merchant_id_production'],
		'LANG'			=> $THIS['lang'],
		'CURRENCY'		=> $THIS['currency'],
		'TEST'			=> false,
		'USING'			=> $THIS['using'],
		'URL_RETURN'	=> $THIS['url_return']
	]);

}

/**
 * Includes
 */
require_once PATH_MODULE."payment/gateways/PayU/__functions.inc.php";
require_once PATH_MODULE.'payment/gateways/PayU/PayUSlim.class.php';