// Redefinindo a senha
$('#password-redefine').on('submit', function(e){
    e.preventDefault()
    $('.input_delete_sender').remove()
    $('#callback-message').hide()
    $('[liloo-loader]').show()
    let form = new FormData(this)
    form.delete('action')
    form.delete('path')

    lilooV3.Form({
        form: this,
        success: function (res) {
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