<div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
    <div><h1>Classificação</h1></div>
    <div><a href="#BASE_ADMIN#shop/reports/" class="uk-button uk-button-primary uk-button-small"><i class="far fa-chart-bar"></i> Relatório</a></div>
</div>

<div class="uk-grid-small" uk-grid>

    <!-- Lista de categorias -->
    <div class="uk-width-expand@m">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div>
                        <h3>Listas de Categorias</h3>
                        <p class="uk-text-small">Digite o termo e faça sua busca abaixo</p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body uk-padding-small">
                <liloo-searchlist id="search-categs"></liloo-searchlist>                    
            </div>

        </div>
    </div>
    
    <!-- Criando nova categoria -->
    <div class="uk-width-1-3@m">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <h4>Criar Lista de Categorias</h4>
                <p class="uk-text-small">Adiciona várias categorias sendo uma por linha</p>
            </div>
            <div class="uk-card-body uk-padding-small">
                <form id="create-list-categs"  method="post" class="uk-grid-small" uk-grid>
                    <input type="hidden" name="action" value="create/categs/list">
                    <input type="hidden" name="path" value="modules/shop/ajax/categs">
                    
                    <input name="tax_meta" class="uk-input" type="hidden" value="shop">
                    <input name="tax_type" class="uk-input" type="hidden" value="product">
                    
                    <div class="uk-width-1-1 uk-margin-remove">
                        <div class="uk-width-expand@m">
                            <label class="uk-form-label">Grupo da Categoria - Obs.: A categoria pai por padrão é "categ"</label>
                            <div class="uk-form-controls">
                                <input name="tax_inner_id" class="uk-input" type="text" value="categ" required>
                            </div>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="uk-width-expand@m">
                            <label class="uk-form-label">Lista de categorias (Uma por linha)</label>
                            <div class="uk-form-controls">
                                <textarea rows="10" name="tax_listing" class="uk-textarea" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin-remove">
                        <button type="submit" class="uk-button uk-button-primary uk-button-small">Criar lista</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>