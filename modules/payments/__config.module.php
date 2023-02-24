<?php
/**
 * Módulo de Pagamento Mult-Plataforma
 * Arquivo de configuração obrigatório
 * @copyright Felipe Oliveira Lourenço - 09.07.2020
 * @version 1.0.1
 */

$Namespace 		= 'payment';
$Nametitle 		= 'Pagamento';
$Link 			= BASE_ADMIN.$Namespace."/";
$SubMenu 		= true;

$_Module[$Namespace] = [
	'ICON_MODULE' 			=> '<i class="far fa-address-card"></i>',
	'ROUTE_MODULE' 			=> '../_Modules/'.$Namespace.'/',
	'THIS_MODULE' 			=> ROOT.'_Modules/'.$Namespace.'/',
	'NAME_MODULE' 			=> $Nametitle,
	'ACTION_MODULE' 		=> $Link,
	'USER_LEVEL' 			=> 10,
	'SUB_MENU' 				=> $SubMenu,
];

/**
 * Níveis de permissão para o menu
 */
if(isset($_SESSION['account_level']) && $_SESSION['account_level'] == 11){
	$_Module[$Namespace]['SIDEBAR'] = [
		'Transações' => $Link.'transactions/',
		'Loja' => $Link.'shop/',
		'Configurações' => $Link.'settings/'
	]; 
}else{
	$_Module[$Namespace]['SIDEBAR'] = [
		'Transações' => $Link.'transactions/',
		'Loja' => $Link.'shop/'
	]; 
}

/**
 * Declaração de rotas do Módulo
 */
if(isset($_SESSION['account_level']) && $_SESSION['account_level'] == 11){
	$_Module[$Namespace]['ROUTES'] = [
		'transactions'  => ['php' => 'transactions.php'],
		'shop' 			=> ['php' => 'shop.php'],
		'pay'			=> ['php' => 'pay.php'],
		'settings'		=> ['php' => 'settings.php'],
		'cart'			=> ['php' => 'cart.php']
	];
}else{
	$_Module[$Namespace]['ROUTES'] = [
		'transactions'  => ['php' => 'transactions.php'],
		'shop' 			=> ['php' => 'shop.php'],
		'pay'			=> ['php' => 'pay.php'],
		'cart'			=> ['php' => 'cart.php']
	];
}

/**
 * Nomenclatura dos Título dos módulos
 */
$uri = (isset(URL()[2]))? URL()[2] : 'account-access';
switch ($uri):
	// Página de transações
	case 'transactions':	
	$Title = 'Transações de pagamento'; 
	break;

	// Página do shopping
	case 'shop':		
	$Title = 'Produtos oferecidos'; 
	break;
	
	// Página de pagamento
	case 'pay':				
	$Title = 'Pagamento';
	break;
	
	// Página de configuração
	case 'settings':
	if($_SESSION['account_level'] == 11){
		$Title = 'Configurações de pagamento'; 
	}else{
		header('Location: '.BASE_ADMIN);
	}
	break;

endswitch;
$_Module[$Namespace]['NAME_CURRENT'] = $Title;



/**************************************************************************
 * INCLUDE DEPENDENCIAS
 *************************************************************************/
define('MODULE_ASSETS', [
	'js_superadmin' => true, // Habilita o arquivo JS do módulo no painel super admin
	'js_frontend' => true, // Habilita o arquivo JS do módulo na frontend
	'js_path' => BASE_MODULES.'payment/payment.js' // Caminho absoluto do arquivo
]);


/**
 * Controle das Constantes nativas do modulo
 * em conjunto com as configurações da table configs
 */
$__CONFIGS__[$Namespace] = _get_data_table(TB_CONFIGS);
$__CONFIGS__[$Namespace] = (isset($__CONFIGS__[$Namespace]))? $__CONFIGS__[$Namespace] : false;
if($__CONFIGS__[$Namespace]){
	foreach ($__CONFIGS__[$Namespace] as $value){
		switch ($value['config_type']) {
			// CONST DO TIPO BOOL
			case 'bool':
			$Bool = ($value['config_value'] == 'true')? true : false;
			define($value['config_meta'],  $Bool);
			break;
			// CONST DO TIPO URL (RETORNA UMA URL)
			case 'url':
			$String = (is_string($value['config_value']))? $value['config_value'] : '';
			define($value['config_meta'],  $String);
			break;
		}
	}

}else{
	define('CONF_CART', false);
	define('CONF_RECURRING', false);
	define('CONF_COINS', true);
	define('CONF_DELIVERY', false);
	define('CONF_LOGGED', true);
	define('CONF_BUYERS', true);
	// Retorno de pagamento dentro do superadmin
	define('CONF_REDIRECT_BACKEND_RETURN', BASE_ADMIN.'payment/obrigado/');
	// Retorno de pagamento dentro da frontend
	define('CONF_REDIRECT_FRONTEND_RETURN', BASE.'payment/obrigado/');
	// Redireciona o usuário para o pagamento dentro do superadmin
	define('CONF_REDIRECT_BACKEND_PAY', BASE_ADMIN.'payment/pay/');
	// Redireciona o usuário para o pagamento dentro da frontend
	define('CONF_REDIRECT_FRONTEND_PAY', BASE.'meu-painel/pagamento/');	
}

/**************************************************************************
 * Motor de instalação
 * Onde ele verifica se existe a tabela no banco 
 * de dados e, se não existir cria para garantir
 * o pleno funcionamento do módulo
 *************************************************************************/
/*
$Data = (bool) _get_data_full("SHOW TABLES LIKE '%".$DBSA."%'");
if($Data === false):
	$servername = DB_HOST;
	$username = DB_USER;
	$password = DB_PASS;
	$dbname = DB_DBSA;
	$sql = file_get_contents($_Module[$Namespace]['ROUTE_MODULE'].'database.sql');
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->exec($sql);
		$msg = new disparaMSG();
		$msg->msgSucesso("Tabela do módulo \"".$Nametitle."\" criada com sucesso!");
	}
	catch(PDOException $e){
		_ERROR($sql."<br>".$e->getMessage());
	}
	$conn = null;
//else:
	//_ERROR('Não foi possível criar a tabela!');
endif;
*/