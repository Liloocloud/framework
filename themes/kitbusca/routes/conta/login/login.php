<?php
if(isset($_GET['user'])){
    $Extra['input_values'] = 'value="'.base64_decode($_GET['user']).'"';
}else{
    $Extra['input_values'] = 'autofocus';
}

ob_start();
session_destroy();
_tpl_fill($Route . $OneURL . '/login.tpl', $Extra, '');
ob_end_flush();