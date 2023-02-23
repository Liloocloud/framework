<?php
/**
 * @copyright 30.05.2020 - Felipe Oliveira Lourenço
 * @see  Refeito data 11/06/2020 - Retirando as atividades
 */

// 001 - Eletrônicos - Aparelho de Som
$forms['001'] = [
	'service_category' => 'Aparelho de som',
	'service_title' => 'Serviços de conserto e manutenção em Aparelhos de som',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-aparelho-de-som/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Aparelho de Som?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aiwa',
				'Britânia',
				'CCE',
				'Gradiente',
				'LG',
				'Panasonic',
				'Philco',
				'Philips',
				'Pioneer',
				'Samsung',
				'Sony',
				'Toshiba',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Botões do aparelho não funcionam',
				'CD ou toca fita não funciona',
				'Controle remoto não funciona',
				'Manutenção/limpeza',
				'Não está ligando',
				'Não sai som',
				'Rádio não sintoniza',
				'Reposição de peça',
				'Outro'
			]
		]
	]
];

// 002 - Eletrônicos - DVD / Blu-ray
$forms['002'] = [
	'service_category' => 'Camera Fotográfica',
	'service_title' => 'Serviços de conserto e manutenção em Camersa Fotográfica',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-camera-fotografica/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca da sua Câmera Fotográfica?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Canon',
				'GoPro',
				'Nikon',
				'Olympus',
				'Panasonic',
				'Samsung',
				'Sony',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Botão quebrado',
				'Limpeza/manutenção',
				'Não está ligando',
				'Reposição de peças',
				'A Tela está quebrada',
				'Tela travada',
				'Zoom com problema',
				'Outro'
			]
		]
	]
];

// 003 - Eletrônicos - DVD / Blu-ray
$forms['003'] = [
	'service_category' => 'DVD/Blu-ray',
	'service_title' => 'Serviços de conserto e manutenção em DVD/Blu-ray',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-dvd-bluray/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu DVD / Blu-Ray?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'AOC',
				'Britânia',
				'CCE',
				'LG',
				'Panasonic',
				'Philco',
				'Philips',
				'Pioneer',
				'Samsung',
				'Sony',
				'Toshiba',
				'Outras'
			]
		],
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual é o tipo do seu aparelho?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Blu-ray player',
				'DVD automotivo',
				'DVD player',
				'DVD portátil'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Bandeja do CD com problema',
				'O Controle está com problema',
				'Não conecta',
				'Não está ligando',
				'Não lê o disco',
				'Não grava',
				'Outro'
			]
		]
	]
];

// 004 - Eletrônicos - Home Theater
$forms['004'] = [
	'service_category' => 'Home Theater',
	'service_title' => 'Serviços de conserto e manutenção em Home Theater',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-home-theater/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Home theater?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Lenoxx',
				'LG',
				'Panasonic',
				'Philco',
				'Philips',
				'Samsung',
				'Sony',
				'Toshiba',
				'Outros'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Controle quebrado',
				'Não lê discos',
				'Não está ligando',
				'Não sai som',
				'Reposição de peças',
				'Saída de cabo queimada',
				'Outro'
			]
		]
	]
];

// 005 - Eletrônicos - Telefone Fixo
$forms['005'] = [
	'service_category' => 'Telefone Fixo',
	'service_title' => 'Serviços de conserto e manutenção em Telefone Fixo',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-aparelho-telefone-fixo/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marcado seu Telefone (telefone residencial/fixo)?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Intelbras',
				'Panasonic',
				'Philco',
				'Philips',
				'Samsung',
				'Siemens',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Barulho excessivo',
				'Não carrega',
				'Não dá sinal',
				'Não funciona',
				'Teclado com problema',
				'Outro'
			]
		]
	]
];

