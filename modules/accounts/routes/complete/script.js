// Plugin CEP
$('input[name="company_zipcode"]').on('keyup', function () {
    if ($(this).val().length === 9) {
        var cep = $(this).val()
        if (cep.length === 9) {
            $.get("https://viacep.com.br/ws/" + cep + "/json", function (data) {
                if (!data.erro) {
                    $('input[name="company_district"]').val(data.bairro)
                    $('input[name="company_city"]').val(data.localidade)
                    $('input[name="company_address"]').val(data.logradouro)
                    $('input[name="company_state"]').val(data.uf)
                }
            }, 'json')
        }
    }
})


// Botão Busca CEP
$('.flex-busca-cep').on('click', function () {
    let URL = 'http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
    window.open(URL, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes')
})