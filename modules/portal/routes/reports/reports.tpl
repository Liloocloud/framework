<link rel="stylesheet" href="#ROUTE_BASE#reports/style.css">

<input type="hidden" id="tpl-id" value="#tpl_id#">
<div id="menu-top-create" class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom" style="position: fixed;">
    <div>
        <h1>Relatórios</h1>
    </div>
    <div class="uk-width-1-2@m">
        <div class="uk-text-right">
            <a href="#" class="uk-icon-button uk-margin-small-right" id="init-filter"><i class="fas fa-filter"></i></a>
            <input type="text" class="uk-input uk-width-1-3@m uk-width-1-2@s" name="daterange_principal" value=""
                liloo-daterange>
            <a id="btn-config-edit" type="button" class="uk-button uk-button-primary uk-button-small"><i
                    class="fas fa-download"></i> Exportar</a>
            <!-- <button id="btn-create-product" type="button" class="uk-button uk-button-primary uk-button-small dropzone-button-upload">Salvar</button> -->
            <!-- <a href="#BASE_ADMIN#templates/pages/" class="uk-button uk-button-primary uk-button-small">Todas as páginas</a> -->
        </div>
    </div>
</div>
<div style="margin-top: 70px;"></div>

<!-- Relatório global -->
<div class="uk-margin-bottom liloo-all-reports">
    <div class="uk-grid-small uk-grid-match" uk-grid>
        <!-- Cards com os Valores Totais -->
        <div class="uk-width-expand@m">
            <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>

                <!-- INTERAÇÕES -->
                <div>
                    <div class="uk-card uk-card-default uk-padding-small">
                        <div class="uk-flex uk-flex-between uk-padding-remove">
                            <img src="#BASE_IMAGE#association.svg" alt="Interações" width="40px">
                            <div class="uk-text-large"><span class="uk-text-large reports_interactions_return">
                                    <div uk-spinner></div>
                                </span></div>
                        </div>
                        <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                            <div class="uk-width-expand">
                                <h5 class="uk-margin-remove-bottom">Interações</h5>
                                <p class="uk-margin-remove-top uk-text-xsmall">Ações e interações de contatos realizadas
                                    no site</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SESSION -->
                <div>
                    <div class="uk-card uk-card-default uk-padding-small">
                        <div class="uk-flex uk-flex-between uk-padding-remove">
                            <img src="#BASE_IMAGE#session.svg" alt="Sessões" width="45px">
                            <div class="uk-text-large"><span class="uk-text-large reports_sessions_return">
                                    <div uk-spinner></div>
                                </span></div>
                        </div>
                        <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                            <div class="uk-width-expand">
                                <h5 class="uk-margin-remove-bottom">Total de Sessões</h5>
                                <p class="uk-margin-remove-top uk-text-xsmall">Total de Sessões iniciadas ao carregar a
                                    página</p>
                                <!-- <a href="#" class="uk-button uk-button-primary uk-width-1-1">Lista completa</a> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CLIQUES BOTÃO DO WHATSAPP -->
                <div>
                    <div class="uk-card uk-card-default uk-padding-small">
                        <div class="uk-flex uk-flex-between uk-padding-remove">
                            <img src="#BASE_IMAGE#click-button-whatsapp.svg" alt="Whatsapp" width="45px">
                            <div class="uk-text-large"><span class="uk-text-large reports_clicks_return">
                                    <div uk-spinner></div>
                                </span></div>
                        </div>
                        <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                            <div class="uk-width-expand">
                                <h5 class="uk-margin-remove-bottom">Botão Whatsapp</h5>
                                <p class="uk-margin-remove-top uk-text-xsmall">Usuários que clicaram no botão do
                                    Whatsapp</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CONVERSA WHATSAPP -->
                <div>
                    <div class="uk-card uk-card-default uk-padding-small">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <img src="#BASE_IMAGE#whatsapp.svg" alt="Whatsapp" width="40px">
                            <div class="uk-text-large"><span class="uk-text-large reports_whatsapp_return">
                                    <div uk-spinner></div>
                                </span></div>
                        </div>
                        <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                            <div class="uk-width-expand">
                                <h5 class="uk-margin-remove-bottom">Whatsapp</h5>
                                <p class="uk-margin-remove-top uk-text-xsmall">Usuários que clicaram em "Iniciaram a
                                    Conversa"</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TELEFONE -->
                <div>
                    <div class="uk-card uk-card-default uk-padding-small">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <img src="#BASE_IMAGE#unlock-phone.svg" alt="Visualização no Telefone" width="25px">
                            <div class="uk-text-large"><span class="uk-text-large reports_phone_return">
                                    <div uk-spinner></div>
                                </span></div>
                        </div>
                        <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                            <div class="uk-width-expand">
                                <h5 class="uk-margin-remove-bottom">Ver Telefone</h5>
                                <p class="uk-margin-remove-top uk-text-xsmall">Usuários que clicaram para ver o telefone
                                </p>
                                <!-- <a href="#" class="uk-button uk-button-primary uk-width-1-1">Lista completa</a> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORMULÁRIOS -->
                <div>
                    <div class="uk-card uk-card-default uk-padding-small">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <img src="#BASE_IMAGE#contact-form.svg" alt="Interações" width="40px">
                            <div class="uk-text-large"><span class="uk-text-large reports_form_return">
                                    <div uk-spinner></div>
                                </span></div>
                        </div>
                        <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                            <div class="uk-width-expand">
                                <h5 class="uk-margin-remove-bottom">Formulários Enviados</h5>
                                <p class="uk-margin-remove-top uk-text-xsmall">Usuários que preencheram o formulário</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Funil com o Total dos resultados -->
        <div class="uk-width-1-4@m">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Funil</h4>
                    <p>Resumo do andamento</p>
                </div>
                <div class="uk-card-body uk-text-center liloo-funil">
                    <div style="background: #047866; width: 100%"><span class="uk-text-small">Sessões</span> <b
                            class="reports_sessions_return"> - </b></div>
                    <div style="background: #74a83a; width: 90%;"><span class="uk-text-small">Interações</span> <b
                            class="reports_interactions_return"> - </b></div>
                    <div style="background: #ffb219; width: 80%;"><span class="uk-text-small">Conversão</span> <b
                            class="reports_convertions_return"> - </b></div>
                    <div style="background: #ff6e00; width: 70%;"><span class="uk-text-small">Interesse</span> <b> -
                        </b></div>
                    <div style="background: #be0d0d; width: 60%;"><span class="uk-text-small">Vendas</span> <b> - </b>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico -->
        <div class="uk-width-1-4@m">
            #grafic#
        </div>
    </div>
