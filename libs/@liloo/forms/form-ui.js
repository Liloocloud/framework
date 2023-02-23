/**
 * Class para trabalhar com formulários. Possui diversos recursos para maipulação Ui e envio Ajax
 * Ideial para usar junto com o framework Uikit
 * @info Necessário o uso do JQuery
 * @copyright Felipe Oliveira Lourenço
 * @version 1.0.0
 */

import { lilooMask } from "../../@maskinput/maskinput.js"
import { lilooTooltip } from "../../@tippy/tippy.js"
// import { lilooDatePicker } from "../../libs/@datepicker/datapicker"


export default class lilooForms {

    // Seta os valores iniciais e invoca todos os metodos necessário para a composição do formulário
    constructor(Obj) {
        this.element = (typeof Obj.element == 'undefined') ? 'liloo-form' : Obj.element
        this.action = (typeof Obj.action == 'undefined') ? '' : Obj.action
        this.path = (typeof Obj.path == 'undefined') ? '' : Obj.path
        this.build = Obj.build

        this.labelSubmit = (typeof Obj.labelSubmit == 'undefined') ? 'Enviar' : Obj.labelSubmit
        this.buttonSubmit = (typeof Obj.buttonSubmit == 'undefined') ? true : false

        // Setando outro botão submit
        if (!this.buttonSubmit) {
            $(Obj.buttonSubmit).on('click', function () {
                $(this.element + ' form').submit()
            })
        }

        // Opção de criar o botão submit
        let viewSubmit = (this.buttonSubmit) ? `
        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-primary uk-button-small">${this.labelSubmit}</button>
        </div>
        ` : ''

        $('head').append(`<link rel="stylesheet" type="text/css" href="${lilooV3.Root()}libs/@liloo/forms/assets/lite.css">`)
        $(this.element).html(`
            <form>
                <div class="callback-message"></div>
                <div class="ui active callback-dimmer">
                    <div class="ui text loader">Carregando</div>
                </div>
                <input type="hidden" name="action" value="${this.action}">
                <input type="hidden" name="path" value="${this.path}">
                <div class="liloo-form-fields">
                </div>
                ${viewSubmit}
            </form>
        `)

        this.Build()

        // Envio do formulário utilizando a lilooV3.Form() para o envio AJAX
        $(this.element + ' form').on('submit', function (e) {
            e.preventDefault()
            let dimmer = $(this.element + ' form .callback-dimmer')
            let form = new FormData(this)
            $(this.element + ' form .callback-message').hide()
            dimmer.addClass('dimmer')
            form.delete('action')
            form.delete('path')
            try {
                Obj.build.forEach((val) => {
                    if (typeof val.attr != 'undefined') {
                        if (val.attr.includes('required')) {
                            $('form input[name="' + val.name + '"]').removeClass('uk-form-danger')
                            if ($('form input[name="' + val.name + '"]').val() == '') {
                                $('form input[name="' + val.name + '"]').addClass('uk-form-danger')
                                $('form input[name="' + val.name + '"]').focus()
                                throw new Error(`O campo "${val.label}" é obrigatório`)
                            }
                        }
                    }
                })
            }
            catch (e) {
                console.log(e.error)
                lilooUi.Notify({
                    type: 'error',
                    message: e.message
                })
                dimmer.removeClass('dimmer')
                $('[liloo-loader]').hide()
                return false
            }
            lilooV3.Form({
                form: this,
                success: function (res) {
                    $(res.element).removeClass('uk-form-danger')
                    if (res.bool == false) {
                        $(res.element).addClass('uk-form-danger')
                        lilooUi.Notify({
                            type: res.type,
                            message: res.message
                        })
                        dimmer.removeClass('dimmer')
                        return
                    } else {
                        Swal.fire({
                            title: 'show!',
                            text: res.message,
                            icon: 'success',
                            confirmButtonColor: '#1E87F0',
                        })
                        if (typeof Obj.success != 'undefined') {
                            Obj.success(res)
                        }
                        dimmer.removeClass('dimmer')
                        $('[liloo-loader]').hide()
                        return
                    }
                }
            })
            dimmer.removeClass('dimmer')
            $('[liloo-loader]').hide()
            return false
        })


    }

