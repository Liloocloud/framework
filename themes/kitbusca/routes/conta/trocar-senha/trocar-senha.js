// Trocando a senha
// Redefinindo a senha
$('#password-redefine').on('submit', function(e){
    e.preventDefault()
    $('.input_delete_sender').remove()
    $('#callback-message').hide()
    $('[liloo-loader]').show()
    let form = new FormData(this)
    form.delete('action')
    form.delete('path')

    let pass1 = lilooCheck.StrongPassword(form.get('account_password'), 8, 'medium')
    if (pass1.bool == false) {
        lilooUi.Alert({
            element: '#callback-message',
            type: 'error',
            message: pass1.message
        })
        $('[liloo-loader]').hide()
        return
    }

    let pass2 = lilooCheck.StrongPassword(form.get('account_password_repeat'), 8, 'medium')
    if (pass2.bool == false) {
        lilooUi.Alert({
            element: '#callback-message',
            type: 'error',
            message: pass2.message
        })
        $('[liloo-loader]').hide()
        return
    }

    if(form.get('account_password') != form.get('account_password_repeat')){
        lilooUi.Alert({
            element: '#callback-message',
            type: 'error',
            message: 'As senhas não são iguais. Repitar a mesma senha'
        })
        $('[liloo-loader]').hide()
        return
    }

    if (!lilooCheck.Phone(form.get('account_phone'))) {
        lilooUi.Alert({
            element: '#callback-message',
            type: 'error',
            message: 'Número de telefone inválido'
        })
        $('input[name="account_phone"]').focus()
        $('[liloo-loader]').hide()
        return
    }

    lilooV3.Form({
        form: this,
        success: function (res) {
            if (res.bool == false) {
                $('[uk-alert]').hide()
                if(res.reason == 'pass_update'){
                    lilooUi.Alert({
                        element: res.element,
                        type: res.type,
                        message: res.message
                    })
                    setInterval(function(){
                        location.href = res.redirect
                    }, 2000)
                    return
                }
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