<?php
/**
 * Sistema SYNC Nativo. O uso é expecífico para o CRUD onde recebe o POST e converte em Array deixando no escopo do arquivo
 * @copyright Felipe Oliveira Lourenço - 01.05.2020
 * @version 1.2.1
 * @see  Desenvolver filtros mais potentes para evitar o ataque. Atenção nas requisições em Ajax vindas de Flex.RequestSender()
 */

$Data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS); // FILTER_DEFAULT
if (isset($Data['alldata'][0]['name']) && $Data['alldata'][0]['name'] == 'action') {
    $Action = $Data['alldata'][0]['value'];
} else {
    $Action = 'nda';
}
if (isset($Data['alldata'][0])) {unset($Data['alldata'][0]);}
if (isset($Data['alldata'][1])) {unset($Data['alldata'][1]);}
$i = 2;
foreach ($Data['alldata'] as $value) {
    if (in_array($Data['alldata'][$i]['name'], $Data['alldata'][$i])) {
        $Sync[$Data['alldata'][$i]['name']] = $Data['alldata'][$i]['value'];
        if (!is_array($Sync)) {
            $Sync = array_map("strip_tags", $Sync);
            $Sync = array_map("trim", $Sync);
        }
    }
    $i++;
}

if (empty($Sync)) {
    $Sync = 'Crie pelo meno um input com name=""';
}
unset($Data);
$JSON = null;
