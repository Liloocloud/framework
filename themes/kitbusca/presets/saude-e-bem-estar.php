<?php

// 001 - Psicológico
$forms['001'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Psicológico',
	'service_sub_category' => 'Psicólogo',
	'service_title' => 'Serviços de Psicólogo',
	'service_url' => 'saude-e-bem-estar/psicologico/psicologo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Psicólogo está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acompanhamento terapêutico',
				'Avaliação psicológica (laudos)',
				'Orientação vocacional/profissional',
				'Psicanálise',
				'Psicopedagogia',
				'Terapia',
				'Outro'
			]
		],
		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'Você possui preferência pelo gênero do profissional?',
			'class' => 'uk-select uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'options' => [
				'Indiferente',
				'Masculino',
				'Feminino'
			]
		],
		// SELECT
		'add_age' => [
			'field' => 'select',
			'label' => 'Qual é a faixa etária do paciente?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Criança (0 a 14 anos)',
				'Jovem (15 a 24 anos)',
				'Adulto (25 a 64 anos)',
				'Idoso (65 anos ou mais)'
			]
		]
	]
];

// 002 - Fonoaudiólogo
$forms['002'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Psicológico',
	'service_sub_category' => 'Fonoaudiólogo',
	'service_title' => 'Serviços de Fonoaudiologia',
	'service_url' => 'saude-e-bem-estar/psicologico/fonoaudiologo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Fonoaudiólogo está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cuidados com a voz',
				'Distúrbios auditivos',
				'Distúrbios de fala',
				'Distúrbios de linguagem'
			]
		],
		// INPUT
		'add_age' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Indique a idade do paciente:',
			'class' => 'uk-input uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui a idade do paciente'
		]
	]
];


// 003 - Fisioterapia
$forms['003'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Corporal',
	'service_sub_category' => 'Fisioterapia',
	'service_title' => 'Serviços de Fisioterapia',
	'service_url' => 'saude-e-bem-estar/corporal/fisioterapia/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Fisioterapeuta está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Fisioterapia para tratamento específico',
				'Fisioterapia esportiva ou ortopédica',
				'Pilates',
				'RPG (reeducação postural global)',
				'Outro'
			]
		],
		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'O paciente é:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Criança',
				'Adulto',
				'Gestante',
				'Idoso'
			]
		]
	]
];

// 004 - Massagista
$forms['004'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Corporal',
	'service_sub_category' => 'Massagista',
	'service_title' => 'Serviços de Massagista',
	'service_url' => 'saude-e-bem-estar/corporal/massagista/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Massagista está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Massagem Anti Celulite'
				'Massagem Modeladora'
				'Massagem Relaxante'
				'Quick Massage'
				'Shiatsu'
				'Termolipo'
			]
		]
	]
];

// 005 - Nutricionista
$forms['005'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Corporal',
	'service_sub_category' => 'Nutricionista',
	'service_title' => 'Serviços de Nutricionista',
	'service_url' => 'saude-e-bem-estar/corporal/nutricionista/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Nutricionista está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Avaliação (clínica e alimentar)',
				'Cardápio específico',
				'Estabelecimento de metas',
				'Performance esportiva',
				'Reeducação alimentar',
				'Acompanhamento pré-natal ou pós-parto',
				'Emagrecimento ou Estética',
				'Outros'
			]
		],
		// SELECT
		'add_age' => [
			'field' => 'select',
			'label' => 'Qual é a faixa etária do paciente?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Criança (0 a 14 anos)',
				'Jovem (15 a 24 anos)',
				'Adulto (25 a 64 anos)',
				'Idoso (65 anos ou mais)'
			]
		]
	]
];

// 006 - Podologia
$forms['006'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Corporal',
	'service_sub_category' => 'Podologia',
	'service_title' => 'Serviços de Podologia',
	'service_url' => 'saude-e-bem-estar/corporal/podologia/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Podologia está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Tratamento para calos e calosidades',
				'Tratamento para unhas encravadas',
				'Tratamento para micoses',
				'Tratamento para verruga plantar (olho de peixe)',
				'Spa dos pés'
			]
		]
	]
];

// 007 - Terapias Alternativas
$forms['007'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Corporal',
	'service_sub_category' => 'Terapias Alternativas',
	'service_title' => 'Serviços de Terapias Alternativas',
	'service_url' => 'saude-e-bem-estar/corporal/terapias-alternativas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Terapias Alternativas você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acupuntura',
				'Massagem terapêutica',
				'Massoterapia',
				'Quiropraxia',
				'Reflexologia',
				'Reiki',
				'Shiatsu',
				'Outro'
			]
		],
		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'Possui preferência por profissional?',
			'class' => 'uk-select uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'options' => [
				'Indiferente',
				'Mulher',
				'Homem'
			]
		]
	]
];

// 008 - Cuidador de Pessoas
$forms['008'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Familiar',
	'service_sub_category' => 'Cuidador de Pessoas',
	'service_title' => 'Serviços de Cuidador',
	'service_url' => 'saude-e-bem-estar/familiar/cuidador-de-pessoas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'O serviço de Cuidador de Pessoas é para:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Adultos',
				'Crianças',
				'Gestantes',
				'Idosos'
			]
		],
		// SELECT
		'add_frequency' => [
			'field' => 'select',
			'label' => 'Qual a frequência do serviço?',
			'class' => 'uk-select uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'options' => [
				'Uma única vez',
				'1 vez por semana',
				'2 vezes por semana',
				'3 ou mais vezes na semana',
				'Aos finais de semana',
				'Quinzenalmente',
				'Mensalmente',
				'Outra',
			]
		]
	]
];


// 009 - Enfermeiro
$forms['009'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Familiar',
	'service_sub_category' => 'Enfermeiro',
	'service_title' => 'Serviços de Enfermeiro',
	'service_url' => 'saude-e-bem-estar/familiar/enfermeiro/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Auxilio na recuperação de doentes:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cuidar de criança',
				'Cuidar de idoso'
			]
		],
		// SELECT
		'add_gender' => [
			'field' => 'select',
			'label' => 'Possui preferência por profissional?',
			'class' => 'uk-select uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'options' => [
				'Indiferente',
				'Mulher',
				'Homem'
			]
		]
	]
];


// 010 - Babá
$forms['010'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Familiar',
	'service_sub_category' => 'Babá',
	'service_title' => 'Serviços de Babá',
	'service_url' => 'saude-e-bem-estar/familiar/baba/',
	'service_form_json' => [
		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Quantas crianças estarão sob os serviços da babá?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'1 criança',
				'2 crianças',
				'3 crianças',
				'4 ou mais crianças'
			]
		],
		// SELECT
		'add_age' => [
			'field' => 'select',
			'label' => 'Indique a idade da(s) criança(s):',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'0 a 12 meses',
				'1 a 5 anos',
				'6 a 10 anos',
				'Mais que 10 anos'
			]
		]
	]
];

// 011 - Doula
$forms['011'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Familiar',
	'service_sub_category' => 'Doula',
	'service_title' => 'Serviços de Doula',
	'service_url' => 'saude-e-bem-estar/familiar/doula/',
	'service_form_json' => [
	]
];

// 012 - Plano de Saúde
$forms['012'] = [
	'service_activity' => 'Saúde e Bem-Estar',
	'service_category' => 'Familiar',
	'service_sub_category' => 'Plano de Saúde',
	'service_title' => 'Serviços de Plano de Saúde',
	'service_url' => 'saude-e-bem-estar/familiar/plano-de-saude/',
	'service_form_json' => [
	]
];