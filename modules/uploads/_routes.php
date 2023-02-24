<?php
/**
  * Declaração de todas as rotas da dashboard do módulo. 
  * @copyright Felipe Oliveira Lourenço 26.02.2021
  */

$__ROUTES__['uploads'] = [

    /**
     * Gernciamento de Arquivos
     */
    'files' => [
        'php' => 'files.php',
        'tpl' => 'files.tpl',
        'level' => 8,
        'text' => 'Arquivos'
    ],

    /**
     * Gestão das categorias do Portal
     */
    'configs' => [
        'php' => 'configs.php',
        'tpl' => 'configs.tpl',
        'level' => 11,
        'text' => 'Configurações'
    ],

    /**
     * Documentação e Informções para desenvolvedores
     */
    'info' => [
        'php' => 'info.php',
        'tpl' => 'info.tpl',
        'level' => 11,
        'text' => 'Documentação'
    ]

];