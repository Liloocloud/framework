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