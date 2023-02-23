<?php
/**
 * @copyright 15.06.2020 - Filipe Camargo de Barros
 */

// 133 - Edição de Áudio
$forms['133'] = [
	'service_category' => 'Edição de Áudio',
	'service_title' => 'Servicos de Edição de Áudio',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-edicao-de-audio/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Edição de Áudio você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Edição de Cds Musicais',
				'Edição Jingles',
				'Narrações de Vídeos',
				'Dublagens',
				'Mixagem de Trilhas',
				'Produção de Spots de Rádio',
				'Retirada do Áudio de Um Filme',
				'Criação de Sons para Vídeo-Games',
				'Outro'
			]
		]
	]
];

// 134 - Gravação de Áudio
$forms['134'] = [
	'service_category' => 'Gravação de Áudio',
	'service_title' => 'Servicos de Gravação de Áudio',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-gravacao de audio/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Gravação de Áudio você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Gravação Multi Track',
				'Gravação ao Vivo',
				'Mixagem e Masterização',
				'Produção Musical',
				'Produção de Beats de Rap',
				'Código ISRC',
				'Trilha Sonora Original',
				'Locuções',
				'Spots e Jingles',
				'Sound Design',
				'Outro'
			]
		]
	]
];

// 135 - Locutor
$forms['135'] = [
	'service_category' => 'Locutor',
	'service_title' => 'Servicos de Locutor',
	'service_type' => 'online',
	'service_url' => 'servicos-de-locutor/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Locutor você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Locução de Vídeo',
				'Locução de Comercial de TV e Rádio',
				'Dublagem',
				'Outro'
			]
		]
	]
];

// 136 - Produtor Musical
$forms['136'] = [
	'service_category' => 'Produtor Musical',
	'service_title' => 'Servicos de Produtor Musical',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-produtor-musical/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Produtor Musical você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Gravação Multi Track',
				'Gravação ao Vivo',
				'Mixagem e Masterização',
				'Trilha Sonora Original',
				'Sound Design',
				'Gravação de CD ou Sigle',
				'Orientação e Ensaio',
				'Tendências do Mercado',
				'Outro'
			]
		]
	]
];

// 137 - Animação Motion
$forms['137'] = [
	'service_category' => 'Animação Motion',
	'service_title' => 'Servicos de Animação Motion',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-animacao-motion/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Animação Motion você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Vídeo Explicativo Animado',
				'Vídeo Institucional',
				'Vinhetas',
				'Vídeo Clipe',
				'Vídeo Animado',
				'Campanhas',
				'Outro'
			]
		]
	]
];

// 138 - Edição de Vídeos
$forms['138'] = [
	'service_category' => 'Edição de Vídeos',
	'service_title' => 'Servicos de Edição de Vídeos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-edicao-de-videos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Edição de Vídeos você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Vídeos pra o Youtube',
				'Apresentação de trabalho',
				'Curta-metragem',
				'Documentário',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a duração aproximada do vídeo?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 10 minutos',
				'10 á 30 minutos',
				'30 á 60 minutos',
				'1 á 2 horas',
				'2 horas ou mais'
			]
		]
	]
];

// 139 - Filmagem
$forms['139'] = [
	'service_category' => 'Filmagem',
	'service_title' => 'Servicos de Filmagem',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-filmagem/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Filmagem você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Filmagem de Parto/Nascimento',
				'Filmagem de Festas e Eventos',
				'Live Streaming',
				'Retrospectivas',
				'Filmagem com Drone',
				'Cameraman Freelance',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a duração aproximada do vídeo?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Até 10 minutos',
				'10 á 30 minutos',
				'30 á 60 minutos',
				'1 á 2 horas',
				'2 horas ou mais'
			]
		]
	]
];

// 140 - Ilustração
$forms['140'] = [
	'service_category' => 'Ilustração',
	'service_title' => 'Servicos de Ilustração',
	'service_type' => 'online',
	'service_url' => 'servicos-de-ilustracao/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Ilustração você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Ilustração de cenário',
				'Ilustração de embalagem',
				'Ilustração de paisagem',
				'Ilustração de personagem',
				'Ilustração estilo cartoon',
				'Ilustração estilo oriental',
				'Ilustração infantil'
			]
		]
	]
];

// 141 - Modelagem 2D e 3D
$forms['141'] = [
	'service_category' => 'Modelagem 2D e 3D',
	'service_title' => 'Servicos de Modelagem 2D e 3D',
	'service_type' => 'online',
	'service_url' => 'servicos-de-modelagem-2d-e-3d/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Modelagem 2D e 3D você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Criação de maquete 2D',
				'Criação de maquete 3D',
				'Criação de planta digital',
				'Desenvolvimento de projeto técnico',
				'Desenhos e projetos em AutoCAD',
				'Outro'
			]
		]
	]
];

