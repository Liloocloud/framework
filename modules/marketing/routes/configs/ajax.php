<?php
/**
 * Requisição Ajax da rota 'config-tags'
 * @copyright Felipe Oliveira - 12.12.2022
 * @version 1.0
 */

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";
require_once "../../marketing.config.php";

switch ($Action){

    /****************************************************************************
	 * CARREGA TODAS AS INFORMAÇÕES DA ROTA 
	 */
    case 'init/configs':
        $Configs = _get_data_table(TB_OPTIONS, ['opt_account_id' => $_SESSION['account_id']]);
        $url_in_array = in_array('config_email', array_column($Configs, 'opt_meta'));

        $Extra = [];
        foreach ($Configs as $Value){
            $Extra[$Value['opt_meta']] = $Value['opt_values']; 
            // unset($Extra[$Value['opt_meta']]['opt_meta']);
        }
        $JSON = [
            'bool' => true,
            'output' => $Extra,
            'message' => 'Informações coletadas com sucess',
            'reason' => 'success_infos',
            'type' => 'success',
        ];
    break;

    /****************************************************************************
	 * ATUALIZA UM ITEM DA CONFIGURAÇÃO 
	 */
    case 'update/item/field':
        $Test = true;
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 
                    'opt_meta' => $key,
                    'opt_account_id' => $_SESSION['account_id']
                ],
                'values' => [ 'opt_values' => htmlspecialchars($value, ENT_QUOTES) ]
            ]);
            $Test = $Up;
            if($Test == false){
                break;
            }
        }
        if($Test){
            $JSON = [
                'bool' => true,
                'output' => $Sync,
                'message' => 'Informações atualizas com sucess',
                'reason' => 'success_infos',
                'type' => 'success',
            ];
            break;
        }else{
            $JSON = [
                'bool' => true,
                'output' => null,
                'message' => 'Não foi possível atualizar informações',
                'reason' => 'error_infos',
                'type' => 'error',
            ];
        }
    break;

    /****************************************************************************
	 * RETORNA AS PIPELINES ATIVAS
	 */
    case 'get/pipelines':
        $Pipes = _get_data_table(TB_MATRIX_PIPELINE, [
            'pipe_account_id' => $_SESSION['account_id']
        ]);
        $JSON = [
            'bool' => true,
            'output' => $Pipes,
            'message' => 'Informações atualizas com sucess',
            'reason' => 'success_infos',
            'type' => 'success',
        ];
        break;
    break;

    /****************************************************************************
	 * CRIANDO NOVA PIPELINE
	 */
    case 'create/new/pipeline':
        if($Sync['pipe_title']){ 
            $Last = _get_data_full("SELECT MAX(`pipe_queue`) AS 'Last' FROM `".TB_MATRIX_PIPELINE."`");
            $Last = (isset($Last[0]['Last']))? ($Last[0]['Last'] + 1) : 0;
            $Name = _get_data_full(
                "SELECT `pipe_title` FROM `".TB_MATRIX_PIPELINE."` 
                WHERE `pipe_title` = '{$Sync['pipe_title']}'
            ");
            $Name = (isset($Name[0]))? false : true; 
           
            if($Name){
                $Sync['pipe_queue'] = $Last;
                $Sync['pipe_account_id'] = $_SESSION['account_id'];
                $Set = _set_data_table(TB_MATRIX_PIPELINE, $Sync);
                $JSON = [
                    'bool' => true,
                    'output' => [$Sync, $Set],
                    'message' => 'Informações atualizas com sucess',
                    'reason' => 'success_infos',
                    'type' => 'success',
                ];
                break;
            }else{
                $JSON = [
                    'bool' => false,
                    'output' => [$Sync],
                    'message' => 'Já existe uma colune com esse nome. Tente outro!',
                    'reason' => 'error_infos',
                    'type' => 'error',
                    'reason' => 'name_exists'
                ];
                break;
            }           
        }else{
            $JSON = [
                'bool' => false,
                'output' => [$Sync, $Set],
                'message' => 'Informe Nome da Coluna (Pipeline)',
                'reason' => 'error_infos',
                'type' => 'error',
            ];
            break;
        }
        
    break;
    
    /****************************************************************************
	 * EXCLUIR PIPELINE
	 */
    case 'delete/pipeline':
        // Não permite excluir se a pipeline estiver em uso
        $PipeUse = _get_data_full(
            "SELECT `matrix_pipeline` FROM `".TB_MATRIX."` 
            WHERE `matrix_pipeline` = {$Sync} 
            AND `matrix_account_id` = {$_SESSION['account_id']}
        "); 
        $PipeUse = (isset($PipeUse[0]) AND !empty($PipeUse[0]))? false : true;
        if($PipeUse){
            
            $Del = _del_data_table(TB_MATRIX_PIPELINE, [
                'pipe_id' => $Sync,
                'pipe_account_id' => $_SESSION['account_id']
            ]);
            if($Del){
                $JSON = [
                    'bool' => true,
                    'output' => [$PipeUse, $Sync],
                    'message' => 'Pipeline pode ser excluída.',
                    'reason' => 'success_infos',
                    'type' => 'success'
                ];
                break;
            }else{
                $JSON = [
                    'bool' => false,
                    'output' => null,
                    'message' => 'Não foi possível excluir pipeline. Tente novamente!',
                    'reason' => 'error_infos',
                    'type' => 'error'
                ];
                break;
            }
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => 'Existem cartões nessa pipeline, por favor mova todos os cartões depois volte para excluir a pipeline',
                'reason' => 'error_infos',
                'type' => 'error'
            ]; 
        }  
    break; 
    
    /****************************************************************************
	 * RETORNA PIPES PELO ID
	 */
    case 'get/pipeline/id':
        $Get = _get_data_table(TB_MATRIX_PIPELINE, [
            'pipe_account_id' => $_SESSION['account_id'],
            'pipe_id' => $Sync
        ]);
        if($Get){
            $JSON = [
                'bool' => true,
                'output' => $Get,
                'message' => 'Pipeline encontrada.',
                'reason' => 'success_infos',
                'type' => 'success'
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => $Get,
                'message' => 'Pipeline não encontrada.',
                'reason' => 'error_infos',
                'type' => 'error'
            ];
        }
    break;

    /****************************************************************************
	 * RETORNA PIPES PELO ID
	 */
    case 'update/new/pipeline':
        $ID = $Sync['pipe_id'];
        unset($Sync['pipe_id']);
        $Up = _up_data_table(TB_MATRIX_PIPELINE, [
            'where' => [
                'pipe_account_id' => $_SESSION['account_id'],
                'pipe_id' => $ID
            ],
            'values' => $Sync
        ]);
        if($Up){
            $JSON = [
                'bool' => true,
                'output' => [$Up, $Sync],
                'message' => 'Coluna (pipeline) atualizada com sucesso!',
                'reason' => 'success_infos',
                'type' => 'success'
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => 'Não foi possível atualizar coluna (pipeline)',
                'reason' => 'success_infos',
                'type' => 'success'
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

