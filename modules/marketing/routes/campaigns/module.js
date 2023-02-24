import { lilooSearch } from "../../../../libs/@liloo/searchlist/searchlist";
import { lilooForms } from "../../../../libs/@liloo/forms/forms";
import { lilooList } from "../../../../libs/@liloo/listing/listing"
import { lilooDatePicker } from "../../../../libs/@datepicker/datapicker";
import lilooChart from '../../../../libs/@chartjs/chart.js'

lilooChart.Bar({
    element: 'liloo-chart',
    // Requisição Ajax com os dados (opcional)
    path: 'modules/marketing/routes/campaigns/ajax', 
    // Action da requisição Ajax (opcional)
    action: 'graphics/campaigns/basic', 
    label: 'Principais Campanhas',
    // data: 'test', // Corpo da requisição que será enviado junto com o Ajax
}) 


const path = 'modules/marketing/routes/campaigns/ajax'

function loadSearchList() {
    lilooSearch.Terms({
        element: '#search-campaign',
        path: path,
        placeholder: 'Busque pelo nome da campanha, plataforma ou valor',
        reload: true,
        init: {
            action: 'get/campaigns',
            term: '',
            fields: ['campaign_name'],
            success: function (res) {
                res = res.output
                if (res != null) {
                    $('#search-campaign ul').html('')
                    res.forEach((props) => {
                        $('#search-campaign ul').prepend(`
                            <li id="${props.camp_id}">
                                <div class="uk-child-width-1-3@m uk-grid-small" uk-grid>
                                    <div>
                                        <h2>${props.camp_name}</h2>
                                        Canal: ${props.camp_channel}<br>
                                        Estratégia: ${props.camp_strategy}<br>
                                    </div>
                                    <div>
                                        <p>
                                            Tipo: ${props.camp_type}<br>
                                            Região: ${props.camp_region}                                           
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            Início: ${props.camp_date_initial}<br>
                                            Fim: ${(props.camp_date_final)?props.camp_date_final: 'indetermindado'}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        `)
                    })
                } else {
                    $('#search-campaign ul').html('<li><p>Nenhum resultado</p></li>')
                }
            }
        },

        searchSubmit: {
            action: 'get/campaigns',
            fields: ['camp_name','camp_channel','camp_name','camp_budget'],
            success: function (res) {
                res = res.output
                if (res != null) {
                    $('#search-campaign ul').html('')
                    res.forEach((props) => {
                        $('#search-campaign ul').prepend(`
                            <li id="${props.camp_id}">
                                <div class="uk-child-width-1-3@m uk-grid-small" uk-grid>
                                    <div>
                                        <h2>${props.camp_name}</h2>
                                        Canal: ${props.camp_channel}<br>
                                        Estratégia: ${props.camp_strategy}<br>
                                    </div>
                                    <div>
                                        <p>
                                            Tipo: ${props.camp_type}<br>
                                            Região: ${props.camp_region}                                           
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            Início: ${props.camp_date_initial}<br>
                                            Fim: ${(props.camp_date_final)?props.camp_date_final: 'indetermindado'}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        `)
                    })
                } else {
                    $('#search-campaign ul').html('<li><p>Nenhum resultado</p></li>')
                }
            }
        },

        // Recurso de uso da Modalfull
        onclickItemModal: {
            action: 'get/campaign/id',
            fields: ['camp_id'], // Faz referencia ao id da "li"
            success: function (props) {
                props = props.output
                $('#search-campaign .liloo-item-modal-full .liloo-modal-full-content').html(`
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div class="uk-align-left uk-width-1-2">
                        <h2 class="uk-margin-small uk-margin-remove-bottom">
                            ${props.camp_name}<br>
                            <small>Cód. ${props.camp_code} - Desde: ${props.camp_registered}</small>
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
                                        <p>Código: <b>${props.camp_code}</b></p>
                                        <p>Doc: <b>${props.camp_document}</b></p>
                                        <p>Oficio: <b>${props.camp_office}</b></p>
                                        <p>Empresa: <b>${props.camp_company_name}</b></p>
                                        <p>Segmento: <b>${props.camp_company_segment}</b></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header uk-padding-small">
                                        <h4>Descrição</h4>
                                    </div>
                                    <div class="uk-card-body uk-padding-small">
                                        <p>${props.camp_description}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header uk-padding-small">
                                        <h4>Endereço completo</h4>
                                    </div>
                                    <div class="uk-card-body uk-padding-small">
                                        <p>Endereço: <b>${props.camp_address}</b></p>
                                        <p>Numero: <b>${props.camp_number}</b></p>
                                        <p>Complemento: <b>${props.camp_complement}</b></p>
                                        <p>Local: <b>${props.camp_city} - ${props.camp_state}</b></p>
                                        <p>CEP: <b>${props.camp_zipcode}</b></p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header uk-padding-small">
                                        <h4>Contatos</h4>
                                    </div>
                                    <div class="uk-card-body uk-padding-small">
                                        <p>Whatsapp: <b>${props.camp_whatsapp}</b></p>
                                        <p>E-mail: <b>${props.camp_email}</b></p>
                                        <p>Telefone: <b>${props.camp_phone_1}</b></p>
                                        <p>Telefone: <b>${props.camp_phone_2}</b></p>                          
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
                        <h2>Deseja excluir cliente ${props.camp_code}?</h2>
                        <p>Atenção! Após excluir, essa operação não poderá ser revertida.</p>
                    `, {
                        stack: true
                    }).then(function () {
                        lilooV3.Event({
                            path: path,
                            action: 'delete/client/id',
                            data: props.camp_id,
                            success: function (res) {
                                lilooUi.Notify({
                                    type: res.type,
                                    message: res.message
                                })
                                $('[liloo-loader]').hide()
                                loadSearchList()
                                UIkit.modal('#modal-'+props.camp_id).hide('slow')
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
                    // data: props.camp_id, 
                    build: [
                        {
                            el: 'input',
                            type: 'hidden',
                            name: 'camp_id',
                            value: props.camp_id
                        },
                        {
                            el: 'input',
                            name: 'camp_code',
                            label: 'Código',
                            parentClass: 'uk-width-1-3@m',
                            value: props.camp_code
                        },
                        {
                            el: 'input',
                            name: 'camp_document',
                            label: 'Número CNPJ / CPF',
                            parentClass: 'uk-width-2-3@m',
                            value: props.camp_document
                        },

                        {
                            el: 'input',
                            name: 'camp_name',
                            label: 'Nome do Cliente / Empresa',
                            parentClass: 'uk-width-1-2@m',
                            value: props.camp_name
                        },

                        {
                            el: 'input',
                            type: 'mail',
                            name: 'camp_email',
                            label: 'E-mail',
                            parentClass: 'uk-width-1-2@m',
                            value: props.camp_email
                        },

                        {
                            el: 'input',
                            name: 'camp_whatsapp',
                            label: 'Whatsapp',
                            parentClass: 'uk-width-1-3@m',
                            attr: 'liloo-mask-phone',
                            value: props.camp_whatsapp
                        },

                        {
                            el: 'input',
                            name: 'camp_phone_1',
                            label: 'Telefone 1',
                            parentClass: 'uk-width-1-3@m',
                            attr: 'liloo-mask-phone',
                            value: props.camp_phone_1
                        },

                        {
                            el: 'input',
                            name: 'camp_phone_2',
                            label: 'Telefone 2',
                            parentClass: 'uk-width-1-3@m',
                            attr: 'liloo-mask-phone',
                            value: props.camp_phone_2
                        },

                        {
                            el: 'input',
                            name: 'camp_address',
                            label: 'Endereço Completo',
                            parentClass: 'uk-width-1-1@m',
                            value: props.camp_address
                        },

                        {
                            el: 'textarea',
                            name: 'camp_description',
                            label: 'Observações',
                            parentClass: 'uk-width-1-1@m',
                            value: props.camp_description
                        },
                    ],
                    success: function () {
                        // initList()
                    },
                })
                UIkit.modal('#search-campaign .liloo-item-modal-full .uk-modal-full').show()
            }
        },
    })
}
loadSearchList()

function loadLastCreate() {
    lilooList({
        element: 'liloo-listing',
        action: 'get/last/campaign',
        path: path,
        data: 'all',
        list: function (res) {
            res.forEach((props) => {
                $('liloo-listing ul').prepend(`
                    <li>
                        <div class="uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                            <div>
                                <p>
                                    Código: ${props.camp_id}<br>
                                    Nome: ${props.camp_name}<br>
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
    selector: '#create-campaign',
    labelSubmit: 'Cadastrar',
    action: 'create/campaign',
    path: path,
    data: 'modulo form',
    build: [
        
        {
            el: 'before',
            html: `<div class="uk-card uk-card-default uk-margin">
            <div class="uk-card-header uk-padding-small">
                <h4>Dados da Campanha</h4>
            </div>
            <div class="uk-card-body uk-padding-small">`
        },
        {
            el: 'input',
            name: 'camp_name',
            label: 'Nome da campanha',
            parentClass: 'uk-width-2-3@m',
            placeholder: 'Nome da Campanha',
            attr: 'required',
        },

        {
            el: 'input',
            name: 'camp_channel',
            label: 'Canal de Anúncio',
            placeholder: 'Canal',
            tooltip: 'Google, Facebook e etc',
            parentClass: 'uk-width-1-3@m',
        },

        {
            el: 'input',
            name: 'camp_type',
            label: 'Tipo',
            tooltip: 'Se é do tipo de vídeo, pesquisa, display e etc.',
            placeholder: 'Tipo de campanha',
            parentClass: 'uk-width-1-2@m',
        },

        {
            el: 'input',
            name: 'camp_strategy',
            label: 'Estratégia',
            tooltip: 'Se engajamento, alcance, reconhecimento e etc.',
            placeholder: 'Estratégia de campanha',
            parentClass: 'uk-width-1-2@m',
            attr: 'liloo-mask-phone'
        },

        {
            el: 'input',
            name: 'camp_budget',
            label: 'Orçamento (R$)',
            tooltip: 'Indique o valor aplicado na campanha. Esse valor irá ajudar a coletar dados para relatórios futuros',
            placeholder: 'Valor do orçamento',
            parentClass: 'uk-width-1-4@m',
            attr: 'liloo-mask-real'
        },

        {
            el: 'input',
            name: 'camp_date_initial',
            label: 'Data de início',
            placeholder: 'Data',
            parentClass: 'uk-width-1-4@m',
            attr: 'liloo-daterange'
        },

        {
            el: 'input',
            name: 'camp_date_final',
            label: 'Data de término',
            placeholder: 'Data',
            parentClass: 'uk-width-1-4@m',
            attr: 'liloo-daterange'
        },

        {
            el: 'html',
            html: `<div class="uk-width-1-4@m">
                    <label>&nbsp;</label>
                    <a id="no-finish" class="uk-button uk-button-primary uk-input" style="color: #000">Sem término</a>
                    <a id="yes-finish" class="uk-button uk-button-primary uk-input" style="color: #000; display: none;">Com término</a>
                </div>`,
        },

        {
            el: 'textarea',
            name: 'camp_region',
            label: 'Região',
            tooltip: 'A região pode ser uma ou mais cidades, bairros, local e etc.',
            placeholder: 'Digite uma por linha',
            parentClass: 'uk-width-1-1@m',
            attr: 'rows="5"'
        },

        {
            el: 'after',
            html: `</div></div>`
        },
    ],
    success: function (res) {
        UIkit.modal('#modal-create-campaign').hide()
        document.querySelector('#create-campaign form').reset()
        loadSearchList()
    },
})

lilooDatePicker.Date({
    element: '[liloo-daterange]'
})

$('#no-finish').on('click', function(){
    $('#no-finish').hide()
    $('#yes-finish').show()
    $('input[name="camp_date_final"]').val('Sem término').attr('disabled','disabled')
})
$('#yes-finish').on('click', function(){
    $('#yes-finish').hide()
    $('#no-finish').show()
    $('input[name="camp_date_final"]').val(moment().format('DD/MM/YYYY')).removeAttr('disabled')
})


/**
 * Inclue foco no input e reseta o form após clicar em nova cliente
 */
// $('#btn-create-campaign').on('click', function () {
//     document.getElementById("#create-campaigns").reset()
//     setTimeout(function () {
//         $('#create-campaign input[name="camp_name"]').focus()
//         // loadLastCreate()
//     }, 500)
// })
