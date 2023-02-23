<?php
/**
 * @copyright 16.06.2020 - Filipe Camargo de Barros
 */

// 155 - Alarme
$forms['155'] = [
	'service_category' => 'Alarme',
	'service_title' => 'Alarmes de Segurança Residencial e Comercial',
	'service_type' => 'presencial',
	'service_url' => 'alarmes-de-seguranca-residencial-e-comercial/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Alarme você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação de novo alarme',
				'Manutenção'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Que tipo de Alarme você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Sensores magnéticos',
				'Sensores de movimento',
				'Sensor de incêndio',
				'Quebra vidro',
				'Infravermelho',
				'Infravermelho passivo',
				'Microondas e infravermelho passivo',
				'Infravermelho ativo',
				'Alarme “Pet”',
				'Sensores de teto',
				'Outro'
			]
		]
	]
];

// 156 - Cerca Elétrica
$forms['156'] = [
	'service_category' => 'Cerca Elétrica',
	'service_title' => 'Instalação e Manutenção de Cerca Elétricas',
	'service_type' => 'presencial',
	'service_url' => 'instalacao-e-manutencao-de-cerca-eletricas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Cerca Elétrica você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação de nova Cerca',
				'Manutenção '
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Que tipo de Cerca Elétrica você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Convencional',
				'Concertina'
			]
		]
	]
];

// 157 - Fechadura Elétrica
$forms['157'] = [
	'service_category' => 'Fechadura Elétrica',
	'service_title' => 'Serviços de Instalação e Manutenção de Fechadura Elétrica',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-instalacao-e-manutencao-de-fechadura-eletrica/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Fechadura Elétrica você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação de nova Fechadura',
				'Manutenção '
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de Fechadura Elétrica você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Fechadura Elétrica',
				'Fechadura Solenóide',
				'Fechadura Eletroíma',
				'Fechadura Digital',
				'Outro'
			]
		]
	]
];

// 158 - Interfone
$forms['158'] = [
	'service_category' => 'Interfone',
	'service_title' => 'Serviços de Instalação e Manutenção de Interfone',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-instalacao-e-manutencao-de-interfone/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Interfone você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação de novo Interfone',
				'Manutenção '
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de Interfone você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Interfone Analógico',
				'Interfone Digital',
				'Porteiro GSM',
				'Interfone sem fio',
				'Outro'
			]
		]
	]
];

// 159 - Monitoramento CFTV
$forms['159'] = [
	'service_category' => 'Monitoramento CFTV',
	'service_title' => 'Serviços de Instalação e Manutenção de Câmeras de Monitoramento CFTV',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-instalacao-e-manutencao-de-cameras-de-monitoramento-cftv/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Monitoramento CFTV você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação Nova',
				'Manutenção '
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de Câmera de Monitoramento CFTV você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Câmera com infravermelho',
				'Câmeras speed dome',
				'Câmeras IP',
				'Câmera dome',
				'Câmera bullet',
				'Câmera de segurança AHD',
				'Interfonia residencial',
				'Sistema de CFTV',
				'Outro'
			]
		]
	]
];

// 160 - Portão Eletrônico
$forms['160'] = [
	'service_category' => 'Portão Eletrônico',
	'service_title' => 'Serviços de Instalação e Manutenção de Portão Eletrônico',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-instalacao-e-manutencao-de-portao-eletronico/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Portão Eletrônico você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação de novo Portão Eletrônico',
				'Manutenção'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de Portão Eletrônico você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Portões basculantes',
				'Portões de correr',
				'Portões pivotantes',
				'Portões de abrir',
				'Outro'
			]
		]
	]
];

// 161 - Sensor Eletrônico
$forms['161'] = [
	'service_category' => 'Sensor Eletrônico',
	'service_title' => 'Serviços de Instalação e Manutenção de Sensor Eletrônico',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-instalacao-e-manutencao-de-sensor-eletronico/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Sensor Eletrônico você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação de novo Sensor Eletrônico',
				'Manutenção'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de Sensor Eletrônico você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Portões basculantes',
				'Portões de correr',
				'Portões pivotantes',
				'Portões de abrir',
				'Outro'
			]
		]
	]
];

// 162 - Automação Predial
$forms['162'] = [
	'service_category' => 'Automação Predial',
	'service_title' => 'Serviços de Automação Predial',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-automacao-predial/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Automação Predial você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação de novo sistema',
				'Manutenção'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de Automação Predial você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Sistemas de supervisão e controle das utilidades',
				'Sistemas de segurança',
				'Outro'
			]
		]
	]
];

// 163 - Automação Residencial
$forms['163'] = [
	'service_category' => 'Automação Residencial',
	'service_title' => 'Serviços de Automação Residencial',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-automacao-residencial/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Automação Residencial você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação de novo sistema',
				'Manutenção'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de Automação Residencial você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Iluminação',
				'Audiovisual',
				'Controle de acesso',
				'Integração e controle dos sistemas',
				'Outro'
			]
		]
	]
];

