<div class="uk-container uk-container-small uk-text-center uk-padding-large">
	<h1>Ok. Vamos redefinir sua senha de acesso?</h1>

	<div class="uk-card uk-card-default uk-card-body">
		<h2>Enviaremos um link de redefinição para o seu email. <br> Verifique a caixa de entrada. Lembre-se de olhar o spam caso não encontre o e-mail.</h2>

		<form data-custom>
			<input type="hidden" name="action" value="account_password_redefine">
			<input type="hidden" name="custom-url" value="_Modules/_account/actions/_CRUD">
			<div uk-grid>
				<div class="uk-width-1-4@m"></div>
				<div  class="uk-width-expand@m">
					<div class="uk-margin-small">
						<input type="email" class="uk-input uk-form-medium" name="account_email" placeholder="Seu e-mail" autofocus required>
					</div>
					<button type="submit" class="uk-button uk-button-primary uk-width-1-1">Enviar link de redefinição</button>
				</div>
				<div class="uk-width-1-4@m"></div>
			</div>		
		</form>
		
	</div>
	<div class="uk-alert-primary" uk-alert>
		<p>Você tem 1 hora para redefinir sua conta, se não for possível redefinir neste período, solicite outra redefinição.</p>
	</div>
	<div class="uk-alert-primary" uk-alert>
		<p>Em casos extremos o email pode demorar até 10 minutos para ser enviado</p>
	</div>
</div>