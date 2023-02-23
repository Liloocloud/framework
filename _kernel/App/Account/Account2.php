<?php
/**
 * Operações que diz respeito a conta de usário da plataforma
 * @copyright Felipe Oliveira Lourenço - 21.04.2020
 * @version 3.0.0 - 25.06.2021
 */

namespace Account;

use Database\Create;
use Database\Read;
use Database\Update;
use Database\Delete;

use Account\Password;
use Account\Check;
use Account\Helpers;

class Account 
{

	// private $name;			// Nome do usuário da conta
	private $email;			// Email do usuário da conta
	private $password;		// Senha do usuário

	private $level;			// Nível de permissão de acesso
	private $time=1440;		// Controle o tempo em minutos da sessão do usuário (padrão 24 horas)
	private $passDB;		// Senha do usuário armazenada no banco
	private $coin;			// Sistema de moedas Nativa TB('flex_accounts') Column (account_coin)
	private $activation;	// Código de verificação enviado por Email para validação
	private $crud=false;	// Retornos em "echo". Caso seja preciso usar no crud troque para true
	private $loginPage=BASE.'login/'; // Página padrão do Login

	/**
	 * Inicia a instancia recuperando o e-mail do usuário
	 */
	function __construct($email){
		$this->email = (string) $email;
	}

	/**
	 * Recupera a linha do banco ao passar o parêmetro id
	 * @return [array] [valores da linha da tabela]
	 */
	public function getResultsID()
	{
		$Line = _get_data_table(TB_ACCOUNTS,[ 'account_id' => (int) $this->id ]);
		$Line = (isset($Line))? $Line : false;
		if($Line):
			return $Line[0];
		else:
			return false;
		endif;
	}

	/**
	 * Recupera a linha do banco ao passar o parêmetro Email
	 * @return [array] [valores da linha da tabela]
	 */
	public function getResultsEmail()
	{
		$Email = _get_data_table(TB_ACCOUNTS,[ 'account_email' => $this->email ]);
		$Email = (isset($Email))? $Email : false;
		if($Email):
			return $Email[0];
		else:
			return false;
		endif;
	}

	

	/*
	public function Create($urlCreatePass, $Metode='email'){

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


			else:
				if(!$this->crud) _uikit_notification('E-mail já cadastrado', 'error', true);
				else return _uikit_notification('E-mail já cadastrado', 'error', false);
			endif;
		else:
			if(!$this->crud) _uikit_notification('Digite um e-mail válido', 'error', true);
			else return _uikit_notification('Digite um e-mail válido', 'error', false);
		endif;
	}
	*/

	

	

}