## PAG SEGURO ##
Formulario de pagamento
Campos Genéricos para todos os gatways de pagamento:
--------------------------------------------------------
## Campos de autenticação
input name="receiverEmail" = Seu e-mail no pagseguro
input name="currency" = Moeda (Dado em sigle) no caso BRL
--------------------------------------------------------
## Dados do Comprador (Obrigatórios):
input name="senderName" = Nome do Comprador
input name="senderAreaCode" = Código de Área DDD
input name="senderPhone" = Telefone
input name="senderEmail" = E-mail do comprador
--------------------------------------------------------
## Informações dos produtos/serviços (ao menos um item é obrigatório):
OBS.: Para mais de um produto, basta adicionas o número 2, 3, 4 e assim sucessivamente.
input name="itemId1" = ID do produto
input name="itemDescription1" = Descrição
input name="itemAmount1" = Preço (Ex.: (float) 48.00)
input name="itemQuantity1" = Quantidade
input name="itemWeight1" = Peso
--------------------------------------------------------
## Informações de Frete: (Opcionais)
input name="shippingType" = (Verificar o que significa)
input name="shippingAddressPostalCode" = CEP
input name="shippingAddressStreet" = Endereço
input name="shippingAddressNumber" = Número
input name="shippingAddressComplement" = Complemento
input name="shippingAddressDistrict" = Bairro
input name="shippingAddressCity" = Cidade
input name="shippingAddressState" = Estato
input name="shippingAddressCountry" = País (Dado em Sigla) no caso BRA
--------------------------------------------------------
## Código de referencia na FLEXAPP (Opcional):
input name="reference" = Referencia que será armazenada no sistem e no pagseguro
--------------------------------------------------------

[DICA]: Crie uma tabela de pedidos para armazenar os itens em um carrinho,
depois de armezanado pegue as informações do pedido, assim como seus itens,
depois povoe o formulário de pagamento, não esquecendo de fazer um foreach nos
itens do pedido alimentando os input do formulário correspondentes à informações
do produto

[SQL da tabela de pedidos]:
CREATE TABLE IF NOT EXISTS `flex_payment_orders` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_account_id` bigint(20) DEFAULT NULL,
  `order_name` varchar(150) DEFAULT NULL,
  `order_phone` varchar(150) DEFAULT NULL,
  `order_whatsapp` varchar(150) DEFAULT NULL,
  `order_email` varchar(255) DEFAULT NULL,
  `order_how` longtext,
  `order_type` varchar(150) DEFAULT NULL,
  `order_activity` varchar(150) DEFAULT NULL,
  `order_document` varchar(30) DEFAULT NULL,
  `order_company` varchar(150) DEFAULT NULL,
  `order_zipcode` varchar(15) DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `order_number` varchar(15) DEFAULT NULL,
  `order_complement` varchar(80) DEFAULT NULL,
  `order_city` varchar(150) DEFAULT NULL,
  `order_district` varchar(150) DEFAULT NULL,
  `order_estate` varchar(150) DEFAULT NULL,
  `order_country` varchar(150) DEFAULT NULL,
  `order_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--------------------------------------------------------

• Informações do comprador (flex_account)
  -- Se o usuário não estiver logado ou não tiver cadastro, é preciso
  primeiro requisitar o login ou cadastro do mesmo

• Informações extras do comprador (flex_account_options) 
  -- Lembrando que informações de endeço, data de nascimento e outras informações
  adicionais a tabela padrão do usuário são armazenadas em "flex_account_opitons"
  dada pela coluna "options_values" referenciada pela coluna "options_meta". Com isso
  você fica livre para armazenar qualquer informação do usuário pertinente ao seu projeto 

• Itens do pedido (flex_payment_orders)
  -- Nessa etapa é indiferente se o usuário esta ou não logado, pois
  os itens do pedido devem ir para o carrinho normalmente, sendo apenas
  requisitado o login quando o usuário finalizar a compra

• Informações da transação (tb flex_payment_trasations)
  -- Nessa etapa o usuário e o vendedor são notificados, e também acompanham
  o status da transação, se aguardando pagamento, cancela, aprovado e etc. Lembrando
  que o id da transação deve fazer referencia aos itens do carrinho e ao usuário que
  realizou a compra, dessa forma será possível emitir relatórios alinhados

--------------------------------------------------------

## ALGORITMO PARA INTEGRAÇÃO PAG SEGURO

---

1. Iniciar uma sessão de pagamento:
Faça um requisição via POST através do formulário
utilizando PHP ou JavaScript para:

