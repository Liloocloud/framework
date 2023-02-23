<?php
/**
 * Responsável por inserir usuários no banco de dados
 * @copyright Felipe Oliveira Lourenço - 23.06.2021
 * @version 1.0.0
 */

namespace Account;

// use Database\Create;
// use Database\Read;
// use Database\Update;
use Account\Check;
use Account\Helpers;
use Email\Email;

class Create
{

    private $data; // Dados do formulário a serem inseridos (Deverá ser um Array)
    private $activationKey; // Chave de ativação que será guardada na tabela
    private $activationKeyUser; // A mesma chave só que sem criptograia, será entregue ao usuáio

    /**
     * Inicia obtendo todos os valores a serem inseridos em array
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->activationKeyUser = mt_rand(100000, 999999);
        $this->activationKey = (string) hash('sha256', $this->activationKeyUser );
    }

    /**
     * Cria usuário e retorna o ID inserido
     * Ideal para cadastro em passos
     */
    public function create()
    {
        if (array_key_exists('account_email', $this->data)) {
            $Check = new Check($this->data['account_email']);
            if ($Check->check()['BOOL'] == false) {
                if (Helpers::validateEmail($this->data['account_email'])['BOOL'] == true) {
                    $Data = $this->data;
                    $Data['account_activation_key'] = $this->activationKey;
                    $Create = _set_data_table(TB_ACCOUNTS, $Data);                   
                    $Create = (isset($Create)) ? $Create : false;
                    if ($Create != false) {
                        return [
                            "bool" => true,
                            "output" => $Create,
                            "message" => 'Usuário inserido com sucesso!',
                        ];
                    }
                    return [
                        "bool" => false,
                        "output" => null,
                        "message" => 'Algum campo obrigatório não foi passado. Atenção, level e e-mail são obrigatórios',
                    ];
                }
                return [
                    "bool" => false,
                    "output" => $this->data,
                    "message" => 'E-mail inválido',
                ];
            }
            return [
                "bool" => false,
                "output" => $this->data,
                "message" => 'O usuário que está tentando cadastrar já existe',
            ];
        }
        return [
            "bool" => false,
            "output" => $this->data,
            "message" => 'O campo \'account_email\' não foi passado no array',
        ];
    }


    /**
     * Atualiza a Chave de ativação do Usuário. Caso ocorra
     * algum tipo de problema o sistema irá atualizar a coluna
     * na tabele accounts
     */
    public function upActivationKey()
    {
        return $this->data;
        // $Sync['account_activation_key'] = $this->activationKey;
        
    }


    /**
     * Envio o códio de confirmação randomico para o email passado
     * Ideal para validação de conta de usuário
     */
    public function sendMailConfirm($paramSubject, $paramName, $paramEmail)
    {
        $email = new Email();
        $email->add(
            $paramSubject,
            '<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="10%" align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:2px; color:#ffffff;"></td>
                    <td width="80%" align="center" valign="top">
                        <h3 style="font-size: 28px">Vamos validar seu cadastro?</h3>
                        <h4 style="font-size: 22px"><b>'.$this->activationKeyUser.'</b></h4>
                        <p style="font-size: 18px">Use o código acima para validar sua conta na Busque Já. Você tem até '.TIME_VALIDATE_ACCOUNT.' minutos para usar esse código</p>
                        <p>Caso ocorra algum problema ou o tempo expire, reenvie o código de validação em sua tela de casdastro.</p>
                    </td>
                    <td width="10%" align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:2px; color:#ffffff;"></td>
                </tr>
            </table>',
            $paramName,
            $paramEmail
        );
        if ($email->send($paramSubject)) {
            return [
                "bool" => true,
                "output" => $this->data,
                "message" => 'E-mail enviado com sucesso!',
            ];
        }
        return [
            "bool" => false,
            "output" => $this->data,
            "message" => 'Erro ao enviar e-mail de validação.',
        ];
    }

