<div class="uk-grid-small" uk-grid>

    <!-- Colaboradores -->
    <div class="uk-width-expand@m">
        <div class="workers-list">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <div class="uk-flex uk-flex-between">
                        <div>
                            <h4>Contas de usuários</h4>
                            <p class="uk-text-small">Controle de contas de usuário. Faça sua busca abaixo</p>
                        </div>
                        <div>
                            <button type="button" class="uk-button uk-button-primary uk-button-xsmall refresh-list"><i
                                    class="fas fa-redo"></i> Recarregar lista</button>
                        </div>
                    </div>
                    <form id="search-user" class="uk-grid-collapse" uk-grid>
                        <input type="hidden" name="action" value="accounts/users/search">
                        <input type="hidden" name="path" value="modules/accounts/routes/manager/ajax">
                        <div class="uk-inline">
                            <button class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></button>
                            <button type="reset" class="uk-form-icon uk-form-icon-flip refresh-list" href="#"
                                uk-icon="icon: close" style="margin-right: 40px;"></button>
                            <input class="uk-input uk-width-large" name="users_search" type="text"
                                placeholder="Busque por Nome, E-mail, CPF, CNPJ, Telenone ou ID">
                        </div>
                    </form>
                </div>
                <div class="uk-card-body uk-padding-remove teste">
                    <ul class="uk-list uk-list-large uk-list-striped" id="account_users_list">
                        <div uk-spinner></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Total de usuários -->
    <div class="uk-width-1-3@m">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <h4>Total de usuários</h4>
            </div>
            <div class="uk-card-body uk-padding-small">
                <ul class="uk-list">
                    <li>Validados: <b class="users-valid">
                            <div uk-spinner></div>
                        </b></li>
                    <li>Termos aceitos: <b class="users-term">
                            <div uk-spinner></div>
                        </b></li>
                    <li>Ativos: <b class="users-active">
                            <div uk-spinner></div>
                        </b></li>
                    <li>Inativos: <b class="users-inactive">
                            <div uk-spinner></div>
                        </b></li>
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


<!-- Modal single do usuário -->
<div class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
    <button class="uk-modal-close-full uk-close-large" type="button" uk-close
        style="position: fixed !important; top: 0; right: 0;"></button>
    <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">

        <div class="uk-flex uk-flex-between uk-flex-middle">
            <div class="uk-align-left uk-width-1-2">
                <h4 class="uk-margin-small uk-margin-remove-bottom"><span class="account_name"></span> <span
                        class="account_lastname"></span></h4>
                <p class="uk-margin-remove-top">Último login: <span class="account_last_login"></span></p>
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
                        <h4>Informações</h4>
                        <p>Dados de configurações da conta</p>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <ul class="uk-list">
                            <li>Registrado em: <span class="account_registered"></span></li>
                            <li>Status da conta: <span class="account_status"></span></li>
                            <li>Nível de permissão: <span class="account_level"></span></li>
                        </ul>

                    </div>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-default uk-margin-bottom">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Token</h4>
                        <p>Informação para consumo API</p>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <ul class="uk-list">
                            <span class="account_token"></span>
                        </ul>

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


<!-- Cadastrando -->
<a class="liloo-btn-plus" href="#modal-new-user" uk-toggle><i class="fa fa-plus"></i></a>
<div id="modal-new-user" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <form id="create-user" method="post" autocomplete="off">
            <div class="uk-modal-header uk-padding-small">
                <h4>Nova conta de usuário</h4>
            </div>

            <div class="uk-modal-body uk-padding-small uk-grid-collapse" uk-grid>
                <input type="hidden" name="action" value="accounts/users/create">
                <input type="hidden" name="path" value="modules/accounts/routes/manager/ajax">
                <input type="hidden" name="account_auth" value="1">
                <input type="hidden" name="account_coin" value="1">

                <div class="uk-width-1-1">

                    <div liloo-alerts></div>

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
                                    <option value="7" selected="selected">07 - Usuário</option>
                                    <option value="8">08 - Editor</option>
                                    <option value="9">09 - Gerente</option>
                                    <option value="10">10 - Administrador</option>
                                    <option value="11">11 - Super Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-1">
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-3@s">
                            <label class="uk-form-label">Telefone/Whatsapp</label>
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
                    <div class="uk-grid-small" uk-grid>

                        <div class="uk-width-1-3@s">
                            <label class="uk-form-label">Status do usuário</label>
                            <div class="uk-form-controls">
                                <label><input class="uk-radio" type="radio" name="account_status" value="1" checked>
                                    Ativar</label>
                                <label><input class="uk-radio" type="radio" name="account_status" value="0">
                                    Inativar</label>
                            </div>
                        </div>

                        <div class="uk-width-1-3@s">
                            <label class="uk-form-label">Aceitar Termos</label>
                            <div class="uk-form-controls">
                                <label><input class="uk-radio" type="radio" name="account_accept_terms" value="1"
                                        checked> Sim</label>
                                <label><input class="uk-radio" type="radio" name="account_accept_terms" value="0">
                                    Não</label>
                            </div>
                        </div>

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