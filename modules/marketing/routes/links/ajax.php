<?php
/**
 * Requisição Ajax da rota 'userpage'
 * @copyright Felipe Oliveira - 05.07.2022
 * @version 1.0
 */

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";

switch ($Action){

    case 'test':
        $JSON = [
            'bool' => false,
            'output' => $Sync,
            'message' => 'Estamos no lugar certo agora',
            'type' => 'success'
        ];
    break;



    /****************************************************************************
	 * CARREGAMENTO INICIAL DOS BLOCOS - VINDOS DO BANCO DE DADOS
	 */
    case 'init/widgets':
        $Get = _get_data_table(TB_TEMPLATE_ADDS, ['adds_account_id' => $_SESSION['account_id']]);

        if($Get){
            $JSON = [
                'bool' => true,
                'output' => $Get,
                'message' => 'Lista de widgets',
                'type' => 'success'
            ];
            break;
        }else{
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => 'Nenhum widget encontrado',
                'type' => 'info'
            ];
        }
    break;


    /****************************************************************************
	 * ATUALIZAÇÃO DE CAMPOS DA TABELA TEMPLATE OPTIONS SENDO META=>VALUES 
     * PASSADOS PELO NAME="" DOS CAMPOS. UPDADE GENÉRICO
	 */
    case 'update/meta/values':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_TEMPLATE_OPTIONS, [
                'where' => [ 
                    'opt_account_id' => $_SESSION['account_id'],
                    'opt_meta' => $key
                ],
                'values' => [
                    'opt_values' => $value
                ]
            ]);
            if($Up){
                $JSON = [
                    'bool' => true,
                    'output' => null,
                    'message' => 'Informações atualizadas',
                    'reason' => 'success_update',
                    'type' => 'success',
                ];
            }else{
                $JSON = [
                    'bool' => false,
                    'output' => null,
                    'message' => 'Não foi possível atualizadas informações',
                    'reason' => 'error_update',
                    'type' => 'error',
                ];
                break;
            }
        }        
    break;

    /****************************************************************************
	 * CARREGA TODOS OS WIDGETS CADASTRADOS NO BANCO 
	 */
    case 'portal/userpage/widgets/loading':
        $Widgets = _get_data_table(TB_PORTAL_USERPAGE_WIDGETS);
        $JSON = (isset($Widgets))? $Widgets : null;
    break;

}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}