<!-- MODAL -->
<div id="faa" class="uk-modal-full" tabindex="0" uk-modal>
    <button class="uk-modal-close-full uk-close-large" type="button" uk-close
        style="position: fixed !important; top: 0; right: 0;"></button>
    <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">

        <div class="uk-flex uk-flex-between uk-flex-middle">
            <div class="uk-align-left uk-width-1-2">
                <img src="#BASE_THEME_UPLOADS#icons/facebook-ads.svg" alt="Interações" width="70px">
                <h4 class="uk-margin-small uk-margin-remove-bottom">#title#</h4>
                <p class="uk-margin-remove-top">#desc#</p>
            </div>
            <div class="uk-align-right uk-width-1-2">
                <a href="">fdsf</a>
            </div>
        </div>

        <div class="uk-grid-small uk-child-width-1-3@s" uk-grid>

            <!-- Parte 1 -->
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Funil</h4>
                        <p>Resumo do andamento</p>
                    </div>
                    <div class="uk-card-body uk-text-center liloo-funil">
                        <div style="background: #12B199; width: 100%"><span class="uk-text-small">Sessões</span>
                            <b>1234</b></div>
                        <div style="background: #8CC64B; width: 90%;"><span class="uk-text-small">Interações</span>
                            <b>598</b></div>
                        <div style="background: #D8CF2A; width: 80%;"><span class="uk-text-small">Conversão</span>
                            <b>258</b></div>
                        <div style="background: #F5822C; width: 70%;"><span class="uk-text-small">Interesse</span>
                            <b>58</b></div>
                        <div style="background: #CC2331; width: 60%;"><span class="uk-text-small">Vendas</span> <b>2</b>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parte 2 -->
            <div>
                <?php
                    _card_graphic([
                        "title" => "Percentual de Contatos",
                        "desc" => "Visual Geral das Interações de Usuário no site",
                        "type" => "doughnut",
                        "data" => [
                            "labels" => "
                                'Clique no Botão do Whatsapp',
                                'Contatos pelo Whatsapp',
                                'Visualizações do Telefone',
                                'Formulários Enviados'
                            ",
                            "values" => "
                                '58',
                                '15',
                                '25',
                                '8'
                            ",
                            "colors" => "
                                'rgb(16,149,24)',
                                'rgb(54, 162, 235)',
                                'rgb(255,153,0)',
                                'rgb(220,57,18)'
                            "
                        ],
                    ]);
                    ?>
            </div>

            <!-- Parte 3 -->
            <div>
                <div class="uk-child-width-1-2@m uk-grid-small uk-grid-match" uk-grid>
                    <!-- INTERAÇÕES -->
                    <div>
                        <div class="uk-card uk-card-default uk-padding-small">
                            <div class="uk-flex uk-flex-between uk-padding-remove">
                                <img src="#BASE_UPLOADS#icons/association.svg" alt="Interações" width="30px">
                                <div class="uk-text-large"><span class="uk-text-large #interactions#">
                                        <div uk-spinner></div>
                                    </span></div>
                            </div>
                            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                                <div class="uk-width-expand">
                                    <h5 class="uk-margin-remove-bottom">Interações</h5>
                                    <p class="uk-margin-remove-top uk-text-xsmall">Ações e interações de contatos
                                        realizadas no site</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SESSION -->
                    <div>
                        <div class="uk-card uk-card-default uk-padding-small">
                            <div class="uk-flex uk-flex-between uk-padding-remove">
                                <img src="#BASE_UPLOADS#icons/session.svg" alt="Sessões" width="30px">
                                <div class="uk-text-large"><span class="uk-text-large #session#">
                                        <div uk-spinner></div>
                                    </span></div>
                            </div>
                            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                                <div class="uk-width-expand">
                                    <h5 class="uk-margin-remove-bottom">Interações</h5>
                                    <p class="uk-margin-remove-top uk-text-xsmall">Ações e interações de contatos
                                        realizadas no site</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CLIQUES BOTÃO DO WHATSAPP -->
                    <div>
                        <div class="uk-card uk-card-default uk-padding-small">

                            <div class="uk-flex uk-flex-between uk-padding-remove">
                                <img src="<?= BASE_UPLOADS ?>icons/click-button-whatsapp.svg" alt="Whatsapp"
                                    width="45px">
                                <div>
                                    <div class="uk-inline">
                                        <a href="" class="uk-icon-button" uk-icon="info"></a>
                                        <div uk-drop="mode: click; pos: top-right;">
                                            <div
                                                class="uk-card uk-card-body uk-card-default uk-padding-small uk-text-small">
                                                Todas as interações vindas de links que você utilizou na rede social do
                                                facebook. Essa métrica só será precisa se você utilizar o links de
                                                acompanhamento.</div>
                                        </div>
                                    </div>
                                    <div class="uk-inline">
                                        <a href="" class="uk-icon-button" uk-icon="more-vertical"></a>
                                        <div uk-drop="mode: click; pos: top-right;">
                                            <div class="uk-card uk-card-default uk-padding-small">
                                                <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
                                                    <li><a href="#">Ver relatório</a></li>
                                                    <li><a href="#">Ver relatório</a></li>
                                                    <li><a href="#">Ver relatório</a></li>
                                                    <li><a href="#">Ver relatório</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                                <div class="uk-width-expand">
                                    <?php 
                                        $Dash = _get_data_full("SELECT COUNT(contact_id) AS Clicks FROM ".TB_CONTACTS." WHERE contact_method = 'click'");
                                        $Extra['contacts_clicks'] = (isset($Dash[0]))? (int) $Dash[0]['Clicks'] : 0 ;
                                        ?>
                                    <h4 class="uk-margin-remove-bottom">Cliques:
                                        <?= $Extra['contacts_clicks'] ?>
                                    </h4>
                                    <p class="uk-margin-remove-top uk-text-small">Usuários que clicaram no botão do
                                        Whatsapp</p>
                                    <!-- <a href="#" class="uk-button uk-button-primary uk-width-1-1">Lista completa</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CONVERSA WHATSAPP -->
                    <div>
                        <div class="uk-card uk-card-default uk-padding-small">
                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                <img src="<?= BASE_UPLOADS ?>icons/whatsapp.svg" alt="Whatsapp" width="40px">
                                <!-- <a href="#" class="uk-icon-button"><img src="<?= BASE_UPLOADS ?>icons/eye-list.svg" alt="" width="18px"></a> -->
                                <!-- <a href="" class="uk-button uk-button-primary uk-button-xsmall" uk-toggle>ver lista</a> -->
                            </div>
                            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                                <div class="uk-width-expand">
                                    <?php
                                        $Dash = _get_data_full("SELECT COUNT(contact_id) AS Whatsapp FROM ".TB_CONTACTS." WHERE contact_method = 'whatsapp'");
                                        $Extra['contacts_whatsapp'] = (isset($Dash[0]))? (int) $Dash[0]['Whatsapp'] : 0;
                                        ?>
                                    <h4 class="uk-margin-remove-bottom">Whatsapp:
                                        <?= $Extra['contacts_whatsapp'] ?>
                                    </h4>
                                    <p class="uk-margin-remove-top uk-text-small">Usuários que iniciaram uma conversa
                                        pelo Whatsapp</p>
                                    <!-- <a href="#" class="uk-button uk-button-primary uk-width-1-1">Lista completa</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TELEFONE -->
                    <div>
                        <div class="uk-card uk-card-default uk-padding-small">
                            <img src="<?= BASE_UPLOADS ?>icons/unlock-phone.svg" alt="Visualização no Telefone"
                                width="25px">
                            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                                <div class="uk-width-expand">
                                    <?php
                                        $Dash = _get_data_full("SELECT COUNT(contact_id) AS Phone FROM ".TB_CONTACTS." WHERE contact_method = 'phone'");
                                        $Extra['contacts_phone'] = (isset($Dash[0]))? (int) $Dash[0]['Phone'] : 0 ;
                                        ?>
                                    <h4 class="uk-margin-remove-bottom">Telefone:
                                        <?= $Extra['contacts_phone'] ?>
                                    </h4>
                                    <p class="uk-margin-remove-top uk-text-small">Usuários que clicaram para ver o
                                        telefone</p>
                                    <!-- <a href="#" class="uk-button uk-button-primary uk-width-1-1">Lista completa</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FORMULÁRIOS -->
                    <div>
                        <div class="uk-card uk-card-default uk-padding-small">
                            <img src="<?= BASE_UPLOADS ?>icons/contact-form.svg" alt="Interações" width="40px">
                            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                                <div class="uk-width-expand">
                                    <?php
                                        $Dash = _get_data_full("SELECT COUNT(contact_id) AS Form FROM ".TB_CONTACTS." WHERE contact_method = 'form'");
                                        $Extra['contacts_form'] = (isset($Dash[0]))? (int) $Dash[0]['Form'] : 0 ;
                                        ?>
                                    <h4 class="uk-margin-remove-bottom">Formulário:
                                        <?= $Extra['contacts_form'] ?>
                                    </h4>
                                    <p class="uk-margin-remove-top uk-text-small">Usuários que preencheram o formulário
                                    </p>
                                    <!-- <a href="#" class="uk-button uk-button-primary uk-width-1-1">Lista completa</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>