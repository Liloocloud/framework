<div id="menu-top-create" class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom" style="position: fixed;">
    <div>
        <h1>Informações da Página</h1>
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


<div class="uk-grid-small uk-grid">

    <!-- Formulario para cadastras as partes da página -->
    <div class="uk-width-expand@m  uk-margin-bottom">

        <ul uk-accordion>
            
            <!-- Banner da Página -->
            #tpl_banner#


            #tpl_contact#
            #tpl_socialmedia#
            #tpl_location#
        </ul>

        <!-- <div class="liloo-canva">
            <h2 class="uk-text-center uk-padding">Inclua novos blocos "Widgets" para começar a construir seu site. <br> Basta clicar e começar</h2>
        </div> -->

    </div>

    <!-- Sidebar -->
    <div class="uk-width-1-3@m">

        <!-- Widgets -->
        <h3>Blocos Widgets</h3>
        <div class="liloo-widgets uk-child-width-1-3@s uk-child-width-1-2@m uk-child-width-1-3@l uk-text-center uk-grid-small " uk-grid>
        </div>   

    </div>

</div>

<!-- Lateral de configurações -->
#tpl_modal_full#