<?php
/**
 * Retorna um conjunto de verificações da Tabale Accounts
 * Essa Class requer o uso da Class Mãe Accounts\Read para 
 * coletar informações do banco de dados
 * @copyright Felipe Oliveira Lourenço - 23.06.2021
 * @version 1.2.0 - 08.06.2022
 */

namespace Accounts;

use Accounts\Check;

class Update
{
    private $check; // Dados coletados da Class Check
    private $data; // Dados passados pela instancia

    public function __construct($Data)
    {
        $this->data = $Data;
        $this->check = new Check($Data);
    }

    /**
     * Atualiza os dados na tabela  pelo o parametro passado pela instancia
     * É obrigatório que seja do tipo array contendo a [chave => valor]
     * @param array Dados a serem trocado
     */
    public function Fields($Fields)
    {
        $Check = $this->check->Exists();
        if($Check['bool'] == false){
            return $Check;
        }
        $Up = $this->update($Fields);
        if ($Up) {
            return [
                'bool' => true,
                'output' => $Fields,
                'message' => 'Campos atualizados com sucesso!',
            ];
        }
        return [
            'bool' => false,
            'output' => $Fields,
            'message' => 'Não foi possível atualizar campos',
        ];
    }

    /************************************************************
     * METODOS PRIVATE
     */

    /**
     * Atualiza informações na tabela lillo_accounts
     * @param array Campos da tabela a serem atualizados
     */
    public function update($Fields)
    {
        switch ($this->data) {
            case (is_array($this->data)):
                $Up = _up_data_table(TB_ACCOUNTS, [
                    'where' => $this->data,
                    'values' => $Fields,
                ]);
                break;
            case (is_int($this->data)):
                $Up = _up_data_table(TB_ACCOUNTS, [
                    'where' => ['account_id' => (int) $this->data],
                    'values' => $Fields,
                ]);
                break;
            case (is_string($this->data)):
                $Up = _up_data_table(TB_ACCOUNTS, [
                    'where' => ['account_email' => (string) $this->data],
                    'values' => $Fields,
                ]);
                break;
        }
        return $Up;
    }
}