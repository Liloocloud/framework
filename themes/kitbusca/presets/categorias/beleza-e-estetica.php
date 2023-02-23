<?php

// 050 - Barbeiro
$forms['050'] = [
	'service_category' => 'Barbeiro',
	'service_title' => 'Serviços de Barbeiro Profissional',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-barbearia/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você procura?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Corte de Cabelo e Barba',
				'Apenas Barba',
				'Apenas Cabelo'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de serviço você procura?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Hidratação',
				'Pigmentação'
			]
		]
	]
];

// 051 - Cabeleireiro
$forms['051'] = [
	'service_category' => 'Cabeleireiro',
	'service_title' => 'Serviços de Cabeleireiro Profissional',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-cabeleireiro-profssional/',
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
				'Coloração',
				'Corte',
				'Escova ',
				'Escova progressiva/definitiva',
				'Luzes',
				'Penteado'
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
				'Criança',
				'Mulher',
				'Homem'
			]
		]
	]
];

// 052 - Cílios Fio à Fio
$forms['052'] = [
	'service_category' => 'Cílios Fio à Fio',
	'service_title' => 'Extensão e Alongamento de Cílios Fio à Fio',
	'service_type' => 'presencial',
	'service_url' => 'extensao-e-alogamento-de-cilios-fio-a-fio/',
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
				'Alongamento Clássico',
				'Alogamento Híbrido',
				'Volume Russo',
				'Manutenção',
				'Mega Volume',
				'Não tenho Certeza'
			]
		]
	]
];

// 053 - Design de Sobrancelhas
$forms['053'] = [
	'service_category' => 'Design de Sobrancelhas',
	'service_title' => 'Serviços de Design de Sobrancelhas',
	'service_type' => 'presencial',
	'service_url' => 'micropigmentacao-e-design-de-sobrancelhas-profissional/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'label',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Coloração de sobrancelhas',
				'Despigmentação de sobrancelhas',
				'Hidratação de sobrancelhas',
				'Micropigmentação',
				'Preenchimento de sobrancelhas com henna',
				'Outro'
			]
		]
	]
];

// 054 - Manicure e Pedicure
$forms['054'] = [
	'service_category' => 'Manicure e Pedicure',
	'service_title' => 'Serviços Profissionais de Manicure e Pedicure',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-manicure-e-pedicure/',
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
				'Manicure',
				'Pedicure',
				'Podologia'
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
				'Criança',
				'Homem ',
				'Mulher',
			]
		]
	]
];

// 055 - Maquiador
$forms['055'] = [
	'service_category' => 'Maquiador',
	'service_title' => 'Serviços de Maquiadores Profissionais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-maquiadores-profissionais/',
	'service_form_json' => [
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'A maquiagem é para qual tipo de ocasião?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Festas ou Eventos',
				'Casual',
				'Outra'
			]
		],

		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'Quem será maquiado(a)?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Criança',
				'Mulher',
				'Noiva ou Debutante',
				'Homem'
			]
		]
	]
];

// 056 - Depilação
$forms['056'] = [
	'service_category' => 'Depilação',
	'service_title' => 'Serviços de Depilação',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-depilacao-e-estetica/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Depilação corporal',
				'Depilação íntima'
			]
		],

		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'Qual é o gênero do cliente?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Feminino',
				'Masculino',
				'Prefiro não informar'
			]
		]
	]
];

// 057 - Esteticista
$forms['057'] = [
	'service_category' => 'Esteticista',
	'service_title' => 'Serviços de Esteticistas Profissionais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-esteticistas-profissionais',
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
				'Drenagem linfática',
				'Esfoliação corporal/facial',
				'Limpeza de pele',
				'Massagem modeladora',
				'Peeling facial',
				'Outro'
			]
		],

		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'Qual é o gênero do cliente?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Feminino',
				'Masculino',
				'Prefiro não informar'
			]
		]
	]
];

// 058 - Piercer
$forms['058'] = [
	'service_category' => 'Piercer',
	'service_title' => 'Serviços de Piercers Profissionais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-piercers-profissionais/',
	'service_form_json' => [
		// SELECT
		'add_age' => [
			'field' => 'select',
			'label' => 'Qual serviço de Piercer você procura?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Inserção de Piercing',
				'Outro'
			]
		],

		// SELECT
		'add_age' => [
			'field' => 'select',
			'label' => 'O cliente é maior de idade?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Sim',
				'Não'
			]
		]
	]
];

// 059 - Tatuador
$forms['059'] = [
	'service_category' => 'Tatuador',
	'service_title' => 'Serviços de Tatuadores Profissionais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-tatuadores-profissionais/',
	'service_form_json' => [
		// SELECT
		'add_age' => [
			'field' => 'select',
			'label' => 'Qual serviço de Tatuagem você procura?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Tatuagem Nova',
				'Cobertura de Tatuagem',
				'Retoque'
			]
		],

		// SELECT
		'add_age' => [
			'field' => 'select',
			'label' => 'O cliente é maior de idade?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Sim',
				'Não'
			]
		]
	]
];