<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

// if(isset($_SESSION['account_level']) && $_SESSION['account_level'] <a 10){
//     exit;
// }

require_once "../../../../../_Kernel/___Kernel.php";
// require_once "../../__config.theme.php";
require_once "../../../../../_Kernel/_Sync.inout.v2.php";

$Line = null;
switch ($Action){

	/****************************************************************************
	 * 2º PASSO DO CADASTRO
	 */
	case 'account/create/step2':
		if (!isset($Sync['account_email']) || $Sync['account_email'] == '') {
			$JSON = [
				'bool' => false,
				'output' => $Sync,
				'message' => 'Não foi possível localizar a conta. Tente reenviar o código.',
				'reason' => 'not_valid_email',
				'step'=> '',
				'type' => 'error',
				'element' => '#msg-step-2',
				'redirect' => ''
			];
			break;
		}
		if(!isset($Sync['account_activation_key']) || strlen($Sync['account_activation_key']) < 6){
			$JSON = [
				'bool' => false,
				'output' => $Sync,
				'message' => 'Não foi possível localizar o código de validação',
				'reason' => 'not_cod_validate',
				'step'=> '',
				'type' => 'error',
				'element' => '#msg-step-2',
				'redirect' => ''
			];
			break;
		}
		$Check = new Accounts\Check($Sync['account_email']);
		$AuthValid = $Check->Auth();
		$keyExists = $Check->AuthKey();
		$TimeAuth  = $Check->diffDate(TIME_VALIDATE_ACCOUNT);
		$keyValid  = $Check->validateAuthKey($Sync['account_activation_key']);
		
		// Se a conta não foi validada pelo codigo. Continua...
		if($AuthValid['bool'] == 0){
			
			// Verifica se a código Existe
			if($keyExists['bool']){
				
				// Verifica se o tempo expirou e não está ativo

				if($TimeAuth['bool']){
					
					// Verifica se o código é valido
					if($keyValid['bool']){
						$Up = _up_data_table(TB_ACCOUNTS, [
							'where' => [
								'account_email' => $Sync['account_email']
							],
							'values' => [
								'account_auth' => 1,
								'account_status' => 1,
								'account_activation_key' => null
							]
						]);
						if($Up == true){
							$JSON = [
								'bool' => false,
								'output' => null,
								'message' => 'Conta validada com sucesso!',
								'reason' => 'account_validate_success',
								'step'=> '',
								'type' => 'info',
								'element' => '#msg-step-3',
								'redirect' => BASE.'conta/obrigado/'				
							];
							break;
						}else{
							$JSON = [
								'bool' => false,
								'output' => null,
								'message' => 'Não foi possível validar conta',
								'reason' => 'not_valid_account',
								'step'=> '',
								'type' => 'error',
								'element' => '#msg-step-2',
								'redirect' => ''
							];
							break;
						}
					
					// Se o código não for válido
					}else{
						$JSON = [
							'bool' => false,
							'output' => $keyValid,
							'message' => 'Código inválido. Digite o código correto',
							'reason' => 'not_valid_account',
							'step'=> '',
							'type' => 'error',
							'element' => '#msg-step-2',
							'redirect' => ''
						];
						break;
					}
				
				// O tempo para validação expirou
				}else{
					$JSON = [
						'bool' => false,
						'output' => $TimeAuth,
						'message' => 'Seu código excedeu o tempo para validar. Clique em reenviar código. Você receberá um novo código em seu e-mail',
						'reason' => 'time_expired',
						'step'=> 1,
						'type' => 'error',
						'element' => '#msg-step-2',
						'redirect' => ''
					];
					break;
				}

			// O código de validação não existe
			}else{
				$JSON = $keyExists;
				break;
			}
		
		// A conta já foi validada
		}else{
			$JSON = [
				'bool' => false,
				'output' => $keyExists['output'],
				'message' => 'Conta validada com sucesso!',
				'reason' => 'account_already_validate',
				'step'=> 2,
				'type' => 'info',
				'element' => '#msg-step-3',
				'redirect' => ''
			];
			break;
		}
		
	break;


	/****************************************************************************
	 * REENVIA O CÓDIGO DE VALIDAÇÃO PARA O E-MAIL PASSADO ANTERIORMENTE
	 */
	case 'account/resend/activation/key':
		if (!isset($Sync['email']) || $Sync['email'] == '') {
			$JSON = [
				'bool' => false,
				'output' => $Sync,
				'message' => 'Não foi possível localizar a conta.',
				'reason' => 'not_valid_email'
			];
			break;
		}
		$User = new Account\Create(['account_email' => $Sync['email']]);
		$Send = $User->resendMailConfirm(
			SITE_NAME.' - Reenviamos seu Código de Validação',
			$Sync['name'],
			$Sync['email']
		);
		if($Send['bool']){
			$JSON = $Send;
			$JSON['output']['account_id'] = $Send['output'];
			break;
		}else{
			$JSON = $Send;
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
