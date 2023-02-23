<?php
/**
 * Presents (Informações pre definidas) para uso geral da aplicação
 * @copyright Felipe Oliveira Lourenço
 */


$preset['estate'] = [
	'Acre',
	'Alagoas',
	'Amapá',
	'Amazonas',
	'Bahia',
	'Ceará',
	'Distrito Federal',
	'Espírito Santo',
	'Goiás',
	'Maranhão',
	'Mato Grosso',
	'Mato Grosso do Sul',
	'Minas Gerais',
	'Pará',
	'Paraíba',
	'Paraná',
	'Pernambuco',
	'Piauí',
	'Rio de Janeiro',
	'Rio Grande do Norte',
	'Rio Grande do Sul',
	'Rondônia',
	'Roraima',
	'Santa Catarina',
	'São Paulo',
	'Sergipe',
	'Tocantins'
];


/**
 * PRESET PARA EMPRESAS
 */
$preset['segmentation']['Assistência Técnica'] = [
	'Aparelhos Eletrônicos' => [
		'Aparelho de Som' => 'Assistência Técnica de Aparelhos de Som',
		'Ar Condicionado' => 'Assistência Técnica de Ar Condicionado',
		'Câmera' => 'Assistência Técnica de Câmeras',
		'DVD / Blu-Ray' => 'Assistência Técnica de DVD e Blu-Ray',
		'Home Theater' => 'Assistência Técnica de Home Theater',
		'Televisão' => 'Assistência Técnica de Televisão',
		'Video Game' => 'Assistência Técnica de Video Game'
	],
	'Eletrodomésticos' => [
		'Fogão e Cooktop' => 'Assistência Técnica de Fogão e Cooktop',
		'Geladeira e Freezer' => 'Assistência Técnica de Geladeira e Freezer',
		'Lava Louça' => 'Assistência Técnica de Lava Louça',
		'Máquina de Lavar' => 'Assistência Técnica de Máquina de Lavar',
		'Microondas' => 'Assistência Técnica de Microondas'
	],
	'Informática e Telefonia' => [
		'Cabeamento e Redes' => 'Assistência Técnica de Cabeamento e Redes',
		'Celular' => 'Assistência Técnica de Celular',
		'Computador Desktop' => 'Assistência Técnica de Computador Desktop',
		'Impressora' => 'Assistência Técnica de Impressora',
		'Notebook' => 'Assistência Técnica de Notebook',
		'Tablet' => 'Assistência Técnica de Tablet',
		'Telefone Fixo' => 'Assistência Técnica de Telefone Fixo',
		'Telefonia PABX' => 'Assistência Técnica de Telefonia PABX'
	]
];


$preset['segmentation']['Aulas e Cursos'] = [ 
	'Bem-Estar' => [
		'Artes e Artesanatos' => 'Aulas e Cursos de Artes e Artesanatos',
		'Aulas de Dança'  => 'Aulas de Dança',
		'Esportes' => 'Aulas e Cursos de Esportes',
		'Lutas' => 'Aulas e Cursos de Lutas'
	],
	'Acadêmicos' => [
		'Aulas de Idiomas' => 'Aulas de Idiomas',
		'Aulas Particulares' => 'Aulas Particulares',
		'Concursos' => 'Aulas e Cursos para Concursos',
		'Informática' => 'Aulas e Cursos de Informática',
		'Música' => 'Aulas e Cursos de Música'
	]
];

$preset['segmentation']['Automóveis'] = [ 	
	'Elétrica de Autos' => [
		'Alarme Automotivo' => 'Instalação e Manutenção de Alarme Automotivo',
		'Ar Condicionado' => 'Instalação e Manutenção de Ar Condicionado',
		'Auto Elétrico' => 'Serviços de Elétrica Automotiva' ,
		'Som Automotivo'  => 'Instalação e Manutenção de Som Automotivo'
	],
	'Funilaria e Pintura' => [
		'Funilaria' => 'Serviços de Funilaria',
		'Higienização e Polimento' => 'Serviços de Higienização e Polimento',
		'Martelinho de Ouro' => 'Serviços de Martelinho de Ouro',
		'Pintura' => 'Serviços de Pintura Automotiva'
	],
	'Vidracarias de Autos' => [
		'Insulfilm' => 'Aplicação de Insulfilm',
		'Vidraçaria Automotiva' => 'Instalação e Manutenção de Vidros Automotivos'
	],
	'Mecânica' => [
		'Borracharia' => 'Serviços de Borracharia para Automóveis',
		'Guincho' => 'Serviços de Guincho para Automóveis',
		'Mecânica Geral' => 'Serviços de Mecânica em Geral'
	]
];

