<link rel="stylesheet" href="<?= $This[$Module]['DASH_ROUTES_BASE'] ?>project/style.css">
<?php
/**
 * Controladora da página Home do tema Comida di praia
 * @copyright Felipe Oliveira Lourenço - 18.03.2022
 */






// arvore de links
$ID =  URL()[3];
$Type = URL()[2];

$Extra['styleCss'] = $This[$Module]['DASH_ROUTES_BASE'].'project/style.css';

$All = _get_data_full(
    "SELECT * FROM `".TB_MATRIX."`
    INNER JOIN `".TB_CLIENTS."` ON ".TB_MATRIX.".matrix_client_id = ".TB_CLIENTS.".client_id
    WHERE ".TB_MATRIX.".matrix_pipeline_active = 1
    AND ".TB_MATRIX.".matrix_code = :a","a=".$ID."");   
$All = isset($All[0])? $All[0] : false;
if($All){
    $Items = _get_data_table(TB_MATRIX_ITEMS, ['item_matrix_code' => $ID]);
    $Items = isset($Items)? $Items : false;
    if($Items){
        $All = array_merge($All, ["all_items" => $Items]);      
    } 
}

var_dump($All);

/**
 * Redirecionamento para o template correspondente
 */
// switch ($Type) {
//     case 'kanban':
//         $Type = 'Template de Tarefas seguindo a pipeline atual';
//         break;
    
//     default:
//         $Type = 'Definir template padrão';
//         break;
// }


// var_dump(
//     $All['matrix_pipeline'],
//     $Type
// );


// _tpl_fill($This[$Module]['DASH_ROUTES_ROOT'].'project/project.tpl', $Extra, $All);




// $Pipe = _get_data_table('liloo_matrix_pipeline');

// $Matrix = _get_data_table('liloo_matrix', [
//     'matrix_code' => URL()[1],
//     'matrix_pipeline_active' => 1
// ]);

// $Pipe = _get_data_table('liloo_matrix_pipeline', [
//     'pipe_id' => $Matrix[0]['matrix_pipeline']
// ]);

// $Sectors = _get_data_table('liloo_matrix_sectors');


// var_dump(
//     $Matrix, $Pipe, $Sectors
// );

?>
