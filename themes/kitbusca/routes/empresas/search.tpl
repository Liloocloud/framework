<div id="form-search">
	<!-- Busca por categoria -->
	<form data-custom autocomplete="off" class="form_cat">	
		<input type="hidden" name="action" value="search_select_service">
		<input type="hidden" name="custom-url" value="frontend/busqueja/_php/Frontend">
		<div class="uk-grid-small" uk-grid>			
			<div class="uk-width-expand@s">
				<select class="uk-select uk-form-large select_groups" required>
					<option value="">Serviço...</option>
					#list_groups#
				</select>
			</div>
			<div class="uk-width-expand@s">
				<select name="service_url" class="uk-select uk-form-large list_services" required>
					<option value="">Especialidade...</option>
				</select>
			</div>
			<div class="uk-width-1-3@s">
				<button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1" style="color: #fff; font-size: 18px;">Busque já</button>
			</div>
		</div>
	</form>

	<!-- Busca por digitaçao -->
	<form data-custom autocomplete="off" class="form_dig" style="display: none;">	
		<input type="hidden" name="action" value="search_service_term">
		<input type="hidden" name="custom-url" value="frontend/busqueja/_php/Frontend">
		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-expand@s">
				<input class="uk-input uk-form-large" name="term" type="text" placeholder="Digita aqui o serviço que você precisa" required autofocus>
			</div>
			<div class="uk-width-1-4@s">
				<button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1" style="color: #fff; font-size: 18px;">Buscar já</button>
			</div>
		</div>
	</form>
</div>
<button type="text" class="alter_search uk-button uk-button-text uk-margin-top">Busque por termo</button>
<button type="text" class="alter_term uk-button uk-button-text uk-margin-top" style="display: none;">Busque por categoria</button>

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
			'frontend/busqueja/_php/Frontend',
			''+group+'',
			true
			)
	})
</script>