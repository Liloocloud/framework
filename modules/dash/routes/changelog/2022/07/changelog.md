### [01.07.2022] 
__[added]__ Implementando HAML na renderização da tpl
```php
require_once ROOT.'_Kernel/Libs/mthaml/vendor/autoload.php';
$haml = new MtHaml\Environment('php');
$executor = new MtHaml\Support\Php\Executor($haml, array(
    'cache' => sys_get_temp_dir().'/haml',
));

$HTML = $executor->render($This[$Module]['ROUTES_ROOT'].'complete/complete.haml', array(
	'var' => 'value',
));

_tpl_fill(
	$HTML,
	$Extra,
	'',
	true
);
```
__[added]__ Incluindo sistema de notificação na dasboard "admin/inc/topbar.php"
__[added]__ Ajustando CSS da dashboard
__[added]__ 
__[added]__
__[added]__


### [04.07.2022] 
__[added]__ Criando tabela nativa de notificações. "liloo_notifications"
__[added]__ Class Básica para manipulação das notificações
__[added]__ Ajustando as notificações na dashboard
__[added]__ Criando o JS do painel admin nativo (JS especifico para a dashboard)
__[added]__ Ficou faltando alguns metodos da Class\Notifications 
__[added]__ Criando a interface de porta/userpage (Demorado)
__[added]__ Modelagem da table liloo_portal_userpage

### [05.07.2022] 
__[added]__ Continuando a interface de porta/userpage (Demorado)
__[added]__ Criando class para maninupar a table portal_userpage

### [06.07.2022] 
__[added]__ Continuando a interface de porta/userpage (Demorado)

### [07.07.2022] 
__[added]__ Continuando a interface de porta/userpage (Demorado)

### [08.07.2022] 
__[added]__ Continuando a interface de porta/userpage (Demorado)
__[added]__ Montando a lógica para incluir os widgets na panding page
__[added]__ Error: Manipulando o type da tag script de text/javascript para module no arquivo inc/script especifico das rotas

### [09.07.2022] Sábado
__[added]__ Estudando Javascript
__[added]__ Criando um estudo na pasta "estudos/one" para usar module "import" para componentização
__[added]__ A interação com o Framework Ionic ficou boa e foi compatível até aqui.
__[added]__ Início da criação de componentes Ionic para Web HTML com "props"

### [11.07.2022] 
__[added]__ Modelando a tabela liloo_portal_userpage_adds
__[added]__ Construindo o widgets em "portal/userpage/widgets/"
__[added]__ Criando recurso lilooV3.Simple() para requisições simples onde retornam JSON direto (Ideal para dados internos)
```js
/**
 * Realiza requisições simples sem data "Body" (sem enviar dados)
 * apenas espera o retorno
 */
Simple: (Obj) => {
	fetch(lilooV3.Root() + Obj.path + '.php', {
		method: "POST",
		mode: "cors",
		cache: "no-store",
		headers: {
			"Content-Type": "application/json; charset=UTF-8"
		}
	})
	.then( response => response.json() )
	.then( data => Obj.success(data) )
	.catch( error => console.error('Error: ', error) )
}
```
__[added]__ Incluindo o recurso de script por module em "admin/inc/doctype"
__[added]__ Continuando a interface de porta/userpage (Demorado)

### [13.07.2022] 
__[added]__ Corrigindo o Dropzone
__[added]__ Continuando a interface de porta/userpage (Demorado) Voltando ao padrão visual anterior

### [14.07.2022] 
__[added]__ Criando a página do usuário na front-end para ter referencia 

### [15.07.2022] 
__[added]__ Mexendo no layout do projeto busquejá com scss/style
__[added]__ Criando alguns banner de categorias 
__[added]__ Nova coluna na tabela taxonomies inclundo o campo 'tax_images'
__[added]__ Alimentando a tabela manualmente para visualizar no banner da front-end
__[added]__ Incluindo style.css da rota mesmo se a URL for vazia em "home"

### [19.07.2022] 
__[added]__ Iniciando prototipagem do layout da front-end da Busquejá - Figma

