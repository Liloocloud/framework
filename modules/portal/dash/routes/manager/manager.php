<?php // _tpl_fill(ROOT_ADMIN_ROUTES.'product-manager/product-manager.tpl', $Extra, ''); ?>
<style>
    .liloo-form-search input{
        -webkit-border-radius: 0 !important;
        -moz-border-radius: 0 !important;
        border-radius: 0 !important;
        -webkit-border-top-left-radius: 5px !important;
        -webkit-border-bottom-left-radius: 5px !important;
        -moz-border-radius-topleft: 5px !important;
        -moz-border-radius-bottomleft: 5px !important;
        border-top-left-radius: 5px !important;
        border-bottom-left-radius: 5px !important;
    }
    .liloo-form-search button{
        -webkit-border-radius: 0 !important;
        -moz-border-radius: 0 !important;
        border-radius: 0 !important;
        -webkit-border-top-right-radius: 5px !important;
        -webkit-border-bottom-right-radius: 5px !important;
        -moz-border-radius-topright: 5px !important;
        -moz-border-radius-bottomright: 5px !important;
        border-top-right-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
    }
    
</style>

<div class="uk-container">
    <h3 class="uk-align-left">Geranciar Produtos</h3>
    <div class="uk-text-right">
        <a href="<?= BASE_ADMIN ?>items/create/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Novo</a>
    </div>
</div>

<div class="uk-container">
    
    <div class="uk-grid-small" uk-grid>
        <div class="uk-width-1-3@m">
            <!-- Filtro d busca -->
            <div class="uk-card uk-card-default uk-card-body uk-margin-small-bottom uk-padding-small">
                <form data-liloo method="post" class="uk-grid-collapse" uk-grid>
                    <input type="hidden" name="action" value="account_login">
                    <input type="hidden" name="path" value="modules/accounts/ajax/ManagerAccounts">
                    <div class="liloo-form-search uk-width-expand">
                        <input class="uk-input" type="text" placeholder="Nome ou código do produto" autofocus>
                    </div>
                    <div class="liloo-form-search uk-width-auto">
                        <button class="uk-button uk-button-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="uk-width-expand@m">
            <!-- Listagem -->
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Lista de produtos</h4>
                </div>
                <div>
                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-striped uk-table-middle uk-table-responsive uk-margin-remove">
                            <tbody>
                                <thead class="uk-padding-small">
                                    <tr>
                                        <th class="uk-text-capitalize" style="padding-left: 20px;">Cód.</th>
                                        <th width="50%" class="uk-text-capitalize" style="padding-left: 20px;">Produto</th>
                                        <th class="uk-text-capitalize" style="padding-left: 20px;">Opções</th>
                                    </tr>
                                </thead>

                                <?php
                                $Product = new Helpers\Paginator(
                                    (isset(URL()[3]))? URL()[3] : 0,
                                    10,
                                    TB_ITEMS,
                                    '',
                                    BASE.URL()[0].'/'.URL()[1].'/'.URL()[2].'/',
                                    '',
                                    "SELECT * FROM `".TB_ITEMS."` ORDER BY `item_id` DESC "
                                );
                                // $Product = _get_data_full("SELECT * FROM ".TB_CLIENTS." ORDER BY `client_id` DESC");
                                // $Product = ($Product->Results())? $Product->Results() : false;
                                if($Product->Results()){
                                    foreach ($Product->Results() as $Item) {
                                        ?>
                                <tr style="padding-bottom: 15px;">
                                    <td style="padding-left: 20px;" class="uk-text-small"><?= $Item['item_code'] ?></td>
                                    <td style="padding-left: 20px;">
                                        <p class="uk-text-small"><?= $Item['item_title'] ?></p>
                                    </td>
                                    <td style="padding: 0 20px 0 20px;">
                                        <a href="#modal-<?= $Item['item_id'] ?>" class="uk-button uk-button-primary uk-button-xsmall"uk-toggle><i class="fas fa-info-circle"></i> Detalhes</a>
                                        <a href="<?= BASE_ADMIN ?>items/create/id=<?= $Item['item_id'] ?>" class="uk-button uk-button-primary uk-button-xsmall"><i class="far fa-edit"></i> Editar</a>
                                        <div class="uk-inline">
                                        <button class="uk-button uk-button-danger uk-button-xsmall" type="button"><i class="far fa-trash-alt"></i></button>
                                            <div uk-drop="mode: click; pos: top-center;" id="del-<?= $Item['item_id'] ?>">
                                                <div class="uk-card uk-card-default uk-padding-small uk-text-center">
                                                    <p>Deseja excluir este item?</p>    
                                                    <button type="button" onclick="closeDelete('#del-<?= $Item['item_id'] ?>')" class="uk-button uk-button-primary uk-button-xsmall">Não</button>
                                                    <button type="button" onclick="itemDelete('<?= $Item['item_id'] ?>')" class="uk-button uk-button-danger uk-button-xsmall">Sim</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        


                                        <!-- <a class="uk-button uk-button-default uk-button-xsmall" href="#modal-sections" uk-toggle>Excluir</a> -->
                                        <div id="modal-<?= $Item['item_id'] ?>" uk-modal>
                                            <div class="uk-modal-dialog">
                                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                                <div class="uk-modal-header">
                                                    <h4 class="uk-modal-title" style="font-size: 22px;">Detalhes do Produto</h4>
                                                </div>
                                                <div class="uk-modal-body uk-padding-remove">
                                                    <table class="uk-table uk-table-striped uk-table-responsive">
                                                        <tbody>
                                                            <tr><td><b>Código:</b></td><td><?= $Item['item_code'] ?></td></tr>
                                                            <tr><td><b>Produto:</b></td><td><?= $Item['item_title'] ?></td></tr>
                                                            <tr><td><b>Tipo:</b></td><td><?= $Item['item_type'] ?></td></tr>
                                                            <tr><td><b>Categoria:</b></td><td><?= $Item['item_category'] ?></td></tr>
                                                            <tr><td><b>Descrição:</b></td><td><?= $Item['item_description'] ?></td></tr>
                                                            <tr><td><b>Pacote:</b></td><td><?= $Item['item_package'] ?></td></tr>
                                                            <tr><td><b>Estoque:</b></td><td><?= $Item['item_amount'] ?></td></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="uk-modal-footer uk-text-right">
                                                    <a href="<?= BASE_ADMIN ?>items/create/id=<?= $Item['item_id'] ?>" class="uk-button uk-button-primary uk-button-small"><i class="far fa-edit"></i> Editar</a>
                                                    <button class="uk-button uk-button-default uk-button-small uk-modal-close"  type="button">Fechar</button>
                                                    <!-- <button class="uk-button uk-button-primary" type="button">Save</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }else{
                                ?>
                                <tr>
                                    <td colspan="3" style="padding-left: 40px;" class="uk-text-center">
                                        <p>Nenhum produto cadastrado</p>
                                        <a href="#BASE_ADMIN#client-create/"
                                            class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Novo
                                            Produto</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="uk-card-footer">
                    <?php $Product->Navigation(); ?>
                </div>
            </div>
        </div>
    </div>

    

    
</div>


<script>
function closeDelete(id) {
    UIkit.drop(id).hide(true);
    return false
}

function itemDelete(id) {
    lilooJS.Event({
        action: 'item_delete',
        path: 'modules/items/ajax/Manager',
        data: id
    })
}
</script>
<div class="uk-margin-large"></div>