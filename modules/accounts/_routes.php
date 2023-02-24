<?php
/**
  * Declaração de todas as rotas da dashboard do módulo. 
  * @copyright Felipe Oliveira Lourenço 26.02.2021
  */

$__ROUTES__['accounts'] = [

    /**
     * Rota usada para sistemas onde exigem 
     * que o usuário Complete o cadastro com Mais Informações
     */
    'complete' => [
        'php' => 'complete.php',
        'tpl' => 'complete.tpl',
        'level' => 11,
        'text' => 'Completar Cadastro'
    ],

    /** 
     * Configurações do módulo Accounts
     */
    'configs' => [
        'php' => 'configs.php',
        'tpl' => 'configs.tpl',
        'level' => 11,
        'text' => 'Configurações'
    ],

    /**
     * Gestão de contas de usuários
     */
    'manager' => [
        'php' => 'manager.php',
        'tpl' => 'manager.tpl',
        'level' => 11,
        'text' => 'Gestão de contas'
    ],

    /**
     * Informações da conta do usuário logado
     */
    'useraccount' => [
        'php' => 'useraccount.php',
        'tpl' => 'useraccount.tpl',
        'level' => 8,
        'text' => 'Minha conta'
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