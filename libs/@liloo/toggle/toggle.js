/**
 * Toggle para atualizar informações unitárias
 * @copyright Felipe Oliveira - 07.11.2022
 * @version 1.0.0
 */


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