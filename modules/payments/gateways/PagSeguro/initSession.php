<?php
require_once "PagSeguro.class.php";
$Pay = new PagSeguro($_POST);
$Pay->checkout('sandbox');
$Pay->initSession();

echo $Pay->session_id;

