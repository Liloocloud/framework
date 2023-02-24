<?php
/**
  * Declaração de todas as rotas da dashboard do módulo. 
  * @copyright Felipe Oliveira Lourenço 26.02.2021
  */

  $__ROUTES__['shop'] = [

    'classification' => [
        'php' => 'classification.php',
        'tpl' => 'classification.tpl',
        'level' => 8,
        'text' => 'Classificação'
    ],

    'products' => [
        'php' => 'products.php',
        'tpl' => 'products.tpl',
        'level' => 8,
        'text' => 'Produtos'
    ],

    'create' => [
        'php' => 'create.php',
        'tpl' => 'create.tpl',
        'level' => 8,
        'text' => 'Novo Produto',
        'show' => false,
    ],

    'edit' => [
        'php' => 'edit.php',
        'tpl' => 'edit.tpl',
        'level' => 8,
        'text' => 'Produtos',
        'show' => false,
    ],


    'configs' => [
        'php' => 'configs.php',
        'tpl' => 'configs.tpl',
        'level' => 8,
        'text' => 'Configurações'
    ],

    'reports' => [
        'php' => 'reports.php',
        'tpl' => 'reports.tpl',
        'level' => 8,
        'text' => 'Relatório'
    ],

    'info' => [
        'php' => 'info.php',
        'tpl' => 'info.tpl',
        'level' => 11,
        'text' => 'Documentação'
    ]

];