<?php
/**
 * Responsável por realizar todas as checagens de contas na tabela "accounts"
 * @copyright Felipe Oliveira Lourenço - 23.06.2021
 * @version 1.0.0
 */

namespace Client;

class Read
{
    private $check;
    private $email;
    private $active = false;  // Se a conta está ativa ou não
    private $auth = false;  // Se validou a conta pelo código de validação
    private $accept = false; // Se aceitou os termos de uso da plataforma
    private $pass = false; // Se o password está vazio ou não
    private $data; // Retorna os dados do cliente

    /**
     * Checa se um client existe pelo e-amil
     */
    public function __construct(string $email)
    {
        $User = _get_data_full(
            "SELECT 
            `client_id`,
            `client_code`,
            `client_name`,
            `client_email`
            FROM `".TB_CLIENTS."`
            WHERE `client_email` =:a LIMIT 1",
            "a={$email}"
        );      
        $User = (isset($User[0])) ? $User[0] : false;
        if ($User != false) {
            $this->check = true;
            $this->data = $User;
            $this->email = $email;
        }else{
            $this->check = false;
            $this->data = $User;
            $this->email = $email;
        }
    }

    /**
     * Se aceitou os termos ou não
     */
    public function acceptTerms()
    {
        if ($this->accept == true) {
            return [
                "OUTPUT" => $this->email,
                "BOOL" => true,
                "MESSAGE" => (string) 'Você aceitou os termos de uso',
            ];
        }
        return [
            "OUTPUT" => $this->email,
            "BOOL" => false,
            "MESSAGE" => (string) 'Você ainda não finalizou seu cadastro!',
        ];
    }

    /**
     * Verifica se o campo password está vazio
     */
    public function voidPass()
    {
        if ($this->pass == true) {
            return [
                "OUTPUT" => $this->email,
                "BOOL" => true,
                "MESSAGE" => (string) 'Senha preenchida',
            ];
        }
        return [
            "OUTPUT" => $this->email,
            "BOOL" => false,
            "MESSAGE" => (string) 'Você ainda não criou sua senha',
        ];
    }


    /**
     * Retorna se o usuáro existe ou não
     */
    public function check()
    {
        if ($this->check == true) {
            return [
                "OUTPUT" => $this->data,
                "BOOL" => true,
                "MESSAGE" => (string) 'Usuário encontrado',
            ];
        }
        return [
            "OUTPUT" => $this->data,
            "BOOL" => false,
            "MESSAGE" => (string) 'Usuário não encontrado',
        ];
    }

    /**
     * Checa se o usuário validou a conta pelo código de validação enviado
     */
    public function auth()
    {
        if ($this->auth == true) {
            return [
                "OUTPUT" => $this->email,
                "BOOL" => true,
                "MESSAGE" => (string) 'Usuário validou a conta',
            ];
        }
        return [
            "OUTPUT" => $this->email,
            "BOOL" => false,
            "MESSAGE" => (string) 'Usuário ainda não validou a conta',
        ];
    }


    /**
     * Retorna se o usuário está ativo ou não pela columa status
     */
    public function active()
    {
        if ($this->check == true) {
            if ($this->active == true) {
                return [
                    "OUTPUT" => $this->email,
                    "BOOL" => true,
                    "MESSAGE" => (string) 'Usuário ativo',
                ];
            }
            return [
                "OUTPUT" => $this->email,
                "BOOL" => false,
                "MESSAGE" => (string) 'Usuário inativo',
            ];
        }
        return [
            "OUTPUT" => $this->email,
            "BOOL" => false,
            "MESSAGE" => (string) 'Usuário não encontrado',
        ];
    }

    /**
     * Checa se os campos passados pelo parametro estão preenchidos na tabela
     * passe os nomes dos campos num array
     */
    public function fields($fields=null)
	{
		if($this->check){
            if($fields != null){
                // Mais de um campo passado
                if (count($fields) > 1) {
                    // $selects = explode(",", $fields);
                    $selects = '`'.implode('`,`', $fields).'`';
                    $DB = _get_data_full("
                        SELECT {$selects} FROM `".TB_ACCOUNTS."`
                        WHERE `account_email` =:a", "a={$this->email}");
                    $DB = (isset($DB[0]))? $DB[0] : false;
                    if($DB != false){
                        $N1 = (int) count($DB);
                        $N2 = (int) count(array_filter($DB));
                        if($N1 === $N2){
                            return [
                                "OUTPUT" => $this->email,
                                "BOOL" => true,
                                "MESSAGE" => (string) 'Todos os campos foram preenchidos',
                            ];
                        }
                        return [
                            "OUTPUT" => $this->email,
                            "BOOL" => false,
                            "MESSAGE" => (string) 'Existe algum campo obrigatório vazio',
                        ];
                    }
                    return [
                        "OUTPUT" => $this->email,
                        "BOOL" => false,
                        "MESSAGE" => (string) 'Nome da coluna está incorreto',
                    ];
                // Apenas um campo passado
                }else{
                    $DB = _get_data_full("
                        SELECT `".$fields[0]."` FROM `".TB_ACCOUNTS."`
                        WHERE `account_email` =:a", "a={$this->email}");
                    $DB = (isset($DB[0]))? $DB[0] : false;
                    if($DB != false){
                        $N1 = (int) count($DB);
                        $N2 = (int) count(array_filter($DB));
                        if($N1 === $N2){
                            return [
                                "OUTPUT" => $this->email,
                                "BOOL" => true,
                                "MESSAGE" => (string) 'Campo preenchido',
                            ];
                        }
                        return [
                            "OUTPUT" => $this->email,
                            "BOOL" => false,
                            "MESSAGE" => (string) 'Campo obrigatório vazio',
                        ];
                    }
                    return [
                        "OUTPUT" => $this->email,
                        "BOOL" => false,
                        "MESSAGE" => (string) 'Nome da coluna está incorreto',
                    ];
                }               
            }            
            return [
                "OUTPUT" => $this->email,
                "BOOL" => false,
                "MESSAGE" => (string) 'Nenhuma coluna inserida no parâmetro',
            ];            
		}
        return [
            "OUTPUT" => $this->email,
            "BOOL" => false,
            "MESSAGE" => (string) 'Usuário não encontrado',
        ];
	}
}
