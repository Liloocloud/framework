<?php
/**
 * Responsável por checar a requisição antes de enviar para a switch
 * Este arquivo deve ser incluido em cada arquivo de request para
 * manipular as requisições aos endpoints dos módulos
 * @copyright Felipe Oliveira Lourenço - 18.04.2021
 * @version 1.2.1
 */

require_once dirname(__DIR__)."/_Kernel/___Kernel.php";
use Account\Account;
use Json\Manager;
use Request\Request;
$Json = new Manager;
$Req = new Request($ConfigEndpoint['method']);

header('Content-Type: application/json; charset=UTF-8');

/**
 * Extrai o query enviada pela URL
 * Decodifica a URL
 */
function queryStringDecode($query)
{
    $query = parse_url(URL()[3]);
    $query = parse_str($query['query'], $url);
    return $url;
}

/**
 * Converte um array para um query string
 */
function queryStringArray($query)
{
    return http_build_query($query);
}

// Endpoint aguarda parametros
$Params = null;
if (isset($ConfigEndpoint['params']) && $ConfigEndpoint['params'] == true) {
    if (empty($_REQUEST)) {
        $Json->encondeJSON([
            "output" => 'error',
            "bool" => false,
            "message" => "Nenhum parametro foi enviado para o Endpoint",
        ]);
        exit;
    }
    if (isset($Sync['values'])) {
        $Params = [];
        foreach ($Sync['values'] as $key => $value) {
            if ($key != 'PHPSESSID') {
                $Params[$key] = $value;
            }
        }
        if (empty($Params)) {
            $Json->encondeJSON([
                "output" => 'error',
                "bool" => false,
                "message" => "Endpoint requer parametros. Nenhum parametro foi enviado.",
            ]);
            exit;
        }
    }
}

// Tipo de requisição válida
if ($Req->checkType() === false) {
    $Json->encondeJSON([
        "output" => 'error',
        "bool" => false,
        "message" => "A requisição não é do tipo {$ConfigEndpoint['method']}",
    ]);
    exit;
}

// Checa se $Sync foi setada
if (!isset($Sync)) {
    $Json->encondeJSON([
        "output" => 'error',
        "bool" => false,
        "message" => "Requisição inválida",
    ]);
    exit;
}

// Checa autenticação BasicAuth passando e-mail e senha
if (isset($ConfigEndpoint['authorization']['BasicAuth']) && $ConfigEndpoint['authorization']['BasicAuth'] === true) {
    if (isset($Sync['header']['Authorization'])) {
        $Auth = $Sync['header']['Authorization'];
        $Auth = str_replace('Basic ', '', $Auth);
        $Auth = explode(':', base64_decode($Auth));

        $User = _get_data_table(TB_ACCOUNTS, ['account_email' => $Auth[0]]);
        $Pass = (isset($User[0])) ? $User[0]['account_password'] : false;

        if ($Pass === false) {
            $Json->encondeJSON([
                "output" => 'error',
                "bool" => false,
                "message" => "Autenticação inválida. E-mail incorreto",
            ]);
            exit;
        }

        $Acc = new Account();
        $Acc->password($Auth[1]);
        $Acc->passwordDB($Pass);

        if ($Acc->passVerify() === false) {
            $Json->encondeJSON([
                "output" => 'error',
                "bool" => false,
                "message" => "Autenticação inválida. Senha incorreta",
            ]);
            exit;
        }
    } else {
        $Json->encondeJSON([
            "output" => 'error',
            "bool" => false,
            "message" => "Autenticação inválida. Nenhum dado encontrado ou a requisição não solicita Basic Auth",
        ]);
        exit;
    }
}

// Checa autenticação via API Key passando o token
if (isset($ConfigEndpoint['authorization']['ApiKey']) && $ConfigEndpoint['authorization']['ApiKey'] === true) {
    if (isset($Sync['header']['token'])) {
        $Key = 'Liloo Plataform E#3 ?$}]&[3>5[==\'&.&*)}+]3/';
        $User = _get_data_table(TB_ACCOUNTS, ['account_token' => hash_hmac('ripemd160', $Key, $Sync['header']['token'])]);
        $User = (isset($User[0])) ? true : false;
        if (!$User) {
            $Json->encondeJSON([
                "output" => 'error',
                "bool" => false,
                "message" => "Autenticação inválida. Token incorreto",
            ]);
            exit;
        }
    } else {
        $Json->encondeJSON([
            "output" => 'error',
            "bool" => false,
            "message" => "Autenticação inválida. Nenhum token encontrado ou a requisição não solicita Api Key",
        ]);
        exit;
    }
}
