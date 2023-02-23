<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";

switch ($Action){

	/****************************************************************************
	 * CADATRANDO O USUÁRIO E ENVIANDO O CÓDIGO DE 
	 * VALIDAÇÃO PARA O EMAIL INFORMADO
	 */
	case 'create/account/step1':
		if (!isset($Sync['account_name'])) {
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Informe seu Nome',
				'reason' => 'input_empty_name',
				'step'=> 0,
				'type' => 'error',
				'element' => '#msg-step-1',
				'redirect' => ''
			];
			break;
		}
		if (!isset($Sync['account_email'])) {
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Informe seu E-mail',
				'reason' => 'input_empty_email',
				'step'=> 0,
				'type' => 'error',
				'element' => '#msg-step-1',
				'redirect' => ''
			];
			break;
		}
		if (!isset($Sync['account_password'])) {
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Crie sua senha',
				'reason' => 'input_empty_password',
				'step'=> 0,
				'type' => 'error',
				'element' => '#msg-step-1',
				'redirect' => ''
			];
			break;
		}
		if (!isset($Sync['account_accept_terms'])) {
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Você precisa aceitar nosso termo e condição de uso',
				'reason' => 'input_empty_accept_terms',
				'step'=> 0,
				'type' => 'error',
				'element' => '#callback-message',
				'redirect' => ''
			];
			break;
		}	
		$Sync['account_accept_terms'] = ($Sync['account_accept_terms'] == 'on')? 1 : 0;	
		$Acc = new Accounts\Check($Sync['account_email']);
		$Exists  	= $Acc->Exists();
		$Valid   	= $Acc->Auth();
		$Accept		= $Acc->acceptTerms();
		$Status  	= $Acc->Status();

		// Não existi usuário
		if($Exists['bool'] == false){
			$Sync['account_level'] = 8;
			$Pass = new Account\Password();
			$Sync['account_password'] = $Pass->passGenerator($Sync['account_password']);
			
			$User = new Account\Create($Sync);
			$Add = $User->create();

			if($Add['bool']){
				$Send = $User->sendMailConfirm(
					SITE_NAME.' - Valide seu Cadastro para Começar a Anunciar',
					$Sync['account_name'],
					$Sync['account_email']
				);
				
				// Se envio o código de validação
				if($Send['bool']){		
					$_SESSION['account_email'] = $Sync['account_email'];
					$JSON = [
						'bool' => false,
						'output' => $Send['output'],
						'message' => 'Enviamos o código de validação para seu e-mail.',
						'reason' => 'send_code_validate',
						'step'=> '',
						'type' => 'info',
						'element' => '#callback-message',
						'redirect' => BASE.'conta/validacao/'
					];
					$JSON['output']['account_id'] = $Add['output'];
					break;

				// Não enviou o código
				}else{
					$JSON = [
						'bool' => false,
						'output' => $Send['output'],
						'message' => 'Erro ao enviar código de validação. Tente novamente.',
						'reason' => 'error_send_code_validate',
						'step'=> '',
						'type' => 'error',
						'element' => '#callback-message',
						'redirect' => ''
					];
					break;
				}

			// Erro ao tentar criar usuário 				
			}else{
				$JSON = [
					'bool' => false,
					'output' => $Add['output'],
					'message' => 'Erro ao tentar criar sua conta. Tente Novamente.',
					'reason' => 'error_account_created',
					'step'=> '',
					'type' => 'error',
					'element' => '#callback-message',
					'redirect' => ''
				];
				break;
			}

		// Existe o usuário
		}else{
			
			// Usuário está ativo
			if($Status['bool']){				
				$JSON = [
					'bool' => false,
					'output' => null,
					'message' => 'Sua conta já está ativa',
					'reason' => 'account_created',
					'step'=> '',
					'type' => 'info',
					'element' => '#callback-message',
					'redirect' => BASE.'conta/login/?user='.base64_encode($Sync['account_email'])
				];
				break;
			}

			// Verifica se já está validado
			if($Valid['bool']){
				$JSON = [
					'bool' => false,
					'output' => null,
					'message' => 'Sua conta já está ativa',
					'reason' => 'account_created',
					'step'=> '',
					'type' => 'info',
					'element' => '#callback-message',
					'redirect' => BASE.'conta/login/?user='.base64_encode($Sync['account_email'])
				];
				break;
			}
				
		}
	break;

}


if (isset($JSON) && $JSON != null) {
	$_SESSION['CSRF_TOKEN'] = md5(uniqid(mt_rand(), true));
	echo json_encode($JSON);
}