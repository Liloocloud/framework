<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$ThisRoute = new FilesystemLoader(ROOT_THEME_ROUTES.'404/');
$ThieTwig = new Environment($ThisRoute, [
	// 'cache' => ROOT . 'cache/'
]);

var_dump(
	$_GET,
	$URL,
);

echo $ThieTwig->render('404.twig', $Extra);

