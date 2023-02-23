<?php
require_once "../../_Kernel/___Kernel.php";
$Data = json_decode(file_get_contents('php://input'), true);
$Sync = (!empty($Data['data']['image']))? $Data['data'] : false;

if ($Sync['image']) {

    if($Sync['sessioname']){
        $sessioname = $_SESSION['account_id']. '-';
    }else{
        $sessioname = '';
    }

    $image_array_1 = explode(";", $Sync['image']);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $imageName = $sessioname . $Sync['namefile'] . '.' . $Sync['extension'];

    if (isset($Sync['path'])) {
        $path = ROOT . $Sync['path'];
    } else {
        $path = ROOT . 'uploads/profiles/';
    }

    if (!is_dir($path)) {
        mkdir($path, 0777);
    }
    file_put_contents($path . $imageName, $data);
    $JSON = [
        'bool' => true,
        'output' => ['session_id' => $_SESSION['account_id']],
        'message' => 'Concluído com sucesso',
    ];
    echo json_encode($JSON);
}
unset($Data);
