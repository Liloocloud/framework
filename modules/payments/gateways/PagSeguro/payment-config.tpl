<?php
?>
<form method="POST">

	<input type="hidden" name="currency" value="BRL">
	
	<input type="hidden" name="itemId1" value="0001">
	<input type="hidden" name="itemDescription1" value="Produto PagSeguroI">
	<input type="hidden" name="itemAmount1" value="50.00">
	<input type="hidden" name="itemQuantity1" value="1">
	<input type="hidden" name="itemWeight1" value="1000">

	
	<input type="hidden" name="reference" value="REF1234">
	<input type="hidden" name="senderName" value="Felipe Oliveira">
	<input type="hidden" name="senderAreaCode" value="13">
	<input type="hidden" name="senderPhone" value="982015093">
	<input type="hidden" name="senderEmail" value="felipe.game.studio@gmail.com">
	
	<input type="hidden" name="shippingType" value="1">
	<input type="hidden" name="shippingAddressRequired" value="true">
	<input type="hidden" name="shippingAddressStreet" value="Av. Afonso Pena">
	<input type="hidden" name="shippingAddressNumber" value="206">
	<input type="hidden" name="shippingAddressComplement" value="Sala 11">
	<input type="hidden" name="shippingAddressDistrict" value="Embaré">
	<input type="hidden" name="shippingAddressPostalCode" value="11020-000">
	<input type="hidden" name="shippingAddressCity" value="Santos">
	<input type="hidden" name="shippingAddressState" value="SP">
	<input type="hidden" name="shippingAddressCountry" value="BRA">
	<input type="hidden" name="timeout" value="25">
	<input type="hidden" name="enableRecover" value="false">


	<button type="submit">Enviar</button>
</form>


<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script>

/**
 * Obtem o número da sessão gerada, para permitir o acesso a
 * api do pagseguro (Usando JavaScript)
 */
PagSeguroDirectPayment.setSessionId();



/**
 * Esse método recebe opcionalmente o valor da transação e retorna um JSON contendo os meios de
 * pagamento disponíveis, compatíveis com o valor informado. Caso não seja informado o valor, será 
 * retornado todos os meios de pagamento.
 */
PagSeguroDirectPayment.getPaymentMethods({
	amount: 500.00,
	success: function(response) {
	    // Retorna os meios de pagamento disponíveis.
	    console.log(response['paymentMethods']);
	},
	error: function(response) {
	    // Callback para chamadas que falharam.
	    console.log(response);
	}
	// ,complete: function(response) {
	//     // Callback para todas chamadas.
	//     console.log(response);
	// }
});


/**
 * O senderHash é um identificador com os dados do comprador baseado naquela 
 * determinada sessão, garantindo a segurança da venda.
 * Obrigatório para todos os meios de pagamento.
 */
PagSeguroDirectPayment.onSenderHashReady(function(response){
    if(response.status == 'error') {
        console.log(response.message);
        return false;
    }
    //Hash estará disponível nesta variável.
    var hash = response.senderHash; 
    console.log(hash);
});


/**
 * Retorna qual bandeira de cartão esta sendo utilizada,
 * neste caso basta informar os 6 primeiros digitos do cartão,
 * que o método "getBrand" retorna o nome da bandeira
 */
PagSeguroDirectPayment.getBrand({
    cardBin: 627780,
    success: function(response) {
    	//bandeira encontrada
      	console.log(response['brand']['name']);
    },
    error: function(response) {
    	//tratamento do erro
      	console.log(response);
    }
    // ,complete: function(response) {
    //   console.log(response);
    // }
});


/**
 * Você deve utilizar este método caso queira apresentar as opções de 
 * parcelamento disponíveis ao comprador. Esse método recebe o valor total 
 * a ser parcelado e retorna as opções de parcelamento calculadas de acordo 
 * com as configurações de sua conta.
 */
PagSeguroDirectPayment.getInstallments({
        amount: 118.80, // Valor a ser parcelado
        maxInstallmentNoInterest: 6, // Quantidade maxima de parcelas permitidas
        brand: 'elo', // Cartão permitido para o parcelamento
        success: function(response){
       	    // Retorna as opções de parcelamento disponíveis
       	    console.log(response);
       },
        error: function(response) {
       	    // callback para chamadas que falharam.
       	    console.log(response);
       }
       // ,complete: function(response){
       //      // Callback para todas chamadas.
       // }
});



/**
 * O método createCardToken utiliza os dados do cartão de crédito 
 * para gerar um token que será enviado para o checkout, pois por motivos 
 * de segurança os dados do cartão não são enviados diretamente na chamada
 */
PagSeguroDirectPayment.createCardToken({
   cardNumber: '4111111111111111', // Número do cartão de crédito
   brand: 'visa', // Bandeira do cartão
   cvv: '013', // CVV do cartão
   expirationMonth: '12', // Mês da expiração do cartão
   expirationYear: '2026', // Ano da expiração do cartão, é necessário os 4 dígitos.
   success: function(response) {
        // Retorna o cartão tokenizado.
        console.log(response);
   },
   error: function(response) {
		// Callback para chamadas que falharam.
		console.log(response);
   }
   // ,complete: function(response) {
   //      // Callback para todas chamadas.
   // }
});
</script>