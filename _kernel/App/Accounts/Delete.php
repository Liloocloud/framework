<?php
/**
 * Exclui informações Tabale Accounts
 * Essa Class requer o uso da Class Mãe Accounts\Check para 
 * coletar informações do banco de dados
 * @copyright Felipe Oliveira Lourenço - 23.06.2021
 * @version 1.2.0 - 08.06.2022
 */

namespace Accounts;
use Accounts\Check;

class Delete
{
    private $data; // Dados passados pela instancia

    /**
     * Exclui uma linha da tabela com base no parametro passado 
     * na instancia da classe. Obs.: Uma vez excluído 
     * não será possível reverter
     */
    public function __construct($Data)
    {
        $this->data = $Data;
    }

    /**
     * Aplica a exclusão efetivamente.
     * Esse método foi criado com o intuito de
     * obter o retorno padrão em Dips 
     */
    public function Run() 
    {
        $Check = new Check($this->data);
        $Check = $Check->Exists();
        if($Check['bool'] == false){
            return $Check;
        } 
        if($this->delete()){
            return [
                'bool' => true,
                'output' => $Check['output'],
                'message' => 'Conta excluída com sucesso!',
            ];
        }else{
            return [
                'bool' => false,
                'output' => $Check['output'],
                'message' => 'Erro ao excluir a conta',
            ];
        }
    }


    /************************************************************
     * METODOS PRIVATE
     */

    /**
     * Excluir informações na tabela lillo_accounts
     * @param array Campos da tabela a serem atualizados
     */
    private function delete()
    {
        switch ($this->data) {
            case (is_array($this->data)):
                $Del = _del_data_table(TB_ACCOUNTS, $this->data);
                break;
            case (is_int($this->data)):
                $Del = _del_data_table(TB_ACCOUNTS, ['account_id' => (int) $this->data]);
                break;
            case (is_string($this->data)):
                $Del = _del_data_table(TB_ACCOUNTS, ['account_email' => (string) $this->data]);
                break;
        }
        return $Del;
    }
}