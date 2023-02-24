<div id="menu-top-create" class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom" style="position: fixed;">
    <div>
        <h1>Gerenciamento de localidades - <small>Módulo Super Admin</small></h1>
    </div>
    <div class="uk-width-1-2@m">
        <div class="uk-text-right">
            <!-- <a id="btn-config-edit" type="button" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-download"></i> Exportar</a> -->
            <!-- <button id="btn-create-product" type="button" class="uk-button uk-button-primary uk-button-small dropzone-button-upload">Salvar</button> -->
            <!-- <a href="#BASE_ADMIN#templates/pages/" class="uk-button uk-button-primary uk-button-small">Todas as páginas</a> -->
        </div>
    </div>
</div>
<div style="margin-top: 70px;"></div>

<div class="uk-grid-small" uk-grid>

    <!-- Cadastramento -->
    <div class="listing uk-width-1-3@m">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <h3>Adicionar:</h3>
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
            <div class="uk-card-body uk-padding-small">

                <!-- Adicionado País -->
                <div id="api_countries" style="display: none;">
                    <form api-locations method="post" class="uk-grid-small" uk-grid>       
                        <input type="hidden" name="action" value="create/country">
                        <input type="hidden" name="path" value="modules/locations/ajax/manager">                       
                        
                        <div class="uk-width-1-1 uk-margin-small">
                            <label class="uk-form-label">País</label>
                            <input name="country_name" class="uk-input" type="text" required>
                        </div>                       

                        <div class="uk-width-1-1 uk-margin-small">
                            <label class="uk-form-label">Linguagem (Ex.: pr-BR)</label>
                            <input name="country_lang" class="uk-input" type="text">
                        </div>

                        <div class="uk-width-1-1 uk-margin">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small">Criar lista</button>
                            <a class="uk-align-right" href="https://www.alphatrad.pt/o-codigo-das-linguas" target="_blank">Dica de Sigla</a>
                        </div>

                    </form>
                </div>  
                
                <!-- Adiconando Estados -->
                <div id="api_states" style="display: none;">
                    <form api-locations method="post" class="uk-grid-small" uk-grid>            
                        <input type="hidden" name="action" value="create/states">
                        <input type="hidden" name="path" value="modules/locations/ajax/manager">
                        <input type="hidden" block-search value="country">
                        <div class="uk-width-1-1 uk-margin-small">
                            <div class="uk-form-controls">
                                <span uk-spinner></span>
                                <input input-search name="country_selected" type="text" class="uk-input" placeholder="Realize a busca do país" required>
                            </div>
                        </div>
                        <div id="listing-country" class="uk-width-1-1 uk-margin-small" style="display: none;">
                            <div class="uk-width-1-1">
                                <div class="uk-form-controls">
                                    <textarea rows="8" name="state_listing" class="uk-textarea" placeholder="Um estado por linha. Exemplo: São Paulo;SP" required></textarea>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-margin">
                                <button type="submit" class="uk-button uk-button-primary uk-button-small">Adicionar lista</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Adicionando Cidades -->
                <div id="api_cities" style="display: none;">
                    <form api-locations method="post" class="uk-grid-small" uk-grid>
                        
                        <input type="hidden" name="action" value="create/cities">
                        <input type="hidden" name="path" value="modules/locations/ajax/manager">
                        <input type="hidden" block-search value="state">

                        <div class="uk-width-1-1 uk-margin-small">
                            <div class="uk-form-controls">
                                <span uk-spinner></span>
                                <input input-search name="state_selected" type="text" class="uk-input" placeholder="Realize a busca do estado" required>
                            </div>
                        </div>

                        <div id="listing-state" class="uk-width-1-1 uk-margin-small" style="display: none;">
                            <div class="uk-width-1-1">
                                <div class="uk-form-controls">
                                    <textarea rows="8" name="city_listing" class="uk-textarea" placeholder="Lista de Cidades (Uma por linha)" required></textarea>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-margin">
                                <button type="submit" class="uk-button uk-button-primary uk-button-small">Adicionar lista</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Adiconando Distritos -->
                <div id="api_districts" style="display: none;">
                    <form api-locations method="post" class="uk-grid-small" uk-grid>
                        
                        <input type="hidden" name="action" value="create/districts">
                        <input type="hidden" name="path" value="modules/locations/ajax/manager">
                        <input type="hidden" block-search value="city">
                       
                        <div class="uk-width-1-1 uk-margin-small">                 
                            <div class="uk-form-controls">
                                <span uk-spinner></span>
                                <input input-search name="city_selected" type="text" class="uk-input" placeholder="Realize a busca da cidade" required>
                            </div>
                        </div>
                        <div id="listing-city" class="uk-width-1-1 uk-margin-small" style="display: none;">
                            <div class="uk-width-1-1">
                                <div class="uk-form-controls">
                                    <textarea rows="8" name="district_listing" class="uk-textarea" placeholder="Lista de Distritos (Um por linha)" required></textarea>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-margin">
                                <button type="submit" class="uk-button uk-button-primary uk-button-small">Adicionar lista</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Listagem completa -->
    <div class="listing uk-width-expand@m">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <div class="uk-flex uk-flex-between">
                    <div>
                        <h3>Listagem completa</h3>
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
                    <div uk-spinner style="display: none;"></div>
                </ul>
            </div>
        </div>
    </div>

</div>

<!-- Modal que mostra os detalhes de cada regitro -->
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