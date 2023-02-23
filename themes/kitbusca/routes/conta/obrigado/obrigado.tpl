<style>
    h1{ font-size: 32px !important; }
    .lottie-files{
        align-items: center; 
        justify-content: center; 
        display: flex;
        height: 150px;
    }
</style>
<div class="uk-grid-collapse uk-flex uk-flex-middle uk-text-center" uk-grid>
    <div class="liloo-login-sideone uk-width-1-2 uk-visible@m uk-text-center uk-padding-large uk-height-viewport">
        <lottie-player src="#BASE_UPLOADS#animations/login.json" background="transparent" speed="1" style="width: 60%"  loop  autoplay></lottie-player>
        <h3 class="uk-margin-remove">#SITE_TITLE#</h3>
        <p class="uk-margin-remove">#SITE_DESCRIPTION#</p>
        <p class="uk-margin-top uk-text-small">#SITE_NAME# &copy; #date#</p>
    </div>
    <div class="uk-width-1-2@m">
        <div class="uk-padding">
			<a href="#" onclick="clickLogo()">
				<img src="#BASE_UPLOADS#root/logotipo.png" alt="Cadastre-se" width="120px">
			</a>	
			<h1 class="uk-margin-top">Obrigado</h1>
            <div class="lottie-files">
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_uld4gwww.json"  background="transparent" speed="1" style="width: 300px; height: 300px;" autoplay></lottie-player>
            </div>
            <h3>Sua conta foi criado com sucesso! <br>
            Vamos te redirecionar para o login</h3>

            <div class="liloo-countdown"></div>
            <input type="hidden" class="email" value="#account_email#">

            <p>Use o e-mail e senha que você criou para começar a anunciar!</p>
            <a href="#btn_login#" class="uk-button uk-button-primary">Entrar</a>
        </div>
    </div>
</div>