<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

 require_once "../../../../../_Kernel/___Kernel.php";
require_once "../../../../../_Kernel/_Sync.inout.v2.php";

$Line = null;
switch ($Action){

	/****************************************************************************
	 * VALIDA O CÓDIGO DE RECUPERAÇÃO DE SENHA
	 */
	case 'redefine/validate/passaword/account':
		// Verifica se e-mail hidden existe
		if (!isset($Sync['account_email']) || empty($Sync['account_email'])) {
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Não foi possível identificar a conta. <b><a href="'.BASE.'conta/redefinir-senha/">Recuperar</a></b>',
				'reason' => 'input_not_email',
				'step'=> '',
				'type' => 'error',
				'element' => '#callback-message',
				'redirect' => ''
			];
			break;
		}
		// Verifica se o código foi passado
		if (!isset($Sync['account_activation_key'])) {
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Informe o código de recuperação.',
				'reason' => 'input_not_code_validate',
				'step'=> '',
				'type' => 'error',
				'element' => '#callback-message',
				'redirect' => ''
			];
			break;
		}
		$Account = new Accounts\Check($Sync['account_email']);
		$Exists 	= $Account->Exists();
		$TimeAuth  	= $Account->diffDate(TIME_VALIDATE_ACCOUNT);
		$ValidKey 	= $Account->validateAuthKey($Sync['account_activation_key']);

		if($Exists['bool']){
			if($TimeAuth['bool']){
				if($ValidKey['bool']){
					$_SESSION['account_email'] = $Sync['account_email'];
					$_SESSION['account_approved'] = $Sync['account_activation_key'];
					$JSON = [
						'bool' => false,
						'output' => null,
						'redirect' => BASE.'conta/trocar-senha/'
					];
					break;
				}else{
					$JSON = [
						'bool' => false,
						'output' => null,
						'message' => 'Código inválido. <b><a href="'.BASE.'conta/redefinir-senha/">Solicitar novamente</a></b>',
						'reason' => 'code_validate_invalid',
						'step'=> '',
						'type' => 'info',
						'element' => '#callback-message',
						'redirect' => ''
					];
					break;
				}
			}else{
				session_destroy();
				$JSON = [
					'bool' => false,
					'output' => null,
					'message' => 'Código expirou. <b><a href="'.BASE.'conta/redefinir-senha/">Solicitar novamente</a></b>',
					'reason' => 'code_validate_expired',
					'step'=> '',
					'type' => 'info',
					'element' => '#callback-message',
					'redirect' => ''
				];
				break;
			}
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Essa conta não existe. <b><a href="'.BASE.'conta/cadastre-se/">Cadastre-se</a></b>',
				'reason' => 'account_not_exists',
				'step'=> '',
				'type' => 'info',
				'element' => '#callback-message',
				'redirect' => ''
			];
			break;
		}
	break;

	/****************************************************************************
	 * CADATRANDO O USUÁRIO E ENVIANDO O CÓDIGO DE VALIDAÇÃO
	 * PARA O EMAIL INFORMADO
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
				'element' => '#msg-step-1',
				'redirect' => ''
			];
			break;
		}
		
		$Sync['account_accept_terms'] = ($Sync['account_accept_terms'] == 'on')? 1 : 0;	
		$Acc = new Accounts\Check($Sync['account_email']);
		$Exists  	= $Acc->Exists();
		$AuthKey 	= $Acc->AuthKey();
		$TimeAuth  	= $Acc->diffDate(TIME_VALIDATE_ACCOUNT);
		$Valid   	= $Acc->Auth();
		$PassExists = $Acc->passwordExists();
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
						'element' => '#msg-step-2',
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
						'element' => '#msg-step-1',
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
					'element' => '#msg-step-1',
					'redirect' => ''
				];
				break;
			}

		// Existe o usuário
		}else{
			
			
			// Verifica se a chave de validação existe
			if($AuthKey['bool']){
				
				// Verifica se o tempo da validação não expirou
				if($TimeAuth['bool']){

					// Verifica se já está validado
					if($Valid['bool']){	
						
						// Verifica se o usuário possui senha
						if($PassExists['bool']){
							
							// Verifica se o usuário aceitou os termos
							if($Accept['bool']){
								
								// Verifica se o status está ativo e Redireciona para o login
								if($Status['bool']){
									
									$JSON = [
										'bool' => false,
										'output' => null,
										'message' => 'Sua conta já está ativa',
										'reason' => 'account_created',
										'step'=> '',
										'type' => 'info',
										'element' => '#msg-step-1',
										'redirect' => BASE.'conta/login/?user='.base64_encode($Sync['account_email'])
									];
									break;
								
								// Conta inativado por politica
								} else {
									$JSON = [
										'bool' => false,
										'output' => null,
										'message' => 'Sua conta foi desativada. Entre com contato com nosso suporte. <a href="'.BASE.'conta/suporte/">Fale conosco</a>',
										'reason' => 'account_inactive',
										'step' => '',
										'type' => 'alert',
										'element' => '#msg-step-1',
										'redirect' => ''
									];
									break;
								}						

							// Não aceitou os termos
							}else{
								$JSON = [
									'bool' => false,
									'output' => null,
									'message' => 'Você ainda não aceitou os termos e condições de uso',
									'reason' => 'not_accept_terms',
									'step' => 3,
									'type' => 'info',
									'element' => '#msg-step-4',
									'redirect' => ''
								];
								break;
							}

						// Vai para o Step 3 (Criação da Senha)
						} else {
							$JSON = [
								'bool' => false,
								'output' => null,
								'message' => 'Você precisa criar sua senha',
								'reason' => 'not_password',
								'step' => 2,
								'type' => 'info',
								'element' => '#msg-step-3',
								'redirect' => ''
							];
							break;
						}
					} else {
						$JSON = [
							'bool' => false,
							'output' => null,
							'message' => 'Você precisa validar sua conta. Caso não tenha recebido o código de validação, clique em reenviar código',
							'reason' => 'not_validate',
							'step' => 1,
							'type' => 'info',
							'element' => '#msg-step-2',
							'redirect' => ''
						];
						break;
					}

				} else {
					$JSON = [
						'bool' => false,
						'output' => null,
						'message' => 'Seu código excedeu o tempo para validar. Clique em reenviar código. Você receberá um novo código em seu e-mail',
						'reason' => 'time_expired',
						'step' => 1,
						'type' => 'error',
						'element' => '#msg-step-2',
						'redirect' => ''
					];
					break;
				}

			// A chave não existe então envia
			} else {
				$User = new Account\Create($Sync);
				$Send = $User->resendMailConfirm(
					SITE_NAME.' - Valide seu Cadastro para Começar a Anunciar',
					$Sync['account_name'],
					$Sync['account_email']
				);
				if($Send['bool']){
					$JSON = [
						'bool' => false,
						'output' => null,
						'message' => 'Reenviamos o código de validação para seu e-mail',
						'reason' => 'resend_cod_validate',
						'step' => 1,
						'type' => 'info',
						'element' => '#msg-step-2',
						'redirect' => ''
					];
					break;
				}else{
					$JSON = $Send;
					break;
				}				
			}
			break;
		}
	break;

}

// if(isset($_SESSION['account_level']) && $_SESSION['account_level'] >= 10){
    // $JSON['LINE'] = $Line;
// }
if (isset($JSON) && $JSON != null) {
	$_SESSION['CSRF_TOKEN'] = md5(uniqid(mt_rand(), true));
	// if (isset($JSON['notify'])) {
	//     $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
	// }
	echo json_encode($JSON);
}
