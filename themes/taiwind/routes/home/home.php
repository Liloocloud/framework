<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Liloo\Generic\Read;

$ThisRoute = new FilesystemLoader(ROOT_THEME_ROUTES.'home/');
$ThieTwig = new Environment($ThisRoute, [
	// 'cache' => ROOT . 'cache/'
]);

$Ads = new Read(TB_ACCOUNTS);
$Extra['accounts'] = $Ads->getArray(['account_plan' => 'free'], 1)['output'];
$Extra['pagination'] = $Ads->Pagination()['output'];

echo $ThieTwig->render('home.twig', $Extra);
