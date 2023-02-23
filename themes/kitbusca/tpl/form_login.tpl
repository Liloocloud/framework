<form data-custom>
	<input type="hidden" name="action" value="account_login">
	<input type="hidden" name="custom-url" value="_Modules/_account/actions/_CRUD">
	<div class="uk-margin">
		<div class="uk-inline uk-width-1-2@m">
			<span class="uk-form-icon" uk-icon="icon: user"></span>
			<input class="uk-input" type="text" name="account_email" placeholder="Seu e-mail" style="padding-left: 40px !important;" autofocus required>
		</div>
	</div>
	<div class="uk-margin">
		<div class="uk-inline uk-width-1-2@m">
			<span class="uk-form-icon" uk-icon="icon: lock"></span>
			<input class="uk-input" type="password" name="account_password" placeholder="Sua senha" style="padding-left: 40px !important;" required>
		</div>
		<p><a href="<?php echo BASE ?>redefinir-senha/">Esqueci minha senha</a></p>
	</div>
	<button class="uk-button uk-button-primary" type="submit">Entrar</button>
</form>