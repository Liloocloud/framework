### [01.06.2022]
__[added]__ Finalizar o layout básico da rota arquivos no painel
__[added]__ Erro ao criar pasta do mes seguinte class Uploads

### [02.06.2022]
__[added]__ Erro Upload: Tipo de dado compatível com a tabela ao subir PDF (Tamanho da coluna type de 10 para 50 resolvido)
__[added]__ Adicionou coluna "upload_mime" e separou "upload_type" apenas com a extensão (Facilitou as buscas)
__[added]__ Incluiu o layout do filtro de busca no modulo uploads
__[added]__ Ajuste de Css para visualização dos arquivos na lateral direita
__[added]__ Inicio da rota configurações do upload
__[added]__ Retomando o sistema de anuncio
__[added]__ Adicionar a columa 'account_plan' para indicar o plano aceito pelo usuário
__[added]__ Gerando Comentário nas colunas da tabela accounts
__[added]__ Planejamento dos Métodos da Class que irá abstrair o Portal
__[added]__ Incluindo Endereço no Anuncio adicionando os campos de endereço na table ADS do portal
__[added]__ Iniciando a Rota para Criar Anuncio dentro do painel Admin (Super)

### [03.06.2022]
__[added]__ Definindo os metodos da Class Portal
__[added]__ Importa as tabelas de localização para localhost
__[added]__ Refatorando o Sistema basico de cadastro de conta de usuário
__[added]__ Atualizando index.php principal para desabilitar inc de subrota /conta/cadastre-se/
__[added]__ Pasta "Assets Global" para que todas as partes da plataforma consumam CSS/JS e LibsJS do mesmo lugar
__[added]__ Desenvolvimento da Rota "/conta/cadastre-se/" e a define() ROOT_ASSETS e BASE_ASSETS
__[added]__ Implementando CSRF Token no Rota /conta/ (Inclusão na Sync.inout)
__[added]__ Incluso lilooCheck.Phone(var) para avalidação de telefone

### [04.06.2022] Sábado
__[added]__ Modelagem da Tabela 'liloo_account_plans' - Ideal para registrar planos de conta de usuário
__[added]__ Modelagem da Tabela 'liloo_account_plan_options' (Meta = Values)
__[added]__ Transformando as tabelas 'liloo_account_plans' e 'liloo_account_plan_options' em nativas
__[added]__ Modelagem da Tabela 'liloo_coupons' - Ideal para oferecer descontos a Anuncios, Contratação de Planos e etc. Tudo isso dentro da plataforma
__[added]__ Planejamento dos metodos (Dips) da 'Class Coupons' do Módulo 'Cupons'
__[added]__ Testando e incluindo dados na tabele 'liloo_account_plans'
__[added]__ Testando e incluindo dados na tabele 'liloo_account_plan_options'

### [06.06.2022]
__[added]__ Planejamento dos Dips da tabela 'coupons'
__[added]__ Correção de conflito entre CSRF Token Nativo e Session para login do usuário
__[added]__ Refazerendo os IFs em admin/index.php 
__[added]__ Adicionado 'session_start()' no topo do arquivo '__Kernel.php' para corrigir erros de sessão
__[added]__ Analisando a questão de implementar as funções para uso do Dip. Isso requer criar um arquivo _Kernel/Fun.inout.php nativamente (Desconsiderado)
__[added]__ Ajustando a Rota Conta/Cadstre-se
__[added]__ Corrigindo a Class Accout\Check()
__[added]__ Finalizando a Etapa 1 do cadastro de usuário (Rota 'Conta' será genérica para todos os projetos) 


### [07.06.2022]
__[added]__ Verificando os metodos da Namespace Account e tentando refazer
__[added]__ Construindo interface da class que abstrai a regra de negócio da conta de usuário
__[added]__ Refazendo os metodos da Classe Account para facilitar a manutenção (Em formato Dip)
__[added]__ Iniciando Class Account\Read


