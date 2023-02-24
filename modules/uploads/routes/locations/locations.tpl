<div class="uk-container">
    <div class="uk-child-width-1-3@m uk-grid-small" uk-grid>

        <!-- Todas as Cidades -->
        <div class="workers-list">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <div class="uk-flex uk-flex-between">
                        <div>
                            <h4>Listas de Cidades</h4>
                            <p class="uk-text-small">Controle de Cidades. Faça sua busca abaixo</p>
                        </div>
                        <div>
                            <button type="button" class="uk-icon-button uk-button-primary uk-button-xsmall refresh-list"><i class="fas fa-redo"></i></button>
                        </div>
                    </div>
                    <form id="search-user" class="uk-grid-collapse" uk-grid>
                        <input type="hidden" name="action" value="portal/users/search">
                        <input type="hidden" name="path" value="modules/portal/routes/categs/ajax">
                        <div class="uk-inline">
                            <button class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></button>
                            <button type="reset" class="uk-form-icon uk-form-icon-flip refresh-list" href="#"
                                uk-icon="icon: close" style="margin-right: 40px;"></button>
                            <input class="uk-input uk-width-large" name="users_search" type="text"
                                placeholder="Busque por Nome ou ID">
                        </div>
                    </form>
                </div>
                <div class="uk-card-body uk-padding-remove teste">
                    <ul class="uk-list uk-list-large uk-list-striped" id="cities_listing">
                        <div uk-spinner></div>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Todas os Bairros -->
        <div class="workers-list">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <div class="uk-flex uk-flex-between">
                        <div>
                            <h4>Listas de Bairros</h4>
                            <p class="uk-text-small">Controle de Bairros por Ref. da Cidade</p>
                        </div>
                        <div>
                            <button type="button" class="uk-icon-button uk-button-primary uk-button-xsmall refresh-list"><i class="fas fa-redo"></i></button>
                        </div>
                    </div>
                    <form id="search-user" class="uk-grid-collapse" uk-grid>
                        <input type="hidden" name="action" value="portal/users/search">
                        <input type="hidden" name="path" value="modules/portal/routes/categs/ajax">
                        <div class="uk-inline">
                            <button class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></button>
                            <button type="reset" class="uk-form-icon uk-form-icon-flip refresh-list" href="#"
                                uk-icon="icon: close" style="margin-right: 40px;"></button>
                            <input class="uk-input uk-width-large" name="users_search" type="text"
                                placeholder="Busque por Nome ou ID">
                        </div>
                    </form>
                </div>
                <div class="uk-card-body uk-padding-remove teste">
                    <ul class="uk-list uk-list-large uk-list-striped" id="districts_listing">
                        <div uk-spinner></div>
                    </ul>
                </div>
            </div>
        </div>



        <div class="workers-list">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Cadastramento de Lista</h4>
                    <p class="uk-text-small">Adiciona várias itens sendo uma por linha</p>
                </div>
                <div class="uk-card-body uk-padding-small">
                    <span class="alert-list-categs"></span>
                    
                    <div class="uk-width-1-1 uk-margin-remove-top">
                        <div class="uk-width-expand@m">
                            <label class="uk-form-label">Adicionar uma lista de:</label>
                            <div class="uk-form-controls">
                                <form>
                                    <select id="api_location_type" class="uk-select" required>
                                        <option value="" selected>Selecione...</option>
                                        <option value="api_countries">País</option>
                                        <option value="api_states">Estados</option>
                                        <option value="api_cities">Cidades</option>
                                        <option value="api_districts">Distritos / Bairros</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Adicionado País -->
                    <div id="api_countries" style="display: none;">   
                        <form api-locations method="post" class="uk-grid-small" uk-grid>
                            <input type="hidden" name="action" value="portal/locations/create/list/country">
                            <input type="hidden" name="path" value="modules/portal/routes/locations/ajax">
                            <div class="uk-width-1-1 uk-margin-remove">
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">País</label>
                                    <div class="uk-form-controls">
                                        <input name="country_name" class="uk-input" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-margin-remove">
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">Linguagem (Ex.: pr-BR)</label>
                                    <div class="uk-form-controls">
                                        <input name="country_lang" class="uk-input" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-margin">
                                <button type="submit" class="uk-button uk-button-primary uk-button-small">Criar lista</button>
                            </div>
                        </form>
                    </div>

                    <!-- Adiconando Estados -->
                    <div id="api_states" style="display: none;">   
                        <form api-locations method="post" class="uk-grid-small" uk-grid>
                            <input type="hidden" name="action" value="portal/locations/create/list/states">
                            <input type="hidden" name="path" value="modules/portal/routes/locations/ajax">             
                            <div class="uk-width-1-1 uk-margin-remove">
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">Busque o País</label>
                                    <div class="uk-form-controls">
                                        <span uk-spinner id="spinner-country" style="display: none; position: absolute; margin: 13px; right: 15px;"></span>
                                        <input type="text" id="state_set_country" class="uk-input" required>
                                    </div>
                                </div>
                            </div>    
                            <div id="listing-country" class="uk-width-1-1 uk-margin-remove" style="display: none;">
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">Lista de Estados (Um por linha com a sigla separada por ';')</label>
                                    <div class="uk-form-controls">
                                        <textarea rows="12" name="state_listing" class="uk-textarea" required>Exemplo: São Paulo;SP</textarea>
                                    </div>
                                </div>
                                <div class="uk-width-1-1 uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary uk-button-small">Criar lista</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>

                    <!-- Adicionando Cidades -->
                    <div id="api_cities" style="display: none;">   
                        <form api-locations method="post" class="uk-grid-small" uk-grid>
                            <input type="hidden" name="action" value="portal/locations/create/list/cities">
                            <input type="hidden" name="path" value="modules/portal/routes/locations/ajax">
                            <div class="uk-width-1-1 uk-margin-remove">
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">Busque o Estado</label>
                                    <div class="uk-form-controls">
                                        <span uk-spinner id="spinner-state" style="display: none; position: absolute; margin: 13px; right: 15px;"></span>
                                        <input type="text" id="city_set_state" class="uk-input" required>
                                    </div>
                                </div>
                            </div>
                            <div id="listing-state" class="uk-width-1-1 uk-margin-remove" style="display: none;">
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">Lista de Cidades (Uma por linha)</label>
                                    <div class="uk-form-controls">
                                        <input type="hidden" name="state_selected">
                                        <textarea rows="12" name="city_listing" class="uk-textarea" required></textarea>
                                    </div>
                                </div>
                                <div id="msg-list-cities" class="uk-margin"></div>
                                <div class="uk-width-1-1 uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary uk-button-small">Criar lista</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Adiconando Distritos -->
                    <div id="api_districts" style="display: none;">   
                        <form api-locations method="post" class="uk-grid-small" uk-grid>
                            <input type="hidden" name="action" value="portal/locations/create/list/districts">
                            <input type="hidden" name="path" value="modules/portal/routes/locations/ajax">
                            <div class="uk-width-1-1 uk-margin-remove">
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">Busque o Estado</label>
                                    <div class="uk-form-controls">
                                        <span uk-spinner id="spinner-city" style="display: none; position: absolute; margin: 13px; right: 15px;"></span>
                                        <input type="text" id="district_set_city" class="uk-input" required>
                                    </div>
                                </div>
                            </div>
                            <div id="listing-city" class="uk-width-1-1 uk-margin-remove" style="display: none;">
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">Lista de Distritos (Um por linha)</label>
                                    <div class="uk-form-controls">
                                        <textarea rows="12" name="city_listing" class="uk-textarea" required></textarea>
                                    </div>
                                </div>
                                <div class="uk-width-1-1 uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary uk-button-small">Criar lista</button>
                                </div>
                            </div>
                        </form>
                    </div>
                                        
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

    </div>
