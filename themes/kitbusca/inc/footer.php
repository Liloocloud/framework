<?php
$Extra['footer'] = [
    "Para empresas" => [
        ['link' => BASE_ADMIN . 'login/', 'text' => 'Dashboard', 'target' => '_blank'],
        ['link' => BASE . 'conta/cadastre-se/', 'text' => 'Cadastre-se'],
    ],
    "A kitbusca" => [
        ['link' => BASE . 'quem-somos/', 'text' => 'Quem somos'],
        ['link' => BASE . 'categorias/', 'text' => 'Categorias'],
        ['link' => BASE . 'informativos/', 'text' => 'Informativos'],
        ['link' => BASE . 'b/ddd/', 'text' => 'Busca por DDD'],
        ['link' => BASE . 'b/cep/', 'text' => 'Busca por CEP'],
        ['link' => BASE . 'fale-conosco/', 'text' => 'Fale consco'],
        ['link' => BASE . 'produtos-e-servicos/', 'text' => 'Produtos e Serviços'],
        ['link' => BASE . 'empresar-a-z/', 'text' => 'Empresas de A a Z'],
    ],
    "Institucional" => [
        ['link' => BASE_ADMIN . 'login/', 'text' => 'Área do cliente'],
        ['link' => BASE . 'trabalhe-conosco/', 'text' => 'Trabalhe conosco'],
        ['link' => BASE . 'duvidas-frequentes/', 'text' => 'Dúvidas frequentes'],
        ['link' => BASE . 'termos-de-uso/', 'text' => 'Termos de uso'],
        ['link' => BASE . 'politica-de-privacidade/', 'text' => 'Política de privacidade'],
    ],
];

$Extra['smm'] = [
    ['link' => '#', 'target' => '_blank', 'class' => 'uk-icon-button', 'attr' => 'uk-icon="instagram"'],
    ['link' => '#', 'target' => '_blank', 'class' => 'uk-icon-button', 'attr' => 'uk-icon="facebook"'],
    ['link' => '#', 'target' => '_blank', 'class' => 'uk-icon-button', 'attr' => 'uk-icon="youtube"'],
];

echo $twig->render('footer.twig', $Extra);
