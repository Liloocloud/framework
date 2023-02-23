<?php
/**
 * @copyright 05.06.2020 - Felipe Oliveira Lourenço
 */

// 036 - Automóveis - Elétrica - Alarme Automotivo
$forms['036'] = [
	'service_category' => 'Alarme Automotivo',
	'service_title' => 'Serviços de conserto e manutenção de Alarme Automotivo',
	'service_type' => 'presencial',
	'service_url' => 'instalacao-e-manutencao-de-alarme-automotivo/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do veículo. Ex.: Prisma'
		],
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Conserto',
				'Instalação',
				'Outro'
			]
		]
	]
];

// 037 - Automóveis - Elétrica - Ar Automotivo
$forms['037'] = [
	'service_category' => 'Ar Automotivo',
	'service_title' => 'Serviços de instalação e manutenção de Ar Automotivo',
	'service_type' => 'presencial',
	'service_url' => 'instalacao-e-manutencao-de-ar-automotivo/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		],
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Conserto',
				'Higienização',
				'Instalação',
				'Troca de filtro',
				'Outro'
			]
		]
	]
];

// 038 - Automóveis - Elétrica - Elétrica de Autos
$forms['038'] = [
	'service_category' => 'Elétrica de Autos',
	'service_title' => 'Serviços de instalação e manutenção em Elétrica de Autos',
	'service_type' => 'presencial',
	'service_url' => 'instalacao-e-manutencao-em-eletrica-de-autos/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		],
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Bateria',
				'Faróis/lâmpadas',
				'Injeção eletrônica',
				'Outro'
			]
		]
	]
];

// 039 - Automóveis - Elétrica - Som Automotivo
$forms['039'] = [
	'service_category' => 'Som Automotivo',
	'service_title' => 'Serviços de instalação e manutenção em Som Automotivo',
	'service_type' => 'presencial',
	'service_url' => 'instalacao-e-manutencao-em-som-automotivo/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		],
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Conserto',
				'Instalação',
				'Customização',
				'Outro'
			]
		]
	]
];


// 040 - Automóveis - Funilaria, Pintura e Vidraçaria - Funilaria
$forms['040'] = [
	'service_category' => 'Funilaria',
	'service_title' => 'Serviços de Funilaria',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-funilaria-automotiva/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		]
	]
];

// 041 - Automóveis - Funilaria, Pintura e Vidraçaria - Insulfilm
$forms['041'] = [
	'service_category' => 'Insulfilm',
	'service_title' => 'Serviços de aplicação e remoção de Insulfilm',
	'service_type' => 'presencial',
	'service_url' => 'aplicacao-e-remocao-de-insulfilm/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		],
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual película você procura?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Película avançada (solar)',
				'Película básica (escurecimento)',
				'Película de segurança (antivandalismo)',
				'Película de para-brisa',
				'Não tenho certeza'
			]
		],
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aplicação de nova película',
				'Remoção e nova aplicação',
				'Somente remoção',
				'Outro'
			]
		]
	]
];

// 042 - Automóveis - Funilaria, Pintura e Vidraçaria - Martelinho de Ouro
$forms['042'] = [
	'service_category' => 'Martelinho de Ouro',
	'service_title' => 'Serviços de Martelinho de Ouro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-funilaria-e-martelinho-de-ouro/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		],
		// INPUT
		'add_situation' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Em qual parte do veículo se encontra o amassado?',
			'class' => 'uk-input uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui em qual parte do carro está amassado'
		]
	]
];

// 043 - Automóveis - Funilaria, Pintura e Vidraçaria - Pintura
$forms['043'] = [
	'service_category' => 'Pintura',
	'service_title' => 'Serviços de Pintura Automotiva',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-funilaria-e-pintura/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		],
		// INPUT
		'add_options' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é a cor do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => ''
		]
	]
];

// 044 - Automóveis - Funilaria, Pintura e Vidraçaria - Vidraçaria Automotiva
$forms['044'] = [
	'service_category' => 'Vidraçaria Automotiva',
	'service_title' => 'Serviços de Vidraçaria Automotiva',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-vidracaria-automotiva/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		]
	]
];


// 045 - Automóveis - Limpeza e Higienização - Higienização e Polimento
$forms['045'] = [
	'service_category' => 'Higienização e Polimento Automotivo',
	'service_title' => 'Serviços de Higienização e Polimento Automotivo',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-higienizacao-e-polimento-automotivo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Revitalização de Plásticos',
				'Polimento de Pintura',
				'Polimento de Faróis',
				'Oxi-sanitização',
				'Limpeza Ecológica',
				'Limpeza e Hidratação de Couro',
				'Cristalização de Pintura',
				'Cristalização de Vidros',
				'Enceramento',
				'Higienização Interna',
				'Impermeabilização de Estofados',
				'Limpeza de Motor',
				'Outro'
			]
		]
	]
];


// 046 - Automóveis - Limpeza e Higienização - Lavagem em Domicílio
$forms['046'] = [
	'service_category' => 'Lavagem Automotiva em Domicílio',
	'service_title' => 'Serviços de Lavagem Automotiva em Domicílio',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-limpeza-higienização-e-lavagem-em-domicilio/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Lavagem a Seco',
				'Lavagem Completa',
				'Lavagem Simples',
				'Limpeza Interna',
				'Limpeza de Motor',
				'Outro'
			]
		]
	]
];


// 047 - Automóveis - Mecânica - Borracharia
$forms['047'] = [
	'service_category' => 'Borracharia',
	'service_title' => 'Serviços de Borracharia',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-mecanica-e-borracharia/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		],
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Calibragem',
				'Conserto de pneus blindados',
				'Restauração de rodas',
				'Troca de pneus',
				'Vulcanização',
				'Outro'
			]
		]
	]
];

// 048 - Automóveis - Mecânica - Mecânica Geral
$forms['048'] = [
	'service_category' => 'Mecânica Geral',
	'service_title' => 'Serviços de Mecânica Geral',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-mecanica-de-autos-em-geral/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		],
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Alinhamento, Balanceamento ou Cambagem',
				'Direção Hidráulica',
				'Freios e Suspensão',
				'Injeção Eletrônica',
				'Revisão Geral',
				'Troca de Óleo',
				'Outro'
			]
		]
	]
];


// 049 - Automóveis - Mecânica - Socorro Mecânico
$forms['049'] = [
	'service_category' => 'Socorro Mecânico',
	'service_title' => 'Serviços de Socorro Mecânico',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-socorro-mecanico/',
	'service_form_json' => [
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do veículo?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do carro. Ex.: Fire, Doblo, EcoSport, Ka...'
		],
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Para quel situação precisa de socorro?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Veículo batido',
				'Bateria',
				'Problema mecânico/quebrado',
				'Roda travada/avariada',
				'Sem danos, somente transporte',
				'Outro'
			]
		]
	]
];