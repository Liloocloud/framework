<!-- OffCanvas -->
<div id="offcanvas" class="offcanvas-overlay-left" uk-offcanvas="overlay: true;">                   
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <div style="
        text-align: center;
        background: #efefef;
        padding: 33px !important;
        margin: -20px !important;
        margin-bottom: 25px !important;
        ">
        <img src="#logo_medium#" alt="" width="160px">
        <p style="color: #666">#account_name# | Seu ID: <b>532-#account_id#</b></p>

    </div>

    <ul class="uk-nav-default uk-margin-bottom" uk-nav>
        <li class="uk-nav-header" style="font-size: 16px; color: #666; margin-left: 20px;">Orçamentos</li>
        <li><a href="#base#meu-painel/orcamentos/">Disponiveis</a></li>
        <li><a href="#base#meu-painel/aceitos/">Aceitos</a></li>
        <li><a href="#base#meu-painel/favoritos/">Favoritos</a></li>
        <li><a href="#base#meu-painel/rejeitados/">Rejeitados</a></li>
    </ul> 

    <ul class="uk-nav-default uk-margin-bottom" uk-nav>
        <li class="uk-nav-header" style="font-size: 16px; color: #666; margin-left: 20px;">Configurações</li>
        <li><a href="#base#meu-painel/configuracoes/">Minhas informações</a></li>
        <!-- <li><a href="#base#meu-painel/trocar-senha/">Trocar senha</a></li> -->
        <li><a href="#base#meu-painel/transacoes/">Minhas compras</a></li>
        <li><a href="#base#login">Sair</a></li>
    </ul>      
</div>
</div>

<!-- Top Menu Desktop -->
<div class="uk-box-shadow-small uk-visible@m uk-light" style="background-color: #052846;" uk-sticky>
    <nav class="uk-navbar-container" uk-navbar="mode: click" style="padding: 0 140px; background-color: #052846;">
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="#base_adm#">
                <img src="#logo_mono#" alt="" width="150px">
            </a>
        </div>
        <div class="uk-navbar-right">
            <div>#account_name# | Seu ID: <b>532-#account_id#</b></div>
            <div class="uk-visible@m">
                <ul class="uk-navbar-nav">
                    <li><a href=""><i class="uk-icon-button" uk-icon="user"></i></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="#base#meu-painel/configuracoes/">Minhas informações</a></li>
                                <!-- <li><a href="#base#meu-painel/trocar-senha/">Trocar senha</a></li> -->
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
<div nav="001" class="uk-box-shadow-small uk-hidden@m uk-light" style="background-color: #052846;" uk-sticky>
    <nav class="uk-navbar-container-large" uk-navbar="mode: click">
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li class="uk-navbar-item">
                    <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#" uk-toggle="target: .offcanvas-overlay-left"></a>
                </li>
                <li class="uk-navbar-item">
                    <a class="uk-navbar-item uk-logo" href="#base_adm#">
                        <img src="#logo_mono#" alt="" width="150px">
                    </a>
                </li>
            </ul>
        </div>
        <!-- <div class="uk-navbar-right"></div> -->
        <!-- <div class="uk-navbar-center"></div> -->
    </nav>
</div>