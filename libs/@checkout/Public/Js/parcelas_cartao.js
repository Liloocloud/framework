$(document).ready(function(){

        var container = $('.container');
        var form_fechar_pedido = container.find('#form-fechar-pedido');
        var bandeira = form_fechar_pedido.find('#bandeira');
        var parcelas = form_fechar_pedido.find('#parcelas');
        var parcelasCartao = container.find('#parcelas-cartao');
        var totalPagamento = 450;

        bandeira.on('change', function(){

                // pega bandeira do cartao e coloca com letras minusculas
                var brand = $(this).val().toLowerCase();

                // mostra uma mensagem de carregando no select e onde mostra as parcelas do cartao
                parcelasCartao.html('Carregando parcelas do cartão '+brand);
                parcelas.html('Carregando parcelas, aguarde..');

                PagSeguroDirectPayment.getInstallments({
                 amount: totalPagamento,
                 maxInstallmentNoInterest: 4, //numero de parcelas sem juros, pode passar como variavel vinda do form
                 brand: brand,
                 success: function(response){

                    numeral.language('pt-br');
                    var numeroParcelas = '';
                    var juros = '';
                    var numeroParcela = '';
                    var numeroParcelasSelect = '';

                    var installment = response.installments[brand];
                    $.each(installment, function(key,value){
                        juros = (value.interestFree == true) ? 'sem juros' : 'com juros';
                        numeroParcelas += '<div style="margin-bottom:5px;">'+value.quantity+' parcela: '+numeral(value.installmentAmount).format('$ 0,0.00')+' '+juros+'</div>';
                        numeroParcelasSelect += '<option value='+value.quantity+'>'+value.quantity+'x de '+numeral(value.installmentAmount).format('$ 0,0.00')+' '+juros+'</option>';
                    });
                    parcelasCartao.html(numeroParcelas);
                    parcelas.html(numeroParcelasSelect);
                 },
                 error: function(response){
                   console.log(response);
                 }
              });
        });
});
