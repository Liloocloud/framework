import { lilooSearch } from "../../../../libs/@liloo/searchlist/searchlist";
import { lilooForms } from "../../../../libs/@liloo/forms/forms";
import { lilooList } from "../../../../libs/@liloo/listing/listing"

const options = {
    element: '#search-categs',
    pathAjax: 'modules/shop/ajax/categs',  
    
    initAction: 'get/categs',
    initFields: ['tax_name', 'tax_meta', 'tax_inner_id'], 
    
    searchAction: 'get/categs',
    searchFields: ['tax_name', 'tax_meta', 'tax_inner_id'],

    modalAction: 'get/categ/id',
    modalFields: ['tax_id'],

    delAction: 'delete/categ/id',
    upAction: 'update/categ/id',
}

function loadSearchList() {
    lilooSearch.Terms({
        element: options.element,
        path: options.pathAjax,
        placeholder: 'Busque por código ou nome',
        reload: true,

        init: {
            action: options.initAction,
            term: '',
            fields: options.initFields,
            success: function (res) {
                res = res.output
                if (res != null) {
                    $(options.element + ' ul').html('')
                    res.forEach((props) => {
                        $(options.element + ' ul').prepend(`
                            <li id="${props.tax_id}">
                                <div class="uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                                    <div>
                                        <p>
                                            ${props.tax_id} - <b>${props.tax_name}</b><br>
                                            Grupo: <b>${props.tax_inner_id}</b><br>
                                            Status: ${props.tax_status}
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            Tipo: ${props.tax_type}<br>
                                            Meta: ${props.tax_meta}<br>
                                            Registrada em: ${props.tax_registered}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        `)
                    })
                } else {
                    $(options.element + ' ul').html('<li><p>Nenhum resultado</p></li>')
                }
            }
        },

        searchSubmit: {
            action: options.searchAction,
            fields: options.searchFields,
            success: function (res) {
                res = res.output
                if (res != null) {
                    $(options.element + ' ul').html('')
                    res.forEach((props) => {
                        $(options.element + ' ul').prepend(`
                            <li id="${props.tax_id}">
                                <div class="uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                                    <div>
                                        <p>
                                            ${props.tax_id} - <b>${props.tax_name}</b><br>
                                            Grupo: <b>${props.tax_inner_id}</b><br>
                                            Status: ${props.tax_status}
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            Tipo: ${props.tax_type}<br>
                                            Meta: ${props.tax_meta}<br>
                                            Registrada em: ${props.tax_registered}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        `)
                    })
                } else {
                    $(options.element + ' ul').html('<li><p>Nenhum resultado</p></li>')
                }
            }
        },

        // Recurso de uso da Modalfull
        onclickItemModal: {
            action: options.modalAction,
            fields: options.modalFields, // Faz referencia ao id da "li"
            success: function (props) {
                props = props.output
                $(options.element + ' .liloo-item-modal-full .liloo-modal-full-content').html(`
                    <div class="uk-flex uk-flex-between uk-flex-middle">
                        <div class="uk-align-left uk-width-1-2">
                            <h2 class="uk-margin-small uk-margin-remove-bottom">
                                ${props.tax_name}<br>
                                <small>Cód. ${props.tax_id} - Cadastrado em: ${props.tax_registered}</small>
                            </h2>
                        </div>
                        <button type="button" class="uk-button uk-button-danger uk-button-small liloo-item-delete">Excluir</button>
                    </div>
                
                    <div class="uk-child-width-1-2@m uk-grid-small" uk-grid>
                        <div>
                            <div class="uk-child-width-1-2@m uk-grid-small" uk-grid="masonry: true">
                                
                                <div>
                                    <div class="uk-card uk-card-default">
                                        <div class="uk-card-header uk-padding-small">
                                            <h4>Informações</h4>
                                        </div>
                                        <div class="uk-card-body uk-padding-small">
                                            <p>ID: <b>${props.tax_id}</b></p>
                                            <p>Grupo: <b>${props.tax_inner_id}</b></p>
                                            <p>Meta: <b>${props.tax_meta}</b></p>
                                            <p>Status: <b>${props.tax_status}</b></p>
                                            <p>Tipo: <b>${props.tax_type}</b></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="uk-card uk-card-default">
                                        <div class="uk-card-header uk-padding-small">
                                            <h4>Descrição</h4>
                                        </div>
                                        <div class="uk-card-body uk-padding-small">
                                            <p>${props.tax_description}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="uk-card uk-card-default">
                                        <div class="uk-card-header uk-padding-small">
                                            <h4>Ícone</h4>
                                        </div>
                                        <div class="uk-card-body uk-padding-small">
                                            <p>Endereço: <b>${props.tax_icon}</b></p>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="uk-card uk-card-default">
                                        <div class="uk-card-header uk-padding-small">
                                            <h4>Imagem de capa</h4>
                                        </div>
                                        <div class="uk-card-body uk-padding-small">
                                            <p>${props.tax_images}</p>                         
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header uk-padding-small">
                                    <h4>Editar Categoria</h4>
                                </div>
                                <div class="uk-card-body uk-padding-small">
                                    <liloo-form id="update-categ"></liloo-form>                         
                                </div>
                            </div>
                        </div>
                    </div>
                `)

                // Botão Excluir com caixa de dialog
                $('.liloo-modal-full-content .liloo-item-delete').on('click', function () {
                    UIkit.modal.confirm(`
                        <h2>Deseja excluir a categoria ${props.tax_name}?</h2>
                        <p>Atenção! Após excluir, essa operação não poderá ser revertida.</p>
                    `, {
                        stack: true
                    }).then(function () {
                        lilooV3.Event({
                            path: options.pathAjax,
                            action: options.delAction,
                            data: props.tax_id,
                            success: function (res) {
                                lilooUi.Notify({
                                    type: res.type,
                                    message: res.message
                                })
                                $('[liloo-loader]').hide()
                                loadSearchList()
                                UIkit.modal('#modal-'+props.tax_id).hide('slow')
                            }
                        })

                    }, function () {
                        console.log('Rejeitado')
                    })
                })

                // Form editar
                lilooForms({
                    selector: '#update-categ',
                    labelSubmit: 'Salvar',
                    action: options.upAction,
                    path: options.pathAjax,
                    // data: props.client_id, 
                    build: [
                        {
                            el: 'input',
                            type: 'hidden',
                            name: 'tax_id',
                            value: props.tax_id
                        },

                        {
                            el: 'input',
                            name: 'tax_name',
                            label: 'Categoria',
                            parentClass: 'uk-width-1-2@m',
                            value: props.tax_name
                        },

                        {
                            el: 'input',
                            name: 'tax_meta',
                            label: 'Meta - Módulo pertencente',
                            parentClass: 'uk-width-1-2@m',
                            value: props.tax_meta
                        },
                        {
                            el: 'input',
                            name: 'tax_inner_id',
                            label: 'Grupo da Categoria',
                            parentClass: 'uk-width-1-2@m',
                            value: props.tax_inner_id
                        },
                      
                        {
                            el: 'input',
                            type: 'mail',
                            name: 'tax_type',
                            label: 'Tipo - Aplicação',
                            parentClass: 'uk-width-1-2@m',
                            value: props.tax_type
                        },

                        {
                            el: 'textarea',
                            name: 'tax_description',
                            label: 'Descrição',
                            parentClass: 'uk-width-1-1@m',
                            value: props.tax_description
                        },
                    ],
                    success: function () {
                        // initList()
                    },
                })
                UIkit.modal(options.element + ' .liloo-item-modal-full .uk-modal-full').show()
            }
        },
    })
}
loadSearchList()

