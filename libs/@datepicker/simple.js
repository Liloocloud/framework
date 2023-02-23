// Range de Datas com opção de selecionar
$('[liloo-daterange]').daterangepicker({
    opens: 'left',
    buttonClasses: 'uk-button',
    applyButtonClasses: 'uk-button-primary uk-button-small',
    cancelButtonClasses: 'uk-button-default uk-button-small uk-margin-small-right',
    alwaysShowCalendars: true,
    showCustomRangeLabel: false,
    startDate: moment().subtract(6, 'days'),
    endDate: moment(),
    ranges: {
        'Hoje': [moment(), moment()],
        'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
        'Últimos 14 Dias': [moment().subtract(13, 'days'), moment()],
        'Últimos 30 Dias': [moment().subtract(29, 'days'), moment()],
        'Este Mês': [moment().startOf('month'), moment().endOf('month')],
        'Último Mês': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    locale: { 
        applyLabel: 'Aplicar',
        cancelLabel: 'Cancelar',
        format: "DD/MM/YYYY",
        separator: " - ",
        daysOfWeek: ["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],
        monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
    }
})

// Calendario mostrando apenas um mes e com opção de horário
$('[liloo-datetime]').daterangepicker({
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
    console.log('datepicker/js/main.js line #56')
    // $(this).val(startDate.format('L') + ' – ' + endDate.format('L'))
})