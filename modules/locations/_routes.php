<?php
/**
 * Declaração de todas as rotas da dashboard do módulo.
 * @copyright Felipe Oliveira Lourenço 26.02.2021
 */

$__ROUTES__['locations'] = [
    // '__open__' => true,

    'manager' => [
        'php' => 'manager.php',
        'tpl' => 'manager.tpl',
        'level' => 11,
        'text' => 'Gerenciamento',
        'icon' => '<i class="fal fa-funnel-dollar"></i>',
    ],

    // Documentação e para desenvolvedores
    'info' => [
        'php' => 'info.php',
        'tpl' => 'info.tpl',
        'text' => 'Documentação',
        'level' => 11,
        'icon' => '<i class="fad fa-book"></i>',
    ]

];