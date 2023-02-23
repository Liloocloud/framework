/*!
  * Liloo JS v3.0 (https://cdn.liloo.com.br/)
  * Copyright Felipe Oliveira Lourenço - 26.04.2022
  * @version 3.0.2
  * @update 12.05.2022
  */

const lilooV3 = {

    /**
     * Base URL
     */
    Root: () => {
        return document.querySelector('body').getAttribute('root')
    },

    /**
     * Realiza requisições simples sem data "Body" (sem enviar dados)
     * apenas espera o retorno
     */
    Simple: async (Obj) => {
        return fetch(lilooV3.Root() + Obj.path + '.php', {
            method: "POST",
            mode: "cors",
            cache: "no-store",
            headers: {
                "Content-Type": "application/json; charset=UTF-8"
            },
            body: JSON.stringify(Obj)
        })
        .then( response => response.json() )
        .then( data => Obj.success(data) )
        .catch( error => console.error('Error: ', error) )
    },

    /**
     * Prepa os valores para a requisição
     */
    Event: async (Obj) => {
        $('[liloo-loader]').show()
        let Path = Obj.path
        return fetch(lilooV3.Root() + Path + '.php', {
            method: "POST",
            // mode: "cors",
            // cache: "no-store",
            headers: {
                "Content-Type": "application/json; charset=UTF-8",
                // "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                // "Cache-Control": "public, max-age=31536000"
                'Access-Control-Allow-Origin': "*",
                // 'Access-Control-Max-Age': '86400'
            },
            // headers: { 'Content-Type': "application/json; charset=UTF-8" },
            body: JSON.stringify(Obj)
        })
            // Tratando a Promise (Requisição)
            .then(function (response) {
                if (!response.ok) {
                    throw Error('Erro ao executar requisição ' + response.statusText)
                }
                return response.json()
            })

            // Mostrando os Resultados
            .then(data => {  
                if (typeof data == 'string') {
                    data = JSON.parse(data)
                }
                // RETORNO PADRÃO CALLBACK
                if (data.callback) {
                    switch (data.type) {
                        case 'append': $('.callback').append(data.callback); break;
                        case 'prepend': $('.callback').prepend(data.callback); break;
                        default: $('.callback').html(data.callback); break;
                    }
                }
                // RETORNA POR ELEMENTO ID, CLASSE OU TAG
                if (data.element) {
                    switch (data.type) {
                        case 'append': $(data.element).append(data.content); break;
                        case 'prepend': $(data.element).prepend(data.content); break;
                        default: $(data.element).html(data.content); break;
                    }
                }
                // RETORNO EM ARRAY 
                if (data.array) {
                    $.each(data.array, function (key, value) {
                        switch (value.type) {
                            case 'append': $(value.element).append(value.content); break;
                            case 'prepend': $(value.element).prepend(value.content); break;
                            case 'input': $(value.element).val(value.content); break;
                            default: $(value.element).html(value.content); break;
                        }
                    });
                }
                // RETORNO NO SCRIPT_QUEUE
                if (data.script) {
                    $('.script_queue').html(data.script);
                }

                // RETORNO COM A NOTIFICAÇÃO PADRÃO DA PLATAFORMA
                if (data.notify) {
                    $('.callback').html(data.notify);
                }

                // RETORNO NO CONSOLE.LOG
                if (data.console) {
                    console.log(data.console)
                }

                // // Callback function
                if (typeof Obj.success != 'undefined') {
                    Obj.success(data)
                }

                return data
            })

            // Mostrando as Exceções
            .catch(error => {
                console.error(error)
            })
    },

    /**
     * Envia e formulários serializando os dados e 
     * retornando em callback function
     */
    Form: (Obj) => {
        $('[liloo-loader]').show()
        let serializeFormToObject = function (form) {
            var objForm = {};
            var formData = new FormData(form);
            for (var key of formData.keys()) {
                objForm[key] = formData.get(key);
            }
            return objForm;
        };
        lilooV3.Event({
            action: Obj.form.querySelector('input[name="action"]').value,
            path: Obj.form.querySelector('input[name="path"]').value,
            data: JSON.stringify(serializeFormToObject(Obj.form)),
            success: function(res){
                Obj.success(res)
            }
        })
        return false
    }

}


/**
 * Faz a leitura do formalário e prepara
 * para enviar a requisição por ajax
 * por padrão aceita POST
 */