// 164 - Diarista
$forms['164'] = [
	'service_category' => 'Diarista',
	'service_title' => 'Serviços de Diarista',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-diarista/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Limpeza você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Limpeza para empresas',
				'Limpeza comum (faxina do dia-a-dia)',
				'Limpeza pesada',
				'Outro'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Você já possui o material de limpeza? (Produtos de limpeza, balde, vassoura, etc)',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Sim, possuo os materiais',
				'Não, preciso que o profissional traga o material'
			]
		]
	]
];

// 165 - Limpeza de Estofados
$forms['165'] = [
	'service_category' => 'Limpeza de Estofados',
	'service_title' => 'Serviços de Limpeza de Estofados',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-limpeza-de-estofados/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Limpeza você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Limpeza e Higienização',
				'Impermeabilização',
				'Limpeza e Hidratação de Couro',
				'Limpeza e Higienização de Colchão',
				'Outro'

			]
		],
		
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual tipo de Estofado?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Sofá',
				'Poltrona',
				'Cadeira',
				'Outro'
			]
		]
	]
];

// 166 - Montador de Móveis
$forms['166'] = [
	'service_category' => 'Montador de Móveis',
	'service_title' => 'Serviços de Montador de Móveis',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-montador-de-moveis/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Montador de Móveis você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Desmontagem',
				'Montagem',
				'Montagem e Desmontagem'
			]
		],
		
		// CHECKBOX
		'add_checkbox' => [
			'field' => 'checkbox',
			'label' => 'Quais Móveis precisarão de Montagem ou Desmontagem?',
			'class' => 'uk-checkbox uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Armário (cozinha/banheiro)',
				'Beliche',
				'Cadeira',
				'Cama de casal',
				'Cama de solteiro',
				'Cômoda',
				'Escrivaninha',
				'Guarda-roupa',
				'Guarda-roupa (portas de correr)',
				'Mesa',
				'Prateleira'
			]
		]
	]
];

// 167 - Passadeira
$forms['167'] = [
	'service_category' => 'Passadeira',
	'service_title' => 'Serviços de Passadeira',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-passadeira/',
	'service_form_json' => [
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de roupa a ser passada?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Roupa do dia-a-dia',
				'Roupa de cama/mesa/banho',
				'Roupa social',
				'Diversos tipos de roupas',
				'Outro tipo de roupa'
			]
		]
	]
];

// 168 - Personal Organizer
$forms['168'] = [
	'service_category' => 'Personal Organizer',
	'service_title' => 'Serviços de Personal Organizer',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-personal-organizer/',
	'service_form_json' => [
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual serviço de Personal Organizer você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Organização de mala de viagem',
				'Organização de mudança',
				'Organização de rotina',
				'Organização de documentos/escritório',
				'Organização de armários do quarto/closet',
				'Organização de armários da cozinha',
				'Outro'
			]
		]
	]
];

// 169 - Cozinheiro
$forms['169'] = [
	'service_category' => 'Cozinheiro',
	'service_title' => 'Serviços de Cozinheiro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-cozinheiro/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual é a frequência do serviço?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Uma única vez',
				'Encomenda',
				'Diariamente',
				'Semanalmente',
				'Outra'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Para quantas pessoas o serviço será prestado?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'1 pessoa',
				'2 a 4 pessoas',
				'4 a 8 pessoas',
				'9 ou mais pessoas',
				'Não tenho certeza'
			]
		]
	]
];

// 170 - Desentupidor
$forms['170'] = [
	'service_category' => 'Desentupidor',
	'service_title' => 'Serviços de Desentupidor',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-desentupidor/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Desentupidor você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Desentupimento',
				'Hidrojateamento',
				'Limpeza',
				'Outro'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Onde o serviço será realizado?',
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
				'Vaso sanitário',
				'Outro'
			]
		]
	]
];

// 171 - Marido de Aluguel
$forms['171'] = [
	'service_category' => 'Marido de Aluguel',
	'service_title' => 'Serviços de Marido de Aluguel',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-marido-de-aluguel/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Marido de Aluguel você procura?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Conserto/manutenção',
				'Desentupimento',
				'Encanamento',
				'Alvenaria básica',
				'Limpeza de telhados',
				'Instalação elétrica',
				'Vazamentos',
				'Outros'
			]
		]
	]
];

// 172 - Piscineiro
$forms['172'] = [
	'service_category' => 'Piscineiro',
	'service_title' => 'Serviços de Piscineiro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-piscineiro/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Piscineiro está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Análise de equilíbrio (pH)',
				'Limpeza de bombas',
				'Limpeza de filtro',
				'Limpeza geral',
				'Remoção de manchas',
				'Outros'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de piscinas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'1 piscina',
				'2 a 3 piscinas',
				'4 ou mais piscinas'
			]
		]
	]
];

