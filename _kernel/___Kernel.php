<?php
/**
 * Núcleo de processos da plataforma no formato Slim
 * @author Felipe Oliveira
 * @copyright Liloo - 09.03.2021
 * @version 5.0.0 - 26.03.2021
 * @version 5.1.0 - 03.04.2021
 * @version 5.1.1 - 04.04.2021
 */
session_start();

// Caminho absoluto do sistema
define('ROOT', str_replace('\\', '/', dirname(dirname(__FILE__))) . '/');
$Extra['ROOT'] = ROOT;

require_once ROOT . 'config.php';

/*****************************************************************
 * Operações de configuração
 */

// Permiti vardup mais extensos
if ($__CONF__['xdebug'] === true) {
    ini_set("xdebug.var_display_max_children", -1);
    ini_set("xdebug.var_display_max_data", -1);
    ini_set("xdebug.var_display_max_depth", -1);
    error_reporting(E_ALL ^ E_DEPRECATED);
}
// Configura a data e hora do sistema
date_default_timezone_set($__CONF__['time_zone']);

/*****************************************************************
 * PADRÕES NATIVOS - EXTRAS
 */
$_SESSION['CSRF_TOKEN'] = md5(uniqid(mt_rand(), true));
$Extra['CSRF_TOKEN'] = $_SESSION['CSRF_TOKEN'];

/*****************************************************************
 * BASE - CONSTANTES DO SISTEMA
 */

// Link absoluto do sistema
define('BASE', $__CONF__['base']);
$Extra['BASE'] = BASE;

// Link Absoluto do Painel Admin
define('BASE_ADMIN', BASE . 'admin/');
$Extra['BASE_ADMIN'] = BASE_ADMIN;

// Link Absoluto da pasta global "assets"
define('BASE_ASSETS', BASE . 'assets/');
$Extra['BASE_ASSETS'] = BASE_ASSETS;

// Link Absoluto da pasta assets do Painel Admin
define('BASE_ADMIN_ROUTES', BASE_ADMIN . 'routes/');
$Extra['BASE_ADMIN_ROUTES'] = BASE_ADMIN_ROUTES;

// Link que faz referencia a pasta _Modules do sistema
define('BASE_MODULE', BASE . 'modules/');
$Extra['BASE_MODULE'] = BASE_MODULE;

// Link que faz referencia a pasta _Plugins do sistema
define('BASE_PLUGIN', BASE . 'plugins/');
$Extra['BASE_PLUGIN'] = BASE_PLUGIN;

// Link direto do thema ativo
define('BASE_THEME', BASE . 'themes/' . $__CONF__['theme'] . '/');
$Extra['BASE_THEME'] = BASE_THEME;

// Link direto das rotas do tema ativo
define('BASE_THEME_ROUTES', BASE . 'themes/' . $__CONF__['theme'] . '/' . $__CONF__['theme_routes']);
$Extra['BASE_THEME_ROUTES'] = BASE_THEME_ROUTES;

// Link direto das imagens do thema ativo
define('BASE_THEME_IMAGES', BASE . 'themes/' . $__CONF__['theme'] . '/' . $__CONF__['theme_images']);
$Extra['BASE_THEME_IMAGES'] = BASE_THEME_IMAGES;

// Link direto das imagens do thema ativo
define('BASE_THEME_UPLOADS', BASE . 'themes/' . $__CONF__['theme'] . '/uploads/');
$Extra['BASE_THEME_UPLOADS'] = BASE_THEME_UPLOADS;

// Link direto para a pasta _Kernel
define('BASE_KERNEL', BASE . '_Kernel/');
$Extra['BASE_KERNEL'] = BASE_KERNEL;

// Link direto para a pasta do frameworK escolhido
define('BASE_FRAMEWORK', BASE_KERNEL . 'Frameworks/');
$Extra['BASE_FRAMEWORK'] = BASE_FRAMEWORK;

// Link direto para a pasta padrão de uploads
define('BASE_UPLOADS', BASE . 'uploads/');
$Extra['BASE_UPLOADS'] = BASE_UPLOADS;

/*****************************************************************
 * ROOT - CONSTANTES DO SISTEMA
 */
// Caminho Absoluto da pasta global "assets"
define('ROOT_ASSETS', ROOT . 'assets/');
$Extra['ROOT_ASSETS'] = ROOT_ASSETS;

