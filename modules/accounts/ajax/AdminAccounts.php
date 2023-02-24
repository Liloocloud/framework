<?php
/**
 * Manutenção de Contas de Todos os usuários
 * Utilizado especialmente pelo superadmin ou developer
 * @copyright Felipe Oliveira - 16-09-2018
 * @version 2.0
 */

if(isset($_SESSION['account_level']) && $_SESSION['account_level'] < 10){
	exit;
}

require_once "../../../_Kernel/___Kernel.php";
require_once "../accounts.config.php";
require_once "../../../_Kernel/_Sync.inout.php";

switch ($Action):

	/****************************************************************************
	 * SISTEMA DE BUSCA DENTRO DO PAINEL INTERNO
	 */
	case 'search_account_dash':
		if($Sync['options'] != 'default'){
			$Opt =  explode(':', $Sync['options']);
			$field = ($Opt[0] == 'id')? 'account_id' : 'account_name';
			$type  = ($Opt[1] == 'asc')? 'ASC' : 'DESC';
			$Order = "ORDER BY `{$field}` {$type}";
		}else{
			$Order = '';
		}
		$Term = (array) trim($Sync['term']);
		$Term = http_build_query($Term);
		$Term = str_replace('0=', '', $Term);
		$Accounts = _get_data_full("
			SELECT * FROM `".TB_ACCOUNTS."` WHERE
			`account_id` LIKE '%{$Term}%' OR
			`account_name` LIKE '%{$Term}%' OR
			`account_lastname` LIKE '%{$Term}%' OR
			`account_email` LIKE '%{$Term}%' 
			{$Order} LIMIT 15
		");
		$Accounts = (isset($Accounts))? $Accounts : false;
		if($Accounts){
			$view = '';
			foreach ($Accounts as $Value){
				$view.= "
				<tr class='item' onclick='item({$Value['account_id']})'>
				<td>{$Value['account_id']}</td>
				<td>{$Value['account_name']}</td>
				<td>{$Value['account_email']}</td>
				<td>{$Value['account_coin']}</td>
				<td>{$Value['account_registered']}</td>
				</a>
				";
			}
			$JSON['array'][0] = [
				'element' => '#list_table',
				'content' => $view
			];
			$JSON['array'][1] = [
				'element' => '#pagination',
				'content' => ''
			];		
		}else{
			$JSON['array'][0] = [
				'element' => '#list_table',
				'content' => ''
			];
		}
		break;

	/****************************************************************************
	 * PREENCHE O FORM APÓS CLICAR NO USUÁRIO PARA ATUALIZAÇÃO DAS INFORMAÇÕES
	 * TENTAR CONSTRUIR UM ALTO PREENCHIMENTO DE CAMPO - 20.04.2021
	 */
	case 'select_account_dash':
		$User = _get_data_full("SELECT * FROM `".TB_ACCOUNTS."`	WHERE `account_id` =:a","a={$Sync['array']}");
		if($User[0]){
			$JSON['array'][0] = [
				'element' => '#account_id',
				'type' => 'input',
				'content' => $User[0]['account_id']
			];
			$JSON['array'][1] = [
				'element' => '#account_level',
				'type' => 'input',
				'content' => ($User[0]['account_level'])? $User[0]['account_level'] : ''
			];
			$JSON['array'][2] = [
				'element' => '#account_name',
				'type' => 'input',
				'content' => ($User[0]['account_name'])? $User[0]['account_name'] : ''
			];
			$JSON['array'][3] = [
				'element' => '#account_email',
				'type' => 'input',
				'content' => ($User[0]['account_email'])? $User[0]['account_email'] : ''
			];
			$JSON['array'][4] = [
				'element' => '#account_coin',
				'type' => 'input',
				'content' => ($User[0]['account_coin'])? $User[0]['account_coin'] : ''
			];
			$JSON['array'][5] = [
				'element' => '#account_status',
				'type' => 'input',
				'content' => ($User[0]['account_status'])? $User[0]['account_status'] : ''
			];
			$JSON['array'][6] = [
				'element' => '.account_id_text',
				'content' => ($User[0]['account_id'])? 'ID - '.$User[0]['account_id'] : ''
			];
			$JSON['array'][7] = [
				'element' => '#account_id_pass',
				'type' => 'input',
				'content' => ($User[0]['account_id'])? $User[0]['account_id'] : ''
			];
			$JSON['array'][8] = [
				'element' => '#account_email_pass',
				'type' => 'input',
				'content' => ($User[0]['account_email'])? $User[0]['account_email'] : ''
			];
			$JSON['array'][9] = [
				'element' => '#account_name_pass',
				'type' => 'input',
				'content' => ($User[0]['account_name'])? $User[0]['account_name'] : ''
			];	
		}
		break;

		/****************************************************************************
		 * ATUALIZAÇÃO DE CONTA DE USUÁRIO
		 */
		case 'update_account_dash':
			$Sync['account_id'] = (int) $Sync['account_id'];
			$Sync['account_level'] = (int) $Sync['account_level'];
			$Sync['account_coin'] = (int) $Sync['account_coin'];
			$Sync['account_status'] = (int) $Sync['account_status'];
			$ID = $Sync['account_id'];
			unset($Sync['account_id']);
			if(_up_data_table(TB_ACCOUNTS,[
				'where' => [ 'account_id' => $ID ],
				'values' => $Sync
			])){
				$JSON['notify'] = ['Conta atualizada com sucesso!', 'success'];
				// $JSON['callback'] = '<script>setTimeout(function(){ window.location.href="'.BASE.'console/accounts/manager/" }, 1400)</script>';
			}else{
				$JSON['notify'] = ['Não foi possível atualizar. Tente novamente.', 'error'];
			}
			break;

		/****************************************************************************
		 * CRIAR CONTA DE USUÁRIO DIRETO PELA DASHBOARD
		 */
		case 'create_account_dash':
			if(filter_var($Sync['account_email'], FILTER_VALIDATE_EMAIL)){
				// Verificar se a conta já existe
				$Account = new \Account\Account;
				$Account->email($Sync['account_email']);
				if(!$Account->checkAccount()){
					$Sync['account_coin'] = (int) $Sync['account_coin'];
					$Sync['account_status'] = (int) $Sync['account_status'];
					$Sync['account_level'] = (int) $Sync['account_level'];
					
					$Generator = 'v'.bin2hex(random_bytes(3));
					$Sync['account_password'] = $Account->passGenerator($Generator);
					// Criar usuário já ativo, sem a necessidade de validação
					$Set = _set_data_table(TB_ACCOUNTS, $Sync);
					if($Set){
						// Enviar um email com a senha para o novo usuário
						$email = new Email\Email();
						$email->add(
							'Sua senha de acesso a plataforma '.SITE_NAME,
							"
							<h3>
							Login: {$Sync['account_email']}<br>
							Senha: {$Generator}
							</h3>
							<a href='".BASE."login/'>".BASE."login/</a>
							<p>Caso ocorra algum problema, entre em contato conosco para que possamos te ajudar</p>
							",
							$Sync['account_name'],
							$Sync['account_email']
						);
						if($email->send()){			
							
							$JSON['callback'] = '<script>UIkit.modal("#modal-overflow").hide();</script>';
							$JSON['callback'].= _uikit_notification('Conta criada com sucesso! A senha criada é '.$Generator, 'success', false);
							$JSON['callback'].= '<script>setTimeout(function(){ window.location.href="'.BASE_ADMIN.'_account/update-account/" }, 1400)</script>';

						}else{
							$JSON['array'][0] = [ 'element' => '.callback-alert', 'content' => 
								_uikit_alert('Não foi possível disparar e-mail. A senha criada é '.$Generator, 'error', false)
							];
						}
					}else{
						$JSON['array'][0] = [ 'element' => '.callback-alert', 'content' => 
							_uikit_alert('Não foi possível criar usuário. Tente novamente.', 'error', false)
						];
					}
				}else{
					$JSON['array'][0] = [ 'element' => '.callback-alert', 'content' => 
						_uikit_alert('Este email já possui conta.', 'info', false)
					];
				}
			}else{
				$JSON['array'][0] = [ 'element' => '.callback-alert', 'content' => 
					_uikit_alert('Digite um e-mail válido.', 'error', false)
				]; 
			}
		break;

			/****************************************************************************
			 * TROCA SENHA DO USUÁRIO PELA DASHBOARD (SUPER ADMIN)
			 */
			case 'change_password_account_dash':
				if(!empty($Sync['account_id']) && !empty($Sync['account_password'])){
					$Account = new Account\Account;
					$Pass = $Account->passGenerator($Sync['account_password']);
					$up = _up_data_table(TB_ACCOUNTS,[
						'where' => [ 'account_id' => $Sync['account_id'] ],
						'values' => [
							'account_password' => $Pass
						]
					]);
					if($up){
						$email = new Email\Email();
						$email->add(
							'Sua nova senha de acesso a plataforma '.SITE_NAME,
							"
							<h3>
							Login: {$Sync['account_email']}<br>
							Senha: {$Sync['account_password']}
							</h3>
							<a href='".BASE."login/'>".BASE."login/</a>
							<p>Caso ocorra algum problema, entre em contato conosco para que possamos te ajudar</p>
							",
							$Sync['account_name'],
							$Sync['account_email']
						);
						$email->send();
						$JSON['array'][0] = [ 
							'element' => '#callback-alert-password', 
							'content' => _uikit_alert('Senha alterada com sucesso. Sua nova senha é '.$Sync['account_password'], 'success', false, '#callback-alert-password')
						];
						$JSON['array'][1] = [
							'element' => 'input[name="account_password"]',
							'type' => 'input',
							'content' => ''
						];	
					}else{
						$JSON['array'][0] = [ 
							'element' => '#callback-alert-password', 
							'content' => _uikit_alert('Não foi possível enviar e-amil.', 'error', false, '#callback-alert-password')
						];
					}
				}else{
					$JSON['array'][0] = [ 
						'element' => '#callback-alert-password', 
						'content' => _uikit_alert('Você não digitou a nova senha.', 'info', false, '#callback-alert-password')
					];
				}
				break;

endswitch;
// Renderização final
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}