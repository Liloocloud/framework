<?php
/**
 * Liloo Framework PHP - Criado em Agosto de 2015
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com
 * @see - update 29.01.2020
 * @version 1.1.0
 */
ob_start();
require_once "_Kernel/___Kernel.php";
require_once ROOT_THEME . '__routes.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
$inc = new FilesystemLoader(ROOT_THEME . 'inc/');
$twig = new Environment($inc, [
    // 'cache' => ROOT . 'cache/',
]);

echo $twig->render('doctype.twig', $Extra);
if (!pathinfoURLString(__THEME__['header_pages_disabled'])) {
    echo $twig->render('header.twig', $Extra);
}

// Sistea de Leitura de Rotas
$ROUTES = new Liloo\Files\OpenDirFile(ROOT_THEME_ROUTES);
$ROUTES = $ROUTES->list();
$URL_Q = array_filter(URL());

// Habilita o sistema embarcado de acordo com as configurações que estão na __CONFIG.php
if (isset(URL()[0]) && array_key_exists(URL()[0], __THEME__['embedded_system'])) {
    //header("Location: ".BASE_ADMIN);
    if (__THEME__['embedded_system'][URL()[0]]) {
        require_once ROOT_THEME . URL()[0] . '/index.php';
    } else {
        require_once ROOT_THEME_ROUTES . '404/404.php';
    }

} elseif (isset(URL()[0]) && preg_match("/\?/", URL()[0])) {
    require_once ROOT_THEME_ROUTES . 'home/home.php';

// Le as rotas para inclui-las
} elseif (isset($URL_Q[0]) && !empty($URL_Q)) {
    if (is_dir(ROOT_THEME_ROUTES . $URL_Q[0]) && array_key_exists($URL_Q[0], __ROUTES__)) {
        require_once ROOT_THEME_ROUTES . $URL_Q[0] . '/' . __ROUTES__[$URL_Q[0]]['php'];
    } else {
        require_once ROOT_THEME_ROUTES . '404/404.php';
    }

// URL vazia inclui a home
} else {
    require_once ROOT_THEME_ROUTES . 'home/home.php';
}

// Footer
if (!pathinfoURLString(__THEME__['footer_pages_disabled'])) {
    echo $twig->render('footer.twig', $Extra);
}
if (!pathinfoURLString(__THEME__['copyright_pages_disabled'])) {
    echo $twig->render('copyright.twig', $Extra);
}
echo $twig->render('script.twig', $Extra);
ob_end_flush();
_check_filehtaccess();