// Caminho absoluto dos módulos
define('ROOT_MODULE', ROOT . 'modules/');
// define('ROOT_MODULE', ROOT.'_Modules/');
$Extra['ROOT_MODULE'] = ROOT_MODULE;

// Caminho absoluto do painel admin
define('ROOT_ADMIN', ROOT . 'admin/');
$Extra['ROOT_ADMIN'] = ROOT_ADMIN;

// Caminho absoluto das rotas do peinal admin
define('ROOT_ADMIN_ROUTES', ROOT . 'admin/routes/');
$Extra['ROOT_ADMIN_ROUTES'] = ROOT_ADMIN_ROUTES;

// Caminho absoluto dos plugins
define('ROOT_PLUGIN', ROOT . 'plugins/');
$Extra['ROOT_PLUGIN'] = ROOT_PLUGIN;

// Caminho absoluto do tema ativo
define('ROOT_THEME', ROOT . 'themes/' . $__CONF__['theme'] . '/');
$Extra['ROOT_THEME'] = ROOT_THEME;

// Caminho absoluto das rotas do tema ativo
define('ROOT_THEME_ROUTES', ROOT . 'themes/' . $__CONF__['theme'] . '/' . $__CONF__['theme_routes']);
$Extra['ROOT_THEME_ROUTES'] = ROOT_THEME_ROUTES;

// Caminho absoluto das imagens do tema ativo
define('ROOT_THEME_IMAGES', ROOT . 'themes/' . $__CONF__['theme'] . '/' . $__CONF__['theme_images']);
$Extra['ROOT_THEME_IMAGES'] = ROOT_THEME_IMAGES;

// Caminho absoluto da Kernel
define('ROOT_KERNEL', ROOT . '_Kernel/');
$Extra['ROOT_KERNEL'] = ROOT_KERNEL;

// Caminho absoluto da frameqork ativo
define('ROOT_FRAMEWORK', ROOT_KERNEL . 'Frameworks/' . $__CONF__['framework'] . '/');
$Extra['ROOT_FRAMEWORK'] = ROOT_FRAMEWORK;

// Caminho absoluto para a pasta padrão de uploads
define('ROOT_UPLOADS', ROOT . 'uploads/');
$Extra['ROOT_UPLOADS'] = ROOT_UPLOADS;

// Caminho absoluto para a pasta padrão dos Compoentes
define('ROOT_COMPONENTS', ROOT . '_Kernel/Src/components/');
$Extra['ROOT_COMPONENTS'] = ROOT_COMPONENTS;


/*******************************************************************
 * TABELAS NATIVAS DA PLATAFORMA
 */
define("TB_ACCOUNTS", "accounts");
define("TB_ACCOUNT_PLANS", "account_plans");
define("TB_ACCOUNT_PLAN_OPTIONS", "account_plan_options");
define("TB_ACCOUNT_CONFIGS", "account_configs");

define("TB_OPTIONS", "account_configs");

define("TB_ACCOUNT_API", "account_api");

define("TB_NOTIFICATIONS", "notifications");

define("TB_MKT_CAMPAIGNS", "campaigns");
define("TB_MKT_CONTACTS", "campaign_contacts");

define("TB_CLIENTS", "clients");
define("TB_ORDERS", "orders");

define("TB_CONTENTS", "contents");
define("TB_CONTENT_OPTIONS", "content_options");

define("TB_CATEGORIES", "categories");
define("TB_DOCS", "docs");
define("TB_VIEWS", "views");
define("TB_COMPONENTS", "components");
define('TB_COOKIES', 'cookies');
define('TB_LOCATIONS', 'locations');
define('TB_STATES', 'geo_state');
define('TB_CITIES', 'geo_city');
define('TB_DISTRICTS', 'geos');
define('TB_TAXONOMIES', 'taxonomies');
define('TB_UPLOADS', 'uploads');
define("TB_ITEMS", "items");
define("TB_ITEM_OPTIONS", "item_options");

/**
 * Module Marketing (Matrix)
 */
define('TB_MATRIX', 'matrix');
define('TB_MATRIX_LEADS', 'matrix_leads');
define('TB_MATRIX_ITEMS', 'matrix_items');
define('TB_MATRIX_PIPELINE', 'matrix_pipeline');
define('TB_MATRIX_COWORKERS', 'matrix_coworkers');
define('TB_MATRIX_COWORKER_CATEGORY', 'matrix_coworker_category');

