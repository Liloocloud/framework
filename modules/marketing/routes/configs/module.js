import { lilooForms } from "../../../../libs/@liloo/forms/forms.js"

const path = 'modules/marketing/routes/configs/ajax'
class Config {
    
    constructor(Obj) {
        this.path = 'modules/marketing/routes/configs/ajax'
        this.action = Obj.action
    }

    /**
     * List Pipelines
     */
    ListPipe() {
        const ajaxPath = this.path
        lilooV3.Event({
            action: this.action,
            path: ajaxPath,
            data: '',
            success: function (res) {
                
                // Povoa
                let listing = ``
                res.output.forEach(val => {
                    listing += `<div id="pipe-${val.pipe_id}" class="uk-card uk-card-default uk-padding-small">
                        <h3>${val.pipe_title}</h3>
                        <p>${val.pipe_description}</p>    
                        <button class="pipe-update uk-icon-button uk-button-default"><i class="far fa-edit"></i></button>
                        <button class="pipe-trash uk-icon-button uk-button-default"><i class="fas fa-trash-alt"></i></button>
                    </div>`
                })
                $('#pipeline-listing').html(listing)

                // Deletar
                $('.pipe-trash').on('click', function () {
                    let Pipe = $(this.parentNode).attr('id')
                    Pipe = Pipe.split('-')[1]
                    UIkit.modal.confirm('<h3>Deseja excluir esta pipeline</h3>', {
                        stack: true
                    }).then(function () {

                        lilooV3.Event({
                            path: path,
                            action: 'delete/pipeline',
                            data: Pipe,
                            success: function (res) {
                                Swal.fire({
                                    // title: 'show!',
                                    text: res.message,
                                    icon: res.type,
                                    confirmButtonColor: '#1E87F0',
                                })
                                $('[liloo-loader]').hide();
                            }
                        })
                        List.ListPipe()

                    }, function () {
                        console.log('Rejected')
                    });
                })

                // Atualizar
                $('.pipe-update').on('click', function(){
                    let Pipe = $(this.parentNode).attr('id')
                    Pipe = Pipe.split('-')[1]

                    lilooV3.Event({
                        path: ajaxPath,
                        action: 'get/pipeline/id',
                        data: Pipe,
                        success: function(res){
                            let props = res.output[0]
                            lilooForms({
                                selector: '#content-modal-update-pipe',
                                path: path,
                                action: 'update/new/pipeline',
                                buttonSubmit: '#btn-update-new-pipeline',
                                build: [
                                    {
                                        el: 'input',
                                        type: 'hidden',
                                        name: 'pipe_id',
                                        value: props.pipe_id 
                                    },
                                    {
                                        el: 'input',
                                        label: 'Nome da Coluna (Pipeline)',
                                        name: 'pipe_title',
                                        parentClass: 'uk-margin',
                                        value: props.pipe_title
                                    },
                                    {
                                        el: 'textarea',
                                        label: 'Breve descrição',
                                        name: 'pipe_description',
                                        attr: 'rows="3"',
                                        value: props.pipe_description
                                    },
                                ],
                                success: function (res) {
                                    if (res.bool) {
                                        UIkit.modal('#modal-update-pipe').hide()
                                    }
                                    List.ListPipe()
                                }
                            })

                            UIkit.modal('#modal-update-pipe', {stack: true}).show()
                        }
                    })
                    $('[liloo-loader]').hide();
                })
            }
        })
    }
}

