<?php
/**
 * Método que cria uma nova conta de usuário com pelo meno o e-mail sendo obrigatório
 * @copyright Felipe Oliveira - 11.04.2021
 * @version 1.0.2
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$ConfigEndpoint = [
    'params'        => true,   // Requer parametros na requisição. Valida a var global $_REQUEST
    'authorization' => [
        'BasicAuth' => false,   // Requer autenticação com e-mail e senha na header da requisição
        'ApiKey'    => false,   // Requer autenticação com api key passando o token na header da requisição    
    ],
    'method'        => 'GET',  // Indica o método que está esperando 
    'case'          => false,    // Requer que o parametro 'case' seja obrigatório
];
require_once './check.modules.php';

/**
 * Output
 * Todos os retorno são obrigatório
 * Use a variável $JSON passando os índices 
 * bool, output e message 
 * Todos são obrigatórios
 */


// if(!isset($Params['case'])){
//     $Json->encondeJSON([
//         "bool"      => false,
//         "output"    => null,
//         'message' => "Endpoint requer o parametro 'case'"
//     ]);
//     exit;
// }

    
/****************************************************************************
 * RETORNA POR PARAMETRO ID PASSADO
 */
$Name   = (isset($Params['name']))? true : false;
$Id     = (isset($Params['id']))? true : false;
if($Name && $Id){
    $Where = "WHERE `tax_name` LIKE '%{$Params['name']}%' OR `tax_id` LIKE '{$Params['id']}'";
}elseif($Name && $Id == false){
    $Where = "WHERE `tax_name` LIKE '%{$Params['name']}%'";
}elseif($Name == false && $Id){
    $Where = "WHERE `tax_name` LIKE '{$Params['id']}'";
}


$Categs = _get_data_full(
    "SELECT 
    `tax_id`,
    `tax_name`,
    `tax_meta`,
    `tax_inner_id`,
    `tax_description`,
    `tax_active`,
    `tax_status`
    FROM `".TB_TAXONOMIES."` ".$Where
    );

if(!$Categs){
    $JSON = [
        'bool' => false,
        'message' => "Nenhuma categoria encontrada",
        'output' => null
    ];
}else{
    $JSON = [
        'bool' => true,
        'message' => count($Categs)." Categorias encontradas",
        'output' => $Categs
    ];
}