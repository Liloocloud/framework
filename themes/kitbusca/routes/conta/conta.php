<?php
/**
 * Controladora da conta de usuário. Essa rota manipula toda a operação
 * de cadastro de usuário com envio de Código de confirmação e etc. Ela é
 * responsável por mandar as notificações no periodo do cadastro, assim como,
 * login, logout e etc
 * @copyright Felipe Oliveira Lourenço - 08-07-2020
 * @version 2.0.0 - 03.06.2022
 */

$Route = ROOT_THEME_ROUTES . 'conta/';
$OneURL = isset(URL()[1]) ? URL()[1] : false;
$TwoURL = isset(URL()[2]) ? URL()[2] : false;
$Extra['date'] =  date("Y");

if ($OneURL) {

    echo '<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>';

    /**
     * SubRotas
     */
    switch ($OneURL) {
        case $OneURL:
            if (file_exists($Route . $OneURL . '/' . $OneURL . '.php')) {
                
                if($TwoURL = 'cadastre-se'){
                    $Contract = new Helpers\Markdown();
                    $Extra['contrato_markdow'] = $Contract->text(file_get_contents($Route . 'contrato.md'));
                }

                require_once $Route . $OneURL . '/' . $OneURL . '.php';
            } else {
                _tpl_fill($Route . 'conta.tpl', $Extra, '');
            }
            break;
    }

} else {
    _tpl_fill(ROOT_THEME_ROUTES . 'conta/conta.tpl', $Extra, '');
}
