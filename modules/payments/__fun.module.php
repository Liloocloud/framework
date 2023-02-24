<?php
/**
 * Arquivo de funções alternativas e específicas do módulo de pagamento 
 * para uso em todo o ecossistema de pagamento
 * @copyright Felipe Oliveira Lourenço - 17.07.2020
 */

/**
 * Checa se um item já foi adicionado a tabela 'fle_orders'
 * @param [int] $id [ID do item ]
 * @return [bool] [Retorna true ou false]
 */
function _check_item_in_order($id, $cookie){
	$Add = _get_data_full(
		"SELECT `order_id` FROM `".TB_PAYMENT_ORDERS."` 
		WHERE `order_item_id` =:a
		AND `order_cookies` =:b"
		,"a={$id}&b={$cookie}");
	return (isset($Add[0]))? true : false;
}

/**
 * Checa se o produto é tangivel ou não
 * @param  [type] $id [ID do item que deseja checar]
 * @return [type]     [description]
 */
function _check_item_tangible($id){
	$Item = _get_data_full("
		SELECT `item_tangible` FROM `".TB_ITEMS."` 
		WHERE `item_id` =:a","a={$id}");
	return (isset($Item[0]['item_tangible']) && $Item[0]['item_tangible'] == 0)? false : true;
}

/**
 * Checa em qual local está o usuário se na frontend ou na backend
 * para setar o redirecionamento de acordo com o local, tornando 
 * o redirecionamento generico para o modulo de pagamento
 * @return [bool]
 */
function _check_superadmin_located(){
	return (preg_match("/admin/", $_SERVER['HTTP_REFERER']))? true : false;
}

/**
 * Redireciona para a página de pagamento
 * @return [type] [description]
 */
function _redirect_payment($output=false){
	if(_check_superadmin_located()){
		$url = CONF_REDIRECT_BACKEND_PAY;
	}else{
		$url = CONF_REDIRECT_FRONTEND_PAY;
	}
	if($output){
		echo "<script>window.location.href='{$url}'</script>";
	}else{
		return "<script>window.location.href='{$url}'</script>";
	}
}