<?php
/**
 * Grupos de cases do módulo "Cliente"
 * @copyright Felipe Oliveira - 05.07.2022 - update 16.09.2022
 * @version 2.0.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../../../_Kernel/_Sync.inout.v2.php";

switch ($Action){

    /****************************************************************************
	 * CRIA LISTA DE CATEGORIAS VINDAS DE UM TEXTAREA
	 */
    case 'brands/shop':
        $Get = _get_data_full("SELECT `brand_id`,`brand_name` FROM `".TB_SHOP_BRANDS."`");
        $Get = (isset($Get))? $Get : false;
        if($Get){
            $JSON = [
                'bool' => true,
                'output' => $Get,
                'message' => "Brand",
                'reason' => 'success_listing_brands',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Nenhume fabricante encontrado",
                'reason' => 'error_listing_brands',
                'type' => 'error',
            ];
            break;
        }       
    break;

}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}