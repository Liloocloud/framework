<?php
/**
 * @copyright 12.06.2020 - Filipe Camargo de Barros
 */

// 101 - Recepcionistas
$forms['101'] = [
	'service_category' => 'Recepcionistas',
	'service_title' => 'Servicos de Recepcionistas para Festas e Eventos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-recepcionistas-para-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Você está procurando Recepcionistas para qual tipo de festa ou evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Outro'
			]
		]
	]
];

// 101 - Recepcionistas
$forms['101'] = [
	'service_category' => 'Recepcionistas',
	'service_title' => 'Servicos de Recepcionistas para Festas e Eventos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-recepcionistas-para-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Você está procurando Recepcionistas para qual tipo de festa ou evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Outro'
			]
		]
	]
];

// 102 - Segurança freelancer
$forms['102'] = [
	'service_category' => 'Segurança freelancer',
	'service_title' => 'Servicos de Segurança freelancer',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-seguranca-freelancer/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Segurança freelancer você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Festas e Eventos',
				'Segurança Particular',
				'Segurança de Balada',
				'Outro'
			]
		]
	]
];

// 103 - Bartender / Coquetelaria
$forms['103'] = [
	'service_category' => 'Bartender / Coquetelaria',
	'service_title' => 'Servicos de Bartender / Coquetelaria',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-bartender-coquetelaria/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Você está procurando Bartender / Coquetelaria para qual tipo de festa ou evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Outro'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Quem irá fornecer as bebidas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'O responsável pelo Evento',
				'O Profissional',
				'Não tenho Certeza'
			]
		]
	]
];

// 104 - Buffet Completo
$forms['104'] = [
	'service_category' => 'Buffet Completo',
	'service_title' => 'Servicos de Buffet Completo',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-buffet-completo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Buffet Completo você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Espaço e Comida',
				'Somente Comida',
				'Somente Espaço'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Você está procurando Buffet Completo para qual tipo de festa ou evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de convidados?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 30 convidados',
				'30 a 50 convidados',
				'50 a 70 convidados',
				'70 a 90 convidados',
				'90 a 120 convidados',
				'120 a 150 convidados',
				'150 convidados ou mais'
			]
		]
	]
];

// 105 - Churrasqueiro
$forms['105'] = [
	'service_category' => 'Churrasqueiro',
	'service_title' => 'Servicos de Churrasqueiro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-churrasqueiro/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Você está procurando Churrasqueiro para qual tipo de festa ou evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de convidados?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 30 convidados',
				'30 a 50 convidados',
				'50 a 70 convidados',
				'70 a 90 convidados',
				'90 a 120 convidados',
				'120 a 150 convidados',
				'150 convidados ou mais'
			]
		]
	]
];

// 106 - Pizzaiolo
$forms['106'] = [
	'service_category' => 'Pizzaiolo',
	'service_title' => 'Servicos de Pizzaiolo',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-pizzaiolo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Você está procurando Pizzaiolo para qual tipo de festa ou evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de convidados?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 30 convidados',
				'30 a 50 convidados',
				'50 a 70 convidados',
				'70 a 90 convidados',
				'90 a 120 convidados',
				'120 a 150 convidados',
				'150 convidados ou mais'
			]
		]
	]
];

// 107 - Salgados e Confeitaria
$forms['107'] = [
	'service_category' => 'Salgados e Confeitaria',
	'service_title' => 'Salgados e Confeitaria para Festas e Eventos',
	'service_type' => 'presencial',
	'service_url' => 'salgados-e-confeitaria-para-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Quais produtos de Salgados e Confeitaria você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Salgados',
				'Docinhos',
				'Bolos',
				'Kti de Festa',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de convidados?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 30 convidados',
				'30 a 50 convidados',
				'50 a 70 convidados',
				'70 a 90 convidados',
				'90 a 120 convidados',
				'120 a 150 convidados',
				'150 convidados ou mais'
			]
		]
	]
];

// 108 - Animador de Festas
$forms['108'] = [
	'service_category' => 'Animador de Festas',
	'service_title' => 'Serviços de Animador de Festas e Eventos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-animador-de-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Animador de Festas você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Animador de festas',
				'Artistas Circenses',
				'Contador de Histórias',
				'Esculturas com balões',
				'Mágico',
				'Palhaço',
				'Personagens',
				'Pintura Artística',
				'Recreação Infantil',
				'Outros'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a faixa etária dos convidados?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Crianças (0 a 12 anos)',
				'Adolescentes (12 a 18 anos)',
				'Adultos (mais de 18 anos)'
			]
		]
	]
];

