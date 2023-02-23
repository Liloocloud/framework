<div class="uk-container uk-container-small uk-text-center uk-padding-large">
	<h1>Seu link de validação Expirou!</h1>

	<div class="uk-card uk-card-default uk-card-body">
		<h2>Preencha com seu e-mail abaixo para receber um novo link de confirmação</h2>
		<form data-custom class="uk-text-center">
			<input type="hidden" name="action" value="account_create_email">
			<input type="hidden" name="custom-url" value="_Modules/_account/actions/_CRUD">

			<div uk-grid>
				<div class="uk-width-1-4@m"></div>
				<div  class="uk-width-expand@m">
					<div class="uk-margin-small">
						<input class="uk-input" type="email" name="account_email" autofocus required>
					</div>
					<button type="submit" class="uk-button uk-button-primary uk-width-1-1">Reenviar link de Validação</button>
				</div>
				<div class="uk-width-1-4@m"></div>
			</div>

		</form>	
	</div>


	<div class="uk-alert-primary" uk-alert>
		<p>Você tem 1 hora para validar sua conta, se não for possível validar neste período refaça seu cadastro.</p>
	</div>
	<div class="uk-alert-primary" uk-alert>
		<p>Em casos extremos o email pode demorar até 10 minutos para ser enviado</p>
	</div>
</div>