<!-- <h3 class="uk-card-title">Todas as categorias</h3> -->
<div class="uk-grid-small uk-child-width-1-3@m" uk-grid="masonry: true">
	
	[node1]
		<div>
			<div class="uk-card uk-card-default uk-card-body ">
				<h3>#item_title#</h3>
				<p>#item_description#</p>
				<h4>#item_price#</h4>
				<a href="#" onclick="PaymentFlex.addItem(#item_id#)" class="uk-button uk-button-primary">Comprar Moedas</a>
			</div>
		</div>
	[/node1]

</div>


<!--
<div class="uk-grid-small" uk-grid>
	<div class="uk-width-expand@m">
		<div class="uk-card uk-card-default uk-card-body">
			<div uk-grid>
				<a class="uk-width-1-3@m uk-button uk-button-primary uk-button-small uk-align-right" href="#modal-overflow" uk-toggle>Nova categoria</a>
			</div>
			

		</div>
	</div>
	<div class="uk-width-1-3@m">
		<div class="uk-card uk-card-default uk-card-body">
			<h3 class="uk-card-title">Detalhes da Categoria</h3>

			<div class="callback-alert"></div>

			<form data-custom autocomplete="off">	
				<input type="hidden" name="action" value="update_category">
				<input type="hidden" name="custom-url" value="_Modules/vamove/_php/CategoriesManager">
				<input type="hidden" id="service_id" name="service_id">
				<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>
					
					<div>
						<label style="margin: 5px 0 0 0">Categoria</label>
						<input class="uk-input uk-form-small" id="service_category" name="service_category" type="text">
					</div>

					<div>
						<label style="margin: 5px 0 0 0">Título</label>
						<input class="uk-input uk-form-small" id="service_title" name="service_title" type="text">
					</div>

					<div>
						<label style="margin: 5px 0 0 0">Presencial ou Online</label>
						<input class="uk-input uk-form-small" id="service_type" name="service_type" type="text">
					</div>

					<div>
						<label style="margin: 5px 0 0 0">URL</label>
						<input class="uk-input uk-form-small" id="service_url" name="service_url" type="text">
					</div>

					<div>
						<label style="margin: 5px 0 0 0">Caminho da Imagem</label>
						<input class="uk-input uk-form-small" id="service_image" name="service_image" type="text">
					</div>

					<div>
						<label style="margin: 5px 0 0 0">Descrição</label>
						<textarea class="uk-textarea uk-form-small" id="service_description" name="service_description" rows="3"></textarea>
					</div>

					<div>
						<label style="margin: 5px 0 0 0">JSON do formulário</label>
						<textarea class="uk-textarea uk-form-small" id="service_form_json" name="service_form_json" rows="3"></textarea>
					</div>
					
					<div style="margin: 5px 0 0 0">
						<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
-->

<!-- Modal para criar novas categorias -->
<div id="modal-overflow" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header">
			<h3 class="uk-modal-title">Nova categoria</h3>
			<p><em>Apenas crie se tiver certeza, pois não será possível excluir!</em></p>
		</div>
		

		<form data-custom autocomplete="off">	
			
			<div class="uk-modal-body" uk-overflow-auto>
				<input type="hidden" name="action" value="create_category">
				<input type="hidden" name="custom-url" value="_Modules/vamove/_php/CategoriesManager">
				<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>

					<div>
						<label style="margin: 5px 0 0 0">#last_id# - <em>Obs.: Não pode ser repetido</em></label>
						<input class="uk-input uk-form-small" name="service_id" type="text" required>
					</div>

					<div>
						<label style="margin: 5px 0 0 0">Categoria</label>
						<input class="uk-input uk-form-small" name="service_category" type="text" required>
					</div>

					<div>
						<label style="margin: 5px 0 0 0">Título</label>
						<input class="uk-input uk-form-small" name="service_title" type="text" required>
					</div>

					<div>
						<label style="margin: 5px 0 0 0">Presencial ou Online</label>
						<input class="uk-input uk-form-small" name="service_type" type="text" required>
					</div>

					<div>
						<label style="margin: 5px 0 0 0">URL</label>
						<input class="uk-input uk-form-small" name="service_url" type="text" required>
					</div>

					<div>
						<label style="margin: 5px 0 0 0">Caminho da Imagem</label>
						<input class="uk-input uk-form-small" name="service_image" type="text">
					</div>

					<div>
						<label style="margin: 5px 0 0 0">Descrição</label>
						<textarea class="uk-textarea uk-form-small" name="service_description" rows="3"></textarea>
					</div>

					<div>
						<label style="margin: 5px 0 0 0">JSON do formulário</label>
						<textarea class="uk-textarea uk-form-small" name="service_form_json" rows="3"></textarea>
					</div>

				</div>
			</div>
			<div class="uk-modal-footer uk-text-right">
				<button class="uk-button uk-button-default uk-button-small uk-modal-close" type="button">Fechar</button>
				<button class="uk-button uk-button-primary uk-button-small" type="submit">Criar categoria</button>
			</div>
		</form>
	</div>
</div>
<div class="callback"></div>
<script>
	$('.item').on('click', function(){
		let item = $(this).attr('id')
		console.log('Clicou em '+item)
		Flex.RequestServer(
			'list_category_select',
			'_Modules/vamove/_php/CategoriesManager',
			item,
			true
			)

		// window.location.href="?module=vamove&action=categories&id="+item;
	})
</script>