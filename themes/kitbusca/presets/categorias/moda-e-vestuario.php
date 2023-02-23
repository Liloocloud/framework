<?php
/**
 * @copyright 30.05.2020 - Felipe Oliveira Lourenço
 */

// 021 - Personal Stylist
$forms['021'] = [
	'service_activity' => 'Moda e Vestuário',
	'service_category' => 'Estilo',
	'service_sub_category' => 'Personal Stylist',
	'service_title' => 'Serviços de Personal Stylist',
	'service_url' => 'moda-e-vestuario/estilo/personal-stylist/',
	'service_form_json' => [
		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'Para quem será o serviço?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Homem',
				'Mulher'
			]
		],
		// SELECT
		'add_finality' => [
			'field' => 'select',
			'label' => 'Qual é o objetivo do serviço?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Business',
				'Casamento',
				'Dia-a-dia',
				'Evento',
				'Outro'
			]
		]		
	]
];

// 022 - Estilo / Designer de Moda
$forms['022'] = [
	'service_activity' => 'Moda e Vestuário',
	'service_category' => 'Estilo',
	'service_sub_category' => 'Designer de Moda',
	'service_title' => 'Serviços de Designer de Moda',
	'service_url' => 'moda-e-vestuario/estilo/designer-de-moda/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Designer de Moda Você Precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Previsão de cores e tendências',
				'Estudo de mercado',
				'Criação de conceitos',
				'Criação de documentação',
				'Outros'
			]
		],
		// SELECT
		'add_finality' => [
			'field' => 'select',
			'label' => 'Qual a especialidade do serviço?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Vestuário',
				'Calçado',
				'Bolsa'
			]
		]

	]
];

// 023 - Confecção / Alfaiate
$forms['023'] = [
	'service_activity' => 'Moda e Vestuário',
	'service_category' => 'Confecção',
	'service_sub_category' => 'Alfaiate',
	'service_title' => 'Serviços de Alfaiate',
	'service_url' => 'moda-e-vestuario/confeccao/alfaiate/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Alfaiate Você Precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aluguel de Roupas Masculinas (Ternos, Blazer e etc.)',
				'Ajustes e Reparos',
				'Confecção',
			]
		],
		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'Para quem será o serviço?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Adulto',
				'Criança'
			]
		]
	]
];

// 024 - Confecção / Vestido de Noiva
$forms['024'] = [
	'service_activity' => 'Moda e Vestuário',
	'service_category' => 'Confecção',
	'service_sub_category' => 'Vestido de Noiva',
	'service_title' => 'Serviços de Vestido de Noiva',
	'service_url' => 'moda-e-vestuario/confeccao/vestido-de-noiva/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Vestido de Noiva está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aluguel de Vestidos (Noiva, Madrinha e etc.)',
				'Ajuste e Reparos',
				'Confecção'
			]
		],
		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'Para quem será o serviço?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Adulto',
				'Criança'
			]
		]	
	]
];

// 025 - Reparos / Corte e Costura
$forms['025'] = [
	'service_activity' => 'Moda e Vestuário',
	'service_category' => 'Reparos',
	'service_sub_category' => 'Corte e Costura',
	'service_title' => 'Serviços de Corte e Costura',
	'service_url' => 'moda-e-vestuario/Reparos/corte-e-costura/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de corte e costura está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Ajustes e Reparos',
				'Confecção'
			]
		],
		// SELECT
		'add_product' => [
			'field' => 'select',
			'label' => 'Em qual peça o serviço será realizado?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Blusa',
				'Calça',
				'Saia',
				'Vestido',
				'Zíper',
				'Outros'
			]
		]
	]
];

// 026 - Reparos / Sapateiro
$forms['026'] = [
	'service_activity' => 'Moda e Vestuário',
	'service_category' => 'Reparos',
	'service_sub_category' => 'Sapateiro',
	'service_title' => 'Serviços de Sapateiro',
	'service_url' => 'moda-e-vestuario/Reparos/sapateiro/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Sapateiro você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Conserto e Manutenção',
				'Troca de forro',
				'Outros'
			]
		],
		// SELECT
		'add_product' => [
			'field' => 'select',
			'label' => 'O serviço é para qual produto?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Bolsa ou Mala',
				'Sapato ou Tênis',
				'Outros'
			]
		]
	]
];