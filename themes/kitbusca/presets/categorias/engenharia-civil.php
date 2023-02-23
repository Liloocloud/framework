<?php
/**
 * @copyright 11.06.2020 - Felipe Oliveira Lourenço
 */


// 060 - Engenheiro Civil
$forms['060'] = [
	'service_category' => 'Aparelho de som',
	'service_title' => 'Serviços de conserto e manutenção em Aparelhos de som',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-aparelho-de-som/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Egenheiro Civil você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Projetos',
				'Obras',
				'Reformas',
				'Art',
				'Laudos',
				'Consultoria em Fundações Especiais e Escoramentos',
				'Assistente Técnico'
			]
		],
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Aparelho de Som?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aiwa',
				'Britânia',
				'CCE',
				'Gradiente',
				'LG',
				'Panasonic',
				'Philco',
				'Philips',
				'Pioneer',
				'Samsung',
				'Sony',
				'Toshiba',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Botões do aparelho não funcionam',
				'CD ou toca fita não funciona',
				'Controle remoto não funciona',
				'Manutenção/limpeza',
				'Não está ligando',
				'Não sai som',
				'Rádio não sintoniza',
				'Reposição de peça',
				'Outro'
			]
		]
	]
];


// 061 - Impermeabilizador
// 062 - Limpeza pós obra
// 063 - Pedreiro
// 064 - Terraplanagem
// 065 - Arquiteto
// 066 - Decorador / Design de Interiores
// 067 - Desenho Técnico e AutoCAD
// 068 - Técnico em Edificações
// 069 - Paisagista 
// 070 - Eletricista
// 071 - Encanador
// 072 - Gesso e Drywall
// 073 - Pintor
// 074 - Envidraçamento
// 075 - Serralheiro e Soldador
// 076 - Vidraceiro