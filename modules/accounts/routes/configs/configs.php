<?php
/**
 * Página de gerenciamento de moedas de usuários na plataforma
 * @copyright Felipe Oliveira Loureço - 16.06.2020
 */
if(isset(URL()[2])){
    _tpl_fill($This[$Module]['ROUTES_ROOT'].URL()[2].'/'.URL()[2].'.tpl', $Extra, '');
}