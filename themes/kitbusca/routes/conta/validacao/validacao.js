// Envia o 2 Passo do Cadastro
$('#account-step-2').on('submit', function (e) {
    e.preventDefault()
    $('#msg-step-2').hide()
    $('[liloo-loader]').show()
    let form = new FormData(this)
    form.delete('action')
    form.delete('path')

    if (form.get('account_activation_key').length != 6) {
        lilooUi.Alert({
            element: '#msg-step-2',
            type: 'error',
            message: 'O código deve conter 6 digitos'
        })
        $('[liloo-loader]').hide()
        return
    }

    lilooV3.Form({
        form: this,
        success: function (res) {
            console.log(res)
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

// Reenviando o código
$('.resend-code').on('click', function(){
    let email = $('.step-email').val()
    let name = $('input[name="account_name"]').val()
    lilooV3.Event({
        action: 'account/resend/activation/key',
        path: 'themes/busqueja/routes/conta/ajax',
        data: JSON.stringify({email: email, name: name}),
        success: function(res){
            console.log(res)
        }
    })
    $('[liloo-loader]').hide()
    return false
})