<?php
/**
 * @copyright 11.06.2020 - Filipe Camargo de Barros
 */

// 077 - Auxílio Administrativo
$forms['077'] = [
	'service_category' => 'Auxílio Administrativo',
	'service_title' => 'Servicos e Profissionais de Auxílio Administrativo',
	'service_type' => 'presencial',
	'service_url' => 'servicos-e-profissionais-de-auxilio-administrativo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Auxílio Administrativo você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acompanhar Entrada e Saída de Correspondências',
				'Receber e Enviar Documentos',
				'Atender Chamadas Telefônicas',
				'Recepcionar o Público em Geral',
				'Arquivamento de Documentos',
				'Manutenção e Criação de Planilhas',
				'Outros'
			]
		]
	]
];

// 078 - Contador
$forms['078'] = [
	'service_category' => 'Contador',
	'service_title' => 'Profissionais de Serviços Contábeis',
	'service_type' => 'online',
	'service_url' => 'profissionais-de-servicos-contabeis/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Contador você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Assessoria Contábil',
				'Assessoria Fiscal',
				'Imposto de Renda',
				'Departamento Pessoal',
				'Consultoria Administrativa',
				'Outro'
			]
		]
	]
];

// 079 - Digitalizador de Documentos
$forms['079'] = [
	'service_category' => 'Digitalizador de Documentos',
	'service_title' => 'Servicos Profissionais de Digitação e Digitalização de Documentos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-digitacao-e-digitalizacao-de-documentos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Digitalizador de Documentos você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Digitalição de Documentos',
				'Digitação',
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

// 080 - Economia e Finanças
$forms['080'] = [
	'service_category' => 'Economia e Finanças',
	'service_title' => 'Servicos Profissionais de Economia e Finanças',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-economia-e-financas/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Economia e Finanças você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Consultoria Financeira',
				'Planejamento de investimentos',
				'Planejamento econômico',
				'Planejamento estratégico',
				'Planejamento financeiro',
				'Gestão de gastos/despesas',
				'Outro'
			]
		]
	]
];

// 081 - Segurança do Trabalho
$forms['081'] = [
	'service_category' => 'Segurança do Trabalho',
	'service_title' => 'Servicos Profissionais de Segurança do Trabalho',
	'service_type' => 'presencial',
	'service_url' => 'servicos-profissionais-de-seguranca-do-trabalho/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Segurança do Trabalho você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Elaboração de Política de Saúde e Segurança',
				'Auditoria',
				'Acompanhamento e Avaliação',
				'Ação Educativa para Saúde e Segurança',
				'Gerenciamento de Documentação SST',
				'Analise e Medidas de Prevenção e Controle',
				'Outro'
			]
		]
	]
];

// 082 - Coaching
$forms['082'] = [
	'service_category' => 'Coaching',
	'service_title' => 'Servicos de Coaching Profissional',
	'service_type' => 'online',
	'service_url' => 'servicos-de-coaching-profissional/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Coaching você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Coaching de estilo/imagem pessoal',
				'Coaching de vida profissional/carreira',
				'Coaching de saúde/bem estar',
				'Coaching em desenvolvimento pessoal',
				'Coaching financeira',
				'Personal coach',
				'Outro'
			]
		]
	]
];

// 083 - Consultoria Especializada
$forms['083'] = [
	'service_category' => 'Consultoria Especializada',
	'service_title' => 'Servicos de Consultoria Especializada',
	'service_type' => 'online',
	'service_url' => 'servicos-de-consultoria-especializada/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Consultoria Especializada você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Consultoria de engenharia',
				'Consultoria de obras',
				'Consultoria elétrica',
				'Consultoria empresarial',
				'Consultoria financeira',
				'Consultoria jurídica',
				'Marketing digital',
				'Viagem e turismo',
				'Outro'
			]
		]
	]
];

// 084 - Corretor de Seguro
$forms['084'] = [
	'service_category' => 'Corretor de Seguro',
	'service_title' => 'Serviços de Corretores de Seguro',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-corretores-de-seguro/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual tipo de Seguro você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Seguro de Vida',
				'Seguro de Autos',
				'Seguro Residencial',
				'Seguro de Equipamentos Eletrônicos',
				'Outro'
			]
		]
	]
];

