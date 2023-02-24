$('.tabular.menu .item').tab()

lilooV3.Event({
    action: 'brands/shop',
    path: 'modules/shop/ajax/brands',
    data: '',
    success: function (res) {
        let opts = ''
        res.output.forEach(val => {
            opts += `<option valeu="${val.brand_id}">${val.brand_name}</option>`
        })
        $('select[name="prod_weight_measure"]').html(opts)
    }
})


// lilooPlugin.Dropzone({
//     action: 'upload/files',
//     data: JSON.stringify({
//         meta: "cardapio",
//         module: "portal"
//     }),
//     typeFiles: '.pdf'
//     // path / folder / maxFiles / maxSize / typeFiles / multi / auto / resizeImage / qualityImage
// })