<?php
// _tpl_fill(ROOT_ADMIN_ROUTES.'client-create/client-create.tpl', $Extra, '');
?>

<div class="uk-container">
    <h3 class="uk-align-left">Novo Clientes</h3>
    <div class="uk-text-right">
        <a href="<?= BASE_ADMIN ?>clients/manager/" class="uk-button uk-button-primary uk-button-xsmall"><i class="fas fa-share"></i> Gerenciar Cliente</a>
    </div>
</div>

<div class="uk-container">
    <div class="uk-grid-small" uk-grid>

        <!-- Conteúdo -->
        <div class="uk-width-expand">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Lista de cliente</h4>
                </div>
                <div class="uk-card-body uk-padding-small">

                    <form data-liloo method="post" class="uk-grid-small" uk-grid>
                        <input type="hidden" name="action" value="client_create">
                        <input type="hidden" name="path" value="modules/clients/ajax/Manager">


                        <div class="uk-width-1-1">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-3@m">
                                    <label class="uk-form-label">Código</label>
                                    <div class="uk-form-controls">
                                        <input name="client_code" class="uk-input" type="text" autofocus required>
                                    </div>
                                </div>
                                <div class="uk-width-expand@m">
                                    <label class="uk-form-label">Número CNPJ / CPF</label>
                                    <div class="uk-form-controls">
                                        <input name="client_document" class="uk-input" type="text" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-2@m">
                                    <label class="uk-form-label">Nome do Cliente / Empresa</label>
                                    <div class="uk-form-controls">
                                        <input name="client_name" class="uk-input" type="text" required>
                                    </div>
                                </div>
                                <div class="uk-width-1-2@m">
                                    <label class="uk-form-label">E-mail</label>
                                    <div class="uk-form-controls">
                                        <input name="client_email" class="uk-input" type="mail">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-3@s">
                                    <label class="uk-form-label">Whatsapp</label>
                                    <div class="uk-form-controls">
                                        <input name="client_whatsapp" class="uk-input" type="text" liloo-mask-phone>
                                    </div>
                                </div>
                                <div class="uk-width-1-3@s">
                                    <label class="uk-form-label">Telefone 1</label>
                                    <div class="uk-form-controls">
                                        <input name="client_phone_1" class="uk-input" type="text" liloo-mask-phone>
                                    </div>
                                </div>
                                <div class="uk-width-1-3@s">
                                    <label class="uk-form-label">Telefone 2</label>
                                    <div class="uk-form-controls">
                                        <input name="client_phone_2" class="uk-input" type="text" liloo-mask-phone>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <label class="uk-form-label">Endereço completo</label>
                            <div class="uk-form-controls">
                                <input name="client_address" class="uk-input" type="text">
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <label class="uk-form-label">Observações</label>
                            <div class="uk-form-controls">
                                <textarea name="client_description" class="uk-textarea" required></textarea>
                            </div>
                        </div>
                     
                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>
                            <button type="submit" class="uk-button uk-button-primary uk-button-small">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Lateral -->
        <div class="uk-width-1-3@m">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Mais recentes</h4>
                </div>
                <div class="uk-card-body uk-text-small uk-padding-small">
                    <?php
                    $Last = _get_data_full("SELECT `client_code`,`client_name` FROM `".TB_CLIENTS."` ORDER BY `client_id` DESC LIMIT 5");
                    $Last = (isset($Last))? $Last : false;
                    if($Last){
                        foreach ($Last as $list) {
                            echo "<p><b>Cód:</b> {$list['client_code']} <br> <b>Nome:</b> {$list['client_name']}</p> <hr>";
                        }
                    }else{
                        echo 'Nenhum cliente cadastrado';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="uk-margin-large"></div>