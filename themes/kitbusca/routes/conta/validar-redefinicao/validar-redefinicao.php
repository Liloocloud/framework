<?php
if(!isset($_SESSION['account_email'])){
    header('Location: '.BASE.'conta/redefinir-senha/');
}
$Extra['account_email'] = (isset($_SESSION['account_email']))? $_SESSION['account_email'] : '';
_tpl_fill($Route . $OneURL . '/validar-redefinicao.tpl', $Extra, '');