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