SANDBOX
https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email={{email}}&token={{token}}
Lembre-se de usar o token sandbox nesse link

PRODUTION
https://ws.pagseguro.uol.com.br/v2/sessions?email={{email}}&token={{token}}
Lembre-se de usar o token de produção nesse link

OBS.: subistitua {{email}} pelo email de login do pagseguro e
{{token}} pelo token fornecido em: https://sandbox.pagseguro.uol.com.br/vendedor/configuracoes.html
para Sandbox e para Produção em: https://pagseguro.uol.com.br/preferencias/integracoes.jhtml 

Após mandar o POST, será retornado o ID da Sessão no PagSeguro
como identificador (hash) 

---

2. Agora vamos precisar importar a Bibliotéca Javascript que contem todos 
os recursos do pagseguro dados pelo objeto "PagSeguroDirectPayment" que é
uma interface de acesso aos métodos 

Métodos fornecidos pelo Javascript do Pagseguro:
Os Valores de retorno irão compro as informações
necessárias para realizar o checkout transpente,
e os Métodos são:

2.1. PagSeguroDirectPayment.setSessionId();
Obtem o número da sessão gerada, para permitir o acesso a
api do pagseguro (Usando JavaScript)

2.2. PagSeguroDirectPayment.getPaymentMethods();
Com este método você pode obter todos os meios de 
pagamento disponíveis para sua conta.

2.3. PagSeguroDirectPayment.onSenderHashReady();
senderHash é um identificador com os dados do comprador
para garandir a segurança das informações

2.4. PagSeguroDirectPayment.getBrand();
É utilizado para verificar qual a bandeira do cartão que está sendo digitada. 
Esse método recebe por parâmetro o BIN (seis primeiros dígitos do cartão) e retorna dados como qual a bandeira, o tamanho do CVV, se possui data de expiração e qual algoritmo de validação

2.5. PagSeguroDirectPayment.getInstallments();
Você deve utilizar este método caso queira apresentar as opções de 
parcelamento disponíveis ao comprador

2.6. PagSeguroDirectPayment.createCardToken();
O método createCardToken utiliza os dados do cartão de crédito 
para gerar um token que será enviado para o checkout, com isso
garante a segurança das informações

---

3.Agora você poderá efetuar chamadas aos meios 
de pagamento que o Checkout Transparente oferece

[O QUE É ENDPONT ?]:
São as informações a serem enviadas via query string, que podem 
ser enviadas de um formulário HTML, ou através de cURL do PHP e JavaScript.

[IMPORTANTE]: As chamadas para os meios de pagamento do Checkout Transparente 
deverão ser efetuadas para o endpoint abaixo utilizando o método POST:

[LINK]:
https://ws.sandbox.pagseguro.uol.com.br/v2/transactions?{{credenciais}}
Deve ser enviado via POST

Conheça cada um dos métodos abaixo:

3.1. Boleto
[ENDPOINT]:

paymentMode=default
&paymentMethod=boleto
&receiverEmail=suporte@lojamodelo.com.br
&currency=BRL
&extraAmount=1.00
&itemId1=0001
&itemDescription1=Notebook Prata
&itemAmount1=24300.00
&itemQuantity1=1
&notificationURL=https://sualoja.com.br/notifica.html
&reference=REF1234
&senderName=Jose Comprador
&senderCPF=72962940005
&senderAreaCode=11
&senderPhone=56273440
&senderEmail=comprador@uol.com.br
&senderHash={hash_obtido_no_passo_2.3}
&shippingAddressRequired=true
&shippingAddressStreet=Av. Brig. Faria Lima
&shippingAddressNumber=1384
&shippingAddressComplement=5o andar
&shippingAddressDistrict=Jardim Paulistano
&shippingAddressPostalCode=01452002
&shippingAddressCity=Sao Paulo
&shippingAddressState=SP
&shippingAddressCountry=BRA
&shippingType=1
&shippingCost=1.00

3.2. Débito Online
[ENDPOINT]:

