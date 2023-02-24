<div class="uk-container">
	<style>
		.flex-nav-dashboard{ display: none; }
	</style>

	<h1 class="uk-margin-remove-bottom">Complete seu cadastro para ver orçamentos!</h1>
	<h3 class="uk-margin-remove-top">Com essas informações vamos mostrar orportunidades em sua região</h3>
	<div class="callback-alert"></div>

	<!-- Form de atualização de IDS dos serviços -->
	<div class="uk-card uk-card-default uk-card-body uk-margin-small">
		<h3 class="uk-card-title">Selecione abaixo os Serviços que você realiza</h3>
		<div id="callback-alert-password"></div>
		<form data-custom autocomplete="off">		
			<input type="hidden" name="action" value="complete_account_company">
			<input type="hidden" name="custom-url" value="frontend/vamove/_php/Companies">
			<input type="hidden" name="company_account_id" value="#account_id#">
			<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>					
				<div>
					<div id="group_select_company" class="uk-overflow-auto" style="overflow: auto; max-height: 250px; font-size: 13px;">
						#group_select_company#
					</div>		
				</div>				
				<div style="margin: 15px 0 0 0">
					<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar meus serviços</button>
				</div>
			</div>
		</form>
	</div>

	<!-- Form de atualização de localização dos profissionais -->
	<div class="uk-card uk-card-default uk-card-body uk-margin-small">
		<h3 class="uk-card-title">Sua localização</h3>
		<div id="callback-alert-password"></div>
		<form data-custom autocomplete="off">		
			<input type="hidden" name="action" value="update_company_location">
			<input type="hidden" name="custom-url" value="frontend/vamove/_php/Companies">
			<input type="hidden" name="company_account_id" value="#account_id#">

			<div class="uk-grid-small" uk-grid>								
				<div class="uk-width-1-3@m">
					<label style="margin: 5px 0 0 0">CEP</label>
					<input type="text" class="uk-input uk-form-small flex-zipcode" name="company_zipcode" maxlength="8" value="#company_zipcode#" required>
				</div>
				<div class="uk-width-expand@m">
					<label style="margin: 5px 0 0 0">Logradouro (Rua, Avenida e etc.)</label>
					<input class="uk-input uk-form-small" name="company_address" type="text" value="#company_address#" required>
				</div>
			</div>
			
			<div class="uk-grid-small uk-child-width-1-3@m" uk-grid>	
				<div>
					<label style="margin: 5px 0 0 0">Bairro</label>
					<input class="uk-input uk-form-small" name="company_district" type="text" value="#company_district#" required>
				</div>
				<div>
					<label style="margin: 5px 0 0 0">Cidade</label>
					<input class="uk-input uk-form-small" name="company_city" type="text" value="#company_city#" required>
				</div>	
				<div>
					<label style="margin: 5px 0 0 0">Estado (UF)</label>
					<input class="uk-input uk-form-small" name="company_state" type="text" value="#company_state#" required>
				</div>
				<div style="margin: 15px 0 0 0">
					<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar minha localização</button>
				</div>
			</div>

		</form>
	</div>


	<script>
// Plugin CEP
$('input[name="company_zipcode"]').on('keyup', function () {          		
	if( $(this).val().length === 9 ){
		var cep = $(this).val()
		if (cep.length === 9) {
			$.get("https://viacep.com.br/ws/"+cep+"/json", function (data){
				if (!data.erro){
					$('input[name="company_district"]').val(data.bairro)
					$('input[name="company_city"]').val(data.localidade)
					$('input[name="company_address"]').val(data.logradouro)
					$('input[name="company_state"]').val(data.uf)
				}
			}, 'json')
		}
	}
})


	// Botão Busca CEP
	$('.flex-busca-cep').on('click', function(){
		let URL = 'http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
		window.open(URL, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes')    	
	})	
</script>
</div>