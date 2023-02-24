<?php
require_once "../../../../../_Kernel/___Kernel.php";
require_once "../../../portal.config.php";
require_once "../../../../../_Kernel/_Sync.inout.v2.php";

switch ($Action):

    /****************************************************************************
     * CADASTRANDO NOVA CATEGORIA EM TAXONOMIES
     */
    case 'categories/refresh':
        if(isset($Sync)){
            
            if(!_get_data_table(TB_TAXONOMIES)){
                $JSON = [
                    'bool' => false,
                    'message' => 'Nenhuma categoria cadastrada'
                ];
                break;
            }

            $Level_1 = _get_data_full(
                "SELECT 
                `tax_id`,
                `tax_name`
                FROM `".TB_TAXONOMIES."` 
                WHERE `tax_inner_id` =:a 
                AND `tax_meta` =:b
                ","a=categ&b=portal");
            $i=0;
            $Inner = [];
            foreach ($Level_1 as $InnerOne) {
                
                $Level_2 = _get_data_full(
                    "SELECT 
                    `tax_id`,
                    `tax_name` 
                    FROM `".TB_TAXONOMIES."` 
                    WHERE `tax_inner_id` =:a
                    ORDER BY `tax_id` DESC","a={$InnerOne['tax_id']}");
                    
                $InnerOne['tax_sub'] =  $Level_2;
                $Inner[$i] = $InnerOne;         
            $i++;
            }       

            if($Inner){
                $JSON = [
                    'bool' => true,
                    'output' => $Inner
                ];
                break;
            }else{
                $JSON = [
                    'bool' => false,
                    'message' => 'Erro ao carregar categorias. Recarrega a página'
                ];
                break;
            }
        }
    break;
    
    /****************************************************************************
     * CADASTRANDO NOVA CATEGORIA EM TAXONOMIES
     */
    case 'categories/create':
        if(isset($Sync['data']) && isset($Sync['type'])){
            $Check = _get_data_table(TB_TAXONOMIES, [
                'tax_name' => $Sync['data'],
                'tax_inner_id' => 'categ',
                'tax_meta' => $Sync['type']
            ]);
            if(!$Check){
                $Set = _set_data_table(TB_TAXONOMIES, [
                    'tax_meta' => $Sync['type'],
                    'tax_name' => (string) trim($Sync['data'])
                ]);
                if($Set){
                    $JSON = ['bool' => true,'message' => 'Categoria adicionada com sucesso'];
                }else{
                    $JSON = ['bool' => false,'message' => 'Não possível adicionar Categoria'];
                }
            }else{
                $JSON = ['bool' => false,'message' => 'Categoria já existe'];
            }        
        }else{
            $JSON = ['bool' => false,'message' => 'Erro de Conexão: Tente Novamente']; 
        }
    break;

    /****************************************************************************
     * CADASTRANDO NOVA SUBCATEGORIA EM TAXONOMIES
     */
    case 'categories/create/subcat':
        if(isset($Sync['data']) && isset($Sync['id']) && isset($Sync['type'])){
            $Check = _get_data_table(TB_TAXONOMIES, [
                'tax_inner_id' => $Sync['id'],
                'tax_name' => $Sync['data'],
                'tax_meta' => $Sync['type']
            ]);
            if(!$Check){
                $Set = _set_data_table(TB_TAXONOMIES, [
                    'tax_inner_id' => $Sync['id'],
                    'tax_meta' => $Sync['type'],
                    'tax_name' => (string) trim($Sync['data'])
                ]);
                if($Set){
                    $JSON = [
                        'bool' => true,
                        'output' => (string) trim($Sync['data']),
                        'message' => 'Subcategoria adicionada com sucesso'
                    ];
                }else{
                    $JSON = ['bool' => false, 'message' => 'Não possível adicionar Subcategoria'];
                }
            }else{
                $JSON = ['bool' => false, 'message' => 'Subcategoria já existe'];
            }
        }else{
            $JSON = ['bool' => false, 'message' => 'Erro de Conexão: Tente Novamente']; 
        }
    break;

    /****************************************************************************
     * ATUALIZAR SUBCATEGORIA EM TAXONOMIES
     */
    case 'update_taxonomy_subcat':
        if(isset($Sync['data'])){
            $Sync = explode(',', $Sync['data']);
            usleep(250000);
            $Up = _up_data_table(TB_TAXONOMIES, [
                'where' => ['tax_id' => $Sync[0]],
                'values' => ['tax_name' => $Sync[1]]
            ]);             
            if($Up){
                $JSON['notify'] = ["Subcategoria atualizada com sucesso!", 'success'];
                $JSON['callback'] = '<script>setInterval(function(){document.location.reload(true)}, 1500)</script>';
            }else{
                $JSON['notify'] = ["Não foi possível atualizar subcategoria. Tente novamente", 'error'];
            }
        }else{
            $JSON['notify'] = ["Erro de Conexão: Tente Novamente", 'error'];
        }
    break;

    /****************************************************************************
     * EXCLUIR NOVA SUBCATEGORIA EM TAXONOMIES
     */
    case 'delete_taxonomy_subcat':
        usleep(950000);
        if($Sync['data']){
            $Del = _del_data_table(TB_TAXONOMIES, ['tax_id' => (int) $Sync['data']]);
            if($Del){
                $JSON['notify'] = ['A subcategoria excluída com sucesso', 'success'];
                $JSON['callback'] = '<script>setInterval(function(){document.location.reload(true)}, 1500)</script>';
            }else{
                $JSON['notify'] = ['Não possível excluir a Subcategoria', 'error'];
            }
        }else{
            $JSON['notify'] = ["Erro de Conexão: Tente Novamente", 'error']; 
        }
    break;
 
    /****************************************************************************
     * CATEG SELECT -> SUBCATEG
     */
    case 'select_subcateg_per_categ':
        $JSON['callback'] = '<script>';
        $JSON['callback'].= '$("#item_category").removeClass("uk-form-danger");';
        $JSON['callback'].= '</script>';
        if(isset($Sync['data'])){
            $SubCateg = _get_data_full("SELECT `tax_id`,`tax_name` FROM `".TB_TAXONOMIES."` WHERE `tax_inner_id` =:a","a={$Sync['data']}");
            $SubCateg = (isset($SubCateg))? $SubCateg : false;
            if($SubCateg){
                $Opt = '';
                foreach ($SubCateg as $val) {
                    $Opt.= "<option value=\"{$Sync['data']},{$val['tax_id']}\">{$val['tax_name']}</option>";
                }
                $JSON['array'][0] = [ 
                    'element' => '#item_subcategory',
                    'content' => $Opt
                ];
            }else{
                $JSON['callback'] = '<script>$("#item_category").addClass("uk-form-danger").focus();</script>';
            }
        }else{
            $JSON['notify'] = ["Erro de Conexão: Tente Novamente", 'error'];
        }
    break;

endswitch;

if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}