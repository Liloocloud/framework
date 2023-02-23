<?php 
/**
 * Controladora da página Single 
 * @copyright Felipe Oliveira Lourenço - 04.01.2023 - v.1.0.0
 * @see Update 06.02.2023
 * @version 1.2.0
 */




 


if(URL()[1] && URL()[2]){
    $Url = URL()[1];
    $ID = URL()[2];
    $ID = base64_decode(URL()[2]);

    $Ads = _get_data_full(
    "SELECT * FROM `" . TB_PORTAL_ADS . "`
        INNER JOIN `" . TB_ACCOUNTS . "`
        ON " . TB_PORTAL_ADS . ".ads_account_id = " . TB_ACCOUNTS . ".account_id
        WHERE " . TB_PORTAL_ADS . ".ads_account_id = ".(int) $ID." 
        AND " . TB_PORTAL_ADS . ".ads_url = '{$Url}'
    ");
    $Ads = (isset($Ads[0]))? $Ads[0] : null;

    if(isset($Ads['account_password'])){
        unset(
            $Ads['account_password'],
            $Ads['ads_status'],
            $Ads['ads_moderate'],
            $Ads['ads_accept_terms'],
            $Ads['account_this_id'],
            $Ads['account_level'],
            $Ads['account_plan'],
            $Ads['account_status'],
            $Ads['account_auth'],
            $Ads['account_accept_terms'],
            $Ads['account_token'],
            $Ads['account_last_login'],
            $Ads['account_activation_key']
        );
    }

        var_dump($Ads);


    if($Ads){
        _tpl_fill(ROOT_THEME_ROUTES.'e/e.tpl', $Extra, $Ads);
    }else{
        require ROOT_THEME_ROUTES.'404/404.php';
    }
}else{
    require ROOT_THEME_ROUTES.'404/404.php';
}

