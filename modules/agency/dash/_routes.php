<?php
/**
  * Declaração de todas as rotas da dashboard do módulo. 
  * @copyright Felipe Oliveira Lourenço 26.02.2021
  */
  
$__ROUTES__ = [
    'users' => [
        'php' => 'users.php',
        'tpl' => 'users.tpl',
        'level' => 8,
    ],
    'create' => [
        'php' => 'create.php',
        'tpl' => 'create.tpl',
        'level' => 8,
    ],
    'configs' => [
        'php' => 'configs.php',
        'tpl' => 'configs.tpl',
        'level' => 8,
    ],
    'single' => [
        'php' => 'single.php',
        'tpl' => 'single.tpl',
        'level' => 8,
    ],
    'complete' => [
        'php' => 'complete.php',
        'level' => 8,
    ],
    
    'workers' => [
        'php' => 'workers.php',
        'level' => 10,
        'description' => 'Gerenciamento dos colaboradores'
    ],


    'followup' => [
        'php' => 'followup.php', // Arquivo correspondente
        'level' => 7, // Exige nível "x" de permissão 
        'description' => 'Acompanhamento de todas as matrizes dos clientes'
    ],

    /**
     * Responsável por mostrar todos os dados do projeto pela
     * matriz (Arquivo criado com a finalidade e obter todos os detalhes 
     * do projeto desde o início ao fim)
     */
    'project' => [
        'php' => 'project.php',
        'level' => 8,
    ],


    'info' => [
        'php' => 'info.php',
        'level' => 11,
    ],
    
];