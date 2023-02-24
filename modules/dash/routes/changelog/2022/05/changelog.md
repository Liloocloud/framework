### [03.05.2022]
__[added]__ Inicio do sistema Appkit

### [04.05.2022]
__[added]__ Auto carregamento dos arquivos script.js e style.css das rotas de um tema

### [05.05.2022]
__[added]__ Iniciando Rota do tema com leitura lilooV3.Event()

### [07.05.2022]
__[added]__ Retomando o projeto Busque Já (Revista também)

### [09.05.2022]
__[added]__ Continuando projeto busque já
__[added]__ Incluindo a pasta "_Kernel/Assets" para centralizar todas as dependencia JS, CSS
__[added]__ Inicio da ideia de manter todos os componentes JS dentro dos módulos, assim será possível usar em todo o sistema
__[added]__ Sistema de componentes finalizado e testado (Tudo certo) 
__[added]__ Continuando o sistema de rota por history do navegador
__[added]__ Definendo o uso de imagens no tema "__config.theme.php"

### [10.05.2022]
__[added]__ Continuando o projeto busquejá - página home
__[added]__ Inciando a modelagem da tabela do banco liloo_ads

### [11.05.2022]
__[added]__ Continuando projeto Busque já
__[added]__ Adicionado o módulo ads para gestão do portal de anuncios
__[update]__ Atualização do módulo 'configs' para inclusão do cidades e estados
__[added]__ Correção do "_" na requisição Ajax utilizando "$Data = json_decode(file_get_contents('php://input'), true)"

### [12.05.2022]
__[added]__ Continuando projeto Busque já - Dash accounts
__[added]__ Cadastro de usuário
__[added]__ Filtro de busca de usuário módulo accouts
__[added]__ Total de usuário mini reletório
__[added]__ lilooCheck.Email() - nova regra para manipulação de UX/UI

### [13.05.2022]
__[added]__ Continuando o projeto busque ja
__[added]__ Correção do carregamento do arquivo style.css de cada rota
__[added]__ Continuação do sistema de categorias
__[added]__ Correção do preload do arquivo script.js de cada rota
__[added]__ Criação do arquivo script.js da rota categories

### [14.05.2022] - Sábado
__[added]__ Continuando projeto busque já
__[added]__ Finalização da part 1 rota categorias do modulo ads
__[added]__ Problemas com fetch API

### [16.05.2022]
__[added]__ Implementando Axios JS
__[added]__ Corrigindo o problema da requisiçao por Promise deixando em Ajax para ser compatível com todos os navegadores
__[added]__ Início do api first conceito
__[added]__ Erro 499 ao carregar arquivo JS
__[added]__ caminho do arquivo javascript com erro ao carregar
__[added]__ Correção da API da plataforma
__[added]__ Inclusão das pasta "api" nativa da plataforma (Irá trabalhar em comum com os módulos)
__[added]__ Bugfix arquivo .htaccess que estava na pasta dos módulos dava conflito com a requisição


### [17.05.2022]
__[added]__ Continuando o projeto Busque ja
__[added]__ Implementando categorias copiadas do portal guia mais
__[added]__ Filtragem das categorias
__[added]__ Rota de Gestão de categorias

### [18.05.2022]
__[added]__ Continuando o projeto Busque ja
__[added]__ Adicioando mais categorias
__[added]__ Sistema de cadastro de categorias por lista usando textarea
__[added]__ Criação do case "portal/categs/create/list"
__[added]__ Adicionada aproximadamento 1000 categorias
__[added]__ Melhorias na API filtrando os Params na Requisição


### [19.05.2022]
__[added]__ Testando o uso do framework Ionic puro na front-end (Blog)
__[added]__ Inicianda a Modelagem da Tabela Ads do Porta Busque Já
__[added]__ Correção da função que controla as rotas no painel de controle
__[added]__ Completando a Rota (completa) login do theme
__[deprecated]__ Tentar retirar a pasta "dash" do módulo deixando apenas a "routes"
__[added]__ Fazerndo uma limpeza de pastas nos módulos. Pastas excluídas: 
- widgets
- dash
- img / incluida dentro de "assets"
- components


### [20.05.2022]
__[added]__ Arquivo "menu.php" de cada modulo incluindo mais uma variavel "text" dentro do arquivo "_routes.php" para criar o menu automaticamente
__[added]__ Excluido arquivo menu.php dos módulos
__[update]__ Atualizado script que verifica se as rotas foram declaradas em admin.fun.php
__[added]__ Reescrita da variavel $__ROUTES__ para $__ROUTES['module']__
__[added]__ Criação e modelagem das tabelas de localização
__[added]__ Implementação das APIs Globais sem a necessidade de módulos, dessa
forma será possível construir API que sirvam todos os módulos, como por exemplo:
api de localidades, api de categorias CNAE e etc.


