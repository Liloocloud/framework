<div class="uk-container">
    <div class="uk-child-width-1-2@m uk-grid-small" uk-grid="masonry: true">

        <!-- Uploads -->
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Configurações de Uploads</h4>
                    <p class="uk-text-small">Variáveis globais usados no sistema de uploads</p>
                </div>
                <div class="uk-card-body uk-padding-small">
                    <div class="field uk-margin-small">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="gift" tabindex="0" class="hidden" checked>
                            <label>Habilitar a criação de subpastas por data</label>
                        </div>
                    </div>

                    <div class="field uk-margin-small">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="gift" tabindex="0" class="hidden" checked>
                            <label>Criar as miniaturas de imagens</label>
                        </div>
                    </div>

                    <div class="field uk-margin-small">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="gift" tabindex="0" class="hidden" checked>
                            <label>Criar Marca d'água incluindo o Logotipo da conta de usuário</label>
                        </div>
                    </div>

                    <div class="field uk-margin-small">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="gift" tabindex="0" class="hidden" checked>
                            <label>Salva os dados dos arquivos upados</label>
                        </div>
                    </div>

                    <div class="field uk-margin-small">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="gift" tabindex="0" class="hidden" checked>
                            <label>Ativar Prefixo para Renomear Arquivos</label>
                        </div>
                    </div>

                    <div class="field uk-margin-small">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="gift" tabindex="0" class="hidden" checked>
                            <label>Iniciar Upload após carregar os arquivos</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Imagens -->
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Configurações das Imagens</h4>
                    <p class="uk-text-small">Variáveis globais usados no sistema de uploads</p>
                </div>
                <div class="uk-card-body uk-padding-small">
                    <div class="ui equal width form">
                        <div class="fields">
                            <div class="field">
                                <label>Largura padrão das Imagens (px)</label>
                                <input type="text" value="1200">
                            </div>
                            <div class="field">
                                <label>Altura padrão das Imagens (px)</label>
                                <input type="text" value="800">
                            </div>
                        </div>
                        <div class="field">
                            <label>Lista de Miniaturas</label>
                            <textarea rows="3">{{w:250,h:150},{w:100,h:70}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Arquivos -->
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Configurações dos Arquivos</h4>
                    <p class="uk-text-small">Variáveis globais usados no sistema de uploads</p>
                </div>
                <div class="uk-card-body uk-padding-small">
                    <div class="ui equal width form">
                        <div class="field">
                            <label>Tipos de Mimes permitidos (Padrão = todos)</label>
                            <input type="text" value="image/*,audio/*,video/*,application/*,text/*">
                        </div>
                        <div class="fields">
                            <div class="field">
                                <label>Máximo de Arquivos por Conta</label>
                                <input type="number" value="5">
                            </div>
                            <div class="field">
                                <label>Tamanho Máximo Permitido por Arquivos</label>
                                <div class="ui labeled input">
                                    <div class="ui label">
                                        MB
                                    </div>
                                    <input type="text" value="10">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Diretórios -->
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Configuração de Diretório</h4>
                    <p class="uk-text-small">Variáveis globais usados no sistema de uploads</p>
                </div>
                <div class="uk-card-body uk-padding-small">
                    <div class="ui equal width form">
                        <div class="field">
                            <label>Diretório base para os arquivos</label>
                            <div class="ui labeled input">
                                <div class="ui label">
                                    #ROOT#
                                </div>
                                <input type="text" value="uploads/">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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