<?php
/**
 * Recebe e sincroniza a requisição do fetch API
 * feito pelo lilooJSv3.js
 * @copyright Felipe Oliveira Lourenço - 29.04.2022
 */
// $Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// $Data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
// $Data = json_decode(key($_POST), true);
$Data = json_decode(file_get_contents('php://input'), true);

if (isset($Data['path'])) {
    $Path = $Data['path'];
    unset($Data['path']);
}

if (isset($Data['action'])) {
    $Action = $Data['action'];
    unset($Data['action']);
}

if (isset($Data['data'])) {

    // Evento
    $Json = json_decode($Data['data'], true);
    if ($Json == null) {
        $Sync = $Data['data'];
    }

    // Submit Form
    if ($Json != null) {
        $Sync = $Json;
        $Token = (isset($_SESSION['CSRF_TOKEN'])) ? $_SESSION['CSRF_TOKEN'] : false;
        unset($Sync['action'], $Sync['path']);
    }

} else {
    $Sync = 'Nenhum parâmetro passado pela requisição';
}
unset($Data);
$JSON = null;