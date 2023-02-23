<div class="liloo-form-search-header" uk-sticky="offset: 80">
	<form autocomplete="off">	
		<input type="hidden" name="action" value="search_select_service">
		<input type="hidden" name="path" value="frontend/busqueja/_php/Frontend">
		
		<div class="uk-grid-small uk-grid-collapse" uk-grid>

			<!-- Termo -->
			<div class="uk-width-1-2@s">
				<input id="autoCompleteCategories" class="first uk-input uk-form-large" name="term" type="text" required autofocus>
			</div>

			<!-- Localidade -->
			<div class="uk-width-expand@s">		
				<div class="uk-inline">
					<span class="uk-form-icon" uk-icon="icon: location"></span>
					<input id="autoCompleteCities" class="uk-input uk-form-large" name="location" type="text" style="padding-left: 35px;">
				</div>
			</div>

			<!-- Buscar -->
			<div class="uk-width-expand@s">
				<button type="submit" class="last ui button massive uk-button-primary uk-button-large uk-width-expand@s" style="color: #fff; font-size: 18px;">Busque Já</button>
			</div>
		</div>
	</form>
</div>