    // Compila os campos do tipo input
    Input(element, props, rand) {

        let elToolIcom = (typeof props.toolicon == 'undefined') ? 'question' : props.toolicon
        let elTootltipo = (typeof props.tooltip == 'undefined') ? '' : `<i uk-icon="${elToolIcom}" id="tool-${rand}"></i>`
        let elLabel = !props.label ? '' : `<label class="uk-form-label">${props.label} ${elTootltipo}</label>`
        let elId = !props.id ? '' : `id="${props.id}"`
        let elParentClass = !props.parentClass ? 'uk-width-1-1' : props.parentClass
        let elName = !props.name ? '' : `name="${props.name}"`
        let elPlaceholder = !props.placeholder ? '' : `placeholder="${props.placeholder}"`
        let elAttr = !props.attr ? '' : props.attr
        let elFocus = !props.focus ? '' : 'autofocus'
        let elValue = !props.value ? '' : `value="${props.value}"`
        let elType = (typeof props.type == 'undefined') ? 'text' : props.type

        // Tipos de input
        switch (elType) {

            // Toggle Semantic UI
            case 'toggle':
                let toClass = !props.class ? 'class="uk-checkbox"' : `class="uk-checkbox ${props.class}"`
                let toColumn = (typeof props.column == 'undefined') ? 1 : props.column
                let toItems = !props.items ? {} : props.items
                let labelItemsToggle = ''
                toItems.forEach((val) => {
                    let itemVal = !val.value ? '' : `value="${val.value}"`
                    labelItemsToggle += `
                    <div class="ui toggle checkbox">
                        <input ${elId} ${elName} ${toClass} type="checkbox" ${itemVal} ${val.attr}>
                        <label>${val.text}</label>
                    </div>
                    `
                })
                return `
                    <div class="${elParentClass}">
                        <div>${elLabel}</div>
                        <div class="uk-child-width-1-${toColumn}@m uk-grid-small uk-margin-small-top" uk-grid>
                            ${labelItemsToggle}                               
                        </div>
                    </div>                   
                `
                break;

            // Raio button
            case 'radio':
                let radioClass = !props.class ? 'class="uk-radio"' : `class="uk-radio ${props.class}"`
                let radioColumn = (typeof props.column == 'undefined') ? 1 : props.column
                let radioItems = !props.items ? {} : props.items
                let labelItemsRadio = ''
                radioItems.forEach((val) => {
                    labelItemsRadio += `<label><input ${elId} ${elName} ${radioClass} type="radio" ${elValue} ${val.attr}> ${val.text}</label>`
                })
                return `                   
                    <div class="${elParentClass}">
                        <div>${elLabel}</div>
                        <div class="uk-child-width-1-${radioColumn}@m uk-grid-small uk-margin-small-top" uk-grid>
                            ${labelItemsRadio}                               
                        </div>
                    </div>
                `
                break;

            // Checkbox
            case 'checkbox':
                let checkClass = !props.class ? 'class="uk-checkbox"' : `class="uk-checkbox ${props.class}"`
                let checkColumn = (typeof props.column == 'undefined') ? 1 : props.column
                let checkItems = !props.items ? {} : props.items
                let labelItems = ''
                checkItems.forEach((val) => {
                    labelItems += `<label><input ${elId} ${elName} ${checkClass} type="checkbox" ${elValue} ${val.attr}> ${val.text}</label>`
                })
                return `                   
                    <div class="${elParentClass}">
                        <div>${elLabel}</div>
                        <div class="uk-child-width-1-${checkColumn}@m uk-grid-small" uk-grid>
                            ${labelItems}                               
                        </div>
                    </div>
                `
                break;

            // mali, hidden, text, number
            case 'mail':
            case 'hidden':
            case 'text':
            case 'number':
                let elClass = !props.class ? 'class="uk-input"' : `class="uk-input ${props.class}"`
                return `
                    <div class="${elParentClass}">
                        <div>
                            ${elLabel}
                            <input type="${elType}" ${elId} ${elClass} ${elName} ${elPlaceholder} ${elFocus} ${elAttr} ${elValue}>
                        </div>
                    </div>
                `
                break;
        }
        Fields.Tooltip({ el: rand, content: props.tooltip })
    }

