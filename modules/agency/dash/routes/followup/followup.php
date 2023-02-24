<?php
/**
 * Controladora da página followup do tema Comida di praia
 * @copyright Felipe Oliveira Lourenço - 23.01.2021
 */

/** 
 * ID DA CONTA DE ACESSO
 */
$Account = (int) $_SESSION['account_id']; 

/**
 * PIPELINE
 */
$Pipe = _get_data_table(TB_MATRIX_PIPELINE);

/**
 * COLETDANDO A METRIZ E OS CLIENTE
 */
$Matrix = _get_data_full(
        "SELECT * FROM `".TB_MATRIX."`
        INNER JOIN `".TB_CLIENTS."`
        ON ".TB_MATRIX.".matrix_client_id = ".TB_CLIENTS.".client_id
        WHERE ".TB_MATRIX.".matrix_pipeline_active = 1
        ");

$Extra['styleCss'] = $This[$Module]['DASH_ROUTES_BASE'].'followup/style.css';

$Tpl = ElementMount(
    "\[node\]",
    "\[\/node\]", 
    file_get_contents($This[$Module]['DASH_ROUTES_ROOT'].'followup/followup.tpl')
);

_tpl_fill($Tpl['before'], $Extra, '');

/**
 * PIPELINES
 */
foreach ($Pipe as $ValueA){

    if(in_array($Account, explode(',', $ValueA['pipe_sector_inner_id']) ) ){

        $Card = ElementMount(
            "\[node1\]",
            "\[\/node1\]", 
            $Tpl['content']
        );
        _tpl_fill($Card['before'], $ValueA, $Extra);

        /**
         * CARTÕES
         */
        foreach ($Matrix as $valMatrix){                
            if($ValueA['pipe_id'] == $valMatrix['matrix_pipeline'] AND $valMatrix['matrix_pipeline_active'] == 1){
                $DateMeeting = _get_data_full(
                   "SELECT `item_value_string` FROM `".TB_MATRIX_ITEMS."` 
                   WHERE `item_key` = 'data_da_reuniao'
                   AND `item_matrix_code` =:a","a={$Matrix[0]['matrix_code']}");
                   
                $Extra['item_key[data_da_reuniao]'] = $DateMeeting[0]['item_value_string'];
                $Extra['item_link_card'] = BASE_ADMIN.'agency/project/'.$valMatrix['matrix_code'];

                _tpl_fill($Card['content'], $valMatrix, $Extra);
            }
        }
        

        _tpl_fill($Card['after'], $Extra, '') ;
    }
}
_tpl_fill($Tpl['after'], $Extra, '');


/**
 * Mensagens de retorno
 */
if(isset($_GET['msg'])){
    switch ($_GET['msg']) {
        case 'mtzcreate':
            _uikit_notification('Matriz criada com sucesso!', 'success');
            break;
    }
}