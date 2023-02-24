$('#next-step').on('click', function(){
    let data = $(this).attr('data')
    let pipe = data.split(',')[0]
    let matrix = data.split(',')[1]
    lilooV3.Event({
        action: 'next/pipeline',
        path: 'modules/marketing/routes/pipe/ajax',
        data: JSON.stringify({pipe,matrix}),
        success: function(res){
            if(res.bool){
                window.location = lilooV3.Root()+'admin/marketing/pipe/'+(parseInt(pipe) + 1)+'/'+matrix+'/'
            }
        }
    })
    return false
})

$('#previous-step').on('click', function(){
    let data = $(this).attr('data')
    let pipe = data.split(',')[0]
    let matrix = data.split(',')[1]
    lilooV3.Event({
        action: 'previous/pipeline',
        path: 'modules/marketing/routes/pipe/ajax',
        data: JSON.stringify({pipe,matrix}),
        success: function(res){
            if(res.bool){
                window.location = lilooV3.Root()+'admin/marketing/pipe/'+(parseInt(pipe) - 1)+'/'+matrix+'/'
            }
        }
    })
    return false
})

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
        daysOfWeek: ["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],
        monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
    }
},
function (startDate) {
    var id = $(this).attr('id')
    lilooJS.Event({
        action: 'followup_update_datetime_pipeline',
        path: 'modules/agency/dash/routes/followup/ajax',
        data: {
            datetime: startDate.format('DD/MM/YYYY HH:mm'),
            matrix: id
        }
    })
})




$('[liloo-loader]').hide();



// $('[liloo-datetime-alter]').daterangepicker({
//     drops: 'auto',
//     buttonClasses: 'uk-button',
//     applyButtonClasses: 'uk-button-primary uk-button-small',
//     cancelButtonClasses: 'uk-button-default uk-button-small uk-margin-small-right',
//     timePicker: true,
//     timePicker24Hour: true,
//     timePickerIncrement: 15,
//     timePickerSeconds: false,
//     singleDatePicker: true,
//     // autoApply: true,
//     startDate: moment(),
//     minDate: moment(),
//     locale: { 
//         applyLabel: 'Aplicar',
//         cancelLabel: 'Cancelar',
//         format: "DD/MM/YYYY HH:mm",
//         separator: " - ",
//         daysOfWeek: ["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],
//         monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
//     }
// },
// function (startDate) {
//     lilooJS.Event({
//         action: 'followup_update_datetime_pipeline',
//         path: 'modules/agency/dash/routes/followup/ajax',
//         data: startDate.format('DD/MM/YYYY-HH:mm')
//     })
// })



/**
 * Verifica o Card não está na pipeline "Oportunidade"
 * Se não estiver gerencia o link para redirecionar 
 * para a rota "Project"
 */
//  function hrefCard( link, thisElement){
//     let Pipe = $(thisElement.parentNode).attr('id')
//     Pipe = Pipe.split('-')[1]
//     if(Pipe != 1){
//         window.location.href = link
//     }
// }