<?php
/**
 * Gestão usuários da plataforma, responsável por gerenciar cada coluna da tabela accounts
 * @copyright Felipe Oliveira Lourenço - 21.06.2021
 * @version 1.0.0
 */

namespace Account;
use Database\Create;
use Database\Read;
use Database\Update;
use Database\Delete;

    // Deve ter no mínimo 2 caractares
    // Evitar palavrões e palavras obcenas
    // Leitura de um usuário por ID
    // Leitura de um grupo de usuário "this" por ID
    // Atualizando dados do usuário
    // Excluindo dados do usuário

class Users
{

    // private $id; 
    private $email;
    private $check = false;  
    private $all;
    
    private $name;
    private $lastname;
    private $password;
    private $level;
    private $url;
    private $coin;
    private $adds;
    private $status;

    /** 
     * Inicia uma instancia com o email, sendo assim a manipulação
     * garante que o usuário exista.
     */
    function __construct(string $email){     
        $User = _get_data_table(TB_ACCOUNTS, [ 'account_email' => $email ] );
        $User = (isset($User[0]))? $User[0] : false;
        if($User != false){
            $this->all = $User;
            $this->check = true;
            $this->email = $email;
            $this->name = $User['account_name'];
            $this->lastname = $User['account_lastname'];
            $this->level = $User['account_level'];
            $this->url = $User['account_url'];
            $this->coin = $User['account_coin'];
            $this->adds = (!empty($User['account_adds']))? json_decode($User['account_adds']) : '';
            $this->status = $User['account_status'];     
        }
    }


    /** 
     * Retorna os dados do usuário pelo e-mail passado
     */
    public function getUser(){
        if($this->check){
            return $this->output($this->all, true, 'Leitura realizada com sucesso' );
        }
        return $this->output( null, false, 'O usuário que você está tentando ler não existe' );
    }

    /** 
     * Atualiza nome de usuário
     */
    public function updateName($stringName)
    {
        if($this->check){
            if ( $this->validateName($stringName)){
                $UpName = _up_data_table( TB_ACCOUNTS, [
                    'where' => [ 'account_email' => $this->email ],
                    'values' => [ 'account_name' => $stringName ]
                ]);
                if( $UpName ){
                    return $this->output( null, true, 'Nome de usuário atualizado com sucesso' );
                }
                return $this->output( null, false, 'Não foi possível atualizar nome de usuário' );
            }
            return $this->output( null, false, 'Digite um nome válido, sem números nem hífem' );
        }
        return $this->output( null, false, 'O usuário que você está tentando atualizar não existe' );
    }

    /** 
     * Atualiza sobre nome de usuário
     */
    public function updateLastname($stringLastname)
    {
        if($this->check){
            if ( $this->validateName($stringLastname) ){
                $UpLast = _up_data_table( TB_ACCOUNTS, [
                    'where' => [ 'account_email' => $this->email ],
                    'values' => [ 'account_lastname' => $stringLastname ]
                ]);
                if( $UpLast ){
                    return $this->output( null, true, 'Sobrenome de usuário atualizado com sucesso' );
                }
                return $this->output( null, false, 'Não foi possível atualizar sobrenome de usuário' );
            }
            return $this->output( null, false, 'Digite um sobrenome válido, sem números nem hífem' );
        }
        return $this->output( null, false, 'O usuário que você está tentando atualizar não existe' );
    }

    /**
     * Atualiza o status do usuário na plataforma
     * Sendo 1 para Ativo e 0 para inativo
     */
    public function updateStatus($status)
    {
        if($this->check){
           $status = ($status == 1)? 1 : 0;      
            $UpStatus = _up_data_table( TB_ACCOUNTS, [
                'where' => [ 'account_email' => $this->email ],
                'values' => [ 'account_status' => (string) $status ]
            ]);
            if( $UpStatus ){
                return $this->output( null, true, 'Status do usuário atualizado com sucesso' );
            } 
        }
        return $this->output( null, false, 'O usuário que você está tentando atualizar não existe' );
    }

    /**
     * Atualiza um ou mais campos da tabela "Accounts" passando
     * um array associativo
     */
    public function updateMultiple(){
        
    }


    /**
     * Formata a saída de dados no padrão DipSwitch
     */
    private function output($out=null, $bool=false, $msg='Nada consta')
    {
        return [
            "OUTPUT" => $out,
            "BOOL" => (bool) $bool,
            "MESSAGE" => (string) $msg
        ];
    }

    /**
     * Valida nome e sobrenome
     */
    private function validateName($stringName)
    {
        if ( preg_match('/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\d\s]+$/', $stringName)){
            if( strlen($stringName) >= 2 ){
                return true;
            }
            return false;
        }
        return false;
    }

    // if (preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-([0-9]{2})$/', $cpf, $partes)) {
    //     $digito_verificador = $partes[1];
    // }


}
