<?php
$Extra['account_email'] = (isset($_SESSION['account_email']))? $_SESSION['account_email'] : '';
_tpl_fill($Route . $OneURL . '/validacao.tpl', $Extra, '');