<?php
/**
 * Endpoint Accounts/Delete
 * @copyright Felipe Oliveira Lourenço - 18.04.2021
 * @version 1.1.0
 */

$Params = [
    'request_void'  => false,   // Requer parametros na requisição. Valida a var global $_REQUEST
    'authorization' => [
        'BasicAuth' => true,    // Requer autenticação com e-mail e senha na header da requisição
        'ApiKey'    => true,    // Requer autenticação com api key passando o token na header da requisição    
    ],    
    'method'        => 'DELETE' // Indica o método que está esperando
];
require_once './check.modules.php';

// Checa o ID para excluir
if(!isset(URL()[3])){
    $Json->encondeJSON([
        "output"    => 'error',
        "bool"      => false,
        "message"   => "Nenhum ID foi passado pelo POST"
    ]);
    exit;
}

// Entrega de dados
$JSON = [
	"output"    => 'success',
	"bool"      => true,
	"message"   => "Conta excluída com sucesso. Lembrando que isso é so um teste",
    // $Sync['header']
];