<?php
/**
 * Controladora da página das Pipelinas
 * @copyright Felipe Oliveira Lourenço - 01.12.2022
 * @version 1.0.0
 */

if (isset(URL()[3]) && isset(URL()[4])) {
    $Pipe = _get_data_table(TB_MATRIX_PIPELINE, ['pipe_id' => URL()[3]]);
    $Pipe = (isset($Pipe[0]))? $Pipe[0]: null;
    $Matrix = URL()[4];

    $Data = _get_data_full(
        "SELECT * FROM `" . TB_MATRIX . "`
                INNER JOIN `" . TB_MATRIX_LEADS . "`
                ON " . TB_MATRIX . ".matrix_lead_id = " . TB_MATRIX_LEADS . ".lead_id
                WHERE " . TB_MATRIX . ".matrix_pipeline_active = 1
                AND " . TB_MATRIX . ".matrix_account_id = {$_SESSION['account_id']}
                AND " . TB_MATRIX . ".matrix_code = {$Matrix}
                AND " . TB_MATRIX . ".matrix_pipeline = {$Pipe['pipe_id']}
                AND " . TB_MATRIX_LEADS . ".lead_account_id = {$_SESSION['account_id']}
            ");
    $Data = (isset($Data[0])) ? $Data[0] : null;
    if ($Data) {
        
        $Items = _get_data_full(
            "SELECT `item_key`,`item_value_string`,`item_value_int`,`item_value_float`,`item_value_datetime`
            FROM ".TB_MATRIX_ITEMS."
            WHERE `item_matrix_code` = {$Matrix}
            AND `item_account_id` = {$_SESSION['account_id']}
        ");
        $Card = [];
        foreach ($Items as $key => $value) {
            if(array_key_exists('item_key', $value)){
                $Card[$value['item_key']] = $value;
            }
        }      
        $Data = array_merge($Data, $Pipe);

        // Navegação das pipes
        $CountPipes = _get_data_full("SELECT COUNT(`pipe_id`) As PIPE FROM `".TB_MATRIX_PIPELINE."`");       
        if($Pipe['pipe_id'] == 1){
            $Extra['navigation'] = '<a id="next-step" data="'.$Pipe['pipe_id'].','.$Matrix.'" href="#" class="uk-button uk-button-primary">Próxima Etapa <i class="fas fa-arrow-right"></i></a>';
        }
        elseif( $Pipe['pipe_id'] > 1 AND $Pipe['pipe_id'] < $CountPipes[0]['PIPE'] ){
            $Extra['navigation'] = '<a id="previous-step" data="'.$Pipe['pipe_id'].','.$Matrix.'" href="#" class="uk-button uk-button-primary"><i class="fas fa-arrow-left"></i> Anterior Etapa</a>
            <a id="next-step" data="'.$Pipe['pipe_id'].','.$Matrix.'" href="#" class="uk-button uk-button-primary">Próxima Etapa <i class="fas fa-arrow-right"></i></a>';
        }else{
            $Extra['navigation'] = '<a id="previous-step" data="'.$Pipe['pipe_id'].','.$Matrix.'" href="#" class="uk-button uk-button-primary"><i class="fas fa-arrow-left"></i> Anterior Etapa</a>';
        }


        _tpl_fill($This[$Module]['ROUTES_ROOT'] . URL()[2] . '/' . URL()[2] . '.tpl', $Extra, $Data);
    } else {
        // Redireciona
        header('Location: ' . BASE_ADMIN . 'marketing/crm/');
    }
} else {
    // Redireciona
    header('Location: ' . BASE_ADMIN . 'marketing/crm/');
}

/**
 * COLETDANDO A METRIZ E OS CLIENTE
 */
// $Matrix = _get_data_full(
//         "SELECT * FROM `".TB_MATRIX."`
//         INNER JOIN `".TB_MATRIX_LEADS."`
//         ON ".TB_MATRIX.".matrix_client_id = ".TB_MATRIX_LEADS.".client_id
//         WHERE ".TB_MATRIX.".matrix_pipeline_active = 1
//         ");

// $Extra['styleCss'] = $This[$Module]['ROUTES_ROOT'].'crm/style.css';

// $Tpl = ElementMount(
//     "\[node\]",
//     "\[\/node\]",
//     file_get_contents($This[$Module]['ROUTES_ROOT'].'crm/crm.tpl')
// );

// _tpl_fill($Tpl['before'], $Extra, '');

/**
 * PIPELINES
 */
// foreach ($Pipe as $ValueA){

//     if(in_array($Account, explode(',', $ValueA['pipe_sector_inner_id']) ) ){

//         $Card = ElementMount(
//             "\[node1\]",
//             "\[\/node1\]",
//             $Tpl['content']
//         );
//         _tpl_fill($Card['before'], $ValueA, $Extra);

//         /**
//          * CARTÕES
//          */
//         foreach ($Matrix as $valMatrix){
//             if($ValueA['pipe_id'] == $valMatrix['matrix_pipeline'] AND $valMatrix['matrix_pipeline_active'] == 1){
//                 $DateMeeting = _get_data_full(
//                    "SELECT `item_value_string` FROM `".TB_MATRIX_ITEMS."`
//                    WHERE `item_key` = 'data_da_reuniao'
//                    AND `item_matrix_code` =:a","a={$Matrix[0]['matrix_code']}");

//                 $Extra['item_key[data_da_reuniao]'] = $DateMeeting[0]['item_value_string'];
//                 $Extra['item_link_card'] = BASE_ADMIN.'agency/project/'.$valMatrix['matrix_code'];

//                 _tpl_fill($Card['content'], $valMatrix, $Extra);
//             }
//         }

//         _tpl_fill($Card['after'], $Extra, '') ;
//     }
// }
// _tpl_fill($Tpl['after'], $Extra, '');
