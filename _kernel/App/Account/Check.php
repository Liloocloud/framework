<?php
/**
 * Responsável por realizar todas as checagens de contas na tabela "accounts"
 * @copyright Felipe Oliveira Lourenço - 23.06.2021
 * @version 1.0.0
 */

namespace Account;

class Check
{
    private $check;
    private $email;
    private $active = false; // Se a conta está ativa ou não
    private $auth = false; // Se validou a conta pelo código de validação
    private $accept = false; // Se aceitou os termos de uso da plataforma
    private $pass = false; // Se o password está vazio ou não
    private $key = false; // Se a chave de ativação está "null"

    /**
     * Checa se uma conta existe pelo e-mail
     */
    public function __construct(string $email)
    {
        $User = _get_data_full(
            "SELECT
            `account_email`,
            `account_status`,
            `account_auth`,
            `account_accept_terms`,
            `account_password`,
            `account_activation_key`
            FROM `" . TB_ACCOUNTS . "`
            WHERE `account_email` =:a LIMIT 1",
            "a={$email}"
        );
        $User = (isset($User[0])) ? $User[0] : false;
        if ($User != false) {
            if ($User['account_status'] == 1) {
                $this->active = true;
            }
            if ($User['account_accept_terms'] == 1) {
                $this->accept = true;
            }
            if ($User['account_auth'] != 0) {
                $this->auth = true;
            }
            if ($User['account_password'] != null) {
                $this->pass = true;
            }
            if ($User['account_activation_key'] != null) {
                $this->key = true;
            }
            $this->check = true;
            $this->email = $email;
        } else {
            $this->check = false;
            $this->email = $email;
        }
    }

    /**
     * Retorna se o usuáro existe ou não
     */
    public function activationKey()
    {
        if ($this->key == true) {
            return [
                "BOOL" => true,
                "OUTPUT" => $this->email,
                "MESSAGE" => 'O usuário já recebeu a chave de ativação',
            ];
        }
        return [
            "BOOL" => false,
            "OUTPUT" => $this->email,
            "MESSAGE" => 'O usuário ainda não recebeu a chave de ativação',
        ];
    }

    /**
     * Retorna se o usuáro existe ou não
     */
    public function check()
    {
        if ($this->check == true) {
            return [
                "BOOL" => true,
                "OUTPUT" => $this->email,
                "MESSAGE" => 'Usuário encontrado',
            ];
        }
        return [
            "BOOL" => false,
            "OUTPUT" => $this->email,
            "MESSAGE" => 'Usuário não encontrado',
        ];
    }

    /**
     * Se aceitou os termos ou não
     */
    public function acceptTerms()
    {
        if ($this->accept == true) {
            return [
                "BOOL" => true,
                "OUTPUT" => $this->email,
                "MESSAGE" => 'Você aceitou os termos de uso',
            ];
        }
        return [
            "OUTPUT" => $this->email,
            "BOOL" => false,
            "MESSAGE" => 'Você não aceitou os termos e condições',
        ];
    }

    /**
     * Checa se o usuário validou sua conta 
     * pelo código de validação enviado no momento do 
     * cadastro
     */
    public function auth()
    {
        if ($this->auth == true) {
            return [
                "BOOL" => true,
                "OUTPUT" => $this->email,
                "MESSAGE" => 'Conta validada pelo código de ativação',
            ];
        }
        return [
            "BOOL" => false,
            "OUTPUT" => $this->email,
            "MESSAGE" => 'A conta não foi validada pelo código de ativação',
        ];
    }

    /**
     * Retorna se o usuário está ativo ou não pela columa status
     * Um usuário só poderá utilizar uma conta se a mesma estiver
     * com o status igual a '1'. Se for igual a '0' isso significa
     * que alguns passos não foram concluídos
     */
    public function active()
    {
        if ($this->active == true) {
            return [
                "BOOL" => true,
                "OUTPUT" => $this->email,
                "MESSAGE" => 'Usuário ativo',
            ];
        }
        return [
            "BOOL" => false,
            "OUTPUT" => $this->email,
            "MESSAGE" => 'Usuário inativo',
        ];
    }

    /**
     * Checa se os campos passados pelo parametro estão preenchidos na tabela
     * passe os nomes dos campos num array
     */
    public function fields($fields = null)
    {
        if ($this->check) {
            if ($fields != null) {
                // Mais de um campo passado
                if (count($fields) > 1) {
                    // $selects = explode(",", $fields);
                    $selects = '`' . implode('`,`', $fields) . '`';
                    $DB = _get_data_full("
                        SELECT {$selects} FROM `" . TB_ACCOUNTS . "`
                        WHERE `account_email` =:a", "a={$this->email}");
                    $DB = (isset($DB[0])) ? $DB[0] : false;
                    if ($DB != false) {
                        $N1 = (int) count($DB);
                        $N2 = (int) count(array_filter($DB));
                        if ($N1 === $N2) {
                            return [
                                "OUTPUT" => $this->email,
                                "BOOL" => true,
                                "MESSAGE" => 'Todos os campos foram preenchidos',
                            ];
                        }
                        return [
                            "OUTPUT" => $this->email,
                            "BOOL" => false,
                            "MESSAGE" => 'Existe algum campo obrigatório vazio',
                        ];
                    }
                    return [
                        "OUTPUT" => $this->email,
                        "BOOL" => false,
                        "MESSAGE" => 'Nome da coluna está incorreto',
                    ];
                    // Apenas um campo passado
                } else {
                    $DB = _get_data_full("
                        SELECT `" . $fields[0] . "` FROM `" . TB_ACCOUNTS . "`
                        WHERE `account_email` =:a", "a={$this->email}");
                    $DB = (isset($DB[0])) ? $DB[0] : false;
                    if ($DB != false) {
                        $N1 = (int) count($DB);
                        $N2 = (int) count(array_filter($DB));
                        if ($N1 === $N2) {
                            return [
                                "OUTPUT" => $this->email,
                                "BOOL" => true,
                                "MESSAGE" => 'Campo preenchido',
                            ];
                        }
                        return [
                            "OUTPUT" => $this->email,
                            "BOOL" => false,
                            "MESSAGE" => 'Campo obrigatório vazio',
                        ];
                    }
                    return [
                        "OUTPUT" => $this->email,
                        "BOOL" => false,
                        "MESSAGE" => 'Nome da coluna está incorreto',
                    ];
                }
            }
            return [
                "OUTPUT" => $this->email,
                "BOOL" => false,
                "MESSAGE" => 'Nenhuma coluna inserida no parâmetro',
            ];
        }
        return [
            "OUTPUT" => $this->email,
            "BOOL" => false,
            "MESSAGE" => 'Usuário não encontrado',
        ];
    }
}