</div>

<!-- Modal -->
<div class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
    <button class="uk-modal-close-full uk-close-large" type="button" uk-close
        style="position: fixed !important; top: 0; right: 0;"></button>
    <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">

        <div class="uk-flex uk-flex-between uk-flex-middle">
            <div class="uk-align-left uk-width-1-2">
                <h4 class="uk-margin-small uk-margin-remove-bottom"><span class="tax_name"></span></h4>
            </div>
        </div>

        <div class="uk-child-width-1-3@m uk-grid-small" uk-grid>

            <!-- Card Informações -->
            <div>
                <div class="uk-card uk-card-default uk-margin-bottom">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Informações</h4>
                        <p class="uk-text-small">Informações gerais da categoria</p>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <ul class="uk-list">
                            <li>Registrada em: <span class="tax_registered"></span></li>
                            <li>Status: <span class="tax_status"></span></li>
                            <li>Situação: <span class="tax_active"></span></li>
                            <li>Módulo: <span class="tax_meta"></span></li>
                            <li>Grupo (Inner): <span class="tax_inner_id"></span></li>
                        </ul>

                    </div>
                </div>
            </div>

            <!-- Card Descrição da Categoria -->
            <div>
                <div class="uk-card uk-card-default uk-margin-bottom">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Descrição</h4>
                        <p class="uk-text-small">Esse conteúdo será apresentado na página sigle da categoria</p>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <span class="tax_description"></span>
                    </div>
                </div>
            </div>

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
                <input type="hidden" name="path" value="modules/accounts/routes/users/ajax">
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