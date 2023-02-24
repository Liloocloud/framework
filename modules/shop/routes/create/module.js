import { lilooForms } from "../../../../libs/@liloo/forms/forms";
import { lilooDrop } from '../../../../libs/@dropzone/dropzone.js'
import { lilooDatePicker } from '../../../../libs/@datepicker/datapicker.js'
import { layouts } from "../../../../libs/@chartjs/assets/chartjs.min";

const ID = $('#prod-id').val()
lilooForms({
    selector: '#create-product-infos',
    labelSubmit: 'Adicionar',
    buttonSubmit: '#btn-create-product',
    action: 'create/product',
    path: 'modules/shop/ajax/products',
    data: 'modulo product',
    build: [
        {
            el: 'input',
            type: 'hidden',
            name: 'prod_id',
            value: ID
        },

        {
            el: 'before',
            html: `<div class="uk-card uk-card-default">
            <div class="uk-card-header uk-padding-small">
                <h4>Informações Básicas</h4>
            </div>
            <div class="uk-card-body uk-padding-small">`
        },

        {
            el: 'input',
            name: 'prod_code',
            label: 'Código',
            parentClass: 'uk-width-1-5@m',
            placeholder: 'Código',
            attr: 'required',
            focus: true,
            tooltip: 'Código para identificação seu produto. Esse código será visualizado no site'
        },

        {
            el: 'input',
            name: 'prod_title',
            label: 'Título',
            attr: 'required',
            placeholder: 'Ex.: Caneca térmica degradê',
            parentClass: 'uk-width-expand@m',
            tooltip: 'O título ajudara seu produto ser encontrado com mais facilidade'
        },

        {
            el: 'textarea',
            name: 'prod_description',
            label: 'Descrição',
            placeholder: 'Descrição do produto',
            parentClass: 'uk-width-1-1@m',
            attr: 'rows="5"',
        },

        {
            el: 'after',
            html: `</div></div>`
        },

        // Card de Categorias

        {
            el: 'before',
            html: `<div class="uk-card uk-card-default uk-margin">
            <div class="uk-card-header uk-padding-small">
                <h4>Categorias</h4>
            </div>
            <div class="uk-card-body uk-padding-small">`
        },

        {
            el: 'select',
            name: 'prod_weight_measure',
            label: 'Medida aqui',
            parentClass: 'uk-width-1-3@m',
            tooltip: 'Escolha uma opção entre: Quilo (Kg), Grama (g)'
        },

        {
            el: 'after',
            html: `</div></div>`
        },

        // Card de Preço

        {
            el: 'before',
            html: `<div class="uk-card uk-card-default uk-margin">
            <div class="uk-card-header uk-padding-small">
                <h4>Preços</h4>
            </div>
            <div class="uk-card-body uk-padding-small">`
        },

        {
            el: 'input',
            name: 'prod_price',
            label: 'Preço',
            placeholder: '0,00',
            parentClass: 'uk-width-1-3@m',
            attr: 'liloo-mask-real required'
        },

        {
            el: 'input',
            name: 'prod_price_promotional',
            label: 'Preço promocional',
            placeholder: '0,00',
            parentClass: 'uk-width-1-3@m',
            attr: 'liloo-mask-real'
        },

        {
            el: 'input',
            type: 'radio',
            name: 'prod_price_show',
            label: 'Mostrar o preço',
            parentClass: 'uk-width-1-3@m',
            column: 2,
            items: [
                { value: 1, text: 'Sim', attr: 'checked' },
                { value: 0, text: 'Não' },
            ]
        },

        {
            el: 'after',
            html: `</div></div>`
        },

        {
            el: 'before',
            html: `<div class="uk-card uk-card-default uk-margin">
            <div class="uk-card-header uk-padding-small">
                <h4>Peso e Tamanho</h4>
            </div>
            <div class="uk-card-body uk-padding-small">`
        },

        {
            el: 'input',
            name: 'prod_weight',
            label: 'Peso',
            parentClass: 'uk-width-1-3@m',
        },

        {
            el: 'select',
            name: 'prod_weight_measure',
            label: 'Medida',
            parentClass: 'uk-width-1-3@m',
            options: [
                { text: 'Quilo (Kg)', value: 'kg', attr: 'checked' },
                { text: 'Grama (g)', value: 'g' },
            ],
            tooltip: 'Escolha uma opção entre: Quilo (Kg), Grama (g)'
        },

        {
            el: 'after',
            html: `</div></div>`
        },

        // {
        //     el: 'select',
        //     name: 'prod_status',
        //     label: 'Status',
        //     parentClass: 'uk-width-2-3@m',
        //     options: [
        //         { text: 'Publicado', value: 'publish' },
        //         { text: 'Rascunho', value: 'draft' },
        //         { text: 'Lixeira', value: 'trash' },

        //     ]
        // },



    ],
    success: function (res) {
        // UIkit.modal('#modal-create-prod').hide()
        // document.querySelector('#create-prod form').reset()
        // loadSearchList()

        // Swal.fire({
        //     title: 'Good job!',
        //     text: 'You clicked the button!',
        //     icon: 'info',
        //     showCancelButton: true,
        //     confirmButtonColor: '#1E87F0',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'Yes, delete it!'
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         Swal.fire({
        //             title: 'Deleted!',
        //             text: 'Your file has been deleted.',
        //             icon: 'success',
        //             confirmButtonColor: '#1E87F0',
        //         })
        //     }
        // })



    },
})

// Inclue foco no input e reseta o form após clicar em nova prode
$('#btn-create-prod').on('click', function () {
    setTimeout(function () {
        $('#create-prod input[name="prod_code"]').focus()
        // loadLastCreate()
    }, 500)
})

lilooDrop.Dropzone({
    // auto: true,
    before: '<div class="uk-card uk-card-default uk-padding-small">',
    after: '</div>',
    action: 'upload/files',
    data: JSON.stringify({
        meta: "product",
        module: "shop",
        id: window.location.search.split('=')[1]
    }),
    maxFiles: 10,
    maxSize: 5,
    typeFiles: "image/*",
    // resizeImage: 1900,

    clear: true,
    success: function (res) {
        Swal.fire({
            title: 'Ok',
            text: 'Imagens inseridas com sucesso!',
            icon: 'success',
            confirmButtonColor: '#1E87F0',
        })
    }
})

lilooDatePicker.Range({
    element: '#test'
})