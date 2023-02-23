<?php
/**
 * Retorna um conjunto de verificações da Tabale Accounts
 * Essa Class requer o uso da Class Mãe Accounts\Read para 
 * coletar informações do banco de dados
 * @copyright Felipe Oliveira Lourenço - 23.06.2021
 * @version 1.2.0 - 08.06.2022
 */

namespace Accounts;

use Accounts\Read;

class Check
{
    private $read; // Dados coletados da Class Read

    public function __construct($Data)
    {
        $this->read = new Read($Data);
    }

    /**
     * Verificar se uma conta existe pelo e-mail passado pelo parametro.
     * O Metodo acessa a class Read para obter os dados do banco
     * @param array,string,int Email ou ID Obrigatório, Se array campos personalizados
     */
    public function Email()
    {
        if ($this->read->check != null) {
            return [
                'bool' => true,
                'output' => $this->read->all,
                'message' => 'Existem dados com este e-mail',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Não Existem dados com este e-mail',
        ];
    }

    /**
     * Compara a data atual do sistema com a data de registro do banco.
     * Fará o cálculo se os minutos passados pelo parametro condizem com
     * o tempo de expiração
     * @param int Tempo em minutos a ser comparado
     * @param string (Opcional) Outra data que pretende comparar
     */
    public function diffDate($min = 60, $date = false)
    {
        $init = $this->read->modify;
        $date = ($date) ? $date : date("Y-m-d H:i:s");
        $time = (strtotime($date) - strtotime($init)) / 60;
        if ($time <= $min) {
            return [
                'bool' => true,
                'output' => $time,
                'message' => 'Tempo não excedido',
            ];
        }
        return [
            'bool' => false,
            'output' => $time,
            'message' => 'Tempo excedido',
        ];
    }

    /**
     * Retorno se o passardo está correto ou não
     * @param string Senha a ser comparada
     */
    public function Password($paramPass)
    {
        if (@crypt($paramPass, $this->read->password) === $this->read->password) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'Senha correta',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Senha incorreta',
        ];
    }

    /**
     * Verifica se o campo passaword foi setado ou não
     */
    public function passwordExists()
    {
        if ($this->read->password != null) {
            return [
                "bool" => true,
                "output" => ['account_email' => $this->read->email, 'account_id' => (int) $this->read->id],
                "message" => 'A senha já foi criada',
            ];
        }
        return [
            "bool" => false,
            "output" => ['account_email' => $this->read->email, 'account_id' => (int) $this->read->id],
            "message" => 'A senha ainda não foi criada',
        ];
    }

    /**
     * Valida a Chave de autenticação
     */
    public function validateAuthKey($key)
    {
        $key = hash('sha256', $key );
        $Check = _get_data_full("SELECT `account_activation_key` FROM `".TB_ACCOUNTS."` WHERE `account_activation_key`=:a LIMIT 1","a={$key}");
        $Check = (isset($Check[0]['account_activation_key']))? true : false;
        if($Check){
            return [
                'bool' => true,
                'output' => null,
                'message' => 'Chave de ativação correta',
            ];   
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Chave de ativação inválida',
        ];
    }

    /**
     * Retorno se o Chave de ativação existe e se é 1 ou 0
     */
    public function AuthKey()
    {
        if ($this->read->activationKey != null) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'O usuário já recebeu a chave de ativação',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'O usuário ainda não recebeu a chave de ativação',
        ];
    }

    /**
     * Checa se o usuário validou sua conta
     * pelo código de validação enviado no momento do
     * cadastro
     */
    public function Auth()
    {
        if ($this->read->auth == 1) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'Conta validada',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'A conta ainda não foi validada',
        ];
    }

    /**
     * Retorna se o usuário está ativo ou não pela columa status
     * Um usuário só poderá utilizar uma conta se a mesma estiver
     * com o status igual a '1'. Se for igual a '0' isso significa
     * que alguns passos não foram concluídos
     */
    public function Status()
    {
        if ($this->read->status == 1) {
            return [
                'bool' => true,
                'output' => $this->read->status,
                'message' => 'Conta ativada',
            ];
        }
        return [
            'bool' => false,
            'output' => $this->read->status,
            'message' => 'Conta inativa',
        ];
    }

    /**
     * Retorna se o usuáro existe ou não
     */
    public function Exists()
    {
        if ($this->read->check == true) {
            return [
                "bool" => true,
                "output" => ['account_email' => $this->read->email, 'account_id' => (int) $this->read->id],
                "message" => 'Usuário encontrado',
            ];
        }
        return [
            "bool" => false,
            "output" => $this->read->data,
            "message" => 'Usuário não encontrado',
        ];
    }

        /**
     * Retorna se o usuáro existe ou não
     */
    public function notExists()
    {
        if ($this->read->check == false) {
            return [
                "bool" => true,
                "output" => $this->read->data,
                "message" => 'Usuário não foi cadastrado',
            ];  
        }
        return [
            "bool" => false,
            "output" => ['account_email' => $this->read->email, 'account_id' => (int) $this->read->id],
            "message" => 'Usuário já cadastrado',
        ];
    }

    /**
     * Retorna se o usuário aceitou os termos de uso ou não
     */
    public function acceptTerms()
    {
        if ($this->read->terms == 1) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'Você aceitou os termos e condições de uso',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Você ainda não aceitou os termos e condições de uso',
        ];
    }

    /**
     * Verifica se os campos passados no array do parametro não são Nulos
     * Com base no Email ou ID da Instancia da Classe
     * Qualquer campo que seja null o loop para e retorna a mensagem
     * @param array $Fields [Nomes dos campos a serem comparados]
     */
    public function Fields($fields)
    {
        if ($this->read->check) {
            // $selects = '`' . implode('`,`', $fields) . '`';
            $Check = true;
            $fieldOutput = [];
            foreach ($this->read->all as $key => $field) {
                if (in_array($key, $fields)) {
                    if (is_null($field) || empty($field)) {
                        $fieldOutput = $key;
                        $Check = false;
                        break;
                    }
                    $fieldOutput[$key] = $field;
                }
            }
            if ($Check) {
                return [
                    'bool' => true,
                    'output' => $fieldOutput,
                    'message' => 'Todos os campos foram validados com sucesso',
                ];
            }
            return [
                'bool' => false,
                'output' => $fieldOutput,
                'message' => "O campo \"{$fieldOutput}\" foi o primeiro nulo encontrado",
            ];
        }
        return [
            'bool' => false,
            'output' => $this->read->terms,
            'message' => 'Conta não existe',
        ];
    }

    /**
     * Retorna os dados 
     */
    public function getAll()
    {
        return $this->read->all;
    }
}