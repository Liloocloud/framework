<?php

// _tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].URL()[2].'/widgets/banner/form.tpl', $Extra, '');

$Page = new \Module\Portal\Page();
$Page = $Page->getPage()['output'];

$Tpl = $This[$Module]['DASH_ROUTES_ROOT'].URL()[2].'/tpl/';


$Extra['tpl_contact']     = _tpl_fill($Tpl.'contact.tpl', $Extra, $Page, false);
$Extra['tpl_socialmedia'] = _tpl_fill($Tpl.'socialmedia.tpl', $Extra, $Page, false);
$Extra['tpl_location']    = _tpl_fill($Tpl.'location.tpl', $Extra, $Page, false);
$Extra['tpl_banner']    = _tpl_fill($Tpl.'banner.tpl', $Extra, $Page, false);
$Extra['tpl_modal_full']  = _tpl_fill($Tpl.'modal-full.tpl', $Extra, $Page, false);

_tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].URL()[2].'/'.URL()[2].'.tpl', $Extra, $Page);