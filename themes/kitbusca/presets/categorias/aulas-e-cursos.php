<?php
/**
 * @copyright 02.06.2020 - Filipe Camargo
 */

// 021 - Atividades Físicas - Dança
$forms['021'] = [
	'service_category' => 'Aulas de Dança',
	'service_title' => 'Aulas e Cursos de Dança',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-danca/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual o curso/aula de Dança você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Axé',
				'Ballet',
				'Break',
				'Dança de Salão e Samba',
				'Dança do Ventre',
				'Forró',
				'Funk',
				'Hip Hop',
				'Pole Dance',
				'Salsa',
				'Sapateado',
				'Sertanejo',
				'Street Dance',
				'Zumba',
				'Outros'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'A aula será para quantas pessoas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'1 pessoa',
				'2 a 3 pessoas',
				'4 a 6 pessoas',
				'7 ou mais pessoas'
			]
		]
	]
];

// 022 - Atividades Físicas - Esportes
$forms['022'] = [
	'service_category' => 'Aulas de Esportes',
	'service_title' => 'Aulas e Cursos de Esportes',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-atividades-fisicas-e-esportes/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de Esportes você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Atletismo',
				'Basquete',
				'Ciclismo',
				'Futebol',
				'Natação',
				'Patins',
				'Skate',
				'Surf',
				'Tênis',
				'Vôlei',
				'Outros'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		]
	]
];

// 023 - Atividades Físicas - Lutas
$forms['023'] = [
	'service_category' => 'Aulas de Lutas',
	'service_title' => 'Aulas e Cursos de Lutas',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-lutas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de luta você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Boxe',
				'Capoeira',
				'Defesa Pessoal',
				'Hapkido',
				'Jiu-Jitsu',
				'Judô',
				'Karatê',
				'MMA',
				'Muay-thai',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		]
	]
];

// 024 - Artes - Artesanato
$forms['024'] = [
	'service_category' => 'Aulas de Artesanato',
	'service_title' => 'Aulas e Cursos de Artesanato',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-artes-e-artesanato/',
	'service_form_json' => [
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de artesanato você procura?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Molduragem',
				'Origami',
				'Cartonagem',
				'Scrapbooking',
				'Quilling',
				'Papiroflexia',
				'DIY',
				'Bricolagem',
				'Outra'
			]
		]
	]
];

// 025 - Artes - Pintura em Tecido
$forms['025'] = [
	'service_category' => 'Aulas de Pintura em Tecido',
	'service_title' => 'Aulas e Cursos de Pintura em Tecido',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-pintura-em-tecido/',
	'service_form_json' => [
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de artesanato você procura?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Estilo Country',
				'Estilo Africana',
				'Estilo Patch',
				'Estilo Bauer',
				'Estilo Porcelanizada',
				'Outro'
			]
		]
	]
];

// 026 - Acadêmicos - Aulas de Idiomas
$forms['026'] = [
	'service_category' => 'Aulas de Idiomas',
	'service_title' => 'Aulas e Cursos de Idiomas',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-idiomas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de Idiomas você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Alemão',
				'Chinês',
				'Espanhol',
				'Francês',
				'Hebraico',
				'Inglês',
				'Italiano',
				'Japonês',
				'Libras',
				'Mandarim',
				'Português para estrangeiros',
				'Outros'
			]
		],
		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'A aula será para quantas pessoas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'1 pessoa',
				'2 a 3 pessoas',
				'4 a 6 pessoas',
				'7 ou mais pessoas'
			]
		],
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		]
	]
];

// 027 - Acadêmicos - Aulas Particulares
$forms['027'] = [
	'service_category' => 'Aulas Particulares',
	'service_title' => 'Cursos e Aulas Particulares',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-particulares/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula particular está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Biologia',
				'Ciências',
				'Física',
				'Geografia',
				'História',
				'Matemática',
				'Português',
				'Química',
				'Sociologia e Filosofia',
				'Outros'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'A aula será para quantas pessoas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'1 pessoa',
				'2 a 3 pessoas',
				'4 a 6 pessoas',
				'7 ou mais pessoas'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		]
	]
];

