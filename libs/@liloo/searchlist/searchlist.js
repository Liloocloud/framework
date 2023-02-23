/**
 * Gerador de listas com buscador e paginação de dados utilizando o Uikit como framework padrão
 * @copyright Felipe Oliveira - 09.09.2022
 * @version 1.0.0
 */

import { lilooModalFull } from "../modalfull/modalfull.js"

const lilooSearch = {

    /**
     * Components de listagem de resultados com paginação e busca
     * @param element [Seletor, por padrão usa a tag liloo-searchlist]
     * @param path [Caminho do arquivo ajax para enviar a requisição]
     * @param init [Parametros ao carregar o componente. Comportamento inicial]
     * @param reaload [Permitir que o botão reload recarregue a lista inicial. Padrão false]
     * @param searchSubmit [Comportamento da busca. Parametros referentes a busca]
     */
    Terms: function (Obj) {
        let objElement = (typeof Obj.element == 'undefined') ? 'liloo-searchlist' : Obj.element
        let objPath = (typeof Obj.path == 'undefined') ? '' : Obj.path
        let objReload = (typeof Obj.reload == 'undefined') ? false : Obj.reload
        let objDivider = (typeof Obj.divider == 'undefined') ? 'uk-list-divider' : ''
        let objPlacehoder = (typeof Obj.placeholder == 'undefined') ? 'Faça sua busca' : Obj.placeholder

        // Element
        $(objElement).html(`
        <div class="liloo-searchlist-content">
            <form> 
                <div class="callback-message"></div>
                <div class="ui active callback-dimmer dimmer">
                    <div class="ui text loader">Carregando</div>
                </div>
                <div class="uk-width-1-1 uk-inline">
                    <input class="uk-input" name="terms" type="text" placeholder="${objPlacehoder}" required autofocus>
                    <button class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></button>
                    <button type="reset" class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: close" style="margin-right: 40px;"></button>                
                </div>
            </form>
            <ul class="uk-list ${objDivider}"></ul>
        </div>
        <div class="liloo-item-modal-full"></div>
        `)

        $(objElement + ' button[type="reset"]').on('click', function () {
            $(objElement + ' form input[name="terms"]').focus()
        })

        // Requisição Inicial
        function Init() {
            let dimmer = $(objElement + ' form .callback-dimmer')
            lilooV3.Event({
                path: objPath,
                action: (typeof Obj.init.action == 'undefined') ? '' : Obj.init.action,
                data: JSON.stringify({
                    term: (typeof Obj.init.term == 'undefined') ? '' : Obj.init.term,
                    fields: Object.assign({}, (typeof Obj.init.fields == 'undefined') ? [] : Obj.init.fields)
                }),
                success: function (res) {
                    setTimeout(function () {
                        $('[liloo-loader]').hide()
                        dimmer.removeClass('dimmer')
                        Obj.init.success(res)

                        // Onclick item modalfull caso tenha sido setada
                        if(typeof Obj.onclickItemModal != 'undefined'){
                            $(objElement + ' ul li').on('click', function(){
                                let id = $(this).attr('id')
                                dimmer.addClass('dimmer')
                                lilooModalFull.ListItem({
                                    element: objElement,
                                    path: objPath,
                                    action: (typeof Obj.onclickItemModal.action == 'undefined') ? '' : Obj.onclickItemModal.action,
                                    data: {
                                        fields: Object.assign({}, (typeof Obj.onclickItemModal.fields == 'undefined') ? [] : Obj.onclickItemModal.fields),
                                        id: id
                                    },
                                    success: function(res){
                                        setTimeout(function () {
                                            $('[liloo-loader]').hide()
                                            dimmer.removeClass('dimmer')
                                            Obj.onclickItemModal.success(res)                                                                
                                        }, 100)
                                    }
                                })
                            })
                        }

                    }, 300)
                }
            })
        }
        Init()

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
                        
                        // Executa o callback success
                        Obj.searchSubmit.success(res)

                        // Onclick item modalfull caso tenha sido setada
                        if(typeof Obj.onclickItemModal != 'undefined'){
                            $(objElement + ' ul li').on('click', function(){
                                let id = $(this).attr('id')
                                dimmer.addClass('dimmer')
                                lilooModalFull.ListItem({
                                    element: objElement,
                                    path: objPath,
                                    action: (typeof Obj.onclickItemModal.action == 'undefined') ? '' : Obj.onclickItemModal.action,
                                    data: {
                                        fields: Object.assign({}, (typeof Obj.onclickItemModal.fields == 'undefined') ? [] : Obj.onclickItemModal.fields),
                                        id: id
                                    },
                                    success: function(res){
                                        setTimeout(function () {
                                            $('[liloo-loader]').hide()
                                            dimmer.removeClass('dimmer')
                                            Obj.onclickItemModal.success(res)                                                                
                                        }, 100)
                                    }
                                })
                            })
                        }

                                                    
                    }, 300)
                }
            })
            $('[liloo-loader]').hide()
            return false
        })

        // Clica no botão de reset
        if(objReload){
            $(objElement + ' .liloo-searchlist-content form').on('reset', function (e) {
                $(objElement + ' form .callback-dimmer').addClass('dimmer')
                Init()
            })
        }
       
    },

    /**
     * Cria um filtro mais complexo utilizando a lib @liloo/forms
     */
    Filter: function () {

    }
}

$('head').append(`<link rel="stylesheet" type="text/css" href="${lilooV3.Root()}libs/@liloo/searchlist/assets/style.css">`)
export { lilooSearch }