    // Compila os campos do tipo textarea
    Textarea(element, props, rand) {
        let elToolIcom = (typeof props.toolicon == 'undefined') ? 'question' : props.toolicon
        let elTootltipo = (typeof props.tooltip == 'undefined') ? '' : `<i uk-icon="${elToolIcom}" id="tool-${rand}"></i>`
        let elLabel = !props.label ? '' : `<label class="uk-form-label">${props.label} ${elTootltipo}</label>`
        let elId = !props.id ? '' : `id="${props.id}"`
        let elClass = !props.class ? 'class="uk-textarea"' : `class="uk-textarea ${props.class}"`
        let elParentClass = !props.parentClass ? 'uk-width-1-1' : props.parentClass
        let elName = !props.name ? '' : `name="${props.name}"`
        let elPlaceholder = !props.placeholder ? '' : `placeholder="${props.placeholder}"`
        let elAttr = !props.attr ? '' : props.attr
        let elFocus = !props.focus ? '' : 'autofocus'
        let elValue = !props.value ? '' : `${props.value}`
        return `
        <div class="${elParentClass}">
            <div>
                ${elLabel}
                <textarea ${elId} ${elClass} ${elName} ${elPlaceholder} ${elFocus} ${elAttr}>${elValue}</textarea>
            </div>
        </div>
        `
    }

    // Compila os campos do tipo select
    Select(element, props, rand) {
        let elToolIcom = (typeof props.toolicon == 'undefined') ? 'question' : props.toolicon
        let elTootltipo = (typeof props.tooltip == 'undefined') ? '' : `<i uk-icon="${elToolIcom}" id="tool-${rand}"></i>`
        let elLabel = !props.label ? '' : `<label class="uk-form-label">${props.label} ${elTootltipo}</label>`
        let elId = !props.id ? '' : `id="${props.id}"`
        let elClass = !props.class ? 'class="uk-select"' : `class="uk-select ${props.class}"`
        let elParentClass = !props.parentClass ? 'uk-width-1-1' : props.parentClass
        let elName = !props.name ? '' : `name="${props.name}"`
        let elPlaceholder = !props.placeholder ? '' : `placeholder="${props.placeholder}"`
        let elAttr = !props.attr ? '' : props.attr
        let elFocus = !props.focus ? '' : 'autofocus'
        let elOptions = !props.options ? false : props.options

        let opts
        if (elOptions) {
            elOptions.forEach(val => {
                opts += `<option valeu="${val.value}">${val.text}</option>`
            })
        }

        return `
        <div class="${elParentClass}">
            <div>
                ${elLabel}
                <select ${elId} ${elClass} ${elName} ${elPlaceholder} ${elFocus} ${elAttr}>
                    ${opts}
                </select>
            </div>
        </div>
        `
    }

    // Percorre o elementos para montar os campos
    Build() {
        let Tpl = ''
        let Rand = Math.floor(Math.random() * 101)
        let incr = 1
        this.build.forEach((val) => {
            if (val.el == 'before') { Tpl += val.html + '<div class="uk-grid-small" uk-grid>' }
            if (val.el == 'after') { Tpl += '</div>' + val.html }
            if (val.el == 'extra') { Tpl += val.html }
            if (val.el == 'input') { Tpl += this.Input(this.element + ' .liloo-form-fields', val, (Rand + incr)) }
            if (val.el == 'textarea') { Tpl += this.Textarea(this.element + ' .liloo-form-fields', val, (Rand + incr)) }
            if (val.el == 'select') { Tpl += this.Select(this.element + ' .liloo-form-fields', val, (Rand + incr)) }
            incr++
        })

        console.log(Tpl)

        $(this.element + ' .liloo-form-fields').html(Tpl)
        $('.toggle').checkbox()
        lilooMask()
        incr = 1
        this.build.forEach((val) => {
            lilooTooltip.Tippy({
                el: "#tool-" + (Rand + incr),
                content: val.tooltip
            })
            incr++
        })
        return
    }

    // Envio de alertas
    Alert(res) {
        Swal.fire({
            title: res.title,
            text: res.message,
            icon: res.icon,
            confirmButtonColor: '#1E87F0',
        })
    }




}