// 173 - Chaveiro
$forms['173'] = [
	'service_category' => 'Chaveiro',
	'service_title' => 'Serviços de Chaveiro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-chaveiro/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Chaveiro está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Chave codificada',
				'Cópia de chave',
				'Troca de fechadura ou abertura',
				'Outros'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo de serviços',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Automotivo',
				'Residencial',
				'Comercial'
			]
		]
	]
];

// 174 - Dedetizador
$forms['174'] = [
	'service_category' => 'Dedetizador',
	'service_title' => 'Serviços de Dedetizador',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-Dedetizador/',
	'service_form_json' => [
	// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Dedetizador você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Controle de pragas',
				'Dedetização (geral ou preventiva)',
				'Desinsetização (acabar com insetos)',
				'Descupinização (eliminar cupins)',
				'Desratização (eliminar ratos)',
				'Limpeza de caixa d\'água',
				'Impermeabilização de caixa d\'água',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é o tamanho do local?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Pequeno (até 50 m²)',
				'Médio (50 até 150 m²)',
				'Grande (150 m² ou mais)'
			]
		]
	]
];

// 175 - Jardinagem
$forms['175'] = [
	'service_category' => 'Jardinagem',
	'service_title' => 'Serviços de Jardinagem',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-jardinagem/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Jardinagem você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Fertilização de terra',
				'Instalação de sistema de irrigação',
				'Manutenção',
				'Plantio',
				'Poda ',
				'Projeto de um novo jardim'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é o tamanho do jardim?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Pequeno (até 50m²)',
				'Médio (50m² a 100m²)',
				'Grande (100m² a 200m²)',
				'Muito grande (200m² ou mais)'
			]
		]
	]
];

// 176 - Soldador
$forms['176'] = [
	'service_category' => 'Soldador',
	'service_title' => 'Serviços de Soldador',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-soldador/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Soldador você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Soldagem a arco manual',
				'Soldagem MIG',
				'Soldagem TIG',
				'Soldagem a arco com arame tubular',
				'Soldagem oxigás',
				'Soldagem com eletrodo revestido',
				'Não tenho certeza'
			]
		]
	]
];

// 177 - Luthier
$forms['177'] = [
	'service_category' => 'Luthier',
	'service_title' => 'Serviços de Luthier',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-luthier/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Luthier está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Criação de Instrumento',
				'Manutenção / Conserto',
				'Outro'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual é o Instrumento?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Violão',
				'Bateria',
				'Contrabaixo',
				'Canto',
				'Guitarra',
				'Piano / Teclado',
				'Outros'
			]
		]
	]
];

// 178 - Marceneiro
$forms['178'] = [
	'service_category' => 'Marceneiro',
	'service_title' => 'Serviços de Marceneiro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-marceneiro/',
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
				'Aplicação de sinteco',
				'Instalação',
				'Manutenção',
				'Raspagem',
				'Restauração',
				'Substituição'
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

// 179 - Tapeceiro
$forms['179'] = [
	'service_category' => 'Tapeceiro',
	'service_title' => 'Serviços de Tapeceiro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-tapeceiro/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Tapeceiro está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Conserto - Estrutura',
				'Fabricação',
				'Impermeabilização',
				'Limpeza',
				'Reformar - Estofado',
				'Outro'
			]
		]
	]
];

// 180 - Adestrador
$forms['180'] = [
	'service_category' => 'Adestrador',
	'service_title' => 'Serviços de Adestrador',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-adestrador/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'O Serviço é para qual Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cachorro',
				'Gato',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a idade do Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Filhote (3 a 11 meses)',
				'Adulto (1 a 7 anos)',
				'Idoso ( 7 anos ou mais)',
				'Não tenho certeza'
			]
		],

		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é a raça do Animal?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui a raça do Animal?'
		]
	]
];

// 181 - Banho e Tosa
$forms['181'] = [
	'service_category' => 'Banho e Tosa',
	'service_title' => 'Serviços de Banho e Tosa',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-banho-e-tosa/',
	'service_form_json' => [

				// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'O Serviço é para qual Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cachorro',
				'Gato',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a idade do Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Filhote (3 a 11 meses)',
				'Adulto (1 a 7 anos)',
				'Idoso ( 7 anos ou mais)',
				'Não tenho certeza'
			]
		],

		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é a raça do Animal?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui a raça do Animal?'
		]
	]
];

