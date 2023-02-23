// Contador de segundos
var user = $('.email').val()
send = ''
if(user != '') send = '?user='+user
lilooUi.RedirectCountDonw({
    url: lilooV3.Root()+'conta/login/'+send,
    element: 'liloo-countdown',
    seconds: 5
})
