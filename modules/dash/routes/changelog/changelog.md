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
- __[]__

### [01.02.2022]
- __[update]__ Versionando a lilooJS para v3.0 utilizando fetch() API. Lançada no mesmo dia
- __[update]__ Continuando a apresentação da Beegray
- __[added]__ Inicio da class Client/Check() em APP testada no projeto beegray
- __[added]__ Case emm themes/beegray/ajax/crm.php "presentation_company_client_insert"

### [12.02.2022] - Sábado
- __[update]__ Mudança de "Class" para "class" em "_Kernel/Autoloader.php" para os módulos

### [21.02.2022]
- __[added]__ Inicio da criação do módulo agency. Módulo que irá resolver a questão de tempo e organização da Beegray
- __[added]__ Dev. da Rota Home do módulo
- __[update]__ Correção do menutop do painel administrativo onde o scroll vertical está sobrepondo o top
- __[]__

### [23.02.2022]
- __[update]__ Continuando módulo agency Beegray
- __[update]__ Definição do menu do Módulo Agency
- __[update]__ MVP da rota followup do Módulo Agency 
- __[update]__ Inner Join para trazer os clientes e as matrizes

### [04.03.2022]
- __[update]__ Continuando o Sistema do Marcelo, foi feita uma cópia do projeto lilooCloud5 para lilooordersys2

### [18.03.2022]
- __[update]__ Atualizando os comentários da table "liloo_matrix_items"
- __[update]__ Continuando a modelagem da tabela "liloo_matrix_items"
- __[added]__  Script de coleta da controladora project.php

### [19.03.2022]
- __[added]__ Inner join completo da rota projects do modulo agency
- __[added]__ Card com os dados no cliente no rota projects do modulo agency 
- __[added]__ Iniciando a ideia dos templates de matriz separados por tipo

### [24.03.2022]
- __[added]__ Implementando Jquery UI Sortable, para mover os cartões na rota folloup do modulo agency

### [30.03.2022]
- __[added]__ Continuando o projeto da Matriz
- __[added]__ Finalizando o script da pipeline

### [31.03.2022]
- __[added]__ Finalizando alguns ajustes finais da pipeline que será utilizada na fase KANBAN
- __[added]__ Continuando o desenvolvimento da rota project

### [01.04.2022]
- __[added]__ Criação de alguns snippets para uso geral
- __[added]__ Formulário para criar nova oportunidade
- __[update]__ Correção da Sync.inout fazendo a leitura de name="" dos inputs de formulários
- __[added]__ Criação do form que inclui nova oportunidade
- __[added]__ Campo 'company_segment' na tabela cliente
- __[update]__ Campo 'company_name' na tabela cliente
- __[added]__ Criando o case do cadastro de nova oportunidade
- __[added]__ Colune 'pipe_components' para saber quais recursos serão utilizados na fase da matriz
- __[added]__ Tabela Components para registrar os componentes para uso geral

### [05.04.2022]
- __[added]__ Case de atualização de Data nos cards da rota followup em "agency"
- __[added]__ Colunas item_value_string, item_value_int, item_value_float e item_value_datetime para gerenciar o tipo de dados
- __[update]__ Ajustes no layout da rota followup 
- __[update]__ finalização do cadastro da oportunidade

### [11.04.2022]
- __[added]__ Backup dos banco de dados e aquivos da busqueja.com.br
- __[added]__ Iniciando um novo projeto www/busqueja
- __[added]__ Upload do banco de dados e arquivos para o servidor
- __[added]__ Iniciando o desenvolvimento do novo projeto "Busqueja"
- __[added]__ Correções do projeto online

### [13.04.2022]
- __[added]__ Incluindo novo tema no projeto Liloo
- __[added]__ Corrigindo tabela cookies "liloo_cookies"
- __[added]__ Frontend liloo atualizda
- __[added]__ Finalizando a rota followup do modulo "agency"

### [18.04.2022]
- __[added]__ Corrigindo o Case que adiciona oprtuinidade no modulo aency
- __[added]__ Implementando correção de data
- __[added]__ Correção do case "followup_update_datetime_pipeline" do modulo agency
- __[added]__ Correção do case "followup_create_new_item" do modulo agency
- __[added]__ Correção do move dos cards na followup bloqueando a coluna "Oportunidade" de linkar

