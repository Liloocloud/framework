<?php

//enviando post para o pagseguro para receber o id da sessao

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=xandecar@hotmail.com&token=FF579CC8863549A783664FDC85657678';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST,1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$retorno_transaction = curl_exec($curl);
curl_close($curl);
$session = simplexml_load_string($retorno_transaction);
echo json_encode($session);
