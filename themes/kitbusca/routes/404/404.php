<?php
/**
 * Controladora da página 404 do tema Vamove
 * @copyright Felipe Oliveira Lourenço - 02.07.2020
 */

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

$Field = [
    'repo_ads_id' => 9,
    'repo_id' => 5,
    'repo_key' => 'click_ads_view_hours_operation',
];
$Chk = _get_data_table(TB_PORTAL_REPORTS, $Field);

$Add = _up_data_table(TB_PORTAL_REPORTS, [
    'where' => $Field,
    'values' => [
        'repo_values' => ( $Chk[0]['repo_values'] + 1 )
    ],
]);
var_dump( $Chk, $Add );
exit;




$Extra['form_search'] = _tpl_fill(ROOT_THEME_ROUTES . '404/search.tpl', [], '', false);

/**
 * LISTAGEM DOS GROUPS
 */
// $GroupsCategories = _get_data_full("
//     SELECT `group_services_id`,`group_title`
//     FROM `".TB_SMART_SERVICES_GROUP."`
//     ORDER BY group_title ASC ");
// $View = '';
// foreach ($GroupsCategories as $item) {
//     $View.= "<option value='{$item['group_services_id']}'>{$item['group_title']}</option>";
// }

// $Extra['list_groups'] = $View;
// $Extra['uploads'] = BASE_UPLOADS;

_tpl_fill(ROOT_THEME_ROUTES . '404/404.tpl', $Extra, '');
