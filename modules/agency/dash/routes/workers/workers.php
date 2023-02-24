<?php
$Workers = _get_data_table(TB_ACCOUNTS, [
    'account_this_id' => $_SESSION['account_id']
]);
$li = '';
foreach ($Workers as $Data) {
    $li.= _tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].'workers/tpl/workers-li.tpl', $Extra, $Data, false);
}
$Extra['agency_workers_list'] = $li;
_tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].'workers/workers.tpl', $Extra, '');

// _tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].'workers/tpl/workers-modal.tpl', $Extra, '');