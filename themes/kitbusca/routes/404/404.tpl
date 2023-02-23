<div style="background-color: #052847">
	<div class="uk-flex uk-flex-center uk-background-cover uk-background-bottom-center uk-light" data-src="#BASE_UPLOADS#404.jpg" uk-img style="min-height: 600px;">
	</div>
	<div class="uk-container uk-text-center uk-container-small uk-light" style="margin-top: -150px;">
			<h1 class="uk-margin-large-top">Ops! Parece que estamos perdidos no espaço!</h1>
			<p style="font-size: 22px" class="uk-margin-large-bottom">Clique em algum link ou faça uma nova busca por serviço</p>
			#form_search#
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