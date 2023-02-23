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
            <h1 class="uk-margin-top">Nova Senha</h1>
            <p>Digite sua senha. Recomendamos que crie<br>
            com no mínimo 8 caracteres alfanuméricos</p>

            <form id="password-redefine" autocomplete="false" class="uk-margin-bottom">
                <div>
                    <input type="hidden" name="action" value="change/passaword/account">
                    <input type="hidden" name="path" value="themes/busqueja/routes/conta/trocar-senha/ajax">
                    #account_email#
                    #account_approved#
                    <!-- <input type="hidden" name="csrf_token" value="#CSRF_TOKEN#"> -->

                    <div id="callback-message"></div>

                    <div class="uk-margin-small">
                        <div class="uk-inline uk-width-1-2@m">
                            <input type="hidden" name="account_password" class="input_delete_sender">
                            <input id="step-3-password" name="account_password" class="uk-input" placeholder="Nova senha" type="password" required autofocus>
                        </div>
                        <!-- <a  class="uk-icon-button uk-margin-small-right">
                            <i style="display: none;" class="fas fa-eye"></i>
                            <i class="fas fa-eye-slash"></i>
                        </a> -->
                    </div>

                    <div class="uk-margin-small">
                        <div class="uk-inline uk-width-1-2@m">
                            <input type="hidden" name="account_password_repeat" class="input_delete_sender">
                            <input id="step-3-password" name="account_password_repeat" class="uk-input" placeholder="Repita sua nova senha" type="password" required>
                        </div>
                        <!-- <a  class="uk-icon-button uk-margin-small-right">
                            <i style="display: none;" class="fas fa-eye"></i>
                            <i class="fas fa-eye-slash"></i>
                        </a> -->
                    </div>

                    <div class="uk-margin-medium">
                        <div class="uk-inline uk-width-1-2@m">
                            <label>Por segurança, informe o telefone usando na conta</label>
                            <input type="hidden" name="account_phone" class="input_delete_sender">
                            <input liloo-mask-phone class="uk-input " type="text" name="account_phone" placeholder="Telefone" required>
                        </div>
                    </div>

                </div>
                <div class="uk-margin-small">
                    <span></span>
                    <button class="uk-button uk-button-primary" type="submit">Alterar senha</button>
                </div>
            </form>

            <div class="uk-margin-top">
                <a href="#BASE#conta/login/">Já tenho uma conta</a>
                <h5 class="uk-margin-top">Não possui um conta? <a href="#BASE#conta/cadastre-se/">Cadastre-se</a></h5>
            </div>


        </div>
    </div>
</div>