<div class="uk-container">
    <div class="uk-child-width-1-1@m uk-grid-small" uk-grid="masonry: true">

        <!-- Colaboradores -->
        <div class="workers-list">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <div class="uk-flex uk-flex-between">
                        <div>
                            <h4>Colaboradores</h4>
                            <p class="uk-text-small">Lista de colaboradores</p>
                        </div>
                        <div>
                            <a href="#" class="uk-button uk-button-primary uk-button-xsmall" id="teste"><i
                                    class="fas fa-plus"></i> Novo</a>
                        </div>
                    </div>
                    <form id="search-workers" class="uk-grid-collapse" uk-grid>
                        <input type="hidden" name="action" value="agency/workers/search">
                        <input type="hidden" name="path" value="modules/agency/dash/routes/workers/ajax">
                        <div class="uk-inline">
                            <button class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></button>
                            <button type="reset" onclick="$('input[name=worker_search]').removeClass('uk-form-danger')"
                                class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: close"
                                style="margin-right: 40px;"></button>
                            <input class="uk-input uk-width-large" name="worker_search" type="text"
                                placeholder="Testando">
                        </div>
                    </form>
                </div>
                <div class="uk-card-body uk-padding-remove teste">
                    <ul class="uk-list uk-list-large uk-list-striped" id="agency_workers_list">
                        #agency_workers_list#
                    </ul>
                </div>
            </div>
        </div>

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


<!-- Modal single do usuário -->
<div class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
    <button class="uk-modal-close-full uk-close-large" type="button" uk-close
        style="position: fixed !important; top: 0; right: 0;"></button>
    <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">

        <div class="uk-flex uk-flex-between uk-flex-middle">
            <div class="uk-align-left uk-width-1-2">
                <h4 class="uk-margin-small uk-margin-remove-bottom"><span class="account_name"></span> <span class="account_lastname"></span></h4>
                <p class="uk-margin-remove-top"><span class="modal-title"></span></p>
            </div>
        </div>

        <div class="uk-child-width-1-3@m uk-grid-small" uk-grid>

            <div>
                <div class="uk-card uk-card-default uk-margin-bottom">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Contato</h4>
                        <p>Informações de contato do colaborador</p>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <ul class="uk-list">
                            <li>ID: <span class="account_id"></span></li>
                            <li><span class="account_phone"></span></li>
                            <li><span class="account_email"></span></li>
                            <li><span class="account_cpf"></span> <span class="account_cnpj"></span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-default uk-margin-bottom">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Funções</h4>
                        <p>Lista das funções exercidas pelo colaborador</p>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <span class="categ_title">
                    </div>
                </div>
            </div>

            <!-- <div>
                <div class="uk-card uk-card-default uk-margin-bottom">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Nível de permissão</h4>
                        <p>Você pode alterar o nível de permissão de acesso</p>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <p>7 - Colaborador</p>
                    </div>
                </div>
            </div> -->

            <!-- <div>
                <div class="uk-card uk-card-default uk-margin-bottom">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Desempenho</h4>
                        <p>Gráfico do desempenho das tarefas</p>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <p>7 - Colaborador</p>
                    </div>
                </div>
            </div> -->


        </div>
    </div>
</div>


<!-- Cadastrando novo colaborador -->
<a class="liloo-btn-plus" href="#modal-new-matrix" uk-toggle><i class="fa fa-plus"></i></a>
<div id="modal-new-matrix" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <form data-liloo method="post" autocomplete="off">
            <div class="uk-modal-header uk-padding-small">
                <h4>Nova Colaborador</h4>
            </div>
            <div class="uk-modal-body uk-padding-small uk-grid-collapse" uk-grid>
                <input type="hidden" name="action" value="create_account_dash">
                <input type="hidden" name="path" value="modules/accounts/ajax/AdminAccounts">

                <input type="hidden" name="account_auth" value="1">
                <input type="hidden" name="account_accept_terms" value="1">
                <input type="hidden" name="account_coin" value="1">
                <input type="hidden" name="account_status" value="1">

                <div class="uk-width-1-1">
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-2@s">
                            <label class="uk-form-label">Nome</label>
                            <div class="uk-form-controls">
                                <input name="account_name" class="uk-input" type="text" autofocus required
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="uk-width-1-2@s">
                            <label class="uk-form-label">Sobrenome</label>
                            <div class="uk-form-controls">
                                <input name="account_lastname" class="uk-input" type="text" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-1">
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-2@s">
                            <label class="uk-form-label">E-mail</label>
                            <div class="uk-form-controls">
                                <input name="account_email" class="uk-input" type="mail" required autocomplete="off">
                            </div>
                        </div>
                        <div class="uk-width-1-2@s">
                            <label class="uk-form-label">Nível de permissão</label>
                            <div class="uk-form-controls">
                                <select name="account_level" class="uk-select" required>
                                    <option value="" selected="selected">Selecione...</option>
                                    <option value="11">11 - Super Admin</option>
                                    <option value="10">10 - Administrador</option>
                                    <option value="9">9 - Gerente</option>
                                    <option value="8">8 - Editor</option>
                                    <option value="7">7 - Colaborador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-1">
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-3@s">
                            <label class="uk-form-label">Whatsapp</label>
                            <div class="uk-form-controls">
                                <input name="account_phone" class="uk-input" required type="text" liloo-mask-phone>
                            </div>
                        </div>
                        <div class="uk-width-1-3@s">
                            <label class="uk-form-label">CPF</label>
                            <div class="uk-form-controls">
                                <input name="account_cpf" class="uk-input" type="text" liloo-mask-cpf>
                            </div>
                        </div>
                        <div class="uk-width-1-3@s">
                            <label class="uk-form-label">CNPJ</label>
                            <div class="uk-form-controls">
                                <input name="account_cnpj" class="uk-input" type="text" liloo-mask-cnpj>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-1">
                    <label class="uk-form-label">Senha</label>
                    <div class="uk-form-controls">
                        <input name="account_password" class="uk-input" type="password" required
                            autocomplete="new-password">
                    </div>
                </div>

            </div>
            <div class="uk-modal-footer uk-text-right uk-padding-small">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit">Adicionar</button>
            </div>
        </form>


    </div>
</div>