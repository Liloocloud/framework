<?php
// _tpl_fill(ROOT_ADMIN_ROUTES.'client-manager/client-manager.tpl', $Extra, '');
?>

<div class="uk-container">
    <h3 class="uk-align-left">Gerenciar Clientes</h3>
    <div class="uk-text-right">
        <a href="<?= BASE_ADMIN ?>clients/create/" class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Novo Cliente</a>
    </div>
</div>

<div class="uk-container">

    <div class="uk-grid-small" uk-grid>
        <div class="uk-width-1-3@m">
            <!-- Filtro d busca -->
            <div class="uk-card uk-card-default uk-card-body uk-margin-bottom uk-padding-small">
                <form data-liloo method="post" class="uk-grid-collapse" uk-grid>
                    <input type="hidden" name="action" value="account_login">
                    <input type="hidden" name="path" value="modules/accounts/ajax/ManagerAccounts">
                    <div class="liloo-form-search uk-width-expand">
                        <input class="uk-input" type="text" placeholder="Nome ou Código do Cliente" autofocus>
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
                    <h4>Lista de Clientes</h4>
                </div>
                <div>
                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-striped uk-table-middle uk-table-responsive uk-margin-remove">
                            <tbody>
                                <thead class="uk-padding-small">
                                    <tr>
                                        <th class="uk-text-capitalize" style="padding-left: 20px;">Cód.</th>
                                        <th width="50%" class="uk-text-capitalize" style="padding-left: 20px;">Informações</th>
                                        <th class="uk-text-capitalize" style="padding-left: 20px;">Ações</th>
                                    </tr>
                                </thead>

                                <?php
                                $Clients = new Helpers\Paginator(
                                    (isset(URL()[3]))? URL()[3] : 0,
                                    10,
                                    TB_CLIENTS,
                                    '',
                                    BASE.URL()[0].'/'.URL()[1].'/'.URL()[2].'/',
                                    '',
                                    "SELECT * FROM `".TB_CLIENTS."` ORDER BY `client_id` DESC "
                                );
                                // var_dump($Clients->Results());

                                // $Clients = _get_data_full("SELECT * FROM ".TB_CLIENTS." ORDER BY `client_id` DESC");
                                // $Clients = ($Clients->Results())? $Clients->Results() : false;
                                if($Clients->Results()){
                                    foreach ($Clients->Results() as $Item) {
                                        ?>
                                <tr style="padding-bottom: 5px;">
                                    <td style="padding-left: 20px;" class="uk-text-small"><?= $Item['client_id'] ?></td>
                                    <td style="padding-left: 20px;">
                                        <p class="uk-text-small"><?= $Item['client_name'] ?> <br> <?= $Item['client_document'] ?></p>
                                    </td>
                                    <td style="padding: 0 20px 0 20px;">
                                        <a class="uk-button uk-button-primary uk-button-xsmall"
                                            href="#modal-<?= $Item['client_id'] ?>" uk-toggle>Detalhes</a>
                                        <!-- <a class="uk-button uk-button-default uk-button-xsmall" href="#modal-sections" uk-toggle>Excluir</a> -->
                                        <div id="modal-<?= $Item['client_id'] ?>" uk-modal>
                                            <div class="uk-modal-dialog">
                                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                                <div class="uk-modal-header uk-padding-small">
                                                    <h4>Detalhes do Cliente</h4>
                                                </div>
                                                <div class="uk-modal-body uk-padding-small">
                                                    <p class="uk-text-small">
                                                        <b>Código:</b> <?= $Item['client_id'] ?><br>
                                                        <b>Nome:</b> <?= $Item['client_name'] ?><br>
                                                        <b>Documento:</b> <?= $Item['client_document'] ?><br>
                                                        <b>E-mail:</b> <?= $Item['client_email'] ?><br>
                                                        <b>Tel 1:</b> <?= $Item['client_phone_1'] ?><br>
                                                        <b>Tel 2:</b> <?= $Item['client_phone_2'] ?><br>
                                                        <b>Whatsapp:</b> <?= $Item['client_whatsapp'] ?><br>
                                                        <b>Descrição:</b> <?= $Item['client_description'] ?><br>
                                                        <b>Endereço:</b> <?= $Item['client_address'] ?><br>
                                                        <b>Número:</b> <?= $Item['client_number'] ?><br>
                                                        <b>Complemento:</b> <?= $Item['client_complement'] ?><br>
                                                        <b>Estado:</b> <?= $Item['client_state'] ?><br>
                                                        <b>Nome:</b> <?= $Item['client_number'] ?><br>
                                                    </p>
                                                </div>
                                                <div class="uk-modal-footer uk-text-right">
                                                    <button class="uk-button uk-button-default uk-modal-close"
                                                        type="button">Fechar</button>
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
                                        <p>Nenhum cliente cadastrado</p>
                                        <a href="#BASE_ADMIN#client-create/"
                                            class="uk-button uk-button-primary uk-button-small"><i class="fas fa-plus"></i> Novo
                                            Cliente</a>
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
                    <?php $Clients->Navigation(); ?>
                </div>
            </div>
        </div>
    </div>

    
</div>


<script>
// criar função para modal
function modalClient(id) {

    lilooJS.Event({
        action: 'modal_client_view',
        path: 'admin/modules/clients/Manager',
        data: id
    })
    // path = obj.path
    // data = !obj.data ? null : obj.data
    // root = !obj.root ? true : obj.root    
}
</script>
<div class="uk-margin-large"></div>