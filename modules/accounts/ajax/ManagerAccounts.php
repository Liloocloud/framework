<?php
/**
 * Manutenção de Acesso a Contas. Sendo possível
 * Editar, Criar, Redefinir Senha do Usuário
 * @copyright Felipe Oliveira - 16.09.2018
 * @version 2.0
 */
require_once "../../../_Kernel/___Kernel.php";
require_once "../accounts.config.php";
require_once "../../../_Kernel/_Sync.inout.php";
// require_once ROOT_THEME."__config.theme.php";

switch ($Action):

	/**********************************************************************
	 * LOGIN DO USUÁRIO EM QUALQUE PARTE DA PLATAFORMA
	 * BASTA SETAR OS METODOS QUE A CLASS SE ENCARREGA DE REDIRECIONAR
	 * E MANDAR AS MENSAGENS CONRRESPONDENTES
	 */
	case 'account_login':
		if(!empty($Sync)){
			$Access = new Account\Login($Sync['account_email'], $Sync['account_password']);
			$Login = $Access->login();	
			if($Login['BOOL']){
				usleep(10);
				$JSON['callback'] = _redirect_url(BASE.'admin/');
				break;
			}else{
				$JSON['notify'] = [$Login['MESSAGE'], 'error'];
			}
		}else{
			$JSON['notify'] = ['Preencha os campos abaixo!', 'error'];
		}
	break;

	/**********************************************************************
	 * VALIDATION - VERIFICA SE O USUÁRIO EXISTE E VALIDA SUA CONTA,
	 * APÓS A VALIDAÇÃO REDIRECIONA PARA O LOGIN JÁ INSERINDO O 
	 * EMAIL NO CAMPO E-MAIL E FOCUS NO CAMPO SENHA
	 */	
	case 'account_validation_email':
		$Check = _get_data_table(TB_ACCOUNTS, [ 
			'account_activation_key' => $Sync['array'],
			'account_status' => 0
		]);
		if($Check):
			$Check = $Check[0];
			$time  = _do_compare_date_atual($Check['account_registered']);		
			if($time <= FLEX_CONFIG['time_validation_accout']):		
				if(_up_data_table(TB_ACCOUNTS, [
						'where' => ['account_id' => $Check['account_id']],
						'values' => [
							'account_status' => 1,
							'account_activation_key' => null
						]
					])):					
					$JSON['callback'] = _redirect_url(BASE.'login/'.base64_encode($Check['account_email']).'/?m=success');		
				else:
					$JSON['callback'] = _redirect_url(BASE.'validar-cadastro/novalidate/'); // Não expirou
				endif;
			else:
				$JSON['callback'] = _redirect_url(BASE.'validar-cadastro/resendlink/'); // Expirado
			endif;
		else:
			$JSON['callback'] = _redirect_url(BASE.'validar-cadastro/validaded/'); // link não existe
		endif;
	break;

	/**********************************************************************
	 * EMAIL CREATE - CRIANDO CONTA DE USUÁRIO COM A OPÇÕES DE 
	 * VALIDAÇÃO POR EMAIL. A ACTION IRÁ ENVIAR UM EMAIL COM LINK DE CONFIRMAÇÃO
	 * E DEPOIS REDIRECIONAR O USUÁRIO PARA CRIAÇÃO DA SENHA
	 */
	case 'account_create_email':
		$Account = new \Account\Account;
		$Account->email( $Sync['account_email'] );
		$Get = $Account->getResultsEmail();

		// VERIFICAR SE A CONTA JÁ EXISTE
		if($Get && $Account->checkAccount()):

			// USUÁRIO EXISTE, MAS NÃO ESTÁ VALIDADO
			if($Get['account_status'] == 0):
				@_up_data_table(TB_ACCOUNTS,[
					'where'  => ['account_email' => $Sync['account_email']],
					'values' => ['account_registered' => date("Y-m-d H:i:s")]
				]);
				$link = "".BASE."confirmacao/{$Get['account_activation_key']}"; 
				$Data = ['remetent_name' => $Get['account_name'] , 'remetent_link' => $link ];
				$tpl = _tpl_fill( FLEX_CONFIG['email_link_confirm'], $Data, "", false);
				
				$email = new Email();
				$email->add(
					'Seu link de confirmação de conta',
					$tpl,
					$Get['account_name'],
					$Sync['account_email']
				);
				if($email->send()):
					$JSON['callback'] = _redirect_url(BASE.'validar-cadastro/sendlink/');
				else:
					$JSON['console']  = $email->error()->getMessage();
					$JSON['callback'] = _uikit_notification('Não foi possível enviar o e-mail. Tente novamente!', 'error', false);
				endif;		
			// REDIRECIONA PARA O LOGIN
			else:
				$JSON['callback'] = _redirect_url(BASE.'login/'.base64_encode($Sync['account_email']).'/?m=yesuser' );
			endif;

		// SE A CONTA NÃO EXISTIR
		elseif(!$Account->checkAccount()):
			
			// VERIFICA SE A SENHA DIGITADA CONTEM NO MÍNIMO 6 CARACTERES
			if($Account->passGenerator($Sync['account_password'])):
	
				$Set = _set_data_table(TB_ACCOUNTS, [
					'account_name'  		 => $Sync['account_name'],
					'account_email' 		 => $Sync['account_email'],
					'account_level' 		 => FLEX_CONFIG['level_user_account'],
					'account_status' 		 => 0,
					'account_activation_key' => base64_encode(md5(uniqid(rand(), true))), 
					'account_password' 		 => $Account->passGenerator($Sync['account_password'])
				]);
				
				// CRIA O USUÁRIO
				if($Set):
					$Account->id($Set); 
					$key  = $Account->getResultsID()['account_activation_key'];	
					$link = "".BASE."confirmacao/{$key}"; 
					$Data = ['remetent_name' => $Sync['account_name'] , 'remetent_link' => $link ];
					$tpl  = _tpl_fill( FLEX_CONFIG['email_link_confirm'], $Data, "", false);

					$email = new Email();
					$email->add( 'Seu link de confirmação de conta',	$tpl, $Sync['account_name'], $Sync['account_email']	);
					
					if($email->send()):
						$JSON['callback'] = _redirect_url(BASE.'validar-cadastro/sendlink/');
					else:
						$JSON['console']  = $email->error()->getMessage();
						$JSON['callback'] = _uikit_notification('Não foi possível enviar o e-mail. Tente novamente!', 'error', false);
					endif;		
				// ERRO AO CRIAR USUÁRIO
				else:
					$JSON['callback'] = _uikit_notification('', 'error', false);
				endif;
			else:
				// SENHA NÃO CONTÉM 6 CARACTERES
				$JSON['callback'] = _uikit_notification('Sua nova senha precisa conter no mínimo 6 caracteres', 'info', false);

			endif;
		endif;
	break;

	/**********************************************************************
	 * REENVIA O CÓDIGO DE VALIDAÇÃO POR EMAIL.
	 * NO CASO DE ATRASO OU O EMAIL NÃO TER SIDO DISPARADO
	 * DA A POSSIBILIDADE DO USUÁRIO REENVIAR O LINK DE VALIDAÇÃO
	 */
	case 'account_password_redefine':
		$account = new Account\Account;
		$account->email($Sync['account_email']);		
		$User = $account->getResultsEmail();

		if($account->checkAccount()):
			if(isset($User) && $User['account_status'] == 0):
				
				// USUÁRIO EXISTE, MAS NÃO ESTÁ VALIDADO
				$JSON['console'] = 'Status 0 - Solicitar Validação de conta pelo case: account_validation_email';
				@_up_data_table(TB_ACCOUNTS,[
					'where'  => ['account_email' => $Sync['account_email']],
					'values' => ['account_registered' => date("Y-m-d H:i:s")]
				]);
				$link = "".BASE."confirmacao/{$User['account_activation_key']}"; 
				$Data = ['remetent_name' => $User['account_name'] , 'remetent_link' => $link ];
				$tpl = _tpl_fill( FLEX_CONFIG['email_link_confirm'], $Data, "", false);
				
				$email = new Email\Email;
				$email->add(
					'Seu link de confirmação de conta',
					$tpl,
					$User['account_name'],
					$Sync['account_email']
				);
				if($email->send()):
					$JSON['callback'] = _redirect_url(BASE.'validar-cadastro/sendlink/?m=novalidate');
				else:
					$JSON['console']  = $email->error()->getMessage();
					$JSON['callback'] = _uikit_notification('Não foi possível enviar o e-mail. Tente novamente!', 'error', false);
				endif;

			// USUÁRIO EXISTE E ESTÁ VALIDADO
			elseif($User['account_status'] == 1):

				// Enviar link de redefinição de senha
				$key = base64_encode(md5(uniqid(rand(), true)));
				@_up_data_table(TB_ACCOUNTS,[
					'where'  => ['account_email' => $Sync['account_email']],
					'values' => [
						'account_modify' => date("Y-m-d H:i:s"),
						'account_auth' => $key
					]
				]);	
				$link = "".BASE."redefinicao/?account={$User['account_email']}&key={$key}"; 
				$Data = ['remetent_name' => $User['account_name'] , 'remetent_link' => $link ];
				$tpl = _tpl_fill( __THEME__['tpl_mail_password_redefine'], $Data, "", false);
				
				$email = new Email\Email;
				$email->add(
					'Seu link de redefinição de senha',
					$tpl,
					$User['account_name'],
					$Sync['account_email']
				);
				if($email->send()):
					$JSON['callback'] = _redirect_url(BASE.'redefinir-senha/enviada/');
				else:
					$JSON['console']  = $email->error()->getMessage();
					$JSON['callback'] = _uikit_notification('Não foi possível enviar o e-mail de redefinição. Tente novamente!', 'error', false);
				endif;

			endif;
		else:
			$JSON['console'] = 'Redirecinar usuário para o login';
			$JSON['callback'] = _redirect_url(BASE.'cadastre-se/?m=nouser');
		endif;
	break;

	/**********************************************************************
	 * ESTE CASE É RESPONSAVEL POR RECEBER O LINK DE REDEFINIÇÃO DE SENHA
	 * VINDO DO EMAIL SOLICITADO PELO USUÁRIO. INDICA QUE O USUÁRIO APROVOU
	 * A ALTERAÇÃO DA SENHA PELO SISTEMA. TAMBEM É RESPONSAVEL POR GERAR A
	 * NOVA SENHA E ATULIZAR NO BANCO, POR FIM, REENVIA O EMAIL COM A 
	 * NOVA SENHA AO USUÁRIO
	 */
	case 'account_password_validate_redefine':
		$Sync['account_email'] = explode(',', $Sync['array'])[0];
		$Sync['account_auth']  = explode(',', $Sync['array'])[1];
		unset($Sync['array']);	

		// SE A CONTA EXISTIR
		if($User = _get_data_table(TB_ACCOUNTS, [
			'account_email' => $Sync['account_email'],
			'account_auth'  => $Sync['account_auth']
			])):
			$User = $User[0];

			// NÃO EXPIROU
			$time = _do_compare_date_atual($User['account_modify']);				
			if($time <= FLEX_CONFIG['time_validation_password_redefine']):

				// Gerar nova senha
				$account = new Account;
				$Generator = 'v'.bin2hex(random_bytes(3));
				$Pass 	   = $account->passGenerator($Generator);

				$Up = _up_data_table(TB_ACCOUNTS,[
					'where'  => [
						'account_email' => $Sync['account_email']
						// 'account_auth'  => $Sync['account_auth']
					],
					'values' => [
						// 'account_modify' 	=> date("Y-m-d H:i:s"),
						'account_auth' 		=> '0',
						'account_password' 	=> $Pass
					]
				]);
				if($Up):
					$Data = ['account_email' => $User['account_email'] , 'account_password' => $Generator ];
					$tpl = _tpl_fill( FLEX_CONFIG['email_new_password'], $Data, "", false);
				
					$email = new Email\Email;
					$email->add(
						'Sua nova senha',
						$tpl,
						$User['account_name'],
						$Sync['account_email']
					);
					if($email->send()):			
						$JSON['callback'] = _redirect_url(BASE.'redefinir-senha/sucesso/');
					else:
						$JSON['console']  = $email->error()->getMessage();
						$JSON['callback'] = _uikit_notification('Não foi possível enviar o e-mail de redefinição. Tente novamente!', 'error', false);
					endif;
				else:
					$JSON['callback'] = _redirect_url(BASE.'redefinicao/noupdate/');
				endif;
			// EXPIROU
			else:
				$JSON['callback'] = _redirect_url(BASE.'redefinicao/expired/');
			endif;
		// CONTA EXISTE E AUTH = NULL
		elseif($User = _get_data_table(TB_ACCOUNTS, [
			'account_email' => $Sync['account_email'],
			'account_auth' => '0'
		])):
			$JSON['callback'] = _redirect_url(BASE.'redefinicao/rpexpired/');
		// CONTA NÃO EXISTIR
		else:
			$JSON['callback'] = _redirect_url(BASE.'redefinicao/nouser/');
		endif;
	break;


	/**********************************************************************
	 * SMS CREATE - CRIANDO CONTA DE USUÁRIO COM A OPÇÕES DE 
	 * VALIDAÇÃO POR EMAIL, VALIDAÇÃO SMS COM PUSHBULLET
	 * OU SE PREFERIR CADASTRA LOGANDO O USUÁRIO
	 */
	case 'account_create_sms':
		/*
		// VERIFICAR SE É UM EMAIL VALIDO
		if(filter_var($this->email, FILTER_VALIDATE_EMAIL)):
	
			// VERIFICAR SE O EMAIL JÁ EXISTE
			$Account = _get_data_full("
				SELECT account_email FROM `".TB_ACCOUNTS."` 
				WHERE `account_email` = '{$this->email}' 
				LIMIT 1
			");
			if(!$Account):
				// APÓS VALIDAR CRIA A LINHA TEMPORARIA NA TABELA
				// INSERINDO UM CHAVE DE VALIDAÇÃO EM 'account_activation_key'
				// COMO SE FOSSE UM PIN RAND() COM 6 DIGITOS.
				// NO CASO DE LINK, PASSAR PIN VIA GET PARA RECUPERAR
				$Create = _set_data_table(TB_ACCOUNTS, [
					''
				]);	
				// ESCOLHE O TIPO DE VALIDAÇÃO
				// -- CONFIRMAR POR SMS
				// -- CONFIRMAÇÃO POR EMAIL
				// -- SEM CONFIRMAÇÃO
				// -- OPAUTH (NÃO DISPONIVEL AINDA) 
				switch ($Metode):			
					case 'email':
						
						break;
				endswitch;
			else:
				if(!$this->crud) _uikit_notification('E-mail já cadastrado', 'error', true);
				else return _uikit_notification('E-mail já cadastrado', 'error', false);
			endif;
		else:
			if(!$this->crud) _uikit_notification('Digite um e-mail válido', 'error', true);
			else return _uikit_notification('Digite um e-mail válido', 'error', false);
		endif;
		// PEGA O PARAMETRO URL COM O LINK DA PAGINA DE GERAÇÃO DE SENHA
		// REDIRECIONA PARA O CADASTRO DA SENHA UTILIZANDO O METODO passGenerator();
		*/
	break;


	/**********************************************************************
	 * TROCA DE SENHA - UTILIZADO APENAS NO PAINEL INTERNO DO USUÁRIO
	 * OU DA SUPER ADMIN, NÃO PODENDO SER UTILIZADO PARA REDEFINIÇÃO DE SENHA
	 */
	case 'account_change_password':
		// VERIFICA SE O USUÁRIO EXISTE
		$User = _get_data_table(TB_ACCOUNTS, [ 
			'account_id' => $Sync['account_id'],
			'account_email' => $Sync['account_email']
		]);
		if($User):
			$User = $User[0];
			// VERIFICA SE A SENHA ANTIGA CORRESPONTE
			$account = new Account;
			$account->password($Sync['password_old']);
			$account->passwordDB($User['account_password']);
			if($account->passVerify()):
				// SENHA NOVA É IGUAL A ANTIGA
				if($Sync['password_repeat'] == $Sync['password_old']):

					$JSON['array'][0] = [
						'element' => '.callback-alert',
						'content' => _uikit_alert('Você está querendo trocar para a mesma senha. Digite uma nova senha', 'info', false)
					];				
				// VERIFICA SE A SENHA DIGITADA POSSUI 6 CARACTERES ALFANUMÉRICOS
				elseif(!$account->passGenerator($Sync['password_repeat'])):
					$JSON['array'][0] = [
						'element' => '.callback-alert',
						'content' => _uikit_alert('Sua nova senha precisa conter no mínimo 6 caracteres', 'alert', false)
					];
				// VERIFICA SE AS DUAS SENHAS DIGITADAS CORRESPONDEM
				elseif($Sync['password_new'] == $Sync['password_repeat']):
					// ATUALIZA A SENHA NA TABELA
					$Up = _up_data_table(TB_ACCOUNTS, [
						'where' => [
							'account_id' => $User['account_id'], 
							'account_email' => $User['account_email']
						],
						'values' => [
							'account_password' => $account->passGenerator($Sync['password_repeat'])
						]
					]);
					if($Up):
						// ATUALIZADO COM SUCESSO
						$JSON['array'][0] = [
							'element' => '.callback-alert',
							'content' => _uikit_alert('Senha atualizada com sucesso', 'success', false)
						];
						$JSON['callback'] = '<script>$("input").val("");</script>';
					else:
						// ERRO INTERNO, TENTE NOVAMENTE
						$JSON['array'][0] = [
							'element' => '.callback-alert',
							'content' => _uikit_alert('Erro interno, tente novamente', 'info', false)
						];						
					endif;
				else:
					// NOVAS SENHAS NÃO CORRESPONDEM
					$JSON['array'][0] = [
						'element' => '.callback-alert',
						'content' => _uikit_alert('Repita a senha corretamente', 'error', false)
					];
				endif;			
			else:
				// SENHA ANTIGO NÃO CORRESPONDE
				$JSON['array'][0] = [
					'element' => '.callback-alert',
					'content' => _uikit_alert('Senha antiga não corresponde', 'error', false)
				];
			endif;			
		else:
			// USUÁRIO NÃO EXISTE
			$JSON['callback'] = _redirect_url(BASE.'login/'); // link não existe
	endif;

endswitch;

// Renderização final
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}