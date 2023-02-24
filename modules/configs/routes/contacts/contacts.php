<?php
$Configs = _get_data_table(TB_OPTIONS, ['opt_account_id' => $_SESSION['account_id']]);
$url_in_array = in_array('config_email', array_column($Configs, 'opt_meta'));

$Config = [];
foreach ($Configs as $Value){
    $Config[$Value['opt_meta']] = $Value; 
    unset($Config[$Value['opt_meta']]['opt_meta']);
}
?>

<div class="uk-container uk-margin">
    <h3>Informações do Site</h3>
</div>

<div class="uk-container">
    <div class="uk-child-width-1-3@m uk-grid-small" uk-grid="masonry: true">

        <!-- Atendimento -->
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Atendimento</h4>
                    <p class="uk-text-small">Informações de contato e informações de atendimento</p>
                </div>
                <div class="uk-card-body uk-padding-small">

                    <form data-liloo method="post" class="uk-grid-small" uk-grid>
                        <input type="hidden" name="action" value="config_attendance">
                        <input type="hidden" name="path" value="admin/modules/configs/configsManager">

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">E-mail de contato</label>
                                <div class="uk-form-controls">
                                    <input name="config_email" class="uk-input" type="text" value="<?= $Config['config_email']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Telefone</label>
                                <div class="uk-form-controls">
                                    <input name="config_phone" class="uk-input" type="text" value="<?= $Config['config_phone']['opt_values'] ?>" liloo-mask-phone required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Celular</label>
                                <div class="uk-form-controls">
                                    <input name="config_celular" class="uk-input" type="text" value="<?= $Config['config_celular']['opt_values'] ?>" liloo-mask-phone required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Whatsapp</label>
                                <div class="uk-form-controls">
                                    <input name="config_whatsapp" class="uk-input" type="text" value="<?= $Config['config_whatsapp']['opt_values'] ?>" liloo-mask-phone required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Mensagem padrão do Whatsapp</label>
                                <div class="uk-form-controls">
                                    <textarea name="config_whatsapp_mesage" rows="3" class="uk-textarea" required><?= $Config['config_whatsapp_mesage']['opt_values'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Horário de funcionamento</label>
                                <div class="uk-form-controls">
                                    <input name="config_hours" class="uk-input" type="text" value="<?= $Config['config_hours']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>
 
                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>
                            <button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Local -->
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Localização</h4>
                    <p>Informações de localização que serão apresentados no site</p>
                </div>
                <div class="uk-card-body uk-padding-small">

                    <form data-liloo method="post" class="uk-grid-small" uk-grid>
                        <input type="hidden" name="action" value="config_location">
                        <input type="hidden" name="path" value="admin/modules/configs/configsManager">

                        <div class="uk-width-1-1 uk-margin-remove-top">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Endereço</label>
                                <div class="uk-form-controls">
                                    <input name="address_street" class="uk-input" type="text" value="<?= $Config['address_street']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Número</label>
                                <div class="uk-form-controls">
                                    <input name="address_number" class="uk-input" type="text" value="<?= $Config['address_number']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Complemento</label>
                                <div class="uk-form-controls">
                                    <input name="address_complement" class="uk-input" type="text" value="<?= $Config['address_complement']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">CEP</label>
                                <div class="uk-form-controls">
                                    <input name="address_zipcode" class="uk-input" type="text" value="<?= $Config['address_zipcode']['opt_values'] ?>" liloo-mask-zipcode required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Cidade</label>
                                <div class="uk-form-controls">
                                    <input name="address_city" class="uk-input" type="text" value="<?= $Config['address_city']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Bairro</label>
                                <div class="uk-form-controls">
                                    <input name="address_district" class="uk-input" type="text" value="<?= $Config['address_district']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Estado</label>
                                <div class="uk-form-controls">
                                    <input name="address_state" class="uk-input" type="text" value="<?= $Config['address_state']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>
 
                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>
                            <button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Midias Sociais -->
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>Midias Sociais</h4>
                    <p class="uk-text-small">Informações de contato e informações de atendimento</p>
                </div>
                <div class="uk-card-body uk-padding-small">

                    <form data-liloo method="post" class="uk-grid-small" uk-grid>
                        <input type="hidden" name="action" value="config_midias">
                        <input type="hidden" name="path" value="admin/modules/configs/configsManager">


                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Facebook</label>
                                <div class="uk-form-controls">
                                    <input name="midia_facebook" class="uk-input" type="text" value="<?= $Config['midia_facebook']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Instagram</label>
                                <div class="uk-form-controls">
                                    <input name="midia_instagram" class="uk-input" type="text" value="<?= $Config['midia_instagram']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Youtube</label>
                                <div class="uk-form-controls">
                                    <input name="midia_youtube" class="uk-input" type="text" value="<?= $Config['midia_youtube']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin-remove">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Linkedin</label>
                                <div class="uk-form-controls">
                                    <input name="midia_linkedin" class="uk-input" type="text" value="<?= $Config['midia_linkedin']['opt_values'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>
                            <button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="uk-margin-large"></div>

<script>
    $('button[type="submit"]').on('click', function(){
        setInterval(function(){
            document.location.reload(true)
        }, 3000);
    })
</script>