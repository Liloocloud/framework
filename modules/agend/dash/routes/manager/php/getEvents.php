<?php

require_once '../../../../../../_Kernel/___Kernel.php';

$Get = _get_data_table(TB_AGENDS);
if($Get){

    $Json;
    $i = 0;
    foreach ($Get as $val) {

        switch ($val['agend_status']) {
            case 'Aguardando': $Color = 'green'; break;
            case 'Confirmado': $Color = 'blue'; break;
            case 'Atendido': $Color = 'orange'; break;
        }

        $Json[$i] = [
            'id' => $val['agend_id'],
            'title' => $val['agend_title'],
            'backgroundColor' => $Color,
            'start' => $val['agend_start'],

        ];
        $i++;
    }

    // var_dump($Get, $Json);
    // exit;
    echo json_encode($Json);
}