### [21.05.2022] Sábado
__[added]__ Implementando Autocomplete https://www.tutorialspoint.com/jqueryui/jqueryui_autocomplete.htm
__[added]__ Modelagem das tabelas de localização
__[added]__ Implementando Rota locations 
__[added]__ Front-end para cadastramento das listas

### [23.05.2022]
__[added]__ Carregando a tabale liloo_location_cities com todas as cidades do Brasil
__[added]__ Ajusta no Case dos Cadastro da Lista de Cidades
__[added]__ Continuando a Rota Locations no modulo Portal
__[added]__ Continua... Lever ID da seleção para poder cadastrar a lista

### [24.05.2022]
__[added]__ Error: Adicionando Lib PHPCrawl para Indexação de sites externos (Ideal para fazer buscadores)
__[added]__ Continuando a Rota portal/ads
__[added]__ Ajustando a Rota Categorias para Retificá-las
__[added]__ Iniciando implementação DropZone2


### [25.05.2022]
__[added]__ Continuando a Implementação do DropZone
__[added]__ Analise de criação do CSRF token para implementação de segurança nos forms e nas requisições
__[added]__ Resolvido o problema de Uploads de Arquivos via Dropzone, alterando o arquivo php.ini:
- -- post_max_size = 8M // 
- -- upload_max_filesize = 2M
- -- max_execution_time = 30
- -- max_input_time = 60
- -- memory_limit = 8M
- #### Número máximo de arquivos que podem ser enviados por meio de uma única solicitação
- -- max_file_uploads = 20

### [26.05.2022]
__[added]__ Finalizando a implemetação do DropZone como Módulo Nativo + Plugin
__[added]__ Adicionando Abstração de recursos do DropZone
- ok - Cancelar imagem que incluir por engano
- ok - Limite de tamanho, sendo por padrão 5MB por imagem 
- ok - Limite de imagens, tanto no DropZone quando na Backend (Dependendo da Regra de Negócio)
- ok - Mensagem ao Finalizar o Upload
- ok - Mensagem de Erro por Imagem
- ok - Permitir Multiplos Uploads
- ok - Botão de Cancelar Todos os Uploads
- ok - Botão Limpar Todos os Uploads
- ok - Incluir a opção do tamanho da miniatura
- ok - Tipos de arquivos permitidos
- ok - Permitir definiar o tamanho de envio das imagens
- ok - Estilizar CSS para padrão da plataforma
- ok - Ajuste CSS mobile
- ok - Implementando em modulo Nativo
- Backend com recuros de Miniatura (Passar parametro por JS)
- Criar marca'água nas imagem (Por padrão o logo da buseuq já)
- Recursos de Request da Liloo sendo:
__[added]__ Adicionado o Framework Semantic Ui 


### [27.05.2022]
__[added]__ Ajustando CSS da Dropzone
__[added]__ Adicionando Upload.php
__[added]__ Criando a abstração da Função lilooDZ.Dropzone
__[added]__ Verificando Multiplos Cancelamentos Dropzone
__[added]__ Verificando renomear antes de enviar
__[added]__ Verificando duplicados (Não resolvido)

### [28.05.2022] Sábado
__[added]__ Class Uploads Refactor Felipe Oliveira. Com os seguintes metodos
- ok -- Criar diretório personalizado
- ok -- Fazer o Uploads do Arquivo
- ok -- Gravar no banco na tabela nativa liloo_uploads

### [30.05.2022]
__[added]__ Continuar com o script de Inserir no banco de dados (UPLOADS)
__[added]__ Ajustando Class Upload:
- ok -- Criar diversas miniaturas
- ok -- Redimencionar
- ok -- Renomear de arquivos


### [31.05.2022]
__[added]__ Ajustando Class Upload:
- ok -- Renomeando arquivo erradamente
__[added]__ Implementação de uma Class para manipular as Imagens (\Uploads\Resource)
__[added]__ Ao criar as miniaturas será Salvo em {json} ou separados por ',' os caminhos no banco
__[added]__ Novo campo na tabela uploads 'upload_thumbnails'
__[added]__ Incluindo dimensão da imagem no banco
__[added]__ Teste online do sistema de Uploads
__[added]__ Verificar se está logado antes de fazer o Upload
Pendente:  Ajustando Class Upload:
- -- Criar marca d'água (Problemas ao criar marda dagua)
- -- Permissão para upload de diversos arquivos
- -- Validação de arquivo
- -- __[added]__ Inserir 'accout_cover' para usar como capa ou logotipo na conta
- -- __[added]__