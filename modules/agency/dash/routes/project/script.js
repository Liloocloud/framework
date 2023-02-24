/**
 * Automação da Rota 'reports-contacts'
 */

/** Se não existir sesssão cria */
// sessionStorage.removeItem('lastname');
// sessionStorage.clear();
// alert(sessionStorage.getItem('dateRangeInit'));
if (sessionStorage.getItem('dateRangeInit')) {
    var date = sessionStorage.getItem('dateRangeInit')
    $('[liloo-daterange]').val(date)
} else {
    var dateInit = moment().subtract(6, 'days').format('DD/MM/YYYY')
    var dateFinal = moment().format('DD/MM/YYYY')
    var date = dateInit + ' - ' + dateFinal
    sessionStorage.setItem('dateRangeInit', date)
    $('[liloo-daterange]').val(date)
}

/**
 * Coleta os Dados de Inicio
 */
lilooJS.Event({
    action: 'report_all_data',
    path: 'modules/marketing/ajax/Manager',
    data: date
})

/**
 * Alteração da Data
 */
$('[liloo-daterange]').on('change', function () {
    var date = $(this).val()
    lilooJS.Event({
        action: 'report_daterange_session',
        path: 'modules/marketing/ajax/Manager',
        data: date
    })
})

/** 
 * Abre o GEO IP em uma nova página 
 */
function windowIP(ip){
    varWindow = window.open (
    'https://www.geolocation.com/pt?ip='+ip+'#ipresult',
    'page',
    "width=450, height=350, top=250, left=300, scrollbars=no " );
    return false
}    

/**
 * Ao clicar no botão filtrar
 */
$('#init-filter').on('click', function(){
    $('input[name="daterange_principal"]').focus()
    return false
})

/**
 * Abre a modal correspondente. Ideal para usar em 'div'
 */
function modalChannelData(modal){
    UIkit.modal(modal).toggle();
    // let min = Math.ceil(1000);
    // let max = Math.floor(9999);
    // let id  = Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Intervalo para recerregar apágina
 */
// setInterval(function(){
//     document.location.reload(true)
// }, 150000);
