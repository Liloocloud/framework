### [04.01.2022]
- __[update]__ Modificação da estrutura da pastas modules/{{modulo}} com o intuito de melhorar a flexibilidade de implementação de novos recursos e tambám de usailidade

### [05.01.2022]
- __[added]__ Implementação do novo paradigma 6.0
- __[update]__ Modificação da estrutura de pastas dos plugins
- __[update]__ Atualização do módulo accounts
- __[tdd]__ Teste e inplementação de API KEY para todos os módulos
- __[update]__ Refatoração da URL dentro do painel de controle
- __[updade]__ Refatoração da função _inc_modules() do "admin"
- __[added]__ Novo módulo "traffic-manager" para gestão de tráfego da frontend
- __[deprecated]__ Depreciação (eliminação) da Ciclo.inout
- __[deprecated]__ Redução de scripts sem utilizadade

### [06.01.2022]
- __[updade]__ Ajustes das paths que levam para o AJAX dos módulos atualizados
- __[deprecated]__ Eliminar a div ".callbakc" de todas as rotas, pois o mesmo ja está no script.php
- __[added]__ rel=preload no arquivo lilooJS (Carregando corretamente)
- __[updade]__ Novo local para carregamento de arquivos JS das rotas ficando antes da "body"
- __[added]__ Inclusão da imagem do módulo no top da sidebar
- __[updade]__ Ajustes do PIV de alguns módulos
- __[updade]__ Correções do módulo "clients" pós migração
- __[updade]__ Correções do módulo "items" pós migração
- __[added]__ Inicio da rota "credentials" da accouts para gestão de token
- __[added]__ Iniciado o Módulo "CRM"
- __[added]__ Iniciado o Módulo "Support" (Fale conosco, reportar problema, ticket)
- __[added]__ Iniciado o Módulo "Orders" (Pedidos Genéricos)
- __[tdd]__ Teste de nível de usuário por módulo
- __[tdd]__ -- Gestão de mensagens no página login
- __[tdd]__ -- Implementado vetor 'level' nos rotas dos módulo para nível de permissão por rota

### [07.01.2022]
- __[plan]__ Planejamentos de algumas rotas de algns módulos
- __[added]__ Iniciado o módulo "Configs" para configurações nativas da instalação
- __[added]__ Permissão de acesso as rotas dos módulos [admin/admin.fun.php]
- __[added]__ Formatação Markdown na rota info do módulo "configs"
- __[plan]__ Definição da permissão de cada rota 
- __[added]__ ajuste de formatação markdown no arquivo "admin/inc/script.php"
- __[added]__ Adicionando o arquivo info.md em todos os módulos
- __[added]__ Adicionando o indice "level" nas rotas do módulos

### [08.01.2022]
- __[update]__ Cont... Adicionando o arquivo info.md em todos os módulos
- __[plan]__ Organizando a pasta __DOCS
- __[plan]__ Organizando a pasta __BK
- __[tdd]__ Teste de modelo de layout darkmode (idealizado na behance)
- __[plan]__ Organização das pastas de Plugins

### [10.01.2022]
- __[added]__ Plugin "cropper-editor" desenvolvido com cropper.js 
- __[added]__ Ajuste do plugin "add-to-any" para compartilhamento
- __[update]__ Ajustando Re-captcha (Nçao finalizado)

### [11.01.2020]
- __[plan]__ Planejamento inicial dos módulos "Agend" e "CRM"
- __[added]__ Módulo "Dash" para registrar as Change logs e as pesquisas feitas ao longo do tempo
- __[update]__ Correção de bug de URL dentro da Dashboard
- __[added]__ Módulo "Agend" focado em sistema de agendamento
- __[added]__ Rota de cadastro de novo agendamento - Módulo "Agend"
- __[added]__ Implementação da lib "FullCalendar"

### [12.01.2022]
- __[update]__ Continuando a implementação do FullCalendar incluindo eventos utilizando Ajax, PHP e MySQL
- __[updade]__ Correção da inclusão dos scripts das rotas no arquivo "inc/script.php"
- __[added]__ Tabela no banco de dados que gravar os eventos do módulo agend
- __[added]__ Implementação Ajax dentro do módulo Agend
- __[added]__ No arquivo "config.php" de cada módulo, foi idealizado incluir a var $Extra[] para alimentar as função _tpl_fill()

