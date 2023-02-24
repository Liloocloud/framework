<?php
/**
 * Manutenção da tabela Entities. Sendo possível
 * Editar, Criar e Redefinir
 * @copyright Felipe Oliveira - 16-09-2018
 * @version 2.0
 */
require_once "../../../_Kernel/___Kernel.php";
require_once "../accounts.config.php";
require_once "../../../_Kernel/_Sync.inout.php";

switch ($Action){

	/****************************************************************************
	 * STEP1 - VERIFICA SE O CAMPO ENTITY_ENTITY FOI PREENCHIDO CORRETAMENTE
	 * ISSO GARANTE QUE O CADASTRO NÃO SEJA VAZIO
	 */
	case 'entity_entity_check':
		if(!empty($Sync['array'])){
			$JSON['callback'] = '<script>UIkit.switcher("#tab-control").show(1)</script>';
		}else{
			$JSON['callback'] = '<script>$("#callback-step1").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>Selecione Pessoa Física ou Jurídica</p>
				</div>`)</script>';			
		}
		break;

	/****************************************************************************
	 * STEP2 - VERIFICA SE O CPF E NOME FOI PREENCHINO NO PASSO 2 
	 */
	case 'entity_step2_cpf_check':
		if(isset($Sync['array'])){
			$Sync = explode(';',$Sync['array']);
			if(empty($Sync[0])){
				$JSON['callback'] = '<script>$("#callback-step2-cpf").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>O nome é origatório</p>
				</div>`)</script>';
				break;
			}
			if(empty($Sync[1])){
				$JSON['callback'] = '<script>$("#callback-step2-cpf").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>O CPF é obrigatório</p>
				</div>`)</script>';
				break;
			}
			if(strlen($Sync[1]) !== 14){
				$JSON['callback'] = '<script>$("#callback-step2-cpf").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>CPF inválido</p>
				</div>`)</script>';
				break;
			}	
			$JSON['callback'] = '<script>UIkit.switcher("#tab-control").show(2)</script>';
		}else{
			$JSON['callback'] = '<script>$("#callback-step2-cpf").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>Todos os campos são obrigatórios</p>
				</div>`)</script>';
		}
		break;

	/****************************************************************************
	 * STEP2- VERIFICA SE O CNPJ E RAZÃO SOCIAL FOI PREENCHINO NO PASSO 2
	 */
	case 'entity_step2_cnpj_check':
		if(isset($Sync['array'])){
			$Sync = explode(';',$Sync['array']);
			if(empty($Sync[0])){
				$JSON['callback'] = '<script>$("#callback-step2-cnpj").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>A razão social é origatória</p>
				</div>`)</script>';
				break;
			}
			if(empty($Sync[1])){
				$JSON['callback'] = '<script>$("#callback-step2-cnpj").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>O CNPJ é obrigatório</p>
				</div>`)</script>';
				break;
			}
			if(strlen($Sync[1]) !== 18){
				$JSON['callback'] = '<script>$("#callback-step2-cnpj").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>CNPJ inválido</p>
				</div>`)</script>';
				break;
			}	
			$JSON['callback'] = '<script>UIkit.switcher("#tab-control").show(2)</script>';
		}else{
			$JSON['callback'] = '<script>$("#callback-step2-cnpj").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>Todos os campos são obrigatórios</p>
				</div>`)</script>';
		}
		break;

	/****************************************************************************
	 * STEP3 - VERIFICA SE O CNPJ E RAZÃO SOCIAL FOI PREENCHINO NO PASSO 2
	 */
	case 'entity_step3_check':
		if(!empty($Sync['array'])){
			$Whats = preg_match("/(\([0-9]{2,3}\)|[0-9]{2,3}|)[{ ,}]?[0-9]{4,5}[-. ]?[0-9]{4}/i",$Sync['array']);
			if($Whats === 0){
				$JSON['callback'] = '<script>$("#callback-step3").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>Número inválido</p>
				</div>`)</script>';
				break;
			}			
			$JSON['callback'] = '<script>UIkit.switcher("#tab-control").show(3)</script>';
		}else{
			$JSON['callback'] = '<script>$("#callback-step2-cnpj").html(`
				<div class="step1-alert uk-alert-primary" uk-alert>
					<p>Campo obrigatório</p>
				</div>`)</script>';
		}
		break;


	/****************************************************************************
	 * STEP4 - COMPLETA O CADASTRO DA CONTA DE USUÁRIO NA TB_ENTITIES
	 * IDEAL COM O USO DA TPL COMPLETANDO-CADASTRO.TPL
	 */
	case 'entity_update_complete':	
		// Criar metodo ou class que controla a $Sync
		// Verificar se 9 campos foram setados para validar
		if(isset($Sync)){

			$Entity = new Account\Entities((int) $Sync['entity_account_id']);
			if($Sync['entity_entity'] === 'Física'){
				$Sync['entity_fantasy_name'] = $Sync['entity_name_cpf'];
				$Sync['entity_document'] 	 = $Sync['entity_document_cpf'];
			}else{
				$Sync['entity_fantasy_name'] = $Sync['entity_name_cnpj'];
				$Sync['entity_document'] 	 = $Sync['entity_document_cnpj'];
			}
			unset(
				$Sync['entity_account_id'],
				$Sync['entity_name_cpf'],
				$Sync['entity_document_cpf'],
				$Sync['entity_name_cnpj'],
				$Sync['entity_document_cnpj']
			);
			if(count($Sync) == 9){
				$Entity = $Entity->update($Sync);
				if($Entity[1]){
					$JSON['array'][0] =	[
						'element' => '.callback-alert',
						'content' => _uikit_alert('<h4>Conta atualizada com sucesso</h4><p>Vamos avaliar sua conta e quando estiver aprovada você receberá uma notificação em seu e-mail.</p>','success', false)
					];
					$JSON['array'][1] =	[
						'element' => '#complete',
						'content' => "<script>$('#complete').hide()</script>"
					];
					$JSON['callback'] = _uikit_notification('Conta atualizada!', 'success', false);
					$JSON['callback'] = _redirect_url(BASE.'meu-painel/adicionais/sucesso');
				}else{
					$JSON['callback'] = _uikit_notification('Erro de conexão. Tente novamente!', 'info', false);
				}
			}else{
				$JSON['callback'] = _uikit_notification('Algum dos campo não foi preenchido', 'info', false);
			}		
		}else{
			$JSON['callback'] = _uikit_notification('Não foi possível obter dados', 'error', false);
		}
		break;


	/**********************************************************************
	 * LOGIN DO USUÁRIO EM QUALQUE PARTE DA PLATAFORMA
	 * BASTA SETAR OS METODOS QUE A CLASS SE ENCARREGA DE REDIRECIONAR
	 * E MANDAR AS MENSAGENS CONRRESPONDENTES
	 */
	case 'account_login':
		$account = new \Account\Account;
		$account->email($Sync['account_email']);
		$account->password($Sync['account_password']);
		$Login = $account->Login();
		if(!$Login[1] && $Login[2] == 'PASS_INVALID'){
			$JSON['callback'] = _uikit_notification('Senha Incorreta!', 'error', false);
		}elseif(!$Login[1] && $Login[2] == 'EMAIL_INVALID'){
			$JSON['callback'] = _uikit_notification('E-mail Inválido ou Não cadastrado!', 'error', false);
		}elseif($Login[1]){
			if($account->level() == 10 || $account->level() == 11){
				$JSON['callback'] = _redirect_url(BASE_INIT.'_dash/initial/');
			}else{
				$JSON['callback'] = _redirect_url(BASE.SITE_CONFIG['DASHBOARD']);
			}
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
					$JSON['callback'] = _redirect_url('login/'.base64_encode($Check['account_email']).'/?m=success');		
				else:
					$JSON['callback'] = _redirect_url('validar-cadastro/novalidate/'); // Não expirou
				endif;
			else:
				$JSON['callback'] = _redirect_url('validar-cadastro/resendlink/'); // Expirado
			endif;
		else:
			$JSON['callback'] = _redirect_url('validar-cadastro/validaded/'); // link não existe
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
					$JSON['callback'] = _redirect_url('validar-cadastro/sendlink/');
				else:
					$JSON['console']  = $email->error()->getMessage();
					$JSON['callback'] = _uikit_notification('Não foi possível enviar o e-mail. Tente novamente!', 'error', false);
				endif;		
			// REDIRECIONA PARA O LOGIN
			else:
				$JSON['callback'] = _redirect_url('login/'.base64_encode($Sync['account_email']).'/?m=yesuser' );
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
						$JSON['callback'] = _redirect_url('validar-cadastro/sendlink/');
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
		$account = new Account;
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
				
				$email = new Email();
				$email->add(
					'Seu link de confirmação de conta',
					$tpl,
					$User['account_name'],
					$Sync['account_email']
				);
				if($email->send()):
					$JSON['callback'] = _redirect_url('validar-cadastro/sendlink/?m=novalidate');
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
				$tpl = _tpl_fill( FLEX_CONFIG['email_password_redefine'], $Data, "", false);
				
				$email = new Email();
				$email->add(
					'Seu link de redefinição de senha',
					$tpl,
					$User['account_name'],
					$Sync['account_email']
				);
				if($email->send()):
					$JSON['callback'] = _redirect_url('redefinir-senha/enviada/');
				else:
					$JSON['console']  = $email->error()->getMessage();
					$JSON['callback'] = _uikit_notification('Não foi possível enviar o e-mail de redefinição. Tente novamente!', 'error', false);
				endif;

			endif;
		else:
			$JSON['console'] = 'Redirecinar usuário para o login';
			$JSON['callback'] = _redirect_url('cadastre-se/?m=nouser');
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
				
					$email = new Email();
					$email->add(
						'Sua nova senha',
						$tpl,
						$User['account_name'],
						$Sync['account_email']
					);
					if($email->send()):			
						$JSON['callback'] = _redirect_url('redefinir-senha/sucesso/');
					else:
						$JSON['console']  = $email->error()->getMessage();
						$JSON['callback'] = _uikit_notification('Não foi possível enviar o e-mail de redefinição. Tente novamente!', 'error', false);
					endif;
				else:
					$JSON['callback'] = _redirect_url('redefinicao/noupdate/');
				endif;
			// EXPIROU
			else:
				$JSON['callback'] = _redirect_url('redefinicao/expired/');
			endif;
		// CONTA EXISTE E AUTH = NULL
		elseif($User = _get_data_table(TB_ACCOUNTS, [
			'account_email' => $Sync['account_email'],
			'account_auth' => '0'
		])):
			$JSON['callback'] = _redirect_url('redefinicao/rpexpired/');
		// CONTA NÃO EXISTIR
		else:
			$JSON['callback'] = _redirect_url('redefinicao/nouser/');
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
			$JSON['callback'] = _redirect_url('login/'); // link não existe
		endif;

}

/**
 * Export JSON
 */
if(isset($JSON) && $JSON != null){
	echo json_encode($JSON);
}else{
	echo json_encode($JSON['callback'] = 'Nenhum retorno foi setado');
}