// 142 - Edição de Fotos
$forms['142'] = [
	'service_category' => 'Edição de Fotos',
	'service_title' => 'Servicos de Edição de Fotos',
	'service_type' => 'online',
	'service_url' => 'servicos-de-edicao-de-fotos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Edição de Fotos você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Correção de Imperfeições',
				'Tratamento de Books/Ensaios',
				'Pós-Produção de Fotos',
				'Remoção/Alteração de Fundo',
				'Outro'
			]
		],

		// INPUT
		'add_quantity' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é a quantidade de fotos/imagens?',
			'class' => 'uk-input uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe a quantidade de páginas ou palavras'
		]
	]
];

// 143 - Fotógrafo
$forms['143'] = [
	'service_category' => 'Fotógrafo',
	'service_title' => 'Servicos de Fotógrafo',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-fotografo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Fotógrafo você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Ensaio de Casal',
				'Ensaio de Gestante',
				'Ensaio Feminino',
				'Ensaio Newborn',
				'Fotografia Corporativa',
				'Fotografia de Produto',
				'Fotografia de Publicidade',
				'Aniversário Adulto',
				'Aniversário Infantil',
				'Batizado',
				'Casamento',
				'Corporativos',
				'Debutante',
				'Formatura',
				'Outro'
			]
		]
	]
];

// 144 - Fonoaudiólogo
$forms['144'] = [
	'service_category' => 'Fonoaudiólogo',
	'service_title' => 'Servicos de Fonoaudiólogo',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-fonoaudiologo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Fonoaudiólogo você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cuidados com a Voz',
				'Distúrbios Auditivos',
				'Distúrbios de Fala',
				'Distúrbios de Linguagem'
			]
		],

		// INPUT
		'add_quantity' => [
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

// 145 - Psicólogo
$forms['145'] = [
	'service_category' => 'Psicólogo',
	'service_title' => 'Servicos de Psicólogo',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-psicologo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Psicólogo você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acompanhamento Terapêutico',
				'Avaliação Psicológica',
				'Orientação Vocacional',
				'Psicanálise',
				'Psicopedagogia',
				'Terapia de Casais',
				'Terapia Familiar',
				'Terapia Individual',
				'Terapia Infantil',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
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

// 146 - Fisioterapia
$forms['146'] = [
	'service_category' => 'Fisioterapia',
	'service_title' => 'Servicos de Fisioterapia',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-fisioterapia/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Fisioterapia está precisando?',
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
		'add_type' => [
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

// 147 - Massagista
$forms['147'] = [
	'service_category' => 'Massagista',
	'service_title' => 'Servicos de Massagista',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-massagista/',
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
				'Massagem Anti Celulite',
				'Massagem Modeladora',
				'Massagem Relaxante',
				'Quick Massage',
				'Shiatsu',
				'Termolipo'
			]
		]
	]
];

// 148 - Nutricionista
$forms['148'] = [
	'service_category' => 'Nutricionista',
	'service_title' => 'Servicos de Nutricionista',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-nutricionista/',
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
		'add_quantity' => [
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

// 149 - Podologia
$forms['149'] = [
	'service_category' => 'Podologia',
	'service_title' => 'Servicos de Podologia',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-podologia/',
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

// 150 - Terapias Alternativas
$forms['150'] = [
	'service_category' => 'Terapias Alternativas',
	'service_title' => 'Servicos de Terapias Alternativas',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-terapias-alternativas/',
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
		'add_options' => [
			'field' => 'select',
			'label' => 'Possui preferência por profissional?',
			'class' => 'uk-select uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'option' => [
				'Indiferente',
				'Mulher',
				'Homem'
			]
		]
	]
];

// 151 - Babá
$forms['151'] = [
	'service_category' => 'Babá',
	'service_title' => 'Servicos de Babá',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-baba/',
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
		'add_options' => [
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

// 152 - Cuidador de Pessoas
$forms['152'] = [
	'service_category' => 'Cuidador de Pessoas',
	'service_title' => 'Servicos de Cuidador de Pessoas',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-cuidador-de-pessoas/',
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
		]
	]
];

// 153 - Doula
$forms['153'] = [
	'service_category' => 'Doula',
	'service_title' => 'Servicos de Doula',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-doula/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Doula você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acompanhamento ao parto',
				'Consultoria',
				'Acompanhamento pós-parto',
				'Acompanhamento pré-parto',
				'Outro'
			]
		]
	]
];

// 154 - Enfermeiro
$forms['154'] = [
	'service_category' => 'Enfermeiro',
	'service_title' => 'Servicos de Enfermeiro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-enfermeiro/',
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
		'add_options' => [
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