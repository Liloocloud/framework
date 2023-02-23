<?php
/**
 * @copyright Felipe Oliveira Lourenço - 13.11.2021
 * @version 5.5.0
 */
require_once "../_Kernel/___Kernel.php";
require_once ROOT_ADMIN . 'admin.fun.php';
require_once ROOT_ADMIN . 'admin.config.php';
require_once ROOT . 'modules/config.modules.php';
ob_start();

if (isset($_SESSION['account_level']) && isset($_SESSION['account_email'])) {

    // Nível de permissão do usuário
    if (ADMIN_LEVEL_PERMISSION > $_SESSION['account_level']) {
        _redirect_url(BASE . ROUTE_ADMIN_LOGIN . '?e=nolevel', true);
        exit;
    }

    // Rotinas do Módulos
    $Menus = new Explore\OpenDirFile(ROOT . 'modules/');
    foreach ($active_modules as $inc) {

        // Inclui a config dos módulos ativos
        if (in_array($inc, $Menus->listDir())) {
            require_once ROOT . 'modules/' . $inc . '/' . $inc . '.config.php';
        }
    }

    // Inclue o arquivo de rota módulos
    if (isset(URL()[1]) && is_dir(ROOT . 'modules/' . URL()[1])) {
        require_once ROOT . 'modules/' . URL()[1] . '/_routes.php';
    }

    // Calcula o tempo limite da Sessão
    $Session = new Account\Helpers;
    $Session = $Session->dataDiff(ADMIN_TIME_SESSION, $_SESSION['account_time'], date("Y:m:d H:i:s"));
    if ($Session['BOOL']) {
        $_SESSION['account_time'] = date("Y:m:d H:i:s");
    } else {
        _redirect_url(BASE . ROUTE_ADMIN_LOGIN, true);
        exit;
    }
    require_once ROOT_ADMIN . 'inc/doctype.php';
    require_once ROOT_ADMIN . 'inc/admin.php';
    require_once ROOT_ADMIN . 'inc/script.php';
} else {
    _redirect_url(BASE . ROUTE_ADMIN_LOGIN, true);
    exit;
}
exit;