// 006 - Eletrônicos - Televisão
$forms['006'] = [
	'service_category' => 'Televisão',
	'service_title' => 'Serviços de conserto e manutenção em Televisão',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-televisao/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca da sua Televisão?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'AOC',
				'CCE',
				'Gradiente',
				'H-Buster',
				'LG',
				'OAC',
				'Panasonic',
				'Philco',
				'Philips',
				'Samsung',
				'Sharp',
				'Sony',
				'Toshiba',
				'Outras'
			]
		],
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo da sua televisão?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo da sua televisão. Ex.: LG 43LK5700'
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'3D não funciona',
				'O Controle não está funcionando',
				'Imagem não está aparece (só sai som)',
				'Não está ligando',
				'A Tela está manchada',
				'A Tela está quebrada',
				'O Som não está funciona',
				'O Wi-Fi não está funciona',
				'Outro'
			]
		]
	]
];

// 007 - Eletrodomésticos - Ar Condicionado
$forms['007'] = [
	'service_category' => 'Ar Condicionado',
	'service_title' => 'Serviços de conserto e manutenção em Ar Condicionado',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-ar-condicionado/',
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
				'Instalação',
				'Manutenção'
			]
		],
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca é do seu Ar condicionado?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Brastemp',
				'Consul',
				'Electrolux',
				'Fujitsu',
				'Gree',
				'Komeco',
				'LG',
				'Philco',
				'Springer',
				'York',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'O aparelho apresenta algum problema?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Não, apenas instalação do ar condicionado',
				'Barulho excessivo',
				'O Controle está com problema',
				'Desliga sozinho',
				'Higienização',
				'Não está ligando',
				'Não resfria',
				'Troca de filtro',
				'Vazamento',
				'Outro'
			]
		]
	]
];

// 008 - Eletrodomésticos - Fogão e Cooktop
$forms['008'] = [
	'service_category' => 'Fogão e Cooktop',
	'service_title' => 'Serviços de conserto e manutenção em Fogão e Cooktop',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-fogao-e-cooktop/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Fogão e cooktop?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Brastemp',
				'Continental',
				'Dako',
				'Electrolux',
				'GE',
				'Mueller',
				'Outras'
			]
		],
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual é o seu tipo de fogão?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Cooktop',
				'Fogão convencional',
				'Fogão industrial'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acendimento automático não funciona',
				'Bocas não acendem',
				'Conversão (para gás encanado ou de botijão)',
				'Forno não acende',
				'Limpeza/manutenção',
				'Reposição de peças',
				'Troca de vidro',
				'Outro'
			]
		]
	]
];

// 009 - Eletrodomésticos - Geladeira e Freezer
$forms['009'] = [
	'service_category' => 'Geladeira e Freezer',
	'service_title' => 'Serviços de conserto e manutenção em Geladeira e Freezer',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-geladeira-e-freezer/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca da sua Geladeira e freezer?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Bosch',
				'Brastemp',
				'Consul',
				'Continental',
				'Dako',
				'Electrolux',
				'GE',
				'LG',
				'Mabe',
				'Samsung',
				'Outras'
			]
		],
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual é o tipo do seu refrigerador?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Freezer horizontal',
				'Freezer vertical',
				'Frigobar',
				'Geladeira convencional (1 porta)',
				'Geladeira duplex (freezer em cima)',
				'Side by Side (freezer e geladeira lado a lado)'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Não congela',
				'Não está ligando',
				'Troca de borracha',
				'Troca/manutenção de peças',
				'Vazamento',
				'Outro'
			]
		]
	]
];


// 010 - Eletrodomésticos - Lava Louça
$forms['010'] = [
	'service_category' => 'Lava Louça',
	'service_title' => 'Serviços de conserto e manutenção em Lava Louças',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-lava-loucas/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca da sua Lava Louças',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Brastemp',
				'Consul',
				'Electrolux',
				'GE'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Barulho excessivo',
				'Botão quebrado',
				'Não está ligando',
				'Não puxa água',
				'Não puxa sabão ou alvejante',
				'Problema na borracha de vedação',
				'Reposição de peças',
				'Tampa quebrada',
				'Vazamento',
				'Outro'
			]
		]
	]
];

