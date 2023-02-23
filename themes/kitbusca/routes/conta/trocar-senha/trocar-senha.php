<?php
/**
 * @copyright Felipe Olivera 28.06.2022
 */
if(!isset($_SESSION['account_approved']) && !isset($_SESSION['account_email'])){
    session_destroy();
    header('Location: '.BASE.'conta/validar-redefinicao/');
}
$Extra['account_email'] = '<input type="hidden" name="account_email" value="'.$_SESSION['account_email'].'">';
$Extra['account_approved'] = '<input type="hidden" name="account_approved" value="'.base64_encode($_SESSION['account_approved']).'">';

_tpl_fill($Route . $OneURL . '/trocar-senha.tpl', $Extra, '');