/*!
  * Liloo JS v2.0 (https://cdn.liloo.com.br/)
  * Copyright Felipe Oliveira Lourenço - 07.10.2018
  * @version 2.0
  */


const lilooJS = {
  /**
   * Caminho absoluto para enviar ajax
   */
  Root: function () {
    return $('body').attr('root')
  },

  /**
    * Dispara o AJAX a partir dos parametros informados
    * @param {[string]} URL     [Para onde irÃ¡ mandar o POST]
    * @param {[json]} dataBuild [POST montado num JSON]
    */
  Sender: function (URL, dataBuild) {
    $.ajax({
      type: 'POST',
      url: URL,
      cache: false,
      data: dataBuild,
      dataType: 'json',
      beforeSend: function () {
        $('[liloo-loader]').show()
      },
      success: function (data) {
        console.log(data)
    
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

      }
    }).done(function (data) {
      if (data.redirect) { window.location.href = data.redirect; }
      $('[liloo-loader]').hide()
      let BtnSubmit = $('button[value-init-submit]').attr('value-init-submit')
      $('button[type=submit]').text(BtnSubmit)
    }).fail(function (data) {
      $('[liloo-loader]').hide()
      console.log('Falha ao receber Retorno do CRUD')
    });
  },

  /**
   * Faz a leitura do evente e prepara
   * para enviar a requisição por ajax
   * por padrão aceita POST
   */
  Event: function (obj) {
    action = !obj.action ? 'nda' : obj.action
    path = obj.path
    data = !obj.data ? null : obj.data
    // root = !obj.root ? true : obj.root
    let dataBuild = {
      alldata: { 
          0: {name: "action", value: action},
          1: {name: "path", value: path},
          2: {name: "data", value: data}
      }
    }
    // if (root === true) {
    //   var URL = lilooJS.Root() + path
    // } else {
    //   var URL = path
    // }
    var URL = lilooJS.Root() + path
    console.log(dataBuild)
    console.log(URL)
    lilooJS.Sender(URL, dataBuild)
  }
}

/**
 * Faz a leitura do formalário e prepara
 * para enviar a requisição por ajax
 * por padrão aceita POST
 */
$('[data-liloo]').on('submit', function (e) {
  e.preventDefault()

  // $('button[value-init-submit]').text('Aguarde…')
  let form = $(this)
  let Path = form.find('input[name="path"]').val()
  let alldata = form.serializeArray()
  let formURL = lilooJS.Root() + Path + '.php'
  let dataBuild = { alldata: alldata }

  console.log(dataBuild)
  lilooJS.Sender(formURL, dataBuild)

})