### [08.06.2022]
__[added]__ Refazendo a Namespace Account para Accounts incluindo responsabilidade clara em cada class
__[added]__ Class Accounts\Read
__[added]__ Class Accounts\Check
__[added]__ Class Accounts\Update
__[added]__ Class Accounts\Delete

#### __Exemplos de Uso:__
```php
/**
 * Class Responsável por fazer a Leitura e retornar dados de apenas um usuário
 */
$User = new Accounts\Read(['account_cpf' => '331.921.278-80']);
$User = new Accounts\Read(17);
$Read = new Accounts\Read('felipe.game.studio@gmail.com');
var_dump(
    $Read->getLevel(11),
    $Read->getID(),
    $Read->getEmail()
);
/**
 * Class Responsável por Checagem
 */
$Check = new Accounts\Check('felipe.game.studio@gmail.com');
var_dump(
    $Check->Fields(['account_name','account_lastname']),
    $Check->AcceptTerms(),
    $Check->Exists(),
    $Check->Status(),
    $Check->Auth(),
    $Check->AuthKey(),
    $Check->Password('FortE10#'),
    $Check->diffDate(),
    $Check->Email()
);
/**
 * Class Responsável para Atualizar determinados 
 * Campo da tabela com base no paratro passado 
 * na instancia da class
 */
$Up = new Accounts\Update('filipecamargo33@gmail.com');
var_dump(
    $Up->Fields([
        'account_cnpj' => '10.017.577/0001-70'
    ])
);
/**
 * Class Responsável por excluir uma linha da tabela Accounts
 * Com base no paramtro pessado na instancia da Class
 */
$Del = new Accounts\Delete('kifexybeq@mailinator.com');
var_dump(
    $Del->Run()
);
```

### [09.06.2022]
__[added]__ Iniciando a Class Accounts\Search 
__[added]__ Trabalhando no Método Terms() incluindo paginação
__[added]__ Trabalhando no Refactoring da Class Helpers\Paginator() para utilizar junto das Classes do sistema

### [10.06.2022]
__[added]__ Continuando a Classe Search com paginação - Pensar em ser Global e não apenas para Accounts
__[added]__ Token da sessão estava junto da Sync no Ajax. Foi retirado
__[added]__ Métodos privates não retornam no padrão [bool,output,message] podendo retornar o for preciso
__[added]__

### [11.06.2022] Sábado
__[added]__ Continuando o Dev da Class Search com Paginação
```php
<form class="uk-container">
    <input type="text" class="uk-input" name="term" autofocus>
    <input type="hidden" name="page" value="1">
    <button class="uk-button uk-button-primary">Enviar</button>
</form>

$Terms = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_SPECIAL_CHARS);
if($Terms){
    $Sql = "`account_name` LIKE '%{$Terms}%' OR `account_lastname` LIKE '%{$Terms}%'";
}else{
    $Sql = null;
}

$User = new Helpers\Pagination(
    /**
     * Tabela do banco de dados
     * Parametro obrigatório, podendo ser 
     * a Constante que Declara a Tabela
     */
    TB_ACCOUNTS, 
    
    /**
     * (Não obrigatório)
     * Campos do Select podendo ser o que quiser Ex.: Count(), Distinct  e etc.
     * Por padrão a Classe inclui "*", mas se quiser pode adicionar campos como:
     * "`account_name`,`account_lastname`" para criar Seleções personalizadas
     */
    "`account_name`,`account_email`", 
    
    /**
     * (Não obrigatório)
     * Inclui a Clausua "Where" personalizada
     * Por padrão é "vazio", isso facilita os filtros de 
     * busca. Se deseja passar valor no próximo parametro 
     * defina esse como "null"
     */
    $Sql, 

    /**
     * (Não obrigatório)
     * Limite de resultados por página
     * Por padrão a Classe define 10 resutados.
     * Se deseja passar valor no próximo parametro 
     * defina esse como "null"
     */
    2,

    /**
     * (Não obrigatório)
     * Pagina a ser apresentada, por padrão Faz a leitura da URL sendo $_GET['page']
     */
    null
);
$User->Results();
$User->Nav();
$User->Total();
$User->totalPages();
```
__[added]__ Incluir prepare stateament nas busca
__[added]__ Padrão métodos "public" retornam ['bool','output','message']
__[added]__ Remontagem da URL para evitar ter que passar outros parametros
__[added]__ Corrigir: Se a pagina atual for maior que o total de páginas para de gerar links
__[added]__ Finalizada Class Pagination