// 011 - Eletrodomésticos - Máquina de Lavar
$forms['011'] = [
	'service_category' => 'Máquina de Lavar',
	'service_title' => 'Serviços de conserto e manutenção em Máquina de Lavar',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-maquina-de-lavar-roupas/',
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
				'Manutenção',
				'Instalação'
			]
		],
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca da sua Lava roupas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Bosch',
				'Brastemp',
				'Colormaq',
				'Consul',
				'Continental',
				'Electrolux',
				'GE',
				'LG',
				'Mueller',
				'Samsung',
				'Suggar',
				'Wanke',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Apenas instalação',
				'Barulho excessivo',
				'Não está centrifugando',
				'Não agita',
				'Não está ligando',
				'Não puxa água',
				'Não puxa o sabão ou alvejante',
				'Painel quebrado',
				'Tampa quebrada',
				'Vazamento',
				'Outro'
			]
		]
	]
];

// 012 - Eletrodomésticos - Micro-ondas
$forms['012'] = [
	'service_category' => 'Microondas',
	'service_title' => 'Serviços de conserto e manutenção em Microondas',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-microondas/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Micro-ondas?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Philco',
				'Brastemp',
				'Britânia',
				'Consul',
				'Electrolux',
				'GE',
				'LG',
				'Midea',
				'Panasonic',
				'Sharp',
				'Toshiba',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Botão quebrado',
				'Não aquece',
				'Não está ligando',
				'Reposição de peças',
				'A Tela está quebrada',
				'Troca de prato',
				'Outro'
			]
		]
	]
];

// 013 - Informática e Games - Cabeamento e Redes
$forms['013'] = [
	'service_category' => 'Cabeamento e Redes',
	'service_title' => 'Serviços de Cabeamento e Redes de Computadores',
	'service_type' => 'presencial',
	'service_url' => 'instalacao-e-manutencao-de-infraestrutura-de-redes-e-cabeamento/',
	'service_form_json' => [
		// SELECT
		'add_service' => [
			'field' => 'select',
			'label' => 'Que tipo de serviço você precisa?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Instalação',
				'Manutenção'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema se houver:',
			'class' => 'uk-select uk-form-medium',
			'required' => false,
			'custom' => '',
			'id' => '',
			'options' => [
				'Problema na Conexão',
				'Cabos falhando',
				'Compartilhamento da Rede',
				'Reposição de peças',
				'Outro'
			]
		]
	]
];

// 014 - Informática e Games - Computador Desktop
$forms['014'] = [
	'service_category' => 'Computador Desktop',
	'service_title' => 'Serviços de Manutenção em Computador Desktop',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-computador-desktop/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Computador Desktop?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'AOC',
				'Apple',
				'CCE',
				'Dell',
				'HP',
				'Itautec',
				'Lenovo',
				'LG',
				'Philco',
				'Positivo',
				'Samsung',
				'Sony',
				'Toshiba',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Desligando sozinho',
				'Está muito lento',
				'Precisando de Formatação',
				'Monitor está com problema',
				'Não está ligando',
				'Teclado com problema',
				'Trava durante o uso',
				'Upgrade',
				'Outro'
			]
		]
	]
];

// 015 - Informática e Games - Impressora
$forms['015'] = [
	'service_category' => 'Impressora',
	'service_title' => 'Serviços de Manutenção em Impressoras',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-impressora/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca da sua Impressora?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'HP',
				'Epson',
				'Canon',
				'Lexmark',
				'Samsung',
				'Xerox',
				'Zebra',
				'Brother',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Atolamento de papel',
				'Falha na impressão',
				'Manutenção/limpeza',
				'Não imprime',
				'Não está ligando',
				'Reposição de peça',
				'Outro'
			]
		]
	]
];

// 016 - Informática e Games - Notebook
$forms['016'] = [
	'service_category' => 'Notebook',
	'service_title' => 'Serviços de Manutenção em Notebook',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-notebook/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Notebook/Laptop?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acer',
				'Apple',
				'Asus',
				'CCE',
				'Dell',
				'HP',
				'Itautec',
				'Lenovo',
				'LG',
				'Positivo',
				'Samsung',
				'Sony',
				'Toshiba',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Está muito lento ou travando',
				'Precisa de Formatação',
				'Não está carregando',
				'Não está ligando',
				'O Teclado está com problema',
				'A Tela está quebrada',
				'Outro'
			]
		]
	]
];

