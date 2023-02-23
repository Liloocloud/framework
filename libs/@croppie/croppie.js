import './assets/js/croppie.min.js'

var PathRoot = lilooV3.Root() + 'libs/@croppie/'

/**
 * @var {element} = Qual tag ou class html deseja selecionar
 * @var {path} = Nome da pasta (caminho) onde deseja salvar a imagem cropada
 * @var {namefile} = Atribui um novo nome
 * @var {extension} = Nova extensão do arquivo cropado 'jpeg, png, jpg'
 * @var {type} = Modelo do canvas 'circle ou square' para cortar a imagem
 * @var {width} = Nova largura da imagem
 * @var {height} = Nova altura da imagem
 */
const lilooCroppie = {

    Init: function (Obj) {
        let element = (typeof Obj.element == 'undefined') ? 'liloo-profile' : Obj.element
        let typeObj = (typeof Obj.type == 'undefined') ? 'circle' : Obj.type
        let widthObj = (typeof Obj.width == 'undefined') ? 200 : Obj.width
        let heightObj = (typeof Obj.height == 'undefined') ? 200 : Obj.height
        let pathObj = (typeof Obj.path == 'undefined') ? 'uploads/profiles/' : Obj.path
        let namefileObj = (typeof Obj.namefile == 'undefined') ? 'profile' : Obj.namefile
        let sessionameObj = (typeof Obj.sessioname == 'undefined') ? true : Obj.sessioname
        let extensionObj = (typeof Obj.extension == 'undefined') ? 'png' : Obj.extension
        let resizeObj = (typeof Obj.resize == 'undefined') ? false : Obj.resize
        let previewObj = (typeof Obj.preview == 'undefined') ? '#croppie-preview' : Obj.preview
        let Rand = Math.floor(Math.random() * 101)

        $('head').append(`<link rel="stylesheet" type="text/css" href="${PathRoot}assets/css/croppie.css">`)
        $(element).html(`
        <div class="profile-editor">           
            <input type="file" id="upload_image${Rand}" class="form-control up_img${Rand}"/>
            <label for="upload_image${Rand}" class="uk-button uk-button-primary uk-button-small" style="margin-top: 0">Carregar Imagem</label>
            <button type="button" id="upload_rotate_undo" class="uk-button uk-button-primary uk-button-small"><i class="undo alternate icon"></i></button>
            <button type="button" id="upload_rotate_redo" class="uk-button uk-button-primary uk-button-small"><i class="redo alternate icon"></i></button>
            <button type="button" id="upload_crop" class="uk-button uk-button-primary uk-button-small">Salvar</button>
        </div>
        `)

        const Profile = new Croppie(document.querySelector(element) , {
            viewport: { width: widthObj, height: heightObj, type: typeObj },
            boundary: { width: (widthObj + 150), height: (heightObj + 150) },
            // enableZoom: false,
            enableExif: false,
            enableResize: resizeObj,
            enableOrientation: true,
            forceBoundary: true,
            // showZomer: false
        })

        // Ao trocar a imagem a ser editada
        $(element + ' .up_img' + Rand).on('change', function () {
            var input = document.querySelector(element + ' .up_img' + Rand).files[0]
            var Reader = new FileReader()          
            Reader.readAsDataURL(input)
            Reader.onload = function (event) {               
                Profile.bind({
                    url: event.target.result
                }).then(function () {
                    console.log('Envio completo')
                })
            }
            return false
        })

        // Rotacinar sentido anti-horário
        $(element + ' #upload_rotate_undo').on('click', function(){
            Profile.rotate(90)
        })

        // Rotacinar sentido horário
        $(element + ' #upload_rotate_redo').on('click', function(){
            Profile.rotate(-90)
        })

        // Resultado a imagem cortada
        $(element + ' #upload_crop').on('click', function(){
            var dimmer = $('.callback-dimmer')
            dimmer.addClass('dimmer')
            Profile.result(
                { 
                    type: 'canvas',
                    size: 'viewport', 
                    format: 'png', 
                })
                .then(function(file) {           
                    lilooV3.Event({
                        path: 'libs/@croppie/upload',
                        action: '',
                        data: {
                            image: file, 
                            path: pathObj,
                            namefile: namefileObj,
                            extension: extensionObj,
                            sessioname: sessionameObj
                        },
                        success: function (res) {
                            if(res.bool == true){
                                $(previewObj).html(`<img src="${file}" alt="">`)
                            }
                            dimmer.removeClass('dimmer')
                            $('[liloo-loader]').hide()
                            if(typeof Obj.success != 'undefined'){
                                Obj.success()
                            }
                        }
                    })
                }
            )
        return false
        })    
    return false
    }
}
export default lilooCroppie