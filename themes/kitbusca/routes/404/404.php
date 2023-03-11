<?php
/**
 * Controladora da página 404
 * @copyright Felipe Oliveira Lourenço - 10.03.2023
 */
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$ThisRoute = new FilesystemLoader(ROOT_THEME_ROUTES . '404/');
$ThisRoute = new Environment($ThisRoute, [
    // 'cache' => ROOT . 'cache/'
]);
echo $ThisRoute->render('404.twig', $Extra);


// $id           = '0001';
// $name         = 'Felipe Oliveira Lourenço'; 		// Nome Completo
// $sortName     = 'Doe;John'; 		                // Apelido ou primeiro nome
// $phone        = '13 33494636'; 		            // Telefone Comercial
// $phonePrivate = '13 981750225'; 		// Telefone Privado 
// $phoneCell    = '13 981750295'; 	// Celular
// $orgName      = 'Beegray Marketing Digital';  	// Nome da Empresa
// $email        = 'felipe.game.studio@gmail.com'; 		// E-mail

// // Dados de localização 
// $addressLabel     = 'Label'; 
// $addressPobox     = 'Pobox'; 
// $addressExt       = 'Ext'; 

// $addressStreet    = 'Av. Ana Costa, 482, conj 922'; 
// $addressTown      = 'Santos'; 
// $addressRegion    = 'SP'; 
// $addressPostCode  = '11060-0002'; 
// $addressCountry   = 'Brasil'; 

// // Renderização de dados 
// $codeContents  = 'BEGIN:VCARD'."\n"; 
// $codeContents .= 'VERSION:2.1'."\n"; 
// // $codeContents .= 'N:'.$sortName."\n"; 
// $codeContents .= 'FN:'.$name."\n"; 
// $codeContents .= 'ORG:'.$orgName."\n"; 

// $codeContents .= 'TEL;WORK;VOICE:'.$phone."\n"; 
// $codeContents .= 'TEL;HOME;VOICE:'.$phonePrivate."\n"; 
// // $codeContents .= 'TEL;TYPE=cell:'.$phoneCell."\n"; 

// $codeContents .= 'ADR;TYPE=work;'. 
//     'LABEL="'.$addressLabel.'":' 
//     .$addressPobox.';' 
//     .$addressExt.';' 
//     .$addressStreet.';' 
//     .$addressTown.';' 
//     .$addressPostCode.';' 
//     .$addressCountry 
// ."\n"; 

// $codeContents .= 'EMAIL:'.$email."\n"; 

// $codeContents .= 'END:VCARD'; 

// // Gerando arquivo de imagem
// use Liloo\Qrcode\Render;
// $QRcode = ROOT_UPLOADS.'qrcodes/qr-'.$id.'.png';
// $ViewQRcode = BASE_UPLOADS.'qrcodes/qr-'.$id.'.png';
// Render::png($codeContents, $QRcode); 

// // Imprimindo QR Code no site
// echo "<img class='img-auto' src='".$ViewQRcode."'/>";