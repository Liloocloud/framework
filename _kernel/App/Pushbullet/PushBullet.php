<?php
/**
 * Controle a paginação completa com todos os links em Uikit
 * @copyright Felipe Oliveira - 12.04.2020
 * @version 1.0.0
 */

/**
 * TUTORIAL DE USO:
 * 1. Crie uma conta no pushbullet utilizando um email do GMAIL
 * 2. Faça login para acessar o Painel de Controle
 * 3. Gere um Token em "https://www.pushbullet.com/#settings/account"
 * 4. Baixe o aplicativo da PushBullet em seu smartphone acessando com a mesmo conta do GMAIL
 * 5. No aplicativo, habilite a opção de emviar SMS
 * 6. No PHP instancia a Class PushBullet
 * 7. Use o método GetUser da Class pra buscar seu ID usuário no Pushbullet
 * 8. Use o método GetDevice da Class pra buscar o ID do seu dispositivo que irá enviar SMS's
 * 8. Use o metodo Construtor com as 3 informações abaixo:
 * -- Token do PushBullet (1º parametro)
 * -- ID do dispositivo (2º parametro)
 * -- ID do usuário (3º parametro)
 * 10. Use o metodo Phone('13999999999'); para setar o telefone que deseja enviar a mensagem
 * 11. Use o metodo Message('Sua mensagem'); para montar sua mensagem
 * 12. Por fim use o Metodo SMS(); pra disparar a mensagem
 *
 * VEJA COMO FICOU
 * 		
 * 		$SMS = new PushBullet(
 * 			seu_token_aqui,
 * 			id_do_dispositivo_aqui,
 * 			id_do_usuario_aqui
 * 		);
 * 		$SMS->Phone('número do telefone');
 * 		$SMS->Message('Sua mensagem aqui');
 * 		$SMS->SMS();
 */

class PushBullet{
	
	private $token; 		// Tokem da sua conta no pushbullet https://pushbullet.com
	private $device_id;		// ID do dispositivo cadastrado no pushbullet
	private $user_id;		// ID da conta que corresponde ao Token
	private $message;		// Mensagem a ser enviada pelo metodo SMS
	private $phone;			// Número do celular para onde vai enviar a mensagem
	private $prefix='+55';	// Prefixo do País
	private $plataform; 	// Qual plataforma do celular que envia o SMS

	function __construct($token, $device_id, $user_id){
		$this->token = (isset($token))? $token : _ERROR('Token não pode estar vazio');
		$this->device_id = (isset($device_id))? $device_id : _ERROR('Id do dispositivo não pode estar vazio');
		$this->user_id = (isset($user_id))? $user_id : _ERROR('Id do usuário da contao não pode estar vazio');
	}

	// Pega o Número do telefone
	public function Phone($phone){
		$this->phone = strtr($phone, ['('=>'',')'=>'',' '=>'','-'=>'','.'=>'']);
	}

	// Pega a string da mensagem
	public function Message($message){
		$this->message = $message;
	}

	// Envia SMS
	public function SMS(){
		$content   = json_encode([
			"push" => [
				"type" => "messaging_extension_reply", 
				"conversation_iden" => "{$this->prefix}{$this->phone}", 
				"message" => "{$this->message}",
				"package_name" => "{$this->Plataform()}",
				"source_user_iden" => "{$this->user_id}",
				"target_device_iden" => "{$this->device_id}"
			],
			"type" => "push"
		]);

		$curl = curl_init('https://api.pushbullet.com/v2/ephemerals');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->Header());
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content );
		$response = curl_exec($curl);
		if($response = '{}')
			return true;
		else
			return false;
	}

	// Retorna o ID do usuário da conta do PushBullet
	public function GetUser(){
		$curl = curl_init('https://api.pushbullet.com/v2/users/me');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->Header());
		curl_setopt($curl, CURLOPT_HTTPGET, true);
		return curl_exec($curl);
	}

	// Retorna o Dispositivo da contao do PushBullet
	public function GetDevice(){
		$curl = curl_init('https://api.pushbullet.com/v2/devices');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->Header());
		curl_setopt($curl, CURLOPT_POSTFIELDS, '{}' );
		return curl_exec($curl);
	}

	// Retorna por padrão o uso da plataforma Android do celular que esta enviando
	public function Plataform($plataform='android'){
		$this->plataform = (isset($plataform))? 'com.pushbullet.'.$plataform : 'com.pushbullet.android';
	}

	// Método Privado que Monta a Header para o envio
	private function Header(){
		$headers = [];
		$headers[] = "Access-Token: {$this->token}";
		$headers[] = "Content-Type: application/json";
		return $headers;
	}
}