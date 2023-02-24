<?php
/**
 * Class Resposável por realizar todos os tratamentos de uma
 * transação do PagSeguro como: Iniciar Sessão com usuário
 * enviar endpoints, enviar transação e etc.
 * @copyright Felipe Oliveira Lourenço - 09.06.2019
 * @version 1.0.0
 */


class PagSeguro{
	
	private $account_email = 'lemonflex@lemonflex.com.br'; // E-mail da conta do pagseguro
	private $token_sandbox = '642B5F8375564F8786E1574086ED7832'; // Token para teste sandbox
	private $token_production = '9d0e2c94-d7b0-4345-906e-2632d78f2d08e78a6ea74bfca1cd0380d4072b216c3b1221-1d73-473b-a290-7d31b4f30ba5'; // Token efetivo para produçao
	private $checkout = 'production'; // se sandbox ou production
	private $post; // Recebe o post para realizar o tratamento
	public  $session_id; // Id da sessão criada pelo pagseguro

	/**
	 * Inicia a Class com o POST do formulário
	 * @param [type] $POST [description]
	 */
	function __construct($POST){
		$POST = ($POST)? $POST : '<br>POST data é Obrigatório <br>';
		$this->post = $POST;
	}


	/**
	 * Define se o checkout esta em teste ou em produção
	 * @param  string $type [ sandbox ou production]
	 * @return [type]       [ retorna o valor escolhido ]
	 */
	public function checkout($type){
		$this->checkout = ($type)? $type : $this->checkout;
		return $this->checkout;
	}

	/**
	 * Inicia uma Sessão junto ao Pagseguro
	 * assim torna válida a transação
	 * OBS.: Sem a sessão não é possivel iniciar uma transação
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function initSession() {
		if($this->checkout == 'sandbox'):
			$token = $this->token_sandbox;
		    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions';
		else:
			$token = $this->token_production;
		    $url = 'https://ws.pagseguro.uol.com.br/v2/sessions';
		endif;
		//$url = 'https://ws.pagseguro.uol.com.br/v2/checkouts';
		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');
 
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url."?email=".$this->account_email."&token=".$token);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml = (array) simplexml_load_string($xml);
		$this->session_id = $xml['id'];
		return $xml['id'];
		exit;
	}

	/**
	 * Método de pagamento para Cartão de Crédito
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function paymentCreditCard($data) { 

		$token = "642B5F8375564F8786E1574086ED7832";
		$emailPagseguro = "lemonflex@lemonflex.com.br";

		$data = http_build_query($data);
	    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions';

		//$url = 'https://ws.pagseguro.uol.com.br/v2/checkouts';
		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url."?email=".$emailPagseguro."&token=".$token);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml = simplexml_load_string($xml);
		var_dump($xml);
		// $idSessao = $xml -> id;
		// echo $idSessao;
		exit;
		//return $codigoRedirecionamento;
	}


}