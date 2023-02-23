<?php

$Extra['uploads'] = BASE_UPLOADS;
$Extra['base'] = BASE;

_tpl_fill(PATH_THEME.ROUTES.'lilo/lilo.tpl', $Extra, '');


$View = '
table("nome_da_tabela")
fileds("account_name", "account_cois")
paginator(5)
getUrl("/@var1/@var2/")
getPost("/@var")
';

// "<textarea>". $View ."</textarea>"

echo htmlspecialchars( $View , ENT_COMPAT);