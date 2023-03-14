<?php
/**
 * Controladora da página Single
 * @copyright Felipe Oliveira Lourenço - 04.01.2023 - v.1.0.0
 * @see Update 06.02.2023
 * @version 1.2.0
 */

use Liloo\Qrcode\QRCode;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$ThisRoute = new FilesystemLoader(ROOT_THEME_ROUTES . 'e/');
$ThisRoute = new Environment($ThisRoute, [
    // 'cache' => ROOT . 'cache/'
]);

if (URL()[1] && URL()[2]) {
    $Url = URL()[1];
    $ID = URL()[2];
    $ID = base64_decode(URL()[2]);

    $Ads = _get_data_full(
        "SELECT * FROM `" . TB_PORTAL_ADS . "`
        INNER JOIN `" . TB_ACCOUNTS . "`
        ON " . TB_PORTAL_ADS . ".ads_account_id = " . TB_ACCOUNTS . ".account_id
        WHERE " . TB_PORTAL_ADS . ".ads_account_id = " . (int) $ID . "
        AND " . TB_PORTAL_ADS . ".ads_url = '{$Url}'
    ");
    $Ads = (isset($Ads[0])) ? $Ads[0] : null;

    if (isset($Ads['account_password'])) {
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

    if ($Ads) {
        $Extra = array_merge($Extra, $Ads);
        $QRcode = [
            'id' => $Ads['account_id'],
            'name' => "{$Ads['ads_title']} - {$Extra['SITE_NAME']}",
            'org' => $Ads['ads_title'],
            'phone' => $Ads['ads_phone'],
            'celular' => $Ads['ads_whatsapp'],
            'email' => $Ads['ads_email'],
            'site' => $Ads['ads_site'],
            'address_label' => $Ads['account_name'],
            'address_street' => "{$Ads['ads_address']}, {$Ads['ads_address_number']} {$Ads['ads_address_complement']}",
            'address_city' => "{$Ads['ads_address_district']}, {$Ads['ads_address_city']}",
            'address_region' => "{$Ads['ads_address_state']} - {$Ads['ads_address_uf']}",
            'address_zipcode' => $Ads['ads_address_zipcode'],
            'address_country' => 'Brasil',
        ];
        $Extra['qr_code'] = QRCode::vCard($QRcode, 0, 2);


        // Page
        $Extra['page_banner'] = 'images/arquitetura-e-engenharia.jpg';
        $Extra['page_profile'] = 'profiles/16-profile.png';


        echo $ThisRoute->render('e.twig', $Extra);

    } else {
        require ROOT_THEME_ROUTES . '404/404.php';
    }
} else {
    require ROOT_THEME_ROUTES . '404/404.php';
}
