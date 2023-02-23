

<div id="form-search">

	<!-- Busca por categoria -->
	<form data-custom autocomplete="off" class="form_cat">	
		<input type="hidden" name="action" value="search_select_service">
		<input type="hidden" name="custom-url" value="frontend/vamove/_php/Frontend">
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
			<div class="uk-width-1-4@s">
				<button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1" style="color: #fff; font-size: 18px;">Buscar</button>
			</div>
		</div>
	</form>

	<!-- Busca por digitaçao -->
	<form data-custom autocomplete="off" class="form_dig" style="display: none;">	
		<input type="hidden" name="action" value="search_service_term">
		<input type="hidden" name="custom-url" value="frontend/vamove/_php/Frontend">
		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-expand@s">
				<input class="uk-input uk-form-large" name="term" type="text" placeholder="Digita aqui o serviço que você precisa" required autofocus>
			</div>
			<div class="uk-width-1-4@s">
				<button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1" style="color: #fff; font-size: 18px;">Buscar</button>
			</div>
		</div>
	</form>
</div>
<button type="text" class="alter_search uk-button uk-button-primary uk-margin-top uk-margin-large-bottom" style="color: #fff;">Busque por termo</button>
<button type="text" class="alter_term uk-button uk-button-primary uk-margin-top uk-margin-large-bottom" style="display: none; color: #fff;">Busque por categoria</button>