/**
 * Liloo UI
 * @copyright Felipe Oliveira 07.05.2021
 * @version 1.0.0
 */

import('../../maskinput/maskinput.js')
import('../../custom/form.js')
    // .then(module => {
    //     module.loadPageInto(main);
    // });


/**
 * Interface UI liloo
 */

// Seletor de elementos
const $ll = (el) => {
    return document.querySelector(el)
}

// Funções de UI
const lilooUI = {

    sibebarToogle: () => {
        // document.querySelector('#teste').addEventListener('click', () => {
        $ll('.ll-sidebar').classList.toggle('ll-sidebar-small')
        // })
    }
}

/**
 * Load Page
 */
window.addEventListener("load", () => {
    //console.log('Página completa')
    // var i = setInterval(() => {
    //     clearInterval(i)
    //document.getElementById("loading").style.display = "none"
    //document.getElementById("conteudo").style.display = "block"
    // }, 2000)
})