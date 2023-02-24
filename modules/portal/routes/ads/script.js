/**
 * Enviando form e obentendo resultado para apresentar no HTML
 * utilizando o metodo lilooV3.Form()
 */
$('#search-user').on('submit', function (e) {
    e.preventDefault()
    let search = $('input[name="users_search"]').val()
    $('input[name="users_search"]').removeClass("uk-form-danger")
    if (search) {
        lilooV3.Form({
            form: this,
            success: function (res) {
                $('#ads_listing').html('')
                res.forEach((val) => {
                    $('#ads_listing').prepend(`
                    <li onclick="openModal('.uk-modal-full','${val.account_id}')">
                        <div class="uk-flex uk-flex-between">
                            <div>
                                ${val.account_name} ${val.account_lastname}<br>
                                ${val.account_email}<br>
                                ${val.account_phone}
                            </div>
                            <div>
                                <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.account_id}')"></button>
                                <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.account_id}')"></button>
                            </div>
                        </div>							
                    </li>
                    `)
                })
                $('[liloo-loader]').hide()
            }
        })
    } else {
        $('input[name="users_search"]').addClass("uk-form-danger").focus()
        lilooUi.Notify({
            message: 'Campo vazio',
            type: 'alert'
        })
    }
    return false
})


/**
 * Abrindo Janela modal para apresentar as informações
 */
function openModal(modal, id) {
    $('[liloo-loader]').show()
    lilooV3.Event({
        action: 'ads/item/modal',
        path: 'modules/portal/routes/ads/ajax',
        data: id,
        success: function (res) {
            if (res.bool == true) {
                res = res.output[0]
                for (const [Key, Val] of Object.entries(res)) {
                    $(modal + ' .'+Key).html(Val)
                }

                // ads_id
                // ads_account_id
                
                // ads_category
                // ads_category_sectors
                // ads_title

                // ads_adds
                // ads_type
    

                if (res.ads_hashtags.includes(';')) {
                    let tags = '';
                    res.ads_hashtags.split(';').forEach((item) => {
                        tags += '<span>' + item + '</span>' 
                    })
                    $(modal + ' .ads_hashtags').html(tags)
                } else {
                    $(modal + ' .ads_hashtags').html('<span>' + res.ads_hashtags + '</span>')
                }
                UIkit.modal(modal).toggle();
            } else {
                lilooUi.Alert({
                    element: '#msg-list-ads',
                    type: 'alert',
                    text: res.message
                })
            }
        }
    })
    $('[liloo-loader]').hide()
    return false
}


/**
 * Cadastrando novo usuário
 */
$('#create-user').on('submit', function (e) {
    e.preventDefault()
    $('[liloo-alerts]').hide()
    $('input[name="account_cpf"]').removeClass('uk-form-danger')
    $('input[name="account_cnpj"]').removeClass('uk-form-danger')
    $('input[name="account_email"]').removeClass('uk-form-danger')
    $('input[name="account_phone"]').removeClass('uk-form-danger')

    // Validando E-mail
    let email = $('input[name="account_email"]').val()
    if (email != '' && !lilooCheck.Email(email)) {
        lilooUi.Alert({
            type: 'error',
            text: 'E-mail inválido',
            done: function () {
                $('input[name="account_email"]').addClass('uk-form-danger').focus()
            }
        })
        return false
    }

    // Validando Telefone Whatsaoo
    let phone = $('input[name="account_phone"]').val()
    if (phone != '' && phone.length <= 13) {
        lilooUi.Alert({
            type: 'error',
            text: 'Telefone inválido',
            done: function () {
                $('input[name="account_phone"]').addClass('uk-form-danger').focus()
            }
        })
        return false
    }

    // Validando CPF
    let cpf = $('input[name="account_cpf"]').val()
    if (cpf != '' && cpf.length <= 13) {
        lilooUi.Alert({
            type: 'error',
            text: 'CPF inválido',
            done: function () {
                $('input[name="account_cpf"]').addClass('uk-form-danger').focus()
            }
        })
        return false
    }

    // Validando CNPJ
    let cnpj = $('input[name="account_cnpj"]').val()
    if (cnpj != '' && cnpj.length <= 17) {
        lilooUi.Alert({
            type: 'error',
            text: 'CNPJ inválido',
            done: function () {
                $('input[name="account_cpf"]').removeClass('uk-form-danger')
                $('input[name="account_cnpj"]').addClass('uk-form-danger').focus()
            }
        })
        return false
    }

    lilooV3.Form({
        form: this,
        success: function (res) {
            console.log(res)
            if (res.bool === false) {
                lilooUi.Alert({
                    type: 'error',
                    text: res.message,
                    done: function () {
                        $('input[name="account_email"]').addClass('uk-form-danger').focus()
                    }
                })
            } else {
                $('#create-user').trigger('reset')
                UIkit.modal('#modal-new-user').hide();
                lilooUi.Notify({
                    message: 'Usuário cadastrado com sucesso!',
                    type: 'success'
                })
            }
            listRefresh()
            $('[liloo-loader]').hide()
        }
    })
    return false
})

/**
 * Editar Colaborador
 */
function workerEdit(id) {
    lilooJS.Event({
        action: 'accounts/users/button/edit',
        path: 'modules/ads/dash/routes/adverts/ajax',
        data: id
    })
    return false
}


/**
 * Deletar Colaborador
 */
function workerDelete(id) {
    lilooJS.Event({
        action: 'accounts/users/button/delete',
        path: 'modules/accounts/dash/routes/users/ajax',
        data: id
    })
    return false
}

/**
 * Total de usuário
 * @param {valid, term, active, inactive} Data 
 * @param {Elemento HTML} El 
 * @param {Atraso na execução} Delay 
 */
function reportsBasic(Data, El, Delay) {
    setTimeout(function () {
        lilooV3.Event({
            action: 'accounts/users/reports',
            path: 'modules/ads/dash/routes/adverts/ajax',
            data: Data,
            success: function (res) {
                console.log(res)
                $(El).html(res)
            }
        })
        $('[liloo-loader]').hide()
    }, Delay)
}
// reportsBasic('valid', '.users-valid', 400)
// reportsBasic('term', '.users-term', 800)
// reportsBasic('active', '.users-active', 1200)
// reportsBasic('inactive', '.users-inactive', 1600)


/**
 * Recarregar lista
 */
function listRefresh() {
    lilooV3.Event({
        action: 'ads/refresh',
        path: 'modules/portal/routes/ads/ajax',
        data: '',
        success: function (res) {
            $('#ads_listing').html('')
            if (res.bool == true) {
                res.output.forEach((val) => {
                    $('#ads_listing').prepend(`
                        <li onclick="openModal('.uk-modal-full','${val.ads_id}')">
                            <div class="" uk-grid>
                                <div class="uk-width-expand">
                                    <b>Cód:</b> ${val.ads_id}<br>
                                    <b>Título:</b> ${val.ads_title}<br>
                                    <b>Descrição:</b> ${val.ads_description}
                                </div>
                                <div class="uk-width-1-4 uk-text-right">
                                    <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.ads_id}')"></button>
                                    <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.ads_id}')"></button>
                                </div>
                            </div>							
                        </li>
                    `)
                })
            } else {
                $('#ads_listing').html('<li>' + res.message + '</li>')
            }
        }
    })
    $('[liloo-loader]').hide()
    return false
}
listRefresh()
$('.refresh-list').on('click', function () {
    $('input[name=users_search]').removeClass('uk-form-danger')
    listRefresh()
})