<div id="menu-top-create" class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom" style="position: fixed;">
    <div>
        <h1>Funil de Vendas</h1>
    </div>
    <div class="uk-width-1-2@m">
        <div class="uk-text-right">
            <a href="#" class="uk-icon-button uk-margin-small-right" id="init-filter"><i class="fas fa-filter"></i></a>
            <input type="text" class="uk-input uk-width-1-3@m uk-width-1-2@s" name="daterange_principal" value=""
                liloo-daterange>
            <!-- <a id="btn-config-edit" type="button" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-download"></i> Exportar</a> -->
            <!-- <button id="btn-create-product" type="button" class="uk-button uk-button-primary uk-button-small dropzone-button-upload">Salvar</button> -->
            <!-- <a href="#BASE_ADMIN#templates/pages/" class="uk-button uk-button-primary uk-button-small">Todas as páginas</a> -->
        </div>
    </div>
</div>
<div style="margin-top: 70px;"></div>


<div class="liloo-content">
	<div class="liloo-overflow">
		<div class="ui">
			<div class="lists">	
				<!-- Listagem de pipes e cards -->
			</div>
		</div>
	</div>
</div>


<!-- Modal de detalhes do card -->
<div class="modal-info-matrix-card">

	<div class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
		<button class="uk-modal-close-full uk-close-large" type="button" uk-close style="position: fixed !important; top: 0; right: 0;"></button>
		<div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
			<div class="liloo-modal-full-content">
				 
				<div class="uk-flex uk-flex-between uk-flex-middle">
					<div class="uk-align-left uk-width-1-2">
						<h2 class="uk-margin-small uk-margin-remove-bottom">${props.prod_title}</h2>
						<p>Cód. ${props.prod_code} - Cadastrado em: ${props.prod_registered}</p>
					</div>
					<div>
						<a href="${lilooV3.Root()}admin/shop/edit/?id=${props.prod_id}" class="uk-button uk-button-primary uk-button-small">Editar</a>
						<button type="button" class="uk-button uk-button-primary uk-button-small">Compartilhar</button>
						<button type="button" class="uk-button uk-button-danger uk-button-small liloo-item-delete">Excluir</button>
					</div>
				</div>
						
				<h3>Edição rápida</h3>

				<div class="uk-child-width-1-2 uk-grid-small" uk-grid>
					<div>
						<div class="uk-card uk-card-default">
							<div class="uk-card-header uk-padding-small">
								<h4>Informações de Contato</h4>
							</div>
							<div class="uk-card-body uk-padding-small">
								<liloo-form id="update-matrix-infos"></liloo-form>                         
							</div>
						</div>
					</div>
					<div>
						<div class="uk-card uk-card-default">
							<div class="uk-card-header uk-padding-small">
								<h4>Preço e Promoções</h4>
							</div>
							<div class="uk-card-body uk-padding-small">
								<liloo-form id="update-product-price"></liloo-form>                         
							</div>
						</div> 
					</div>   

				</div>



				<div class="ui tab" data-tab="tab-images">
					<div class="uk-card uk-card-default">
						<div class="uk-card-header uk-padding-small">
							<h4>Galeria de Imagens</h4>
						</div>
						<div class="uk-card-body uk-padding-small">
							<liloo-form id="update-product-s"></liloo-form>                         
						</div>
					</div> 
				</div> 


			</div>                            
		</div>
	</div>


</div>



<!-- <a class="uk-button uk-button-default" >Open</a> -->
<!-- <a class="liloo-btn-plus" href="#modal-new-matrix" uk-toggle><i class="fa fa-plus"></i></a> -->

<div id="modal-new-matrix-bk" uk-modal>
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