### [13.06.2022]
__[added]__ Iniciando a class Module\Portal\Ads para abstração das rotinas do portal de anúncio
__[added]__ Backup de liloo_taxonomies.sql
__[added]__ OBS.:  O sistema de categorias do portal utiliza a tabela taxonomies padrão da plataforma
__[added]__ Adicionado o campo ads_address_uf na Tabela liloo_ads (Módulo Portal)
__[added]__ Analisando todos os Campos da tabele liloo_ads e mesclando os campos
__[added]__ Modelagem da Tabela liloo_ads em localhost (Passar para remoto)
__[added]__ Incluindo alguns cadastros para iniciar os Dips da class Ads

### [14.06.2022]
__[added]__ Continuando o dev. dos metodos da classe Ads
__[added]__ Cuidando de Ordem de execução dos Métodos que coletam dados. Ex.: byID ou getAll irá respeitar o último solicitado
__[added]__ (refutado) Separando a Class em dois conjuntos, um para a Leitura Unitária e outra para Leitura de Varios dados Read e Search
__[added]__ Dev. Métodos planejados no Excel
__[added]__ Métodos \Check()
```php
$Check = new \Module\Portal\Check("`ads_type` = 'desktop'"); // String
$Check = new \Module\Portal\Check(['ads_type' => 'desktop']); // Array
$Check = new \Module\Portal\Check(1); // ID
var_dump(
   $Check->Exists(), // Verifica se o anuncio existe
   $Check->diffDate(), // Verifica se data ainda é valida
   $Check->Status(), // Verifica se o anuncio esta ativo
   $Check->acceptTerms(), // Verifica se aceitou os termos de uso
   $Check->Moderate(), // Se foi moderado pelo administrador ou não
   $Check->viewAddress(), // Se o endereço pode ser visualizado ou não
   $Check->Fields([ // Verifica se os campos não são Nulos
      'ads_id',
      'ads_type',
      'ads_adds'
   ]) 
);
```
__[added]__ Métodos \Read()
```php

private function buildSQL(); // Constroi o SQL + Paginação para retornar dados

// getAdsAll
// getAdsID
// getCategory
// getPhoneByID

```

### [15.06.2022]
__[added]__ Continuando a Class Read
__[added]__ metodo ->Nav() em Pagination só será apresentado de o número de página for maior que 1
__[added]__ Finalizado MVP class Portal\Read()
```php
$Ads = new \Module\Portal\Read(null, "`ads_type` = 'top'", 1);
$Ads = new \Module\Portal\Read("*","`ads_address_city` = 'Santos'");
$Ads->getAll(); // Retorna uma lista com paginação de todos os anuncio. Use esse método após a instancia
$Ads->getSQL(); // Retorna uma lista com paginação com base na sintaxe

echo '<div>'.$Ads->Nav().'</div>';
var_dump(
    $Ads->Total(),
    $Ads->Results()
);
```
__[added]__ Implementação da Função Global DIP da plataforma
__[added]__ Testando e incluindo novos DIps a plataforma (Dqui pra frente é só Dipagem)
__[added]__ Continuando o form de cadastro de usuário Steps passo 1
__[added]__ form de cadastro de usuário Steps passo 2

