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
			<h1 class="uk-margin-top">Entrar</h1>
            <form data-liloo method="post">
                <input type="hidden" name="action" value="account_login">
                <input type="hidden" name="path" value="modules/accounts/ajax/ManagerAccounts">
                <input type="hidden" name="init" value="#BASE_ADMIN#dash/init/">
                <div class="uk-margin">
                    <input name="account_email" class="uk-input uk-width-1-2@m uk-form-large" type="text" placeholder="E-mail" #input_values# required>
                </div>
                <div class="uk-margin">
                    <input name="account_password" class="uk-input uk-width-1-2@m uk-form-large" type="password" placeholder="Senha" required>
                </div>
                <button class="uk-button uk-button-primary" type="submit">Entrar</button>
                <p class="uk-margin-large-top"><a href="#BASE#conta/redefinir-senha/">Esqueci minha senha</a></p>
                <p>Não tem cadastro ainda? <a href="#BASE#conta/cadastre-se/">Cadastre-se</a></p>
            </form>
        </div>
    </div>
</div>