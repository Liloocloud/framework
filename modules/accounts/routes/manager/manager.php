<?php
if(isset(URL()[2])){
    _tpl_fill($This[$Module]['ROUTES_ROOT'].URL()[2].'/'.URL()[2].'.tpl', $Extra, '');
}