### [17.06.2022]
__[added]__ Refazendo o arquivo config.php da raiz do projeto
__[added]__ Incluindo define('TIME_VALIDATE_ACCOUNT', 5);
__[added]__ Continuando Step2 cadastro de usuário
__[added]__ Criando o Padrão "hash" para a AuthKey() = (string) hash('sha256', mt_rand(100000, 999999) )
__[added]__ Atualizando a class Account\Create adicionado hash na activation key
__[added]__ Colune "account_activation_key" modificada para CHAR (64) // Chave de ativação com 64 caracteres obrigatórios
__[added]__ Criando Método "validateAuthKey()" para verificar se a chave de autenticação está correta
__[added]__ Objeto Text em lilooUi.Alert() foi substituido por 'message'
__[added]__ Adicionado a função lilooCheck.StrongPassword() para verificar força da senha criada
__[added]__ Continuando a pass 3 para criar Senha forte

### [17.06.2022] Sábado
__[added]__ Continunado o sitema de cadastro

### [20.06.2022] 
__[added]__ Continuando o sistema de cadastro renovando o conceito do DipSwitch pensado no Sábado
```php
$Sync = [
    'account_name' => 'Felipe',
    'account_lastname' => 'Oliver',
    'account_email' => 'felipe.game.studio@gmail.com',
    'account_phone' => '(13) 98175-0225'
];
use \Module\Accounts\CreateAccountStep1;
var_dump(
    CreateAccountStep1::One($Sync)
)
```
__[added]__ Finalizando o Reenvio de Código de validação
__[added]__ Entrevista com Walmir Junior Feitoza
__[added]__ Iniciando o Login do Usuário

### [21.06.2022] 
__[added]__ Organizando as rotas na Front End - para dar uma animada em todos
__[added]__ Organizando o arquivo Globals.inout.php e transportando para /config.php
__[added]__ JS para carregar scripts dinamicamente no arquivo "inc/script.php"
__[added]__ Inclusão do Semantic UI na Front-end
__[added]__ Carregamento de Script de Sub Rota na Front-end. Ideal para rotas de sistemas complexos
__[added]__ Cadastro de Anuncio no painel Dashboard

### [22.06.2022] 
__[added]__ Corrigindo a cadastro Back e Front
__[added]__ Correção dos Steps do Cadastro, revendo a regra de negocio
__[added]__ Refazendo as Switchs do Case
__[added]__ Alteração do Title dos planos 'free,basic,pro'
__[added]__ Novas difenes TB_ACCOUNT_PLANS e TB_ACCOUNT_PLAN_OPTIONS
__[added]__ Inicio do Desenvolvendo a SubRota 'conta/planos/ pegando do banco de dados

### [23.06.2022] 
__[added]__ Continuando Cadastro de clientes
__[added]__ Acrescentado desabilitar header da frontend pela subrota "/index.php"
__[added]__ Step 1 do cadastro de usuário está Ok
__[added]__ Continuando o Step 2

### [24.06.2022] 
__[added]__ TDD do cadastro de usuários

### [25.06.2022] Sábado
__[added]__ Com a mudança de Regra de negócio, foi finalizado o cadastro simples e nativa da plataforma

### [27.06.2022] Sábado
__[added]__ Refazerndo a logica de incluir a Header nas Rotas e Subrotas
__[added]__ Atualização do arquivo Helpers.inout.php e index.php (Incluindo o código abaixo)
```php
/**
 * Verifica se a ROTA daclarada possui na URL 
 * Bom para incluir script PHP de acordo com a URL 
 * @param array URL (Rotas) a serem testadas
 */
function pathinfoURLString(array $Array){
    $URL = (isset($_SERVER['PATH_INFO']))? $_SERVER['PATH_INFO'] : '/home/';
	if(in_array($URL, $Array)){
		return true;
	}
	return false;
}
```
__[added]__ TDD do novo cadastre-se ok
__[added]__ Aplicando algumas correções no login e cadastro - ok 
__[added]__ Criando os planos de assinatura
__[added]__ Continuando o cadastro do anuncio

