<?php require 'Config/config.php';  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout Transparente</title>
    <link rel="stylesheet" href="Public/Css/semantic.min.css">
    <link rel="stylesheet" href="Public/Css/tab.min.css">
</head>
<body>

<div class="container" style="width:800px;margin:0 auto;">
    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Pagar com cartão</a>
      <a class="item" data-tab="second">Pagamento em débito</a>
      <a class="item" data-tab="third">Pagar com boleto</a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first">
       <form class="ui form" id="form-fechar-pedido">
          <div class="fields">
                <div class="field">
                  <label>Número do cartão</label>
                  <input type="text" id="numero" placeholder="número" value="4111111111111111">
                </div>
                <div class="field">
                  <label>Nome no cartão</label>
                  <input type="text" id="nome" placeholder="nome" value="Alexandre Cardoso">
                </div>
                <div class="field">
                  <label>CVV</label>
                  <input type="text" id="digitos" placeholder="dígitos" value="123">
                </div>
            </div>

            <div class="fields">
                <div class="field">
                  <label>Validade Mês</label>
                  <input type="text" id="validade-mes" placeholder="mês validade" value="12">
                </div>
                <div class="field">
                  <label>Validade Ano</label>
                  <input type="text" id="validade-ano" placeholder="ano validade" value="2030">
                </div>
                <div class="field">
                  <label>Cartão</label>
                  <select id="bandeira" class="ui fluid dropdown">
                      <option value="">Escolha um cartão</option>
                  </select>
                </div>
                <div class="field">
                  <label>Parcelas</label>
                  <select id="parcelas" class="ui fluid dropdown">
                   <option value-"">Escolha um cartão</option>
                 </select>
                </div>
          </div>
          <div style="margin-bottom:10px;">
              <b>*R$ 450,00 a vista ou em até 4x sem juros de R$ <?php echo number_format(450/4,2,',','.'); ?></b>
          </div>
          <div class="ui divider"></div>
          <div style="margin-bottom:10px;" id="parcelas-cartao">
              Escolha um cartão para ver o número de parcelas com e sem juros
          </div>
          <div class="ui divider"></div>
          <button class="ui green button" id="btn-fechar-pedido" tabindex="0">Fechar Pedido</button>
       </form>
          <div id="status-fechar-pedido"></div>
          <div class="ui divider"></div>
          <h3>Cartões Aceitos</h3>
        <div>
            <div class="ui grid container bancos" style="margin-top:10px;font-size:11px;text-align:center;">
            </div>
        </div>

    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
      <div id="mensagem-debito"></div>
      <h2>Pagar com debito</h2>
      <p>Clique no botão abaixo para pagar com debito online.</p>
      <a href="" class="ui green button" id="btn-pagar-debito">Pagar com débito</a>
    </div>
    <div class="ui bottom attached tab segment" data-tab="third">
    <div id="mensagem-boleto"></div>
      <h2>Pagar com boleto</h2>
      <p>Clique no botão abaixo para pagar com boleto.</p>
      <a href="" class="ui green button" id="btn-pagar-boleto">Pagar com boleto</a>
    </div>
</div>
<script src="Public/Js/jquery.js"></script>
<script type="text/javascript" src=
"https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
</script>
<script src="Public/Js/tab.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
<script src="Public/js/tab-site.js"></script>
<script src="Public/js/boleto.js"></script>
<script src="Public/js/debito.js"></script>
<script src="Public/js/languages/pt-br.js"></script>
<script src="Public/js/erros_pagseguro.js"></script>
<script src="Public/js/fechar_pedido_cartao.js"></script>
<script src="Public/js/listar-bandeiras.js"></script>
<script src="Public/js/parcelas_cartao.js"></script>

</body>
</html>
