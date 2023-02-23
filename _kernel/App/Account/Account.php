<?php
/**
 * Class para gerenciamento de acesso e permissões de acesso em diversos níveis utilizando validação por SMS 
 * com auxilio da class PushBullet e Envio de SMS. Esta classe é Nativa da Plataforma e trabalha direto com a 
 * tabela 'flex_accounts'. Portante, certifique-se de que o banco de dados esteja instalado corretamente
 * 
 * @copyright Felipe Oliveira Lourenço - 21.04.2020
 * @version 2.0.0 - 25.03.2021
 */

// Novas atualizações
// -- Iniciar a class com metodo __construct passando o ID
// -- Implementar o sisteme de return com array
// -- Tipar os metodos que necessitam de tipagem
// -- Aumentar a segurança das verificações
// -- Incluir o name space das classes externas

namespace Account;
use Database\Create;
use Database\Read;
use Database\Update;
use Database\Delete;

class Account /*extends Email*/{

	private $id; 			// Id do usuário da conta a ser validada (Retornando o que inseriu ou verificou)
	private $name;			// Nome do usuário da conta
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
	 * 
	 */
	function __construct($id=null){
		$this->id = (int) $id;
	}

	/**
	 * Recupera o name
	 * @param  [type] $name [description]
	 */
	public function name($name)
	{
		return $this->name = $name;
	}
	
	/** Recupera o Email do usuário */
	public function email($email)
	{
		return $this->email = $email;
	}
	
	/** Recupera o password do usuário */
	public function password($pass)
	{
		return $this->password = $pass;
	}

	public function passwordDB($passDB)
	{
		return $this->passDB = $passDB;
	}


	/** Atribue um novo tempo de sessão para o login */
	public function time($time)
	{
		return $this->time = $time;
	}
	
	/** Retorna o login para a página indicada no parametro */
	public function loginPage($loginPage)
	{
		return $this->loginPage = $loginPage;
	}
	

	/** Retorno o Level do usuário */
	public function level(){
		return $this->level;
	}

	/**
	 * Retorna true ou false para account_status 
	 */
	public function status()
	{
		$Active = _get_data_full(
			"SELECT `account_status` FROM `".TB_ACCOUNTS."` 
			WHERE `account_id` =:a",
			"a={$this->id}");
		$Active = (isset($Active[0]['account_status']))? (int) $Active[0]['account_status'] : false;
		if($Active){
			return true;
		}else{
			return false;
		}
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

	/**
	 * Checa se um conta existe e o status é 1 e retorna bool
	 * @return [type] [description]
	 */
	public function checkAccount(){
		if(_get_data_table(TB_ACCOUNTS,[
			'account_email' => $this->email
		])):
			return true;
		else:
			return false;
		endif;
	}


	/**
	 * Verifica se o usuário existe na tabele ACCOUNTs
	 * @return [type] [description]
	 */
	public function checkAccountID()
	{
		if(_get_data_full("SELECT `account_id` FROM `".TB_ACCOUNTS."` WHERE `account_id` =:a", "a={$this->id}")){
			return true;
		}else{
			return false;
		}		
	}


	/**
	 * Realizar o Login e redirecionar para o Valor da variavel "$Redirect"
	 * @return string [URL de redirecionamento]
	 */
	public function Login($redirect=null)
	{
		$Email = $this->email;
		$Pass  = $this->password;
		if(isset($Email) AND filter_var($Email, FILTER_VALIDATE_EMAIL)):
			$User = _get_data_full("
				SELECT * FROM `".TB_ACCOUNTS."` 
				WHERE `account_email` = '".$Email."' AND
				`account_status` = '1'
				LIMIT 1"
			);
		if($User):
			$this->level = (int) $User[0]['account_level'];
			$this->passDB = $User[0]['account_password'];
			if($this->passVerify()):						
					// Retorna o level do usuário
					// Atualizando a data de acesso
				$last_login = _up_data_table(TB_ACCOUNTS, [
					'where' => ['account_id' => $User[0]['account_id'], 'account_email' => $User[0]['account_email'] ],
					'values' => ['account_last_login' => date('Y-m-d H:i:s')]
				]);
				if($last_login)
					$_SESSION['account_time']	= date('Y-m-d H:i:s', strtotime("+ {$this->time} minutes"));
				$_SESSION['account_id']		= $User[0]['account_id'];
				$_SESSION['account_email']	= $User[0]['account_email'];
				$_SESSION['account_name']	= $User[0]['account_name'];
				$_SESSION['account_level'] 	= (int) $User[0]['account_level'];
				$_SESSION['account_ip'] 	= filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);
				$_SESSION['account_url'] 	= BASE.trim(strip_tags(filter_input(INPUT_GET, 'pg', FILTER_DEFAULT)));
				// $_SESSION['account_agent'] 	= filter_var($_SERVER['HTTP_USER_AGENT'], FILTER_DEFAULT);		

				return ['logado com sucesso', true];
			else:
					// return _uikit_notification('Senha Incorreta!', 'error', false);
				return ['Senha incorreta!', false, 'PASS_INVALID'];
			endif;
		else:
				// return _uikit_notification('E-mail Inválido ou Não cadastrado!', 'error', false);
			return ['E-mail Inválido ou Não cadastrado!', false, 'EMAIL_INVALID'];
		endif;
	else:
			// return _uikit_notification('E-mail inválido, tente novamente', 'error', false);
		return ['E-mail inválido, tente novamente', false];
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

	/**
	 * Verifica se a Sessão está dentro do Time, se não redireciona
	 * @return [bool] true
	 */
	public function checkSession()
	{
		if(isset($_SESSION['account_time'])):
			$time = strtotime($_SESSION['account_time']);
			$date = strtotime(date('Y-m-d H:i:s'));
			if( (($time - $date)/60) <= 0 ):
				session_destroy();
				echo "<script>window.location.href='{$this->loginPage}'</script>";
			else:
				return true;
			endif;
		else:
			session_destroy();
			echo "<script>window.location.href='{$this->loginPage}'</script>";
		endif;
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
	public function passVerify()
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