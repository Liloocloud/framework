<?php

$dadosFecharPedidoBoleto = [

    'email' => 'seu-email-pagseguro',
    'token' => 'seu-token-pagseguro',
    'paymentMode' => 'default',
    'paymentMethod' => 'boleto',
    'receiverEmail' => 'xandecar@hotmail.com',
    'currency' => 'BRL',
    'extraAmount' => '0.00',
    'itemId1' => '10',
    'itemDescription1' => 'Curso de phpoo',
    'itemAmount1' => '450.00',
    'itemQuantity1' => '1',
    'notificationURL' => 'http://asolucoesweb.com.br/retorno',
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
];

$query = http_build_query($dadosFecharPedidoBoleto);
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

var_dump($xml->paymentLink);
