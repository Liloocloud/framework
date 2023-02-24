<div class="uk-grid-small" uk-grid>
	<div class="uk-width-expand@m">

		<!-- LIstagem com paginação -->
		<div class="uk-card uk-card-default uk-card-body">
			<div class="uk-margin-bottom" uk-grid>
				<h3 class="uk-width-expand@m uk-card-title" style="margin: -10px 0;">Lista de Profissionais Cadastrados</h3>
				<!-- <a class="uk-width-1-4@m uk-button uk-button-primary uk-button-small" href="#modal-overflow" uk-toggle>Novo usuário</a> -->
			</div>
			<div class="uk-overflow-auto" style="overflow: auto; max-height: 1200px">
				<table class="uk-table uk-table-divider">
					<thead>
						<tr>
							<th><small><b>ID</b></small></th>
							<th><small><b>Nome</b></small></th>
							<th><small><b>Telefone/E-mail</b></small></th>
							<th width='25%'><small><b>Grupos de serviço</b></small></th>
							<th><small><b>CEP/Local</b></small></th>
						</tr>
					</thead>
					<tbody id="list_table">
						#list_table#
					</tbody>
				</table>
			</div>
			<div id="pagination">#pagination#</div>
		</div>

	</div>
	<div class="uk-width-1-3@m">
		
		<!-- Form de atualização de IDS dos serviços -->
		<div class="uk-card uk-card-default uk-card-body uk-margin-small">
			<h3 class="uk-card-title">Grupo de serviço do profissinal <span class="company_account_id"></span></h3>
			<div id="callback-alert-password"></div>
			<form data-custom autocomplete="off">		
				<input type="hidden" name="action" value="update_company_groups_dash">
				<input type="hidden" name="custom-url" value="_Modules/vamove/_php/CompaniesManager">
				<input type="hidden" name="company_account_id" class="company_account_id">
				<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>					
					<div>
						<label style="margin: 5px 0 0 0">Selecione os novos grupos</label>
						<div id="group_select_company" class="uk-overflow-auto" style="overflow: auto; max-height: 250px; font-size: 13px;">
						</div>		
					</div>				
					<div style="margin: 5px 0 0 0">
						<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar Grupos</button>
					</div>
				</div>
			</form>
		</div>

		<!-- Form de atualização de localização dos profissionais -->
		<div class="uk-card uk-card-default uk-card-body uk-margin-small">
			<h3 class="uk-card-title">Localização do profissional <span class="company_account_id"></span></h3>
			<div id="callback-alert-password"></div>
			<form data-custom autocomplete="off">		
				<input type="hidden" name="action" value="update_company_location_dash">
				<input type="hidden" name="custom-url" value="_Modules/vamove/_php/CompaniesManager">
				<input type="hidden" name="company_account_id" class="company_account_id">
				<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>								
					<div class="uk-form-label">CEP
						<input type="text" class="uk-input uk-form-small flex-zipcode" id="company_zipcode" name="company_zipcode" maxlength="8" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Bairro</label>
						<input class="uk-input uk-form-small" id="company_district" name="company_district" type="text" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Cidade</label>
						<input class="uk-input uk-form-small" id="company_city" name="company_city" type="text" required>
					</div>	
					<div>
						<label style="margin: 5px 0 0 0">Logradouro (Rua, Avenida e etc.)</label>
						<input class="uk-input uk-form-small" id="company_address" name="company_address" type="text" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Estado (UF)</label>
						<input class="uk-input uk-form-small" id="company_state" name="company_state" type="text" required>
					</div>
					<div style="margin: 5px 0 0 0">
						<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar Localização</button>
					</div>
				</div>
			</form>
		</div>

		<!-- Atualização de informações de conta -->
		<div class="uk-card uk-card-default uk-card-body uk-margin-small">
			<h3 class="uk-card-title">Detalhes do Profissional <span class="company_account_id"></span></h3>
			<form data-custom autocomplete="off">		
				<input type="hidden" name="action" value="update_company_infos_dash">
				<input type="hidden" name="custom-url" value="_Modules/vamove/_php/CompaniesManager">
				<input type="hidden" name="company_account_id" class="company_account_id">
				<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>					
					<div>
						<label style="margin: 5px 0 0 0">Telefone</label>
						<input class="uk-input uk-form-small" id="company_phones" name="company_phones" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Linkedin</label>
						<input class="uk-input uk-form-small" id="company_linkedin" name="company_linkedin" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Facebook</label>
						<input class="uk-input uk-form-small" id="company_facebook" name="company_facebook" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Instagram</label>
						<input class="uk-input uk-form-small" id="company_instagram" name="company_instagram" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Twitter</label>
						<input class="uk-input uk-form-small" id="company_twitter" name="company_twitter" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Youtube</label>
						<input class="uk-input uk-form-small" id="company_youtube" name="company_youtube" type="text">
					</div>					
					<div style="margin: 5px 0 0 0">
						<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar Informações</button>
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

	// Recarregando os item via AJAX
	function loaderList(){
		Flex.RequestServer(
			'loader_list_companies',
			'_Modules/vamove/_php/CompaniesManager',
			'#this_page#,#this_url#',
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