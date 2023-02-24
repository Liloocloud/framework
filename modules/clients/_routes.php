<?php
/**
  * Declaração de todas as rotas da dashboard do módulo. 
  * @copyright Felipe Oliveira Lourenço 26.02.2021
  */

  $__ROUTES__['clients'] = [
    'manager' => [
        'php' => 'manager.php',
        'tpl' => 'manager.tpl',
        'level' => 8,
        'text' => 'Gerenciar'
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