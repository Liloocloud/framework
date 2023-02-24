# Módulo Clients
- Versão 2.0.0 (Requer lilooCloud V5 - lilooJS V3)
- Copyright - Felipe Oliveira Lourenço
- Update - 19.09.2022

## Ações AJAX - case: action

Essenciais
- delete/client/id  // Deleta cliente pelo ID passado juntamente com o ID da sessão atual 
- get/client/id     // Retorna o cliente pelo ID passado juntamente com o ID da sessão atual
- get/clients       // Retorna uma lista de cliente pelo ID da sessão atual
- update/client/id  // Atualiza as informações do cliente pelo ID passado juntamente com o ID da sessão atual
- create/client/    // Cria um novo cliente adicionando o ID da sessão atual

Adicionais
- send/message/whatsapp/client      // Salva a mensagem e envia para o whatsapp do cliente
- send/email/client                 // Salva a mensagem e envia ao cliente pelo e-mail do cliente cadastro 

## Recursos
- Cadastro de cliente simples
- Visualização dos detalhes em modal full
- Opção de editar cliente
- Lista de busca por codigo, nome, endereço, e-mail ou whatsapp
- Opção de excluir o cliente no painel modal full

## Recursos futuros
- Clonagem de cadastro
- Paginação de resultados
- Filtro de busca avançado
- Rota para relatórios dos seguintes tipos:
- -- Número de clientes ativos
- -- Ticket médio de vendas
- -- Clientes por região 

