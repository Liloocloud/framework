<?php
/**
 * Método que cria uma nova conta de usuário com pelo meno o e-mail sendo obrigatório
 * @copyright Felipe Oliveira - 11.04.2021
 * @version 1.0.2
 */

$Params = [
    // Requer parametros na requisição. Valida a var global $_REQUEST
    'request_void'  => false,
    // Requer autenticação com usuário e senha na header da requisição
    'authorization' => true,
    // Indica o método que está esperando 
    'method'        => 'POST'
];
require_once './check.modules.php';

// Entrega de dados
$JSON = [
	"output"    => _get_data_table(TB_ACCOUNTS),
	"bool"      => true,
	"message"   => "Conta de usuário criada com sucesso"
];
// $JSON['json'] = $Sync;
// $JSON['entities'] = _get_data_table(TB_ACCOUNT_ENTITIES);