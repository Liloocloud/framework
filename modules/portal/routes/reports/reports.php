<?php
require_once ROOT_MODULE.'marketing/marketing.fun.php';

$Extra['BASE_IMAGE'] = $This[$Module]['IMAGES_BASE'];
$Extra['ROUTES_BASE'] = $This[$Module]['ROUTES_BASE'];

$Click = new Module\Marketing\Interactions('click');
$Whatsapp = new Module\Marketing\Interactions('whatsapp');
$Phone = new Module\Marketing\Interactions('phone');
$Form = new Module\Marketing\Interactions('form');

$Extra['grafic'] = _card_graphic([
        "title" => "Percentual de Contatos",
        "desc" => "Visual Geral das Interações de Usuário no site",
        "type" => "doughnut",
        "data" => [
            "labels" => "
                'Visualizações do Telefone',
                'Clique no Botão do Whatsapp',
                'Contatos pelo Whatsapp',
                'Formulários Enviados'
            ",
            "values" => "
                '{$Phone->count()}',
                '{$Click->count()}',
                '{$Whatsapp->count()}',
                '{$Form->count()}'
            ",
            "colors" => "
                'rgb(16,149,24)',
                'rgb(54, 162, 235)',
                'rgb(255,153,0)',
                'rgb(220,57,18)'
            "
        ],
    ]
);

_tpl_fill($This[$Module]['ROUTES_ROOT'] . URL()[2] . '/' . URL()[2] . '.tpl', $Extra, '');

?>



