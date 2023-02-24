/**
 * Arquivo Javascript específico do módulo Payment
 * Recursos e funcionalidades para Design UI
 * @copyright Felipe Oliveira Lourenço 14.07.2020
 * @version  1.0.0
 */

 var PaymentFlex = {

 	/**
 	 * Captura o Banderia do Cartão de Crédito
 	 * @param  {[string]} cardnumber [Número do Cartão de Crédito]
 	 * @return {[view]}            [Mostra a bandeira utilizada]
 	 */
 	 getCardFlag: function(cardnumber) {
 	 	var CardFlag = cardnumber.replace(/[^0-9]+/g, '');
 	 	var cards = {
 	 		visa      : /^4[0-9]{12}(?:[0-9]{3})/,
 	 		mastercard : /^5[1-5][0-9]{14}/,
 	 		diners    : /^3(?:0[0-5]|[68][0-9])[0-9]{11}/,
 	 		amex      : /^3[47][0-9]{13}/,
 	 		discover  : /^6(?:011|5[0-9]{2})[0-9]{12}/,
 	 		hipercard  : /^(606282\d{10}(\d{3})?)|(3841\d{15})/,
 	 		elo        : /^((((636368)|(438935)|(504175)|(451416)|(636297))\d{0,10})|((5067)|(4576)|(4011))\d{0,12})/,
 	 		jcb        : /^(?:2131|1800|35\d{3})\d{11}/,       
 	 		aura      : /^(5078\d{2})(\d{2})(\d{11})$/     
 	 	};
 	 	for (var flag in cards) {
 	 		if(cards[flag].test(CardFlag)) {
                return flag;
                console.log(flag)
            }
        }       
        return false;
    },

    /** Botão de comprar */
     addItem: function(itemID){
     	Flex.RequestServer(
     		'order_add_item',
     		'_Modules/payment/_php/ManagerOrders',
     		itemID,
     		true
     		)
     }

     /**  */


 }


