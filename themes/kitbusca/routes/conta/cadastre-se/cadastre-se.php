<?php
// $page = URL();
// var_dump(
//     filter_input(INPUT_GET, 'term', FILTER_SANITIZE_SPECIAL_CHARS),
//     filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT)
// );
// // $page = parse_url($page[2]);
// $page = parse_str($page[2], $aa);
// // $page = explode('=', $page[2])[1];

// if(!isset(URL()[2])){
//     header('Location: '.BASE.'conta/planos/');
// }

// $Extra['account_plan'] = (string) URL()[2];

_tpl_fill($Route . $OneURL . '/cadastre-se.tpl', $Extra, '');