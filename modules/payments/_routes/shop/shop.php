<?php
/**
 * Controladora da Rota SHOP onde são ofericidos produto ou serviços
 * @copyright Felipe Oliveira Lourenço - 15.07.2020
 * @version 1.0.0
 */


/** Teste de level DIP */
define('DIP_SWICTH', [
	'1' => true,
	'2' => true,
	'3' => true,
	'4' => true,
	'5' => true,
	'6' => true
]);
echo '<h1>Testando DIP</h1>';

function DIP($param){
	$param = explode(',', $param);
	foreach ($param as $value){
		
	}


	var_dump( $param );
}

_dip_level('1,3,4,6');








/**
 * Para usar esta rota em qualquer parte do ecossistema 
 * será preciso definir qual PATH será utilizada a ROTA se:
 * na dashboard do usuário, se na frontend ou no painel super admin
 */

$Extra = [
	'base' => BASE,
];

$Items = _get_data_table(TB_ITEMS);
$Items = (isset($Items))? $Items : false;
if($Items){

	// Template View (Melhorar esta função para uso Geral)
	$node1 = ElementMount(
		"\[node1\]",
		"\[\/node1\]", 
		file_get_contents($_Module['THIS_MODULE'].'_routes/shop/shop.tpl')
	);
	_tpl_fill($node1['before'], $Extra, '');
	foreach ($Items as $key => $Data) {
		_tpl_fill($node1['content'], $Extra, $Data);
	}
	_tpl_fill($node1['after'], $Extra, '');

}else{
	echo 'Nenhum produto foi cadastrado.';
}