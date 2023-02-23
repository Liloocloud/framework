/**
 * Abstração da biblioteca Tippy
 * @copyright Felipe Oliveira - 28.09.2022
 * @version 1.0.0
 * @see https://atomiks.github.io/tippyjs/v6/
 */

import './assets/popper.min.js'
import './assets/tippy-bundle.umd.js'

$('head').append(`
    <!-- Tippy -->
    <link rel="stylesheet" href="${lilooV3.Root()}libs/dist/tippy.css">
    <link rel="stylesheet" href="${lilooV3.Root()}libs/animations/shift-toward.css">
    <link rel="stylesheet" href="${lilooV3.Root()}libs/themes/translucent.css">
`)

const lilooTooltip = {

    Tippy: function(Obj){
        tippy(Obj.el, {
            content: Obj.content,
            arrow: true,
            animation: 'shift-toward',
            theme: 'translucent',
            trigger: 'click',
            delay: [0,200]
        })
    },

    Attr: function(){
        let attr
    }

}

export { lilooTooltip }