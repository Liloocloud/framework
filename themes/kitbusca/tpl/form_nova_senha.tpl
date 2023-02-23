<div class="uk-container uk-container-small uk-text-center uk-padding-large">
	<div uk-grid>
		<div class="uk-width-1-4@m"></div>
		<div class="uk-width-expand@m">
			<h2>Crie um nova senha. Lembre-se de salvar a senha para que você possa utiliza-la novamente</h2>
			<form data-custom>
				<input type="hidden" name="action" value="account_change_password">
				<input type="hidden" name="custom-url" value="_Modules/_account/actions/_CRUD">
				<input type="hidden" name="account_id" value="#account_id#">
				<input type="hidden" name="account_email" value="#account_email#">
				
				<div class="uk-margin-small">
					<input type="password" class="uk-input uk-form-medium" name="password_old" placeholder="Senha atual" autofocus required>
				</div>
				<div class="uk-margin-small">
					<input type="password" class="uk-input uk-form-medium" name="password_new" placeholder="Nova senha" required>
				</div>
				<div class="uk-margin-small">
					<input type="password" class="uk-input uk-form-medium" name="password_repeat" placeholder="Repita a senha" required>
				</div>
				<button type="submit" class="uk-button uk-button-primary uk-width-1-1">Criar nova senha</button>
			</form>
		</div>
		<div class="uk-width-1-4@m"></div>
	</div>
</div>