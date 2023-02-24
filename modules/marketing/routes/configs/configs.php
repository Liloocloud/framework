<?php
/**
 * 
 */

// $Configs = _get_data_table(TB_OPTIONS, ['opt_account_id' => $_SESSION['account_id']]);
// $url_in_array = in_array('config_email', array_column($Configs, 'opt_meta'));

// $Extra = [];
// foreach ($Configs as $Value){
//     $Extra[$Value['opt_meta']] = $Value['opt_values']; 
//     // unset($Extra[$Value['opt_meta']]['opt_meta']);
// }
_tpl_fill($This[$Module]['ROUTES_ROOT'].URL()[2].'/'.URL()[2].'.tpl', $Extra, '');