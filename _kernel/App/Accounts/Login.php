<?php
/**
 * Responsável pelo login e logout do usuário
 * @copyright Felipe Oliveira Lourenço - 06.07.2021
 * @version 1.0.0
 */

namespace Accounts;

use Account\Check;
use Account\Helpers;
use Account\Password;

class Login
{

    private $email = false;
    private $pass = false;
    private $time = 1;  // 1440 minutos que representam 1 dia 
    private $level = null;
    private $all = false;

    public function __construct(string $email, string $pass)
    {
        $Email = Helpers::validateEmail($email)['BOOL'];
        if ($Email) {
            $this->email = $email;
            $User = _get_data_full("SELECT
				`account_id`,
				`account_name`,
				`account_email`,
				`account_level`,
				`account_password`
				FROM `" . TB_ACCOUNTS . "`
					WHERE `account_email` =:a AND
					`account_auth` = '1' AND
					`account_accept_terms` = '1' LIMIT 1",
                    "a={$this->email}");
            $this->all = (isset($User[0]))? $User[0] : false;
        }
        $this->pass = $pass;
    }

    /**
     * Realizar o Login e redirecionar para o Valor da variavel "$Redirect"
     * @return string [URL de redirecionamento]
     */
    public function login()
    {
        if ($this->email) {
            $User = new Check($this->email);
            $User = $User->check();
            if ($User['BOOL']) {          
                
                $passDB = (isset($this->all['account_password'])) ? $this->all['account_password'] : false;
                if ($passDB && $this->pass) {

                    // Vericar se a senha conhecide
                    $Check = new Password($this->pass, $passDB);
                    $Check = $Check->passVerify();
                    if ($Check) {

                        // Atualizar o last login
                        $Last = _up_data_table(TB_ACCOUNTS, [
                            'where' => ['account_email' => $this->email],
                            'values' => ['account_last_login' => date('Y-m-d H:i:s')],
                        ]);
                        if ($Last) {

                            // Inicar a sessão do navegador
                            $_SESSION['account_time'] = date('Y-m-d H:i:s', strtotime("+ {$this->time} minutes"));
                            $_SESSION['account_id'] = $this->all['account_id'];
                            $_SESSION['account_email'] = $this->all['account_email'];
                            $_SESSION['account_name'] = $this->all['account_name'];
                            $_SESSION['account_level'] = (int) $this->all['account_level'];
                            $_SESSION['account_session'] = true;
                            $_SESSION['account_ip'] = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);
                            $_SESSION['account_url'] = BASE . trim(strip_tags(filter_input(INPUT_GET, 'pg', FILTER_DEFAULT)));

                            return [
                                "OUTPUT" => $_SESSION,
                                "BOOL" => true,
                                "MESSAGE" => (string) 'Tudo certo!',
                            ];
                        }
                        return [
                            "OUTPUT" => $this->email,
                            "BOOL" => false,
                            "MESSAGE" => (string) 'Erro ao atualizar a data do último login',
                        ];
                    }
                    return [
                        "OUTPUT" => $this->email,
                        "BOOL" => false,
                        "MESSAGE" => (string) 'Senha incorreta!',
                    ];
                }
                return [
                    "OUTPUT" => $this->email,
                    "BOOL" => false,
                    "MESSAGE" => (string) 'Erro ao validar e-mail e senha!',
                ];
            }
            return [
                "OUTPUT" => $this->email,
                "BOOL" => false,
                "MESSAGE" => $User['MESSAGE'],
            ];
        }
        return [
            "OUTPUT" => $this->email,
            "BOOL" => false,
            "MESSAGE" => (string) 'Digite um e-mail válido!',
        ];
    }

}
