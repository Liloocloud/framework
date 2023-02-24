<?php

require_once "../../../../../../_Kernel/___Kernel.php";
require_once "../../../../../../_Kernel/_Sync.inout.v2.php";

$Banner = _get_data_table(TB_PORTAL_USERPAGE_ADDS, [
    'adds_meta' => 'page_banner',
]);
$Banner = (isset($Banner[0]['adds_values'])) ? [$Banner[0]['adds_values']] : [''];


// $pathImg = BASE_MODULE . 'portal/routes/userpage/widgets/banner/img/';

// $Itens = [

//     'slides' => [

//         0 => [
//             'title' => '',
//             'description' => '',
//             'img' => $pathImg.'light.jpg',
//             'btnText' => 'Contratar',
//             'btnUrl' => ''
//         ],
//     ],

// ];



echo json_encode($Banner);
