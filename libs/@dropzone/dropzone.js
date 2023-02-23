/**
 * Abstração dos Plugins
 */
const lilooDrop = {

    /**
     * Renderiza o componente no elemento passado pelo parametro,
     * caso não seja indicado por padrão busca por 'liloo-dropzone' para renderizar
     */
    Canvas: (el) => {
        let element = el == null ? 'liloo-dropzone' : el
        $(element).html(`
        <link rel="stylesheet" href="${lilooV3.Root()}libs/@dropzone/custom.css">
        <div>
            <div class="dropzone-message-callback"></div>
            <form class="dropzone dropzone-this"  accept-charset="utf-8" enctype="multipart/form-data">
                <div class="fallback">
                    <input name="files" type="file" multiple />
                    <input type="hidden" name="token" valeu="qwert12345">
                </div>
            </form>
            <div class="dropzone-controls uk-flex uk-flex-between uk-flex-middle uk-margin-small">
            </div>
        </div>
        `)
        // return false
    },

    Dropzone: function (Obj) {

        // Preparando as Variaveis            
        if (!Obj) { Obj = {} }
        let el = (typeof Obj.el == 'undefined') ? 'liloo-dropzone' : Obj.el
        let before = (typeof Obj.before == 'undefined') ? '' : Obj.before
        let after = (typeof Obj.after == 'undefined') ? '' : Obj.after
        $(el).html(`
        ${before}
        <div>
            <div class="dropzone-message-callback-off"></div>
            <form class="dropzone dropzone-this"  accept-charset="utf-8" enctype="multipart/form-data">
                <div class="fallback">
                    <input name="files" type="file" multiple />
                    <input type="hidden" name="token" valeu="qwert12345">
                </div>
            </form>
            <div class="dropzone-controls uk-flex uk-flex-between uk-flex-middle uk-margin-small">
            </div>
        </div>
        ${after}
        `)

        var path = (!Obj.path) ? lilooV3.Root() + 'modules/uploads/routes/files/upload.php' : Obj.path
        var action = !Obj.action ? 'default' : Obj.action
        var folder = !Obj.folder ? 'uploads/' : Obj.folder
        var data = !Obj.data ? 'nda' : Obj.data
        var maxFiles = !Obj.maxFiles ? 5 : Obj.maxFiles
        var maxSize = !Obj.maxSize ? 10 : Obj.maxSize
        var typeFiles = !Obj.typeFiles ? "image/*, audio/*, video/*" : Obj.typeFiles
        var multi = !Obj.multi ? true : Obj.multi
        var auto = !Obj.auto ? false : Obj.auto
        var resizeImage = !Obj.resizeImage ? 650 : Obj.resizeImage
        var qualityImage = !Obj.qualityImage ? 0.5 : Obj.qualityImage

        Dropzone.autoDiscover = false;        
        const myDropzone = new Dropzone(".dropzone-this", {
            url: path, // URL da requisição PHP 
            paramName: "files", // "name" do input
            method: "post", // Método padrão de requisição
            uploadMultiple: multi, // Permitir Multiplos uploads
            autoProcessQueue: auto, // Bloquear auto upload
            parallelUploads: maxFiles, // Uplodas paralelos

            params: {
                path: path,
                action: action,
                data: data
                // folder: folder
            },

            maxFiles: maxFiles, // Máximo de arquivos permitidos para o upload
            maxFilesize: maxSize, // Tamanho máximo dos arquivo (x)MB
            maxThumbnailFilesize: maxSize, // Mostrar miniatura para arquivos com até (x)MB
            // Tipos de arquivos permitidos
            // acceptedFiles: ".png, .jpeg, .jpg, .gif, .mp3, .mp4, .wma, .mpg, .flv, .avi", 
            acceptedFiles: typeFiles,

            addRemoveLinks: true, // Botão remover por arquivo
            dictRemoveFile: '<i uk-icon="close"></i>', // Texto do botão remover arquivo
            dictCancelUpload: '<i uk-icon="ban"></i>', // Texto do botão de cancelar upload por arquivo
            dictDefaultMessage: `Solte os arquivos aqui para enviar <br><br> <small>Tamanho máximo por arquivo: ${maxSize} Mb</small>`,
            dictFallbackMessage: "Seu navegador não suporta a opção de arrastar e soltar",
            dictFileTooBig: "O arquivo execedeu o tamanho permitido",
            dictInvalidFileType: "Tipo de arquivo inválido",
            dictMaxFilesExceeded: "Você não pode enviar mais arquivos",
            dictUploadCanceled: "Upload Cancelado",
            // dictDuplicateFile: "Arquivo duplicado. Carregue outro arquivo",
            // preventDuplicates: true,

            resizeWidth: resizeImage,
            // resizeHeight: 350,
            resizeQuality: qualityImage,
            // resizeMethod: "crop",
            // resizeMimeType: 'image/jpeg',
            // image/*, audio/*, video/*
            // capture: 'microphone, camera',

            previewTemplate: `
                <div class="dz-preview dz-file-preview">
                    <div class="dz-image"><img data-dz-thumbnail /></div>
                <div class="dz-details">
                        <div class="dz-size"><span data-dz-size></span></div>
                    <div class="dz-filename"><span data-dz-name></span></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                <div class="dz-success-mark">
                        <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>Check</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#000"></path>
                        </g>
                        </svg>
                    </div>
                <div class="dz-error-mark">
                        <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>Error</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g stroke="#747474" stroke-opacity="0.198794158" fill="#000" fill-opacity="0.816519475">
                            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>
                            </g>
                        </g>
                        </svg>
                    </div>
                </div>
            `,

            // Iniciar
            init: function () {
                var myDropzone = this
                // console.log(this.getQueuedFiles().length)

                // Botão de upload, só processa a fila depois de aperter "upload"
                if(auto == false){
                    $('.dropzone-controls').html(`
                    <div>
                        <button type="button" class="uk-button uk-button-primary uk-button-small dropzone-button-upload">Adicionar</button>
                    </div>
                    <div>
                        <button type="button" class="uk-button uk-button-secondary uk-button-small dropzone-button-clear" style="display: none;">Limpar</button>
                    </div>
                    `)                    
                    $(".dropzone-button-upload").on("click", function () {
                        myDropzone.processQueue()
                        return false
                    })
                }

                // Após completar com sucesso o Uploads
                // myDropzone.on("successmultiple", function (file) {
                //     $('.dropzone-button-clear').show()
                //     $('.dropzone-button-clear').on("click", function () {
                //         myDropzone.removeAllFiles(file)
                //     })
                // })
            },

            // Renomeia o Arquivo
            // renameFile: function (file) {
            //     let newName = new Date().getTime() + '_' + file.name;
            //     return newName;
            // },

            // Dispara após o upload de todos os arquivos
            successmultiple: function (file) {
                $('.dropzone-button-clear').show()
                $('.dropzone-button-clear').on("click", function () {
                    myDropzone.removeAllFiles(file)
                    $('.dropzone-message-callback').html(``)
                    $('.dropzone-button-clear').hide()
                })

                // Callback Function
                Obj.success(file)
                if(Obj.clear){
                    myDropzone.removeAllFiles(file)
                    $('.dropzone-button-clear').hide()
                }
            },

            // Lança mensagem de Erro
            // error: function(file, msg) {
            // 	console.log(msg)
            // },

            // Quando o retorno obtiver Sucesso
            success: function (file, data) {
                console.log('Sucesso ao carregar arquivo')
                $('.dropzone-message-callback').html(`
                    <div class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p>Arquivos enviados com sucesso!</p>
                    </div>
                `)
                console.log(data)
                let resp = JSON.parse(data)
                if (resp.callback) {
                    $('.dropzone-message-callback').html(`
                        <div class="uk-alert-${resp.callback[1]}" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p>${resp.callback[0]}</p>
                        </div>
                    `)
                }
            },

            // Retorna com o Status dos arquivos carregados, se lançar um 
            // Erro em done() para a execução
            addedfiles: function (file, done) {
                // if(file.status == "added"){
                // 	done('Arquivo '+file.upload.filename+' foi adicionado com sucesso')
                // }
                if (file.size >= 1e+7) {
                    done(`Arquivo é maior que ${maxSize} MB`)
                }
            },

            // Quando exceder o total de arquivos
            maxfilesexceeded: function (file) {
                console.log('Excedeu 001')
                // console.log(file)

            },

            // Dispara quando o upload for completado
            // complete: function(file) {
            // 	$('.dropzone-message-callback').html(`
            // 		<div class="uk-alert-success" uk-alert>
            // 			<a class="uk-alert-close" uk-close></a>
            // 			<p>Arquivos enviados com sucesso!</p>
            // 		</div>
            // 	`)
            // 	this.removeFile(file)
            // },

            maxfilesreached: function (file) {
                console.log('Excedeu 002')
                // console.log(file)
                // $('.dropzone-message-callback').html(`
                // 	<div class="uk-alert-danger" uk-alert>
                // 		<a class="uk-alert-close" uk-close></a>
                // 		<p>Excedeu o limite de arquivos</p>
                // 	</div>
                // `)
            },

            // Retorno após completar o upload de todos os arquivos
            // completemultiple: function(file){
            // 	let active = false
            // 	if(active){
            // 		setTimeout(function(){
            // 			this.removeAllFiles(file)
            // 		}, 400)
            // 	}
            // }

        })
    }
}

$('head').append(`<link rel="stylesheet" href="${lilooV3.Root()}libs/@dropzone/custom.css">`)
export { lilooDrop }