$('[data-liloo-v3]').on('submit', function (e) {
    e.preventDefault()
    let form = $(this)
    var serializeFormToObject = function (form) {
        var objForm = {};
        var formData = new FormData(form);
        for (var key of formData.keys()) {
            objForm[key] = formData.get(key);
        }
        return objForm;
    };
    lilooV3.Event({
        action: form.find('input[name="action"]').val(),
        path: form.find('input[name="path"]').val(),
        data: JSON.stringify(serializeFormToObject(e.target))
    })
    $('[liloo-loader]').hide()
    return false
})


/**
 * Helper para uso geral no javascript
 */
const lilooUi = {

    /**
     * Notificação Uikit
     * @param {Object: [message, pos, time, type]} Obj 
     * @returns 
     */
    Notify: (Obj) => {
        let message = Obj.message
        let pos = !Obj.pos ? 'top-center' : Obj.pos
        let time = !Obj.time ? 3000 : Obj.time
        switch (Obj.type) {
            case 'success': type = 'success'; pre = '<b>Ok!</b> '; break;
            case 'info': type = 'primary'; pre = '<b>Info!</b> '; break;
            case 'alert': type = 'warning'; pre = '<b>Atenção!</b> '; break;
            case 'error': type = 'danger'; pre = '<b>Ops!</b> '; break;
        }
        UIkit.notification({
            message: pre + message,
            status: type,
            pos: pos,
            timeout: time
        });
        // Callback function
        if (Obj.done) {
            Obj.done()
        }
        return false
    },

    /**
     * Alert
     */
    Alert: (Obj) => {
        let el = !Obj.element ? '[liloo-alerts]' : Obj.element
        switch (Obj.type) {
            case 'error': type = 'uk-alert-danger'; break;
            case 'success': type = 'uk-alert-success'; break;
            case 'info': type = 'uk-alert-primary'; break;
            case 'alert': type = 'uk-alert-warning'; break;
        }
        $(el).html(`
        <div class="${type}" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>${Obj.message}</p>
        </div>
        `).show()
        // Callback function
        if (Obj.done) {
            Obj.done()
        }
    },

    /**
     * Redireciona após acontagem regressiva
     */
    RedirectCountDonw: (Obj) => {
        Obj.url
        Obj.element = 'liloo-countdown'
        Obj.seconds = 5
        setInterval(function () {
            if (Obj.seconds <= 0) {
                window.location.href = Obj.url
                return
            }
            $('.'+Obj.element).html('em ' + Obj.seconds + '...');
            console.log(Obj.seconds--)
        }, 1000)
    }

}

/**
 * Checagem de Dados para Evitar Requisições Desnecessárias
 */
