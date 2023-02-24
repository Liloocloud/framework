<div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
    <div>
        <h1>Gerenciamento de Clientes - <small>Módulo Nativo</small></h1>
    </div>
    <div>
        <a href="#BASE_ADMIN#clients/manager/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Gerenciar</a>
    </div>
</div>


<div class="uk-child-width-1-1@m uk-grid-small" uk-grid>
    <!-- Filtro de busca -->
    <div>
        <div class="uk-card uk-card-default">
            <!-- Header -->
            <div class="uk-card-header uk-padding-small">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div>
                        <h3>Listas de Clientes</h3>
                        <p class="uk-text-small">Digite o termo e faça sua busca abaixo</p>
                    </div>
                    <div>
                        <button type="button" class="uk-icon-button uk-button-primary uk-button-xsmall refresh-list"><i
                            class="fas fa-redo"></i></button>
                    </div>
                </div>
            </div>
            <!-- Body -->
            <div class="uk-card-body uk-padding-small">
                <liloo-searchlist id="search-clients"></liloo-searchlist>                    
            </div>

        </div>
    </div>

    <!-- Relatórios de clientes -->
    <!-- <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <h3>Lista de cliente</h3>
            </div>
            <div class="uk-card-body uk-padding-small">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quia commodi quis voluptatum dolor harum itaque ipsa alias dolores voluptatem id placeat consectetur, quisquam, at debitis. Possimus dolorem neque quo.
            </div>
        </div>
    </div> -->

</div>