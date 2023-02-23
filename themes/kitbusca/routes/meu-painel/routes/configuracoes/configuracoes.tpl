<div class="uk-child-width-1-2@m uk-grid-small uk-margin-large-bottom" uk-grid="masonry: true">

	<!-- Form de atualização de IDS dos serviços -->
	<div>
		<div class="uk-card uk-card-default uk-card-body uk-margin-small">
			<h3 class="uk-card-title">Serviços que você realiza <span class="company_account_id"></span></h3>
			<form data-custom autocomplete="off">		
				<input type="hidden" name="action" value="update_company_groups">
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
	</div>

	<!-- Form de atualização de localização dos profissionais -->
	<div>
		<div class="uk-card uk-card-default uk-card-body uk-margin-small">
			<h3 class="uk-card-title">Sua localização</h3>
			<form data-custom autocomplete="off">		
				<input type="hidden" name="action" value="update_company_location">
				<input type="hidden" name="custom-url" value="frontend/vamove/_php/Companies">
				<input type="hidden" name="company_account_id" value="#account_id#">

				<div class="uk-grid-small" uk-grid>								
					<div class="uk-width-1-3@m">
						<label style="margin: 5px 0 0 0">CEP</label>
						<input type="text" class="uk-input uk-form-small flex-zipcode" name="company_zipcode" maxlength="8" value="#company_zipcode#" required>
					</div>
					<div class="uk-width-1-1@m">
						<label style="margin: 5px 0 0 0">Endereço (Rua, Avenida e etc.)</label>
						<input class="uk-input uk-form-small" name="company_address" type="text" value="#company_address#" required disabled>
					</div>
				</div>

				<div class="uk-grid-small uk-child-width-1-3@m" uk-grid>	
					<div>
						<label style="margin: 5px 0 0 0">Bairro</label>
						<input class="uk-input uk-form-small" name="company_district" type="text" value="#company_district#" required disabled>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Cidade</label>
						<input class="uk-input uk-form-small" name="company_city" type="text" value="#company_city#" required disabled>
					</div>	
					<div>
						<label style="margin: 5px 0 0 0">Estado (UF)</label>
						<input class="uk-input uk-form-small" name="company_state" type="text" value="#company_state#" required disabled>
					</div>
				</div>
				<div style="margin: 15px 0 0 0">
					<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar minha localização</button>
				</div>

			</form>
		</div>
	</div>

	
	<!-- Atualização de informações de conta -->
	<div>
		<div class="uk-card uk-card-default uk-card-body uk-margin-small">
			<h3 class="uk-card-title">Contato e mídia</h3>
			<form data-custom autocomplete="off">		
				<input type="hidden" name="action" value="update_company_infos">
				<input type="hidden" name="custom-url" value="frontend/vamove/_php/Companies">
				<input type="hidden" name="company_account_id" value="#account_id#">
				<div class="uk-grid-small uk-child-width-1-1@m" uk-grid>					
					<div>
						<label style="margin: 5px 0 0 0">Telefone</label>
						<input class="uk-input uk-form-small flex-mask-phone" name="company_phones" type="text" value="#company_phones#">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Linkedin</label>
						<input class="uk-input uk-form-small" name="company_linkedin" type="text" value="#company_linkedin#">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Facebook</label>
						<input class="uk-input uk-form-small" name="company_facebook" type="text" value="#company_facebook#">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Instagram</label>
						<input class="uk-input uk-form-small" name="company_instagram" type="text" value="#company_instagram#">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Twitter</label>
						<input class="uk-input uk-form-small" name="company_twitter" type="text" value="#company_twitter#">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Youtube</label>
						<input class="uk-input uk-form-small" name="company_youtube" type="text" value="#company_youtube#">
					</div>					
					<div style="margin: 15px 0 0 0">
						<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar minhas informações</button>
					</div>
				</div>
			</form>
		</div>
	</div>


	<!-- Form de atualização de senha do usuário -->
	<div>
		<div class="uk-card uk-card-default uk-card-body uk-margin-small">
			<h3 class="uk-card-title">Atualizar senha</h3>
			<p style="font-size: 13px; margin-top: -15px"><em>Atenção! Ao criar uma nova senha a antiga não terá mais validade. Recomendamos que salve sua nova senha em um lugar seguro caso precise!</em></p>
			<div id="callback-alert-password"></div>
			<form data-custom autocomplete="off">		
				<input type="hidden" name="action" value="change_password_account_dash">
				<input type="hidden" name="custom-url" value="_Modules/_account/_php/ManagerAccount">
				<input type="hidden" name="account_id" value="#account_id#">
				<input type="hidden" name="account_name" value="#account_name#">
				<input type="hidden" name="account_email" value="#account_email#">

				<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>					
					<div>
						<label style="margin: 5px 0 0 0">Digite sua nova senha</label>
						<input class="uk-input uk-form-small" name="account_password" type="password">
					</div>				
					<div style="margin: 15px 0 0 0">
						<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar Senha</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>

<div class="callback"></div>
<script>
	// Seleção de Item
	function item(item){
		console.log('Clicou em '+item)
		Flex.RequestServer(
			'select_company_dash',
			'_Modules/vamove/_php/CompaniesManager',
			item,
			true
			)
	}

	// Plugin CEP
	$('input[name="company_zipcode"]').on('keyup', function () {          		
		if( $(this).val().length === 9 ){
    		var cep = $(this).val() //.replace('-', '').replace('.', '')
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
</script>