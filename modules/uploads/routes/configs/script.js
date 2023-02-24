





const ThisModule = 'portal';
const ThisAction = 'categs';

/**
 * Enviando form e obentendo resultado para apresentar no HTML
 * utilizando o metodo lilooV3.Form()
 */
$('#search-categs').on('submit', function (e) {
    $('[liloo-loader]').show()
    e.preventDefault()
    let search = $('input[name="categ_search"]').val()
    $('input[name="categ_search"]').removeClass("uk-form-danger")
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
                $('#categ_listing').html('')
                res.output.forEach((val) => {
                    $('#categ_listing').prepend(`
                    <li onclick="modalChannelData('.uk-modal-full','${val.tax_id}')">
                            <div class="uk-flex uk-flex-middle" uk-grid>
                                <div class="uk-width-expand">
                                    <div class="uk-flex uk-flex-middle" uk-grid>
                                        <span class="uk-width-1-4" style="font-size: 12px">
                                            <b>Id:</b> ${val.tax_id}<br>
                                            <b>Inner:</b> ${val.tax_inner_id}
                                        </span>
                                        <span class="uk-width-expand">${val.tax_name}</span>
                                    </div>
                                </div>
                                <div class="uk-width-1-4 uk-text-right">
                                    <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.ads_id}')"></button>
                                    <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.ads_id}')"></button>
                                </div>
                            </div>    
                        </li>
                    `)
                })
                $('[liloo-loader]').hide()
            }
        })
    } else {
        $('input[name="categ_search"]').addClass("uk-form-danger").focus()
        lilooUi.Notify({
            message: 'Campo vazio',
            type: 'alert'
        })
    }
    $('[liloo-loader]').hide()
    return false
})

/**
 * Abrindo Janela modal para apresentar as informações
 */
function modalChannelData(modal, id) {
    $('[liloo-loader]').show()
    lilooV3.Event({
        action: ThisModule+'/users/modal',
        path: 'modules/'+ThisModule+'/routes/'+ThisAction+'/ajax',
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
// reportsBasic('valid', '.users-valid', 400)
// reportsBasic('term', '.users-term', 800)
// reportsBasic('active', '.users-active', 1200)
// reportsBasic('inactive', '.users-inactive', 1600)


/**
 * Recarregar lista
 */
function listRefresh() {
    lilooV3.Event({
        action: 'portal/categs/refresh',
        path: 'modules/'+ThisModule+'/routes/'+ThisAction+'/ajax',
        data: '',
        success: function (res) {
            if(res.bool == true){
                $('#categ_listing').html('')
                res.output.forEach((val) => {
                    $('#categ_listing').prepend(`
                        <li onclick="modalChannelData('.uk-modal-full','${val.tax_id}')">
                            <div class="uk-flex uk-flex-middle" uk-grid>
                                <div class="uk-width-expand">
                                    <div class="uk-flex uk-flex-middle" uk-grid>
                                        <span class="uk-width-1-4" style="font-size: 12px">
                                            <b>Id:</b> ${val.tax_id}<br>
                                            <b>Inner:</b> ${val.tax_inner_id}
                                        </span>
                                        <span class="uk-width-expand">${val.tax_name}</span>
                                    </div>
                                </div>
                                <div class="uk-width-1-4 uk-text-right">
                                    <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.ads_id}')"></button>
                                    <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.ads_id}')"></button>
                                </div>
                            </div>    
                        </li>
                    `)
                })
            }else{
                $('#categ_listing').html('<li>'+res.message+'</li>')
            }
        }
    })
    $('[liloo-loader]').hide()
    return false
}
listRefresh()
$('.refresh-list').on('click', function () {
    $('input[name=categ_search]').removeClass('uk-form-danger')
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


$('.checkbox').checkbox()