// 028 - Acadêmicos - Concursos
$forms['028'] = [
	'service_category' => 'Aulas para Concursos',
	'service_title' => 'Aulas e Cursos para Concursos',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-para-concursos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso para concursos está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Consursos Públicos',
				'Consurso Polícia Civil',
				'Consurso Polícia Militar',
				'Consurso Polícia Federal',
				'Concurso Carreira Militar',
				'Outros'
			]
		]
	]
];

// 029 - Acadêmicos - Informática 
$forms['029'] = [
	'service_category' => 'Aulas de Informática',
	'service_title' => 'Aulas e Cursos de Informática',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-informatica/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual curso de informática/software você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'After Effects',
				'Editor de Imagens e Vídeos',
				'Excel',
				'Informática Básica',
				'Pacote Office Completo',
				'Photoshop',
				'Powerpoint',
				'Programação',
				'Sketchup',
				'Outros'
			]
		]
	]
];

// 030 - Música - Bateria
$forms['030'] = [
	'service_category' => 'Aulas de Bateria',
	'service_title' => 'Aulas e Cursos de Bateria',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-bateria/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de bateria você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Curso completo',
				'Apenas para hobby',
				'Pedal duplo',
				'Rudimentos',
				'Partitura',
				'Outros'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual é o nível do(s) aluno(s)?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Iniciante(s)',
				'Intermediário(s)',
				'Avançado(s)'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outros'
			]
		]
	]
];

// 031 - Música - Canto
$forms['031'] = [
	'service_category' => 'Aulas de Canto',
	'service_title' => 'Aulas e Cursos de Canto',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-canto/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de canto você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Beatbox',
				'Canto',
				'Canto lírico',
				'Coach vocal',
				'Coral',
				'Rap - Slam',
				'Técnica vocal',
				'Outros'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual é o nível do(s) aluno(s)?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Iniciante(s)',
				'Intermediário(s)',
				'Avançado(s)'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		]
	]
];

// 032 - Música - Contrabaixo
$forms['032'] = [
	'service_category' => 'Aulas de Contrabaixo',
	'service_title' => 'Aulas e Cursos de Contrabaixo',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-contrabaixo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de Contrabaixo você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Curso completo',
				'Apenas Hooby',
				'Técnicas',
				'Outros'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual é o nível do(s) aluno(s)?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Iniciante(s)',
				'Intermediário(s)',
				'Avançado(s)'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		]
	]
];

// 033 - Música - Guitarra
$forms['033'] = [
	'service_category' => 'Aulas de Guitarra',
	'service_title' => 'Aulas e Cursos de Guitarra',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-guitarra/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de Guitarra você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Curso completo',
				'Apenas Hobby',
				'Técnica',
				'Improviso',
				'Solo',
				'Teoria',
				'Outro'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual é o nível do(s) aluno(s)?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Iniciante(s)',
				'Intermediário(s)',
				'Avançado(s)'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		]
	]
];

// 034 - Música - Piano / Teclado
$forms['034'] = [
	'service_category' => 'Aulas de Piano/Teclado',
	'service_title' => 'Aulas e Cursos de Piano / Teclado',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-piano-teclado/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de Piano ou Teclado você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Curso completo',
				'Técnicas',
				'Rítmo',
				'Leitura de Partitura',
				'Levadas e Estilos',
				'Outros'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual é o nível do(s) aluno(s)?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Iniciante(s)',
				'Intermediário(s)',
				'Avançado(s)'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		]
	]
];

// 035 - Música - Violão
$forms['035'] = [
	'service_category' => 'Aulas de Violão',
	'service_title' => 'Aulas e Cursos de Violão',
	'service_type' => 'online',
	'service_url' => 'aulas-e-cursos-de-violao/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual aula/curso de Violão você está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Curso completo',
				'Técnicas',
				'Composição',
				'Harmonia',
				'Solfejo',
				'Técnicas',
				'Clássico'
			]
		],

		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual é o nível do(s) aluno(s)?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Iniciante(s)',
				'Intermediário(s)',
				'Avançado(s)'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual será a frequência das aulas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aula avulsa',
				'1x por semana',
				'2x por semana',
				'3x por semana',
				'Quinzenal',
				'Mensal',
				'Outra'
			]
		]
	]
];