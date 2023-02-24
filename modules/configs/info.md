<!-- https://markdown.net.br/editor/ -->
## Módulo Configs

#### Variáveis do Módulo ("configs.config.php")
| Variável | Valor | Descrição |
| :- | :- | :- |
| ICON | `<i class="fas fa-cogs"></i>` | Ícone padrão em SVG  |
| COVER | modules/configs/img/cover-dash.jpg | Caminho da imagem de capa para uso na dashboard |
| USER_LEVEL_MIN | 9 (Gerente) | Nível de permissão mínimo para uso do módulo. _Valor inalterável_ |
| VERSION | 2.0.0 | Versão atual do módulo instalado |
| MODULE_ROOT | `ROOT."modules/{$Namespace}/"` | Caminho de máquina absoluto do módulo |
| MODULE_BASE | `BASE."modules/{$Namespace}/"` | Caminho de URL absoluto do módulo |
| DASH_ROUTES_ROOT | `ROOT."modules/{$Namespace}/dash/routes/"` | Caminho de máquina absoluto das rotas do módulo |
| DASH_ROUTES_BASE | `BASE."modules/{$Namespace}/dash/routes/"` | Caminho de URL absoluto das rotas do módulo |

#### Descrição
<hr>
Responsável pelas configurações necessárias do sistema. Lembrando que este módulo só será instalado no formato LilooCMS onde será feita uma instalação no servidor FTP que contém banco de dados. Já para o caso de plataformas SaaS o usuário não irá precisar mexer em configurações, isso ficará apenas para o Administrador

#### Rotas da Dashboard
<hr>

#### __1. configs/general/__ - Geral

__Guia:__ Configurações padrãos 
- Título do site
- Descrição
- E-mail do sistema
- Função padrão para novos usuário

__Guia:__ E-mail do administrador
- Servidor de e-mail
- Porta
- Nome de usuário (e-mail)
- Senha

__Guia:__  Notificações por e-mail
- Notificar a cada novo usuário cadastrado
- Notificar a cada pagamento realizado

__Guia:__  Conteúdo Importante
- Página de poítica de privacidade
- Página de termos de uso (Não obrigatório)

#### __2. configs/defines/__ - Variáveis

__Guia:__  Variáveis do Sistema
- Tempo máximo da sessão do painel dashbord em minutos
- Número máximo de itens das buscas e paginações de resultados do banco
- Tamanha padrão da imagem miniatura (L x A)
- Tamanha padrão da imagem média (L x A)
- Tamanha padrão da imagem grande (L x A)

#### __3. configs/contacts/__ - Contatos
Rota para gerenciamento de informações de contatos a atendimento que são apresentados no site (front-end)

__Guia:__ Atendimento
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

<br>
<br>
<br>