<?php
$Files = _get_data_full("SELECT * FROM `" . TB_UPLOADS . "` LIMIT 30");
$List = '';
foreach ($Files as $key => $value) {

    // Tipo imagem
    if (strstr($value['upload_mime'], 'image/')) {
        if (file_exists(ROOT . $value['upload_url'] . $value['upload_name'])) {
            $List .= '<div class="item"><div class="uk-background-cover" style="background-image: url(' . BASE . $value['upload_url'] . $value['upload_name'] . ');" onclick="viewDataFile('.$value['upload_id'].')"></div></div>';
        } else {
            $List .= '<div class="item-default"><div onclick="viewDataFile('.$value['upload_id'].')"><i class="circular big file image outline icon"></i></div></div>';
        }
    }

    // Tipo video
    if (strstr($value['upload_mime'], 'video/')) {
        if (file_exists(ROOT . $value['upload_url'] . $value['upload_name'])) {
            $List .= '<div class="item-default"><div onclick="viewDataFile('.$value['upload_id'].')"><i class="circular big file video outline icon"></i></div></div>';
        }
    }

    // Tipo audio
    if (strstr($value['upload_mime'], 'audio/')) {
        if (file_exists(ROOT . $value['upload_url'] . $value['upload_name'])) {
            $List .= '<div class="item-default"><div onclick="viewDataFile('.$value['upload_id'].')"><i class="circular big file audio outline icon"></i></div></div>';
        }
    }

    // Tipo PDF
    if (strstr($value['upload_type'], 'pdf')) {
        if (file_exists(ROOT . $value['upload_url'] . $value['upload_name'])) {
            $List .= '<div class="item-default"><div onclick="viewDataFile('.$value['upload_id'].')">
            <i class="circular big file pdf outline icon"></i></div></div>';
        }
    }


}
$Extra['upload_init_list'] = $List;
_tpl_fill($This[$Module]['DASH_ROUTES_ROOT'] . URL()[2] . '/' . URL()[2] . '.tpl', $Extra, '');