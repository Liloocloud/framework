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


	<button class="enviar">Enviar</button>
</form>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- LIB PagSeguro -->
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

<!-- Custom Module -->
<script>

/**
 * Envia o formulário iniciando as operações
 */
$('.enviar').on('click', function(e){
	e.preventDefault();

    $.ajax({
        type: 'POST',
        //dataType : 'json',
        url: 'initSession.php',
        processData: false,
        contentType: false

    }).done(function (data) {
        $(".callback").html(data);
        console.log(data);
        
        // Inicia a Sessão
        PagSeguroDirectPayment.setSessionId(data);

        PagSeguroDirectPayment.getBrand({
		    cardBin: 627780,
		    success: function(response) {
		    	//bandeira encontrada
		      	console.log(response['brand']['name']);
		    },
		    error: function(response) {
		    	//tratamento do erro
		      	//console.log(response);
		    }
		    // ,complete: function(response) {
		    //   console.log(response);
		    // }
		});

    });

});
</script>