### [28.06.2022] 
__[added]__ Inclusão da leitura markdown dos termos e condições na página cadastre-se
__[added]__ Curadoria dos links da rota conta
__[added]__ Passando o Arquivo conta/ajax.php do Cadastre-se para a pasta da subrota
__[added]__ Refazendo o require da footer e copyright 
__[added]__ Separando os steps de cadastre-se em subrotas (Demorado)
__[added]__ Função couintdown para o usuário aguardar se necessário
```js
function redirectCountDonw(url, seconds = 5) {
    let Sec = seconds
    setInterval(function () {
        if (Sec <= 0) {
            window.location.href = url
            return
        }
        $('.countdown').html('em ' + Sec + '...');
        console.log(Sec--)
    }, 1000)
}
```
__[added]__ Front-end das subrotas redefinir senha e trocar senha
__[added]__ Incluindo o método getAll() na class Accounts\Check()
__[added]__ Criando metodo recoverPassword() em Account\Create()
__[added]__ Criando a Subrota "esqueci minha senha" - ok
__[added]__ Ajustando a função lilooCheck.StrongPassword() adicionando o nível
__[added]__ Criando a Subrota "trocar senha"
__[added]__ A validar a conta, deixar o campo account_activation_key = NULL (Por segurança e desempenho)

### [29.06.2022] 
__[added]__ Finalizando o sistema de cadastro
__[added]__ Sistema de cadastro e recuperação de conta finalizado
__[added]__ Iniciando regrade negócio de anuncios
__[added]__ Ajustando completar cadastro após login
__[added]__ Ajuste de nível de rota da deashboard "admin/inc/sidebar.php"

### [30.06.2022] 
__[added]__ Estudando um pouco de Jade, Pug e Haml
__[added]__ Incluindo "Variaveis Glabais" no admin. Ex.: init.php
__[added]__ Ajustando CSS da Dashboard
__[added]__ Mostras os módulos no menu lateral apenas para o level User correto
__[added]__ Inclusão de todas as rotas dos módulos que serão usados no portal. Listagem:
- modules/accouts
- -- complete       (level 8)
- -- configs        (level 11)
- -- manager        (level 11)
- -- useraccount    (level 8)
__[added]__ Inicio do conceito de simplicidade no layout
__[added]__ Primeiros passos no darkmode
__[added]__ 
__[added]__


https://www.behance.net/gallery/57401147/Banking-concept?tracking_source=project_owner_other_projects

>>>>> CORREÇÕES
***********************************************************************
- Organizar CSS da frontend e da Dashboard
- Incluir o loader nas subrotas do cadastro, pois sem o loader o usuário fica confuso
- Está redirecionando para localhost por alhum momento
- Evitar que o botão submit da 1º etapa do cadastro envie mais de uma vez a requisição


***********************************************************************
- Validar CPF ou CNPJ com Api correta e que validade de verdade
- Não está funcionando o loade no cadastro de usuário

***********************************************************************

Pensar em Retirar o Arquivo Globals.inout.php pois o mesmo já não está sendo usado
Pensar em incluir prepare stateament na Class paginação para garantir a segurança
Pensar em construir um módulo de documentação para evitar ficar utilizando arquivo '.md' direto
Pensar em incluir 'error' no Dip ficando
tabela ads_contacts // Contatos feitos pelos usuários na landing page
tabela ads_reports // Número de visualização dos anuncio, cliques, buscas realizadas 
tabela account_plans // Para definição e criação dos planos e preços
a Tabela Matrix Items possui a regra key=value [value_int, value_float, value_string, value_datetime]
Adicionar Dark Mode Nativa para Temas e Modulos na Plataforma
Verificar o total de Imagens permitidas pelo conta
Bloquear e Validar tipos de arquivos
Permitir multiplos forms com o dropzone (Testar)
Finalizar por completo a Rota 'Conta':
Será necessário criar um rota na dash para as seguintes configurações
- Tempo máximo para validar a conta (Em minutos)
- Limite de tempo total para redefinição de senha de usuário (Em minutos)
- Define o level padrão de novos usuário não SUPERADMIN
- Limite de tempo total para validação do PIN SMS (Em minutos)



