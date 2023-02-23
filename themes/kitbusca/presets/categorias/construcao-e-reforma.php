<?php
/**
 * @copyright 01.06.2020 - Felipe Oliveira Loourenço
 * @see Criado por Filipe Camargo de Barros 
 */

// 060 - Engenheiro Civil
$forms['060'] = [
	'service_category' => 'Engenheiro Civil',
	'service_title' => 'Serviços especializados de Engenharia Civil, Construção e Reformas',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-engenheiro-civil-construcao-e-reformas/',
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
		]
	]
];

// 061 - Impermeabilizador
$forms['061'] = [
	'service_category' => 'Impermeabilizador',
	'service_title' => 'Serviços de Impermeabilização',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-impermeabilizacao/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Onde o serviço será realizado?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Caixas d\'água/reservatório',
				'Calha',
				'Exterior/varanda/sacada',
				'Floreira',
				'Garagem/estacionamento',
				'Laje',
				'Marquise',
				'Parede',
				'Piso',
				'Teto',
				'Outro'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Qual problema você precisa resolver?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Descoloração',
				'Inundação',
				'Rachadura',
				'Umidade',
				'Vazamento',
				'Outro'
			]
		],
		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a medida do local?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Pequeno (até 50m²)',
				'Médio (50m² até 150m²)',
				'Grande (150m² ou mais)',
				'Não tenho certeza'
			]
		]
	]
];

// 062 - Limpeza pós obra
$forms['062'] = [
	'service_category' => 'Limpeza pós obra',
	'service_title' => 'Serviços de Limpeza pós obra de construção e reformas',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-limpeza-pos-obra-de-construcao-e-reformas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Limpeza pós obra você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Limpeza de entulhos',
				'Limpeza de pequenos reparos residenciais ',
				'Limpeza pós-obra',
				'Limpeza pré/pós mudança',
				'Outro'
			]
		]
	]
];

// 063 - Pedreiro
$forms['063'] = [
	'service_category' => 'Pedreiro',
	'service_title' => 'Serviços de Pedreiro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-pedreiro-para-construcao-e-reformas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual é a medida do local?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Construção em geral',
				'Paredes e estruturas',
				'Pisos e revestimentos',
				'Telhados e telhas',
				'Outros'
			]
		],
		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a medida do local?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Não tenho certeza',
				'Até 10m²',
				'10m² a 50m²',
				'50m² a 100m²',
				'100m² a 150m²',
				'150m² a 200m²',
				'Maior que 200m²'
			]
		]
	]
];

// 064 - Terraplanagem
$forms['064'] = [
	'service_category' => 'Terraplanagem',
	'service_title' => 'Serviços de Terraplanagem',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-terraplanagem-para-construcao-e-reformas/',
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
				'Aterro',
				'Compactação de solo',
				'Desaterro',
				'Nivelamento',
				'Outro'
			]
		],
		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a medida do local?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Pequeno (até 50m²)',
				'Médio (50m² até 150m²)',
				'Grande (150m² ou mais)',
				'Não tenho certeza'
			]
		]
	]
];


// 065 - Arquiteto
$forms['065'] = [
	'service_category' => 'Arquiteto',
	'service_title' => 'Serviços de Arquiteto para Construcao Civil e Reforma',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-arquiteto-para-construcao-civil-e-reforma/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Arquiteto está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acompanhamento de obra',
				'Consultoria',
				'Laudo técnico',
				'Projeto residencial',
				'Projeto de escritório',
				'Projeto de local comercial',
				'Projeto para interiores',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a medida do seu projeto',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Pequeno (até 50m²)',
				'Médio (50m² até 150m²)',
				'Grande (150m² ou mais)',
				'Não tenho certeza'
			]
		]
	]
];

// 066 - Decorador 
$forms['066'] = [
	'service_category' => 'Decorador',
	'service_title' => 'Serviços de Decorador e Designer de Interiores',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-decorador-e-designer-de-interiores',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Para qual ambiente é o serviço?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Banheiro',
				'Cozinha',
				'Quarto',
				'Sala',
				'Varanda/externo',
				'Todo o Imóvel'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Quais são as medidas do local?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Pequeno (até 50 m²)',
				'Médio (50 a 100 m²)',
				'Grande (100 m² ou mais)'
			]
		]
	]
];

// 067 - Desenho Técnico e AutoCAD 
$forms['067'] = [
	'service_category' => 'Desenho Técnico e AutoCAD',
	'service_title' => 'Profssionais de Desenhos Técnicos e AutoCAD',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-desenho-tecnico-e-autocad',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual tipo de projeto em AutoCAD você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Projeto Autocad 2D',
				'Projeto Autocad 3D',
				'Outro'
			]
		]
	]
];

