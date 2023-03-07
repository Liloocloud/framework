<?php
/**
 * Configuração do sistema
 * @copyright Felipe Oliveira Lourenço 03.04.2021
 * @version 1.0.0
 */

/*******************************************************************
 * Constantes do sistema
 */
// URL de Produção
define('SITE_URL_REMOTE', 'https://kitbusca.com/');
// URL de desenvolvimento
define('SITE_URL_LOCAL', 'http://localhost/liloo/framework-php/');
// Nome do Projeto ou Site 
define('SITE_NAME', 'Kitbusca');
// Título do Site
define('SITE_TITLE', 'Kit de ferramentas para empresas com anúncios');
// Descrição do site
define('SITE_DESCRIPTION', 'Estaremos sempre buscando inovação e tendências para ajudar empresas e profissionais a serem encontrados');
// Palavras-chave do Site
define('SITE_KEYWORDS', 'portal de busca, kitbusca, guia de empresas');
// Limite de Tempo total para validação de conta por email em minutos
define('TIME_VALIDATE_ACCOUNT', 5);
// Limite de tempo total para redefinição de senha de usuário em minuto
define('TIME_VALIDATION_PASSWORD_REDEFINE', 5);
// Define o level padrão de novos usuário não SUPERADMIN
define('LEVEL_DEFAULT_NEW_ACCOUNT', 8);
// Tempo em milisegundo de atraso na requisição. Para evitar filas de processamento
define('ADMIN_SLEEP_REQUEST', 0.1); 
// Link das redes sociais
define('SITE_YOUTUBE', '');
define('SITE_LINKEDIN', '');
define('SITE_FACEBOOK', '');
define('SITE_INSTAGRAM', '');
define('SITE_TWITTER', '');
define('SITE_BLOG', '');
// Definição da rota que fará o login na dashboard. "conta/login/ ou admin/login/"
define('ROUTE_ADMIN_LOGIN', 'admin/login.php');
// IP inicial do site. Opcional
define('SITE_IP_INIT', '179.215.126.245');
// Google
define('GOOGLE_VERIFICATION', '');
// Facebook
define('FACEBOOK_APP_ID', '607633732932955'); // ok
// IP API - Plataforma para identificação de Localização por IP
define('IPAPI_ACCESS_KEY', 'de8bcd250a2fbd9955ff778b9259d08d');
// ID do Aplicativo
define('LILOO_APP_ID', 'com.flexapp.smartplataforma.2019');
// Chave secreta da instalação
define('LILOO_SECRET_KEY', 'EfObnPU0HDGO5ANm52Z0E4APbhNf1f86AMXodsel');

/*******************************************************************
 * Variáveis Globais
 */
$Extra['SITE_NAME'] = SITE_NAME;
$Extra['SITE_TITLE'] = SITE_TITLE;
$Extra['SITE_DESCRIPTION'] = SITE_DESCRIPTION;
$Extra['SITE_KEYWORDS'] = SITE_KEYWORDS;

/*************************************************************************
 * Configurações
 */
if( strpos( $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 'localhost') !== false ){
    $base = SITE_URL_LOCAL;
}else{
    $base = SITE_URL_REMOTE;
}
$__CONF__ = [
    /**
     * Temas
     */
    'theme' => 'taiwind',


    'base' => $base,
    'theme_routes' => 'routes/',
    'theme_images' => 'assets/img/',
    'framework' => 'uikit',
    'xdebug' => false,     
    'time_zone' => 'America/Sao_Paulo'
];
unset($base);