// 085 - Corretor de Imóveis
$forms['085'] = [
	'service_category' => 'Corretor de Imóveis',
	'service_title' => 'Serviços de Corretor para Compra, Venda e Aluguel de Imóveis',
	'service_type' => 'presencial',
	'service_url' => 'corretor-para-compra-venda-e-aluguel-de-imoveis/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Corretor de Imóveis você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Compra ou Venda de Imóveis',
				'Locação de Imóveis',
				'Outro'
			]
		]
	]
];

// 086 - Corretor de Plano de Saúde
$forms['086'] = [
	'service_category' => 'Corretor de Plano de Saúde',
	'service_title' => 'Corretores de Plano de Saúde',
	'service_type' => 'presencial',
	'service_url' => 'corretores-de-plano-de-saude/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual tipo de Plano de Saúde você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Plano de Saúde Individual',
				'Plano de Saúde Familiar',
				'Plano de Saúde Empresarial',
				'Plano de Saúde Sênior',
				'Outro'
			]
		],

		// INPUT
		'add_quantity' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual sua Idade?',
			'class' => 'uk-input uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui sua Idade'
		]
	]
];

// 087 - Detetive Particular
$forms['087'] = [
	'service_category' => 'Detetive Particular',
	'service_title' => 'Serviços de Detetive Particular',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-detetive-particular/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Detetive Particular você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Trabalhista',
				'Adultério',
				'Empresarial',
				'Criminal',
				'Infiltrações',
				'Contra Espionagem',
				'Entes Queridos',
				'Outro'
			]
		]
	]
];

// 088 - Assessoria de Imprensa
$forms['088'] = [
	'service_category' => 'Assessoria de Imprensa',
	'service_title' => 'Serviços de Assessoria de Imprensa e Comunicação',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-assessoria-de-imprensa-e-comunicacao/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Assessoria de Imprensa você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Reportagens',
				'Notas',
				'Matérias de interesse público em jornais',
				'Revistas',
				'Sites',
				'Blogs',
				'Emissoras de rádio e TV',
				'Outros'
			]
		]
	]
];

// 089 - Pesquisa em Geral
$forms['089'] = [
	'service_category' => 'Pesquisa em Geral',
	'service_title' => 'Serviços de Pesquisa em Geral',
	'service_type' => 'online',
	'service_url' => 'servicos-de-pesquisa-em-geral/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Pesquisa em Geral você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Científica',
				'Escolar',
				'Informática',
				'Roteiro/viagem',
				'Técnica',
				'Outra'
			]
		]
	]
];

// 090 - Produção de Conteúdo
$forms['090'] = [
	'service_category' => 'Produção de Conteúdo',
	'service_title' => 'Serviços de Produção de Conteúdo',
	'service_type' => 'online',
	'service_url' => 'servicos-de-producao-de-conteudo/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Produção de Conteúdo você está precisando?',
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
			'label' => 'Qual o número aproximado de palavras?',
			'class' => 'uk-input uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o número aproximado de palavras'
		]
	]
];

// 091 - Tradutores e Intérpretes
$forms['091'] = [
	'service_category' => 'Tradutores e Intérpretes',
	'service_title' => 'Serviços de Tradutores e Intérpretes',
	'service_type' => 'online',
	'service_url' => 'servicos-de-tradutores-e-interpretes/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Tradutores e Intérpretes você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Intérprete (tradução simultânea, consecutiva)',
				'Tradução juramentada (tradutor público juramentado)',
				'Tradução simples (sem fins oficiais)',
				'Tradução técnica (documentos especializados)',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual é a quantidade de páginas para serem traduzidas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Não vou precisar de tradução de documentos',
				'Até 100 páginas',
				'101 á 200 páginas',
				'201 á 400 páginas',
				'401 páginas ou mais',
				'Não tenho certeza'
			]
		]
	]
];

// 092 - Advogado
$forms['092'] = [
	'service_category' => 'Advogado',
	'service_title' => 'Serviços de Advogacia e Assessoria Jurídica',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-advocacia-e-assessoria-juridica/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Advogado você está precisando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Civil',
				'Consumidor',
				'Criminal',
				'Empresarial',
				'Imigração',
				'Previdenciário',
				'Servidor Público',
				'Trabalhista',
				'Trânsito',
				'Outros'
			]
		]
	]
];

