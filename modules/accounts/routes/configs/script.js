function getDataOptions(meta) {
    $('[liloo-loader]').show()
    lilooV3.Event({
        action: 'accounts/configs/options',
        path: 'modules/accounts/routes/configs/ajax',
        data: meta,
        success: function (res) {
            res = res[0]
            // $('#' + res.opt_meta + ' .opt_title').html(res.opt_title)
            // $('#' + res.opt_meta + ' .opt_description').html(res.opt_description)
            $('#' + res.opt_meta + ' .opt_values').val(res.opt_values)
            $('#' + res.opt_meta + ' .opt_meta').val(res.opt_meta)
            $('[liloo-loader]').hide()
        }
    })
}
getDataOptions('time_validation_account')
getDataOptions('time_validation_password_redefine')
getDataOptions('time_validation_pin')
getDataOptions('level_user_account')
$('[liloo-data-form]').on('submit', function(e){
    e.preventDefault()
    lilooV3.Form({
        form: this,
        success: function (res) {
            console.log(res)
            if(res === true){
                lilooUi.Notify({
                    type: 'success',
                    message: 'Valor atualizado com sucesso!'
                })
            }
            $('[liloo-loader]').hide()
        }
    })
    return false
})