// 068 - Técnico em Edificações
$forms['068'] = [
	'service_category' => 'Técnico em Edificações',
	'service_title' => 'Profissionais de Assistência Técnica em Edificações',
	'service_type' => 'presencial',
	'service_url' => 'profissionais-de-assistencia-tecnica-em-edificacoes',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Assistência Técnica em Edificações você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Gerenciamento de Obras',
				'Assistência Técnica em Projetos',
				'Auxílio na Compra e Venda de Produtos e Equipamentos',
				'Outro'
			]
		]
	]
];

// 069 - Paisagista 
$forms['069'] = [
	'service_category' => 'Paisagista',
	'service_title' => 'Serviços Profissionais de Paisagismo',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-paisagismo-e-jardinagem',
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
				'Consultoria',
				'Adequação Ambiental',
				'Manutenção de Áreas Verdes',
				'Projetos Paisagísticos',
				'Jardins Verticais',
				'Outro'
			]
		],
		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Quais são as medidas do local?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Pequeno (até 50 m²)',
				'Médio (50 a 100 m²)',
				'Grande (100 m² ou mais)'
			]
		]
	]
];



// 070 - Eletricista 
$forms['070'] = [
	'service_category' => 'Eletricista',
	'service_title' => 'Serviços de Instalações Elétricas e Eletricistas Profissionais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-instalacoes-eletricas-e-eletricistas-profissionais',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Eletricista você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Certificado de Instalação',
				'Conserto ou manutenção',
				'Fiação elétrica',
				'Instalação',
				'Instalação de ar condicionado',
				'Outro'
			]
		]
	]
];

// 071 - Encanador 
$forms['071'] = [
	'service_category' => 'Encanador',
	'service_title' => 'Serviços de Encanadores Profissionais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-encanadores-profissionais',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Encanador você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Caça Vazamento',
				'Conserto e Manutenção',
				'Desentupimento',
				'Instalação',
				'Outros'
			]
		],

		'add_problem' => [
			'field' => 'select',
			'label' => 'Onde é o problema?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Caixa d\'água',
				'Encanamento',
				'Esgoto/fossa',
				'Pia/tanque',
				'Ralo',
				'Registro',
				'Chuveiro',
				'Vaso sanitário',
				'Outro'
			]
		]
	]
];

// 072 - Gesso e Drywall 
$forms['072'] = [
	'service_category' => 'Gesso e Drywall',
	'service_title' => 'Serviços Profissionais de Instalação de Gesso e Drywall',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-instalacao-de-gesso-e-drywall',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Gesso e Drywall você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação',
				'Reparo e Manutenção',
				'Troca da Instalação Atual',
				'Outro'
			]
		]
	]
];

// 073 - Pintor 
$forms['073'] = [
	'service_category' => 'Pintor',
	'service_title' => 'Serviços de Pintores Profissionais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-pintores-profissionais',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviços de Pintores você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Pintura Interna',
				'Pintura Externa',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Quais são as medidas do local?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Pequeno (até 50 m²)',
				'Médio (50 a 100 m²)',
				'Grande (100 m² ou mais)'
			]
		]
	]
];

// 074 - Envidraçamento 
$forms['074'] = [
	'service_category' => 'Envidraçamento',
	'service_title' => 'Serviços Profissionais de Envidraçamento e Fechamentos de Vidro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-envidracamento-e-fechamentos-de-vidro',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço Marcenaria você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Intalação',
				'Reparo e Manutenção',
				'Box de Banho',
				'Fechamento de Sacadas',
				'Outro'
			]
		]
	]
];

// 075 - Serralheiro e Soldador
$forms['075'] = [
	'service_category' => 'Serralheiro e Soldador',
	'service_title' => 'Serviços Profissionais de Serralheiro e Soldador',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-serralheiro-e-soldador',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço Serralheiro e Soldador você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Conserto/manutenção',
				'Fabricação',
				'Instalação',
				'Outro'
			]
		]
	]
];

// 076 - Vidraceiro 
$forms['076'] = [
	'service_category' => 'Vidraceiro',
	'service_title' => 'Serviços de Vidraceiros Profissionais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-vidraceiros-profissionais',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço Vidraceiro você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Conserto',
				'Instalação',
				'Remoção',
				'Substituição',
				'Outro'
			]
		]
	]
];