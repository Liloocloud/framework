<?php
/**
 * Grupos de cases do módulo "Cliente"
 * @copyright Felipe Oliveira - 05.07.2022 - update 16.09.2022
 * @version 2.0.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../../../_Kernel/_Sync.inout.v2.php";

switch ($Action){

    /****************************************************************************
	 * CRIA LISTA DE CATEGORIAS VINDAS DE UM TEXTAREA
	 */
	case 'create/categs/list':
		// $JSON = nl2br($Sync['tax_listing']);
		if(isset($Sync['tax_listing'])){
			$Categs = explode("\n",trim($Sync['tax_listing']));
            $Ids = [];
            if(count($Categs) > 1){
                foreach ($Categs as $Item) {
                    $Check = _get_data_full("SELECT `tax_id` FROM `".TB_TAXONOMIES."` WHERE `tax_name` =:a","a={$Item}");
                    $Check = ($Check)? true : false;			
                    if(!$Check){
                        $Set = _set_data_table(TB_TAXONOMIES, [
                            'tax_account_id' => $_SESSION['account_id'],
                            'tax_meta' => $Sync['tax_meta'],
                            'tax_inner_id' => $Sync['tax_inner_id'],
                            'tax_type' => $Sync['tax_type'],
                            'tax_name' => trim($Item)
                        ]);
                        array_push($Ids, [$Set => trim($Item)]);
                    }	
                }
            }else{
                $Item = trim($Sync['tax_listing']);
                $Check = _get_data_full("SELECT `tax_id` FROM `".TB_TAXONOMIES."` WHERE `tax_name` =:a","a={$Item}");
                $Check = ($Check)? true : false;			
                if(!$Check){
                    $Set = _set_data_table(TB_TAXONOMIES, [
                        'tax_account_id' => $_SESSION['account_id'],
                        'tax_meta' => $Sync['tax_meta'],
                        'tax_inner_id' => $Sync['tax_inner_id'],
                        'tax_type' => $Sync['tax_type'],
                        'tax_name' => $Item
                    ]);
                    array_push($Ids, [$Set => $Item ]);
                }else{
                    $JSON = [
                        'bool' => false,
                        'output' => null,
                        'message' => "Categoria Já existe",
                        'reason' => 'error_create_list_categories',
                        'type' => 'error',
                    ];
                    break;
                }
            }
            $JSON = [
                'bool' => true,
                'output' => $Ids,
                'message' => "Lista de categorias cadastrada com sucesso!",
                'reason' => 'success_create_list_categories',
                'type' => 'success',
            ];
            break;
		}else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Nenhum dado passado",
                'reason' => 'error_create_list_categories',
                'type' => 'error',
            ];
		}
	break;

    /****************************************************************************
	 * RETORNA UMA LISTA DE CATEGORIAS
	 */
    case 'get/categs':
        if($Sync['term'] != null OR !empty($Sync['term'])){
            $fields = "WHERE `tax_account_id` = {$_SESSION['account_id']} AND (";
            foreach ($Sync['fields'] as $field) {
                $fields.= " `{$field}` LIKE '%{$Sync['term']}%' OR";
            }
            $fields = substr($fields, 0, -3).")";
        }else{
            $fields = "WHERE `tax_account_id` = {$_SESSION['account_id']}";
        }
        // Verificando no banco
        $Get = _get_data_full(
            "SELECT * FROM `".TB_TAXONOMIES."` 
            {$fields} 
            ORDER BY `tax_id` DESC 
            LIMIT 7"
        );
        if(!empty($Get)){
            $Get = array_reverse($Get);
            $i = 0;
            foreach ($Get as $Cat) {
                $Get[$i]['tax_registered'] = format_datetime($Cat['tax_registered']);
                $i++;
            }
            // $Get['tax_registered'] = format_datetime($Get['tax_registered']);
            $JSON = [
                'bool' => true,
                'output' => $Get,
                'message' => "Lista carregada com sucesso",
                'reason' => 'success_list_categories',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Nenhuma categoria encontrada",
                'reason' => 'error_list_categories',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * RETORNA CATEGORIA PELO ID PASSADO
	 */
    case 'get/categ/id':
        $Categ = _get_data_table(TB_TAXONOMIES, [ 
            $Sync['fields'][0] => $Sync['id'],
            'tax_account_id' => $_SESSION['account_id']
        ]);
        $Categ = (isset($Categ[0]))? $Categ[0] : null;
        if($Categ){
            $Categ['tax_registered'] = format_datetime($Categ['tax_registered']);
            $JSON = [
                'bool' => true,
                'output' => $Categ,
                'message' => "Categoria encontrada com sucesso",
                'reason' => 'success_get_tax_id',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Categoria não encontrada",
                'reason' => 'error_get_tax_id',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * UPDATE / ATUALIZANDO CATEGORIA
	 */
    case 'update/categ/id';
        $ID = $Sync['tax_id'];
        unset($Sync['tax_id']);
        $Up = _up_data_table(TB_TAXONOMIES, [
            'where' => [ 
                'tax_id' => $ID,
                'tax_account_id' => $_SESSION['account_id']
            ],
            'values' => $Sync
        ]);
        if($Up){
            $JSON = [
                'bool' => true,
                'output' => $Sync,
                'message' => "Categoria atualizada com sucesso!",
                'reason' => 'success_update_categ',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Não foi possível atualizar categoria",
                'reason' => 'error_update_categ',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * DELETE CATEGORIA
	 */
    case 'delete/categ/id':
        $Del = _del_data_table(TB_TAXONOMIES, [
            'tax_id' => $Sync,
            'tax_account_id' => $_SESSION['account_id']
        ]);
        $Del = (isset($Del))? true : false;
        if($Del){
            $JSON = [
                'bool' => true,
                'output' => $Sync,
                'message' => "Categoria excluída com sucesso",
                'reason' => 'success_delete_tax_id',
                'type' => 'success',
            ]; 
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Erro ao excluir categoria",
                'reason' => 'error_delete_tax_id',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * RETORNA UMA LISTA DAS ÚLTIMAS CATEGORIAS CADASTRADAS
	 */
    case 'get/last/categs':
        $Get = _get_data_full(
            "SELECT `tax_id`, `tax_name`
            FROM `".TB_TAXONOMIES."` 
            WHERE `tax_account_id` = {$_SESSION['account_id']}
            ORDER BY `tax_id` DESC 
            LIMIT 5"
        );
        if(!empty($Get)){
            $Get = array_reverse($Get);
            $JSON = [
                'bool' => true,
                'output' => $Get,
                'message' => "Busca finalizada",
                'reason' => 'success_get_last_categs',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Nenhum cliente encontrado. Comece a cadastrar suas categorias!",
                'reason' => 'error_get_last_categs',
                'type' => 'error',
            ];
        }
    break;

}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}