<?php
/**
 * Controladora do Sistema de Pagamento - Transações
 * @copyright Felipe Oliveira Lourenço - 10.07.2020
 * @version 1.0.0
 */


// var_dump( $deviceSessionId = md5(session_id().microtime()) );
require_once PATH_MODULE.'payment/gateways/PayU/__config.inc.php';

// Instancia a Class Slim PayU
$Pay = new PayUSlim;

// echo 'Teste de conexão';
// var_dump( $Pay->ping() );

// echo 'Consulta por ID do Pedido';
// var_dump( $Pay->consultOrderID(478701946) );

// echo 'Consulta por código de referencia';
// var_dump( $Pay->consultReferenceCode('product001') );

// echo 'Consulta metodos de pagamentos disponíveis';
// var_dump( $Pay->getPaymentMethods() );

// echo 'Consulta resposta de uma transação pelo ID';
// var_dump( $Pay->consultTransaction('f4c12a5b-6fc5-4d37-976f-a79ac804ed45') );

echo 'Pagamento com Cartão de Crédito';

// Dados do Comprador{
$Buyer = [
  // "merchantBuyerId" => "pegar id de account_id",
  "fullName" => "Nome Completo do comprador",
  "emailAddress" => "email do comprador",
  "phone" => "(13)33023740 (Repetir onde for preciso)",
  "document" => "cpf ou cnpj",
  "street1" => "Endereço 1",
  "street2" => "Complemento do endereço",
  "city" => "Cidade",
  "state" => "Estado",
  "country" => "BR",
  "postalCode" => "11020-000",
  "phone" => "(13)33023740"  
];

// Informações do Cartão de Crédito
$InfoCard = [
   "number" => "5502092758590037",
   "securityCode" => "703",
   "expirationDate" => "2027/12",
   "name" => "FLAVIO L SERRAO"
];

$Extra = [
   'path_module' => PATH_MODULE,
   'base_module' => BASE_MODULES.'payment/',
   'this_route' => PATH_MODULE.'_routes/transactions/',
];

// var_dump($Extra)
var_dump(
   $Pay->pay(
      'pk_001', // item_code da tabela de Items (Código do produto ou serviço)
      '1',      // account_id ou buyer_account_id (Dados do Usuário Caso escolha usar os dados da conta ou cadastrar um novo usuário)
      [],       // Array com os dados do Cartão (Por enquanto ainda não tokenizado)
   )
);



//_tpl_fill($_Module['THIS_MODULE'].'_routes/transactions/transactions.tpl', $Extra, '');

// Boleto Bancário

$Array = '{
   "language": "es",
   "command": "SUBMIT_TRANSACTION",
   "merchant": {
      "apiKey": "4Vj8eK4rloUd272L48hsrarnUA",
      "apiLogin": "pRRXKOl8ikMmt9u"
      },
      "transaction": {
         "order": {
            "accountId": "512327",
            "referenceCode": "payment_test_00000001",
            "description": "payment test",
            "language": "es",
            "signature": "31eba6f397a435409f57bc16b5df54c3",
            "notifyUrl": "http://www.tes.com/confirmation",
            "additionalValues": {
               "TX_VALUE": {
                  "value": 100,
                  "currency": "BRL"
               }
               },
               "buyer": {
                  "fullName": "First name and second buyer  name",
                  "emailAddress": "buyer_test@test.com",
                  "dniNumber": "811.807.405-64",
                  "cnpj": "24.481.827",
                  "shippingAddress": {
                     "street1": "calle 100",
                     "street2": "5555487",
                     "city": "Sao paulo",
                     "state": "SP",
                     "country": "BR",
                     "postalCode": "01019-030"
                  }
               }
               },
               "type": "AUTHORIZATION_AND_CAPTURE",
               "paymentMethod": "BOLETO_BANCARIO",
               "paymentCountry": "BR",
               "expirationDate": "2014-05-08T00:00:00",
               "ipAddress": "127.0.0.1"
               },
               "test": false
            }';

            $Param = json_encode($Array);

            //var_dump($Array);