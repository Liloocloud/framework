var erros = new Array();
erros[10000]='Cartão de crédito inválido';
erros[10001]='O número do cartão está errado';        
erros[10002]='Formato da data é inválido';
erros[10003]='Campo se segurança inválido';
erros[10004]='Cvv é obrigatório';
erros[10006]='Número do campo se segurança é inválido';
erros[53004]='Quantidade de itens inválido';
erros[53005]='É obrigatório configurar a moeda usada';
erros[53006]='Moeda inválida';

function mostrarErros(response){
     var errosCartao = '';
     $.each(response.errors, function(key,value){
         errosCartao += erros[key]+'<br />';           
    });
     return '<div style="margin-top:10px;" class="ui red message">'+errosCartao+'</div>';
}
