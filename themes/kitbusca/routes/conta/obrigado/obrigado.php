<?php
$Extra['account_email'] = (isset($_SESSION['account_email']))? base64_encode($_SESSION['account_email']) : '';
$Extra['btn_login'] = (isset($_SESSION['account_email']))? BASE.'conta/login/?user='.base64_encode($_SESSION['account_email']) : BASE.'conta/login/';
_tpl_fill($Route . $OneURL . '/obrigado.tpl', $Extra, '');