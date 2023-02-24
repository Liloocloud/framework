<?php
/**
 * Class de Abstração da API do Sistema de Pagamento PayU
 * @copyright Felipe Oliveira Lourenço - 10.07.2020
 * @version 1.0.0
 * @link http://developers.payulatam.com/pt/api/payments.html
 * @see É recomendado usar esta class nas requisições AJAX dentro do CRUD
 */

use Create\Create;
use Read\Read;
use Update\Update;
use Delete\Delete;

class PayUSlim{

	public $payu_test 			= PAYU_CONFIGS['TEST'];			// Defini se está em Teste | true = sim, em teste
	public $payu_language 		= PAYU_CONFIGS['LANG'];			// Idioma padrão do Processo
	public $payu_currency 		= PAYU_CONFIGS['CURRENCY']; 	// Sigla da moeda BRL Real Brasileiro

	public $payu_url;											// URL para qual enviará o POST
	private $payu_reference_code; 								// Código de Referencia do Produto/Serviço
	private $payu_price;											// Preço do Produto ou Serviço

	private $payu_api_key		= PAYU_CONFIGS['API_KEY'];		// Chave de API da PayU
	private $payu_api_login		= PAYU_CONFIGS['API_LOGIN'];	// Chave de Login da PayU
	private $payu_merchant_id	= PAYU_CONFIGS['MERCHANT_ID']; 	// ID do Comércio dentro da PayU
	private $payu_account_id 	= PAYU_CONFIGS['ACCOUNT_ID']; 	// ID da conta na PayU
	
	private $payu_parameters; 									// Armazena os parametros para serem enviados
	private $output 			= 'json';						// Tipo de retorno de dados

	
	//********************************************************
	//*************** CONSULTAS AO PAYU **********************
	//********************************************************

	/**
	 * Verificar a conectividade com a plataform PayU
	 * @return [bool] 
	 */
	public function ping(){
		if($this->verifyParam()){
			$this->payu_parameters = [
				'test' => $this->payu_test,
				'language' => strtolower($this->payu_language),
				'command' => "PING",
				'merchant' => [
					'apiLogin' => $this->payu_api_login,
					'apiKey' =>  $this->payu_api_key
				]
			];
			$this->payu_parameters = json_encode($this->payu_parameters);
			$this->payu_url = PAYU_CONFIGS['URL_CONSULT'];
			$Send = $this->send();
			if($Send[1]){
				return ['"ping() enviado com sucesso! #'.__LINE__, true];
			}else{
				return ['Erro ao enviar o "ping()" '.$Send[0].' #'.__LINE__, false];
			}

		}else{
			return ['Algum parâmetro para o envio do PING não está corrento', false];
		}
	}


	/**
	 * Consulta uma transção pelo ID do Pedido
	 * @param [int] $OrderID [ID da transação realizada]
	 * @return [data] [json com as informações da transação]
	 */
	public function consultOrderID($OrderID){
		if($this->verifyParam() && isset($OrderID)){
			$this->payu_parameters = [
				"test" => $this->payu_test,
				"language" => strtolower($this->payu_language),
				"command" => "ORDER_DETAIL",
				"merchant" => [
					"apiKey" => $this->payu_api_key,
					"apiLogin" => $this->payu_api_login
				],
				"details" => [
					"orderId" => (int) $OrderID
				]
			];
			$this->payu_parameters = json_encode($this->payu_parameters);
			$this->payu_url = PAYU_CONFIGS['URL_CONSULT'];
			$Send = $this->send();
			if($Send[1]){
				return [$Send[0], true];
			}else{
				return ['Erro ao enviar o "consultOrderID()" '.$Send[0].' #'.__LINE__, false];
			}

		}else{
			return ['Algum parâmetro para o envio de consultOrderID() não está corrento', false];
		}

	}


