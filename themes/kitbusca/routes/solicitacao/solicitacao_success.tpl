<div class="uk-background-bottom-left uk-background-cover uk-light" data-src="#uploads#orcamento-realizado-com-sucesso.jpg" uk-img style="min-height: 500px;">
	<div class="uk-container uk-container-small uk-text-center">
		<div uk-grid>
			<div class="uk-width-expand@m">
				<h1 class="uk-margin-large-top">Seu orçamento foi solicitado com sucesso!</h1>
				<p style="font-size: 22px" class="uk-margin-bottom">Vamos notificar os profisionais especializados e você poderá receber até 4 orçamentos</p>
				<hr>
				<p style="font-size: 18px">Deseja fazer outra solicitação?</p>
				#form_search#
			</div>
			<div class="uk-width-1-4@m"></div>
		</div>
	</div>
</div>

<div class="callback"></div>
<script>
	$('.alter_search').on('click', function(){
		$('.form_dig').show()
		$('.form_dig input[name="term"]').focus()
		$('.alter_term').show()
		$('.form_cat').hide()
		$('.alter_search').hide()
	})
	$('.alter_term').on('click', function(){
		$('.form_dig').hide()
		$('.alter_term').hide()
		$('.form_cat').show()
		$('.alter_search').show()
	})

	// LISTA CIDADES APÓS SELECIONAR ESTADO
	$('.select_groups').on('change', function(){
		var group = $(this).val();
		Flex.RequestServer(
			'list_service_per_group',
			'frontend/vamove/_php/Frontend',
			''+group+'',
			true
			)
	})
</script>