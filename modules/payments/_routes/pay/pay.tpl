

<h1>Iniciar os forms de pagamento</h1>
<div class="callback-flags"></div>

<script src="#base_module#payment.js" type="text/javascript"></script>
<script>

	// '5502 0927 5859 0037' MasterCard
	// '4716 8622 9974 9192' Visa
	// '3771 347302 38617' American Express | AMEX
	// '3020 051158 5317' Diners Club
	// '6011 8390 1359 0620' Discover
	// '6062 8262 3258 5869' HiperCard

	var flag = PaymentFlex.getCardFlag('6011 8390 1359 0620') 
	$('.callback-flags').html('<img src="#base_module#img/'+flag+'.png" width="80px">')

</script>