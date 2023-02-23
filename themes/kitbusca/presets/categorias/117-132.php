<?php
/**
 * @copyright 13.06.2020 - Filipe Camargo de Barros
 */

// 117 - Cartão de Visitas Digital
$forms['117'] = [
	'service_category' => 'Cartão de Visitas Digital',
	'service_title' => 'Servicos de Criação de Cartão de Visitas Digital',
	'service_type' => 'online',
	'service_url' => 'servicos-de-criacao-de-cartao-de-visitas-digital/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual tipo de Cartão de Visitas Digital você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Negócios',
				'Esporte',
				'Culinária',
				'Fast Food',
				'Saúde',
				'Construção Civil',
				'Não tenho certeza',
				'Outro'
			]
		]
	]
];

// 118 - Criação de Logotipo
$forms['118'] = [
	'service_category' => 'Criação de Logotipo',
	'service_title' => 'Criação de Logotipo ou Branding para empresas e profissionais',
	'service_type' => 'online',
	'service_url' => 'criacao-de-logotipo-ou-branding-para-empresas-e-profissionais/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual tipo de Logotipo ou Branding você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Negócios',
				'Esporte',
				'Culinária',
				'Fast Food',
				'Saúde',
				'Construção Civil',
				'Não tenho certeza',
				'Outro'
			]
		]
	]
];

// 119 - Diagramador
$forms['119'] = [
	'service_category' => 'Diagramador',
	'service_title' => 'Serviços de Diagramador',
	'service_type' => 'online',
	'service_url' => 'servicos-de-diagramador/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviços de Diagramador você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Diagramação de Revista',
				'Diagramação de Livro',
				'Diagramação de Albuns',
				'Apostilas',
				'Formatação de textos e layouts',
				'Criação de manuais',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de páginas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'5 à 10 Páginas',
				'11 à 20 Páginas',
				'21 à 50 Páginas',
				'51 à 100 Páginas',
				'Acima de 100 Páginas'

			]
		]
	]
];

// 120 - Cartão de Visitas
$forms['120'] = [
	'service_category' => 'Cartão de Visitas',
	'service_title' => 'Criação de Cartão de Visitas',
	'service_type' => 'online',
	'service_url' => 'criacao-de-cartao-de-visitas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual tipo de Cartão de Visitas você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Negócios',
				'Esporte',
				'Culinária',
				'Fast Food',
				'Saúde',
				'Construção Civil',
				'Não tenho certeza',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de Cartões de Visistas você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'500 Cartões',
				'1000 Cartões',
				'Acima de 1000 Cartões'
			]
		]
	]
];

// 121 - Materiais Impressos
$forms['121'] = [
	'service_category' => 'Materiais Impressos',
	'service_title' => 'Serviços de Materiais Impressos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-materiais-impressos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Quais tipos de Materiais Impressos você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Adesivo',
				'Caricatura',
				'Cartão de visita',
				'Faixa',
				'Flyer',
				'Impressão comum',
				'Panfleto',
				'Revista'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de Materiais Impressos você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'1000 à 2000 unidades',
				'2000 à 3000 unidades',
				'3000 à 5000 unidades',
				'Mais de 5000 unidades',
				'Outro'
			]
		]
	]
];

// 122 - Jornalista
$forms['122'] = [
	'service_category' => 'Jornalista',
	'service_title' => 'Serviços de Jornalista',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-jornalista/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Quais serviços de Jornalista você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Redação de texto para o impresso',
				'Cobertura em eventos e coletivas',
				'Venda de fotos para utilização jornalística',
				'Diagramação',
				'Outro'
			]
		]
	]
];

// 123 - Redator de Artigos
$forms['123'] = [
	'service_category' => 'Redator de Artigos',
	'service_title' => 'Serviços de Redator de Artigos',
	'service_type' => 'online',
	'service_url' => 'servicos-de-redator-de-artigos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Quais serviços de Redator de Artigos você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Criação de currículo',
				'Padronização (ABNT)',
				'Produção de conteúdo',
				'Padronização de documentos',
				'Revisão de texto',
				'Outro'
			]
		],

		// INPUT
		'add_quantity' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é a quantidade de páginas ou palavras?',
			'class' => 'uk-input uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe a quantidade de páginas ou palavras'
		]
	]
];

