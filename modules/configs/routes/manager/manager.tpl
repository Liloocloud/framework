<div class="uk-container">
    <h3 class="uk-align-left">Gerenciar Clientes</h3>
    <div class="uk-text-right">
        <a href="#BASE_ADMIN#client-create/" class="uk-button uk-button-primary uk-button-small"><i
                class="fas fa-plus"></i> Novo Cliente</a>
    </div>
</div>

<div class="uk-container">

    <!-- Filtro d busca -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <form data-liloo method="post" class="uk-grid-small" uk-grid>
            <input type="hidden" name="action" value="account_login">
            <input type="hidden" name="path" value="modules/accounts/ajax/ManagerAccounts">
            <div class="uk-width-expand">
                <input class="uk-input" type="text" placeholder="Nome ou Código do Cliente" autofocus>
            </div>
            <div class="uk-width-auto">
                <button class="uk-button uk-button-primary" type="submit">Pesquisar</button>
            </div>
        </form>
    </div>

    <!-- Listagem -->
    <div class="uk-card uk-card-default">
        <div class="uk-card-header">
            <h4>Lista de cliente</h4>
        </div>
        <div>
            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-striped uk-table-middle uk-table-responsive uk-margin-remove">
                    <tbody>
                        <thead class="uk-padding-small">
                            <tr>
                                <th class="uk-text-capitalize" style="padding-left: 40px;">Cód.</th>
                                <th width="50%" class="uk-text-capitalize">Informações</th>
                                <th class="uk-text-capitalize" style="padding-right: 40px;">Ações</th>
                            </tr>
                        </thead>
                        <tr style="padding-bottom: 15px;">
                            <td style="padding-left: 40px;">001</td>
                            <td style="padding-left: 40px;"><p>Felipe Oliveira Lourenço <br> CPF: 331.921.278-80</p></td>
                            <td style="padding: 0 40px 0 40px;">
                                <a class="uk-button uk-button-primary uk-button-xsmall" href="#modal-001" uk-toggle>Detalhes</a>
                                <!-- <a class="uk-button uk-button-default uk-button-xsmall" href="#modal-sections" uk-toggle>Excluir</a> -->
                                <div id="modal-001" uk-modal>
                                    <div class="uk-modal-dialog">
                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                        <div class="uk-modal-header">
                                            <h2 class="uk-modal-title">Modal Title</h2>
                                        </div>
                                        <div class="uk-modal-body">
                                            <p>Código: 001</p>
                                        </div>
                                        <div class="uk-modal-footer uk-text-right">
                                            <button class="uk-button uk-button-default uk-modal-close"
                                                type="button">Cancel</button>
                                            <button class="uk-button uk-button-primary" type="button">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="uk-card-footer">  
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

