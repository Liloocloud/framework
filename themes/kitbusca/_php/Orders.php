<?php
/**
 * Gerencia Todas as Operações de Solicitação de Orçamento
 * Responsável por gerenciar os pedidos de orçamento
 * @copyright Felipe Oliveira -  16-09-2018
 * @version 2.0
 *
 * @see 'budget_create' 					[Cria um budget e cliente temporariamente]
 * @see 'budget_pin_generator_and_sender'	[Cria e envia o PIN via SMS utilizando PushBullet]
 * @see 'budget_pin_validate'				[Valida o PIN inserido no input do form]
 * @see 'budget_finished'					[Finaliza a Solicitação do serviço]
 */
 
require_once "../../../_Kernel/___Kernel.php";
require_once "../__config.frontend.php";
require_once "../presets/presets.php";
require_once "../../../_Kernel/_Sync.inout.php";

switch ($Action):

	/****************************************************************************
	 * CRIA UMA LINHA NA TABELA BUDGET TEMPORARIAMENTE E
	 * REDIRECIONA O USUÁRIO PARA FIALIZAR A CONFIRMAÇÃO
	 */
	case 'budget_client_create':
		$Data['budget_service_id']  = $Sync['service_id'];
		$Data['budget_group_title'] = $Sync['group_title'];
		$Url = $Sync['service_url'];
		unset($Sync['service_id'], $Sync['service_url'], $Sync['group_title']);

		// Motor que compila os checkbox num JSON
		$Items = [];
		foreach ($Sync as $key => $value) {
			if( preg_match("/add_checkbox\[/", $key) ){
				array_push($Items, $value);
				unset($Sync[$key]);
			}
		}
		$Sync['add_checkbox'] = $Items;
		$Data['budget_details'] 	= json_encode($Sync);			
		
		if($Set = _set_data_table(TB_SMART_BUDGETS, $Data)){
			$_SESSION['budget_id_step_2'] = $Set; // SESSÃO P/ O PROXIMO PASSO
			$JSON['callback'] = __redirectURL('solicitacao/'.$Url.'2/');
		}else{
			$JSON['callback'] = _uikit_notification('Servidor Interno. Tente novamente.', 'error', false);
		}
		break;


	/****************************************************************************
	 * RECEBE O EVENTO DO BOTÃO ENVIAR CÓDIGO PARA GERAR O CÓDIGO,
	 * GUARDAR NA TABELA FLEX_SMART_CLIENTS TEMPORARIAMENTE
	 */
	case 'budget_pin_generator_and_sender':
		// TRATA AS VARIÁVEIS DE ENTRADA
		$budget_id 		= explode(',',$Sync['array'])[0];
		$budget_phone 	= explode(',',$Sync['array'])[1];	
		// VALIDA O TELEFONE PARA PREPARAR O DISPARO
		if(_frontend_phone_validate($budget_phone)):		
			// GERA O CÓDIGO PIN				
			$PIN = (string) rand(1000,9999);	
			// GUARDA O PIN NO BANCO SE EXISTIR
 			if(_up_data_table(TB_SMART_BUDGETS, [	
				'where' =>[ 'budget_id' => $budget_id ],
				'values'=>[ 
					'budget_pin'		=> $PIN, 
					'budget_phones' 	=> $budget_phone,
					'budget_register' 	=> date('Y-m-d H:i:s')
				]])):
				// DISPARA O SMS
				$SMS = new PushBullet(
					SITE_CONFIG['PUSH_BULLET_TOKEN'],
					SITE_CONFIG['PUSH_BULLET_DEVICE'],
					SITE_CONFIG['PUSH_BULLET_USER']
				);
				$SMS->Phone($budget_phone);
				$SMS->Message("VAMOVE: Insira o cógido {$PIN} para confirmar seu orçamento");
				// SMS ENVIADO COM SUCESSO
				if($SMS->SMS()):
					$JSON['callback'] = _uikit_notification('Você ira receber uma mensagem em seu smartphone', 'info', false);
					$JSON['callback'].= '<script>';
					$JSON['callback'].= "$('.code_resend').show();";
					$JSON['callback'].= "$('.code_send').hide();";
					$JSON['callback'].= "$('input[name=\"budget_pin\"]').focus();";
					// $JSON['callback'].= "$('input[name=\"budget_phones\"]').attr('disabled','disabled');";
					$JSON['callback'].= '</script>';
				// SMS NÃO ENVIADO
				else:
					$JSON['callback'] = _uikit_notification('Não foi possível enviar código. Tente novamente!', 'error', false);
				endif;
			endif;
		// NÚMERO DE TELEFONE INVÁLIDO
		else:
			$JSON['callback'] = _uikit_notification('Telefone informado não é válido', 'error', false);
		endif;
		break;

	/****************************************************************************
	 * AO DIGITAR O ÚLTIMO NÚMERO DO PIN O SISTEMA DISPARA O EVENTO
	 * PARA VERIFICAR SE O PIN CORRESPONDE AO NÚMERO NA TB, SE FOR TRUE MOSTRA O BOTÃO
	 * FINALIZAR SOLICITAÇÃO, SENÃO PEDE PARA VERIFICAR NOVAMENTE
	 */
	case 'budget_pin_validate':
		// TRATA AS VARIÁVEIS DE ENTRADA
		$Budget = explode(',',$Sync['array'])[0];
		$Phone  = explode(',',$Sync['array'])[1];
		$PIN 	= explode(',',$Sync['array'])[2];
		unset($Sync['array']);

		if(empty($Phone) || strlen($Phone) < 14 ){
			$JSON['callback'] = _uikit_notification('Telefone informado não é válido', 'error', false);
		
		}else{
			// VERIFICA SE O PIN ESTÁ CORRETO E STATUS 0	
			if($PIN = _get_data_table(TB_SMART_BUDGETS, [
				'budget_pin' 	=> $PIN,
				'budget_phones' => $Phone,
				'budget_validation' => 0
				])){
				$PIN = $PIN[0];		
				// VERIFICA SE O PIN EXPIROU PARA ENVIAR O FORMULÁRIO
				if(_do_compare_date_atual($PIN['budget_register']) <= FLEX_CONFIG['time_validation_pin']){
					$JSON['callback'] = '<script>';
					$JSON['callback'].= "$('#flex-form').submit()";
					$JSON['callback'].= '</script>';
				// PIN EXPIROU
				}else{
					$JSON['callback'] = _uikit_notification('PIN Expirou!', 'error', false);
					$JSON['callback'].= '<script>';
					$JSON['callback'].= "$('input[name=\"budget_pin\"]').val('');";
					$JSON['callback'].= '</script>';
				}
			}else{
				// INCORRETO
				$JSON['callback'] = _uikit_notification('PIN Incorreto ou Já validado!', 'error', false);
				$JSON['callback'].= '<script>';
				$JSON['callback'].= "$('input[name=\"budget_pin\"]').val('');";
				$JSON['callback'].= '</script>';
			}
		}
		break;


	/****************************************************************************
	 * FINALIZA A SOLICITAÇÃO DO ORÇAMENTO APÓS A VALIDAÇÃO
	 * E DELETA O PIN DA TB CLIENTE E EFETIVA O ORÇAMENTO NA TB BUDGET
	 */
	case 'budget_finished';
		$budget_id = $Sync['budget_id'];
		$Sync['budget_address']    = $Sync['pluging_address'];
		$Sync['budget_district']   = $Sync['pluging_district'];
		$Sync['budget_city']	   = $Sync['pluging_city'];
		$Sync['budget_state']	   = $Sync['pluging_state'];
		$Sync['budget_validation'] = 1;
		$Sync['budget_pin']    	   = null;
		$Sync['budget_status']	   = 'ativo';
		unset(
			$Sync['budget_id'],
			$Sync['budget_pin'],
			$Sync['pluging_address'],
			$Sync['pluging_district'],
			$Sync['pluging_city'],
			$Sync['pluging_state']
		);

		if(empty($Sync['budget_zipcode']) || strlen($Sync['budget_zipcode']) != 9 || empty($Sync['budget_city'])){
			$JSON['callback'] = '<script>$(".sender").show()</script>';
			$JSON['callback'].= _uikit_notification('CEP Inválido. Informe corretamente', 'error', false);
		
		}elseif(empty($Sync['budget_name'])){
			$JSON['callback'] = '<script>$(".sender").show()</script>';
			$JSON['callback'].= _uikit_notification('Informe seu nome', 'error', false);
		
		}elseif(empty($Sync['budget_email']) || !filter_var($Sync['budget_email'], FILTER_VALIDATE_EMAIL)){
			$JSON['callback'] = '<script>$(".sender").show()</script>';
			$JSON['callback'].= _uikit_notification('E-mail não é válido ou não foi informado', 'error', false);

		}elseif(empty($Sync['budget_phones']) || strlen($Sync['budget_phones']) < 14 ){
			$JSON['callback'] = '<script>$(".sender").show()</script>';
			$JSON['callback'].= _uikit_notification('Telefone informado não é válido', 'error', false);

		}
		else{
			if(_up_data_table(TB_SMART_BUDGETS, [ 
				'where'  => [ 'budget_id' => $budget_id ], 
				'values' => $Sync
			])){
				unset($_SESSION['budget_id_step_2']);
				$JSON['callback'] = __redirectURL('solicitacao/success/');
			}else{
				$JSON['callback'] = _uikit_notification('Interno! Não encontramos seu orçamento', 'error', false);
			}
		}
		break;

endswitch;
if($JSON!=null)
	echo json_encode($JSON);