### [14.01.2022]
- __[update]__ Formulário para inserir novo evento utilizando datapiker [Doc](https://www.daterangepicker.com/)
- __[added]__ Legenda da cores para etiquetas na Rota "manager" do módulo "Agend"
- __[update]__ Continuando o módulo "traffic"
- __[update]__ Auteração no nome do módule "traffic" para "marketing"
- __[update]__ Refatorando o Módulo "marketing" para entregar MVP
- __[update]__ Adicioada a variavel global OPTIONS dentro de cada módulo (Coleta das options da tabela "liloo_options" pelo namespace) no arquivo "namespace_do_modulo.config.php"
- __[update]__ Removida a pasta "assets/custom/css e js" deixando "assets/css e js" 
- __[update]__ _Autoloader.php para carregamento das Classes dos módulos "modules/this/Class/xxx.php"
- __[update]__ Alteração do Nome da Tabela "liloo_contacs" para "liloo_analytics"
- __[added]__ Class/Interactions no módulo "Marketing" 

### [15.01.2022] Sábado
- __[added]__ Finalizando MVP da Class/Interactions no módulo "Marketing"
- __[update]__ Movido os icones da pasta "uploads" para "assets/img/" do Módulo Marketing

### [17.01.2022]
- __[update]__ Continuando o Módulo "marketing"
- __[update]__ Atualização do caminho das imagens dos ícones no painel  módulo "marketing"
- __[added]__ Inclusão da Variável "DASH_IMAGES_BASE", para o caminho das imagens do módulo

### [21.01.2022]
- __[update]__ Continuando o Módulo "Marketing"
- __[update]__ Incluindo o recurso de habilitar ou desabilitar Canal no módulo "marketing"
- __[updata]__ Incluindo recursos na tabela "liloo_options"
- __[added]__ Campo "opt_description" em "liloo_options" para descrever a função da "opt_meta"
- __[added]__ Todas as "opt_meta" em "liloo_options" (mkt_facebook_ads, mkt_facebook_smm, mkt_google_ads, mkt_instagram_ads, mkt_instagram_smm, mkt_qr_code, mkt_linkedin_ads, mkt_youtube_link, mkt_recommendation, mkt_backlink, mkt_interactive_card, mkt_email_marketing, mkt_whatsapp_list)
- __[added]__ Campo "opt_icon" e "opt_title" em "liloo_options" para uso nas tpl

### [27.01.2022]
- __[added]__ featch Javascript com retorno em JSON para povoar TPL's. Com isso todo o ecossistema terá a possibilidade de retornar JSON vindo do PHP
- __[added]__ Dentro do Site da beegray está sendo construido uma apresentação interativa junto ao Módulo CRM

### [28.01.2022]
- __[update]__ Incluindo campos na tabela "liloo_clients" para uso no CRM
- -- name: client_office (Indica qual o Cargo que o Cliente Possui dentro da empresa)
- -- name: client_company (Nome fantasia da empresa)
- -- name: client_number_worker (Número de funcionario que a empresa possui)
- -- name: client_ticket (Ticket médio do produto ou serviço ofericido)
- -- name: client_level_know (Nível de conhecimento do cliente em relação ao seu produto/serviço)
- -- name: client_previous_companies (O seu cliente já contratou uma empresa do mesmo ramo anteriormente)
- __[fixed]__ O arquivo "lilooJS-2.0.js" está sendo chamado em 'inc/script.php' do tema, pois houve falha ao enviar formulários
- __[fixed]__ O tipo da variável (objeto) do arquivo "lilooJS-2.0.js" foi trocado de "const" para "var" lilooJS

### [29.01.2022] - Sábado
- __[update]__ Inclusão da verificação "is_array" em _Sync.inout.php
- __[added]__ Continuando a apresentação com cadastro do cliente em "liloo_clients"
- __[plan]__ Planejamento do sistema de gestão do tempo