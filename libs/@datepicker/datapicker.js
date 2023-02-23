/**
 * Abstração da biblioteca Datapicker 
 * Site oficial da documentação: 
 * @copyright Felipe Oliveira - 07.09.2022
 * @version 1.0.0
 */

$('head').append(`
    <!-- Daterangepicker -->    
    <link rel="stylesheet" type="text/css" href="${lilooV3.Root()}/libs/@datepicker/assets/css/datepicker.css">
    <script type="text/javascript" src="${lilooV3.Root()}/libs/@datepicker/assets/js/datepicker.js"></script>
    <script type="text/javascript" src="${lilooV3.Root()}/libs/@datepicker/assets/js/moment.min.js"></script>
    <script type="text/javascript" src="${lilooV3.Root()}/libs/@datepicker/assets/js/daterangepicker.min.js"></script>
`)

const lilooDatePicker = {

    /**
     * Range de Datas com opção de selecionar um intervalo entre a data inicial a final
     * @var element [Seletor, por padrão usa [liloo-daterange]]
     * @var opens [Visualização da Janela "left, center, right"]
     * @var drops [Visualização da Janela "down, up, auto"]
     */
    Range: function (Obj) {

        let objOpens = !Obj.opens ? 'center' : Obj.opens
        let objDrops = !Obj.drops ? 'auto' : Obj.drops
        let objElement = !Obj.element ? '[liloo-daterange]' : Obj.element

        $(objElement).daterangepicker({
            opens: objOpens,
            drops: objDrops,
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
                daysOfWeek: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            }
        })


    },

    /**
     * Calendario mostrando apenas um mes e com opção de horário     
     * @var element [Seletor, por padrão usa [liloo-daterange]]
     * @var opens [Visualização da Janela "left, center, right"]
     * @var drops [Visualização da Janela "down, up, auto"]
     */
    Datetime: function (Obj) {

        let objOpens = !Obj.opens ? 'center' : Obj.opens
        let objDrops = !Obj.drops ? 'auto' : Obj.drops
        let objElement = !Obj.element ? '[liloo-datetime]' : Obj.element

        $(objElement).daterangepicker({
            opens: objOpens,
            drops: objDrops,
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
            // $(this).val(startDate.format('L') + ' – ' + endDate.format('L'))
        })
    },

    /**
     * Calendario mostrando apenas um mes e com opção de horário     
     * @var element string [Seletor, por padrão usa [liloo-daterange]]
     * @var opens string [Visualização da Janela "left, center, right"]
     * @var drops string [Visualização da Janela "down, up, auto"]
     * @var minDate bool [Bloqueia datas anteriores ao dia atual, padrão false]
     */
     Date: function (Obj) {

        let objOpens = !Obj.opens ? 'center' : Obj.opens
        let objDrops = !Obj.drops ? 'auto' : Obj.drops
        let objElement = !Obj.element ? '[liloo-date]' : Obj.element
        let objMinDate = !Obj.minDate ? false : Obj.minDate

        if(objMinDate == false){
            $(objElement).daterangepicker({
                opens: objOpens,
                drops: objDrops,
                buttonClasses: 'uk-button',
                applyButtonClasses: 'uk-button-primary uk-button-small',
                cancelButtonClasses: 'uk-button-default uk-button-small uk-margin-small-right',
                singleDatePicker: true,
                startDate: moment(),
                locale: {
                    applyLabel: 'Aplicar',
                    cancelLabel: 'Cancelar',
                    format: "DD/MM/YYYY",
                    separator: " - ",
                    daysOfWeek: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                    monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                }
            })
        }else{
            $(objElement).daterangepicker({
                opens: objOpens,
                drops: objDrops,
                buttonClasses: 'uk-button',
                applyButtonClasses: 'uk-button-primary uk-button-small',
                cancelButtonClasses: 'uk-button-default uk-button-small uk-margin-small-right',
                singleDatePicker: true,
                // autoApply: true,
                startDate: moment(),
                minDate: moment(),
                locale: {
                    applyLabel: 'Aplicar',
                    cancelLabel: 'Cancelar',
                    format: "DD/MM/YYYY",
                    separator: " - ",
                    daysOfWeek: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                    monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                }
            })
        }

        
    }

}

/**
 * Renderização final
 */
const pickerRender = function(Obj){
        
    $(objElement).daterangepicker({
        opens: objOpens,
        drops: objDrops,
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
            daysOfWeek: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
            monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        }
    })
}

export { lilooDatePicker }