// 109 - Bandas e Cantores
$forms['109'] = [
	'service_category' => 'Bandas e Cantores',
	'service_title' => 'Contratação de Bandas e Cantores para Festas, Eventos e Shows',
	'service_type' => 'online',
	'service_url' => 'contratacao-de-bandas-e-cantores-para-festas-eventos-e-shows/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual Estilo Musical de Bandas e Cantores você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Axé',
				'Bandas e Cantores',
				'Eclético',
				'Forró',
				'Funk',
				'MPB',
				'Pagode',
				'Rock',
				'Samba',
				'Sertanejo',
				'Outros'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Você está procurando Bandas e Cantores para qual tipo de festa ou evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Festas ou Eventos',
				'Barzinho',
				'Balada',
				'Show',
				'Live streaming',
				'Outro'
			]
		]
	]
];

// 110 - DJs
$forms['110'] = [
	'service_category' => 'DJs',
	'service_title' => 'Contratação de DJs para Festas e Eventos',
	'service_type' => 'online',
	'service_url' => 'contratacao-de-djs-para-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual Estilo Musical de DJs você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Eletrônica',
				'Funk',
				'Hip-Hop',
				'Pop',
				'Rock',
				'Variedade'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Você está procurando DJs para qual tipo de festa ou evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Festas ou Eventos',
				'Barzinho',
				'Balada',
				'Show',
				'Live streaming',
				'Outro'
			]
		]
	]
];

// 111 - Mágico
$forms['111'] = [
	'service_category' => 'Mágico',
	'service_title' => 'Contratação de Mágico para Festas e Eventos',
	'service_type' => 'online',
	'service_url' => 'contratacao-de-magico-para-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Mágico você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Mágico para Casamento',
				'Mágico para Festa de Debutante',
				'Mágico para Aniversário Adulto',
				'Mágico para Confraternizações Diversas',
				'Mágico para Eventos Sociais',
				'Mágico para Eventos Corporativos'
			]
		]
	]
];

// 112 - Brindes e Lembrancinhas
$forms['112'] = [
	'service_category' => 'Brindes e Lembrancinhas',
	'service_title' => 'Serviços de Brindes e Lembrancinhas para Festas e Eventos',
	'service_type' => 'online',
	'service_url' => 'servicos-de-brindes-e-lembrancinhas-para-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Quais tipos de Brindes e Lembrancinhas você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Velas personalizadas',
				'Tubetes',
				'Sacolas personalizadas',
				'Rótulos personalizados',
				'Para padrinhos',
				'Mini sabonetes',
				'Brinde corporativo',
				'Camisetas personalizadas',
				'Caneca personalizada',
				'Chinelos personalizados',
				'Doces personalizados',
				'Etiquetas',
				'Latinhas personalizadas',
				'Outro'

			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Os Brindes e Lembrancinhas são para qual tipo de Festa ou Evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Batizado',
				'Bodas',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Maternidade',
				'Noivado',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de Brindes e Lembrancinhas você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 30',
				'30 a 50',
				'50 a 70',
				'70 a 90',
				'90 a 120',
				'120 a 150',
				'150 ou mais'
			]
		]
	]
];

// 113 - Carro de Noiva
$forms['113'] = [
	'service_category' => 'Carro de Noiva',
	'service_title' => 'Serviços de Aluguel de Carro de Noiva',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-aluguel-de-carro-de-noiva/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual tipo de Carro de Noiva você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Packard ',
				'Rolls Royce',
				'Limusine',
				'Não tenho Certeza',
				'Outro'
			]
		]
	]
];

// 114 - Convites
$forms['114'] = [
	'service_category' => 'Convites',
	'service_title' => 'Serviços de Criação de Convites para Festas e Eventos',
	'service_type' => 'online',
	'service_url' => 'servicos-de-criacao-de-convites-para-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Os Convites são para qual tipo de Festa ou Evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Batizado',
				'Bodas',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Maternidade',
				'Noivado',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de Convites que você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 30',
				'30 a 50',
				'50 a 70',
				'70 a 90',
				'90 a 120',
				'120 a 150',
				'150 ou mais'
			]
		]
	]
];

// 115 - Decoração de Festas
$forms['115'] = [
	'service_category' => 'Decoração de Festas',
	'service_title' => 'Serviços de Decoração para Festas e Eventos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-decoracao-para-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'O Serviço de Decoração é para qual tipo de Festa ou Evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Batizado',
				'Bodas',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Maternidade',
				'Noivado',
				'Outro'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual Estilo de Decoração você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Decoração infantil',
				'Decoração natalina',
				'Decoração retrô/vintage',
				'Decoração temática/personalizada',
				'Outra'
			]
		]
	]
];

// 116 - Artes Gráficas (Produção Gráfica)
$forms['116'] = [
	'service_category' => 'Artes Gráficas (Produção Gráfica)',
	'service_title' => 'Serviços de Decoração para Festas e Eventos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-decoracao-para-festas-e-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'O Serviço de Decoração é para qual tipo de Festa ou Evento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário',
				'Batizado',
				'Bodas',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Maternidade',
				'Noivado',
				'Outro'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual Estilo de Decoração você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Decoração infantil',
				'Decoração natalina',
				'Decoração retrô/vintage',
				'Decoração temática/personalizada',
				'Outra'
			]
		]
	]
];