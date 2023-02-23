<?php
$Extra['date'] = date("Y");

$Tpl = file_get_contents($Route . $OneURL . '/planos.tpl');
$Tpl = ElementMount("\[node\]", "\[\/node\]", $Tpl);
_tpl_fill($Tpl['before'], $Extra, '');

$Plans = _get_data_table(TB_ACCOUNT_PLANS);
$Plans = (isset($Plans)) ? $Plans : false;
if ($Plans) {

    foreach ($Plans as $Item) {

        if ($Item['plan_status'] == 1) {
            $Node = ElementMount("\[node1\]", "\[\/node1\]", $Tpl['content']);
            _tpl_fill($Node['before'], $Extra, $Item);
            $Items = _get_data_table(TB_ACCOUNT_PLAN_OPTIONS, ['opt_plan_id' => $Item['plan_id']]);

            if (!empty($Items)) {
                foreach ($Items as $Opt) {
                    _tpl_fill($Node['content'], $Extra, $Opt);
                }
            }

            _tpl_fill($Node['after'], $Extra, $Item);
        }

    }

}
_tpl_fill($Tpl['after'], $Extra, '');
