/**
 * Javascript Interface Route "Create"
 * @copy 15/12/2021 Felipe Oliveira Lourenço
 */

const Order = {

    /**
     * Checa se o Códido existe, se não salva e continua
     */
    Code: function(){
        let value = $('input[name="order_code"]').val()
        lilooJS.Event({
            action: 'check_order_code',
            path: 'modules/orders/ajax/OrderCreate',
            data: value
        })
    },

    /**
     * Checagem do clientes
     */
    Client: function(){
        let value = $('input[name="order_client_code"]').val()
        lilooJS.Event({
            action: 'check_order_client',
            path: 'modules/orders/ajax/OrderCreate',
            data: value
        })
    },


}