// 017 - Informática e Games - Tablet
$forms['017'] = [
	'service_category' => 'Tablet',
	'service_title' => 'Serviços de Manutenção em Tablet',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-tablets/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Tablet?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Acer',
				'AOC',
				'Apple',
				'DL',
				'HP',
				'LG',
				'Motorola',
				'Multilaser',
				'Philco',
				'Positivo',
				'Samsung',
				'Toshiba',
				'Outras'
			]
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Bateria com problema',
				'Botão quebrado',
				'Não está ligando',
				'Não responde ao toque',
				'Som não funciona',
				'A Tela está quebrada',
				'Wi-fi não conecta',
				'Outro'
			]
		]
	]
];

// 018 - Informática e Games - Video Game
$forms['018'] = [
	'service_category' => 'Video Game',
	'service_title' => 'Serviços de Manutenção em Video Game',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-video-game/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Video game?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Microsoft Xbox',
				'Nintendo',
				'Sony Playstation'
			]
		],
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do seu video game?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do seu video game. Ex.: Xbox One, Playstation 4, Nintendo wii...'
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema:',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Atualização/configuração',
				'O Controle está com problema',
				'Desliga sozinho',
				'Fonte de energia com problema',
				'Headset com problema',
				'Luz vermelha/verde',
				'Não está ligando',
				'Não lê discos',
				'Problema na rede',
				'Outro'
			]
		]
	]
];

// 019 - Telefonia - PABX
$forms['019'] = [
	'service_category' => 'PABX',
	'service_title' => 'Serviços de Manutenção em PABX',
	'service_type' => 'presencial',
	'service_url' => 'instalacao-e-manutencao-em-pabx/',
	'service_form_json' => [
		// INPUT
		'add_options' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual a marca do seu PABX?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui a marca do seu PABX. Ex.: AMELCO, PANASONIC, MULTITOC...'
		],
		// SELECT
		'add_type' => [
			'field' => 'select',
			'label' => 'Qual o tipo do PABX?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'PABX analógico',
				'PABX digital',
				'PABX híbrido',
				'PABX virtual',
				'PABX voip',
				'Outra'
			]
		]
	]
];


// 020 - Telefonia - Smartphone/Celular
$forms['020'] = [
	'service_category' => 'Smartphone/Celular',
	'service_title' => 'Serviços de Manutenção em Smartphone/Celular',
	'service_type' => 'presencial',
	'service_url' => 'assistencia-tecnica-em-smartphone/',
	'service_form_json' => [
		// SELECT
		'add_options' => [
			'field' => 'select',
			'label' => 'Qual a marca do seu Smartphone/Celular?',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Apple',
				'Asus',
				'Blackberry',
				'CCE',
				'HTC',
				'Lenovo',
				'LG',
				'Motorola',
				'Nextel',
				'Nokia',
				'Samsung',
				'Sony',
				'Outros'
			]
		],
		// INPUT
		'add_type' => [
			'field' => 'input',
			'model' => 'text',
			'label' => 'Qual é o modelo do aparelho?',
			'class' => 'uk-input uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'placeholder' => 'Informe aqui o modelo do seu celular. Ex.: Moto G, iPhone X, Galaxy S10...'
		],
		// SELECT
		'add_situation' => [
			'field' => 'select',
			'label' => 'Informe o problema',
			'class' => 'uk-select uk-form-medium',
			'required' => true,
			'custom' => '',
			'id' => '',
			'options' => [
				'Aparelho não está ligando',
				'Ativação/reset do iCloud',
				'Bateria',
				'Botão home quebrado',
				'Não carrega',
				'Não faz ligação',
				'Som não funciona',
				'A Tela está quebrada',
				'Wi-fi não funciona',
				'Outro'
			]
		]
	]
];