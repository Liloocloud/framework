

OBS.: O Interessante pode ser desenvolver o módulo de pagamento já integrado
com os pedido, um exemplo disso seria criar as rotas Shop, Pedidos, Transações
possibilitanto qualquer projeto integrar, afinal de contas, portais, imobiliárias,
e-commerces, EADs e etc. vão precisar de carrinho, pedidos e transações. Pense nisso!

Utilizar por padrão o novo Conceito (UC RD / CRUD invertido)
MVCODD (Model View Controller On-Demand Data) ou seja, padrão de 
projeto, porém zelando pelo demanda por requisição AJAX (Nativo)


Rotas do Módulo de Pagamento:
• Lista de transações CRUDS (Conceito UC - RD)
Listar todas as transações mostrando data da transação,
nome e email do usuário que completou a solicitação,
status da transação, em qual gateway foi realizada


• Lista de gateways instalador

• Lista de Pedidos

• 

=================
ABSTRAÇÃO DA API PayU

-- GET_PAYMENT_METHODS:
Lista todos os métodos de pagamentos disponíveis como: MasterCard,
ELO, Boleto Bancário, AMEX, DINERS e etc..

-- SUBMIT_TRANSACTION
Inicia uma transação de pagamento podendo ser o tipo de Transações:
--- "type": "CAPTURE" // Apenas Captura dos dados do cartão
--- "type": "AUTHORIZATION" // Apenas Autorização
--- "type": "AUTHORIZATION_AND_CAPTURE" // As anteriores
--- "type": "VOID" // Reverte uma transação previamente autorizada com cartão de crédito.






Incluir JSON para liberar os Gateways separadamente
parecido com o json que libera os módulos para uso na dashboard