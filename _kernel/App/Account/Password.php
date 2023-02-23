<?php
/**
 * Responsável por todas as tratativas de senha da plataforma usando a tabela "accounts"
 * @copyright Felipe Oliveira Lourenço - 25.06.2021
 * @version 1.0.0
 */

namespace Account;

class Password
{

	private $password;
	private $passDB;

	function __construct($pass=null, $db=null){
		$this->password = $pass;
		$this->passDB = $db;
	} 


    /**
	 * Gerador de Senha Bcrypt
	 * @param  [string] $pass [senha digitado no formulario]
	 * @return [string]       [retorna senha para incluir no banco de dados]
	 */
	public function passGenerator($passCreate){
		$Regex = "/^[\`\~\!\@\#\$\%\^\&\*\(\)\_\-\+\=\{\}\[\\]\\\|\:\;\"\'\<\>\,\.\?\/a-zA-Z0-9]{6,30}$/";
	 	// "/^[\w\d]{6,30}$/"
		if(preg_match($Regex, $passCreate)){
			$custo = '08';
			$salt = $this->saltGenerator();
			return crypt($passCreate, '$2a$' . $custo . '$' . $salt . '$');
		}
		return false;
	}

	/**
	 * Validando se a senha digitada é igual a armazenado no DB
	 * @param  [type] $pass   [senha digitada]
	 * @param  [type] $passDB [senha recuperada do banco]
	 * @return [type]         [retorna true ou false]
	 */
	public function passVerify(): bool
	{
		if (@crypt($this->password, $this->passDB) === $this->passDB){
			return true;
		}
		return false;
	}

	/**
	 * Gerador de chave SALT Aleatoria para usar com o bcrypt()
	 * @return [string] [Chave com 22 caracteres]
	 */
	private function saltGenerator(){
		$Maiuscula 	= "ABCDEFGHIJKLMNOPQRSTUVYXWZ";
		$Minuscula 	= "abcdefghijklmnopqrstuvyxwz";
		$Numero 	= "0123456789";
		$senha  = str_shuffle($Maiuscula);
		$senha .= str_shuffle($Minuscula);
		$senha .= str_shuffle($Numero);
		return substr(str_shuffle($senha),0,22);
	}

}