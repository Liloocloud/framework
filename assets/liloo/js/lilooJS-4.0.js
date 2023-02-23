/**
 * lilooJS + JQuery
 * @copyright Felipe Oliveira 16.05.2022
 */


const lilooJQ = {

    Root: () => {
        return document.querySelector('body').getAttribute('root')
    },

    Event: function (Obj) {
        
        let Path = lilooJQ.Root() + Obj.path + '.php'
        let Type = !Obj.type ? 'POST' : Obj.type
        let dataBuild = {
            alldata: {
                0: { name: "action", value: Obj.action },
                1: { name: "path", value: Path },
                2: { name: "data", value: Obj.data }
            }
        }

        $('[liloo-loader]').show()

        $.ajax({
            type: Type,
            url: Path,
            cache: false,
            data: dataBuild,
            dataType: 'json',
            beforeSend: function () {
                $('[liloo-loader]').show()
            },
            success: function (data) {
                console.log(data)
                if (data.notify) {
                    $('.callback').html(data.notify);
                }
                if (data.alert) {
                    console.log(data.console)
                }
                if (Obj.success) {
                    Obj.success(data)
                }

            }
        })
            .done(function (data) {
                if (data.redirect) { window.location.href = data.redirect; }
                $('[liloo-loader]').hide()
                let BtnSubmit = $('button[value-init-submit]').attr('value-init-submit')
                $('button[type=submit]').text(BtnSubmit)
            })

            .fail(function (data) {
                $('[liloo-loader]').hide()
                console.log('Falha ao receber Retorno do CRUD')
            });
    }
}