	/**
	 * Consulta uma transção pelo Código de Referencia do Produto
	 * @param [int] $refCode [ID da transação realizada]
	 * @return [data] [json com as informações da transação]
	 */
	public function consultReferenceCode($refCode){
		if($this->verifyParam() && isset($refCode)){
			$this->payu_parameters = [
				"test" => $this->payu_test,
				"language" => strtolower($this->payu_language),
				"command" => "ORDER_DETAIL_BY_REFERENCE_CODE",
				"merchant" => [
					"apiLogin" => $this->payu_api_login,
					"apiKey" => $this->payu_api_key
				],
				"details" => [
					"referenceCode" => (string) $refCode
				]
			];
			$this->payu_parameters = json_encode($this->payu_parameters);
			$this->payu_url = PAYU_CONFIGS['URL_CONSULT'];
			$Send = $this->send();
			if($Send[1]){
				return [$Send[0], true];
			}else{
				return ['Erro ao enviar o "consultReferenceCode()" '.$Send[0].' #'.__LINE__, false];
			}

		}else{
			return ['Algum parâmetro para o envio de consultReferenceCode() não está corrento', false];
		}

	}


	/**
	 * Consulta uma transção pelo Código de Referencia do Produto
	 * @param [int] $TransactionID [ID da transação realizada]
	 * @return [data] [json com as informações da transação]
	 */
	public function consultTransaction($TransactionID){
		if($this->verifyParam() && isset($TransactionID)){
			$this->payu_parameters = [
				"test" => $this->payu_test,
				"language" => strtolower($this->payu_language),
				"command" => "TRANSACTION_RESPONSE_DETAIL",
				"merchant" => [
					"apiKey" => $this->payu_api_key,
					"apiLogin" => $this->payu_api_login
				],
				"details" => [
					"transactionId" => (string) $TransactionID
				]
			];
			$this->payu_parameters = json_encode($this->payu_parameters);
			$this->payu_url = PAYU_CONFIGS['URL_CONSULT'];
			$Send = $this->send();
			if($Send[1]){
				return [$Send[0], true];
			}else{
				return ['Erro ao enviar o "consultTransaction()" '.$Send[0].' #'.__LINE__, false];
			}

		}else{
			return ['Algum parâmetro para o envio de consultTransaction() não está corrento', false];
		}

	}


	/**
	 * Retornas Todos os Meios de pagamentos disponíveis na PayU
	 * @return [array] [informações dos metodos de pagamento]
	 */
	public function getPaymentMethods(){
		if($this->verifyParam()){
			$this->payu_parameters = [
				"test" => $this->payu_test,
				"language" => strtolower($this->payu_language),
				"command" => "GET_PAYMENT_METHODS",
				"merchant" => [
					'apiLogin' => $this->payu_api_login,
					'apiKey' =>  $this->payu_api_key
				]
			];
			$this->payu_parameters = json_encode($this->payu_parameters);
			$this->payu_url = PAYU_CONFIGS['URL_PAYMENT'];
			$Send = $this->send();
			if($Send[1]){
				return [$Send[0], true];
			}else{
				return ['Erro ao enviar o "getPaymentMethods()" '.$Send[0].' #'.__LINE__, false];
			}
		}else{
			return ['Algum parâmetro para o envio de getPaymentMethods() não está corrento', false];
		}

	}


	//*************************************************
	//*************** PAGAMENTOS **********************
	//*************************************************

