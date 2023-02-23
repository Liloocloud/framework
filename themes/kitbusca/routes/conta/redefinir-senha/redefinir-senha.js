// Redefinindo a senha
$('#password-redefine').on('submit', function(e){
    e.preventDefault()
    $('.input_delete_sender').remove()
    $('#callback-message').hide()
    $('[liloo-loader]').show()
    let form = new FormData(this)
    form.delete('action')
    form.delete('path')

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

    console.log('Estamos aqui')
    return false
})