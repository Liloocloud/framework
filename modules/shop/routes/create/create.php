<?php
if(!isset($_GET['id']) || $_GET['id'] == ''){
    $LastId = _get_data_full("SELECT MAX(`prod_id`) as ID FROM `".TB_SHOP_PRODUCTS."`");
    $LastId = (isset($LastId[0]['ID']))? $LastId[0]['ID'] : null;
    if($LastId){
        header('Location: '.BASE_ADMIN.'shop/create/?id='.($LastId + 1));
    }    
}else{
    $LastId = _get_data_full("SELECT `prod_id` FROM `".TB_SHOP_PRODUCTS."` WHERE `prod_id` = '{$_GET['id']}'");
    $LastId = (isset($LastId[0]['prod_id']))? $LastId[0]['prod_id'] : null;
    if($LastId){
        header('Location: '.BASE_ADMIN.'shop/edit/?id='.($LastId));
    } 
}
$Extra['prod_id'] = $_GET['id'];
_tpl_fill($This[$Module]['ROUTES_ROOT'].URL()[2].'/'.URL()[2].'.tpl', $Extra, '');