// 182 - Hospedagem de Animais
$forms['182'] = [
	'service_category' => 'Hospedagem de Animais',
	'service_title' => 'Serviços de Hospedagem de Animais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-hospedagem-de-animais/',
	'service_form_json' => [

		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'O Serviço é para qual Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cachorro',
				'Gato',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a idade do Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Filhote (3 a 11 meses)',
				'Adulto (1 a 7 anos)',
				'Idoso ( 7 anos ou mais)',
				'Não tenho certeza'
			]
		],

		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é a raça do Animal?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui a raça do Animal?'
		]
	]
];

// 183 - Passeador
$forms['183'] = [
	'service_category' => 'Passeador',
	'service_title' => 'Serviços de Passeador',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-passeador/',
	'service_form_json' => [
		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a idade do(s) seu(s) cachorro(s)?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Filhote (3 a 11 meses)',
				'Adulto (1 a 7 anos)',
				'Idoso ( 7 anos ou mais)',
				'Não tenho certeza'
			]
		],

		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é a raça do(s) seu(s) cachorro(s)?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui a raça do(s) seu(s) cachorro(s)?'
		]
	]
];

// 184 - Pet Sitter
$forms['184'] = [
	'service_category' => 'Pet Sitter',
	'service_title' => 'Serviços de Pet Sitter',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-pet-sitter/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'O Serviço é para qual Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cachorro',
				'Gato',
				'Outro'
			]
		],

		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Pet Sitter você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Alimentação,',
				'Limpeza e troca de água,',
				'Limpeza do cantinho de xixi e coco, caixa de areia, gaiola ou terrário,',
				'Brincadeiras e enriquecimento ambiental,',
				'Passeios de 15 a 20 minutos para cães,',
				'Escovação dos pelos,',
				'Administração de medicamentos',
				'Outros'
			]
		]
	]
];

// 185 - Transporte de Animais
$forms['185'] = [
	'service_category' => 'Transporte de Animais',
	'service_title' => 'Serviços de Transporte de Animais',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-transporte-de-animais/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'O Serviço é para qual Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cachorro',
				'Gato',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a idade do Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Filhote (3 a 11 meses)',
				'Adulto (1 a 7 anos)',
				'Idoso ( 7 anos ou mais)',
				'Não tenho certeza'
			]
		],

		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é a raça do Animal?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui a raça do Animal?'
		]
	]
];

// 186 - Veterinário
$forms['186'] = [
	'service_category' => 'Veterinário',
	'service_title' => 'Serviços de Veterinário',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-veterinario/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço Veterinário está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Consulta Veterinária',
				'Cirurgias ou Castração',
				'Exames e Diagnóstico',
				'Outros'				
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'O Serviço é para qual Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cachorro',
				'Gato',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a idade do Animal?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Filhote (3 a 11 meses)',
				'Adulto (1 a 7 anos)',
				'Idoso ( 7 anos ou mais)',
				'Não tenho certeza'
			]
		],

		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é a raça do Animal?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui a raça do Animal?'
		]
	]
];

// 187 - Desenvolvimento de Aplicativos
$forms['187'] = [
	'service_category' => 'Desenvolvimento de Aplicativos',
	'service_title' => 'Serviços de Desenvolvimento de Aplicativos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-desenvolvimento-de-aplicativos/',
	'service_form_json' => [
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Que tipo de aplicativo você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aplicativo para gerenciamento de ordem de serviço',
				'Aplicativo para controle financeiro',
				'Aplicativo de força de vendas',
				'Aplicativo para colaboração em equipes',
				'Não tenho certeza'
			]
		],
		
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'O Aplicativo é para qual sistema operacional?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Android',
				'iOS',
				'Outro'
			]
		]
	]
];

// 188 - Criação de Sites e Landing Pages
$forms['188'] = [
	'service_category' => 'Criação de Sites e Landing Pages',
	'service_title' => 'Serviços de Criação de Sites e Landing Pages',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-criacao-de-sites-e-landing-pages/',
	'service_form_json' => [
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual tipo de Site você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Landing Page (Página Única)',
				'Site Institucional',
				'Site Showroom',
				'Loja Virtual',
				'Não tenho certeza'
			]
		]
	]
];

// 189 - Desenvolvedores/Programadores
$forms['189'] = [
	'service_category' => 'Desenvolvedores/Programadores',
	'service_title' => 'Serviços de Desenvolvedores/Programadores',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-desenvolvedores-programadores/',
	'service_form_json' => [
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Que tipo de Desenvolvimento você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Front-end',
				'Back-end',
				'Front-end e Back-end',
				'Full stack',
				'Não tenho certeza',
			]
		],

		// CHECKBOX
		'add_options' => [
			'field' => 'checkbox',
			'label' => 'Qual Linguagem é necessário ter conhecimento?',
			'class' => 'uk-checkbox uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'PHP',
				'Java Script',
				'HTML',
				'CSS',
				'Payton',
				'D#',
				'SQL',
				'Outros'
			]
		]
	]
];