<?php 
/**
 * Exemplo de uso do compenente
 */
require_once "../../../___Kernel.php";
require_once "../../../Libs/autoload.php";

$loader = new Twig\Loader\FilesystemLoader(ROOT_COMPONENTS.'accordion/');
$twig = new Twig\Environment($loader, [
    // 'cache' => ROOT.'cache/',
]);

echo $twig->render('uikit.twig', ['name' => 'Test']);

