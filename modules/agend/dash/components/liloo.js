/*!
  * Liloo JS v1.4.2 (https://cdn.liloo.com.br/)
  * Copyright 07.10.2018 Felipe Oliveira Lourenço
  */
 
const Liloo = {

    /**
     * Caminho absoluto para enviar ajax
     */
    Root: function(){
        return $('body').attr('root')
    },

    /**
     * Dispara o AJAX a partir dos parametros informados
     * @param {[string]} URL     [Para onde irÃ¡ mandar o POST]
     * @param {[json]} dataBuild [POST montado num JSON]
     */
    Sender: function(URL, dataBuild, fun){
        $.ajax({
            type: 'POST',
            url: URL,
            cache: false,
            data: dataBuild,
            // processData: true,
            // contentType: false,
            dataType: 'json',
            beforeSend: function () {
                $('[flex-loader]').show()
            },
            success: function (data) {
                return data
                // console.log(data)
                // if(data.function && fun != false){
                //     console.log(data.function)
                //     // return 
                //     fun(data.function)
                // }

                // RETORNO PADRÃƒO CALLBACK
                if (data.callback) {
                    switch (data.type) {
                        case 'append': $('.callback').append(data.callback); break;
                        case 'prepend': $('.callback').prepend(data.callback); break;
                        default: $('.callback').html(data.callback); break;
                    }
                }
                // RETORNA POR ELEMENTO ID, CLASSE OU TAG
                if (data.element) {
                    switch (data.type) {
                        case 'append': $(data.element).append(data.content); break;
                        case 'prepend': $(data.element).prepend(data.content); break;
                        default: $(data.element).html(data.content); break;
                    }
                }
                // RETORNO EM ARRAY 
                if (data.array) {
                    $.each(data.array, function (key, value) {
                        switch (value.type) {
                            case 'append': $(value.element).append(value.content); break;
                            case 'prepend': $(value.element).prepend(value.content); break;
                            case 'input': $(value.element).val(value.content); break;
                            default: $(value.element).html(value.content); break;
                        }
                    });
                }
                // RETORNO NO SCRIPT_QUEUE
                if (data.script){
                    $('.script_queue').html(data.script);
                }

                 // RETORNO COM A NOTIFICAÇÃO PADRÃO DA PLATAFORMA
                 if (data.notify){
                    $('.callback').html(data.notify);
                }

                // RETORNO NO CONSOLE.LOG
                if (data.console){
                    console.log(data.console)
                }

                // RETORNO JSON PURO
                if (data.json){
                    // console.log( data.json )
                    return data.json
                }

            }
        }).done(function (data) {
            if (data.redirect) { window.location.href = data.redirect; }
            $('[flex-loader]').hide()
            let BtnSubmit = $('button[value-init-submit]').attr('value-init-submit')
            $('button[type=submit]').text(BtnSubmit)
        }).fail(function (data) {
            $('[flex-loader]').hide()
            console.log('Falha ao receber Retorno do CRUD')
        });
    },

    /**
     * Manda requisiÃ§Ã£o para um arquivo PHP via AJAX
     * @param [_action] {'Escolhe qual case irÃ¡ acionar'}  
     * @param [_path] {'Passa a URL "ABSOLUTA" do arquivo PHP que deseja enviar o POST'} 
     * @param [_array] {'Envie o parametro com os dados separados por vÃ­rgula, se nÃ£o tiver padrÃ£o serÃ¡ vazio'} 
     * @param [_root] {'true p/ Link com Root e false p/ link absoluto (padrÃ£o false)'} 
    */
    RequestServer: function(_action, _path, _array='', _root=false, fun=false){
        let alldata = {
            '1': { 'name': 'action', 'value': _action },
            '2': { 'name': 'array', 'value': _array },
        }
        let dataBuild = {
            action: _action,
            alldata: alldata
        }
        if( _root === true ){
            var URL = this.Root() + _path + '.php'
        }else{
            var URL = _path + '.php'
        }
        return this.Sender(URL, dataBuild, fun)
    },
}


/****************************************************************************************
 * Manda uma requisiÃ§Ã£o para um arquivo PHP genericamente
 * @deprecated - Ativa atÃ© a versÃ£o 1.4
 * @param {'Escolhe qual case irÃ¡ acionar'} _action 
 * @param {'Levar os dados em array via request para o PHP'} _array
 * @param {'Passa a URL do arquivo do projeto onde deseja enviar o POST'} _path
 */
 var _data_custom = function(_action, _path, _array=''){
    let URL = Liloo.Root() + _path + '.php'
    let alldata = {
        '1': { 'name': 'action', 'value': _action },
        '2': { 'name': 'array', 'value': _array },
    }
    let dataBuild = {
        action: _action,
        alldata: alldata
    }
    Liloo.Sender(URL, dataBuild)
}

/****************************************************************************************
 * Envia o POST em AJAX para a URL especificada no input custom-url e retorna em JSON
 */
 $('[data-custom]').on('submit', function(event){
    event.preventDefault()
    $('button[value-init-submit]').text('Aguarde…')
    let form = $(this)
    let formAction = form.find('input[name="action"]').val()
    let formCustom = form.find('input[name="custom-url"]').val()
    let alldata    = form.serializeArray()
    let formURL    = Liloo.Root() + formCustom +'.php'
    let dataBuild  = {
        action: formAction,
        alldata: alldata
    }
    Liloo.Sender(formURL, dataBuild)
})

/****************************************************************************************
 * Envia o POST em AJAX URL Externas
 */
 $('[data-api]').on('submit', function(event){
    event.preventDefault()                                                  
    let form = $(this)
    let formAction = form.find('input[name="action"]').val()
    let formCustom = form.find('input[name="custom-url"]').val()
    let alldata    = form.serializeArray()
    let formURL    = formCustom
    let dataBuild  = {
        action: formAction,
        alldata: alldata
    }
    Liloo.Sender(formURL, dataBuild)
})