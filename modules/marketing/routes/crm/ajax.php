<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

if(isset($_SESSION['account_level']) && $_SESSION['account_level'] < 10){
	exit;
}

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../marketing.config.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";

switch ($Action){

    /****************************************************************************
	 * CARREGAMENTO INICIAL DAS PIPELINES COM OS CARDS
	 */
	case 'load/pipelines':
		$Matrix = _get_data_full(
			"SELECT * FROM `".TB_MATRIX."`
			INNER JOIN `".TB_MATRIX_LEADS."`
			ON ".TB_MATRIX.".matrix_lead_id = ".TB_MATRIX_LEADS.".lead_id
			WHERE ".TB_MATRIX.".matrix_pipeline_active = 1
			AND ".TB_MATRIX.".matrix_account_id = {$_SESSION['account_id']} 
			AND ".TB_MATRIX_LEADS.".lead_account_id = {$_SESSION['account_id']}
			ORDER BY ".TB_MATRIX.".matrix_pipeline_queue ASC
        ");

		$Pipe = _get_data_table(TB_MATRIX_PIPELINE);	
		if(!empty($Matrix) && !empty($Pipe)){
			$JSON = [
				'bool' => true,
				'output' => [
					'pipelines' => $Pipe,
					'matrix' => $Matrix
				],
				'message' => 'Resultado de busca',
				'type' => 'success'
			];
			break;
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Resultado de busca',
				'type' => 'error'
			];
		}
	break;


    /****************************************************************************
	 * ALTERA A PIPELINE DOS CARDS ATUALIZANDO OS LINKS
	 */
	case 'alter/pipelines':
		$Pipeline = (int) explode('-',$Sync['Pipeline'])[1];		
		if(isset($Sync['MatrixOrder'])){
			$MatrixOrder = $Sync['MatrixOrder'];		
			foreach ($MatrixOrder as $key => $Code) {
				_up_data_table(TB_MATRIX, [
					'values' => [
						'matrix_pipeline' => $Pipeline,
						'matrix_pipeline_queue' => ($key == null or !isset($key))? '0' : $key
					],
					'where' => [
						'matrix_code' => $Code
					]
				]);
			}
		}
		$JSON = [
			'bool' => true,
			'output' => null,
			'message' => 'Card alterado com sucesso',
			'type' => 'success'
		];
	break;


	/****************************************************************************
	 * RECUPERA TODAS AS INFORMAÇÕES DA MATRIX PASSANDO O CÓDIGO DELA
	 */
	case 'get/matrix/code':
		$Matrix = _get_data_full(
			"SELECT * FROM `".TB_MATRIX."`
			INNER JOIN `".TB_CLIENTS."`
			ON ".TB_MATRIX.".matrix_client_id = ".TB_CLIENTS.".client_id
			WHERE ".TB_MATRIX.".matrix_pipeline_active = 1
			AND ".TB_MATRIX.".matrix_account_id = {$_SESSION['account_id']} 
			AND ".TB_CLIENTS.".client_account_id = {$_SESSION['account_id']}
			AND ".TB_MATRIX.".matrix_code = {$Sync}
        ");
		$Matrix = (isset($Matrix[0]))? $Matrix[0] : null;
		if($Matrix){
			$JSON = [
				'bool' => true,
				'output' => $Matrix,
				'message' => 'Informações da matriz encontradas com sucesso!',
				'type' => 'success'
			];
			break;
		}else{	
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Não foi possível coletar informações da matriz. Tente novamente mais tarde.',
				'type' => 'error'
			];
		}
	break;


    /****************************************************************************
	 * ALTERA A DATA DE CADA CARD
	 */
	case 'followup_update_datetime_pipeline':
		if(!$Sync){
			$JSON['callback'] = 'Nenhum dado para processar';
			break;
		}
		$NewDate = $Sync['data'];
		$JSON['notify'] = ['Data atualizada com sucesso', 'success'];
		$JSON['array'][0] = [ 
			'element' => '.callback-alert', 
			'content' => _uikit_alert('Não foi possível disparar e-mail. A senha criada é '.$Generator, 'error', false)
		];
	break;

	/****************************************************************************
	 * CRIANDO NOVA OPORTUNIDADE
	 */
	case 'followup_create_new_item':

		if(!$Sync){
			$JSON['callback'] = 'Nenhum dado para processar';
			break;
		}

		/** 
		 * Verifica se o cliente existe e inicia o processo, se 
		 * existir coleta o ID e se não existir inclui e retorna o ID inserido
		 * Caso contrario para a execução
		 */
		$ClientCheck = new Client\Read($Sync['client_email']);
		if(!$ClientCheck->check()['BOOL']){
			$Client = _set_data_table(TB_CLIENTS, [
				'client_name' => $Sync['client_name'],
				'client_company_name' => $Sync['client_company_name'],
				'client_company_segment' => $Sync['client_company_segment'],
				'client_email' => $Sync['client_email'],
				'client_whatsapp' => $Sync['client_whatsapp'],
				'client_phone_1' => $Sync['client_phone_1'],
				'client_phone_2' => $Sync['client_phone_2'] 
			]);
			if(!$Client){
				$JSON['notify'] = ['Erro ao localizar o cliente, tente novamente', 'error'];
				break;
			}
		}else{
			$Client = _get_data_full("SELECT `client_id` FROM `".TB_CLIENTS."` WHERE `client_email` =:a","a={$Sync['client_email']}");
			if(isset($Client[0])){
				$Client = $Client[0]['client_id'];
			}else{
				$JSON['notify'] = ['Erro de conexão', 'error'];
				break;
			}
		}

		/**
		 * Registrando a Matrix. Pega a ultima matrix 
		 * registrada e prepara para inserir uma nova. 
		 * Caso contrario para a execução
		 */				
		$newMatrix = _get_data_full("SELECT MAX(`matrix_code`) as LastMatrix FROM `".TB_MATRIX."` LIMIT 1");
		$newMatrix = (isset($newMatrix[0]))? ((int) $newMatrix[0]['LastMatrix'] + 1) : false;
		if($newMatrix){
			$Matrix['matrix_code'] = $newMatrix;
			$Matrix['matrix_account_id'] = (int) $_SESSION['account_id'];
			$Matrix['matrix_client_id'] = (int) $Client;
			$Matrix['matrix_pipeline'] = (int) 1;
			$Matrix['matrix_pipeline_active'] = (int) 1;

			$Matrix = _set_data_table(TB_MATRIX, $Matrix);
			if(!$Matrix){
				$JSON['notify'] = ['Erro ao criar matriz, conexão falhou!', 'error'];
				break;
			}
		}else{
			$JSON['notify'] = ['Erro lógico. Tente novamente!', 'error'];
			break;
		}

		/** 
		 * Registra todos os itens da matrix no banco "matrix_items"
		 * Processa todos os valores de input que sejão respectivos 
		 * a "item_key" e prepara para inserir no banco
		 */
		$Items = [];
		foreach ($Sync as $key => $value) {
			
  			if (mb_strpos($key, 'item_key') !== false) {
				
				$Dec = explode('&#38;',$key);
				$item_key = explode('=', $Dec[0])[1];
				$type = explode('=', $Dec[1])[1];						
				
				$Items['item_key'] = $item_key;
				$Items['item_matrix_code'] = $newMatrix;
				$Items['item_account_id'] = (int) $_SESSION['account_id'];
				$Items['item_client_id'] = (int) $Client;

				switch ($type) {
					case 'string': 
						$Items['item_value_string'] = (string) $value;
						unset(
							$Items['item_value_int'],
							$Items['item_value_float'],
							$Items['item_value_datetime']
						); 
						break;									
					case 'int': 
						$Items['item_value_int'] = (int) $value; 
						unset(
							$Items['item_value_string'],
							$Items['item_value_float'],
							$Items['item_value_datetime']
						); 
						break;									
					case 'float': 
						$Items['item_value_float'] = (float) $value; 
						unset(
							$Items['item_value_string'],
							$Items['item_value_int'],
							$Items['item_value_datetime']
						);
						break;									
					case 'datetime': 
						$date = DateTime::createFromFormat('d/m/Y H:i', $value);
						$Items['item_value_datetime'] = $date->format('Y-m-d H:i:s');;
						unset(
							$Items['item_value_string'],
							$Items['item_value_int'],
							$Items['item_value_float']
						); 
						break;								
				}
			}								
			if(!empty($Items)){			
				$Finish = _set_data_table(TB_MATRIX_ITEMS, $Items);
				if(!$Finish){
					$JSON['notify'] = ['Erro lógico. Tente novamente!', 'error'];
					break;
				}
			}
		}
		
		/**
		 * Finalizando a operação
		 */
		$JSON['callback'] = '<script>UIkit.modal("#modal-new-matrix").hide();</script>';
		$JSON['callback'].= '<script>setTimeout(function(){ window.location.href="'.BASE_ADMIN.'agency/followup/?msg=mtzcreate" }, 50)</script>';
	break;

}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}