### [20.07.2022] 
__[added]__ Ajustando a class Template/Fill 
__[error]__ Tentando construir o lance de Shortcode incluindo if, for, foreach e function nativo na tpl
```php
$T = new Template\Fill(ROOT_THEME_ROUTES.'home/test.tpl');
var_dump(
    $T->loop('test'), // Retorna o conteúdo do nó para povar
    // $T->render(), // Renderiza todo o conteúdo
    $T->over()
);
```
__[added]__ Continuando rota "home" frontend busquejá
__[added]__ Ajustando carregamento do script home

### [25.07.2022] 
__[added]__ Analisando o autocomplete do buscador principal em https://tarekraafat.github.io/autoComplete.js

### [26.07.2022] 
__[added]__ Continuando AutoComplete.JS (Finalizado as 18 horas)
__[added]__ Liberando a Api "locations/cities" para uso no buscador
__[added]__ Tentando incluir modulo.js (Pensando em deixar nativo a pasta "inc" dos themes, assim não precisa ficar atualizando)

### [27.07.2022] 
__[added]__ Completando a API "locations/cities" 
__[added]__ Iniciando Implementação do OpenStreetMap (OSM) como Recurso na Liloo em "assets/osm"

### [29.07.2022] 
__[added]__ Continuando implementação do OpenStreetMap (OSM) como Recurso


### [01.08.2022] 
__[added]__ Incio do Planajemento completo da Busque Já

### [02.08.2022] 
__[added]__ Continuando o Planajemento da Busque Já

### [03.08.2022] 
__[added]__ Prototipando a Busque Já para facilitar o desenvolvimento da Frontend, pois no prototipo as ideias surgem mais rápido

### [04.08.2022] 
__[added]__ Continuando a prototipação do Busque já

### [05.08.2022] 
__[added]__ Continuando o planajamento completo da Busque já
__[added]__ Continuando implementação do OpenStreetMap (OSM) como Recurso

### [06.08.2022] Sábado
__[added]__ Iniciando a implementação da Api do Google Maps (Marker Cluster) ver em assets/googlemaps/
__[added]__ Adicionando GeoCode juntamento com o GoogleMaps (Estudando implementação)

Pensar em não ser gratuito e, podemos cadastrar por um período 
algumas empresas que achamos ser interessantes para atrair publico. A ideia é
fazer com que outros potenciais anunciantes vejam seus concorrentes no portal
e passam a investir também

### [08.08.2022] 
__[added]__ Desenvolvendo a Rota Home
__[added]__ Ajustando tabela dos Ads

### [09.08.2022] 
__[added]__ Finalizando o buscador com os filtros 
__[added]__ Ajustando @assets/autocomplete com outros recursos para usar em mais de um elemento
__[added]__ Ajuste CSS utilizando SASS
__[added]__ Terminar o Home do projeto Busque Ja
__[added]__ Adicionando o campoa "tax_type" para tipagem das categorias. Ideal para indicar se é produto ou serviço
__[added]__ ajusta ajax para incluir "tax_type"
__[added]__ "all, Serviços, Produtos, Freelancers, Empresas, Profissionais, Organizações"
__[added]__ Recriando e alimentando as categorias do Portal separando por Macro Categorias, tipagem e categoria 

Uma ideia legal é criar um botão de "Elogiar" para servir de estimulo para as
empresas e profissionais

### [10.08.2022] 
__[added]__ Continuando Home 
__[added]__ Movendo arquivos e organizando as pastar do projeto busque ja
__[added]__ Backup da Rota Home
__[added]__ Mexendo do topo (menu) do site busque já (Pensando Mobile também) e para todo o site
__[added]__ 


_tpl_fill(ROOT_THEME.'tpl/search/search-header.tpl', $Extra);
https://www.youtube.com/watch?v=gkmR6tHWg80

### [12.08.2022] 
__[added]__ Continuando Home ajustando SCSS 
__[added]__ Criando Menu OffCanva
__[added]__ Ajustando Top da Home Mobile
__[added]__ Menu top 
__[added]__ Ajustes final para fixação do menu ao rolar a página
__[added]__ 

### [15.08.2022] 
__[added]__ Continuando a Home (Ver plano de ação no trello)
__[added]__ Organizando no trello o projeto do busqueja 
__[added]__ Finalizando a Home

### [16.08.2022] 
__[added]__ Continuando o plano de ação da Home

### [17.08.2022] Tarde
__[added]__ Continuando o plano de ação da Home
__[added]__ Mapeando as Tabelas da Liloo definitivamente. Isso para organizar o sistema e mantar atualizado

