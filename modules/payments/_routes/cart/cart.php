<?php
/**
 * Controladora da Rota CART onde são listados produto ou serviços
 * @copyright Felipe Oliveira Lourenço - 22.07.2020
 * @version 1.0.0
 */

/** Código para Backend */
if(isset(URL()[0]) && URL()[0] == 'admin'){
	// if(isset(URL()[3])){

		$Orders = _get_data_table(TB_PAYMENT_ORDERS,
			['order_cookies' => $_COOKIE['OrderAddItem']]
		);
		var_dump(
			$Orders,
			$_COOKIE['OrderAddItem'],
			URL()
		);
		
		$Extra = [
			'base' => BASE,
			'base_module' => BASE_MODULES.'payment/'
		];
		_tpl_fill($_Module['THIS_MODULE'].'_routes/cart/cart.tpl', $Extra, '');




	// }else{
	// 	echo 'Nehum pedido foi selecionado (Rediracionar para o Shop)';
	// }

	/** Captura a order a ser paga */
	// Verificar se a ordem existe para 
	// Pega todos os produtos/serviços da ordem e lista na lateral esquerda
	// Garantir que a ordem ainda não foi paga
	// Realizar os calculos de frete caso haja
	// Realizar os calculos de soma
	// enviar a solicitação para a API do PayU


	/** Código para Frontend */
}else{
	var_dump($_SESSION, URL()[2]);
}