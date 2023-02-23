﻿<?php
/**
 * Retorna lista de cidades, bairros e estados
 * @copyright Felipe Oliveira - 11.04.2021
 * @see Update 08.02.2023
 * @version 1.3.2
 */
$ConfigEndpoint = [
    
    /**
     * Se deseja que a requisição possua parametros configura para 'true'
     * Ela valida a variável global $_REQUEST
     * @param Bool true ou false
     */
    'params' => true,

    /**
     * Ativa o recurso de autenticação da requisição. 
     * Os tipos disponíveis são 'BasicAuth' e 'ApiKey'
     * @param Bool true ou false para o tipo que deseja configurar
     */
    'authorization' => [

        /** 
         * Requer autenticação com e-mail e senha na header da requisição
         */
        'BasicAuth' => false,

        /**
         * Requer autenticação com api key passando o token na header da requisição
         */
        'ApiKey' => false, 
    ],

    /**
     * Valida o método que está esperando na requisição.
     * Os métodos possíveis são: 
     * GET, POST, PUT, PATCH, DELETE, COPY, HEAD, OPTIONS, LINK, UNLINK, PURGE, LOCK, UNLOCK, PROPFIND e VIEW
     * Os mais comuns são: GET, POST, PUT, PATCH e DELETE
     * @param String Tipo de requisição
     */
    'method' => 'GET',

    /**
     * Parametro 'case' na requisição. Esse parametro é ideal para casos
     * onde a requisição possua 'switch' com diversos recursos. Não é muito comum, 
     * mas haverá casos em seu uso será necessário. Por padrão 'false'
     * @param Bool true ou false
     */
    'case' => false
];
$ROOT = str_replace( '\\', '/', dirname( dirname(__DIR__) ) .'/');
require_once $ROOT.'api/check.modules.php';

/*********************************************************************************
 * SCRIPT DE RETORNA DA REQUISIÇÃO 
 * sempre retorno com o método $Json->encodeJSON()
 * passando Dip num array ex.:
 * $JSON->encodeJSON([
 *      'bool' => true,
 *      'message' => 'Mensagem',
 *      'output' => Retorno
 * ]);
 */

$Dist = (isset($Params['district'])) ? true : false;
$Limit = (isset($Params['limit']) && $Params['limit'] != '') ? ' LIMIT ' . $Params['limit'] : '';

if (!$Dist) {
    $Json->encondeJSON([
        "bool" => false,
        "output" => null,
        'message' => "Endpoint requer o parametro 'district' com o termo de busca da cidade",
    ]);
    exit;
}

$Districties = _get_data_full(
    "SELECT * FROM `" . TB_LOCATIONS_DISTRICTS . "`
    WHERE `district_name` LIKE '" . $_GET['district'] . "%'" . $Limit . "");

$Itens = [];
if ($Districties) {
    foreach ($Districties as $item) {
        array_push($Itens, $item['district_name']);
    }
    $Districties = $Itens;
} else {
    $Districties = $Itens;
}

if (!$Districties) {
    $JSON = [
        'bool' => false,
        'message' => "Nenhuma cidade encontrada",
        'output' => null,
    ];
} else {
    $JSON = [
        'bool' => true,
        'message' => count($Districties) . " bairros encontrados",
        'output' => $Itens,
    ];
}