$preset['segmentation']['Consultoria'] = [
	'Mídia' => [
		'Assessoria de Imprensa' => 'Serviços de Assessoria de Imprensa',
		'Pesquisa em Geral' => 'Serviços de Pesquisa em Geral',
		'Produção de Conteúdo' => 'Serviços de Produção de Conteúdo',
		'Tradutores' => 'Serviços de Tradução'
	],
	'Negócios' => [
		'Auxílio Administrativo' => 'Serviço de Auxílio Administrativo',
		'Contador' => 'Serviços de Contábeis',
		'Digitalizar Documentos' => 'Serviço de Digitalização de Documentos',
		'Economia e Finanças' => 'Serviços de Economia e Finanças',
		'Segurança do Trabalho' => 'Serviços de Segurança do Trabalho'
	],
	'Jurídico' => [
		'Advogado' => 'Serviços Jurídicos'
	],
	'Pessoal' => [
		'Consultoria Especializada' => 'Serviços de Consultoria Especializada',
		'Consultor Pessoal' => 'Serviços de Consultoria Pessoal',
		'Detetive Particular' => 'Serviços de Detetive Particular'
	]
];		

$preset['segmentation']['Design e Tecnologia'] = [
	'Tecnologia' => [
		'Apps para Smartphone' => 'Desenvolvimento de Aplicativo para Smartphone',
		'Desenvolvimento de Sites' => 'Desenvolvimento de Sites',
		'Marketing Digital' => 'Serviço de Marketing Digital'
	],
	'Gráfica' => [
		'Convites' => 'Criação de Convites Personalizados',
		'Criação de Logos' => 'Criação de Logos',
		'Diagramador' => 'Serviços de Diagramação',
		'Materiais Promocionais' => 'Criação de Materiais Promocionais',
		'Produção Gráfica' => 'Criação de Materiais Promocionais'
	],
	'Audio / Visual' => [
		'Animação Motion' => 'Criação de Animação Motion',
		'Áudio e Vídeo' => 'Serviços de Áudio e Vídeo',
		'Edição de Fotos' => 'Serviços de Edição de Fotos',
		'Fotografia' => 'Serviços de Fotografia',
		'Ilustração' => 'Serviços de Ilustração',
		'Modelagem 2D e 3D' => 'Serviços de Modelagem 2D e 3D',
		'Web Design' => 'Serviços de Web Design'
	]
];

$preset['segmentation']['Festas e Eventos'] = [
	'Equipe e Suporte' => [
		'Assessor de Eventos' => 'Assessoria para Festas e Eventos',
		'Equipamento para Festas' => 'Aluguel de Equipamentos para Festas',
		'Garçons e Copeiras' => 'Garçons e Copeiras para Festas e Eventos',
		'Recepcionistas' => 'Recepcionistas para Festas e Eventos',
		'Seguranças' => 'Seguranças para Festas e Eventos'
	],
	'Comes e Bebes' => [
		'Bartender' => 'Bartender para Festas e Eventos',
		'Buffet Completo' => 'Buffet Completo para Festas e Eventos',
		'Churrasqueiro' => 'Churrasqueiro para Festas e Eventos',
		'Confeiteira' => 'Confeiteira para Festas e Eventos',
	],
	'Música e Animação' => [
		'Animação de Festas' => 'Serviços de Animação para Festas e Eventos',
		'Bandas e Cantores' => 'Bandas e Cantores para Festas e Eventos',
		'DJs' => 'Bandas e Cantores para Festas e Eventos'
	],
	'Serviços Complementares' => [
		'Brindes e Lembrancinhas' => 'Brindes e Lembrancinhas para Festas e Eventos',
		'Convites' => 'Criação de Convites para Festas e Eventos',
		'Decoração' => 'Serviços e Artigos de Decoração para Festas e Eventos',
		'Edição de Vídeos' => 'Edição de Vídeos para Festas e Eventos',
		'Fotografia' => 'Serviços de Fotografia para Festas e Eventos'
	]
];	