	/**
	 * Efetivação do pagamento
	 * @param [string] $Method [Inclidar o Método de pagamento | boleto | credito | debito ]
	 * @return [type] [description]
	 */
	public function pay($Item, $Method='credito'){
		if($this->verifyParam() && isset($Item)){
			$Item = $this->itemCode((string)$Item);

			// Se o produto existe efetivar o pagamento
			if($Item[1]){
				$Item = $Item[0];

				// Gerando Autenticação
				$this->payu_reference_code = $Item['item_code'];
				$this->payu_price = (float) $Item['item_price'];
				$Auth = $this->generatorAuth();

				// Método de Pagamento se Boleto ou Cartão de Crédito
				switch ($Method) {
					case 'credito':
						// Pagamento com cartão de crédito
					$this->payu_parameters = [
						"test" => $this->payu_test,
						"language" => strtolower($this->payu_language),
						"command" => "SUBMIT_TRANSACTION",
						"merchant" => [
							'apiKey' =>  $this->payu_api_key,
							'apiLogin' => $this->payu_api_login
						],
						"transaction" => [
							"order" => [
								"accountId" => $this->payu_account_id,
								"referenceCode" => $Item['item_code'],
								"description" => $Item['item_title'],
								"language" => strtolower($this->payu_language),
								"signature" => $Auth,
								"notifyUrl" => PAYU_CONFIGS['URL_RETURN'],
								"additionalValues" => [
									"TX_VALUE" => [
										"value" => (string) $this->payu_price,
										"currency" => PAYU_CONFIGS['CURRENCY']
									]
								],
								"buyer" => [
									"merchantBuyerId" => $Item['item_account_id'],
									"fullName" => "Felipe Oliveira Lourenço",
									"emailAddress" => "felipe.game.studio@gmail.com",
									"contactPhone" => "(13)33023740",
									"dniNumber" => "331.921.278-80",
									"shippingAddress" => [
										"street1" => "Av. Afonso Pena 296, sala 11",
										"street2" => '',
										"city" => "Santos",
										"state" => "SP",
										"country" => "BR",
										"postalCode" => "11020-000",
										"phone" => "(13)33023740"
									]
								]
							],

							"creditCard" => [
								"number" => "5502092758590037",
								"securityCode" => "703",
								"expirationDate" => "2027/12",
								"name" => "FLAVIO L SERRAO"
							],

							"extraParameters" => [
								"INSTALLMENTS_NUMBER" => 1 // Seria número de parcelas
							],

							"type" => "AUTHORIZATION_AND_CAPTURE",
							"paymentMethod" => "MASTERCARD",
							"paymentCountry" => "BR",
							"ipAddress" => "189.34.167.191"
						]
					];

					var_dump($Item, $this->payu_parameters);
					break;

				case 'boleto':
								# Pagamento com boleto bancário
				break;
			}


		}else{

		}





		}else{

		}


	// $Array = [
	// 	"test" => true,
	// 	"language" => "pt",
	// 	"command" => "SUBMIT_TRANSACTION",
	// 	"merchant" => [
	// 		"apiKey" => "Fqa2x6TVwCj2Rs2OBA0Qn0UVLR",
	// 		"apiLogin" => "yUAJV4Eybs7g9K3"
	// 	],

	// 	"transaction" => [
	// 		"order" => [
	// 			"accountId" => "853594",
	// 			"referenceCode" => "product001",
	// 			"description" => "Pacote de 1200 Moedas",
	// 			"language" => "pt",
	// 			"signature" => 'gerar código de assinatura',
	// 			"notifyUrl" => "https://vamove.com.br/admin/payment/transactions/",
	// 			"additionalValues" => [
	// 				"TX_VALUE" => [
	// 					"value" => '2.00',
	// 					"currency" => "BRL"
	// 				]
	// 			],
	// 			"buyer" => [
	// 				"merchantBuyerId" => "1",
	// 				"fullName" => "Felipe Oliveira Lourenço",
	// 				"emailAddress" => "felipe.game.studio@gmail.com",
	// 				"contactPhone" => "(13)33023740",
	// 				"dniNumber" => "331.921.278-80",
	// 				"shippingAddress" => [
	// 					"street1" => "Av. Afonso Pena 296, sala 11",
	// 					"street2" => '',
	// 					"city" => "Santos",
	// 					"state" => "SP",
	// 					"country" => "BR",
	// 					"postalCode" => "11020-000",
	// 					"phone" => "(13)33023740"
	// 				]
	// 			]
	// 		],

	// 		"creditCard" => [
	// 			"number" => "5502092758590037",
	// 			"securityCode" => "703",
	// 			"expirationDate" => "2027/12",
	// 			"name" => "FLAVIO L SERRAO"
	// 		],

	// 		"extraParameters" => [
	// 		         "INSTALLMENTS_NUMBER" => 1 // Seria número de parcelas
	// 		     ],

	// 		     "type" => "AUTHORIZATION_AND_CAPTURE",
	// 		     "paymentMethod" => "MASTERCARD",
	// 		     "paymentCountry" => "BR",
	// 		     "ipAddress" => "189.34.167.191"

	// 		 ]
	// 		];
}	