// 093 - Artesanato em Geral
$forms['093'] = [
	'service_category' => 'Artesanato em Geral',
	'service_title' => 'Serviços de Artesanato em Geral',
	'service_type' => 'Online',
	'service_url' => 'servicos-de-artesanato-em-geral/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Artesanato em Geral está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acessórios',
				'Bijuterias',
				'Bolsas e Carteiras',
				'Jogos e Brinquedos',
				'Para Casa',
				'Para Eventos',
				'Religiosos',
				'Outro'
			]
		],

		// SELECT
		'add_quantity' => [
			'field' => 'select',
			'label' => 'Qual a quantidade de itens?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'1 unidade',
				'2 a 10 unidades',
				'10 a 20 unidades',
				'Mais de 20 unidades'
			]
		]
	]
];

// 094 - Bordado ou Crochê
$forms['094'] = [
	'service_category' => 'Bordado ou Crochê',
	'service_title' => 'Serviços de Bordado ou Crochê',
	'service_type' => 'Online',
	'service_url' => 'servicos-de-bordado-ou-croche/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Bordado ou Crochê está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Roupas',
				'Cama, mesa e banho',
				'Cortina, colcha ou tapete',
				'Outros'
			]
		]
	]
];

// 095 - Artesão
$forms['095'] = [
	'service_category' => 'Artesão',
	'service_title' => 'Serviços de Artesão',
	'service_type' => 'Online',
	'service_url' => 'servicos-de-artesao/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Artesão está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Peças talhadas em Madeira',
				'Peças feitas em Argila',
				'Peças de Gesso',
				'Peças talhadas em Pedra',
				'Outros'
			]
		]
	]
];

// 096 - Desenhista
$forms['096'] = [
	'service_category' => 'Desenhista',
	'service_title' => 'Serviços de Desenhista',
	'service_type' => 'Online',
	'service_url' => 'servicos-de-desenhista/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Desenhista está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Desenho Técnico',
				'Desenho Artístisco',
				'Caricaturas',
				'Desenho de Rosto',
				'Cartoon',
				'Outro'
			]
		]
	]
];

// 097 - Artigos de Decoração
$forms['097'] = [
	'service_category' => 'Artigos de Decoração',
	'service_title' => 'Artigos de Decoração',
	'service_type' => 'Online',
	'service_url' => 'artigos-de-decoracao/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual Artigos de Decoração está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Quadros',
				'Vasos',
				'Móveis',
				'Outros'
			]
		]
	]
];

// 098 - Assessor de Eventos
$forms['098'] = [
	'service_category' => 'Assessor de Eventos',
	'service_title' => 'Serviços de Assessor de Eventos',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-assessor-de-eventos/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual serviço de Assessor de Eventos está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aniversário ',
				'Casamento',
				'Corporativo',
				'Debutante',
				'Formatura',
				'Outro'
			]
		]
	]
];

// 099 - Equipamento para Festas e Eventos **ATENÇÃO CHECKBOX**
$forms['099'] = [
	'service_category' => 'Equipamento para Festas e Eventos',
	'service_title' => 'Aluguel de Equipamento para Festas e Eventos',
	'service_type' => 'presencial',
	'service_url' => 'aluguel-de-equipamento-para-festas-e-eventos/',
	'service_form_json' => [
		// CHECKBOX
		'add_checkbox' => [
			'field' => 'checkbox',
			'label' => 'Quais tipos de Equipamento para Festas e Eventos está procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cabine de fotos',
				'Brinquedos infantis',
				'Carrinho de pipoca, algodão-doce, etc',
				'Cilindro de gás hélio para balões',
				'Gelo seco',
				'Gerador de energia',
				'Mesas, cadeiras e toalhas',
				'Microfone (lapela, headset, etc)',
				'Palco ou tablado',
				'Projetor',
				'Sistema de iluminação',
				'Sistema de som',
				'Tela (elétrica ou manual)',
				'Toldo, tenda ou stand',
				'Outros'
			]
		]
	]
];

// 100 - Garçons e Copeiras
$forms['100'] = [
	'service_category' => 'Garçons e Copeiras',
	'service_title' => 'Serviços de Garçons e Copeiras',
	'service_type' => 'presencial',
	'service_url' => 'servicos-de-garcons-e-copeiras/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Qual profissional você tá procurando?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Garçon',
				'Copeira'
			]
		],

		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'O serviço é para qual evento?',
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