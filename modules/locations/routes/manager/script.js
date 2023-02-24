const path = 'modules/locations/ajax/manager';

/**
 * Alternação entre os formulários
 */
$('#api_location_type').on('change', function () {
    $('#api_countries').hide()
    $('#api_states').hide()
    $('#api_cities').hide()
    $('#api_districts').hide()
    $('#api_states [input-search]').blur()
    $('#api_cities [input-search]').blur()
    $('#api_districts [input-search]').blur()
    $('#api_countries input[name="country_name"]').blur()
    let form = $(this).val()
    $('#' + form).show()
    if (form == 'api_countries') { 
        $('#' + form +' input[name="country_name"]').focus()
    }else{
        $('#' + form +' [input-search]').focus()
    }
    return false
})

/**
 * Enviando form e obentendo resultado para apresentar no HTML
 * utilizando o metodo lilooV3.Form()
 */
$('[api-locations]').on('submit', function (e) {
    e.preventDefault()
    lilooV3.Form({
        form: this,
        success: function (res) {        
            Swal.fire({
                title: (res.bool)? 'Show!' : 'Ops!',
                text: res.message,
                icon: res.type,
                confirmButtonColor: '#1E87F0',
            })
        }
    })
    $('[liloo-loader]').hide()
    return false
})

/**
 * Autocomplete da busca através do input
 */
$('[input-search]').on("keypress", function () {
    Form = $(this).closest('form')
    Form.find('[uk-spinner]').show()
}).autocomplete({
    delay: 500,
    minLength: 3,
    source: function (req, res) {
        lilooV3.Event({
            action: 'search/' + Form.find('[block-search]').val(),
            path: path,
            data: req.term,
            success: function (data) {
                res(data.output)                
                Form.find('[uk-spinner]').hide()
            }
        })
        $('[liloo-loader]').hide()
        Form.find('[uk-spinner]').hide()
    },   
    select: function () {
        block = Form.find('[block-search]').val()
        $(`#listing-${block}`).show().focus()
        $(`#listing-${block} textarea`).focus()
    }
})

/**
 * Carrega a listagem de Cidades
 */
function listingLocates() {
    lilooV3.Event({
        action: 'cities/refresh',
        path: path,
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
listingLocates()

/**
 * Abrindo Janela modal para apresentar as informações
 */
 function modalChannelData(modal, id) {
    $('[liloo-loader]').show()
    lilooV3.Event({
        action: 'users/modal',
        path: path,
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