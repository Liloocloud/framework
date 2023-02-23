<?php
/**
 * @copyright 16.06.2020 - Filipe Camargo de Barros
 */

// 190 - Software e Automação
$forms['190'] = [
	'service_category' => 'Software e Automação',
	'service_title' => 'Software e Automação Comercial',
	'service_type' => 'presencial',
	'service_url' => 'software-e-automacao-comercial/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual tipo de Software e Automação Comercial você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Software aplicativo',
				'Software de programação',
				'Software de sistema',
				'Controle Financeiro',
				'Gestão de Gestão Comercial',
				'Controle de Estoque e Compras',
				'Outro'
			]
		]
	]
];

// 191 - Analistas de Sistemas
$forms['191'] = [
	'service_category' => 'Analistas de Sistemas',
	'service_title' => 'Serviços de Analistas de Sistemas',
	'service_type' => 'presencial',
	'service_url' => 'serviços-de-analistas-de-sistemas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Analistas de Sistemas você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Desenvolvimento de Software',
				'Administração de Banco de Dados',
				'Administração de Redes',
				'Suporte',
				'Outro'
			]
		]
	]
];

// 192 - IoT e Arduíno
$forms['192'] = [
	'service_category' => 'IoT e Arduíno',
	'service_title' => 'Serviços de IoT e Arduíno',
	'service_type' => 'presencial',
	'service_url' => 'serviços-de-iot-e-arduino/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de IoT e Arduíno você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Projeto Arduino',
				'Progamação Arduino',
				'Outro'
			]
		]
	]
];

// 193 - Placas de Circuito Impresso
$forms['193'] = [
	'service_category' => 'Placas de Circuito Impresso',
	'service_title' => 'Serviços de Montagem de Placas de Circuito Impresso',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-montagem-de-placas-de-circuito-impresso/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Placas de Circuito Impresso você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Placas de circuito impresso face simples',
				'Placas de circuito impresso dupla face',
				'Placas de circuito impresso em alumínio ',
				'Placas de circuito com espessura diferenciada.',
				'Desenvolvimento de placas de circuito impresso',
				'Montagem de placas de circuito impresso',
				'Stencil a laser para montagem em SMD',
				'Placas de circuito impresso em SMD',
				'Protótipos',
				'Fotoplotagem ',
				'Lay out',
				'Outro'
			]
		]
	]
];

// 194 - Projetos e Prototipos
$forms['194'] = [
	'service_category' => 'Projetos e Prototipos',
	'service_title' => 'Serviços de Projetos e Prototipos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-projetos-e-prototipos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Projetos e Prototipos você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Protótipo esquemático',
				'Wireframes e protótipos funcionais',
				'Versão alfa',
				'Versão beta',
				'Projeto e Protótipo Completo',
				'Outro'
			]
		]
	]
];

// 195 - Robótica e Mecatrônica
$forms['195'] = [
	'service_category' => 'Robótica e Mecatrônica',
	'service_title' => 'Serviços de Robótica e Mecatrônica',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-robotica-e-mecatronica/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Robótica e Mecatrônica você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Análise de Viabilidade',
				'Criação de Projeto',
				'Desenvolvimento de Programas',
				'Montagem de Painéis',
				'Máquinas Especiais',
				'Suporte técnico especializado',
				'Outro'
			]
		]
	]
];

// 196 - Motorista
$forms['196'] = [
	'service_category' => 'Motorista',
	'service_title' => 'Serviços de Motorista',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-motorista/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual tipo de veículo é necessário para o serviço?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Carro',
				'Van',
				'Ônibus',
				'Outro'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual seu local de destino?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Na mesma cidade',
				'Outra cidade'
			]
		]
	]
];

// 197 - Bikeboy
$forms['197'] = [
	'service_category' => 'Bikeboy',
	'service_title' => 'Serviços de Bikeboy',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-bikeboy/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Para onde é a entrega ou retirada?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'No mesmo bairro',
				'Em outro bairro',
				'Em outra cidade'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual o peso aproximado?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 1 kg',
				'De 2 a 5 Kg',
				'Mais de 5 Kg'
			]
		]
	]
];

// 198 - Motoboy
$forms['198'] = [
	'service_category' => 'Motoboy',
	'service_title' => 'Serviços de Motoboy',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-motoboy/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Para onde é a entrega ou retirada?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'No mesmo bairro',
				'Em outro bairro',
				'Em outra cidade'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual o peso aproximado?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 1 kg',
				'De 2 a 5 Kg',
				'Mais de 5 Kg'
			]
		]
	]
];

// 199 - Office Boy
$forms['199'] = [
	'service_category' => 'Office Boy',
	'service_title' => 'Serviços de Office Boy',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-office-boy/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Office Boy você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Entrega de documentos',
				'Pagamento de contas',
				'Serviços administrativos',
				'Outros'
			]
		],

		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Para onde é a entrega ou retirada?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'No mesmo bairro',
				'Em outro bairro',
				'Em outra cidade'
			]
		]
	]
];

// 200 - Fretado
$forms['200'] = [
	'service_category' => 'Fretado',
	'service_title' => 'Serviços de Fretado',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-fretado/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual o destino?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Na mesma cidade',
				'Em outra cidade'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'O serviço é para quantas pessoas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'1 pessoa',
				'De 2 pessoas a 5 pessoas',
				'Mais de 5 Pessoas'
			]
		]
	]
];

// 201 - Mudanças e Carretos
$forms['201'] = [
	'service_category' => 'Mudanças e Carretos',
	'service_title' => 'Serviços de Mudanças e Carretos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-mudancas-e-carretos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual o serviço de carreto ou mudança você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Carreto pequeno',
				'Mudança completa',
				'Outros'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Para onde é a mudança ou carreto?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Na mesma cidade',
				'Em outra cidade',
				'Mesmo Bairro',
				'Outro Bairro'
			]
		]
	]
];