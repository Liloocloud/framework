
const ThisModule = 'portal';
const ThisAction = 'categs';

/**
 * Enviando form e obentendo resultado para apresentar no HTML
 * utilizando o metodo lilooV3.Form()
 */
$('#search-user').on('submit', function (e) {
    $('[liloo-loader]').show()
    e.preventDefault()
    let search = $('input[name="users_search"]').val()
    $('input[name="users_search"]').removeClass("uk-form-danger")
    if (search) {
        lilooV3.Form({
            form: this,
            success: function (res) {            
                if(res.bool === false){
                    lilooUi.Notify({
                        type: 'error',
                        message: res.message
                    })
                    return false
                }
                $('#account_users_list').html('')
                res.output.forEach((val) => {
                    $('#account_users_list').prepend(`
                    <li onclick="modalChannelData('.uk-modal-full','${val.tax_id}')">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <div>
                            ${val.tax_name}
                            </div>
                            <div>
                                <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.tax_id}')"></button>
                                <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.tax_id}')"></button>
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
function modalChannelData(modal, id) {
    $('[liloo-loader]').show()
    lilooV3.Event({
        action: ThisModule+'/users/modal',
        path: 'modules/'+ThisModule+'/dash/routes/'+ThisAction+'/ajax',
        data: id,
        success: function (res) {
            console.log(res)
            $(modal + ' .tax_id').html(res.tax_id)
            $(modal + ' .tax_name').html(res.tax_name)
            $(modal + ' .tax_active').html(res.tax_active)
            $(modal + ' .tax_registered').html(res.tax_registered)
            $(modal + ' .tax_status').html(res.tax_status)
            $(modal + ' .tax_inner_id').html(res.tax_inner_id)
            $(modal + ' .tax_meta').html(res.tax_meta)
            $(modal + ' .tax_description').html(res.tax_description)
        }
    })
    UIkit.modal(modal).toggle();
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
        action: ThisModule+'/users/button/edit',
        path: 'modules/'+ThisModule+'/dash/routes/'+ThisAction+'/ajax',
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
    $('[liloo-loader]').show()
    setTimeout(function () {
        lilooV3.Event({
            action: ThisModule+'/users/reports',
            path: 'modules/'+ThisModule+'/dash/routes/'+ThisAction+'/ajax',
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
        action: ThisModule+'/users/refresh',
        path: 'modules/'+ThisModule+'/dash/routes/'+ThisAction+'/ajax',
        data: '',
        success: function (res) {
            $('#account_users_list').html('')
            res.forEach((val) => {
                $('#account_users_list').prepend(`
                    <li onclick="modalChannelData('.uk-modal-full','${val.tax_id}')">
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <div>
                                ${val.tax_name}
                            </div>
                            <div>
                                <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.tax_id}')"></button>
                                <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.tax_id}')"></button>
                            </div>
                        </div>							
                    </li>
                    `)
            })
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

/**
 * Formulário de Lista de Categorias
 * portal/categs/create/list
 */
$('#create-list-categs').on('submit', function(e){
    e.preventDefault()
    lilooV3.Form({
        form: this,
        success: function (res) {
            console.log(res)
            if (res.bool === true) {
                lilooUi.Alert({
                    type: 'success',
                    element: '.alert-list-categs',
                    text: res.message,
                    done: function () {
                        $('textarea[name="tax_listing"]').val('')
                    }
                })
            } else {
                lilooUi.Alert({
                    type: 'error',
                    element: '.alert-list-categs',
                    text: res.message
                })
            }
            // listRefresh()
            $('[liloo-loader]').hide()
        }
    })
    return false
})

