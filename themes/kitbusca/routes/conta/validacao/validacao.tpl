<style>
	h1 { font-size: 32px !important; }
</style>
<div class="uk-grid-collapse uk-flex uk-flex-middle" uk-grid>
	<div class="liloo-login-sideone uk-width-1-2 uk-visible@m uk-text-center uk-padding-large uk-height-viewport">
		<lottie-player src="#BASE_UPLOADS#animations/login.json" background="transparent" speed="1"
			style="width: 60%" loop autoplay></lottie-player>
		<h3 class="uk-margin-remove">#SITE_TITLE#</h3>
		<p class="uk-margin-remove">#SITE_DESCRIPTION#</p>
		<p class="uk-margin-top uk-text-small">#SITE_NAME# &copy; #date#</p>
	</div>
	<div class="uk-width-1-2@m uk-animation-slide-left-medium">
		<div class="uk-padding">
			<a href="#" onclick="clickLogo()">
				<img src="#BASE_UPLOADS#root/logotipo.png" alt="Cadastre-se" width="120px">
			</a>
			<h1 class="uk-margin-top">Valide seu Cadastro</h1>

			<div class="uk-alert-primary" uk-alert>
				<a class="uk-alert-close" uk-close></a>
				<p>Enviamos o código de validação para seu e-mail. Verificar no <b>"spam"</b> ou no
					<b>"lixo eletrônico"</b> caso não tenha chego na caixa de entrada.</p>
			</div>
			<form id="account-step-2">
				<div id="msg-step-2"></div>
				<div>
					<!-- <h3>Insira o código de validação <br> abaixo e clique em validar.</h3> -->
					<input type="hidden" name="action" value="account/create/step2">
					<input type="hidden" name="path" value="themes/busqueja/routes/conta/validacao/ajax">
					<input type="hidden" name="account_email" value="#account_email#">
					<div class="uk-margin-bottom">
						<div>
							<div class="uk-grid-small uk-flex uk-flex-middle" uk-grid>
								<div class="uk-width-1-3">									
									<input name="account_activation_key" style="font-size: 18px;" liloo-mask-codevalidate class="uk-input" type="text" required autofocus>
								</div>
								<div class="uk-width-expand">									
									<a href="#" class="uk-button uk-button-link resend-code">Reeviar código</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="uk-margin-top">
					<button class="uk-button uk-button-primary" type="submit">Validar conta</button>
					<a href="#BASE#conta/cadastre-se/" class="uk-button uk-button-default">Voltar</a>
				</div>
			</form>

		</div>
	</div>
</div>