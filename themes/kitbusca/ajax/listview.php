<?php
/**
 * Ações da listview (Listagem dos anuncios)
 * @copyright Felipe Oliveira - 10.01.2023
 * @version 2.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../__config.theme.php";
require_once "../../../_Kernel/_Sync.inout.v2.php";

function ActionCase($Action, $Sync, $JSON, $Extra = null){
    switch ($Action){

        /****************************************************************************
         * AÇÕES QUE CONTABILIZAM OS CLIQUE NOS BOTOES CORRESPONDENTES NO ANUNCIO 
         * DA LISTVIEW, PODENDO ESTAR EM QUALQUER ROTA DO SISTEMA DESDE QUE OS 
         * COOKIES NÃO SEJAM REPETIDOS
         */
        case 'listview/actions':
            if(isset($Sync['repo_ads_id'])){  
                $Action = new Module\Portal\Reports();
                $Action = $Action->addAction($Sync);
                if(!$Action['bool']){
                    $JSON = [ 
                        'bool' => false, 
                        'message' => 'Erro ao contabilizar ação', 
                        'type' => 'error', 
                        'output' => null
                    ];
                    break;
                }

                // Conversa no whatsapp                         
                $Case = $Action['output']['fields']['repo_key'];
                if($Case == 'click_ads_init_talk_whatsapp'){
                    $CRM = array_merge($Action['output']['fields'], $Sync);                          
                    $Matrix = new Module\Marketing\Matrix;
                    $Lead = $Matrix->addLead([
                        'lead_account_id' => (isset($CRM['repo_account_id'])) ? $CRM['repo_account_id'] : null,
                        'lead_method' => (isset($CRM['repo_key'])) ? $CRM['repo_key'] : null,
                        'lead_whatsapp' => (isset($CRM['repo_whatsapp'])) ? $CRM['repo_whatsapp'] : null,
                        'lead_message' => (isset($CRM['repo_message'])) ? $CRM['repo_message'] : null,
                    ]);                   
                    if($Lead['bool']){
                        $Pipe = $Matrix->addPipe([
                            'matrix_account_id' => $Lead['output']['lead_account_id'],
                            'matrix_lead_id' => $Lead['output']['lead_id']
                        ]);                        
                    }
                    $JSON = [
                        'bool' => ($Lead)? true : false,
                        'message' => ($Lead)? 'Lead adicionado com sucesso' : 'Falha ao adicionar lead',
                        'type' => ($Lead)? 'success' : 'error',
                        'output' => ($Lead)? $Action['output'] : null
                    ];
                    break;
                }

                // Envio do formulário de contato
                if($Case == 'click_ads_send_form'){
                    $CRM = array_merge($Action['output']['fields'], $Sync);
                    $Matrix = new Module\Marketing\Matrix;
                    $Lead = $Matrix->addLead([
                        'lead_account_id' => (isset($CRM['repo_account_id'])) ? $CRM['repo_account_id'] : null,
                        'lead_method' => (isset($CRM['repo_key'])) ? $CRM['repo_key'] : null,
                        'lead_name' => (isset($CRM['repo_name'])) ? $CRM['repo_name'] : null,
                        'lead_email' => (isset($CRM['repo_email'])) ? $CRM['repo_email'] : null,
                        'lead_phone_1' => (isset($CRM['repo_phone'])) ? $CRM['repo_phone'] : null,
                        'lead_subject' => (isset($CRM['repo_subject'])) ? $CRM['repo_subject'] : null,
                        'lead_message' => (isset($CRM['repo_message'])) ? $CRM['repo_message'] : null,
                    ]);
                    if($Lead['bool']){
                        $Pipe = $Matrix->addPipe([
                            'matrix_account_id' => $Lead['output']['lead_account_id'],
                            'matrix_lead_id' => $Lead['output']['lead_id']
                        ]);                       
                        $Email = new Module\Portal\Reports();
                        $Send = $Email->sendForm($CRM, $CRM['repo_account_id']);
                        $JSON = [
                            'bool' => $Send['bool'],
                            'message' => $Send['message'],
                            'output' => null,
                        ];
                        break;
                    }
                    $JSON = [
                        'bool' => ($Lead)? true : false,
                        'message' => ($Lead)? 'Lead adicionado com sucesso' : 'Falha ao adicionar lead',
                        'type' => ($Lead)? 'success' : 'error',
                        'output' => ($Lead)? $Action['output'] : null
                    ];
                    break;
                }
                
                $JSON = [ 
                    'bool' => true, 
                    'message' => 'Ação contabilizada com sucesso', 
                    'type' => 'success', 
                    'output' => $Action['output'] 
                ];    
            } 
        break;   
    }


    return $JSON;
}

echo json_encode(ActionCase($Action, $Sync, $JSON));