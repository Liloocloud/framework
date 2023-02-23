/**
 * Components que busca o endereço pelo CEP da API da viacep
 * @copyright Felipe Oliveira Lourenço 07.05.2021
 * @version 1.0.0
 */

 $('[flex-form-zipcode]').html(`
 <input class="uk-input flex-zipcode" type="text" name="plugin_zipcode" required>\r\n
 <input type="hidden" name="pluging_district">\r\n
 <input type="hidden" name="pluging_city">\r\n
 <input type="hidden" name="pluging_address">\r\n
 <input type="hidden" name="pluging_state">\r\n
 <span id="address" style="display: none;">\r\n
 <div class="uk-card uk-card-default uk-card-body uk-padding-small"></div>\r\n
 </span>
 `)
 $('input[name="plugin_zipcode"]').on('keyup', function () {          		
 if( $(this).val().length === 9 ){
    var cep = $(this).val() //.replace('-', '').replace('.', '')
    if (cep.length === 9) {
        $.get("https://viacep.com.br/ws/" + cep + "/json", function (data) {
            if (!data.erro) {
                $('input[name="pluging_district"]').val(data.bairro)
                $('input[name="pluging_city"]').val(data.localidade)
                $('input[name="pluging_address"]').val(data.logradouro)
                $('input[name="pluging_state"]').val(data.uf)
                $('#address').show()
                $('#address div').html(`
                    <p>
                    ${data.logradouro}<br>
                    ${data.bairro}, 
                    ${data.localidade} - 
                    ${data.uf}
                    </p>`)
            }
        }, 'json')}}})