/**
 * Módulo Portal
 */
define('TB_PORTAL_ADS', 'portal_ads');
define('TB_PORTAL_REPORTS', 'portal_ads_reports');
define('TB_PORTAL_REPORTS_GLOBAL', 'portal_reports_global');
define('TB_PORTAL_CATEGORIES', 'portal_categories');
define('TB_PORTAL_USERPAGE', 'portal_userpage');
define('TB_PORTAL_USERPAGE_ADDS', 'portal_userpage_adds');
define('TB_PORTAL_USERPAGE_WIDGETS', 'portal_userpage_widgets');

define('TB_AGENDS', 'agends');

/**
 * Módulo Shop (Commerce)
 */
define('TB_SHOP_PRODUCTS', 'shop_products');
define('TB_SHOP_BRANDS', 'shop_brands');

/**
 * Módulo de Localização
 */
define('TB_LOCATIONS_DISTRICTS', 'location_districts');
define('TB_LOCATIONS_CITIES', 'location_cities');
define('TB_LOCATIONS_STATES', 'location_states');
define('TB_LOCATIONS_COUNTRIES', 'location_countries');

/*******************************************************************
 * AUTOLOADER COMPOSER
 */
require_once ROOT."_Kernel/Libs/autoload.php";

/*******************************************************************
 * AUTO CARREGAMENTO DAS CLASSES
 */
require_once ROOT_KERNEL . "Helpers.inout.php";
require_once ROOT_KERNEL . 'Autoloader.php';

/*******************************************************************
 * REQUEST DE TODA A PLATAFORMA
 */
if (!isset($_SESSION) && empty($_SESSION)) {
    session_start();
}

require_once ROOT_KERNEL . "DBSA.inout.php";
require_once ROOT_KERNEL . 'Globals.inout.php';
// require_once ROOT_KERNEL."Ciclo.inout.php";
require_once ROOT_THEME."__config.theme.php";
require_once ROOT_THEME."__fun.theme.php";


/****************************************************************
 * Conexão com Banco de Dados local e remoto alterado apenas
 * pela palavra "localhost" na URL
 */
use Helpers\DotEnv;
DotEnv::load();

$PROJECT = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($PROJECT, 'localhost') !== false) {
    define("DB_HOST", getenv('DB_HOST_DEV'));
    define("DB_USER", getenv('DB_USER_DEV'));
    define("DB_PASS", getenv('DB_PASS_DEV'));
    define("DB_DBSA", getenv('DB_DBSA_DEV'));
} else {
    define("DB_HOST", getenv('DB_HOST'));
    define("DB_USER", getenv('DB_USER'));
    define("DB_PASS", getenv('DB_PASS'));
    define("DB_DBSA", getenv('DB_DBSA'));
}



/*******************************************************************
 * INICIA FUNÇÕES GLOBAIS QUE NÃO USAM CLASSES, PARA EVITAR CONFLITOS
 * USAMOS LETRA MAIUSCULA EM SEUS NOMES
 */

/*******************************************************************
 * Gerenciador de URL de toda a plataforma
 */
function URL()
{
    $URL = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $base = explode("//", BASE)[1];
    if (strpos($URL, $base) !== false){
        $URL = str_replace($base, "", $URL);
        if (substr_count($URL, '/') > 0){
            $URL = explode('/', $URL);
        }else{
            $URL = [$URL];
        }
    }else{
        $URL = [$URL];
    }
    return array_filter($URL);
}

/**
 * Montagem de Global extra
 */
(isset(URL()[0])) ? $URL = URL()[0] : $URL = 'home';
$Extra['config'] = [];
foreach (_get_data_table(TB_OPTIONS) as $Docty) {
    $Extra['config'][$Docty['opt_meta']] = $Docty['opt_values'];
}
$Extra['theme_script'] = file_exists(ROOT_THEME_ROUTES . $URL . '/script.js');
$Extra['theme_css'] = file_exists(ROOT_THEME_ROUTES . $URL . '/style.css');
$Extra['theme_module'] = file_exists(ROOT_THEME_ROUTES . $URL . '/module.js');
$Extra['URL'] = $URL;
$Extra['session'] = $_SESSION;