    /**
     * Reenvio o códio de confirmação randomico para o email passado
     * atualizando no banco de dados a chave de validação "account_activation_key"
     * Ideal para validação de conta de usuário
     */
    public function resendMailConfirm($paramSubject, $paramName, $paramEmail)
    {
        $Up = _up_data_table(TB_ACCOUNTS, [
            'where' => [ 'account_email' => $paramEmail ],
            'values' => [ 
                'account_name' => $paramName,
                'account_activation_key' => (string) $this->activationKey
            ]
        ]);
        if($Up){
            $email = new Email();
            $email->add(
                $paramSubject,
                '<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="10%" align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:2px; color:#ffffff;"></td>
                        <td width="80%" align="center" valign="top">
                            <h3 style="font-size: 28px">Vamos validar seu cadastro?</h3>
                            <h4 style="font-size: 22px"><b>'.$this->activationKeyUser.'</b></h4>
                            <p style="font-size: 18px">Use o código acima para validar sua conta na Busque Já. Você tem até '.TIME_VALIDATE_ACCOUNT.' minutos para usar esse código</p>
                            <p>Caso ocorra algum problema ou o tempo expire, reenvie o código de validação em sua tela de casdastro.</p>
                        </td>
                        <td width="10%" align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:2px; color:#ffffff;"></td>
                    </tr>
                </table>',
                $paramName,
                $paramEmail
            );
            if ($email->send($paramSubject)) {
                return [
                    "bool" => true,
                    "output" => $this->data,    
                    "message" => 'E-mail enviado com sucesso!',
                ];
            }
            return [
                "bool" => false,
                "output" => $this->data,
                "message" => 'Erro ao enviar e-mail de validação.',
            ];
        }
        return [
            "bool" => false,
            "output" => $this->data,
            "message" => 'Erro ao enviar atualizar e-mail de validação.',
        ];     
    }

    /**
     * Reenvio o códio de confirmação randomico para o email passado
     * atualizando no banco de dados a chave de validação "account_activation_key"
     * Ideal para validação de conta de usuário
     */
    public function recoverPassword($paramSubject, $paramName, $paramEmail)
    {
        $Up = _up_data_table(TB_ACCOUNTS, [
            'where' => [ 'account_email' => $paramEmail ],
            'values' => [ 
                'account_name' => $paramName,
                'account_activation_key' => (string) $this->activationKey
            ]
        ]);
        if($Up){
            $email = new Email();
            $email->add(
                $paramSubject,
                '<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="10%" align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:2px; color:#ffffff;"></td>
                        <td width="80%" align="center" valign="top">
                            <h3 style="font-size: 28px">Vamos recuperar sua Senha?</h3>
                            <h4 style="font-size: 22px"><b>'.$this->activationKeyUser.'</b></h4>
                            <p style="font-size: 18px">Clique no link abaixo. Você será redirecinado para criar sua nova senha na Busque Já.</p>
                            <p>Você tem até '.TIME_VALIDATE_ACCOUNT.' minutos para usar esse link</p>
                            <p>Caso ocorra algum problema ou o tempo expire, solicite uma nova recuperação de senha.</p>
                        </td>
                        <td width="10%" align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:2px; color:#ffffff;"></td>
                    </tr>
                </table>',
                $paramName,
                $paramEmail
            );
            if ($email->send($paramSubject)) {
                return [
                    "bool" => true,
                    "output" => $this->data,    
                    "message" => 'E-mail enviado com sucesso!',
                ];
            }
            return [
                "bool" => false,
                "output" => $this->data,
                "message" => 'Erro ao enviar e-mail de recuperação de senha.',
            ];
        }
        return [
            "bool" => false,
            "output" => $this->data,
            "message" => 'Erro ao atualizar e-mail de recuperação.',
        ];     
    }

    /**
     * Realiza a checagem do código de validaçao
     * e estando tudo certo atualiza o campo account_auth para 1
     * significa que ativou o código de validação, porém permanece inavito ainda
     * @param $time [Tempo para validação em minitos]
     */
    public function activationKey($time=5)
    {
        $Check = new Check($this->data['account_email']);
        $Check = $Check->check();
        if($Check['BOOL'] == true){          
            $Get = _get_data_full(
                "SELECT `account_activation_key`,`account_modify` FROM `".TB_ACCOUNTS."` 
                WHERE `account_email` =:a LIMIT 1", "a={$this->data['account_email']}"
            );
            $Get = (isset($Get[0]))? $Get[0] : null;
            if($Get != null){
                if( (int) $this->data['account_activation_key'] === (int) $Get['account_activation_key'] ){
                    $Up = _up_data_table(TB_ACCOUNTS, [
                        'where' => [ 'account_email' => $this->data['account_email'] ],
                        'values' => [ 'account_auth' => 1 ]
                    ]);
                    if($Up == true){
                        return [
                            "OUTPUT" => $this->data,
                            "BOOL" => true,
                            "MESSAGE" => (string) 'Conta validada com sucesso!',
                        ];
                    }
                    return [
                        "OUTPUT" => $this->data,
                        "BOOL" => false,
                        "MESSAGE" => (string) 'Erro ao validar conta, Tente novamente.',
                    ];
                }
                return [
                    "OUTPUT" => $this->data,
                    "BOOL" => false,
                    "MESSAGE" => (string) 'Código inválido.',
                ];
            }
            return [
                "OUTPUT" => $this->data,
                "BOOL" => false,
                "MESSAGE" => (string) 'Digite o código antes de validar.',
            ];
        }
        return [
            "OUTPUT" => $this->data,
            "BOOL" => false,
            "MESSAGE" => (string) $Check['MESSAGE'],
        ];
    }

}