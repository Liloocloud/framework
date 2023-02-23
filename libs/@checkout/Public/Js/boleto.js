$(document).ready(function(){

    var container = $('.container');
    var btn_pagar_boleto = container.find('#btn-pagar-boleto');
    var mensagem_boleto = container.find('#mensagem-boleto');
    var hash = PagSeguroDirectPayment.getSenderHash();

    btn_pagar_boleto.on('click', function(event){
      event.preventDefault();

      var hash = PagSeguroDirectPayment.getSenderHash();

      $.ajax({
         url: 'App/Ajax/boleto.php',
         type: 'POST',
         data:'hash='+hash,
         beforeSend: function(){
          mensagem_boleto.html('Criando boleto, aguarde...');
         },
         success: function(data){
           window.location.href = data;
         }
      });
    });
});
