<?php
/**
 * Gerenciador de acesso aos recursos de módulos da plataforma
 * Funciona exatamento como uma portaria de acesso
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com
 * @since 22.03.2021
 * @version 1.0.0 
 */

namespace Api;
use Account\Account;
use Api\KeyGenerator;
use Api\JWT;

class ApiGateway{

    private $token; // Guarda o valor do token para ser lido pelo escopo da class
    private $key;   // APP KEY passada pelo usuário
    private $keyDB; // APP KEY guardada no banco de dados
    private $email; // E-mail extraído da JWT
    private $callback; // Guarda as mensagens de saída da Class

    /**
     * O construtor verifica em monta a regra para verificação da KEY
     * @param [type] $key [description]
     */
    function __construct($email, $key)
    {
        $Account = new Account;
        $Account->email(filter_var($email, FILTER_VALIDATE_EMAIL));
        // Checa se a conta existe
        if($Account->checkAccount()){
            $Data = $Account->getResultsEmail();
            // Checa se o Token do usuário conte 22 caracteres
            if(strlen($key) == 22){             
                $this->key = $key;
                $keyDB = new keyManager;
                $this->keyDB = $keyDB->decode($Data['account_key']);
                // Compara o Token do usuário com a do banco de dados
                if($this->key === $this->keyDB){
                    return $this->callback = ['Autenticação validade com sucesso', true, 'SUCCESS'];
                }
                return $this->callback = ['APP_KEY inválida', false, 'ERROR_APP_KEY'];
            }
            return $this->callback = ['APP_KEY inválida', false, 'ERROR_APP_KEY'];
        }  
        return $this->callback =  ['E-mail inválido', false, 'ERROR'];
    } 

}