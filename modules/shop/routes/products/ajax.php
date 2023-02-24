<?php
/**
 * Grupos de cases do módulo "Cliente"
 * @copyright Felipe Oliveira - 05.07.2022 - update 16.09.2022
 * @version 2.0.0
 */

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";
require_once "../../shop.config.php";

switch ($Action){

    /****************************************************************************
	 * RETORNA UMA LISTA DE PRODUTOS
	 */
    case 'get/products':
        if($Sync['term'] != null OR !empty($Sync['term'])){
            $fields = "WHERE `prod_account_id` = {$_SESSION['account_id']} AND (";
            foreach ($Sync['fields'] as $field) {
                $fields.= " `{$field}` LIKE '%{$Sync['term']}%' OR";
            }
            $fields = substr($fields, 0, -3).")";
        }else{
            $fields = "WHERE `prod_account_id` = {$_SESSION['account_id']}";
        }
        $Get = _get_data_full(
            "SELECT * FROM `".TB_SHOP_PRODUCTS."` 
            {$fields} 
            ORDER BY `prod_id` DESC 
            LIMIT 7"
        );
        if(!empty($Get)){
            $Get = array_reverse($Get);
            $i = 0;
            foreach ($Get as $Cat) {
                $Get[$i]['prod_registered'] = format_datetime($Cat['prod_registered']);
                $Get[$i]['prod_cover'] = (!empty($Cat['prod_cover']))? BASE_UPLOADS.$Cat['prod_cover'] : $This['shop']['MODULE_BASE'].'assets/img/cover-default.jpg';
                $Get[$i]['prod_price'] = number_format($Cat['prod_price'], 2, ',','.');
                $Get[$i]['prod_amount'] = ($Cat['prod_amount'] == null)? 0 : $Cat['prod_amount'] ;     
                switch ($Get[$i]['prod_status']) {
                    case 'draft': $Get[$i]['prod_status'] = 'Rascunho';  break;
                    case 'publish': $Get[$i]['prod_status'] = 'Publicado';  break;
                    case 'trash': $Get[$i]['prod_status'] = 'Lixeira';  break;
                }
                $i++;
            }
            $JSON = [
                'bool' => true,
                'output' => $Get,
                'message' => "Lista carregada com sucesso",
                'reason' => 'success_list_products',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Nenhum produto encontrado",
                'reason' => 'error_list_products',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * RETORNA O PRODUTO PELO ID PASSADO
	 */
    case 'get/product/id':
        $Categ = _get_data_table(TB_SHOP_PRODUCTS, [ 
            $Sync['fields'][0] => $Sync['id'],
            'prod_account_id' => $_SESSION['account_id']
        ]);
        $Categ = (isset($Categ[0]))? $Categ[0] : null;
        if($Categ){
            $Categ['prod_registered'] = format_datetime($Categ['prod_registered']);
            switch ($Categ['prod_status']) {
                case 'draft': $Categ['prod_status'] = 'Rascunho';  break;
                case 'publish': $Categ['prod_status'] = 'Publicado';  break;
                case 'trash': $Categ['prod_status'] = 'Lixeira';  break;
            }
            $JSON = [
                'bool' => true,
                'output' => $Categ,
                'message' => "Produto encontrado com sucesso",
                'reason' => 'success_get_prod_id',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Produto não encontrado",
                'reason' => 'error_get_prod_id',
                'type' => 'error',
            ];
        }
    break;
    
    /****************************************************************************
	 * DELETE PRODUTO
	 */
    case 'delete/product/id':
        $Del = _del_data_table(TB_SHOP_PRODUCTS, [
            'prod_id' => $Sync,
            'prod_account_id' => $_SESSION['account_id']
        ]);
        $Del = (isset($Del))? true : false;
        if($Del){
            $JSON = [
                'bool' => true,
                'output' => $Sync,
                'message' => "Produto excluído com sucesso",
                'reason' => 'success_delete_prod_id',
                'type' => 'success',
            ]; 
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => "Erro ao excluir produto",
                'reason' => 'error_delete_prod_id',
                'type' => 'error',
            ];
        }
    break;   

    /****************************************************************************
	 * ATUALIZA O PRODUTO PASSANDO OS CAMPOS A SEREM ATUALIZADOS PELO ID
	 */
    case 'update/product/fields/id':
        $JSON = [
            'bool' => true,
            'output' => $Sync,
            'message' => "Produto atualizado com sucesso",
            'reason' => 'success_update_prod_fiedls_by_id',
            'type' => 'success',
        ];
    break;









    /****************************************************************************
	 * INSERIR PRODUTO
	 */
	case 'create/product':        
        if(!empty($Sync)){   
            $Sync['prod_id'] = (int) $Sync['prod_id'];
            $Sync['prod_account_id'] = (int) $_SESSION['account_id'];
            $Sync['prod_price'] = (float) $Sync['prod_price'];
            $Sync['prod_price_promotional'] = (float) $Sync['prod_price_promotional'];
            $Sync['prod_price_show'] = ($Sync['prod_price_show'] == 'on')? 1 : 0;

            $Check = _get_data_full(                
                "SELECT `prod_id` 
                FROM `".TB_SHOP_PRODUCTS."` 
                WHERE `prod_code` =:a"
                ,"a={$Sync['prod_code']}"
            );
            $Check = ($Check)? true : false;			          
            if(!$Check){                
                $Set = _set_data_table(TB_SHOP_PRODUCTS, $Sync);
                if($Set){
                    $JSON = [
                        'bool' => true,
                        'output' => $Set,
                        'message' => "Produto cadastrado com sucesso!",
                        'reason' => 'success_create_product',
                        'type' => 'success',
                    ];
                    break;
                }else{
                    $JSON = [
                        'bool' => false,
                        'output' => null,
                        'message' => "Não foi possível cadastrar produto",
                        'reason' => 'error_create_product',
                        'type' => 'error',
                    ];
                    break;
                }
                
            }else{
                $JSON = [
                    'bool' => false,
                    'output' => null,
                    'message' => "O código {$Sync['prod_code']} já existe!",
                    'reason' => 'error_code_product_exists',
                    'type' => 'error',
                ];
                break;
            }
        }
	break;

    /****************************************************************************
	 * CRIA LISTA DE CATEGORIAS VINDAS DE UM TEXTAREA
	 */
	case 'create/categs/list':
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