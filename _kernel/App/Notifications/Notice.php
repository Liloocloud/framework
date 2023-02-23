<?php
/**
 * Classe reponsável por manipular a tabela de notificações
 * @copyright Felipe Oliveira Lourenço - 04.07.2022
 * @version 0.0.1
 */

namespace Notifications;

class Notice{

    private $account; // Conta que pertence a notificação
    private $importance; // Nível de importancia da notificação (Crie numerações. Ex.: Urgente = 1, Médio = 2 e etc.)

    public function __construct($User=null)
    {
        $this->account = ($User==null)? $_SESSION['account_id'] : $User;
    }

    /**
     * Retorna todos as notificações pelo usuário passado na instancia
     */
    public function getNoticesUser()
    {
        $Get = _get_data_table(TB_NOTIFICATIONS, ['notify_account_id' => $this->account]);
        if(isset($Get[0])){
            return [
                'bool' => true,
                'output' => $Get,
                'message' => 'Você tem notificações'
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Nenhuma notificação no momento'
        ];

    }

    /**
     * Retorna todas as notificações onde o campo 'account_id' for igual a NULL
     * ideial para mandar notificações a todos os usuários
     */
    public function getNoticesGlobal()
    {
        $Get = _get_data_full("SELECT * FROM `".TB_NOTIFICATIONS."` WHERE `notify_account_id` IS NULL");
        if(isset($Get[0])){
            return [
                'bool' => true,
                'output' => $Get,
                'message' => 'Você tem notificações do Sistema'
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Nenhuma notificação do sistema no momento'
        ];
    }

    /**
     * Cria uma nova notificação para o usuário
     */
    public function createNotice(array $Data)
    {

    }

    /**
     * Exclui um anotificação com base no valor passado pelo parametro
     */
    public function delNotice()
    {

    }

}
