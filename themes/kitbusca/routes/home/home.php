<?php
/**
 * Controladora da página Home do tema Vamove
 * @copyright Felipe Oliveira Lourenço - 01-23-2020
 */
// $COOKIE = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SESSION['HTTP_USER_AGENT']);
// var_dump(session_name($COOKIE) );

/**
 * Inclusão do Mapa do Brasil como seletor de região
 */
// require_once ROOT.'plugins/map-select/fun.php';
// $Extra['mapa_svg']      = _plug_map_select(true);


// $Extra['form_search']   = _tpl_fill(ROOT_THEME_ROUTES.'home/tpl/search/search-home.tpl', $Extra, [], false);
$Extra['categories']    = _tpl_fill(ROOT_THEME_ROUTES.'home/tpl/categorias.tpl', $Extra, [], false);
$Extra['ads-banner']    = _tpl_fill(ROOT_THEME_ROUTES.'home/tpl/ads-banner.tpl', $Extra, [], false);
$Extra['ads-cards']     = _tpl_fill(ROOT_THEME_ROUTES.'home/tpl/ads-cards.tpl', $Extra, [], false);

_tpl_fill(ROOT_THEME_ROUTES.'home/home.tpl', $Extra, '');
// Buscador
// $Slides = _get_data_full("SELECT `tax_images` FROM `".TB_TAXONOMIES."` ORDER BY RAND() LIMIT 1");
// $Node1 = _tpl_mount('node1', ROOT_THEME_ROUTES.'home/tpl/home.tpl');
// _tpl_fill($Node1['before'], $Extra);
// if($Slides){      
//     foreach ($Slides as $value) {
//         if($value['tax_images']){
//             $Extra['banner_img'] = $value['tax_images'];
//             _tpl_fill($Node1['content'], $Extra, $value);
//         }else{
//             $Extra['banner_img'] = 'categories/busque-ja-guia-de-empresas-e-produtos.jpg';
//             _tpl_fill($Node1['content'], $Extra, $value);
//         }
//     }
// }
// _tpl_fill($Node1['after'], $Extra);



// Categorias
// $Node2 = ElementMount("\[node2\]","\[\/node2\]", $Node1['after']);
// _tpl_fill($Node2['before'], $Extra);
// _tpl_fill($Node2['content'], $Extra);
// _tpl_fill($Node2['after'], $Extra);
