<div id="menu-top-create" class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom" style="position: fixed;">
    <div>
        <h1>Configurações Gerais</h1>
    </div>
    <div class="uk-width-1-2@m">
        <div class="uk-text-right">
            <!-- <a id="btn-config-edit" type="button" class="uk-button uk-button-primary uk-button-small"><i
                    class="fas fa-download"></i> Exportar</a> -->
            <!-- <button id="btn-create-product" type="button" class="uk-button uk-button-primary uk-button-small dropzone-button-upload">Salvar</button> -->
            <!-- <a href="#BASE_ADMIN#templates/pages/" class="uk-button uk-button-primary uk-button-small">Todas as páginas</a> -->
        </div>
    </div>
</div>
<div style="margin-top: 70px;"></div>

<!-- SCRIPTS -->
<div class="uk-margin-bottom">
    <div class="uk-margin">
        <h2>Scripts, Tags e Pixels</h2>
    </div>
    <div class="uk-child-width-1-4@m uk-grid-small uk-grid-match" uk-grid>

        <!-- HEADER DO SITE -->
        <div uk-toggle="target: #modal-header">
            <div class="uk-card uk-card-default uk-padding-small">
                <div class="uk-flex uk-flex-between">
                    <h2>Head</h2>
                    <i class="fas fa-heading fa-3x"></i>
                    <!-- <span uk-icon="icon: google; ratio: 2"></span> -->
                </div>
                <p>Inclua scripts que necessitam ser adicionardos no início das páginas do site</p>
            </div>
            <div id="modal-header" class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close
                    style="position: fixed !important; top: 0; right: 0;"></button>
                <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
                    <div class="liloo-modal-full-content">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <div class="uk-align-left uk-width-1-2">
                                <h2 class="uk-margin-small uk-margin-remove-bottom">Head</h2>
                            </div>
                            <button id="btn-head" type="button" class="uk-button uk-button-primary uk-button-">Atualizar</button>
                        </div>
                        <div id="head-tags"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- GOOGLE ADS -->
        <div uk-toggle="target: #modal-google">
            <div class="uk-card uk-card-default uk-padding-small">
                <div class="uk-flex uk-flex-between">
                    <h2>Google</h2>
                    <i class="fab fa-google fa-3x"></i>
                    <!-- <span uk-icon="icon: google; ratio: 2"></span> -->
                </div>
                <p>Configurações de Tags das plataformas do Google como: GTM, Analytics, Ads e Tags de Conversão</p>
            </div>
            <div id="modal-google" class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close
                    style="position: fixed !important; top: 0; right: 0;"></button>
                <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
                    <div class="liloo-modal-full-content">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <div class="uk-align-left uk-width-1-2">
                                <h2 class="uk-margin-small uk-margin-remove-bottom">Google</h2>
                            </div>
                            <button id="btn-google" type="button" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                        </div>
                        <div id="google-tags"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FACEBOOK ADS -->
        <div uk-toggle="target: #modal-facebook">
            <div class="uk-card uk-card-default uk-padding-small">
                <div class="uk-flex uk-flex-between">
                    <h2>Facebook</h2>
                    <i class="fab fa-facebook fa-3x"></i>
                    <!-- <span uk-icon="icon: facebook; ratio: 2"></span> -->
                </div>
                <p>Configurações de Pixels das plataformas do Facebook como: Global, Conversão e Verificação</p>
            </div>
            <div id="modal-facebook" class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close
                    style="position: fixed !important; top: 0; right: 0;"></button>
                <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
                    <div class="liloo-modal-full-content">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <div class="uk-align-left uk-width-1-2">
                                <h2 class="uk-margin-small uk-margin-remove-bottom">Facebook</h2>
                            </div>
                            <button id="btn-facebook" type="button" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                        </div>
                        <div id="facebook-pixels"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HOTJAR ADS -->
        <div uk-toggle="target: #modal-hotjar">
            <div class="uk-card uk-card-default uk-padding-small">
                <div class="uk-flex uk-flex-between">
                    <h2>Hotjar</h2>
                    <i class="fab fa-hotjar fa-3x"></i>
                    <!-- <span uk-icon="icon: facebook; ratio: 2"></span> -->
                </div>
                <p>Ferramenta de mapa de calor do site que oferece informações sobre o que os visitantes fazem em suas
                    páginas</p>
            </div>
            <div id="modal-hotjar" class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close
                    style="position: fixed !important; top: 0; right: 0;"></button>
                <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
                    <div class="liloo-modal-full-content">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <div class="uk-align-left uk-width-1-2">
                                <h2 class="uk-margin-small uk-margin-remove-bottom">Hotjar</h2>
                            </div>
                            <button id="btn-hotjar" type="button" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                        </div>
                        <div id="hotjar-script"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- CRM -->
<div class="uk-margin-bottom">
    <div class="uk-margin">
        <h2>Configurações de Funil de Vendas</h2>
    </div>
</div>

<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
    
    <!-- Funil de vendas -->
    <div uk-toggle="target: #modal-pipeline">
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between">
                <h2>Funil de Venda</h2>
                <i class="fal fa-funnel-dollar fa-3x"></i>
                <!-- <span uk-icon="icon: google; ratio: 2"></span> -->
            </div>
            <p>Inclua scripts que necessitam ser adicionardos no início das páginas do site</p>
        </div>
        <div id="modal-pipeline" class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close
                style="position: fixed !important; top: 0; right: 0;"></button>
            <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
                <div class="liloo-modal-full-content">
                    <div class="uk-flex uk-flex-between uk-flex-middle">
                        <div class="uk-align-left uk-width-1-2">
                            <h2 class="uk-margin-small uk-margin-remove-bottom">Funis de Venda</h2>
                        </div>
                        <div>
                            <!-- <button id="btn-head" type="button" class="uk-button uk-button-primary uk-button-small">Novo funil</button> -->
                            <!-- <button id="btn-head" type="button" class="uk-button uk-button-primary uk-button-small">Atualizar</button> -->
                        </div>
                    </div>
                    <!-- <div id="head-tags"></div> -->

                    <div id="content-modal-pipeline">
                        <div id="pipeline-listing"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal de Atualização da Pipeline -->
<div id="modal-update-pipe" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-small">
        <h2 class="uk-modal-title">Atualizando Coluna (Pipeline)</h2>
        <p>A atualização não interronpe o uso da pipeline</p>
        
        <div class="uk-margin">
            <div id="content-modal-update-pipe"></div>
        </div>
        
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Fechar</button>
            <button id="btn-update-new-pipeline" class="uk-button uk-button-primary" type="button">Atualizar</button>
        </p>
    </div>
</div>

<div class="callback"></div>
<div class="uk-margin-large"></div>