/** 
 * Novo Framework para criação de components
 * @version 1.0.0
 * @copyright Felipe Oliveira Lourenço - 03.11.2020
 */

// import card from './components/card/card.js'

var Lilo = {

    /**
     * Retorna todos os elementos filho da tag <app>
     * Criar o elemento <loading> escondendo display none
     */
    App: function() {
        let app = document.body.querySelector('app')
        app.prepend(document.createElement('div'))
        let loader = app.children[0]
        let spinner = (`
            <div loader>
                <div class="loader-spinner" style="display: none">
                    <span class="uk-margin-small-right" uk-spinner="ratio: 3"></span>
                </div>
            </div>
        `)
        loader.innerHTML = spinner
        let Els = Object.assign([], app.children)
        delete Els[0]
        return Els
    },

    /**
     * Envia os dados para a backend retornando JSON, ARRAY ou HTML
     * dependendo do propósito do projeto 
     * @param {Rota de envia} URL 
     * @param {Parametros a serem passado} dataBuild 
     */
    Sender: function(URL, dataBuild) {
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
            beforeSend: function() {
                $('[loader]').show()
                    // console.log('Estamos em beforeSend')
                    // message = 'Estamos em beforeSend'
            },
            success: function(data) {
                console.log('Operação em andamento...')
            }
        }).done(function(data) {
            //if (data.redirect) { window.location.href = data.redirect; }
            $('[loader]').hide()
            console.log('Requisição Finalizada')

        }).fail(function(data) {
            $('[loader]').hide()
            console.log('Falha na Requisição :(')
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
    RequestServer: function(_action, _path, _array = '', _root = false) {
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
    Render: function() {
        let i = 0
        let Els = ''
        Lilo.App().forEach(function(el, ind, arr) {
            let Component = arr[ind].localName
            Els = Els + Component + ','
            i++
        })
        Els = Els.substr(0, (Els.length - 1))
        Lilo.RequestServer(
            'components',
            'https://busqueja.com.br/_Kernel/Frameworks/uikit/uikit',
            Els,
            false
        ).then(function(data) {
            console.log(data)
        })
    },
}
$('[loader]').show()
window.onload = function() {
    $('[loader]').hide()
}

Lilo.Render()