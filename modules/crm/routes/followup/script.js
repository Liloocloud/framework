/**
 * Rota: followup
 * File: script.js
 * Descrição: Interatividade com a Rota followup
 */

/**
 * Retorno da alteração da data dos cards
 */
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


// $('[liloo-datetime-alter]').on('click', function(){
//     alert('fdsf')
// })
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

/**
 * Drag and Drop dos Cartões, enviando os dados via Ajax 
 * para Atualização das ordens no banco de dados. Feito
 * com a biblioteca do JQuery
 */
$(".connectedSortable").sortable({
    connectWith: ".connectedSortable",
    update: function () {
        var Pipeline = $(this).attr("id");
        MatrixOrder = [];
        $(this).children('li').each(function (idx, elm) {
           MatrixOrder.push(elm.id)
        });
        lilooJS.Event({
            action: 'followup_alter_pipeline',
            path: 'modules/agency/dash/routes/followup/ajax',
            data: {MatrixOrder,Pipeline}
        })
        $('[liloo-loader]').hide();
    }
}).disableSelection();

/**
 * Verifica o Card não está na pipeline "Oportunidade"
 * Se não estiver gerencia o link para redirecionar 
 * para a rota "Project"
 */
function hrefCard( link, thisElement){
    let Pipe = $(thisElement.parentNode).attr('id')
    Pipe = Pipe.split('-')[1]
    if(Pipe != 1){
        window.location.href = link
    }
}

/**
 * Ao clicar rotaciona o card
 */
// $(".liloo-overflow .list ul li").on('dragstart', function () {
//     $(this).toggleClass("liloo-click-rotate");
// });
// $(".liloo-overflow .list ul li").on('mouseup', function () {
//     $(this).toggleClass("liloo-click-rotate");
// });




$('[liloo-loader]').hide();