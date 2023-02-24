<?php
/**
  * Declaração de todas as rotas da dashboard do módulo. 
  * @copyright Felipe Oliveira Lourenço 26.02.2021
  */

$__ROUTES__['support'] = [

    // '__open__' => false,

    // Reportas problema
    'issues' => [
        'php' => 'issues.php',
        'tpl' => 'issues.tpl',
        'level' => 8,
        'text' => 'Denunciar',
        'icon' => '<i class="fad fa-plus-circle"></i>',
        'show' => true
    ],

    // Contatar a empresa
    'contact-us' => [
        'php' => 'contact-us.php',
        'tpl' => 'contact-us.tpl',
        'level' => 8,
        'text' => 'Fale conosco',
        'icon' => '',
        'show' => true
    ],

    // Gerenciamento de tickets
    'ticket' => [
        'php' => 'ticket.php',
        'tpl' => 'ticket.tpl',
        'level' => 8,
        'text' => 'Tickets',
        'icon' => '',
        'show' => true
    ],


];