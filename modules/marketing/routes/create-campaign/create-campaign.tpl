<div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
    <div><h1>Campanhas</h1></div>
    <div><a href="#BASE_ADMIN#marketing/reports/" class="uk-button uk-button-primary uk-button-small"><i class="far fa-chart-bar"></i> Relatório</a></div>
</div>

<div class="uk-grid-small" uk-grid>

    <!-- Form de cadastro de cliente -->
    <div class="uk-width-expand@m">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div>
                        <h3>Campanhas Ativas</h3>
                        <!-- <p class="uk-text-small">Digite o termo e faça sua busca abaixo</p> -->
                    </div>
                    <div>
                        <a id="btn-create-campaign" href="#modal-create-campaign" type="button" class="uk-button uk-button-primary uk-button-small" uk-toggle><i class="fas fa-plus"></i> Novo Campanha</a>
                    </div>
                </div>
            </div>
            <div class="uk-card-body uk-padding-small">
                <liloo-searchlist id="search-campaign"></liloo-searchlist>                    
            </div>

        </div>
    </div>

    <!-- Listagem do últimos codigos cadastrados -->
    <!-- <div class="uk-width-1-3@m">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <h3>Últimos clientes cadastrados</h3>
            </div>
            <div class="uk-card-body uk-padding-small">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quia commodi quis voluptatum dolor harum itaque ipsa alias dolores voluptatem id placeat consectetur, quisquam, at debitis. Possimus dolorem neque quo.
            </div>
        </div>
    </div> -->

</div>

<!-- Modal de cadastro de cliente -->
<div id="modal-create-campaign" class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
    <button class="uk-modal-close-full uk-close-large" type="button" uk-close style="position: fixed !important; top: 0; right: 0;"></button>
    <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
        <h2>Nova Campanha <br><br></h2>                          
        
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-expand@m">
                <liloo-form id="create-campaign"></liloo-form>
            </div>
    
            <div class="uk-width-1-3@m">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-padding-small">
                        <h3>Últimas campanhas cadastradas</h3>
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        <liloo-listing></liloo-listing>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>