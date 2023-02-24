<div class="uk-container">
    <div class="uk-child-width-1-2@m uk-grid-small" uk-grid>

        <!-- Colaboradores -->
        <div class="workers-list">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <div class="uk-flex uk-flex-between">
                        <div>
                            <h4>Contas de usuários</h4>
                            <p class="uk-text-small">Controle de contas de usuário. Faça sua busca abaixo</p>
                        </div>
                        <div>
                            <button type="button" class="uk-button uk-button-primary uk-button-xsmall refresh-list"><i class="fas fa-redo"></i> Recarregar lista</button>
                        </div>
                    </div>
                    <form id="search-user" class="uk-grid-collapse" uk-grid>
                        <input type="hidden" name="action" value="accounts/users/search">
                        <input type="hidden" name="path" value="modules/accounts/dash/routes/users/ajax">
                        <div class="uk-inline">
                            <button class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></button>
                            <button type="reset" class="uk-form-icon uk-form-icon-flip refresh-list" href="#" uk-icon="icon: close"
                                style="margin-right: 40px;"></button>
                            <input class="uk-input uk-width-large" name="users_search" type="text"
                                placeholder="Busque por Nome, E-mail, CPF, CNPJ, Telenone ou ID">
                        </div>
                    </form>
                </div>
                <div id="msg-list-ads"></div>
                <div class="uk-card-body uk-padding-remove teste">
                    <ul class="uk-list uk-list-large uk-list-striped" id="ads_listing">
                        <div uk-spinner></div>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Total de usuários -->
        <!-- <div>
            <div class="uk-child-width-1-2@m" uk-grid="masonry: true">
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header uk-padding-small">
                            <h4>Total de usuários</h4>
                        </div>
                        <div class="uk-card-body uk-padding-small">
                            <ul class="uk-list">
                                <li>Validados: <b class="users-valid"><div uk-spinner></div></b></li>
                                <li>Termos aceitos: <b class="users-term"><div uk-spinner></div></b></li>
                                <li>Ativos: <b class="users-active"><div uk-spinner></div></b></li>
                                <li>Inativos: <b class="users-inactive"><div uk-spinner></div></b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- Formulário para editar -->
        <!-- <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Localização</h4>
                    <p>Informações de localização que serão apresentados no site</p>
                </div>
                <div class="uk-card-body uk-padding-small">

                    <form data-liloo method="post" class="uk-grid-small" uk-grid>
                        <input type="hidden" name="action" value="create_account_dash">
                        <input type="hidden" name="path" value="modules/accounts/ajax/AdminAccounts">

                        <div class="uk-width-1-1 uk-margin-remove-top">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Endereço</label>
                                <div class="uk-form-controls">
                                    <input name="address_street" class="uk-input" type="text" value="<?= $Config['address_street']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Número</label>
                                <div class="uk-form-controls">
                                    <input name="address_number" class="uk-input" type="text" value="<?= $Config['address_number']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Complemento</label>
                                <div class="uk-form-controls">
                                    <input name="address_complement" class="uk-input" type="text" value="<?= $Config['address_complement']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">CEP</label>
                                <div class="uk-form-controls">
                                    <input name="address_zipcode" class="uk-input" type="text" value="<?= $Config['address_zipcode']['opt_values'] ?>" liloo-mask-zipcode required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Cidade</label>
                                <div class="uk-form-controls">
                                    <input name="address_city" class="uk-input" type="text" value="<?= $Config['address_city']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Bairro</label>
                                <div class="uk-form-controls">
                                    <input name="address_district" class="uk-input" type="text" value="<?= $Config['address_district']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Estado</label>
                                <div class="uk-form-controls">
                                    <input name="address_state" class="uk-input" type="text" value="<?= $Config['address_state']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>
 
                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>
                            <button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

        <!-- Midias Sociais -->
        <!-- <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Midias Sociais</h4>
                    <p class="uk-text-small">Informações de contato e informações de atendimento</p>
                </div>
                <div class="uk-card-body uk-padding-small">

                    <form data-liloo method="post" class="uk-grid-small" uk-grid>
                        <input type="hidden" name="action" value="config_midias">
                        <input type="hidden" name="path" value="admin/modules/configs/configsManager">


                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Facebook</label>
                                <div class="uk-form-controls">
                                    <input name="midia_facebook" class="uk-input" type="text" value="<?= $Config['midia_facebook']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Instagram</label>
                                <div class="uk-form-controls">
                                    <input name="midia_instagram" class="uk-input" type="text" value="<?= $Config['midia_instagram']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Youtube</label>
                                <div class="uk-form-controls">
                                    <input name="midia_youtube" class="uk-input" type="text" value="<?= $Config['midia_youtube']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Linkedin</label>
                                <div class="uk-form-controls">
                                    <input name="midia_linkedin" class="uk-input" type="text" value="<?= $Config['midia_linkedin']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>
                            <button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

    </div>
</div>

<!-- Modal single -->
<div class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
    <button class="uk-modal-close-full uk-close-large" type="button" uk-close
        style="position: fixed !important; top: 0; right: 0;"></button>
    <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">

        <!-- <div class="uk-flex uk-flex-between uk-flex-middle">
            <div class="uk-width-1-2">
                <h4 class="uk-margin-small uk-margin-remove-bottom"><span class="ads_title"></span></h4>
                <p class="uk-margin-remove-top">Registrado em: <span class="ads_title"></span></p>
            </div>
        </div> -->

        <div class="uk-child-width-1-3@m uk-grid-small uk-text-small uk-margin-large-top" uk-grid="masonry: true">

            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Contato</h4>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <ul class="uk-list">
                            <li><b>Telefone:</b> <span class="ads_phone"></span></li>
                            <li><b>Whatsapp:</b> <span class="ads_whatsapp"></span></li>
                            <li><b>Site:</b> <span class="ads_site"></span></li>
                            <li><b>E-mail:</b> <span class="ads_email"></span></li>
                            <li><b>#BASE#</b><span class="ads_url"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Documentos</h4>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <ul class="uk-list">
                            <li><b>CNPJ:</b> <span class="ads_cnpj"></span></li>
                            <li><b>CPF:</b> <span class="ads_cpf"></span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Informações do anúncio</h4>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <h5 class="uk-margin-remove">Título</h5>
                        <p class="ads_title uk-margin-remove-top"></p>
                        
                        <h5 class="uk-margin-remove">Descrição</h5>
                        <p class="ads_description uk-margin-remove-top"></p>
                        
                        <h5 class="uk-margin-small">Tags</h5>
                        <div class="ads_hashtags uk-margin-remove-top"></div>
                    </div>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Redes Sociais</h4>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <ul class="uk-list">
                            <li><b>Facebook:</b> <span class="ads_facebook"></span></li>
                            <li><b>Instagram:</b> <span class="ads_instagram"></span></li>
                            <li><b>TikTok:</b> <span class="ads_tiktok"></span></li>
                            <li><b>Linkedin:</b> <span class="ads_linkedin"></span></li>
                            <li><b>Youtube:</b> <span class="ads_youtube"></span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Situação do Anúncio</h4>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <ul class="uk-list">
                            <li><b>Status:</b> <span class="ads_status"></span></li>
                            <li><b>Moderação:</b> <span class="ads_moderate"></span></li>
                            <li><b>Registrado:</b> <span class="ads_registered"></span></li>
                            <li><b>Modificado:</b> <span class="ads_modify"></span></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
