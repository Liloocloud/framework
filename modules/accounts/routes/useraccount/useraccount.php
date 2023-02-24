<?php

// $User = _get_data_full(
//     "SELECT * FROM `" . TB_ACCOUNTS . "`
//     INNER JOIN `" . TB_ACCOUNT_ENTITIES . "`
//     ON " . TB_ACCOUNTS . ".account_id = " . TB_ACCOUNT_ENTITIES . ".entity_account_id"
//     );
//     $User = (isset($User[0])) ? $User[0] : $User;
    
//     var_dump($User, $_SESSION);
    
    // _tpl_fill($This[$Module]['ROUTES_ROOT'].URL()[2].'/'.URL()[2].'.tpl', $Extra, '');


// _tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].URL()[2].'/widgets/banner/form.tpl', $Extra, '');

$Page = _get_data_table(TB_PORTAL_USERPAGE, ['page_account_id' => $_SESSION['account_id']]);
if(!isset($Page[0])){
    $Set = _set_data_table(TB_PORTAL_USERPAGE, ['page_account_id' => $_SESSION['account_id']]);
    if($Set){
        $Page = _get_data_table(TB_PORTAL_USERPAGE, ['page_account_id' => $_SESSION['account_id']])[0];
    }else{
        $Page = [];
    }
}else{
    $Page = $Page[0];
}

$Tpl = $This[$Module]['ROUTES_ROOT'].URL()[2].'/tpl/';
$Extra['tpl_contact']     = _tpl_fill($Tpl.'contact.tpl', $Extra, $Page, false);
$Extra['tpl_socialmedia'] = _tpl_fill($Tpl.'socialmedia.tpl', $Extra, $Page, false);
$Extra['tpl_location']    = _tpl_fill($Tpl.'location.tpl', $Extra, $Page, false);
$Extra['tpl_banner']    = _tpl_fill($Tpl.'banner.tpl', $Extra, $Page, false);
$Extra['tpl_modal_full']  = _tpl_fill($Tpl.'modal-full.tpl', $Extra, $Page, false);
$Extra['tpl_profile'] = _tpl_fill($Tpl.'profile.tpl', $Extra, $Page, false);

_tpl_fill($This[$Module]['ROUTES_ROOT'].URL()[2].'/'.URL()[2].'.tpl', $Extra, $Page);