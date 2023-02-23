<?php
/**
 * Gerenciador de JSON web Token (JWT) no padrão HS265
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com
 * @since 22.03.2021
 * @version 1.0.0 
 */

namespace Api;
use Account\Account;
use DateTime;

class JWT 
{
	
	private $typ = 'JWT';
	private $alg = 'HS256';
	private $exp;
	private $uid;
	private $email;
	private $key;
    private $url;
    private $callback;

	function __construct($UserEmail, $UserKey)
	{
		
        // Acessa o banco para verificar se o email existe
        $Account = new Account;
        $Account->email(filter_var($UserEmail, FILTER_VALIDATE_EMAIL));

        if($Account->checkAccount()){
            $Data = $Account->getResultsEmail();
            if($Data['account_status'] == 1){    
                
                $Url = _get_data_table(TB_ACCOUNT_API, ['api_account_id' => (int) $Data['account_id']]);
                $Url = (isset($Url[0]))? $Url[0] : false;
                if($Url){

                    $this->uid = (int) $Data['account_id'];
                    $this->email = trim($UserEmail);
                    $this->key = trim($UserKey);
                    $this->exp = (new DateTime("now"))->getTimestamp();
                    $this->url = $Url['api_url'];

                    return $this->callback = ['JWT checado', true, 'SUCCESS'];
                }
                return $this->callback = ['URL não permitida', false, 'ERROR'];
            }
            return $this->callback = ['Usuário não está ativo', false, 'ERROR'];
        }
        return $this->callback = ['Usuário inválido', false, 'ERROR'];
    }


	/**
     * Cria o token para ser utilizado no conexão dentro desse token
     */
    public function createToken()
    {
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256',
            'url' => 'https://liloo.com.br'
        ];
        $payload = [
            'exp' => $this->exp,
            'uid' => $this->uid,
            'email' => $this->email,
        ];

        //JSON
        $header = json_encode($header);
        $payload = json_encode($payload);

        //Base 64
        $header = base64_encode($header);
        $payload = base64_encode($payload);

        //Sign
        $sign = hash_hmac('sha256', $header . "." . $payload, $this->key, true);
        $sign = base64_encode($sign);

        //Token
        $token = $header . '.' . $payload . '.' . $sign;

        return $token;
    }

}