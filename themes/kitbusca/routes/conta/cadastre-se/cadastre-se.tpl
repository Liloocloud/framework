<style>
    .liloo-login-sideone {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #03475A;
        flex-direction: column;
    }
    .liloo-login-sideone h3,
    .liloo-login-sideone p{
        color: #efefef;
    }
    h1{
        font-size: 32px !important;
    }
</style>
<div class="uk-grid-collapse uk-flex uk-flex-middle" uk-grid>
    <div class="liloo-login-sideone uk-width-1-2 uk-visible@m uk-text-center uk-padding-large uk-height-viewport">
		<lottie-player src="#BASE_UPLOADS#animations/login.json" background="transparent" speed="1" style="width: 60%"  loop  autoplay></lottie-player>
        <h3 class="uk-margin-remove">#SITE_TITLE#</h3>
        <p class="uk-margin-remove">#SITE_DESCRIPTION#</p>
        <p class="uk-margin-top uk-text-small">#SITE_NAME# &copy; #date#</p>
    </div>
    <div class="uk-width-1-2@m uk-animation-slide-left-medium">
        <div class="uk-padding">
			<a href="#" onclick="clickLogo()">
				<img src="#BASE_UPLOADS#root/logotipo.png" alt="Cadastre-se" width="120px">
			</a>	
			<h1 class="uk-margin-top">Cadastre-se</h1>
			<div uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" class="uk-visible@s steps uk-margin">			
				<button disabled class="step-status-1 check" type="button">1º<br>Passo</button>
				<button disabled class="step-status-2" type="button">2º<br>Passo</button>
				<button disabled class="step-status-3" type="button">3º<br>Passo</button>		
			</div>
			<div uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" class="uk-hidden@s steps steps-mobile uk-margin">				
				<button disabled class="step-status-1 check" type="button">1º<br>Passo</button>
				<button disabled class="step-status-2" type="button">2º<br>Passo</button>
				<button disabled class="step-status-3" type="button">3º<br>Passo</button>
			</div>
	
			<ul class="uk-switcher">
				
				<!-- 1º PASSO (Form de cadastro) -->
				<li>
					<form id="account-step-1" autocomplete="off" class="uk-margin-bottom">
						<div>
							<input type="hidden" name="action" value="create/account/step1">
							<input type="hidden" name="path" value="themes/busqueja/routes/conta/cadastre-se/ajax">
							<input type="hidden" name="account_plan" value="#account_plan#">
							<!-- <input type="hidden" name="csrf_token" value="#CSRF_TOKEN#"> -->

							<div id="callback-message"></div>

							<div class="uk-margin-small">
								<div class="uk-inline uk-width-1-2@m">
									<input type="hidden" name="account_name" class="input_delete_sender">
									<input class="uk-input" type="text" name="account_name" placeholder="Nome" required autofocus>
								</div>
							</div>
							<!-- <div class="uk-margin-small">
								<div class="uk-inline uk-width-1-2@m">
									<input type="hidden" name="account_lastname" class="input_delete_sender">
									<input class="uk-input" type="text" name="account_lastname" placeholder="Sobrenome" required autofocus>
								</div>
							</div> -->
							<div class="uk-margin-small">
								<div class="uk-inline uk-width-1-2@m">
									<input type="hidden" name="account_email" class="input_delete_sender">
									<input class="uk-input" type="mail" name="account_email" placeholder="E-mail" required>
								</div>
							</div>
							<div class="uk-margin-small">
								<div class="uk-inline uk-width-1-2@m">
									<input type="hidden" name="account_password" class="input_delete_sender">
									<input id="step-3-password" name="account_password" class="uk-input" placeholder="Sua senha" type="password" required>
								</div>
								<!-- <a  class="uk-icon-button uk-margin-small-right">
									<i style="display: none;" class="fas fa-eye"></i>
									<i class="fas fa-eye-slash"></i>
								</a> -->
							</div>
							<div class="uk-margin">
								<div class="uk-inline uk-width-1-2@m">
									<label><input class="uk-checkbox" type="checkbox" name="account_accept_terms" require>&nbsp; Ao criar uma conta na #SITE_NAME# está a concordar com os nossos <a href="#modal-overflow" uk-toggle>Termos e Condições de uso</a></label>
								</div>
							</div>
						</div>
						<div class="uk-margin-small">
							<span></span>
							<button class="uk-button uk-button-primary" type="submit">Criar Conta</button>
						</div>
					</form>
					<a href="#BASE#conta/login/" class="uk-margin-large-top">Já tenho uma conta</a>
				</li>
				
				<!-- 2º Passo (Validando a conta) -->			
				<li class="uk-padding-remove-top">
					<div class="uk-alert-primary uk-text-center" uk-alert>
						<a class="uk-alert-close" uk-close></a>
						<p>Enviamos o código de validação para seu e-mail. Não esquece de verificar no <b>"spam"</b> ou no <b>"lixo eletrônico"</b> caso não tenha chego na caixa de entrada!</p>
					</div>
					<form id="account-step-2">
						
						<div id="msg-step-2"></div>
						
						<div class="uk-text-center">
							<h3>Insira o código de validação <br> abaixo e clique em validar.</h3>
							<input type="hidden" name="action" value="account/create/step2">
							<input type="hidden" name="path" value="themes/busqueja/routes/conta/cadastre-se/ajax">
							<input type="hidden" name="account_email" class="step-email">
							<div class="uk-margin">
								<div class="uk-inline uk-width-1-2@m">
									<input name="account_activation_key" style="font-size: 20px; text-align: center;" liloo-mask-codevalidate class="uk-input" type="text" required>
								</div>
							</div>
						</div>
						<hr>
						<div class="uk-flex uk-flex-between@s uk-visible@s">
							<a href="#" class="uk-button uk-button-secondary resend-code">Reeviar código</a>
							<div>
								<button class="uk-button uk-button-primary" type="submit">Validar conta</button>
								<a href="#" class="uk-button uk-button-default" uk-switcher-item="previous">Voltar</a>
							</div>
						</div>
						<div class="buttoms-block uk-hidden@s">
							<button class="uk-button uk-button-primary" type="submit">Validar conta</button>
							<a href="#" class="uk-button uk-button-secondary resend-code">Reeviar código</a>
							<a href="#" class="uk-button uk-button-default" uk-switcher-item="0">Voltar</a>
						</div>
					</form>
				</li>

				<!-- 3º Passo (Obrigado) -->
				<li class="uk-padding uk-text-center">
					<div class="lottie-files" style="align-items: center; justify-content: center; display: flex;"></div>
					<h3>Sua conta foi criado com sucesso! <br>
						Vamos te redirecionar para o login</h5>
					<p>Use o e-mail e senha que você criou para começar a anunciar!</p>
					<a href="#BASE#conta/login/" class="uk-button-link">Já tenho uma conta</a>
				</li>

			</ul>
			


        </div>
    </div>
</div>

<!-- Contrato -->
<div id="modal-overflow" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Termos e condições de uso</h2>
        </div>
        <div class="uk-modal-body" uk-overflow-auto>
			#contrato_markdow#
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Fechar</button>
            <!-- <button class="uk-button uk-button-primary" type="button">Save</button> -->
        </div>
    </div>
</div>