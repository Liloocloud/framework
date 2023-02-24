import { lilooSearch } from "../../../../libs/@liloo/searchlist/searchlist";
import { lilooForms } from "../../../../libs/@liloo/forms/forms";
import { lilooList } from "../../../../libs/@liloo/listing/listing"

const options = {
    element: '#search-products',
    pathAjax: 'modules/shop/ajax/products',  

    initAction: 'get/products',
    initFields: ['prod_title', 'prod_code', 'prod_title','prod_description','prod_price'], 
    
    searchAction: 'get/products',
    searchFields: ['prod_title', 'prod_code', 'prod_title','prod_description','prod_price'],

    modalAction: 'get/product/id',
    modalFields: ['prod_id'],

    delAction: 'delete/product/id',
    upAction: 'update/product/id',
}

function loadSearchList() {
    lilooSearch.Terms({
        element: options.element,
        path: options.pathAjax,
        placeholder: 'Busque por código, título, descrição ou preço',
        reload: true,
        // divider: false,

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
                            <li id="${props.prod_id}">
                                <div class="uk-grid-small" uk-grid>
                                    <div class="uk-width-1-6@m uk-width-1-4@s">
                                        <img class="uk-border-rounded" src="${props.prod_cover}">
                                    </div>
                                    <div class="uk-width-expand@m">
                                        <p class="prod-price"><small>R$</small> ${props.prod_price}</p>
                                        <h2>${props.prod_title}</h2>
                                        <p class="prod-code">Cód. <b>${props.prod_code}</b></p>
                                        <p>Marca: ${props.prod_brand}</p>
                                        <p>Ativo: ${props.prod_active}</p>
                                     </div>
                                    <div class="uk-width-1-3@m">
                                        <p>Estoque: <b>${props.prod_amount}</b></p>
                                        <p>Registrado: ${props.prod_registered}</p>
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
                            <li id="${props.prod_id}">
                                <div class="uk-grid-small" uk-grid>
                                    <div class="uk-width-1-6@m uk-width-1-4@s">
                                        <img class="uk-border-rounded" src="${props.prod_cover}">
                                    </div>
                                    <div class="uk-width-expand@m">
                                        <p class="prod-price"><small>R$</small> ${props.prod_price}</p>
                                        <h2>${props.prod_title}</h2>
                                        <p class="prod-code">Cód. <b>${props.prod_code}</b></p>
                                        <p>Marca: ${props.prod_brand}</p>
                                        <p>Ativo: ${props.prod_active}</p>
                                    </div>
                                    <div class="uk-width-1-3@m">
                                        <p>Estoque: <b>${props.prod_amount}</b></p>
                                        <p>Registrado: ${props.prod_registered}</p>
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

                // Template da modal
                $(options.element + ' .liloo-item-modal-full .liloo-modal-full-content').html(`
                    <div class="uk-flex uk-flex-between uk-flex-middle">
                        <div class="uk-align-left uk-width-1-2">
                            <h2 class="uk-margin-small uk-margin-remove-bottom">${props.prod_title}</h2>
                            <p>Cód. ${props.prod_code} - Cadastrado em: ${props.prod_registered}</p>
                        </div>
                        <div>
                            <button type="button" class="uk-button uk-button-primary uk-button-small liloo-item-delete">Compartilhar</button>
                            <button type="button" class="uk-button uk-button-danger uk-button-small liloo-item-delete">Excluir</button>
                        </div>
                    </div>
                             
                    <div class="ui tabular menu">
                        <div class="item active" data-tab="tab-infos">Informações</div>
                        <div class="item" data-tab="tab-price">Preço e Promoções</div>
                        <div class="item" data-tab="tab-images">Galeria de Imagens</div>
                    </div>

                    <div class="ui tab active" data-tab="tab-infos">
                        <div class="uk-child-width-1-2@m uk-grid-small" uk-grid>
                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header uk-padding-small">
                                        <h4>Informações Básicas</h4>
                                    </div>
                                    <div class="uk-card-body uk-padding-small">
                                        <liloo-form id="update-product-infos"></liloo-form>                         
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header uk-padding-small">
                                        <h4>Informções de Categoria e Marca</h4>
                                    </div>
                                    <div class="uk-card-body uk-padding-small">
                                        <liloo-form id="update-product-categs"></liloo-form>                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ui tab" data-tab="tab-price">
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header uk-padding-small">
                                <h4>Preço e Promoções</h4>
                            </div>
                            <div class="uk-card-body uk-padding-small">
                                <liloo-form id="update-product-price"></liloo-form>                         
                            </div>
                        </div> 
                    </div>   

                    <div class="ui tab" data-tab="tab-images">
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header uk-padding-small">
                                <h4>Galeria de Imagens</h4>
                            </div>
                            <div class="uk-card-body uk-padding-small">
                                <liloo-form id="update-product-price"></liloo-form>                         
                            </div>
                        </div> 
                    </div>   
    
                `)

                // Botão Excluir com caixa de dialog
                $('.liloo-modal-full-content .liloo-item-delete').on('click', function () {
                    UIkit.modal.confirm(`
                        <h2>Deseja excluir a categoria ${props.prod_title}?</h2>
                        <p>Atenção! Após excluir, essa operação não poderá ser revertida.</p>
                    `, {
                        stack: true
                    }).then(function () {
                        lilooV3.Event({
                            path: options.pathAjax,
                            action: options.delAction,
                            data: props.prod_id,
                            success: function (res) {
                                lilooUi.Notify({
                                    type: res.type,
                                    message: res.message
                                })
                                $('[liloo-loader]').hide()
                                loadSearchList()
                                UIkit.modal('#modal-'+props.prod_id).hide('slow')
                            }
                        })

                    }, function () {
                        console.log('Rejeitado')
                    })
                })

                // Informações part 1
                lilooForms({
                    selector: '#update-product-infos',
                    labelSubmit: 'Salvar',
                    action: options.upAction,
                    path: options.pathAjax,
                    // data: props.client_id, 
                    build: [
                        { el: 'input', type: 'hidden', name: 'prod_id', value: props.prod_id },
                        
                        {
                            el: 'input',
                            name: 'prod_code',
                            label: 'Código',
                            parentClass: 'uk-width-1-3@m',
                            value: props.prod_code
                        },

                        {
                            el: 'input',
                            name: 'prod_title',
                            label: 'Título do Produto',
                            parentClass: 'uk-width-1-1@m',
                            value: props.prod_title
                        },
                        
                        {
                            el: 'textarea',
                            name: 'prod_description',
                            label: 'Descrição do Produto',
                            parentClass: 'uk-width-1-1@m',
                            attr: 'rows="6"',
                            value: props.prod_description
                        }

                    ],
                    success: function () {
                        // initList()
                    },
                })

                // Informações part 2
                lilooForms({
                    selector: '#update-product-categs',
                    labelSubmit: 'Salvar',
                    action: options.upAction,
                    path: options.pathAjax,
                    // data: props.client_id, 
                    build: [
                        { el: 'input', type: 'hidden', name: 'prod_id', value: props.prod_id },

                        {
                            el: 'input',
                            name: 'prod_brand',
                            label: 'Marca ou Fabricante',
                            parentClass: 'uk-width-1-2@m',
                            value: props.prod_brand
                        },
                      
                        {
                            el: 'select',
                            name: 'prod_category',
                            label: 'Categoria',
                            parentClass: 'uk-width-1-2@m',
                            options: [
                                { value: 'Ok', text: 'Estamos no Ok' }
                            ]      
                            
                        }

                    ],
                    success: function () {
                        // initList()
                    },
                })

                // Preço e Promoções
                lilooForms({
                    selector: '#update-product-price',
                    labelSubmit: 'Salvar',
                    action: options.upAction,
                    path: options.pathAjax,
                    // data: props.client_id, 
                    build: [
                        { el: 'input', type: 'hidden', name: 'prod_id', value: props.prod_id },
                        
                        {
                            el: 'input',
                            name: 'prod_code',
                            label: 'Código',
                            parentClass: 'uk-width-1-6@m',
                            value: props.prod_code
                        },

                        {
                            el: 'input',
                            name: 'prod_title',
                            label: 'Título do Produto',
                            parentClass: 'uk-width-1-1@m',
                            value: props.prod_title
                        },

                        {
                            el: 'input',
                            name: 'prod_meta',
                            label: 'Meta - Módulo pertencente',
                            parentClass: 'uk-width-1-2@m',
                            value: props.prod_meta
                        },
                        {
                            el: 'input',
                            name: 'prod_inner_id',
                            label: 'Grupo da Categoria',
                            parentClass: 'uk-width-1-2@m',
                            value: props.prod_inner_id
                        },
                      
                        {
                            el: 'input',
                            type: 'mail',
                            name: 'prod_type',
                            label: 'Tipo - Aplicação',
                            parentClass: 'uk-width-1-2@m',
                            value: props.prod_type
                        },

                        {
                            el: 'textarea',
                            name: 'prod_description',
                            label: 'Descrição',
                            parentClass: 'uk-width-1-1@m',
                            value: props.prod_description
                        },
                    ],
                    success: function () {
                        // initList()
                    },
                })

                // Abre a modal e renderiza os componentes 
                UIkit.modal(options.element + ' .liloo-item-modal-full .uk-modal-full').show()
                $('.tabular.menu .item').tab()
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

// Renderiza o form de novo cliente
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

// Inclue foco no input e reseta o form após clicar em nova cliente
$('#btn-create-client').on('click', function () {
    setTimeout(function () {
        $('#create-client input[name="client_code"]').focus()
        loadLastCreate()
    }, 500)
})
