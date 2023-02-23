<?php
/**
 * Class de Abstração do tabela Accounts e aplicação
 * da regra de negócio. Esta Classe tem por objetivo 
 * retornar dados de uma única coluna com 
 * Base nos parametros enviados. Caso queira realizar 
 * busca em lotes, onde trazem muitos registros, 
 * utilize a class Accounts\Search()
 *
 * @copyright Felipe Oliveira Lourenço - 07.06.2022
 * @version 1.0.0
 */

namespace Accounts;

class Read
{
    public $email; // Email do usuário da conta (Obrigatório na instancia)

    public $id; // Id do usuário da conta a ser validada (Retornando o que inseriu ou verificou)
    public $password; // Senha do usuário
    public $name; // Nome do usuário da conta
    public $lastname; // Nome do usuário da conta
    public $coin; // Sistema de moedas Nativa TB('flex_accounts') Column (account_coin)
    public $level; // Nível de permissão de acesso

    public $check = false; // se a conta existe ou não
    public $all; // Todos os dados do retorno

    public $activationKey = false; // Código de verificação enviado por Email para validação
    public $auth = false; // Se a conta foi validada
    public $status = false; // Se a conta foi ativado
    public $terms = false; // Se o usuário aceitou os termos e condições de uso
    public $modify; // Data de modificação do registro (Ideal para validar código)
    public $registered; // Data do registro
    public $data; // Dados passados pela instancia

    /**
     * Instancia da Class
     * Se o parameto for um Array a metodo ira considerar [chave => valor]
     * Do campos de deseja retornar. Todos os metodos da classe irão
     * Responder a esse filtro passado na instancia
     * @param string Email ou ID Obrigatório, Se array campos personalizados
     */
    public function __construct($Data)
    {
        $this->data = $Data;
        $Account = $this->get();
        if ($Account) {
            $this->email = $Account['account_email'];
            $this->id = $Account['account_id'];
            $this->password = $Account['account_password'];
            $this->name = $Account['account_name'];
            $this->lastname = $Account['account_lastname'];
            $this->coin = $Account['account_coin'];
            $this->level = $Account['account_level'];
            $this->activationKey = $Account['account_activation_key'];
            $this->auth = $Account['account_auth'];
            $this->status = $Account['account_status'];
            $this->terms = $Account['account_accept_terms'];
            $this->registered = $Account['account_registered'];
            $this->modify = $Account['account_modify'];
            $this->check = true;
            $this->all = $Account;
        }
        return [
            'bool' => false,
            'output' => $Data,
            'message' => 'Conta de usuário não encontrada',
        ];
    }

    /**
     * Retorna apenas o E-mail do usuário
     */
    public function getEmail()
    {
        if ($this->check != null) {
            return [
                'bool' => true,
                'output' => $this->email,
                'message' => "O e-mail da conta é {$this->email}",
            ];
        }
        return [
            'bool' => false,
            'output' => $this->email,
            'message' => 'Não Existem dados com este e-mail (String é requerido)',
        ];
    }

    /**
     * Retorna apenas o ID do usuário
     */
    public function getID()
    {
        if ($this->check != null) {
            return [
                'bool' => true,
                'output' => (int) $this->id,
                'message' => "Seu id é (int) {$this->id}",
            ];
        }
        return [
            'bool' => false,
            'output' => $this->id,
            'message' => 'Nenhum ID encontrado',
        ];
    }

    /**
     * Retorno o Level do usuário pelo parametro da instancia
     * Se o usuário tiver o nível acima do requerido
     * o retorno será true, se não false
     * @param int Level a ser comparado
     */
    public function getLevel($level = null)
    {
        if ($level == null) {
            return [
                'bool' => false,
                'output' => (int) $this->level,
                'message' => 'O parametro level não foi adicionado',
            ];
        }
        if (isset($_SESSION['account_level'])) {
            if ($this->level >= (int) $level) {
                return [
                    'bool' => true,
                    'output' => (int) $this->level,
                    'message' => 'Permissão para acessar esse conteúdo',
                ];
            }
            return [
                'bool' => false,
                'output' => (int) $this->level,
                'message' => 'Você não tem permissão para acessar esse conteúdo',
            ];
        }
        return [
            'bool' => false,
            'output' => (int) $this->level,
            'message' => 'Uma sessão não foi iniciada',
        ];
    }

    /**
     * Retorna apenas os dados passados pelo 
     * parametro da instancia da classe
     */
    public function getFields()
    {
        # code...
    }

    /************************************************************
     * METODOS PRIVATE
     */

    /**
     * Coleta informações na tabela lillo_accounts
     * @param array Campos da tabela a serem atualizados
     */
    private function get()
    {
        switch ($this->data) {
            case (is_array($this->data)):
                $Get = _get_data_table(TB_ACCOUNTS, $this->data);
                break;
            case (is_int($this->data)):
                $Get = _get_data_table(TB_ACCOUNTS, ['account_id' => (int) $this->data]);
                break;
            case (is_string($this->data)):
                $Get = _get_data_table(TB_ACCOUNTS, ['account_email' => (string) $this->data]);
                break;
        }
        $Get = (!empty($Get)) ? $Get[0] : false;
        return $Get;
    }
}