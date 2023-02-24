<?php
/**
  * Declaração de todas as rotas da dashboard do módulo. 
  * @copyright Felipe Oliveira Lourenço 26.02.2021
  */

$__ROUTES__['portal'] = [

    '__open__' => true,

    // Cria novos anuncios
    'create' => [
        'php' => 'create.php',
        'tpl' => 'create.tpl',
        'level' => 11,
        'text' => 'Adicionar Novo',
        'icon' => '<i class="fad fa-plus-circle"></i>',
    ],

    // Todos os anuncios do portal
    'ads' => [
        'php' => 'ads.php',
        'tpl' => 'ads.tpl',
        'level' => 11,
        'text' => 'Anúncios',
        'icon' => '<i class="fad fa-bullhorn"></i>'
    ],

    // Gerenciamento de anuncio por usuário
    'myads' => [
        'php' => 'myads.php',
        'tpl' => 'myads.tpl',
        'level' => 8,
        'text' => 'Meus Anúncios',
        'icon' => '<i class="fad fa-bullhorn"></i>'
    ],

    // Relatório de eventos e leads
    'reports' => [
        'php' => 'reports.php',
        'tpl' => 'reports.tpl',
        'level' => 11,
        'text' => 'Relatórios',
        'icon' => '<i class="fad fa-chart-bar"></i>'
    ],

    // Gestão das categorias do Portal
    'categs' => [
        'php' => 'categs.php',
        'tpl' => 'categs.tpl',
        'level' => 11,
        'text' => 'Categorias',
        'icon' => '<i class="fad fa-tags"></i>'
    ],

    // Página do usuário
    'userpage' => [
        'php' => 'userpage.php',
        'tpl' => 'userpage.tpl',
        'level' => 8,
        'text' => 'Minha Página',
        'icon' => '<i class="fad fa-browser"></i>'
    ],
 
    // Documentação e Informções para desenvolvedores
    'info' => [
        'php' => 'info.php',
        'tpl' => 'info.tpl',
        'level' => 11,
        'text' => 'Documentação',
        'icon' => '<i class="fad fa-book"></i>'
    ]

];