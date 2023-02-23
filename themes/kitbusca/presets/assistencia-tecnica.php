<?php
$forms['001'] = [
	'service_activity' => '.Assistência Técnica',
	'service_category' => 'Aparelhos Eletrônicos',
	'service_sub_category' => 'Aparelho de Som',
	'service_title' => 'Assistência Técnica para seu Aparelhos de Som',
	'service_form_json' => [
		 // SELECT
		'add_brand' => [
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
		'add_guarantee' => [
			'field' => 'select',
			'label' => 'O produto ainda esta dentro da garantia?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Dentro da garantia',
				'Fora da garantia'
			]
		],
		// SELECT
		'add_problem' => [
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