	//********************************************************
	//*************** METODOS PRIVADOS ***********************
	//********************************************************

	/**
	 * Incluir o produto e serviço de maneira correta para usar no metodo pay()
	 * as informações estão no ID da tabela flex_items
	 * @param [int] $ItemCode [coluna item_code na tabela item]
	 * @return [array] [Dados da tabela]
	 */
	private function itemCode($ItemCode){
		if($this->verifyParam() && isset($ItemCode)){
			$Item = _get_data_table(TB_ITEMS, [ 'item_code' => (string) $ItemCode ]);
			$Item = (isset($Item[0]))? $Item[0] : false;
			if($Item){
				return [$Item, true];
			}else{
				return ['Item não encontrado "Códido: '.$ItemCode.'" #'.__LINE__, false];
			}
		}else{
			return ['Nenhum Item foi adicionado na compra', false];
		}
	}


	/**
	 * Verifica se os parametros necessários para o envio foram 
	 * passados corretamente ou não estão faltando
	 * @return [bool] [true ou false]
	 */
	private function verifyParam(){
		if(!isset($this->payu_url)){
			return ['A URL de envio é obrigatória #'.__LINE__, false];

		}elseif(!isset($this->payu_api_login)){
			return ['API_LOGIN é obrigatória #'.__LINE__, false];

		}elseif(!isset($this->payu_api_key)){
			return ['API_KEY é obrigatória #'.__LINE__, false];

		}else{
			return ['Veficado com sucesso #'.__LINE__, true];
		}
	}


	/**
	 * Gerador de assinatura de autenticação
	 * @link http://developers.payulatam.com/pt/api/considerations.html#signature
	 */
	private function generatorAuth(){
		if($this->verifyParam()){
			$Auth = "{$this->payu_api_key}~{$this->payu_merchant_id}~{$this->payu_reference_code}~{$this->payu_price}~{$this->payu_currency}";
			return md5($Auth);
		}else{
			return ['Não foi possível gerar a autenticação #'.__LINE__, false];
		}
	}


	/**
	 * Dispara uma requisição generica via cURL.
	 * Por padrão envia pelo metodo POST, para alterar indique no parametro da 
	 * função se for GET | PUT | DELETE e etc.
	 * @param [string] [Metodo de envio, padrão POST]
	 * @return [JSON] [reponse da API]
	 */
	private function send($Method='POST'){
		if(isset($this->payu_url) && isset($this->payu_parameters)){
			$curl = curl_init();
			$headers = array('Content-Type: application/json; charset=utf-8');
			curl_setopt($curl, CURLOPT_URL, $this->payu_url);
			if($Method=='POST')	curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $this->payu_parameters);
			//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($curl, CURLOPT_HEADER, false);
			
			$out = curl_exec($curl);
			$Return = json_decode($out, true);
			// SUCCESS
			if($Return == null){
				$xml = $out;
				$out = simplexml_load_string($out);
				$out = json_encode($out);
				$Return = json_decode($out, true);
			// ERROR
			}else{
				$Return = json_decode($out, true);
			}

			if(isset($Return['code']) AND $Return['code'] !== 'ERROR'){
				// Tipo de saída
				switch ($this->output){
					case 'array':
					return [$Return, true];
					break;

					case 'json':
					$json = json_encode($Return);
					return [$json, true];
					break;

					case 'xml':
					return [$xml, true];
					break;
				}

			}else{
				$translate = [
					'The language of the request is not supported' => 'O idioma da solicitação não é suportado',
					'Invalid request format' => 'Formato de solicitação inválido'
				];
				$Erro = (isset($Return['error']))? strtr($Return['error'], $translate) : 'Erro desconhecido.';		
				return [$Erro, false ];
			}
			curl_close($curl);

		}else{
			return ['URL ou Parametros não foram passados', false];
		}
	}


}