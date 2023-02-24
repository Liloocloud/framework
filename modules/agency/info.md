<!-- https://markdown.net.br/editor/ -->

## Módulo Agency

#### Variáveis do Módulo ("accounts.config.php")

| Variável        | Valor                                        | Descrição                                                             |
| :--------------- | :------------------------------------------- | :---------------------------------------------------------------------- |
| ICON             | `<i class="fas fa-user-circle"></i>`       | Ícone padrão em SVG                                                   |
| COVER            | modules/accounts/img/cover-dash.jpg          | Caminho da imagem de capa para uso na dashboard                         |
| USER_LEVEL_MIN   | 10 (Administrador)                           | Nível de permissão mínimo para uso do módulo._Valor inalterável_ |
| VERSION          | 2.0.0                                        | Versão atual do módulo instalado                                      |
| MODULE_ROOT      | `ROOT."modules/{$Namespace}/"`             | Caminho de máquina absoluto do módulo                                 |
| MODULE_BASE      | `BASE."modules/{$Namespace}/"`             | Caminho de URL absoluto do módulo                                      |
| DASH_ROUTES_ROOT | `ROOT."modules/{$Namespace}/dash/routes/"` | Caminho de máquina absoluto das rotas do módulo                       |
| DASH_ROUTES_BASE | `BASE."modules/{$Namespace}/dash/routes/"` | Caminho de URL absoluto das rotas do módulo                            |

#### Descrição

<hr>
Responsável pelas configurações, acesso e sessões da conta do usuário. Controla todo o fluxo de permissões dos usuário do sistema. Trabalha direto na manipulação e abstração da tabela "liloo_accounts". Faz a gestão de acessos e login no sistema. Possui API para permitir o consumo de terceiro. porém para isso é necessário possuir um chave token em "accounts/credentials/".

#### Rotas da Dashboard

<hr>

#### __1. accounts/users/__ - Usuários

__Card:__ Busca e listagem de usuário

- Formulário com input e botão para busca
- Tabela para o resultado da listagem apresentando o id, Nome e Documento, E-mail, Telefone/Whatsapp, Data de Registro e Ações excluir, ver detalhes e editar
- Paginação de resultados abaixo da tabela

__Modal:__ Detalhes do usuário (incluir Modal lateral com animação ou modal padrão)

- Informações da conta de usuário
- Incluir na mesma modal a alteração de senha (sendo permitido apenas pelo administrador ou maior)

#### __2. accounts/complete/__ - Rota padrão para projetos que necessitam completar os dados após o cadastro inicial

__Card:__  Personalizar de acordo com o projeto. Segue exemplo de dados:

- Nome fantasia da empresa
- Serviços que a empresa realiza
- Anamnese do usuário da conta

#### __3. accounts/single/__ - Rota de perfil do usuário

Rota que apresenta os dados apenas de um usuário. Ideal para sistemas grandes onde existe o controle de muitos usuários

__Card:__  Usuário

- Avatar ou foto de perfil
- Detalhes da conta
- Total de moedas "Coin"

__Card:__ Contatos

- E-mail de contato que irá aparecer no site
- Telefone
- Celular
- Whatsapp
- Mensagem padrão do Whatsapp
- Horário de funcionamento

__Guia:__ Localização

- Endereço (incluir o auto preencimento por CEP)
- Número
- Complemento
- CEP
- Cidade
- Bairro
- Estado

__Guia:__ Midias Sociais

- Facebook
- Instagram
- Youtube
- Linkedin

### Continuar o planejamento

<br>
<br>
<br>
