<?php
/**
 * Endpoint Accounts/Delete
 * @copyright Felipe Oliveira Lourenço - 18.04.2021
 * @version 1.1.0
 */

$Params = [
    'request_void'  => false,   // Requer parametros na requisição. Valida a var global $_REQUEST
    'authorization' => [
        'BasicAuth' => false,    // Requer autenticação com e-mail e senha na header da requisição
        'ApiKey'    => false,    // Requer autenticação com api key passando o token na header da requisição    
    ],    
    'method'        => 'POST' // Indica o método que está esperando
];
require_once './check.modules.php';
//==================================
//======== INICIO DO SCRIPT ========
//==================================

var_dump($_REQUEST);


// Checa o ID para excluir
if(!isset(URL()[3])){
    $Json->encondeJSON([
        "output"    => 'error',
        "bool"      => false,
        "message"   => json_encode($_POST)
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