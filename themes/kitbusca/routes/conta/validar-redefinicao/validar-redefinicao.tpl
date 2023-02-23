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
            <h1 class="uk-margin-top">Código de Redefinição</h1>
            <h3>Informe o código de redefinição que foi enviado <br>
                para seu e-mail.</h3>

            <form id="password-redefine" autocomplete="off" class="uk-margin-bottom">
                <div>
                    <input type="hidden" name="action" value="redefine/validate/passaword/account">
                    <input type="hidden" name="path" value="themes/busqueja/routes/conta/validar-redefinicao/ajax">
                    <input type="hidden" name="account_email" value="#account_email#">
                    <!-- <input type="hidden" name="csrf_token" value="#CSRF_TOKEN#"> -->

                    <div id="callback-message"></div>

                    <div class="uk-margin-small">
                        <div class="uk-inline uk-width-1-2@m">
                            <input liloo-mask-codevalidate class="uk-input" type="mail" name="account_activation_key"
                                placeholder="Código de recuperação" required autofocus>
                        </div>
                    </div>

                </div>
                <div class="uk-margin-small">
                    <span></span>
                    <button class="uk-button uk-button-primary" type="submit">Continuar</button>
                </div>
            </form>

            <div class="uk-margin-large-top">
                <a href="#BASE#conta/login/">Já tenho uma conta</a>
                <h5 class="uk-margin-top">Não possui um conta? <a href="#BASE#conta/cadastre-se/">Cadastre-se</a></h5>
            </div>


        </div>
    </div>
</div>