import { Render, Loop } from '../../../../libs/@liloo/render.js'
import { lilooUi } from '../../../../libs/@liloo/lilooUi.js'
import { lilooDrop } from '../../../../libs/@dropzone/dropzone.js'
import lilooCroppie from '../../../../libs/@croppie/croppie.js'
import lilooChart from '../../../../libs/@chartjs/chart.js'


lilooChart.Pie({
    element: 'liloo-chart',
    path: 'modules/accounts/routes/useraccount/ajax', // Requisição Ajax com os dados (opcional)
    action: 'chart/accounts/per/plan', // Action da requisição Ajax (opcional)
    label: 'Planos contratados',
    // data: 'test', // Corpo da requisição que será enviado junto com o Ajax
})


// lilooChart.Line({
//     data: '',
//     json: '',
//     request: ''
// })

lilooCroppie.Init({
    element: 'liloo-profile',
    preview: '#profile-preview',
    path: 'uploads/profiles/',
    namefile: 'profile',
    // sessioname: false,
    // type: 'square',
    // width: 500, 
    // height: 200,
    // resize: true,
    success: function () {
        UIkit.modal('#logo-edit').hide();
    }
})


lilooDrop.Canvas()
lilooDrop.Dropzone({
    auto: true,
    action: 'upload/files',
    data: JSON.stringify({
        meta: "banner",
        module: "portal"
    }),
    maxFiles: 1,
    maxSize: 5,
    typeFiles: "image/*",
    resizeImage: 1900,
    success: function (res) {
        lilooUi.Notify({
            type: res.type,
            message: 'Tudo certo'
        })
    }
})


lilooV3.Event({
    action: '',
    path: '',
    data: '',
    success: function(res){
        
    }
})

