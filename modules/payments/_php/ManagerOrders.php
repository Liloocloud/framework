<?php
/**
 * Arquivo Responsável gerenciar as Ações de Pedidos 
 * @copyright Felipe Oliveira 16.07.2020
 * @version 1.0.0
 */
// header('Access-Control-Allow-Origin: *');
require_once "../../../_Kernel/___Kernel.php";
require_once "../__fun.module.php";
require_once "../presets.php";
require_once "../../../_Kernel/_Sync.inout.php";

/** Para o sistema de pagamento é necessário estar Logado */
if(isset($_SESSION['account_id'])){
	$User = _get_data_full(
		"SELECT `account_id`,`account_email` FROM `".TB_ACCOUNTS."` 
		WHERE `account_id` = '{$_SESSION['account_id']}'
		AND	`account_email` = '{$_SESSION['account_email']}'"
	);
	$User = (isset($User[0]))? $User[0] : false;
}else{
	$User = false;
}

switch ($Action):


	/****************************************************************************
	 * BOTÃO COMPRAR - APÓS CLICAR EM COMPRAR SERÁ CRIADA UM LINHA EM ORDERS PARA ARMAZENAR NO CARRINHO OU 
	 * DIRECIONAR DIRETO PARA A FINALIZAÇÃO DO PAGAMENTO MESMO O USUÁRIO NÃO ESTANDO LOGADO (SETADO EM 
	 * ORDER_LOGGED NA CONFIG), O QUE PERMITIRÁ REALIZAR PEDIDOS DIRETO PELO FRONTEND
	 */
	case 'order_add_item':

	var_dump($Sync);
	exit;


	// $Sync Existe segue
	if($Sync){
		// Checa se o cookie foi gerado, se não ele cria um novo 
		// (tentar manter o mesmo cookie até a finalização da compra)
		if(isset($_COOKIE['OrderAddItem'])){
			$Cookie = $_COOKIE['OrderAddItem'];
		}else{
			setrawcookie('OrderAddItem', $_COOKIE['PHPSESSID'], strtotime('+30 days'), '/');
			$Cookie = $_COOKIE['PHPSESSID'];
		}

		// Verifica se já foi adicionado no carrinho
		// -- se true e CONF_CART true (Este item já está no carrinho)
		// -- se true e CONF_CART false (Redireciona direto para o pagamento)
		if(_check_item_in_order($Sync['array'], $Cookie)){
			if(CONF_CART){
				$JSON['callback'] = _uikit_notification('Este item já está no carrinho', 'success', false);
			}else{
				// $JSON['callback'] = _uikit_notification('Redirect Payment. Já existe', 'info', false);
				$JSON['callback'] = _redirect_payment();
			}

		// -- se false, adiciona o item e se CONF_CART true (Item adicionado ao carrinho)
		// -- se false, adiciona o item e se CONF_CART false (Redireciona direto para o pagamento)
		// OBS.: Ao adicionar item no banco, sempre setar o cookie para que seja possível usá-lo depois
		}else{
			$Sync['order_item_id']	= $Sync['array'];
			$Sync['order_cookies'] 	= $_COOKIE['PHPSESSID'];
			$Sync['order_ip'] 		= _get_client_ip();
			unset($Sync['array']);
			$Set = _set_data_table(TB_PAYMENT_ORDERS, $Sync);
			if($Set){
				if(CONF_CART){
					$JSON['callback'] = _uikit_notification('Item adicionado ao carrinho', 'success', false);
				}else{
					// $JSON['callback'] = _uikit_notification('Redirect Payment. Não existe', 'info', false);
					$JSON['callback'] = _redirect_payment();
				}
			}else{
				$JSON['callback'] = _uikit_notification('Não foi possível adicionar item ao carrinho. Tente novamente.', 'error', false);
			}
		}

	// Erro na solicitação da função OrderAddItem
	}else{
		$JSON['console'] = "Erro ao receber sync: payment/ManagerOrders #".__LINE__;
	}
	break;



	
	

endswitch;
if($JSON!=null)
	echo json_encode($JSON);
