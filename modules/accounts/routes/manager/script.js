
const ThisModule = 'accounts';
const ThisAction = 'manager';

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
                    <li onclick="modalChannelData('.uk-modal-full','${val.account_id}')">
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
function modalChannelData(modal, id) {
    lilooV3.Event({
        action: ThisModule+'/'+ThisAction+'/modal',
        path: 'modules/'+ThisModule+'/routes/'+ThisAction+'/ajax',
        data: id,
        success: function (res) {

            console.log(res)
       

             // $(modal + ' .modal-title').html(res.categ_title.split(", ",1))
            // $(modal + ' .categ_title').html(res.categ_title.replaceAll(", ","<br>"))
            $(modal + ' .account_name').html(res.account_name)
            $(modal + ' .account_lastname').html(res.account_lastname)
            $(modal + ' .account_id').html(res.account_id)
            $(modal + ' .account_phone').html(res.account_phone)
            $(modal + ' .account_email').html(res.account_email)
            $(modal + ' .account_cpf').html(res.account_cpf)
            $(modal + ' .account_cnpj').html(res.account_cnpj)
            $(modal + ' .account_registered').html(res.account_registered)
            $(modal + ' .account_last_login').html(res.account_last_login)
            $(modal + ' .account_status').html(res.account_status)
            $(modal + ' .account_token').html(res.account_token)
            $(modal + ' .account_level').html(res.account_level)
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
        action: ThisModule+'/'+ThisAction+'/button/edit',
        path: 'modules/'+ThisModule+'/routes/'+ThisAction+'/ajax',
        data: id
    })
    return false
}


/**
 * Deletar Colaborador
 */
function workerDelete(id) {
    lilooJS.Event({
        action: ThisModule+'/'+ThisAction+'/button/delete',
        path: 'modules/'+ThisModule+'/routes/'+ThisAction+'/ajax',
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
            action: ThisModule+'/'+ThisAction+'/reports',
            path: 'modules/'+ThisModule+'/routes/'+ThisAction+'/ajax',
            data: Data,
            success: function (res) {
                console.log(res)
                $(El).html(res)
            }
        })
        $('[liloo-loader]').hide()
    }, Delay)
}
reportsBasic('valid', '.users-valid', 400)
reportsBasic('term', '.users-term', 800)
reportsBasic('active', '.users-active', 1200)
reportsBasic('inactive', '.users-inactive', 1600)


/**
 * Recarregar lista
 */
function listRefresh() {
    lilooV3.Event({
        action: ThisModule+'/'+ThisAction+'/refresh',
        path: 'modules/'+ThisModule+'/routes/'+ThisAction+'/ajax',
        data: '',
        success: function (res) {
            $('#account_users_list').html('')
            res.forEach((val) => {
                $('#account_users_list').prepend(`
                    <li onclick="modalChannelData('.uk-modal-full','${val.account_id}')">
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