<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

// if(isset($_SESSION['account_level']) && $_SESSION['account_level'] <a 10){
//     exit;
// }

require_once "../../../_Kernel/___Kernel.php";
// require_once "../../../../_Kernel/_Sync.inout.v2.php";

// $JSON = _get_data_full("SELECT * FROM `".TB_LOCATIONS_CITIES."` WHERE `city_name` LIKE '%".$Sync."%' LIMIT 15");
// $JSON = _get_data_full("SELECT * FROM `".TB_LOCATIONS_CITIES."` LIMIT 50");
// $JSON = _get_data_full("SELECT * FROM `".TB_LOCATIONS_CITIES."` WHERE `city_name` LIKE '".$_GET['city']."%' LIMIT 50");

$JSON = _get_data_full("SELECT DISTINCT (`ads_address_city`), `ads_address_uf` FROM `".TB_PORTAL_ADS."` WHERE `ads_address_city` LIKE '".$_GET['city']."%' LIMIT 50");

if($JSON){
    $Itens = [];
    $i=0;
    foreach ($JSON as $item) {
        // $Itens[$i] = [ $item['city_name']];
        $Itens[$i] = [ $item['ads_address_city'].' - '.$item['ads_address_uf'] ];
        $i++;
    }
    $JSON = $Itens;
}else{
    $JSON = [];
}

if (isset($JSON) && $JSON != null) {
	$_SESSION['CSRF_TOKEN'] = md5(uniqid(mt_rand(), true));
	echo json_encode($JSON);
}