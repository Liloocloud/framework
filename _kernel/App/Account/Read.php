<?php
/**
 * Leitura dos usuários da tabela "accounts"
 * @copyright Felipe Oliveira Lourenço - 25.06.2021
 * @version 1.0.0
 */

namespace Account;

use Account\Helpers;
use Account\Check;

class Read
{
    private $email; // email do usuário da conta
    private $data; // guarda todos os dados retornados

    /**
     * Retorna os dados pelo email passado
     */
    public function __construct(string $email)
    {
        if (Helpers::validateEmail($email)['BOOL'] == true) {
            $Check = new Check($email);
            if($Check->check()['BOOL']){
                $this->email = $email;
                $Account = _get_data_table(TB_ACCOUNTS, ['account_email' => $this->email]);
                $Account = (isset($Account[0])) ? $Account[0] : false;
                if ($Account != false) {
                    $this->data = $Account;
                }
            }else{
                $this->email = false;
                $this->data = false;  
            }
        }else{
            $this->email = false;
            $this->data = false;
        }

    }

    /**
     * Retorna os dados do usuário pelo e-mail passado
     */
    // public function getUser()
    // {
    //     if ($this->check) {
    //         return $this->output($this->all, true, 'Leitura realizada com sucesso');
    //     }
    //     return $this->output(null, false, 'O usuário que você está tentando ler não existe');
    // }

}

// return [
//     "OUTPUT" => $email,
//     "BOOL" => false,
//     "MESSAGE" => (string) 'E-mail inválido',
// ];

//$this->all = $Account;
//$this->check = true;
//$this->email = $email;
//$this->name = $Account['account_name'];
//$this->lastname = $Account['account_lastname'];
//$this->level = $Account['account_level'];
//$this->url = $Account['account_url'];
//$this->coin = $Account['account_coin'];
//$this->adds = (!empty($Account['account_adds']))? json_decode($Account['account_adds']) : '';
//$this->status = $Account['account_status'];
