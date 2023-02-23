<style>
	.flex-nav-dashboard{ display: none; }
	h1{ font-size: 40px !important; }
</style>

<h1 class="uk-margin-bottom">Meus dados</h1>
<div class="callback-alert"></div>


<!-- Categoria -->
<form data-custom class="uk-margin-medium-bottom">
	<input type="hidden" name="action" value="company_update_categories">
	<input type="hidden" name="custom-url" value="frontend/vamove/_php/Companies">
	<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
		<h3 class="uk-card-title">Seleciona abaixo o seu ramo de atividade</h3>
		
		[activities]			
		<div uk-grid>		
			<div class="uk-width-1-2@m">
				<div class="uk-margin-small">
					<select id="select_company_activities" class="uk-select" name="company_activity" required>
						[node]#company_activity#[/node]
					</select>	
				</div>
			</div>
		</div>
		[/activities]
		[categories]
		<div id="select_company_categories" class="uk-margin-medium">
			<h3 class="uk-header">Selecione as categorias</h3>
			<div class="uk-grid-small uk-child-width-1-3@m" uk-grid>
				[node]#company_sub_category#[/node]
			</div>
		</div>
		[/categories]

		<div class="uk-margin">
			<button type="submit" class="uk-button uk-button-primary">Atualizar Categoria</button>
		</div>
	</div>
</form>

<!-- Localização -->
<form data-custom class="uk-margin-medium-bottom">
	<input type="hidden" name="action" value="company_update_location">
	<input type="hidden" name="custom-url" value="frontend/vamove/_php/Companies">

	<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
		<h3 class="uk-card-title">Sua localização atual</h3>

		<div uk-grid>
			<div class="uk-width-1-4@m">
				<div class="uk-margin-small">
					<div class="uk-form-label">Digite seu CEP:</div>
					<input class="uk-input flex-zipcode" type="text" name="plugin_zipcode" value="#company_zipcode#" required>
				</div>
			</div>
			<div class="uk-width-1-4@m">	
				<div class="uk-margin-small">
					<div class="uk-form-label">Bairro</div>
					<input class="uk-input uk-form-medium" type="text" name="pluging_district" value="#company_district#" required>
				</div>
			</div>

			<div class="uk-width-1-4@m">
				<div class="uk-margin-small">
					<div class="uk-form-label">Cidade</div>
					<input class="uk-input uk-form-medium" type="text" name="pluging_city" value="#company_city#" required>
				</div>
			</div>

			<div class="uk-width-1-4@m">
				<div class="uk-margin-small">
					<div class="uk-form-label">Estado (UF)</div>
					<input class="uk-input uk-form-medium" type="text" name="pluging_state" value="#company_state#" required>
				</div>
			</div>
		</div>

		<div class="uk-margin">
			<button type="submit" class="uk-button uk-button-primary">Atualizar Localização</button>
			<a href="#" class="flex-busca-cep" style="font-size: 16px; margin-left: 25px">Buscar meu CEP</a>
		</div>

	</div>
</form>

<!-- Redefinição de senha -->
<form data-custom class="uk-margin-medium-bottom">
	<input type="hidden" name="action" value="account_change_password">
	<input type="hidden" name="custom-url" value="_Modules/_account/actions/_CRUD">
	<input type="hidden" name="account_id" value="#account_id#">
	<input type="hidden" name="account_email" value="#account_email#">

	<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
		<h3 class="uk-card-title">Crie um nova senha. Lembre-se de salvar a senha para que você possa utiliza-la novamente</h3>
		<div uk-grid>
			<div class="uk-width-1-3@m">
				<div class="uk-margin-small">
					<input type="password" class="uk-input uk-form-medium" name="password_old" placeholder="Senha atual" required>
				</div>
			</div>
			<div class="uk-width-1-3@m">
				<div class="uk-margin-small">
					<input type="password" class="uk-input uk-form-medium" name="password_new" placeholder="Nova senha" required>
				</div>
			</div>
			<div class="uk-width-1-3@m">
				<div class="uk-margin-small">
					<input type="password" class="uk-input uk-form-medium" name="password_repeat" placeholder="Repita a senha" required>
				</div>
			</div>
		</div>
		<div class="uk-margin">
			<button type="submit" class="uk-button uk-button-primary">Atualizar Senha</button>
		</div>
	</div>
</form>




<script>
	// Select Activity
	$('#select_company_activities').on('change',function (){      
		let Val = $(this).val();
		Flex.RequestServer(
			'select_activity',
			'frontend/vamove/_php/Companies',
			''+Val+'',
			true
			) 
	})

	// Botão Busca CEP
	$('.flex-busca-cep').on('click', function(){
		let URL = 'http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
		window.open(URL, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes')    	
	})	
</script>