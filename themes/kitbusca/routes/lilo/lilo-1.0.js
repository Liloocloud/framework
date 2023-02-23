/** 
 * Novo Framework para criação de components
 * @version 1.0.0
 * @copyright Felipe Oliveira Lourenço - 03.11.2020
 */

import card from './components/card/card.js'

var Lilo = {

    /**
     * Faz a leitura de todos os elementos  filho da tag <app> deixado disponivel
     * para uso de outros objetos
     */
    App: function () {
        let child = document.querySelectorAll('app > *');
        return child
    },

    /**
     * Envia os dados para a backend retornando JSON, ARRAY ou HTML
     * dependendo do propósito do projeto 
     * @param {Rota de envia} URL 
     * @param {Parametros a serem passado} dataBuild 
     */
    Sender: function (URL, dataBuild) {
        let message = ''
        let backend = ''
        let response = $.ajax({
            type: 'POST',
            url: URL,
            cache: false,
            data: dataBuild,
            // processData: true,
            // contentType: false,
            // async: true,
            dataType: 'json',
            beforeSend: function () {
                // $('[flex-loader]').show()
                // console.log('Estamos em beforeSend')
                // message = 'Estamos em beforeSend'
            },
            // success: function (data) {
            //     console.log('Requisição realizado com sucesso')
            // }
        }).done(function (data) {
            //if (data.redirect) { window.location.href = data.redirect; }
            // $('[flex-loader]').hide()
            console.log('Requisição Finalizada')

        }).fail(function (data) {
            // $('[flex-loader]').hide()
            console.log('Falha na Requisição')
        })
        return response
    },

    /**
     * Monta a requisição para utilizar a função "Sender"
     * @param {Case do CRUD} _action 
     * @param {Caminho Remoto} _path 
     * @param {Dados passados pelo request} _array 
     * @param {Se vai utilizar a path completa} _root 
     */
    RequestServer: function (_action, _path, _array = '', _root = false) {
        let alldata = {
            '1': { 'name': 'action', 'value': _action },
            '2': { 'name': 'array', 'value': _array },
        }
        let dataBuild = {
            action: _action,
            alldata: alldata
        }
        if (_root === true) {
            var URL = _path + '.php'
        } else {
            var URL = _path + '.php'
        }
        return Lilo.Sender(URL, dataBuild)
    },

    /**
     * Faz a leitura do element HTML (DOM) identificando o atributo request e em 
     * seguida povoa o elemento utilizando o response
     */
    Render: function () {
        let Els = this.App()
        // let Count = Els.lengths
        Els.forEach(function (el, ind, arr) {
            let Request = JSON.parse(el.getAttribute('request'))
            let Component = arr[ind].localName
            // console.log(Request.case)
            // console.log(Component)

            Lilo.RequestServer(
                Request.case,
                Request.route,
                Request.data,
                Request.routeFull
            ).then(function (data) {

                console.log(data)

                // RETORNO PADRÃO CALLBACK
                if (data.callback) {
                    switch (data.type) {
                        case 'append': $(Component).append(data.callback); break;
                        case 'prepend': $(Component).prepend(data.callback); break;
                        default: $(Component).html(data.callback); break;
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
                // RETORNO NO CONSOLE.LOG
                if (data.console) {
                    console.log(data)
                }
            })
        })
    },
}
Lilo.Render()