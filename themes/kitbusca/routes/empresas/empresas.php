<?php
/**
 * Controladora da página Home do tema Vamove
 * @copyright Felipe Oliveira Lourenço - 17-01-023
 */

if(!isset($_COOKIE['click_ads'])){
    @setcookie('click_ads', $_COOKIE['PHPSESSID'], time() + (1440 * 24), "/");
}
// require_once ROOT . "plugins/map-select/fun.php";

$Extra['form_search'] = _tpl_fill(ROOT_THEME_ROUTES . 'empresas/tpl/search.tpl', [], '', false);
$Extra['links'] = _tpl_fill(ROOT_THEME_ROUTES . 'empresas/tpl/links.tpl', $Extra, '', false);
// $Extra['mapa_svg'] = _plug_map_select(true);

if (isset(URL()[1])) {
    $Term = str_replace("-", " ", URL()[1]);
    $List = new Helpers\Pagination(
        TB_PORTAL_ADS, // Tabela do Banco
        '*', // Campos do select padrão *
        // Where
        "
		INNER JOIN taxonomies
    	ON " . TB_PORTAL_ADS . ".ads_category = taxonomies.tax_id
		WHERE `ads_hashtags` LIKE '%" . $Term . "%'
		OR `ads_title` LIKE '%" . $Term . "%'
		OR `ads_description` LIKE '%" . $Term . "%'
		",
        3// Limite por página
    );

    if ($List->Results()['bool']) {
        $Extra['listview_organic'] = '';
        foreach ($List->Results()['output'] as $Values) {

            // Contagem das impressões
            $Fields = [
                'repo_ads_id' => $Values['ads_id'],
                'repo_key' => 'show_ads_organic',
            ];
            $Check = _get_data_table(TB_PORTAL_REPORTS, $Fields);
            $Check = (isset($Check[0])) ? $Check[0] : false;
            if ($Check) {
                @_up_data_table(TB_PORTAL_REPORTS, [
                    'where' => $Fields,
                    'values' => ['repo_values' => ($Check['repo_values'] + 1)],
                ]);
            } else {
                @_set_data_table(TB_PORTAL_REPORTS, [
                    'repo_ads_id' => (int) $Values['ads_id'],
                    'repo_account_id' => (int) $Values['ads_account_id'],
                    'repo_key' => 'show_ads_organic',
                    'repo_values' => '1',
                    'repo_ads_cookie' => (isset($_COOKIE['click_ads'])) ? $_COOKIE['click_ads'] : null,
                ]);
            }

            $Extra['listview_organic'] .= _tpl_fill(ROOT_THEME_ROUTES . 'empresas/tpl/organic.tpl', $Values, '', false);
        }
        $Extra['paginator'] = $List->Nav();
    }
} else {
    $Extra['listview_organic'] = 'Realize sua busca';
    $Extra['paginator'] = '';
}
_tpl_fill(ROOT_THEME_ROUTES . 'empresas/empresas.tpl', $Extra, '');
