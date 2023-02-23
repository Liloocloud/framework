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
	case 'redefine/passaword/account':
		if (!isset($Sync['account_email'])) {
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Informe seu E-mail',
				'reason' => 'input_empty_email',
				'step'=> '',
				'type' => 'error',
				'element' => '#callback-message',
				'redirect' => ''
			];
			break;
		}
		$Account = new Accounts\Check($Sync['account_email']);
		$Exists = $Account->Exists();
		if($Exists['bool']){
			$User = new Account\Create(['account_email' => $Sync['account_email']]);
			$Send = $User->recoverPassword(
				'Recuperação de Senha - '.SITE_NAME,
				$Account->getAll()['account_name'],
				$Sync['account_email']
			);
			if($Send['bool']){
				$_SESSION['account_email'] = $Sync['account_email'];
				$JSON = [
					'bool' => false,
					'output' => $Send['output'],
					'message' => '',
					'reason' => 'sender_solicitation',
					'step'=> '',
					'type' => '',
					'element' => '',
					'redirect' => BASE.'conta/validar-redefinicao/'
				];
				break;
			}else{
				$JSON = [
					'bool' => false,
					'output' => $Send['output'],
					'message' => 'Não foi possível enviar solicitação. Tente novamente!',
					'reason' => 'not_sender_solicitation',
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