## Implementação completa
```js

import { lilooSearch } from "../../../../libs/@liloo/searchlist/searchlist";
import { lilooForms } from "../../../../libs/@liloo/forms/forms";
import { lilooList } from "../../../../libs/@liloo/listing/listing"

const path = 'modules/clients/ajax/manager'

function loadSearchList() {
    lilooSearch.Terms({
        element: '#search-clients',
        path: path,
        placeholder: 'Busque por código, nome, endereço, e-mail ou whatsapp',
        reload: true,

        init: {
            action: 'get/clients',
            term: '',
            fields: ['client_name', 'client_email', 'client_whatsapp'],
            success: function (res) {
                res = res.output
                if (res != null) {
                    $('#search-clients ul').html('')
                    res.forEach((props) => {
                        $('#search-clients ul').prepend(`
                            <li id="${props.client_id}">
                                <div class="uk-child-width-1-3@m uk-grid-collapse" uk-grid>
                                    <div>
                                        <p>
                                            Código: ${props.client_code}<br>
                                            Nome: ${props.client_name}<br>
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            Whatsapp: ${props.client_whatsapp}<br>
                                            E-mail: ${props.client_email}
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            Telefone 1: ${props.client_phone_1}<br>
                                            Endereço: ${props.client_address}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        `)
                    })
                } else {
                    $('#search-clients ul').html('<li><p>Nenhum resultado</p></li>')
                }
            }
        },

        searchSubmit: {
            action: 'get/clients',
            fields: ['client_code', 'client_name', 'client_email', 'client_whatsapp', 'client_address'],
            success: function (res) {
                res = res.output
                if (res != null) {
                    $('#search-clients ul').html('')
                    res.forEach((props) => {
                        $('#search-clients ul').prepend(`
                            <li id="${props.client_id}">
                                <div class="uk-child-width-1-3@m uk-grid-collapse" uk-grid>
                                    <div>
                                        <p>
                                            Código: ${props.client_code}<br>
                                            Nome: ${props.client_name}<br>
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            Whatsapp: ${props.client_whatsapp}<br>
                                            E-mail: ${props.client_email}
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            Telefone 1: ${props.client_phone_1}<br>
                                            Endereço: ${props.client_address}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        `)
                    })
                } else {
                    $('#search-clients ul').html('<li><p>Nenhum resultado</p></li>')
                }
            }
        },

        // Recurso de uso da Modalfull
        onclickItemModal: {
            action: 'get/client/id',
            fields: ['client_id'], // Faz referencia ao id da "li"
            success: function (props) {
                props = props.output
                $('#search-clients .liloo-item-modal-full .liloo-modal-full-content').html(`
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div class="uk-align-left uk-width-1-2">
                        <h2 class="uk-margin-small uk-margin-remove-bottom">
                            ${props.client_name}<br>
                            <small>Cód. ${props.client_code}</small>
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
                                        <p>Código: <b>${props.client_code}</b></p>
                                        <p>Doc: <b>${props.client_document}</b></p>
                                        <p>Oficio: <b>${props.client_office}</b></p>
                                        <p>Empresa: <b>${props.client_company_name}</b></p>
                                        <p>Segmento: <b>${props.client_company_segment}</b></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header uk-padding-small">
                                        <h4>Descrição</h4>
                                    </div>
                                    <div class="uk-card-body uk-padding-small">
                                        <p>${props.client_description}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header uk-padding-small">
                                        <h4>Endereço completo</h4>
                                    </div>
                                    <div class="uk-card-body uk-padding-small">
                                        <p>Endereço: <b>${props.client_address}</b></p>
                                        <p>Numero: <b>${props.client_number}</b></p>
                                        <p>Complemento: <b>${props.client_complement}</b></p>
                                        <p>Local: <b>${props.client_city} - ${props.client_state}</b></p>
                                        <p>CEP: <b>${props.client_zipcode}</b></p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header uk-padding-small">
                                        <h4>Contatos</h4>
                                    </div>
                                    <div class="uk-card-body uk-padding-small">
                                        <p>Whatsapp: <b>${props.client_whatsapp}</b></p>
                                        <p>E-mail: <b>${props.client_email}</b></p>
                                        <p>Telefone: <b>${props.client_phone_1}</b></p>
                                        <p>Telefone: <b>${props.client_phone_2}</b></p>                          
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header uk-padding-small">
                                <h4>Editar Cliente</h4>
                            </div>
                            <div class="uk-card-body uk-padding-small">
                                <liloo-form id="update-client"></liloo-form>                         
                            </div>
                        </div>
                    </div>
                </div>
                `)

                // Botão Excluir com caixa de dialog
                $('.liloo-modal-full-content .liloo-item-delete').on('click', function () {
                    UIkit.modal.confirm(`
                        <h2>Deseja excluir cliente ${props.client_code}?</h2>
                        <p>Atenção! Após excluir, essa operação não poderá ser revertida.</p>
                    `, {
                        stack: true
                    }).then(function () {
                        lilooV3.Event({
                            path: path,
                            action: 'delete/client/id',
                            data: props.client_id,
                            success: function (res) {
                                lilooUi.Notify({
                                    type: res.type,
                                    message: res.message
                                })
                                $('[liloo-loader]').hide()
                                loadSearchList()
                                UIkit.modal('#modal-'+props.client_id).hide('slow')
                            }
                        })

                    }, function () {
                        console.log('Rejeitado')
                    })
                })

                // Form editar
                lilooForms({
                    selector: '#update-client',
                    labelSubmit: 'Salvar',
                    action: 'update/client/id',
                    path: path,
                    // data: props.client_id, 
                    build: [
                        {
                            el: 'input',
                            type: 'hidden',
                            name: 'client_id',
                            value: props.client_id
                        },
                        {
                            el: 'input',
                            name: 'client_code',
                            label: 'Código',
                            parentClass: 'uk-width-1-3@m',
                            value: props.client_code
                        },
                        {
                            el: 'input',
                            name: 'client_document',
                            label: 'Número CNPJ / CPF',
                            parentClass: 'uk-width-2-3@m',
                            value: props.client_document
                        },

                        {
                            el: 'input',
                            name: 'client_name',
                            label: 'Nome do Cliente / Empresa',
                            parentClass: 'uk-width-1-2@m',
                            value: props.client_name
                        },

                        {
                            el: 'input',
                            type: 'mail',
                            name: 'client_email',
                            label: 'E-mail',
                            parentClass: 'uk-width-1-2@m',
                            value: props.client_email
                        },

                        {
                            el: 'input',
                            name: 'client_whatsapp',
                            label: 'Whatsapp',
                            parentClass: 'uk-width-1-3@m',
                            attr: 'liloo-mask-phone',
                            value: props.client_whatsapp
                        },

                        {
                            el: 'input',
                            name: 'client_phone_1',
                            label: 'Telefone 1',
                            parentClass: 'uk-width-1-3@m',
                            attr: 'liloo-mask-phone',
                            value: props.client_phone_1
                        },

                        {
                            el: 'input',
                            name: 'client_phone_2',
                            label: 'Telefone 2',
                            parentClass: 'uk-width-1-3@m',
                            attr: 'liloo-mask-phone',
                            value: props.client_phone_2
                        },

                        {
                            el: 'input',
                            name: 'client_address',
                            label: 'Endereço Completo',
                            parentClass: 'uk-width-1-1@m',
                            value: props.client_address
                        },

                        {
                            el: 'textarea',
                            name: 'client_description',
                            label: 'Observações',
                            parentClass: 'uk-width-1-1@m',
                            value: props.client_description
                        },
                    ],
                    success: function () {
                        // initList()
                    },
                })
                UIkit.modal('#search-clients .liloo-item-modal-full .uk-modal-full').show()
            }
        },
    })
}
loadSearchList()

function loadLastCreate() {
    lilooList({
        element: 'liloo-listing',
        action: 'get/last/clients',
        path: path,
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
    path: path,
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

```
