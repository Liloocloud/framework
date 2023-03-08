<?php
use Liloo\Generic\Read;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$ThisRoute = new FilesystemLoader(ROOT_THEME_ROUTES . 'home/tpl/');
$ThisRoute = new Environment($ThisRoute, [
    // 'cache' => ROOT . 'cache/'
]);

$Ads = new Read(TB_ACCOUNTS);
$Extra['accounts'] = $Ads->getArray(['account_plan' => 'free'], 1)['output'];
$Extra['pagination'] = $Ads->Pagination()['output'];
$Extra['categories'] = [
    ['img' => 'assistencia-tecnica.png', 'title' => 'Assistência Técnica'],
    ['img' => 'beleza.png', 'title' => 'Beleza e Spa'],
    ['img' => 'doceria.png', 'title' => 'Docerias'],
    ['img' => 'eletricista.png', 'title' => 'Eletricista'],
    ['img' => 'imoveis.png', 'title' => 'Imóveis'],
    ['img' => 'odontologia.png', 'title' => 'Odontologia'],
    ['img' => 'saude.png', 'title' => 'Saúde'],
    ['img' => 'automoveis.png', 'title' => 'Automóveis'],
    ['img' => 'engenharia-civil.png', 'title' => 'Engenharia Civil'],
    ['img' => 'mais-categorias.png', 'title' => 'Mais'],
];

echo $ThisRoute->render('banner.twig', $Extra);
echo $ThisRoute->render('categorias.twig', $Extra);
echo $ThisRoute->render('ads-banner.twig', $Extra);
echo $ThisRoute->render('ads-cards.twig', $Extra);
echo $ThisRoute->render('cta.twig', $Extra);

unset($Extra['categories']);