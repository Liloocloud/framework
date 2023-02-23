/** 
 * Sistema de edição de imagens
 * @copyright 26.03.2018 - Felipe Oliveira Lourenço
 * @version 1.0.0
 */


 /**
  * Inicia o Croppie com as propriedades padrões
  */
const PluginLilooCroppie = {

  /**
   * Passa as configurações do plugin
   */
  Settings: function(){
    
  },



}

console.log(PluginLilooCroppie)

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:220,
      height:220,
      type:'circle' //circle //square
    },
    boundary:{
      width:350,
      height:350
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('Envio completo');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        type: "POST",
        async: true,
        url:"../_Plugins/profile-editor/upload.php",
        data:{"image": response},
        cache: false,
        dataType: "html",
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          window.location.reload();
          //$('#uploaded_image').html('<img src="'+data+'" />');
          //console.log(data);
        }
      });
    })
  });