paymentMode=default
&paymentMethod=eft
&bankName=itau
&receiverEmail=suporte@lojamodelo.com.br
&currency=BRL
&extraAmount=1.00
&itemId1=0001
&itemDescription1=Notebook Prata
&itemAmount1=24300.00
&itemQuantity1=1
&notificationURL=https://sualoja.com.br/notifica.html
&reference=REF1234
&senderName=Jose Comprador
&senderCPF=22111944785
&senderAreaCode=11
&senderPhone=56273440
&senderEmail=comprador@uol.com.br
&senderHash={hash_obtido_no_passo_2.3}
&shippingAddressRequired=true
&shippingAddressStreet=Av. Brig. Faria Lima
&shippingAddressNumber=1384
&shippingAddressComplement=5o andar
&shippingAddressDistrict=Jardim Paulistano
&shippingAddressPostalCode=01452002
&shippingAddressCity=Sao Paulo
&shippingAddressState=SP
&shippingAddressCountry=BRA
&shippingType=1
&shippingCost=1.00

3.3. Cartão de Crédito
[ENDPOINT]:

paymentMode=default
&paymentMethod=creditCard
&receiverEmail=suporte@lojamodelo.com.br
&currency=BRL
&extraAmount=1.00
&itemId1=0001
&itemDescription1=Notebook Prata
&itemAmount1=24300.00
&itemQuantity1=1
&notificationURL=https://sualoja.com.br/notifica.html
&reference=REF1234
&senderName=Jose Comprador
&senderCPF=22111944785
&senderAreaCode=11
&senderPhone=56273440
&senderEmail=comprador@uol.com.br
&senderHash={hash_obtido_no_passo_2.3}
&shippingAddressRequired=true
&shippingAddressStreet=Av. Brig. Faria Lima
&shippingAddressNumber=1384
&shippingAddressComplement=5o andar
&shippingAddressDistrict=Jardim Paulistano
&shippingAddressPostalCode=01452002
&shippingAddressCity=Sao Paulo
&shippingAddressState=SP
&shippingAddressCountry=BRA
&shippingType=1
&shippingCost=1.00
&creditCardToken={creditCard_token_obtido_no_passo_2.6}
&installmentQuantity={quantidade_de_parcelas_escolhida}
&installmentValue={installmentAmount_obtido_no_retorno_do_passo_2.5}
&noInterestInstallmentQuantity={valor_maxInstallmentNoInterest_incluido_no_passo_2.5}
&creditCardHolderName=Jose Comprador
&creditCardHolderCPF=22111944785
&creditCardHolderBirthDate=27/10/1987
&creditCardHolderAreaCode=11
&creditCardHolderPhone=56273440
&billingAddressStreet=Av. Brig. Faria Lima
&billingAddressNumber=1384
&billingAddressComplement=5o andar
&billingAddressDistrict=Jardim Paulistano
&billingAddressPostalCode=01452002
&billingAddressCity=Sao Paulo
&billingAddressState=SP
&billingAddressCountry=BRA

--------------------------------------------------------

Requisitos para integração:

Credenciais:

Link de Produção:
https://ws.pagseguro.uol.com.br/{{api-endpoint}}?email={{email}}&token={{token}}

Link de Sandbox:
https://ws.sandbox.pagseguro.uol.com.br/{{api-endpoint}}?email={{email}}&token={{token-sandbox}}

OBS.: EMm {{api-endpoint}} você pode incluir
o endpoint da API correspondente, como por exemplo:
 api de boleto, api de cartão de créditos, api de débito
 e etc

----------------------------------------------------------

Link de Produção: Venda
POST https://ws.pagseguro.uol.com.br/v2/checkout?{{credenciais}}

Link de Sandbox: Venda
POST https://ws.sandbox.pagseguro.uol.com.br/v2/checkout?{{credenciais}}


Erros
 
HTTP 401 – Unauthorized
Ocorre quando sua aplicação encaminhou uma credencial invalida ou inexistente.

HTTP 403 – Forbidden
Ocorre quando sua conta ou aplicação não tem permissão para utilizar o serviço.

HTTP 405 – Method Not Allowed
Ocorre quando sua aplicação efetuou a chamada utilizando um método não esperado. Neste caso verifique se o método da chamada é GET , POST ou PUT.

HTTP 415 – Cannot consume content type
Ocorre quando não é encaminhado o Content-Type na chamada.

HTTP 400 – Bad Request
Ocorre quando um ou mais dados foram encaminhados de forma incorreta ou fora do padrão. Este retorno possui um JSON ou XML no corpo da mensagem que identifica quais os erros presentes na chamada, no retorno sempre terá um código e uma mensagem descrevendo o erro.

Tipo de Retorno:
<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>
<errors>
    <error>
        <code>Error Code</code>
        <message>Error Description</message>
    </error>
</errors>

{
  "error": true,
  "errors": {
    "error-number": "error description."
  }
}