</div>

<div class="uk-margin">
    <h2>Contatos</h2>
</div>

<!-- Listagem de contato -->
<div class="uk-child-width-1-3@m uk-grid-small" uk-grid="masonry: true">

    <div id="list-leads-whatsapp" class="list-lead">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <h4>Leads via Whatsapp</h4>
                <p style="margin-top: -20px; font-size: 12px;">Usuários que iniciaram uma conversa pelo Whatsapp</p>
            </div>
            <div class="uk-card-body uk-padding-remove">
                <!-- Rodando a listagem -->
            </div>
        </div>
    </div>

    <div id="list-leads-form" class="list-lead">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <h4>Leads via Formulário</h4>
                <p style="margin-top: -20px; font-size: 12px;">Usuários que preencheram o formulário</p>
            </div>
            <div class="uk-card-body uk-padding-remove">
                <!-- Rodando a listagem -->
            </div>
        </div>
    </div>

</div>

<div class="uk-margin">
    <h2>Canais de Marketing</h2>
</div>


<!-- Canais -->
<div id="grid-channels" class="uk-child-width-1-5@m uk-grid-small uk-grid-match" uk-grid>

    <!-- INTERAÇÕES FAO (FACEBOOK ORGANICO) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#facebook-organic.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Facebook SMM: <span>58</span></h4>
                </div>
                <div>
                    <div class="uk-inline">
                        <a href="" uk-icon="info"></a>
                        <div uk-drop="mode: click; pos: top-right;">
                            <div class="uk-card uk-card-body uk-card-default uk-padding-small uk-text-small">Todas as
                                interações vindas de links que você utilizou na rede social do facebook. Essa métrica só
                                será precisa se você utilizar o links de acompanhamento.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários vindas de postagens no facebook
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- INTERAÇÕES FAA (FACEBOOK ADS) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#facebook-ads.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Facebook Ads: <span>63</span></h4>
                </div>
                <div>
                    <div class="uk-inline">
                        <a href="" uk-icon="info"></a>
                        <div uk-drop="mode: click; pos: top-right;">
                            <div class="uk-card uk-card-body uk-card-default uk-padding-small uk-text-small">Todas as
                                interações vindas de links que você utilizou em campanhas no facebook. Essa métrica só
                                será precisa se você utilizar o links de acompanhamento.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários vindas de campanhas do facebook
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- GOOGLE ADS (CAMPANHAS GOOGLE) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#google-ads.svg" alt="Google Ads" width="60px">
                    <h4 class="uk-margin-remove-bottom">Google Ads: <span>7</span></h4>
                </div>
                <div>
                    <div class="uk-inline">
                        <a href="" uk-icon="info"></a>
                        <div uk-drop="mode: click; pos: top-right;">
                            <div class="uk-card uk-card-body uk-card-default uk-padding-small uk-text-small">Todas as
                                interações vindas de links que você utilizou em campanhas no Google. Essa métrica só
                                será precisa se você utilizar o links de acompanhamento.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários vindas de campanhas no Google
                        Ads</p>
                </div>
            </div>
        </div>
    </div>

    <!-- INSTAGRAM ORGANICO (INO) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#instagram-organic.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Instragram SMM: <span>63</span></h4>
                </div>
                <div>
                    <div class="uk-inline">
                        <a href="" uk-icon="info"></a>
                        <div uk-drop="mode: click; pos: top-right;">
                            <div class="uk-card uk-card-body uk-card-default uk-padding-small uk-text-small">Todas as
                                interações vindas de links que você utilizou em postagens no Instragram. Essa métrica só
                                será precisa se você utilizar o links de acompanhamento.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários vindas de postagens no
                        Instagram</p>
                </div>
            </div>
        </div>
    </div>

    <!-- YOUTUBE (YTB) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#youtube-link.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Youtube link: <span>63</span></h4>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários que vieram de link do Youtube
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- YOUTUBE ADS(YTB) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#youtube-link.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Youtube Ads: <span>6</span></h4>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários que vieram de campanhas de vídeo no Youtube
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- LINKEDIN (lka) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#linkedin-ads.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Linkedin Ads: <span>12</span></h4>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários que vieram de campanhas no Linkedin Ads
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- QR CODE (QRC) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#qr-code-scan.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">QR-Code: <span>2</span></h4>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários com seus QR-Code's</p>
                </div>
            </div>
        </div>
    </div>

    <!-- RECOMENDAÇÃO (QRC) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#recommendation.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Recomendação: <span>5</span></h4>
                </div>
                <div>
                    <div class="uk-inline">
                        <a href="" uk-icon="info"></a>
                        <div uk-drop="mode: click; pos: top-right;">
                            <div class="uk-card uk-card-body uk-card-default uk-padding-small uk-text-small">Todas as
                                interações vindas de recomendações de clientes.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários que foram indicados</p>
                </div>
            </div>
        </div>
    </div>

    <!-- BACKLINK (BLK) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#backlink.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Backlink's: <span>2</span></h4>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários que vieram de link Building</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CARTÃO INTERATIVO (CTI) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#interactive-card.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Cartão Interativo: <span>7</span></h4>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários que vieram pelo seu cartão interativo</p>
                </div>
            </div>
        </div>
    </div>

    <!-- E-MAIL MARKETING (emk) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#email-mkt.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">E-mail Marketing: <span>23</span></h4>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários que vieram de campanhas de E-mail Marketing</p>
                </div>
            </div>
        </div>
    </div>

    <!-- LISTA DE TRANSMISSÃO WHATSAPP  (wtl) -->
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <div>
                    <img src="#BASE_IMAGE#whatsapp-list.svg" alt="Facebook Orgânico" width="55px">
                    <h4 class="uk-margin-remove-bottom">Lista de Transmissão: <span>23</span></h4>
                </div>
            </div>
            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <p class="uk-margin-remove-top uk-text-small">Interações de usuários de sua lista de transmissão do Whatsapp</p>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="uk-margin-xlarge"></div>