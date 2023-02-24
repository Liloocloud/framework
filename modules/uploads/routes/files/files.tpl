    <div class="uk-grid-small" uk-grid>

        <!-- Lateral Esquerda -->
        <div class="uk-width-expand@m">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <div class="uk-flex uk-flex-between">
                        <div>
                            <h4>Biblioteca de Arquivos</h4>
                        </div>
                        <div>
                            <button type="button" class="uk-button uk-button-primary uk-button-xsmall refresh-list"><i
                                    class="fas fa-redo"></i> Recarregar</button>
                            <button type="button" class="uk-button uk-button-primary uk-button-xsmall"
                                href=".uk-modal-full" uk-toggle><i class="plus circle icon"></i> Adicionar</button>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body uk-padding-small">

                    <!-- Filtro de busca -->
                    <form class="ui equal width form">
                        <div class="inline fields">
                            <div class="field">
                                <input type="text" name="upload_title" placeholder="Nome do arquivo">
                            </div>
                            <div class="field">
                                <select class="ui fluid search dropdown" name="upload_type">
                                    <option value="">Tipos</option>
                                    <option value="all">Todos</option>
                                    <option value="image">Imagem</option>
                                    <option value="video">Vídeo</option>
                                    <option value="audio">Audio</option>
                                    <option value="doc">Documento</option>
                                </select>
                            </div>
                            <div class="field">
                                <input type="text" name="upload_registered" liloo-daterange liloo-mask-date placeholder="Year">
                            </div>
                            <div class="ui button" tabindex="0">Buscar</div>
                        </div>
                    </form>


                    <div class="upload_listing uk-child-width-1-5@m uk-child-width-1-3@s uk-grid-small" uk-grid>
                        <!-- <div class="upload_listing"> -->
                        #upload_init_list#
                    </div>
                </div>
                <div class="uk-card-footer uk-padding-small">
                    Incluir a paginação
                </div>
            </div>
        </div>


        <!-- Lateral Direita -->
        <div class="uk-width-1-3@m">
            <div class="uk-card uk-card-default uk-margin-bottom">
                <div class="uk-card-header uk-padding-small">
                    <div class="uk-flex uk-flex-between">
                        <div>
                            <h4>Informações</h4>
                        </div>
                        <div>
                            <div class="ui mini circular top right pointing icon dropdown button">
                                <i class="ellipsis vertical icon"></i>
                                <div class="menu">
                                    <div class="item">Ver em nova aba</div>
                                    <div class="item">Alterar informações</div>
                                    <div class="item">Excluir arquivo</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body uk-padding-small">
                    <span class="msg-files" style="display: none;"></span>
                    <div class="uk-child-width-1-1@m uk-grid-small" uk-grid>
                        <div>
                            <span class="upload_url"></span>
                        </div>
                        <div>
                            <h5 class="uk-margin-remove-bottom uk-margin-small-top upload_title"></h5>
                            <span class="upload_href"></span>
                            <ul class="uk-list">
                                <li>ID: <span class="upload_id"></span></li>
                                <li>Tamanho: <span class="upload_size"></span></li>
                                <li>Dimensão: <span class="upload_dimension"></span></li>
                                <li>Tipo: <span class="upload_type"></span></li>
                                <li>Meta: <span class="upload_meta"></span></li>
                                <li>Maódulo: <span class="upload_module"></span></li>
                            </ul>
                        </div>
                    </div>


                </div>
                <!-- <div class="uk-card-footer uk-padding-small"></div> -->
            </div>

        </div>


    </div>


<!-- Modal Lateral para Upload -->
<div class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
    <button class="uk-modal-close-full uk-close-large" type="button" uk-close
        style="position: fixed !important; top: 0; right: 0;"></button>
    <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <div class="uk-width-1-2">
                <h4 class="uk-margin-small uk-margin-remove-bottom">Novos Arquivos</h4>
            </div>
        </div>
        <div class="uk-margin-top">
            <liloo-dropzone></liloo-dropzone>
        </div>
    </div>
</div>

<!-- Modal para visualizar o arquivo -->
<div id="modal-overflow" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Headline</h2>
        </div>

        <div class="uk-modal-body" uk-overflow-auto>

            <span class="upload_url"></span>

        </div>

        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Save</button>
        </div>

    </div>
</div>