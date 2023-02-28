<?php
/**
 * Controladora da página 404 do tema Vamove
 * @copyright Felipe Oliveira Lourenço - 02.07.2020
 */

use Explore\Modules;

// declare (strict_types = 1);

$Products = _get_data_full("
    SELECT * FROM `" . TB_SHOP_PRODUCTS . "`
    INNER JOIN `" . TB_UPLOADS . "`
    ON " . TB_SHOP_PRODUCTS . ".prod_id = " . TB_UPLOADS . ".upload_ref_id;
");

foreach ($Products as $key => $value) {

    var_dump(
        json_decode($value['upload_thumbnails'], true)[0]['image']

    );
    echo '<img src="'.BASE.$value['upload_url'] . json_decode($value['upload_thumbnails'], true)[0]['image'].'">';

}

// new Components\Lightbox([
//     'sql' => [
//         'table' => TB_SHOP_PRODUCTS,
//         'where' => ['prod_account_id' => 16],
//         'fields' => [
//             'title' => 'prod_title',
//             'text' => 'prod_description',
//         ],
//     ],
// ], function ($res) {
//     echo $res;
// });

// $Accordion->render();

// $update = new Database\Update;
// $T = $update->ExeUpdate(
//     TB_PORTAL_REPORTS,
//     ['repo_values' => ($Chk[0]['repo_values'] + 1)],
//     "WHERE `repo_key` =:a AND `repo_ads_id` =:b",
//     "a=click_ads_view_hours_operation&b=9"
// );

// $T = new Generic\Create(TB_PORTAL_REPORTS);
// $Res = $T->addPlus(
//     'repo_values', [
//         'repo_ads_id' => 9,
//         'repo_key' => 'click_ads_view_hours_operation',
//     ]
// );
//var_dump($Res);

// $Field = [
//     'repo_ads_id' => 9,
//     'repo_id' => 5,
//     'repo_key' => 'click_ads_view_hours_operation',
// ];
// $Chk = _get_data_table(TB_PORTAL_REPORTS, $Field);

// $Add = _up_data_table(TB_PORTAL_REPORTS, [
//     'where' => $Field,
//     'values' => [
//         'repo_values' => ( $Chk[0]['repo_values'] + 1 )
//     ],
// ]);
// var_dump( $Chk, $Add );
// exit;

$Extra['form_search'] = _tpl_fill(ROOT_THEME_ROUTES . '404/search.tpl', [], '', false);
_tpl_fill(ROOT_THEME_ROUTES . '404/404.tpl', $Extra, '');

// new \Components\Accordion([
//     'sql' => [
//         'table' => TB_SHOP_PRODUCTS,
//         'where' => ['prod_account_id' => 16],
//         'fields' => [
//             'title' => 'prod_title',
//             'text' => 'prod_description',
//         ],
//     ]
// ], function ($res) {
//     echo '<div class="uk-container uk-padding-large">';
//     echo '<h2>Estou usando o template</h2>';
//     echo $res;
//     echo '</div>';
// });
