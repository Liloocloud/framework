<?php
/**
  * Declaração de todas as rotas da dashboard do módulo. 
  * @copyright Felipe Oliveira Lourenço 26.02.2021
  */

$__ROUTES__['crm'] = [

    /**
     * Rota usada para sistemas onde exigem 
     * que o usuário Complete o cadastro com Mais Informações
     */
    'followup' => [
        'php' => 'followup.php',
        'tpl' => 'followup.tpl',
        'level' => 11,
        'text' => 'Follow Up'
    ],

    'links' => [
      'php' => 'links.php',
      'tpl' => 'links.tpl',
      'level' => 8,
      'text' => 'Gestão de links'
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