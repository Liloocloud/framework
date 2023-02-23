<?php
require_once "_kernel/libs/autoload.php";

$Account = new Modules\Accounts\Src\Init;
$Crm = new Modules\Crm\Src\Init;

var_dump($Account, $Crm);
