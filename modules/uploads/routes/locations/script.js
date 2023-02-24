const ThisModule = 'portal';
const ThisAction = 'locations';

/**
 * Alternação entre os formulários
 */
$('#api_location_type').on('change', function () {
    $('#api_countries').hide()
    $('#api_states').hide()
    $('#api_cities').hide()
    $('#api_districts').hide()
    let form = $(this).val()
    $('#' + form).show()
    if (form == 'api_states') { $('#state_set_country').focus() }
    if (form == 'api_cities') { $('#city_set_state').focus() }
    if (form == 'api_districts') { $('#district_set_city').focus() }
    return false
})

/**
 * Busca Country
 */
$('#state_set_country').on("keypress", function () {
    $('#spinner-country').show()
}).autocomplete({
    delay: 2000,
    minLength: 2,
    source: function (req, res) {
        lilooV3.Event({
            action: 'portal/locations/search/country',
            path: 'modules/' + ThisModule + '/routes/' + ThisAction + '/ajax',
            data: req.term,
            success: function (data) {
                res(data.output)
                $('#spinner-country').hide()
            }
        })
        $('[liloo-loader]').hide()
        $('#spinner-country').hide()
    },
    select: function () {
        $('#listing-country').show().focus()
        $('#listing-country textarea').focus()
    }
})

/**
 * Busca States
 */
$('#city_set_state').on("keypress", function () {
    $('#spinner-state').show()
}).autocomplete({
    minLength: 2,
    source: function (req, res) {
        lilooV3.Event({
            action: 'portal/locations/search/state',
            path: 'modules/' + ThisModule + '/routes/' + ThisAction + '/ajax',
            data: req.term,
            success: function (data) {
                res(data.output)
                $('#spinner-state').hide()
            }
        })
        $('[liloo-loader]').hide()
        $('#spinner-state').hide()
    },
    select: function (res, ui) {
        let item = ui.item.value.split(' - Cód.')
        $('input[name="state_selected"]').val(item[1])
        $('#listing-state').show()
        $('#listing-state textarea').val('').focus()
    }
})

/**
 * Busca Cities
 */
$('#district_set_city').on("keypress", function () {
    $('#spinner-city').show()
}).autocomplete({
    minLength: 2,
    source: function (req, res) {
        lilooV3.Event({
            action: 'portal/locations/search/city',
            path: 'modules/' + ThisModule + '/routes/' + ThisAction + '/ajax',
            data: req.term,
            success: function (data) {
                res(data.output)
                $('#spinner-city').hide()
            }
        })
        $('[liloo-loader]').hide()
        $('#spinner-city').hide()
    },
    select: function () {
        $('#listing-city').show().focus()
        $('#listing-city textarea').focus()
    }
})

/**
 * Enviando form e obentendo resultado para apresentar no HTML
 * utilizando o metodo lilooV3.Form()
 */
$('[api-locations]').on('submit', function (e) {
    $('[liloo-loader]').show()
    $('#msg-list-cities').hide()
    e.preventDefault()
    lilooV3.Form({
        form: this,
        success: function (res) {
            if (res.bool == true) {
                lilooUi.Alert({
                    element: '#msg-list-cities',
                    type: 'success',
                    text: res.message
                })
                $('[liloo-loader]').hide()
                return
            } else {
                lilooUi.Alert({
                    element: '#msg-list-cities',
                    type: 'alert',
                    text: res.message
                })
                $('[liloo-loader]').hide()
                return
            }
        }
    })
    $('[liloo-loader]').hide()
    return
})

/**
 * Carrega a listagem de Cidades
 */
function listRefreshCities() {
    lilooV3.Event({
        action: ThisModule + '/locations/cities/refresh',
        path: 'modules/' + ThisModule + '/routes/' + ThisAction + '/ajax',
        data: '',
        success: function (res) {
            $('#cities_listing').html('')
            if (res.bool == true) {
                res.output.forEach((val) => {
                    $('#cities_listing').prepend(`
                        <li onclick="modalChannelData('.uk-modal-full','${val.city_id}')">
                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                <div>
                                    <span style="font-size: 12px">Cód. ${val.city_id}</span>
                                    <span> - ${val.city_name}</span>
                                </div>
                                <div>
                                    <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.city_id}')"></button>
                                    <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.city_id}')"></button>
                                </div>
                            </div>							
                        </li>
                    `)
                })
            } else {
                $('#cities_listing').html('<li>' + res.message + '</li>')
            }
        }
    })
    $('[liloo-loader]').hide()
    return false
}
listRefreshCities()

/**
 * Carrega a listagem de bairros
 */
function listRefreshDistricts() {
    lilooV3.Event({
        action: ThisModule + '/locations/districts/refresh',
        path: 'modules/' + ThisModule + '/routes/' + ThisAction + '/ajax',
        data: '',
        success: function (res) {
            $('#districts_listing').html('')
            if (res.bool == true) {
                res.output.forEach((val) => {
                    $('#districts_listing').prepend(`
                        <li onclick="modalChannelData('.uk-modal-full','${val.district_id}')">
                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                <div>
                                    <span style="font-size: 12px">Cód. ${val.district_id}</span>
                                    <span> - ${val.district_name}</span>
                                </div>
                                <div>
                                    <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.district_id}')"></button>
                                    <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.district_id}')"></button>
                                </div>
                            </div>							
                        </li>
                    `)
                })
            } else {
                $('#districts_listing').html('<li>' + res.message + '</li>')
            }
        }
    })
    $('[liloo-loader]').hide()
    return false
}
listRefreshDistricts()



/**
 * Abrindo Janela modal para apresentar as informações
 */
 function modalChannelData(modal, id) {
    $('[liloo-loader]').show()
    lilooV3.Event({
        action: ThisModule + '/users/modal',
        path: 'modules/' + ThisModule + '/routes/' + ThisAction + '/ajax',
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



// $('.refresh-list').on('click', function () {
//     $('input[name=users_search]').removeClass('uk-form-danger')
//     listRefresh()
// })

/**
 * Formulário de Lista de Categorias
 * portal/categs/create/list
 */
$('#create-list-categs').on('submit', function (e) {
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

