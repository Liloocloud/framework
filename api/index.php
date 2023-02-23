<?php
/**
 * Camada que recebe requisições ajax para manipulação e abstração dos módulos em API.
 * @copyright Felipe Oliveira Lourenço - 11.04.2021
 * @version 1.1.0
 */

require_once '../_Kernel/___Kernel.php';
header('Access-Control-Allow-Origin: http://localhost');
header('Access-Control-Allow-Origin: https://liloo.com.br');
header('Content-Type: application/json; charset=UTF-8');

$Msg = new Json\Manager;

// Monta a sync para uso dentro do case
$Sync = [
    'header'    => getallheaders(),
    'values'    => $_REQUEST,
    'endipoint' => [
        'method'    => filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_ENCODED),
        'module'    => (isset(URL()[1]))? URL()[1] : false,
        'action'    => (isset(URL()[2]))? URL()[2] : false
    ],
    'session'   => $_SESSION,
    'auth'      => [
        'user'      => (isset($_SERVER['PHP_AUTH_USER']))? $_SERVER['PHP_AUTH_USER'] : false,
        'pass'      => (isset($_SERVER['PHP_AUTH_PW']))? $_SERVER['PHP_AUTH_PW'] : false,
    ],
];  

$Module = $Sync['endipoint']['module'];
$Action = $Sync['endipoint']['action'];

/**
 * Verifica se o módulo foi setado na URL. Se não para a execução
 * o Módulo passado é o nome da pasta do módulo na 
 * pas /modules/ do sistema
 */
if ($Module === false) {
    $Msg->encondeJSON([
        "bool" => false, 
        "output" => null, 
        "message" => "Módulo \"{$Module}\" indefinido ou Inexistente"
    ]);
    exit;
}

/**
 * Verifica se uma case foi setado. Esse "case" nada mais é 
 * do que o a verificação do arquivo.php correspondente a
 * requisição passado pelo parameto action
 */
if ($Action == false) {
    $Msg->encondeJSON([
        "bool" => false, 
        "output" => null, 
        "message" => "Ação indefinida. Case não existe"
    ]);
    exit;
}

/**
 * REQUEST - APIS POR MÓDULOS 
 * Verifica se a pasta do Módulo Existe no sistema
 * Caso não Exista tentará usar a API Global e por fim, 
 * se também não encontrar dispara a mensagem
 * Para isso irá usar a mesma variavel 'modulo' da requisição
 */
if(!file_exists(ROOT.'modules/'.$Module.'/')){
    
    // Verificar se a API Global existe 
    if( !file_exists(ROOT.'api/'.$Module.'/') ){
        $Msg->encondeJSON([ 
            "bool" => false, 
            "output" => null, 
            "message" => "Api Nativa Indefinida" 
        ]);
        exit;
    }

    // Verifica a Ação da API Global
    if( !file_exists(ROOT.'api/'.$Module.'/'.$Action.'.php') ){
        $Msg->encondeJSON([ 
            "bool" => false, 
            "output" => null, 
            "message" => "Ação do Módulo Global indefinida. Case não existe" 
        ]);
        exit;
    }

    // Acessando a EndPoint
    @include ROOT.'api/'.$Module.'/'.$Action.'.php';
    // if(file_exists(ROOT.'api/'.$Module.'/'.$Action.'.php')){
    // }else{
    //     $Msg->encondeJSON([ "output" => null, "bool" => false, "message" => "Acesso inválido. Endpoint não encontrada" ]);
    //     exit;
    // }

/**
 * REQUEST - APIS POR MÓDULOS 
 * O sistema irá utilizado os recursos de API dos módulos
 * Instalados, caso o nome do módulo não exista o sistema
 * Tentará utilizar as APIs Nativa antes de finalizar a Requisição
 */
}elseif(!file_exists(ROOT.'modules/'.$Module.'/api/'.$Action.'.php')){
    $Msg->encondeJSON([
        "output"    => null,
        "bool"      => false,
        "message"   => "Acesso inválido. Endpoint não encontrada"
    ]);
    exit;

}elseif(file_exists(ROOT.'modules/'.$Module.'/api/'.$Action.'.php')){
    @include ROOT.'modules/'.$Module.'/api/'.$Action.'.php';

}else{
    $Msg->encondeJSON([
        "bool" => false, 
        "output" => null, 
        "message" => "Módulo Indefinido" 
    ]);
    exit;
}

/**
 * Renderização final
 */
if (isset($JSON) && $JSON != null) {
    echo json_encode($JSON);
}

/**
 * No Conflit Var
 */
unset(
    $Module,
    $Action,
    $Sync,
    $JSON
);