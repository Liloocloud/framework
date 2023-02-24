# Módulo Shop
Módulo de loja virtual
- Versão 1.0.0 
- Copyright - Felipe Oliveira Lourenço

## Acoplamento:
- lilooCloud V5
- lilooJS V3
- Módulo "Taxonomies" para registro das categorias
- Módulo "Payments"

## Rotas do módulo

### categs
Gestão de categoria dos produtos
- Actions:
- -- 





- products      // Gestão dos produtos da loja
- manager       // Manutenção da loja (trocar para configurações)
- reports       // Reletório geral

## Ações AJAX - case: action

Essenciais
- delete/client/id  // Deleta cliente pelo ID passado juntamente com o ID da sessão atual 
- get/client/id     // Retorna o cliente pelo ID passado juntamente com o ID da sessão atual
- get/clients       // Retorna uma lista de cliente pelo ID da sessão atual
- update/client/id  // Atualiza as informações do cliente pelo ID passado juntamente com o ID da sessão atual
- create/client/    // Cria um novo cliente adicionando o ID da sessão atual

Adicionais
- send/message/whatsapp/client      // Salva a mensagem e envia para o whatsapp do cliente
- send/email/client                 // Salva a mensagem e envia ao cliente pelo e-mail do cliente cadastro 

## Recursos
- Cadastro de cliente simples
- Visualização dos detalhes em modal full
- Opção de editar cliente
- Lista de busca por codigo, nome, endereço, e-mail ou whatsapp
- Opção de excluir o cliente no painel modal full

## Recursos futuros



