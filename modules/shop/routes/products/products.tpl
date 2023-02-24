<div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
    <div><h1>Gerenciamento de Produtos - <small>Módulo Shop</small></h1></div>
    <div><a href="#BASE_ADMIN#shop/reports/" class="uk-button uk-button-primary uk-button-small"><i class="far fa-chart-bar"></i> Relatório</a></div>
</div>


<div class="uk-grid-small" uk-grid>

    <div class="uk-width-expand@m">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div>
                        <h3>Listas de Produtos</h3>
                        <p class="uk-text-small">Digite o termo e faça sua busca abaixo</p>
                    </div>
                    <div>
                        <a href="#BASE_ADMIN#shop/create" type="button" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Novo Produto</a>
                    </div>
                </div>
            </div>
            <div class="uk-card-body uk-padding-small">
                <liloo-searchlist id="search-products"></liloo-searchlist>                    
            </div>

        </div>
    </div>

    <div class="uk-width-1-4@m">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <h3>Relatório Básico</h3>
            </div>
            <div class="uk-card-body uk-padding-small">
                
                <div class="uk-margin-bottom">
                    <p>Total de produtos</p>
                    <h3>3</h3>
                </div>

                <div class="uk-margin-bottom">
                    <p>Média de Preço</p>
                    <h3>3</h3>
                </div>

                <div class="uk-margin-bottom">
                    <p>Total de produtos em estoque</p>
                    <h3>3</h3>
                </div>                

            </div>
        </div>
    </div>

</div>

<!-- Modal de cadastro de cliente -->
<div id="modal-create-product" class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
    <button class="uk-modal-close-full uk-close-large" type="button" uk-close style="position: fixed !important; top: 0; right: 0;"></button>
    <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
        <h2>Novo Produto<br><br></h2>                          
        
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-expand@m">
                <div class="uk-card uk-card-default uk-padding-small">
                    <liloo-form id="create-product"></liloo-form>
                </div>
            </div>
    
            <div class="uk-width-1-3@m">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-padding-small">
                        <h3>Últimos produtos cadastrados</h3>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <!-- <liloo-listing id="create-product"></liloo-listing> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>