### [19.04.2022]
- __[added]__ Ciclo.inout.php foi descontinuado
- __[added]__ Corrigindo nível de acesso ao módulo "admin.fun.php" #38
- __[added]__ Carregamento automatico dos CSS de cada Rota
- __[added]__ Inicio da Rota de cadastro de colaboradores módulo "agency"
- __[added]__ Adicionado comentários da tabela accounts

### [20.04.2022]
- __[added]__ Inclusão de novo padrão de escrita de "case" ajax, por exemplo: agency/workers/search. Sendo modulo/rota/ação
- __[added]__ Finalização do componente "Colaoradores" da rota "workers" - Módulo agency
- __[added]__ "Create" do Novos colaboradores "rota worker do modulo agency"

### [21.04.2022] (Feriado)
- __[added]__ Recurso "x" no input de perquisa do colaborador
- __[added]__ Alteração do layout da rota agency/workers
- __[added]__ Implementando fetch Javascript para retornar html direto na tela

### [23.04.2022] (Sábado)
- __[added]__ Inicio dos teste de Fetch Api requisitando API da Liloo

### [25.04.2022]
- __[added]__ Resolvido o Body do Fetch javascript
- __[added]__ Sync.inout atualizado para receber requisições Fetch API

### [26.04.2022]
- __[added]__ Lançamento da nova versão lilooJS-3.0
- __[added]__ Ajustando o script

### [27.04.2022]
- __[added]__ Incluindo suporte a formulário lilooJS v3
- __[update]__ O body do fetch será sempre 'action,path e data'. Desta forma tudo será compativel
- __[added]__ Continuando a utilização da função lilooV3.Event() retornando callback function para usar HTML

### [27.04.2022]
- __[added]__ Finalizando a utilização da função lilooV3.Event() retornando callback function para usar HTML

### [29.04.2022]
- __[added]__ Atualizando o arquivo Sync.inout
- __[added]__ Criando uma nova Sync para o uso da fetch API

### [30.04.2022] (Sábado)
- __[added]__ Finalizando o Sync versão 2 
- __[added]__ Adicionado define ADMIN_SLEEP_REQUEST
- __[added]__ Adicionado retorno 'notify' ajax da fetch API lilooV3.js
- __[deprecated]__ Descontinuar $JSON['callback','script','array'] no modelo fetch API lilooV3
- __[added]__ Atualizado uk_notification CSS possibilitando o uso no javascript
- __[added]__ Objeto lilooUi no arquivo lilloJS V3 para uso geral (100% compativel com uikit)
- __[added]__ Corrigindo carregamento de lista de colaoradores
- __[added]__ Implementando outras funcionalidades de busca
- __[added]__ Implementando o modal dos colaboradores
###lilooV3.Event() Javascript
```
window.onload = function () {
    setTimeout(() => {
        lilooV3.Event({
            action: 'agency/workers/init',
            path: 'modules/agency/dash/routes/workers/ajax',
            data: 'Felipe',
            success: function (res) {
                $('#agency_workers_list').html('')
                res.forEach((val) => {
                    $('#agency_workers_list').prepend(`
                    <li onclick="modalChannelData('.modal-workers','${val.account_id}')">
                        <div class="uk-flex uk-flex-between">
                            <div>
                                ${val.account_name} ${val.account_lastname}<br>
                                ${val.account_email}<br>
                                ${val.account_phone}
                            </div>
                            <div>
                                <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.account_id}')"></button>
                                <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.account_id}')"></button>
                            </div>
                        </div>							
                    </li>
                    `)
                })
                $('[liloo-loader]').hide()
            }
        })
    }, 300);
}
```
###Testando lilooV3.Event() Javascript
```
$('#teste').on('click', () => {
    lilooV3.Event({
        action: 'agency/workers/modal',
        path: 'modules/agency/dash/routes/workers/ajax',
        data: 'Felipe',
        success: function (res) {
            $('#agency_workers_list').html('')
            res.forEach((val) => {
                $('#agency_workers_list').prepend(`
                <li onclick="modalChannelData('.modal-workers','${val.account_id}')">
                    <div class="uk-flex uk-flex-between">
                        <div>
                            ${val.account_name} ${val.account_lastname}<br>
                            ${val.account_email}<br>
                            ${val.account_phone}
                        </div>
                        <div>
                            <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.account_id}')"></button>
                            <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.account_id}')"></button>
                        </div>
                    </div>							
                </li>
                `)
            })
            $('[liloo-loader]').hide()
        }
    })
    $('[liloo-loader]').hide()
})
```

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
__[added]__ 
__[added]__ 
