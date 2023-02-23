$(document).ready(function(){

    var container = $('.container');
    var form_fechar_pedido = container.find('#form-fechar-pedido');
    var divBandeiras = form_fechar_pedido.find('#bandeira');
    var divBancos = container.find('.bancos');

$.ajax({

    url: '/App/Ajax/fechar_pedido.php',
    dataType: 'json',
    type: 'GET',
    success: function(data){

    var idSession = data.id;
    PagSeguroDirectPayment.setSessionId(idSession);

    PagSeguroDirectPayment.getPaymentMethods({
        success: function(response) {

            var bancos = '';
            var bandeiras = '';

            $.each(response.paymentMethods.CREDIT_CARD.options, function(key,value){
                bandeiras+= '<option value='+value.name+'>'+value.name+'</option>';
                bancos+= '<div class="two wide column">'+value.name+'<br /> <img src=https://stc.pagseguro.uol.com.br/'+value.images.SMALL.path+' />'+'</div>';
            });
            divBancos.html(bancos);
            divBandeiras.html(bandeiras);
        },
        error: function(response){
        }
    });

    }
});

});