$preset['segmentation']['Moda e Beleza'] = [
	'Beleza' => [
		'Cabeleireiro' => 'Serviços de Cabeleireiro',
		'Design de Sobrancelhas' => 'Serviços de Design de Sobrancelhas',
		'Esteticistas' => 'Serviços de Estética',
		'Manicure e Pedicure' => 'Serviços de Manicure e Pedicure',
		'Maquiadores' => 'Serviços de Maquiagem'
	],
	'Estilo' => [
		'Corte e Costura' => 'Serviços de Corte e Costura',
		'Personal Stylist' => 'Serviços de Personal Stylist',
		'Sapateiro' => 'Serviços de Sapateiro'
	],
	'Artes e Artesanatos' => [
		'Artesanato' => 'Serviços de Artesanato'
	]
];

$preset['segmentation']['Reformas'] = [
	'Construção' => [
		'Arquitetos' => 'Serviços de Arquitetura',
		'Engenheiro' => 'Serviços de Engenharia',
		'Limpeza pós Obra' => 'Serviços de Limpeza pós Obra',
		'Pedreiro' => 'Serviços de Pedreiro',
		'Terraplanagem' => 'Serviços de Terraplanagem'
	],
	'Reformas e Reparos' => [
		'Eletricista' => 'Serviços de Elétrica',
		'Encanador' => 'Serviços de Hidráulica',
		'Gesso e Drywall' => 'Serviços de Gesso e Drywall',
		'Pintor' => 'Serviços de Pintura',
		'Serralheria e Solda' => 'Serviços de Serralheria e Solda',
		'Vidraceiro' => 'Serviços de Vidraçaria'
	],
	'Serviços Gerais' => [
		'Automação Residencial' => 'Serviços de Automação Residencial',
		'Chaveiro' => 'Serviços de Chaveiro',
		'Desentupidor' => 'Serviços de Desentupidor',
		'Dedetizador' => 'Serviços de Dedetização',
		'Impermeabilizador' => 'Serviços de Impermeabilização',
		'Marceneiro' => 'Serviços de Marceneiro',
		'Marido de Aluguel' => 'Serviços de Marido de Aluguel',
		'Mudanças e Carretos' => 'Serviços de Mudanças e Carretos',
		'Segurança Eletrônica' => 'Serviços de Segurança Eletrônica',
		'Tapeceiro' => 'Serviços de Tapeceiro'
	],
	'Serviços Residenciais' => [
		'Decorador' => 'Serviços de Decoração',
		'Jardinagem' => 'Serviços de Jardinagem',
		'Montador de Móveis' => 'Serviços de Montagem de Móveis',
		'Paisagista' => 'Serviços de Paisagismo',
		'Piscina' => 'Intalação e Manutenção de Piscina'
	]
];	

$preset['segmentation']['Serviços Domésticos'] = [
	'Residencial' => [
		'Diarista' => 'Serviços de Diarista',
		'Limpeza de Piscina' => 'Serviços de Limpeza de Piscina',
		'Passadeira' => 'Serviços de Passadeira',
		'Tapeceiro' => 'Serviços de Tapeçaria'
	],
	'Familiar' => [
		'Babá' => 'Serviços de Babá',
		'Cozinheira' => 'Serviços de Cozinheira',
		'Motorista' => 'Serviços de Motorista'
	],
	'Pets' => [
		'Adestrador de Cães' => 'Serviços de Adestramento de Cães',
		'Passeador de Cães' => 'Serviços de Passeador de Cães'
	]
];

$preset['segmentation']['Saúde'] = [
	'Corporal' => [
		'Fisioterapeuta' => 'Serviços de Fisioterapia',
		'Fonoaudiólogo' => 'Serviços de Fonoaudiólogo',
		'Nutricionista' => 'Serviços de Nutricionista',
		'Terapias Alternativas' => 'Serviços de Terapias Alternativas'
	],
	'Familiar' => [
		'Cuidador de Pessoas' => 'Cuidador de Pessoas',
		'Enfermeira' => 'Cuidador de Infermagem'
	],
	'Mental' => [
		'Psicólogo' => 'Serviços de Psicólogo'
	]
];