function loadLastCreate() {
    lilooList({
        element: 'liloo-listing',
        action: 'get/last/clients',
        path: options.pathAjax,
        data: 'all',
        list: function (res) {
            res.forEach((props) => {
                $('liloo-listing ul').prepend(`
                    <li>
                        <div class="uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                            <div>
                                <p>
                                    Código: ${props.client_code}<br>
                                    Nome: ${props.client_name}<br>
                                </p>
                            </div>
                        </div>
                    </li>
                `)
            })
        }
    })
}

/**
 * Renderiza o form de novo cliente
 */
lilooForms({
    selector: '#create-client',
    labelSubmit: 'Cadastrar',
    action: 'create/client',
    path: options.pathAjax,
    data: 'modulo form',
    build: [
        {
            el: 'input',
            name: 'client_code',
            label: 'Código',
            parentClass: 'uk-width-1-3@m',
            placeholder: 'Código',
            attr: 'required',
        },

        {
            el: 'input',
            name: 'client_document',
            label: 'Número CNPJ / CPF',
            placeholder: 'Número CNPJ / CPF',
            parentClass: 'uk-width-2-3@m',
        },

        {
            el: 'input',
            name: 'client_name',
            label: 'Nome do Cliente / Empresa',
            placeholder: 'Nome do Cliente / Empresa',
            parentClass: 'uk-width-1-2@m',
        },

        {
            el: 'input',
            type: 'mail',
            name: 'client_email',
            label: 'E-mail',
            placeholder: 'E-mail',
            parentClass: 'uk-width-1-2@m',
        },

        {
            el: 'input',
            name: 'client_whatsapp',
            label: 'Whatsapp',
            placeholder: 'Whatsapp',
            parentClass: 'uk-width-1-3@m',
            attr: 'liloo-mask-phone'
        },

        {
            el: 'input',
            name: 'client_phone_1',
            label: 'Telefone 1',
            placeholder: 'Telefone 1',
            parentClass: 'uk-width-1-3@m',
            attr: 'liloo-mask-phone'
        },

        {
            el: 'input',
            name: 'client_phone_2',
            label: 'Telefone 2',
            placeholder: 'Telefone 2',
            parentClass: 'uk-width-1-3@m',
            attr: 'liloo-mask-phone'
        },

        {
            el: 'input',
            name: 'client_address',
            label: 'Endereço Completo',
            placeholder: 'Endereço Completo',
            parentClass: 'uk-width-1-1@m',
            id: 'test'
        },

        {
            el: 'textarea',
            name: 'client_description',
            label: 'Observações',
            placeholder: 'Observações',
            parentClass: 'uk-width-1-1@m'
        },
    ],
    success: function () {
        UIkit.modal('#modal-create-client').hide()
        document.querySelector('#create-client form').reset()
        loadSearchList()
    },
})

/**
 * Inclue foco no input e reseta o form após clicar em nova cliente
 */
$('#btn-create-client').on('click', function () {
    setTimeout(function () {
        $('#create-client input[name="client_code"]').focus()
        loadLastCreate()
    }, 500)
})
