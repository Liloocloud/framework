<section class="uk-section">
  <div class="uk-container">
    <h1 class="uk-padding" style="text-align: center;">Obrigado por entrar em contato!</h1>
  </div>
</section>

<?php
function this_link_phone($phone,$type='phone'){
	$phone = strtr($phone, [
		'(' => '',
		')' => '',
		' ' => '',
		'.' => '',
		'-' => ''
	]);
  if($type=='tel'){
    return 'tel:+55'.$phone;
  }else{
    return '+55'.$phone;
  }
}
// $Tracking = [
//   'goa', // Canal - Google Ads
// 	'faa', // Canal - Facebook Ads
//   'fao', // Canal - Facebook Organico
//   'ina', // Canal - Instagram Ads
//   'ino', // Canal - Instagram Organico
//   'qrc', // Canal - Acesso ao QR-Code
//   'ref', // Canal - Link de Acesso direto   
// ];
// var_dump($Config);
$channel = '';
// if(isset(URL()[1]) && in_array(URL()[1], $Tracking) ){
//   // echo this_link_phone($Config['config_whatsapp']);
//   $Pre = ' Encontrei sua empresa ';
//   switch (URL()[1]) {
//     case 'goa':
//       $channel = $Pre.'no Google Ads';
//       break;
//   }

// }

?>
<script>
  var Tel = "<?= this_link_phone($Config['config_whatsapp']); ?>";
  var Message = "<?= $Config['config_whatsapp_mesage'].' '.$Config['seo_site_name'] ?>";
  var Link = "<?= BASE ?>";
  var Channel = "<?= $channel ?>";

  var Message = Message.replace(" ","%20");
  var query = location.search.slice(1);
  var partes = query.split('&');
  var data = {};
  partes.forEach(function (parte) {
    var chaveValor = parte.split('=');
    var chave = chaveValor[0];
    var valor = chaveValor[1];
    data[chave] = valor;
  });
  
  if(data.con == "yes"){
    setTimeout(function(){
      window.location.href = "https://api.whatsapp.com/send?phone="+Tel+"&text="+Message+Channel+" - "+Link;
    }, 1000);
  }
</script>