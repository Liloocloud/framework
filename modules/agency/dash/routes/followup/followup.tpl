<div class="liloo-content">
	<div class="liloo-overflow">
		<div class="ui">
			<div class="lists">

				[node]
				<div class="list">
					<header>#pipe_title#</header>
					<ul id="pipeline-#pipe_id#" class="list-card-matrix connectedSortable">
						[node1]
						<li id="#matrix_code#" onclick="hrefCard('#item_link_card#',this)" style="cursor: pointer;">			
							<div class="uk-flex uk-flex-middle uk-flex-between">
								<h5>#client_name#</h5>
								<div>
									<a id="link-#matrix_code#" class="uk-icon-button" uk-icon="calendar" liloo-datetime></a>
									<a href="https://api.whatsapp.com/send?phone=#client_whatsapp#" class="uk-icon-button" uk-icon="whatsapp" target="_new"></a>
								</div>										
							</div>
							<p>Reunião: <span id="#matrix_code#-meeting">#item_key[data_da_reuniao]#</span></p>
							<p>E-mail: #client_email#</p>
							<p>Telefone: #client_phone_1#</p>
						</li>
						[/node1]
					</ul>
					<footer>&nbsp;</footer>
				</div>
				[/node]

			</div>
		</div>
	</div>
</div>

<!-- <a class="uk-button uk-button-default" >Open</a> -->
<a class="liloo-btn-plus" href="#modal-new-matrix" uk-toggle><i class="fa fa-plus"></i></a>

<div id="modal-new-matrix" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
		
		
		<form data-liloo method="post">
        	<div class="uk-modal-header uk-padding-small">
				<h4>Nova Oportunidade</h4>
        	</div>		
        	<div class="uk-modal-body uk-padding-small uk-grid-collapse" uk-grid>
				<input type="hidden" name="action" value="followup_create_new_item">
				<input type="hidden" name="path" value="modules/agency/dash/routes/followup/ajax">
				
				
				<div class="uk-width-1-1">
					<div class="uk-grid-small" uk-grid>
						<div class="uk-width-1-2@m">
							<label class="uk-form-label">Nome</label>
							<div class="uk-form-controls">
								<input name="client_name" class="uk-input" type="text" autofocus required>
							</div>
						</div>
						<div class="uk-width-1-2@m">
							<label class="uk-form-label">Empresa</label>
							<div class="uk-form-controls">
								<input name="client_company_name" class="uk-input" type="text" required>
							</div>
						</div>
					</div>
				</div>

				<div class="uk-width-1-1">
					<div class="uk-grid-small" uk-grid>
						<div class="uk-width-1-2@m">
							<label class="uk-form-label">Segmento</label>
							<div class="uk-form-controls">
								<input name="client_company_segment" class="uk-input" type="text" required>
							</div>
						</div>
						<div class="uk-width-1-2@m">
							<label class="uk-form-label">E-mail</label>
							<div class="uk-form-controls">
								<input name="client_email" class="uk-input" type="mail">
							</div>
						</div>
					</div>
				</div>

				<div class="uk-width-1-1">
					<div class="uk-grid-small" uk-grid>
						<div class="uk-width-1-3@s">
							<label class="uk-form-label">Whatsapp</label>
							<div class="uk-form-controls">
								<input name="client_whatsapp" class="uk-input" type="text" liloo-mask-phone>
							</div>
						</div>
						<div class="uk-width-1-3@s">
							<label class="uk-form-label">Telefone 1</label>
							<div class="uk-form-controls">
								<input name="client_phone_1" class="uk-input" type="text" liloo-mask-phone>
							</div>
						</div>
						<div class="uk-width-1-3@s">
							<label class="uk-form-label">Telefone 2</label>
							<div class="uk-form-controls">
								<input name="client_phone_2" class="uk-input" type="text" liloo-mask-phone>
							</div>
						</div>
					</div>
				</div>

				<div class="uk-width-1-1">
					<label class="uk-form-label">Site</label>
					<div class="uk-form-controls">
						<input name="item_key=cliente_possui_site&type=string" class="uk-input" type="text">
					</div>
				</div>

				<div class="uk-width-1-1">
					<div class="uk-grid-small" uk-grid>
						<div class="uk-width-1-3@s">
							<label class="uk-form-label">Como nos conheceu?</label>
							<div class="uk-form-controls">
								<select name="item_key=como_nos_conheceu&type=string" class="uk-select">
									<option value="" selected="selected">Selecione...</option>
									<option value="Google SEO">Google SEO</option>
									<option value="Google Ads">Google Ads</option>
									<option value="Facebook Ads">Facebook Ads</option>
									<option value="SMM">SMM</option>
								</select>
							</div>
						</div>
						<div class="uk-width-1-3@s">
							<label class="uk-form-label">Data de Reunião</label>
							<div class="uk-form-controls">
								<input name="item_key=data_da_reuniao&type=datetime" class="uk-input" type="text" liloo-datetime>
							</div>
						</div>
						<div class="uk-width-1-3@s">
							<label class="uk-form-label">Local da Reunião</label>
							<div class="uk-form-controls">
								<select name="item_key=local_da_reuniao&type=string" class="uk-select">
									<option value="" selected="selected">Selecione...</option>
									<option value="Online (Meet)">Online (Meet)</option>
									<option value="No escritório">No escritório</option>
									<option value="No local do cliente">No local do cliente</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="uk-width-1-1">
					<label class="uk-form-label">Observações</label>
					<div class="uk-form-controls">
						<textarea name="item_key=observacao_etapa_oportunidade&type=string" class="uk-textarea" required></textarea>
					</div>
				</div>

			</div>
			<div class="uk-modal-footer uk-text-right uk-padding-small">
				<button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
				<button class="uk-button uk-button-primary" type="submit">Adicionar</button>
			</div>
		</form>


    </div>
</div>