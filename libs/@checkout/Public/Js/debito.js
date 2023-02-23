$(document).ready(function(){

    var container = $('.container');
    var btn_pagar_boleto = container.find('#btn-pagar-debito');
    var mensagem_debito = container.find('#mensagem-debito');

    btn_pagar_boleto.on('click', function(event){
      event.preventDefault();

      var hash = PagSeguroDirectPayment.getSenderHash();

      $.ajax({
         url: 'App/Ajax/debito.php',
         type: 'POST',
         data:'hash='+hash,
         beforeSend: function(){
          mensagem_debito.html('Aguarde, estamos te enviando para finalizar o pagamento...');
         },
         success: function(data){
          console.log(data);
           // window.location.href = data;
         }
      });
    });
});
