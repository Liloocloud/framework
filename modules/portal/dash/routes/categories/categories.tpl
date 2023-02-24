<div class="uk-container">
    <!-- Categorias Level 001 -->
    <div class="uk-grid-small uk-margin-bottom uk-flex-between uk-flex-middle" uk-grid>
        <div>
            <h3>Gestão de Categorias</h3>
        </div>
        <div>
            <button id="btn-new-category" class="uk-button uk-button-primary uk-button-xsmall" type="button"><i
                    class="fas fa-plus"></i> Nova Categoria</button>
            <div id="drop-create-categ"
                uk-drop="pos: bottom-right; mode: click; animation: uk-animation-slide-bottom-small; duration: 400;">
                <div class="uk-card uk-card-body uk-card-default uk-card-small">
                    <span id="msg-create-categ"></span>
                    <input name="tax_name" id="input-create-categ" type="text" class="uk-input uk-margin-small-bottom"
                        autocomplete="off" autofocus>
                    <button id="add-categ" type="button" class="uk-button uk-button-primary uk-button-small uk-text-capitalize">Adicionar</button>
                    <button type="button" onclick="LevelOne.closeDrop()"
                        class="uk-button uk-button-default uk-button-small uk-text-capitalize">Cancelar</button>
                    <p style="font-size: 12px">Essa será uma categoria mãe. E não será possível excluir</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Visialização das Categorias -->
    <div class="uk-container">
        <span class="alert-list-categ"></span>
        <div id="list-categ" class="uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-margin-large-bottom" uk-grid="masonry: false;">
            <div><div uk-spinner></div> Carregando...</div>  
        </div>
    </div>

</div>