<!-- OffCanvas -->
<div id="offcanvas" class="offcanvas-overlay-left" uk-offcanvas="overlay: true;">                   
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <ul class="uk-nav-default" uk-nav>
            <li class="uk-nav-header">
                <img src="#logo_medium#" alt="" width="180px">
            </li>
            <li><p>#account_name# | Sua ID: <b>532#account_id#</b></p><hr></li>
            <li><a href="#base#meu-painel/configuracoes/">Meus Dados</a></li>
            <li><a href="#base#meu-painel/trocar-senha/">Trocar senha</a></li>
            <li><a href="#base#meu-painel/transacoes/">Minhas compras</a></li>
            <li><a href="#base#login">Sair</a></li>
        </ul>      
    </div>
</div>

<!-- Top Menu Desktop -->
<div class="uk-box-shadow-small uk-visible@m" style="background-color: #f8f8f8;" uk-sticky>
    <nav class="uk-navbar-container" uk-navbar="mode: click" style="padding: 0 140px">
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="#base_adm#">
                <img src="#logo_medium#" alt="" width="150px">
            </a>
        </div>
        <div class="uk-navbar-right">
            <div>#account_name# | Sua ID: <b>532#account_id#</b></div>
            <div class="uk-visible@m">
                <ul class="uk-navbar-nav">
                    <li><a href=""><i class="uk-icon-button" uk-icon="user"></i></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="#base#meu-painel/configuracoes/">Meus Dados</a></li>
                                <li><a href="#base#meu-painel/trocar-senha/">Trocar senha</a></li>
                                <li><a href="#base#meu-painel/transacoes/">Minhas compras</a></li>
                                <li><a href="#base#login">Sair</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="uk-hidden@m">
                <a  href="#" class="uk-button" uk-navbar-toggle-icon uk-toggle="target: #offcanvas"></a>
            </div> 
        </div>
    </nav>
</div>

<!-- Top Menu Mobile -->
<div nav="001" class="uk-box-shadow-small uk-hidden@m" style="background-color: #f8f8f8;" uk-sticky>
    <nav class="uk-navbar-container-large" uk-navbar="mode: click">
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="#base_adm#">
                <img src="#logo_medium#" alt="" width="150px">
            </a>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <div class="uk-navbar-item">
                    <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#" uk-toggle="target: .offcanvas-overlay-left"></a>
                </div>
            </ul>
        </div>
    </nav>
</div>