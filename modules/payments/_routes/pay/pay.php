<?php
/**
 * Controladora da Rota SHOP onde são ofericidos produto ou serviços
 * @copyright Felipe Oliveira Lourenço - 19.07.2020
 * @version 1.0.0
 */

$Extra = [
	'base' => BASE,
	'base_module' => BASE_MODULES.'payment/'
];

// Verificar PAY_ENABLE_CART = se true incluir e povoar a TPL com a lista de produtos escolhidos
// se false = não renderiza a TPL do carrinho

// Verificar PAY_ENABLE_RECURRING = se true inclui a TPL do form que contém as informações
// pertinentes a pagamento recorrente, se false não inclue

// Verifica PAY_ENABLE_DELIVERY = se true renderiza a TPL que calcula o frete do produto
// para incluir na soma do pagamento

// Verifica ORDER_LOGGED = se true mostra preço e botão de comprar se false 
// não mostra

_tpl_fill($_Module['THIS_MODULE'].'_routes/pay/pay.tpl', $Extra, '');