

<!-- Resultado de busca + lateral de anuncios -->
<div style="background-color: #f7f7f7; padding-top: 20px;">
	<div class="uk-container">

		<div uk-grid>
			<div class="uk-width-expand@m">
				
				<div class="modal-listview"></div>

				<!-- Listagem relativa a URL -->
				{{ listview_organic | raw }}

				<div class="uk-margin">
					{{ paginator | raw }}
				</div>

			</div>
			<div class="uk-width-1-4@m">
				<div class="card-estados uk-margin-bottom">
					<h3>Busque em outras localidades</h3>
					<div>
						{% include 'links.twig' %}
					</div>
				</div>

				<div class="uk-margin-bottom">
					<h3>Categorias Sugeridas</h3>
					<p>Incluir as categorias de forma randomica</p>
					<ul class="uk-list uk-list-divider">
						<li>Ar Condicionado</li>
						<li>Fogão e Cooktop</li>
						<li>Geladeira e Freezer</li>
						<li>Lava Louça</li>
						<li>Máquina de Lavar</li>
						<li>Microondas</li>
					</ul>
				</div>

				<div class="uk-card uk-card-default uk-padding uk-margin-bottom">
					<h2>Cadastre-se agora</h2>
					<p>Se você é um profissional e quer mostrar sua empresa cadastre-se agora e começe a aparecer no busquejá</p>
					<a href="#" class="uk-button uk-button-primary uk-button-large">Seja um profissional</a>
				</div>

			</div>
		</div>
	</div>

</div>

<!-- Modal Telefone -->
<div id="modal-phone" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header uk-padding-small">
			<h4>Telefone</h4>
		</div>
		<div class="uk-modal-body uk-padding-small">
			<div class="content"></div>
		</div>
	</div>
</div>

<!-- Modal Whatsapp -->
<div id="modal-whatsapp" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header uk-padding-small">
			<h4>Fale pelo Whatsapp</h4>
		</div>
		<div class="uk-modal-body uk-padding-small">
			<div class="content">
				<form method="post">
					<div class="msg-alert"></div>
					<input type="hidden" name="action" value="listview/actions">
					<input type="hidden" name="path" value="themes/kitbusca/ajax/listview">
					<input type="hidden" name="repo_ads_id">
					<input type="hidden" name="repo_key">
					<input type="hidden" name="repo_account_id">
					<div>
						<label>Sua mensagem</label>
						<textarea name="repo_message" class="uk-textarea" type="text">Olá! Gostaria de mais informações sobre os serviços. Pode me ajudar?</textarea>
					</div>
					<div class="uk-margin">
						<label>Seu número do Whatsapp</label>
						<input name="repo_whatsapp" class="uk-input" type="text" liloo-mask-phone maxlength="15" required>
					</div>
					<button class="uk-button uk-button-primary" type="button" onclick="sendFormWhatsapp('#modal-whatsapp form')"><i uk-icon="whatsapp" class="uk-icon"></i> Iniciar a Conversa</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Como chegar -->
<div id="modal-howtogo" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header uk-padding-small">
			<h4>Trace uma rota até o local</h4>
		</div>
		<div class="uk-modal-body uk-padding-small">
			<div class="content"></div>
		</div>
	</div>
</div>

<!-- Modal Compartilhamento -->
<div id="modal-smm" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header uk-padding-small">
			<h4>Redes Sociais</h4>
		</div>
		<div class="uk-modal-body uk-padding-small">
			<div class="content"></div>
		</div>
	</div>
</div>

<!-- Modal Form contato -->
<div id="modal-contact" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header uk-padding-small">
			<h4>Contato</h4>
		</div>
		<div class="uk-modal-body uk-padding-small">
			<div class="content">
				<form method="post">
					<div class="msg-alert"></div>    
					<input type="hidden" name="action" value="listview/actions">
					<input type="hidden" name="path" value="themes/kitbusca/ajax/listview">
					<input type="hidden" name="repo_ads_id">
					<input type="hidden" name="repo_key" value="click_ads_send_form">
					<input type="hidden" name="repo_account_id">
					<div class="uk-grid-small uk-grid" uk-grid>
						<div class="uk-width-1-2@s">
							<label>Nome</label>
							<input name="repo_name" class="uk-input" type="text" required>
						</div>
						<div class="uk-width-1-2@s">
							<label>Seu melhor e-mail</label>
							<input name="repo_email" class="uk-input" type="mail" required>
						</div>
						<div class="uk-width-1-2@s uk-grid-margin">
							<label>Seu Telefone</label>
							<input name="repo_phone" class="uk-input" liloo-mask-phone type="mail" required>
						</div>
				
						<div class="uk-width-1-2@s uk-grid-margin">
							<label>Assunto</label>
							<input name="repo_subject" class="uk-input" type="text" value="Orçamento" required>
						</div>
						<div class="uk-width-1-1 uk-grid-margin">
							<label>Mensagem</label>
							<textarea name="repo_message" class="uk-textarea" placeholder="Sua mensagem..." rows="5" required>Estou na kitbusta e gostaria de saber mais sobre os serviços. Aguardo retorno.</textarea>
						</div>
					   
						<div class="uk-width-1-1 uk-grid-margin">
							<button class="uk-button uk-button-primary uk-text-bold" type="button" onclick="sendFormContact('#modal-contact form')">Enviar Agora</button>
							<div uk-spinner style="display: none;"></div>
						</div>
					</div>
					

				</form>
			</div>
		</div>
	</div>
</div>

