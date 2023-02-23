// Envia o 1 Passo do Cadastro
$('#account-step-1').on('submit', function (e) {
    e.preventDefault()
    $('.input_delete_sender').remove()
    $('#callback-message').hide()
    $('[liloo-loader]').show()
    let form = new FormData(this)
    form.delete('action')
    form.delete('path')

    if (form.get('account_name').length < 2) {
        lilooUi.Alert({
            element: '#callback-message',
            type: 'error',
            message: 'Nome com no mínimo 2 caracteres'
        })
        $('input[name="account_name"]').focus()
        $('[liloo-loader]').hide()
        return
    }

    if (!lilooCheck.Email(form.get('account_email'))) {
        lilooUi.Alert({
            element: '#callback-message',
            type: 'error',
            message: 'E-mail inválido'
        })
        $('input[name="account_email"]').focus()
        $('[liloo-loader]').hide()
        return
    }

    let check = lilooCheck.StrongPassword(form.get('account_password'))
    if (check.bool == false) {
        lilooUi.Alert({
            element: '#callback-message',
            type: 'error',
            message: check.message
        })
        $('[liloo-loader]').hide()
        return
    }

    lilooV3.Form({
        form: this,
        success: function (res) {
            console.log(res)
            $('.step-email').val(form.get('account_email'))
            if (res.bool == false) {
                $('[uk-alert]').hide()
                if(res.redirect != ''){
                    location.href = res.redirect
                    return
                }
                lilooUi.Alert({
                    element: res.element,
                    type: res.type,
                    message: res.message
                })
                $('[liloo-loader]').hide()
                return
            }
        }
    })
    $('[liloo-loader]').hide()
    return false
})