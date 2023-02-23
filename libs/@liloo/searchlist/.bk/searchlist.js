/**
 * Gerador de listas com buscador e paginação de dados utilizando o Uikit como framework padrão
 * @copyright Felipe Oliveira - 09.09.2022
 * @version 1.0.0
 */

import { lilooProps } from "./class"

/**
 * Renderiza o formulário simples de pesquisa. Utilzado
 * apenas neste documento
 */
function searchTerms(Terms) {
    $(Terms.element).html(`
    <div class="liloo-searchlist-content">
        <form> 
            <div class="callback-message"></div>
            <div class="ui active callback-dimmer">
                <div class="ui text loader">Carregando</div>
            </div>
            <div class="uk-width-1-1 uk-inline">
                <input class="uk-input" name="terms" type="text" placeholder="Busque por Nome ou ID" required autofocus>
                <button class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></button>
                <button type="reset" class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: close" style="margin-right: 40px;"></button>                
            </div>
        </form>
        <ul class="uk-list uk-list-divider"></ul>
    </div>
    `)
}

const lilooSearch = {

    /**
     * Components de listagem de resultados com paginação e busca
     * @param element [Seletor, por padrão usa a tag liloo-searchlist]
     * @param path [Caminho do arquivo ajax para enviar a requisição]
     * @param init [Parametros ao carregar o componente. Comportamento inicial]
     * @param searchSubmit [Comportamento da busca. Parametros referentes a busca]
     */
    Terms: function (Obj) {
        let objElement = (typeof Obj.element == 'undefined') ? 'liloo-searchlist' : Obj.element
        let objPath = (typeof Obj.path == 'undefined') ? '' : Obj.path
        searchTerms({ element: objElement })
        $(objElement + ' button[type="reset"]').on('click', function () {
            $(objElement + ' form input[name="terms"]').focus()
        })

        // Requisição Inicial
        lilooV3.Event({
            path: objPath,
            action: (typeof Obj.init.action == 'undefined') ? '' : Obj.init.action,
            data: JSON.stringify({
                term: (typeof Obj.init.term == 'undefined') ? '' : Obj.init.term,
                fields: Object.assign({}, (typeof Obj.init.fields == 'undefined') ? [] : Obj.init.fields)
            }),
            success: function (res) {

                res = res.output
                if (res != null) {
                    $(objElement + ' ul').html('')

                    let column = typeof Obj.init.column == 'undefined' ? '' : Obj.init.column
                    let tpl
                    // ******************************************************
                    if (typeof Obj.init.props != 'undefined') {
                        let startProps = Obj.init.props.sort()
                        res.map(function (objMap) {
                            let item = Object.entries(objMap)
                            tpl = `<li><div class="uk-child-width-1-${column}@m uk-grid-collapse" uk-grid>`
                            item.forEach((props) => {
                                startProps.forEach(element => {
                                    if (props[0] == element.field) {
                                        console.log(element.label + ': ' + props[1])
                                        tpl += `<p>${element.label} ${props[1]}</p>`
                                    }
                                })
                            })
                            tpl += `</div></li>`
                            $(objElement + ' ul').prepend(tpl)
                        })
                    }
                    // ******************************************************

                } else {
                    $(objElement + ' ul').html('<li><p>Nenhum resultado</p></li>')
                }
                // Callback function
                Obj.init.success(res)
            }
        })

        // Requisição da Busca
        $(objElement + ' .liloo-searchlist-content form').on('submit', function (e) {
            e.preventDefault()
            let dimmer = $(objElement + ' form .callback-dimmer')
            let termInput = document.querySelector(objElement + ' form input[name="terms"]').value
            $(objElement + ' form .callback-message').hide()
            dimmer.addClass('dimmer')
            lilooV3.Event({
                path: objPath,
                action: (typeof Obj.searchSubmit.action == 'undefined') ? '' : Obj.searchSubmit.action,
                data: JSON.stringify({
                    term: termInput,
                    fields: Object.assign({}, (typeof Obj.searchSubmit.fields == 'undefined') ? [] : Obj.searchSubmit.fields)
                }),
                success: function (res) {
                    setTimeout(function () {
                        $('[liloo-loader]').hide()
                        dimmer.removeClass('dimmer')
                        Obj.searchSubmit.success(res)
                    }, 300)
                }
            })
            $('[liloo-loader]').hide()
            return false
        })
    },

    Filter: function () {

    }
}
export { lilooSearch }