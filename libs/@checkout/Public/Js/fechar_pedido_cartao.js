$(document).ready(function () {
  var container = $('.container');
  var form_fechar_pedido = container.find('#form-fechar-pedido');
  var btn_fechar_pedido = form_fechar_pedido.find('#btn-fechar-pedido');

  btn_fechar_pedido.on('click', function (event) {
    event.preventDefault();
    var numero = form_fechar_pedido.find('#numero').val();
    var bandeira = form_fechar_pedido.find('#bandeira').val();
    var codigo = form_fechar_pedido.find('#digitos').val();
    var validade_mes = form_fechar_pedido.find('#validade-mes').val();
    var validade_ano = form_fechar_pedido.find('#validade-ano').val();
    var numeroParcelas = form_fechar_pedido.find('#parcelas').val();
    var hash = PagSeguroDirectPayment.getSenderHash();
    var statusFechamentoPedido = container.find('#status-fechar-pedido');

    //obter a bandeira
    var bin = numero.substring(0, 6);
    PagSeguroDirectPayment.getBrand({
      cardBin: bin,

      success: function (response) {
        console.log(response);
        var brand = response.brand.name;
        getToken(numero, brand, codigo, validade_mes, validade_ano, hash);
      },
      error: function (response) {
        var errosCartao = mostrarErros(response);
        statusFechamentoPedido.html(errosCartao);
      },
    });

    // gerar token e pegar o numero de parcelas
    function getToken(numero, brand, codigo, validade_mes, validade_ano, hash) {
      PagSeguroDirectPayment.createCardToken({
        cardNumber: numero,
        brand: brand,
        cvv: codigo,
        expirationMonth: validade_mes,
        expirationYear: validade_ano,
        success: function (response) {
          var parcelas = numeroParcelas == 1 ? 1 : numeroParcelas;
          fecharPedido(450, parcelas, brand, response.card.token, hash);
        },
        error: function (response) {
          //erros relacionados ao cartao, como data errada e codigo validacao
          var errosCartao = mostrarErros(response);
          statusFechamentoPedido.html(errosCartao);
        },
      });
    }

    //fechar pedido com numero de parcelas
    function fecharPedido(totalPagamento, parcelas, brand, token, hash) {
      PagSeguroDirectPayment.getInstallments({
        amount: totalPagamento,
        maxInstallmentNoInterest: 4, //numero de parcelas sem juros, pode passar como variavel vinda do form
        brand: brand,
        success: function (response) {
          $.ajax({
            url: 'App/Ajax/checkout.php',
            type: 'POST',
            data:
              'tokenCartao=' +
              token +
              '&bandeira=' +
              brand +
              '&parcelas=' +
              parcelas +
              '&hash=' +
              hash +
              '&valorParcela=' +
              response.installments[brand][parcelas - 1]['installmentAmount'],
            beforeSend: function () {
              statusFechamentoPedido.html(
                '<div style="margin-top:20px;" class="ui yellow message">Aguarde enquanto verificamos os dados do seu cartão...</div>'
              );
            },
            success: function (data) {
              console.log(data);
              if (data == 1) {
                statusFechamentoPedido.html(
                  '<div style="margin-top:10px;" class="ui success message">Seu pedido foi feito com sucesso, quando o pagseguro liberar o pagamento você será noticiado e seu produto liberado !</div>'
                );
              } else if (data == 2) {
                statusFechamentoPedido.html(
                  '<div style="margin-top:10px;" class="ui success message">Seu pagamento está em análise, quando o pagseguro liberar o pagamento você será noticiado e seu produto liberado !</div>'
                );
              } else if (data == 3) {
                statusFechamentoPedido.html(
                  '<div style="margin-top:10px;" class="ui success message">Seu pagamento foi efetuado com sucesso, você acabou de receber um e-mail confirmando, e seu produto foi liberado</div>'
                );
              }
            },
          });
        },
        error: function (response) {
          var errosCartao = mostrarErros(response);
          statusFechamentoPedido.html(errosCartao);
        },
      });
    }
  });
});
