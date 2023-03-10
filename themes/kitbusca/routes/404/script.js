$('.alter_search').on('click', function () {
    $('.form_dig').show()
    $('.form_dig input[name="term"]').focus()
    $('.alter_term').show()
    $('.form_cat').hide()
    $('.alter_search').hide()
})
$('.alter_term').on('click', function () {
    $('.form_dig').hide()
    $('.alter_term').hide()
    $('.form_cat').show()
    $('.alter_search').show()
})

// LISTA CIDADES APÓS SELECIONAR ESTADO
$('.select_groups').on('change', function () {
    var group = $(this).val();
    Flex.RequestServer(
        'list_service_per_group',
        'frontend/vamove/_php/Frontend',
        '' + group + '',
        true
    )
})