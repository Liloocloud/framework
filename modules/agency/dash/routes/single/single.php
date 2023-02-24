<?php
if (isset(URL()[3])) :
    $User = _get_data_full(
        "SELECT *
    FROM `" . TB_ACCOUNTS . "`
    INNER JOIN `" . TB_ACCOUNT_ENTITIES . "`
    ON " . TB_ACCOUNTS . ".account_id = " . TB_ACCOUNT_ENTITIES . ".entity_account_id"
    );
    $User = (isset($User[0])) ? $User[0] : $User;
    // var_dump($User);
?>

    <div class="uk-child-width-1-2@m uk-grid-small" uk-grid="masonry: true">

        <!-- Perfil do usuário -->
        <div>
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Perfil do usuário</h6>
                </div>
                <div class="card-body">
                    <form data-liloo autocomplete="off">
                        <input type="hidden" name="path" value="modules/accounts/widgets/upprofile">
                        <input type="hidden" name="account_id" id="account_id">

                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="account_id" class="form-label">Nome</label>
                                <input id="account_id" name="account_id" type="text" class="form-control" value="<?= $User['account_id'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="account_level" class="form-label">Sobrenome</label>
                                <input id="account_level" name="account_level" type="text" class="form-control" value="<?= $User['account_level'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="account_coin" class="form-label">Gênero</label>
                                <select class="form-control" id="account_coin">
                                    <?php
                                    $Pre = ['Masculino', 'Feminino', 'Outro'];
                                    foreach ($Pre as $genre) {
                                        if ($User['account_genre'] == $genre) {
                                            echo "<option value='{$genre}' selected>{$genre}</option>";
                                        } else {
                                            echo "<option value='{$genre}'>{$genre}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <label for="account_url" class="form-label">URL de apresentação <small>(Apenas para sistemas que mostran o usuário)</small></label>
                            <span class="input-group-text" id="basic-addon3" style="border-radius: 5px 0 0 5px;"><?= BASE ?>user/</span>
                            <input id="account_url" name="account_url" type="text" class="form-control" value="<?= $User['account_url'] ?>" aria-describedby="basic-addon3">
                        </div>


                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="account_id" class="form-label">Usuário - ID</label>
                                <input id="account_id" name="account_id" type="text" class="form-control" value="<?= $User['account_id'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="account_level" class="form-label">Nível de permissão</label>
                                <input id="account_level" name="account_level" type="text" class="form-control" value="<?= $User['account_level'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="account_coin" class="form-label">Coins <small>(Moedas da Liloo)</small></label>
                                <input id="account_coin" name="account_coin" type="text" class="form-control" value="<?= $User['account_coin'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="entity_city" class="form-label">Cidade</label>
                                <input id="entity_city" name="entity_city" type="text" class="form-control" value="<?= $User['entity_city'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="entity_district" class="form-label">Bairro</label>
                                <input id="entity_district" name="entity_district" type="text" class="form-control" value="<?= $User['entity_district'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="entity_state" class="form-label">Estado /UF</label>
                                <input id="entity_state" name="entity_state" type="text" class="form-control" value="<?= $User['entity_state'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="entity_country" class="form-label">País</label>
                                <input id="entity_country" name="entity_country" type="text" class="form-control" value="<?= $User['entity_country'] ?>">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary shadow-sm">Atualizar localização</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Lateral Entities -->
        <div>
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detalhes adicionais da Conta do usuário (Entities)</h6>
                </div>
                <div class="card-body">
                    <form data-liloo autocomplete="off">
                        <input type="hidden" name="path" value="modules/accounts/widgets/update">
                        <input type="hidden" name="account_id" id="account_id">
                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="entity_fantasy_name" class="form-label">Nome fantasia</label>
                                <input id="entity_fantasy_name" name="entity_fantasy_name" type="text" class="form-control" value="<?= $User['entity_fantasy_name'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="entity_activity" class="form-label">Ramo de atividade</label>
                                <input id="entity_activity" name="entity_activity" type="text" class="form-control" value="<?= $User['entity_activity'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="entity_whatsapp" class="form-label">Whatsapp</label>
                                <input id="entity_whatsapp" name="entity_whatsapp" type="text" class="form-control liloo-mask-phone" value="<?= $User['entity_whatsapp'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="entity_phone_1" class="form-label">Telefone 1</label>
                                <input id="entity_phone_1" name="entity_phone_1" type="text" class="form-control liloo-mask-phone" value="<?= $User['entity_phone_1'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="entity_phone_2" class="form-label">Telefone 2</label>
                                <input id="entity_phone_2" name="entity_phone_2" type="text" class="form-control liloo-mask-phone" value="<?= $User['entity_phone_2'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="entity_phone_2" class="form-label">Pessoa Física ou Jurídica?</label>
                                <div class="form-check">
                                    <input onclick="setDocument('cpf')" class="form-check-input" type="radio" name="entity_entity" id="fisica" checked>
                                    <label class="form-check-label" for="fisica">Física</label>
                                </div>
                                <div class="form-check">
                                    <input onclick="setDocument('cnpj')" class="form-check-input" type="radio" name="entity_entity" id="juridica">
                                    <label class="form-check-label" for="juridica">Jurídica</label>
                                </div>
                            </div>
                            <div class="col-sm mb-3">
                                <div class="user_cpf">
                                    <label for="account_email" class="form-label">CPF</label>
                                    <input id="account_email" name="entity_cpf" type="text" class="form-control liloo-mask-cpf" value="<?= $User['entity_cpf'] ?>">
                                </div>
                                <div class="user_cnpj" style="display: none;">
                                    <label for="account_email" class="form-label">CNPJ</label>
                                    <input id="account_email" name="entity_cnpj" type="text" class="form-control liloo-mask-cnpj" value="<?= $User['entity_cnpj'] ?>">
                                </div>
                            </div>
                            <script>
                                function setDocument(type) {
                                    if (type == 'cnpj') {
                                        $(".user_cnpj").show()
                                        $(".user_cpf").hide()
                                    } else {
                                        $(".user_cpf").show()
                                        $(".user_cnpj").hide()
                                    }
                                }
                            </script>
                        </div>


                        <div class="mb-3">
                            <label for="account_email" class="form-label">E-mail da conta</label>
                            <input id="account_email" name="account_email" type="text" class="form-control" value="<?= $User['entity_fantasy_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="account_coin" class="form-label">Total de moedas da conta</label>
                            <input id="account_coin" name="account_coin" type="text" class="form-control" value="<?= $User['entity_fantasy_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="account_status" class="form-label">Status do usuário</label>
                            <input id="account_status" name="account_status" type="text" class="form-control" value="<?= $User['entity_fantasy_name'] ?>">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary shadow-sm">Atualizar detalhes da conta</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Localização -->
        <div>
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Localização do usuário</h6>
                </div>
                <div class="card-body">
                    <form data-liloo autocomplete="off">
                        <input type="hidden" name="path" value="modules/accounts/widgets/uplocation">
                        <input type="hidden" name="account_id" id="account_id">

                        <div class="mb-3">
                            <label for="entity_address" class="form-label">Endereço</label>
                            <input id="entity_address" name="entity_address" type="text" class="form-control" value="<?= $User['entity_address'] ?>">
                        </div>

                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="entity_number" class="form-label">Número</label>
                                <input id="entity_number" name="entity_number" type="text" class="form-control" value="<?= $User['entity_number'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="entity_complement" class="form-label">Complemento</label>
                                <input id="entity_complement" name="entity_complement" type="text" class="form-control" value="<?= $User['entity_complement'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="entity_city" class="form-label">Cidade</label>
                                <input id="entity_city" name="entity_city" type="text" class="form-control" value="<?= $User['entity_city'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="entity_district" class="form-label">Bairro</label>
                                <input id="entity_district" name="entity_district" type="text" class="form-control" value="<?= $User['entity_district'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm mb-3">
                                <label for="entity_state" class="form-label">Estado /UF</label>
                                <input id="entity_state" name="entity_state" type="text" class="form-control" value="<?= $User['entity_state'] ?>">
                            </div>
                            <div class="col-sm mb-3">
                                <label for="entity_country" class="form-label">País</label>
                                <input id="entity_country" name="entity_country" type="text" class="form-control" value="<?= $User['entity_country'] ?>">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary shadow-sm">Atualizar localização</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
else :
?>
    <div class="alert alert-primary" role="alert">
        Nenhum usuário selecionado <a href="<?= BASE_ADMIN ?>accounts/manager/" class="alert-link">Voltar</a>.
    </div>
<?php
endif;
?>