<?php
/**
 * Class para gerenciamento de cookies por conta de usuário
 * 
 * @copyright Felipe Oliveira Lourenço - 07.01.2021
 * @version 1.0.0
 */

class Cookies
{
	private $name;
	private $days;
	private $cookie;

	function __construct($name='global', $days='30')
	{
		$this->name = $name;
		$this->days = $days;
	}


	// Checar se existe cookie
	private function check():bool
	{
		return true;
	}

	/**
	 * Verifica se o cooki existe, se não existir cria
	 * @param [string] $nama [Nome do cookie a ser manipulado]
	 * @param [string] $days [Dias para expiração do cookie]
	 */
	public function setCookie($name='global', $days='30'):array
	{
		if(isset($_COOKIE[$this->name])){
			return [ $_COOKIE[$this->name], true, 'dipManagerCookie' ];
		
		}elseif(isset($_COOKIE['PHPSESSID'])){
			setrawcookie($this->name, $_COOKIE['PHPSESSID'], strtotime("+{$days} days"), '/');
			return [ $_COOKIE['PHPSESSID'], true, 'dipManagerCookie' ];
		
		}else{
			return [ 'Não foi possível obter Cookie', false, 'dipManagerCookie' ];
		}
	}

}

// Cookie
// IP 
// account user identificação
// 