// 124 - Campanhas de Marketing Digital
$forms['124'] = [
	'service_category' => 'Campanhas de Marketing Digital',
	'service_title' => 'Criação de Estratégias e Campanhas de Marketing Digital',
	'service_type' => 'online',
	'service_url' => 'criacao-de-estrategias-e-campanhas-de-marketing-digital/',
	'service_form_json' => [
		// CHECKBOX
		'add_checkbox' => [
			'field' => 'checkbox',
			'label' => 'Quais tipos de Campanhas de Marketing Digital você precisa?',
			'class' => 'uk-checkbox uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Campanhas Google Ads',
				'Campanhas Facebook e Instagram Ads',
				'Campanhas Youtube Ads',
				'Campanhas Linkedin Ads',
				'Campanhas Taboola',
				'Otimização SEO',
				'E-mail Marketing',
				'Landing Page',
				'Chatbot Messenger',
				'Outras'
			]
		]
	]
];

// 125 - Especialista em Seo para Website
$forms['125'] = [
	'service_category' => 'Especialista em Seo para Website',
	'service_title' => 'Serviços de Especialista em Seo para Website',
	'service_type' => 'online',
	'service_url' => 'servicos-de-especialista-em-seo-para-website/',
	'service_form_json' => [
		// CHECKBOX
		'add_checkbox' => [
			'field' => 'checkbox',
			'label' => 'Quais Serviços de Especialista em Seo para Website você precisa?',
			'class' => 'uk-checkbox uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Geração de Conteúdo',
				'Definição de Palavras-chave',
				'Instalação de Sitemap',
				'Cadastro nas plataformas Webmaster Tools',
				'Estruturação de Tags HTML',
				'Outras'
			]
		]
	]
];

// 126 - Gestão de Mídias Sociais
$forms['126'] = [
	'service_category' => 'Gestão de Mídias Sociais',
	'service_title' => 'Serviços de Gestão de Mídias Sociais',
	'service_type' => 'online',
	'service_url' => 'servicos-de-gestao-de-midias-sociais/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Quais Serviços de Gestão de Mídias Sociais você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Criação de Postagens',
				'Programação de Postagens',
				'Gerenciamento Completo das Redes Sociais',
				'Criação de Capa e Perfil',
				'Configurações Gerais',
				'Outros'
			]
		]
	]
];

// 127 - Designer de Moda
$forms['127'] = [
	'service_category' => 'Designer de Moda',
	'service_title' => 'Serviços de Designer de Moda',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-designer-de-moda/',
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
		'add_type' => [
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

// 128 - Personal Stylist
$forms['128'] = [
	'service_category' => 'Personal Stylist',
	'service_title' => 'Serviços de Personal Stylist',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-personal-stylist/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Personal Stylist você precisa',
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
		],

		// SELECT
		'add_type' => [
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

// 129 - Alfaiate
$forms['129'] = [
	'service_category' => 'Alfaiate',
	'service_title' => 'Serviços de Alfaiate',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-alfaiate/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Alfaiate você Precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aluguel de Roupas Masculinas (Ternos, Blazer e etc.)',
				'Ajustes e Reparos',
				'Confecção'
			]
		],

		// SELECT
		'add_type' => [
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

// 130 - Vestido de Noiva
$forms['130'] = [
	'service_category' => 'Vestido de Noiva',
	'service_title' => 'Serviços e confecção de Vestido de Noiva',
	'service_type' => 'presencial',
	'service_url' => 'servicos-e-confeccao-de-vestido-de-noiva/',
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
		]
	]
];

// 131 - Corte e Costura
$forms['131'] = [
	'service_category' => 'Corte e Costura',
	'service_title' => 'Serviços de Corte e Costura',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-corte-e-costura/',
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
		'add_type' => [
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

// 132 - Sapateiro
$forms['132'] = [
	'service_category' => 'Sapateiro',
	'service_title' => 'Serviços de Sapateiro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-sapateiro/',
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
		'add_type' => [
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