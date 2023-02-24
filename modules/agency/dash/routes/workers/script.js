/*
 * Rota: Workers
 * File: script.js
 * Descrição: Interatividade com a Rota followup
 */

/**
 * Enviando form e obentendo resultado para apresentar no HTML
 * utilizando o metodo lilooV3.Form()
 */
$('#search-workers').on('submit', function (e) {
    e.preventDefault()
    let search = $('input[name="worker_search"]').val()
    $('input[name="worker_search"]').removeClass("uk-form-danger")
    if (search) {
        lilooV3.Form({
            form: this,
            success: function (res) {
                $('#agency_workers_list').html('')
                res.forEach((val) => {
                    $('#agency_workers_list').prepend(`
                    <li onclick="modalChannelData('.uk-modal-full','${val.account_id}')">
                        <div class="uk-flex uk-flex-between">
                            <div>
                                ${val.account_name} ${val.account_lastname}<br>
                                ${val.account_email}<br>
                                ${val.account_phone}
                            </div>
                            <div>
                                <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('${val.account_id}')"></button>
                                <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('${val.account_id}')"></button>
                            </div>
                        </div>							
                    </li>
                    `)
                })
                $('[liloo-loader]').hide()
            }
        })
    } else {
        $('input[name="worker_search"]').addClass("uk-form-danger").focus()
        lilooUi.Notify({
            message: 'Campo vazio',
            type: 'alert'
        })
    }
    return false
})

/**
 * Abrindo Janela modal para apresentar as informações
 */
function modalChannelData(modal, id) {
    lilooV3.Event({
        action: 'agency/workers/modal',
        path: 'modules/agency/dash/routes/workers/ajax',
        data: id,
        success: function(data){
            data = data[0]
            console.log(data)
            $(modal + ' .modal-title').html(data.categ_title.split(", ",1))
            $(modal + ' .categ_title').html(data.categ_title.replaceAll(", ","<br>"))
            $(modal + ' .account_name').html(data.account_name)
            $(modal + ' .account_lastname').html(data.account_lastname)
            $(modal + ' .account_id').html(data.account_id)
            $(modal + ' .account_phone').html(data.account_phone)
            $(modal + ' .account_email').html(data.account_email)
            $(modal + ' .account_cpf').html(data.account_cpf)
        }
    })
    UIkit.modal(modal).toggle();  
    return false
}



/**
 * Editar Colaborador
 */
function workerEdit(id) {
    lilooJS.Event({
        action: 'agency/workers/button/edit',
        path: 'modules/agency/dash/routes/workers/ajax',
        data: id
    })
    return false
}


/**
 * Deletar Colaborador
 */
function workerDelete(id) {
    lilooJS.Event({
        action: 'agency/workers/button/delete',
        path: 'modules/agency/dash/routes/workers/ajax',
        data: id
    })
    return false
}



$('[liloo-datetime-alter]').daterangepicker({
    drops: 'auto',
    buttonClasses: 'uk-button',
    applyButtonClasses: 'uk-button-primary uk-button-small',
    cancelButtonClasses: 'uk-button-default uk-button-small uk-margin-small-right',
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 15,
    timePickerSeconds: false,
    singleDatePicker: true,
    // autoApply: true,
    startDate: moment(),
    minDate: moment(),
    locale: {
        applyLabel: 'Aplicar',
        cancelLabel: 'Cancelar',
        format: "DD/MM/YYYY HH:mm",
        separator: " - ",
        daysOfWeek: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
        monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    }
},
    function (startDate) {
        var id = $(this).attr('id')
        lilooJS.Event({
            action: 'followup_update_datetime_pipeline',
            path: 'modules/agency/dash/routes/workers/ajax',
            data: {
                datetime: startDate.format('DD/MM/YYYY HH:mm'),
                matrix: id
            }
        })
    })

/**
 * Verifica o Card não está na pipeline "Oportunidade"
 * Se não estiver gerencia o link para redirecionar 
 * para a rota "Project"
 */
function hrefCard(link, thisElement) {
    let Pipe = $(thisElement.parentNode).attr('id')
    Pipe = Pipe.split('-')[1]
    if (Pipe != 1) {
        window.location.href = link
    }
}