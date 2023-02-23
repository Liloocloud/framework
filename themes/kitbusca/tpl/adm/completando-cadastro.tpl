<style>
	.flex-nav-dashboard{ display: none; }
	h1{ font-size: 40px !important; }
</style>

<h1 class="uk-margin-remove-bottom">Complete seu cadastro para ver orçamentos!</h1>
<h3 class="uk-margin-remove-top">Com essas informações vamos mostrar orportunidades em sua região</h3>


<div class="callback-alert"></div>

<form data-custom class="uk-margin-medium-bottom">
	<input type="hidden" name="action" value="company_start_complete">
	<input type="hidden" name="custom-url" value="frontend/vamove/_php/Companies">

	<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
		<h3 class="uk-card-title">Seleciona abaixo o seu ramo de atividade</h3>
		<div uk-grid>		
			<!-- Select Activity -->
			<div class="uk-width-1-2@m">
				<div class="uk-margin-small">
					<select id="select_company_activities" class="uk-select" name="company_activity" required>
						<option value="">Selecione uma opção</option>
						[node1]<option value="#company_activity#">#company_activity#</option>[/node1]
					</select>	
				</div>
			</div>
		</div>
		<!-- Select Category -->
		<div id="select_company_categories" class="uk-margin-medium">
			<h3 class="uk-header">Selecione as categorias</h3>
			<div class="uk-grid-small uk-child-width-1-3@m" uk-grid>
			</div>
		</div>

		<h3 class="uk-card-title">Informa sua localização para receber orçamentos em su região</h3>
		
		<div uk-grid>
			<div class="uk-width-1-4@m">
				<div class="uk-margin-small">
					<div class="uk-form-label">Digite seu CEP:</div>
					<input class="uk-input flex-zipcode" type="text" name="plugin_zipcode" required>
				</div>
			</div>
			<div class="uk-width-1-4@m">	
				<div class="uk-margin-small">
					<div class="uk-form-label">Bairro</div>
					<input class="uk-input uk-form-medium" type="text" name="pluging_district" required>
				</div>
			</div>
			
			<div class="uk-width-1-4@m">
				<div class="uk-margin-small">
					<div class="uk-form-label">Cidade</div>
					<input class="uk-input uk-form-medium" type="text" name="pluging_city" required>
				</div>
			</div>
			
			<div class="uk-width-1-4@m">
				<div class="uk-margin-small">
					<div class="uk-form-label">Estado (UF)</div>
					<input class="uk-input uk-form-medium" type="text" name="pluging_state" required>
				</div>
			</div>
		</div>

		<div class="uk-margin uk-text-right">
			<a href="#" class="flex-busca-cep" style="font-size: 16px; margin-right: 25px">Buscar meu CEP</a>
			<button type="submit" class="uk-button uk-button-primary">Atualizar Informações</button>
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