// Tags
lilooV3.Event({
    action: 'init/configs',
    path: path,
    success: function (res) {
        if (res.bool) {
            let props = res.output

            // Header
            lilooForms({
                selector: '#head-tags',
                path: path,
                action: 'update/item/field',
                buttonSubmit: '#btn-head',
                build: [
                    {
                        el: 'html',
                        html: `<div class="uk-child-width-1-1@m uk-grid-small" uk-grid><div><div class="uk-card uk-card-default"><div class="uk-card-header uk-padding-small">
                        <h4>Script Adicionar que ficam na <head> do site</h4>
                        </div><div class="uk-card-body uk-padding-small">`
                    },
                    {
                        el: 'textarea',
                        name: 'head_tags_scripts',
                        value: props.head_tags_scripts,
                        attr: 'rows="10"',
                    },
                    {
                        el: 'html',
                        html: `</div></div></div></div>`
                    },

                ],
                success: function (res) {
                    console.log(res)
                }
            })

            // Google
            lilooForms({
                selector: '#google-tags',
                path: path,
                action: 'update/item/field',
                buttonSubmit: '#btn-google',
                build: [
                    {
                        el: 'html',
                        html: `<div class="uk-child-width-1-3@m uk-grid-small" uk-grid><div><div class="uk-card uk-card-default"><div class="uk-card-header uk-padding-small">
                        <h4>Tag Global Site - Google</h4>
                        </div><div class="uk-card-body uk-padding-small">`
                    },
                    {
                        el: 'textarea',
                        name: 'google_tag_ads',
                        value: props.google_tag_ads,
                        attr: 'rows="10"',
                    },
                    {
                        el: 'html',
                        html: `</div></div></div>`
                    },
                    // ******************************************
                    {
                        el: 'html',
                        html: `<div><div class="uk-card uk-card-default"><div class="uk-card-header uk-padding-small">
                            <h4>Tag de Conversão - Google</h4>
                        </div><div class="uk-card-body uk-padding-small">`
                    },
                    {
                        el: 'textarea',
                        name: 'google_tag_conversion',
                        value: props.google_tag_conversion,
                        attr: 'rows="10"',
                    },
                    {
                        el: 'html',
                        html: `</div></div></div>`
                    },
                    // ******************************************
                    {
                        el: 'html',
                        html: `<div><div class="uk-card uk-card-default"><div class="uk-card-header uk-padding-small">
                            <h4>Código de acompanhamento Analytics</h4>
                        </div><div class="uk-card-body uk-padding-small">`
                    },
                    {
                        el: 'textarea',
                        name: 'google_tag_analytics',
                        value: props.google_tag_analytics,
                        attr: 'rows="10"',
                    },
                    {
                        el: 'html',
                        html: `</div></div></div>`
                    },
                    // ******************************************
                    {
                        el: 'html',
                        html: `<div><div class="uk-card uk-card-default"><div class="uk-card-header uk-padding-small">
                            <h4>Google Tag manager - GTM</h4>
                        </div><div class="uk-card-body uk-padding-small">`
                    },
                    {
                        el: 'input',
                        name: 'google_tag_gtm',
                        value: props.google_tag_gtm,
                    },
                    {
                        el: 'html',
                        html: `</div></div></div>`
                    },
                    // ******************************************
                    {
                        el: 'html',
                        html: `<div><div class="uk-card uk-card-default"><div class="uk-card-header uk-padding-small">
                            <h4>Código Meta Webmaster Tools</h4>
                        </div><div class="uk-card-body uk-padding-small">`
                    },
                    {
                        el: 'input',
                        name: 'google_meta_console',
                        value: props.google_meta_console,
                    },
                    {
                        el: 'html',
                        html: `</div></div></div></div>`
                    },

                ]
            })

            // Facebook
            lilooForms({
                selector: '#facebook-pixels',
                path: path,
                action: 'update/item/field',
                buttonSubmit: '#btn-facebook',
                build: [
                    {
                        el: 'html',
                        html: `<div class="uk-child-width-1-2@m uk-grid-small" uk-grid><div><div class="uk-card uk-card-default"><div class="uk-card-header uk-padding-small">
                        <h4>Facebook Pixel - Global</h4>
                        </div><div class="uk-card-body uk-padding-small">`
                    },
                    {
                        el: 'textarea',
                        name: 'facebook_pixel',
                        value: props.facebook_pixel,
                        attr: 'rows="10"',
                    },
                    {
                        el: 'html',
                        html: `</div></div></div>`
                    },
                    // ******************************************
                    {
                        el: 'html',
                        html: `<div><div class="uk-card uk-card-default"><div class="uk-card-header uk-padding-small">
                            <h4>Facebook Site Verification</h4>
                        </div><div class="uk-card-body uk-padding-small">`
                    },
                    {
                        el: 'input',
                        name: 'facebook_meta_domain',
                        value: props.facebook_meta_domain,
                    },
                    {
                        el: 'html',
                        html: `</div></div></div></div>`
                    },

                ]
            })

            // Hotjar
            lilooForms({
                selector: '#hotjar-script',
                path: path,
                action: 'update/item/field',
                buttonSubmit: '#btn-hotjar',
                build: [
                    {
                        el: 'html',
                        html: `<div class="uk-child-width-1-1@m uk-grid-small" uk-grid><div><div class="uk-card uk-card-default"><div class="uk-card-header uk-padding-small">
                        <h4>Facebook Pixel - Global</h4>
                        </div><div class="uk-card-body uk-padding-small">`
                    },
                    {
                        el: 'textarea',
                        name: 'hotjar_tag',
                        value: props.hotjar_tag,
                        attr: 'rows="10"',
                    },
                    {
                        el: 'html',
                        html: `</div></div></div></div>`
                    },

                ]
            })
        }
    }
})

// Pipelines
const List = new Config({ action: 'get/pipelines' })
List.ListPipe()

// Modal Nova Pipeline
$('#content-modal-pipeline').prepend(`
<div class="uk-flex uk-flex-between uk-margin">
    <h3>Funil de Venda - Padrão</h3>
    <button type="button" class="uk-button uk-button-primary uk-button-small" id="btn-modal-create-pipe"><i class="fas fa-plus-circle"></i> Nova Coluna (Pipeline)</button>
    <div id="modal-create-pipe" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-padding-small">
            <h2 class="uk-modal-title">Nova Coluna (Pipeline)</h2>
            <p>As colunas irão aperecer nesse funil, basta cadastrar e após salvar ordenar como desejar</p>

            <div class="uk-margin">
                <div id="create-new-pipeline"></div>                                            
            </div>

            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Fechar</button>
                <button id="btn-create-new-pipeline" class="uk-button uk-button-primary" type="button">Salvar</button>
            </p>
        </div>
    </div>
</div>
`)

// Nova pipeline
lilooForms({
    selector: '#create-new-pipeline',
    path: path,
    action: 'create/new/pipeline',
    buttonSubmit: '#btn-create-new-pipeline',
    build: [
        {
            el: 'input',
            label: 'Nome da Coluna (Pipeline)',
            name: 'pipe_title',
            attr: 'required',
            parentClass: 'uk-margin'
        },
        {
            el: 'textarea',
            label: 'Breve descrição',
            name: 'pipe_description',
            attr: 'rows="3"',
        },
    ],
    success: function (res) {
        $('input[name="pipe_title"]').removeClass('uk-form-danger')
        if (res.reason == 'name_exists') {
            $('input[name="pipe_title"]').addClass('uk-form-danger').focus()
        }
        if (res.bool) {
            UIkit.modal('#modal-create-pipe').hide()
        }
        List.ListPipe()
    }
})

// Modal adicionar nova pipeline
$('#btn-modal-create-pipe').on('click', function () {
    UIkit.modal('#modal-create-pipe', {
        stack: true
    }).show()
})