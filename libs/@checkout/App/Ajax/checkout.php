<?php

$dadosFecharPedidoCartao = [
    'email' => 'seu-email-pagseguro',
    'token' => 'seu-token-pagseguro',
    'paymentMode' => 'default',
    'paymentMethod' => 'creditCard',
    'receiverEmail' => 'xandecar@hotmail.com',
    'currency' => 'BRL',
    'itemId1' => '10',
    'itemDescription1' => 'Curso de phpoo',
    'itemAmount1' => '450.00',
    'itemQuantity1' => '1',
    'extraAmount' => '0.00',
    'notificationURL' => 'seu-site-retorno',
    'reference' => 'REF123',
    'senderName' => 'Joao Carlos',
    'senderCPF' => '00852564988',
    'senderAreaCode' => '16',
    'senderPhone' => '33392082',
    'senderEmail' => 'c95605127596465779149@sandbox.pagseguro.com.br',
    'senderHash' => $_POST['hash'],
    'shippingAddressStreet' => 'rua de teste', //endereco de entrega
    'shippingAddressNumber' => '64', // numero da casa para entrega
    'shippingAddressComplement' => 'peto da torre', // complemento do endereco para entrega
    'shippingAddressDistrict' => 'santa clara', // bairro para endtrega
    'shippingAddressPostalCode' => '14811260', // cpf para entrega
    'shippingAddressCity' => 'Araraquara',
    'shippingAddressState' => 'SP',
    'shippingAddressCountry' => 'BRA',
    'shippingType' => '3',
    'shippingCost' => '0.00',
    'creditCardToken' => $_POST['tokenCartao'],
    'installmentQuantity' => $_POST['parcelas'], // quantidade de parcelas escolhida pelo cliente
    'installmentValue' => number_format($_POST['valorParcela'], 2, '.', ''),
    'noInterestInstallmentQuantity' => 4,// quantidade de parcelas sem juros, usad no maxInstallmentNoInterest
    'creditCardHolderName' => 'Joao Carlos Santos', //nome que esta no cartao
    'creditCardHolderCPF' => '00852564988',// cpf do dono do cartao
    'creditCardHolderBirthDate' => '26/02/1982', //data de nascimento do dono do cartao
    'creditCardHolderAreaCode' => '16' ,// codigo de area do dono do cartao
    'creditCardHolderPhone' => '33392082', // telefone do dono do cartao,
    'billingAddressStreet' => 'nome da rua', //nome da rua para a conta, geralmente é o mesmo do shipping
    'billingAddressNumber' => '64', // numero da casa, geralmente é igual o do shipping
    'billingAddressComplement' => 'perto da torre', // complemento do enereco, geralmente igual o do shipping
    'billingAddressDistrict' => 'Santa clara',
    'billingAddressPostalCode' => '14811260',
    'billingAddressCity' => 'Araraquara',
    'billingAddressState' => 'SP',
    'billingAddressCountry' => 'BRA'
];


    // 'itemId1' => '10',
    // 'itemDescription1' => 'Curso de phpoo',
    // 'itemAmount1' => '450.00',
    // 'itemQuantity1' => '1',

$query = http_build_query($dadosFecharPedidoCartao);
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
$retorno_transaction = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($retorno_transaction);
var_dump($retorno_transaction);
//dados para liberar ou nao o acesso ao produto, e tambem enviar email
//$referencia = $xml->reference;
$status = $xml->status;
//$email = $xml->sender->email;

echo $status;
