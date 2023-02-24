// Contato
$('#form-contacts form').on('submit', function (e) {
    var callback = '#form-contacts .callback-message';
    var dimmer = $('#form-contacts .callback-dimmer')
    $(callback).hide('fast')
    dimmer.addClass('dimmer')
    e.preventDefault()
    let form = new FormData(this)
    form.delete('action')
    form.delete('path')

    if (!lilooCheck.Phone(form.get('page_whatsapp'))) {
        lilooUi.Alert({
            element: callback,
            type: 'error',
            message: 'Whatsapp Inválido'
        })
        $('input[name="page_whatsapp"]').focus()
        dimmer.removeClass('dimmer')
        return
    }

    if (!lilooCheck.Phone(form.get('page_phone_1'))) {
        lilooUi.Alert({
            element: callback,
            type: 'error',
            message: 'Telefone 1 Inválido'
        })
        $('input[name="page_phone_1"]').focus()
        dimmer.removeClass('dimmer')
        return
    }

    if (!lilooCheck.Email(form.get('page_email'))) {
        lilooUi.Alert({
            element: callback,
            type: 'error',
            message: 'E-mail inválido'
        })
        $('input[name="page_email"]').focus()
        dimmer.removeClass('dimmer')
        return
    }

    lilooV3.Form({
        form: this,
        success: function (res) {
            if (res.bool = false) {
                lilooUi.Alert({
                    element: res.element,
                    type: res.type,
                    message: res.message
                })
                dimmer.removeClass('dimmer')
                return
            }
            lilooUi.Notify({
                element: res.element,
                type: res.type,
                message: res.message
            })
            dimmer.removeClass('dimmer')
        }
    })
    $('[liloo-loader]').hide()
    return false
})

// Redes Sociais
$('#form-socialmedia form').on('submit', function (e) {
    e.preventDefault()
    var callback = '#form-socialmedia .callback-message';
    var dimmer = $('#form-socialmedia .callback-dimmer')
    $(callback).hide('fast')
    dimmer.addClass('dimmer')
    e.preventDefault()
    let form = new FormData(this)
    form.delete('action')
    form.delete('path')

    lilooV3.Form({
        form: this,
        success: function (res) {
            console.log(res)
            if (res.bool = false) {
                lilooUi.Alert({
                    element: res.element,
                    type: res.type,
                    message: res.message
                })
                dimmer.removeClass('dimmer')
                return
            }
            lilooUi.Notify({
                element: res.element,
                type: res.type,
                message: res.message
            })
            dimmer.removeClass('dimmer')
        }
    })
    dimmer.removeClass('dimmer')
    $('[liloo-loader]').hide()   
    return false

})

// Localização
$('#form-location form').on('submit', function (e) {
    e.preventDefault()
    var callback = '#form-location .callback-message';
    var dimmer = $('#form-location .callback-dimmer')
    $(callback).hide('fast')
    dimmer.addClass('dimmer')
    e.preventDefault()
    let form = new FormData(this)
    form.delete('action')
    form.delete('path')

    lilooV3.Form({
        form: this,
        success: function (res) {
            console.log(res)
            if (res.bool = false) {
                lilooUi.Alert({
                    element: res.element,
                    type: res.type,
                    message: res.message
                })
                dimmer.removeClass('dimmer')
                return
            }
            lilooUi.Notify({
                element: res.element,
                type: res.type,
                message: res.message
            })
            dimmer.removeClass('dimmer')
        }
    })
    dimmer.removeClass('dimmer')
    $('[liloo-loader]').hide()
    return false
})

// Busca CEP
$('input[name="page_address_zipcode"]').on('keyup', function () {
    var cep = $(this).val()
    if (cep.length === 9) {
        var callback = '#form-location .callback-message';
        $(callback).hide('fast')
        var dimmer = $('#form-location .callback-dimmer')
        dimmer.addClass('dimmer')
        $.get("https://viacep.com.br/ws/" + cep + "/json", function (data) {
            console.log(data)
            if (!data.erro) {
                $('input[name="page_address_district"]').val(data.bairro)
                $('input[name="page_address_city"]').val(data.localidade)
                $('input[name="page_address"]').val(data.logradouro)
                $('input[name="page_address_uf"]').val(data.uf)
                $('input[name="page_address_number"]').focus()
                dimmer.removeClass('dimmer')
                return false
            } else {
                lilooUi.Alert({
                    element: '#form-location .callback-message',
                    type: 'info',
                    message: 'CEP não encontrado'
                })
                dimmer.removeClass('dimmer')
                return false
            }
        }, 'json')
    }
})




// Semantic
$('.ui.checkbox').checkbox()