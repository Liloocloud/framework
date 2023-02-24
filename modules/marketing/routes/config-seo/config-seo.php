
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
    <h3>Ajustes SEO do Site</h3>
</div>

<div class="uk-container">
    <div class="uk-child-width-1-3@m uk-grid-small" uk-grid="masonry: true">

        <!-- SEO Básico -->
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>SEO Básico</h4>
                    <p class="uk-text-small">Informações que ajudam no posicionamento do site nos buscadores</p>
                </div>
                <div class="uk-card-body uk-padding-small">

                    <form data-liloo method="post" class="uk-grid-small" uk-grid>
                        <input type="hidden" name="action" value="config_seo">
                        <input type="hidden" name="path" value="modules/traffic-manager/ajax/configsManager">


                        <div class="uk-width-1-1">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Título do Site</label>
                                <div class="uk-form-controls">
                                    <textarea name="seo_title"  class="uk-textarea" rows="3" required><?= $Config['seo_title']['opt_values'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Palavras-chave (Separe por vírgula)</label>
                                <div class="uk-form-controls">
                                    <textarea name="seo_keywords"  class="uk-textarea" rows="5" required><?= $Config['seo_keywords']['opt_values'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Descrição da empresa</label>
                                <div class="uk-form-controls">
                                    <textarea name="seo_description" rows="5" class="uk-textarea" required><?= $Config['seo_description']['opt_values'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>
                            <button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar Informações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Informações Extras -->
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small">
                    <h4>SEO Crítico</h4>
                    <p class="uk-text-small">Informações que ajudam no posicionamento do site nos buscadores</p>
                </div>
                <div class="uk-card-body uk-padding-small">
                    <form data-liloo method="post" class="uk-grid-small" uk-grid>
                        <input type="hidden" name="action" value="config_seo_site_name">
                        <input type="hidden" name="path" value="modules/traffic-manager/ajax/configsManager">

                        <div class="uk-width-1-1">
                            <div class="uk-width-expand@m">
                                <label class="uk-form-label">Nome do Site</label>
                                <div class="uk-form-controls">
                                    <input name="seo_site_name"  class="uk-input" value="<?= $Config['seo_site_name']['opt_values'] ?>" required autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-1-1">
                            <div class="callback-alert" style="display: none;"></div>
                            <button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar Informações</button>
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
        }, 2000);
    })
</script>