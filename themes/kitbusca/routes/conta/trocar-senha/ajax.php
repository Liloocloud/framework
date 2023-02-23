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
	 * ENVIA UM EMAIL COM O LINK PARA REDEFINIR A SENHA DO USUÁRIO
	 * PERMITINDO APENAS 2 MINUTO PARA ISSO
	 */
	case 'change/passaword/account':	
		// verificar se senha existe
		if (!isset($Sync['account_password'])) {
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Cria uma nova senha',
				'reason' => 'input_empty_password',
				'step'=> '',
				'type' => 'error',
				'element' => '#callback-message',
				'redirect' => ''
			];
			break;
		}
		// verificar se repetir senha existe
		if (!isset($Sync['account_password_repeat'])) {
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Repita a sua nova senha',
				'reason' => 'input_empty_password_repeat',
				'step'=> '',
				'type' => 'error',
				'element' => '#callback-message',
				'redirect' => ''
			];
			break;
		}
		// Verificar se as senhas conhecidem
		if($Sync['account_password'] != $Sync['account_password_repeat']){
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'As senhas não são iguais. Repitar a mesma senha',
				'reason' => 'passwords_not_equal',
				'step'=> '',
				'type' => 'error',
				'element' => '#callback-message',
				'redirect' => ''
			];
			break;
		}
		// Verificar se o telefone foi digitado
		if(!isset($Sync['account_phone'])){
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Digite o telefone',
				'reason' => 'input_not_phone',
				'step'=> '',
				'type' => 'error',
				'element' => '#callback-message',
				'redirect' => ''
			];
			break;
		}
		// Verificar se o token existe
		if(empty($Sync['account_approved']) || !isset($Sync['account_approved'])){
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Não foi possível identificar o link de recuperação',
				'reason' => 'not_link_identify',
				'type' => 'error',
				'element' => '#callback-message',
			];
			break;			
		}
		// Verifica o token é válido
		$key = hash('sha256', base64_decode($Sync['account_approved']));
        $Check = _get_data_full("
			SELECT 
			`account_id`,
			`account_activation_key`,
			`account_phone`,
			`account_modify`
			FROM `".TB_ACCOUNTS."` WHERE `account_activation_key`=:a LIMIT 1","a={$key}");
        $User = (isset($Check[0]))? true : false;
		if($User){
			
			// Verificar se o link não expirou
			$init = $Check[0]['account_modify'];
			$date = date("Y-m-d H:i:s");
			$time = (strtotime($date) - strtotime($init)) / 60;
			if ($time <= TIME_VALIDATE_ACCOUNT) {
				
				// Testa o Campo Telefone (Podendo ser CPF/CNPJ no futuro)
				if($Sync['account_phone'] == $Check[0]['account_phone']){

					// Trocar senha e deixa o campo active key null
					$Pass = new Account\Password();
					$Sync['account_password'] = $Pass->passGenerator($Sync['account_password_repeat']);
					$Up = _up_data_table(TB_ACCOUNTS, [
						'where' => [ 'account_email' => $Sync['account_email'] ],
						'values' => [ 
							'account_password' => $Sync['account_password'],
							'account_activation_key' => null
						]
					]);
					if($Up){
						$JSON = [		
							'bool' => false,
							'output' => null,
							'message' => 'Senha alterada com sucesso. Vamos redirecinar para o login',
							'reason' => 'pass_update',
							'type' => 'success',
							'element' => '#callback-message',
							'redirect' => BASE.'conta/login/?user='.base64_encode($Sync['account_email'])
						];
						break;
					}else{
						$JSON = [		
							'bool' => false,
							'output' => null,
							'message' => 'Não foi possível alterar senha. <b><a href="'.BASE.'conta/redefinir-senha/">Recuperar novamente</a></b>',
							'reason' => 'not_update_password',
							'type' => 'error',
							'element' => '#callback-message',
						];
						break;
					}
				} else {
					$JSON = [		
						'bool' => false,
						'output' => null,
						'message' => 'O telefone não corresponde a conta que está tentando recuperar',
						'reason' => 'phone_not_account',
						'step'=> '',
						'type' => 'error',
						'element' => '#callback-message',
						'redirect' => ''
					];
					break;
				}

			} else{
				$JSON = [
					'bool' => false,
					'output' => null,
					'message' => 'Seu link de recuperação expirou. <b><a href="'.BASE.'conta/redefinir-senha/">Recuperar</a></b>',
					'reason' => 'link_expired',
					'step'=> '',
					'type' => 'error',
					'element' => '#callback-message',
					'redirect' => ''
				];
				break;
			}
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Solicitação de recuperação inválida. <b><a href="'.BASE.'conta/redefinir-senha/">Recuperar</a></b>',
				'reason' => 'link_invalid',
				'step'=> '',
				'type' => 'error',
				'element' => '#callback-message',
				'redirect' => ''
			];
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
