<?php
/**
 * Declaração de todas as rotas da dashboard do módulo.
 * @copyright Felipe Oliveira Lourenço 26.02.2021
 */

$__ROUTES__['marketing'] = [

    /**
     * Para casos onde todos os itens do menu devem estar abertos
     */
    '__open__' => true,

    'crm' => [
        'php' => 'crm.php',
        'tpl' => 'crm.tpl',
        'level' => 11,
        'text' => 'Funil de Vendas',
        'icon' => '<i class="fal fa-funnel-dollar"></i>',
    ],

    'campaigns' => [
        'php' => 'campaigns.php',
        'tpl' => 'campaigns.tpl',
        'level' => 11,
        'text' => 'Campanhas',
        'icon' => '<i class="far fa-bullhorn"></i>',
        // 'icon' => '<i class="far fa-link"></i>'
    ],

    'create-campaign' => [
        'php' => 'create-campaign.php',
        'tpl' => 'create-campaign.tpl',
        'level' => 11,
        'text' => 'Nova Campanha',
        'icon' => '<i class="fas fa-chart-bar"></i>',
        'show' => false,
    ],

    'reports' => [
        'php' => 'reports.php',
        'tpl' => 'reports.tpl',
        'level' => 11,
        'text' => 'Analytics',
        'icon' => '<i class="fas fa-chart-bar"></i>',
    ],

    'pipe' => [
        'php' => 'pipe.php',
        'tpl' => 'pipe.tpl',
        'level' => 11,
        'text' => 'Pipeline',
        'icon' => '<i class="fas fa-chart-bar"></i>',
        'show' => false,
    ],

    'configs' => [
        'php' => 'configs.php',
        'level' => 11,
        'text' => 'Configurações',
        'icon' => '<i class="fas fa-cogs"></i>',
        // 'show' => false,
    ],

    // 'config-seo' => [
    //   'php' => 'config-seo.php',
    //   'level' => 8,
    // ],
];