- -- Cadastre-se (Por e-mail)
/**********************************************************************
 * EMAIL CREATE - CRIANDO CONTA DE USUÁRIO COM A OPÇÕES DE 
 * VALIDAÇÃO POR EMAIL. A ACTION IRÁ ENVIAR UM EMAIL COM LINK DE CONFIRMAÇÃO
 * E DEPOIS REDIRECIONAR O USUÁRIO PARA CRIAÇÃO DA SENHA
 */
case 'account_create_email' em '_Modules/_account/actions/_CRUD'
Redirect 'validar-cadastro/sendlink/' // Cadastro efetuado agora so falta validar

- -- Login
/**********************************************************************
 * LOGIN DO USUÁRIO EM QUALQUE PARTE DA PLATAFORMA
 * BASTA SETAR OS METODOS QUE A CLASS SE ENCARREGA DE REDIRECIONAR
 * E MANDAR AS MENSAGENS CONRRESPONDENTES
 */
case 'account_login' em '_Modules/_account/actions/_CRUD'

- -- Confirmação: 
/**********************************************************************
 * VALIDATION - VERIFICA SE O USUÁRIO EXISTE E VALIDA SUA CONTA,
 * APÓS A VALIDAÇÃO REDIRECIONA PARA O LOGIN JÁ INSERINDO O 
 * EMAIL NO CAMPO E-MAIL E FOCUS NO CAMPO SENHA
 */ 
case 'account_validation_email' em '_Modules/_account/actions/_CRUD'
Redirect 'login/email base64/?m=success'    // Validou com sucesso
Redirect 'validar-cadastro/novalidate/'     // Não expirou, porém não validou
Redirect 'validar-cadastro/resendlink/'     // Expirou, então disponibiliza o botão reenviar link de confirmação
Redirect 'validar-cadastro/validaded/'      // Link já validado
Redirect 'validar-cadastro/nolink/'         // Link não existe



- -- Redefinição de Senha (Inclui o e-mail para mandar o link)
/**********************************************************************
 * REENVIA O CÓDIGO DE VALIDAÇÃO POR EMAIL.
 * NO CASO DE ATRASO OU O EMAIL NÃO TER SIDO DISPARADO
 * DA A POSSIBILIDADE DO USUÁRIO REENVIAR O LINK DE VALIDAÇÃO
 */
case 'account_password_redefine' em '_Modules/_account/actions/_CRUD'



- -- Redefinir Senha (Form para inserir a nova senha)
- -- Solicitação (Envia o E-mail de confirmação de cadastro)
- -- Validação de Cadastro (Recebe o link vindo do e-mail para validar o usuário)




# IMPLEMENTAR
__[added]__ Flip da Imagens no Painel Dropzone
__[added]__ Pensar em criar marca dagua antes do upload
__[added]__ Permitir que o usuário crie os nomes e se houver um nome repetido coloca '_2' no final do nome
__[added]__ Implementar configurações de Uploads, Ex.: Dimensão padrão das Novas imagens IMAGE_WIDHT = 650 e etc
__[added]__ Implementar loading="lazy" nativo
__[added]__ Implementar Semantci-Ui - https://semantic-ui.com/modules/dropdown.html##multiple-selection
__[added]__ Pensar em Incluir uma coluna em liloo_uploads para guadar o caminho tipo 'ROOT/uploads/' além do campo com a URL completa do arquivo. A ideia é se no futuro precisar de manutenção trocando todos os caminhos dos arquivos vamos ter esse possibilidade




ADICIONAR 
Endereço completo
avaliações feitas (Depois)
Ver numero de telefone (Esconder para medir)
descrição
link do site
e-mail
Cotação/Tabela de preços
Fotos
Video
Reservas e agendamentos (Ver nichos)
Delivery (Dados de entrega - Depois)  
Cupom de desconto por ser pela busque já
Ação de desconta na primeira compra


## Error:
__[added]__ Alteração do carregamento dos scripts para type="module" possibiltando importar arquivos

## Considerar:
- Incluir na API de localização as bandeiras dos países, estados, cidades e distritos
- Incluir na API de localização a Capital dos países e estados


















