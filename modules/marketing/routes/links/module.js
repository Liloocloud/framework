import { lilooForms } from "../../../../libs/@liloo/forms/forms"

lilooForms({
    selector: '#new-page',
    // labelSubmit: 'Atualizar',
    buttonSubmit: '#btn-create-product',
    action: 'test',
    path: 'modules/templates/routes/newpage/ajax',
    data: 'modulo form',
    build: [
        {
            el: 'before',
            html: `
            <div class="uk-card uk-card-default">
                <div class="uk-card-header uk-padding-small"><h4>Informações Básicas</h4></div>                 
                <div class="uk-card-body uk-padding-small">
            `
        },
        {
            el: 'input',
            name: 'tpl_title',
            placeholder: 'Título da Página',
            attr: 'required liloo-mask-phone',
            type: 'text',
            label: 'Título da Página',
            attr: 'required'
        },
        {
            el: 'textarea',
            name: 'tpl_description',
            placeholder: 'Descrição',
            attr: 'required liloo-mask-phone',
            label: 'Descrição',
            attr: 'required rows="5"'
        },
        {
            el: 'textarea',
            name: 'tpl_keywords',
            placeholder: 'Palavras-chave',
            tooltip: 'Separe as palavras com vírgulas ","',
            attr: 'required rows="5"',
            label: 'Palavras-chave',
        },
        {
            el: 'input',
            name: 'tpl_url',
            placeholder: 'URL (slug)',
            type: 'text',
            label: 'URL (slug)',
        },
        {
            el: 'after',
            html: `</div></div>`
        },


    ],
    // success: function(res){
    //     console.log(res)
    // }
})