### [22.08.2022]
__[added]__ Construir um instalador simples para o projeto de nicho Zamar
__[added]__ 
__[added]__
__[added]__


***************************************************************************

***************************************************************************
Senha luxor
felipeoliveira
hm0P$5azP!Latw(&(Wm&OG6B
***************************************************************************
Cartório Garcia
painel / cg2007beegray
beegray
M7F#E3@zL9E7#P1R7tD(tOq8Oyusjf70gde4EJlA@PCsV97p
***************************************************************************





***************************************************************************
• Ao incluir o sistema de pontos os anuncios terão suas pontuações marcadas, sendo assim existe a possibilidade de realizar a busca filtrando pelo classificação das empresas e profissionais

• Tentar foca em botões nos anuncios, igual ao guiafacil.com 

• Sistema de desconto ao ligar ou mandar mensagem. A ideia é indicar que o anunciante está tendo retorno na Busque Já, isso irá garantir que o anunciante tenha entrado no programa de desconto e o usuário irá confirmar ao indicar um código, pode ser da seguinte forma: em "ver telefone" após clicar mostar mensagem:
- "Ao ligar diga que viu no Busque Já" (Simples, mas não significa nada)
- "Quer desconto? Ao contatar a empresa informa o código E1557 e Diga que viu na busque já" (Interessante)
- Entre outras

• Nome interessanto - https://guiame.com.br/

• Sistema com o nome Guia Odonto focado em soluções para odontologia, porém não
possui site para alavançagem de vendas
https://guiaodonto.com/

• Sistema focado em guiar por cidade. Pode ser uma ideia implementar
busca por cidade e mostrar tudo daque cidade, incluindo a infraestrutura da cidade como:
principais restaurantes, hotéis, entretenimento, hospitais e etc. Sem contar que podemos também
mostrar fotos da cidade, fomentando e organizando para que os usuários possam ter uma visão minimalista da cidade

https://guiacidade.com.br/






***************************************************************************

Anti Self-XSS e outros (Prevenir)
https://imasters.com.br/devsecops/5-formas-para-prevenir-os-ataques-xss


https://tarekraafat.github.io/autoComplete.js

images/categories/engenharia/004-engenheria-e-construcao.jpg
images/categories/engenharia/005-engenheria-e-construcao.jpg

https://apipass.com.br/


https://www.houzz.com/photos/home-design-ideas-phbr0-bp~
https://www.yelp.com.br/s%C3%A3o-paulo
https://managewp.com/

sass --watch scss:css --no-source-map --style expanded

***************************************************************************
> IDEIAS
- Permitir que pessoas (usuários) façam uploads de arquivos para a geleria do anunciante. Esses fotos serão 
moderadas pelo anunciante. A grande ideia é permitir que o anunciante obtenha bastante conteúdo, além disso, 
servirá como uma forma de depoimento. Lembrando que o anunciante poderá enviar um link de solicitação ao seu 
usuários. Um exemplo disso, você vai a um restautante e come uma comida maravilhosa, então de repente tira um foto 
e posta em suas redes sociais. Todos fazem isso quase que instintivamente, porém essas fotos podem te gerar descontos 
no pagamento ou pontos fidelidade se você postar na página do restaurante dentro da busqueja. Seria uma espécie 
de troca onde você tira a foto com seu smartphone post e em troca ganha algo

- O banner de entrado pode ser randomico 

- Tentar fazer algo profissional parecido visualmente com 
https://www.yelp.com.br/s%C3%A3o-paulo 



***************************************************************************

# o Loader não está funcionando em nenhum dos formulários de cadastro

# No form para inserir o código de validaçao não está dando focus. Pensar em talvez, incluir os passar em rotas al invés do efeito de mudar de formulário por switcher do Uikit. Isso além de ser mais limpo para a manutenção do código, também vai ajudar no SEO para saber quantos usuarios estão chegando na página de obrigado

# Deixar todos os formulários alinhada a esquerda no desktop e centralizados no mobile


https://www.behance.net/gallery/57401147/Banking-concept?tracking_source=project_owner_other_projects

>>>>> CORREÇÕES
***********************************************************************
- Mudar a nomenclatura das tabelas 'liloo_ads' para liloo_portal_ads, liloo_portal_userpage e etc
- Organizar as tabelas da liloo correspondente a cadas modulo
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
