<input type="hidden" id="prod-id" value="#prod_id#">
<div id="menu-top-create" class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom" style="position: fixed;">
    <div><h1>Novo Produto - <small>Módulo Shop</small></h1></div>
    <div>
        <button id="btn-create-product" type="button" class="uk-button uk-button-primary uk-button-small dropzone-button-upload">Salvar</button>
        <a href="#BASE_ADMIN#shop/reports/" class="uk-button uk-button-primary uk-button-small"><i class="far fa-chart-bar"></i> Relatório</a>
    </div>
</div>
<div style="margin-top: 70px;"></div>


<div class="uk-grid-small" uk-grid>
    <div class="uk-width-expand@m">
        <liloo-form id="create-product-infos"></liloo-form> 
    </div>
    <div class="uk-width-1-3@m">
        <liloo-dropzone></liloo-dropzone>
    </div>
</div>


                        


<!-- 
<div class="ui tabular menu">
    <div class="item active" data-tab="tab-infos">Informações</div>
    <div class="item" data-tab="tab-price">Preço e Promoções</div>
    <div class="item" data-tab="tab-images">Galeria de Imagens</div>
</div>

<div class="ui tab active" data-tab="tab-infos">
    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-padding-small">
            <h4>Informações Básicas</h4>
        </div>
        <div class="uk-card-body uk-padding-small">
            <liloo-form id="create-product-infos"></liloo-form>                         
        </div>
    </div>
</div>

<div class="ui tab" data-tab="tab-price">
    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-padding-small">
            <h4>Preço e Promoções</h4>
        </div>
        <div class="uk-card-body uk-padding-small">
            <liloo-form id="update-product-price"></liloo-form>                         
        </div>
    </div> 
</div>   

<div class="ui tab" data-tab="tab-images">
    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-padding-small">
            <h4>Galeria de Imagens</h4>
        </div>
        <div class="uk-card-body uk-padding-small">
            <liloo-form id="update-product-s"></liloo-form>                         
        </div>
    </div> 
</div>  -->



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
                        <liloo-listing></liloo-listing>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>