import { Render, Loop } from '../../../../libs/@liloo/render.js'
import { lilooUi } from '../../../../libs/@liloo/lilooUi.js'
import { lilooDrop } from '../../../../libs/@dropzone/dropzone.js'

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
    typeFiles:  "image/*",
    resizeImage: 1900,
    success: function(res){
        lilooUi.Notify({
            type: 'success',
            message: 'Tudo certo'
        })
    }
})