const lilooCheck = {
    Email: function (email) {
        let res = /\S+@\S+\.\S+/
        return res.test(email)
    },
    Phone: function (phone) {
        let res = /^(?:\()[0-9]{2}(?:\))\s?[0-9]{4,5}(?:-)[0-9]{4}$/
        return res.test(phone)
    },
    /**
     * 
     * @param {string} str input ou campo a ser verificado
     * @param {string} force padrão exigido, sendo 'low - medium - high' por padrão high
     * @param {string} min número minimo de caracteres. Por padrão 8
     * @returns 
     */
    StrongPassword: function (str, min=8, force='high') {
        if(force == 'low' || force == 'medium' || force =='high'){
            if (str.length < min) {
                return {
                    bool: false,
                    message: 'A senha deve conter no mínimo 8 caracteres'
                };
            }
        }
        if(force == 'medium' || force =='high'){
            if(!/[A-Z]/.test(str)){
                return {
                    bool: false,
                    message: 'A senha deve conter letra maiúscula'
                };
            }
            if(!/[a-z]/.test(str)){
                return {
                    bool: false,
                    message: 'A senha deve conter letra minúscula'
                };
            }
            if(!/[0-9]/.test(str)){
                return {
                    bool: false,
                    message: 'A senha deve conter números'
                };
            }
        }       
        if(force == 'high'){
            if (!/[!|@|#|$|%|^|&|*|(|)|-|_]/.test(str)) {
                return {
                    bool: false,
                    message: 'A senha deve conter pelo menos 1 caracter especial como: \!\@\#\$\%\^\&\*\(\)\-\_'
                };
            }
        }    
        return {
            bool: true,
            message: 'Senha forte'
        };
    }
}

/**
 * Abstração dos Plugins
 */
const lilooPlugin = {
    Dropzone: function (Obj) {
        // Preparando as Variaveis            
        if (!Obj) { Obj = {} }
        var path = (!Obj.path) ? lilooV3.Root() + 'modules/uploads/routes/files/upload.php' : Obj.path
        var action = !Obj.action ? 'default' : Obj.action
        var folder = !Obj.folder ? 'uploads/' : Obj.folder
        var data = !Obj.data ? 'nda' : Obj.data
        var maxFiles = !Obj.maxFiles ? 5 : Obj.maxFiles
        var maxSize = !Obj.maxSize ? 10 : Obj.maxSize
        var typeFiles = !Obj.typeFiles ? "image/*, audio/*, video/*" : Obj.typeFiles
        var multi = !Obj.multi ? true : !Obj.multi
        var auto = !Obj.auto ? false : !Obj.auto
        var resizeImage = !Obj.resizeImage ? 650 : !Obj.resizeImage
        var qualityImage = !Obj.qualityImage ? 0.5 : !Obj.qualityImage

        // Template
        $('liloo-dropzone').html(`
        <div>
            <div class="dropzone-message-callback"></div>
            <form class="dropzone dropzone-this"  accept-charset="utf-8" enctype="multipart/form-data">
                <div class="fallback">
                    <input name="files" type="file" multiple />
                    <input type="hidden" name="token" valeu="qwert12345">
                </div>
            </form>
            <div class="dropzone-controls uk-flex uk-flex-between uk-flex-middle uk-margin-small">
                <div>
                    <button type="button" class="uk-button uk-button-primary" id="dropzone-button-upload">Adicionar</button>
                </div>
                <div>
                    <button type="button" class="uk-button uk-button-default" id="dropzone-button-clear" style="display: none;">Limpar</button>
                </div>
            </div>
        </div>
        `)

        // Inicia o Dropzone
        Dropzone.autoDiscover = false;
        // Dropzone.prototype.isFileExist = function (file) {
        //     var i;
        //     if (this.files.length > 0) {
        //         for (i = 0; i < this.files.length; i++) {
        //             if (this.files[i].name === file.name
        //                 && this.files[i].size === file.size
        //                 && this.files[i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
        //                 return true;
        //             }
        //         }
        //     }
        //     return false;
        // };

        // Dropzone.prototype.addFile = function (file) {
        //     file.upload = {
        //         progress: 0,
        //         total: file.size,
        //         bytesSent: 0
        //     };
        //     if (this.options.preventDuplicates && this.isFileExist(file)) {
        //         alert(this.options.dictDuplicateFile);
        //         return;
        //     }
        //     this.files.push(file);
        //     file.status = Dropzone.ADDED;
        //     this.emit("addedfile", file);
        //     this._enqueueThumbnail(file);
        //     return this.accept(file, (function (_this) {
        //         return function (error) {
        //             if (error) {
        //                 file.accepted = false;
        //                 _this._errorProcessing([file], error);
        //             } else {
        //                 file.accepted = true;
        //                 if (_this.options.autoQueue) {
        //                     _this.enqueueFile(file);
        //                 }
        //             }
        //             return _this._updateMaxFilesReachedClass();
        //         };
        //     })(this));
        // };
        const myDropzone = new Dropzone(".dropzone-this", {
            // $('.dropzone-this').dropzone({
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
            dictDefaultMessage: "Solte os arquivos aqui para enviar <br><br> <small>Tamanho máximo por arquivo: 10 Mb</small>",
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
                </div>`
            ,

            // Iniciar
            init: function () {
                var myDropzone = this
                // console.log(this.getQueuedFiles().length)

                // Botão de upload, só processa a fila depois de aperter "upload"
                $("#dropzone-button-upload").on("click", function () {
                    myDropzone.processQueue()
                    return false
                })

                // Após completar com sucesso o Uploads
                // myDropzone.on("successmultiple", function (file) {
                //     $('#dropzone-button-clear').show()
                //     $('#dropzone-button-clear').on("click", function () {
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
                $('#dropzone-button-clear').show()
                $('#dropzone-button-clear').on("click", function () {
                    myDropzone.removeAllFiles(file)
                    $('#dropzone-message-callback').html(``)
                    $('#dropzone-button-clear').hide()
                })
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
                    done('Arquivo é maior que 10MB')
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