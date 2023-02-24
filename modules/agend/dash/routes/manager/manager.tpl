<link rel="stylesheet" href="http://localhost/liloocloud5/plugins/full-calendar/lib/main.min.css">
<link rel="stylesheet" href="#DASH_ROUTES_BASE#manager/style.css">


<div class="uk-container">
	<div class="uk-flex uk-flex-between">
		<h4>Agendamento</h4>
		<span>
			<a href="#new-user" uk-toggle class="uk-button uk-button-primary uk-button-xsmall">Adicionar usuário</a>
			<a href="#" class="uk-button uk-button-primary uk-button-xsmall">Gerar lista PDF</a>
		</span>
	</div>
</div>

<div class="uk-container">
    <div class="uk-grid-small" uk-grid>

		<!-- Listagem de Opções de agendamento -->
		<div class="uk-width-1-4@m">
			
			<!-- Novo agendamento -->
			<div class="uk-card uk-card-default">
				<div class="uk-card-header uk-padding-small">
					<h4>Novo agendamento</h4>
				</div>
				<div class="uk-card-body uk-padding-small">
					
					<div>
						<form data-liloo method="post" class="uk-grid-small" uk-grid>
							<input type="hidden" name="action" value="client_create">
							<input type="hidden" name="path" value="modules/agend/ajax/manager">


							<div class="uk-maring uk-width-1-1@m">
								<input type="text" name="assunto" class="uk-input" placeholder="Nome" liloo-datetime>
							</div>
							<div class="uk-maring uk-width-1-1@m">
								<input type="text" name="assunto" class="uk-input" placeholder="Evento">
							</div>
							<div class="uk-maring uk-width-1-1@m">
								<input type="text" name="assunto" class="uk-input" placeholder="Descrição">
							</div>
							<div class="uk-maring uk-width-1-1@m">
								<input type="text" name="agend_client_id" onblur="Agend.Client()" class="uk-input" placeholder="Nome do Cliente" autocomplete="no">
							</div>
							<div class="uk-maring uk-width-1-1@m">
								<input type="text" name="assunto" class="uk-input" placeholder="Nome">
							</div>
							<div class="uk-maring uk-width-1-1@m">
								<button type="submit" class="uk-button uk-button-primary uk-button-xsmall">Agendar</button>
							</div>
						</form>
					</div>
					<div class="output"></div>
				</div>
			</div>
			
			<!-- Etiquetas -->
			<div class="uk-card uk-card-default uk-margin-top">
				<div class="uk-card-header uk-padding-small">
					<h4>Etiquetas</h4>
				</div>
				
				<div class="uk-card-body uk-padding-small">
					<p>
						<span class="uk-label uk-label-success">&nbsp;</span> Atendido<br>
						<span class="uk-label">&nbsp;</span> Aguardando<br>
						<span class="uk-label uk-label-warning">&nbsp;</span> Confirmado<br>
						<span class="uk-label uk-label-danger">&nbsp;</span> Atrasado<br>
					</p>
				</div>
			</div>
			
		</div>
        
		<!-- Lateral esquerda -->
		<div class="uk-width-expand@m">
            <div class="uk-card uk-card-default uk-padding-small">
				<div class="liloo-calendar-manager"></div>
				
			</div>
		</div>

	</div>
</div>

<!-- MODAL para ver os datalhes -->
<a class="uk-button uk-button-default" href="#modal-view-details" uk-toggle>Open</a>

<!-- <div id="modal-view-details" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Modal Title</h2>
        </div>
        <div class="uk-modal-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Save</button>
        </div>
    </div>
</div> -->

<div class="init-modal"></div>

<script src="http://localhost/liloocloud5/plugins/full-calendar/lib/main.min.js"></script>


