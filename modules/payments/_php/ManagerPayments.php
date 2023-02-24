<?php
/**
 * Arquivo Responsável gerenciar as Ações de Pagamento
 * @copyright Felipe Oliveira 15.07.2020
 * @version 1.0.0
 */
// header('Access-Control-Allow-Origin: *');
require_once "../../../_Kernel/___Kernel.php";
require_once "../presets.php";
// require_once "../fun.php";
require_once "../../../_Kernel/_Sync.inout.php";

/** Para o sistema de pagamento é necessário estar Logado */
if(isset($_SESSION) && $_SESSION['account_id']){
	$User = _get_data_full(
		"SELECT `account_id`,`account_email` FROM `".TB_ACCOUNTS."` 
		WHERE `account_id` = '{$_SESSION['account_id']}'
		AND	`account_email` = '{$_SESSION['account_email']}'"
		);
	$User = (isset($User[0]))? true : false;
}else{
	$User = false;
}


switch ($Action):


	/****************************************************************************
	 * BOTÃO COMPRAR - APÓS CLICAR EM COMPRAR SERÁ CRIADA UM LINHA EM ORDERS
	 * PARA ARMAZENAR NO CARRINHO OU DIRECIONAR DIRETO PARA A FINALIZAÇÃO DO PAGAMENTO
	 */
	case 'payment_buy_button':

	if($User){

	}else{
		$JSON['callback'] = 'Você precisa estar logado';
	}



	// verificar se está logado se não manda mensagem 
	// filtrar dados de entreda
	// inserir item no tabela order
	// verificar se diretivas (USER_CART, USER_RECURRING E USER _UNIQUE) estão true ou false
	// seguir as diretivas na switch para:
	// -- se PAY_ENABLE_CART (adicionar as carrinho e notificar)
	// -- se PAY_ENABLE_RECURRING (redirecionar para a tpl que capta infos de recorrencia)
	// -- se PAY_ENABLE_COINS (talvez usar esse recurso na finalização)
	// mandar as mensagens



	$JSON['callback'] = 'Estamos aqui payment_buy_button';

	// $JSON['array'] = [
	// 	0 => [
	// 		'element' => '#budget_district',
	// 		'content' => $select
	// 	]
	// ];

	break;



endswitch;
if($JSON!=null)
	echo json_encode($JSON);