<?php
/**
 * Gerador de Key Aleatório para uso da API Gateway
 * @copyright Criado por Felipe Oliveira - felipe.game.studio@gmail.com
 * @since 22.03.2021
 * @version 1.0.0
 */

// &*(}

namespace Api;

class keyManager
{
	
    private $key;  // Guarda a chave criada pelo método
    private $keyDecode;  // Chave decodificada
	private $keyEncode;  // Chave codificada
	private $Upper = "ABCDEFGHIJKLMNOPQRSTUVYXWZ";
	private $Lower = "abcdefghijklmnopqrstuvyxwz";
	private $Number = "0123456789";
	private $Character = ")[]{@$.#%!+=";


    public function token(){
        return implode('-', str_split(substr(strtolower(md5(microtime().Rand(1000, 9999))), 0, 30), 6));
    }

    public function hmac($token){
        return hash_hmac('ripemd160', 'Liloo Plataform', $token);
    }

	/**
     * Gerador de Chave Aleatória para entregar ao usuário
     */
    public function random($algar = 22): string
    {
        $senha  = str_shuffle($this->Upper);
        $senha .= str_shuffle($this->Lower);
        $senha .= str_shuffle($this->Number);
        $senha .= str_shuffle($this->Character);
        $this->key = substr(str_shuffle($senha), 0, $algar);
        return $this->key;
    }

    /**
     * Converte a Key para incluir no banco de dados, pois isso dificulta
     * a descoberta da key por estar maqueada
     */
    public function encode($param=null): string
    {
        $key = ($param == null)? $this->key : $param;
        $key = chunk_split($this->key, 8);
        $key = explode("\n", $key);
        $key = array_filter($key);       
        $key = trim($key[0]).'&'.$this->random().'*'.trim($key[2]).'('.$this->random().'}'.trim($key[1]);
        return $this->keyEncode = '$2a$08$'.substr(base64_encode($key), 0, -2);
    }

    /**
     * Decodifica a Key para o padrão normal
     */
    public function decode($param=null): string
    {  
        $key = ($param == null)? $this->keyEncode : $param;
        $key = $key.'==';
        $key = str_replace('$2a$08$', '', $key);
        $key = base64_decode($key);
        $Part1 = explode('&', $key);
        if(isset($Part1[0])){
            $Part2 = explode('*', $Part1[1]);
            $Part3 = explode('(', $Part2[1]);
            $Part4 = explode('}', $Part3[1]);
            return $this->keyDecode = trim($Part1[0]).trim($Part4[1]).trim($Part3[0]);
        }
        return ['Não foi possível decodificar o Token', false];
    }

}