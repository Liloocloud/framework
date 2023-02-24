<?php
/**
 * Class responsável por todo o fluxo de operações
 * do módulo Portal de Anuncios sendo dados unitários
 * @copyright Felipe Oliveira 05.07.2022
 * @version 1.0.0
 */

namespace Module\Portal;

class Page
{
    private $read; // Dados coletados
    private $table = TB_PORTAL_USERPAGE; // Tabela padrão das páginas
    private $table_adds = TB_PORTAL_USERPAGE_ADDS; // Tabelas de informações adicionais
    private $account; // Id da conta do usuário

    public function __construct($account_id = null)
    {
        if(isset($account_id)){
            $this->account = $account_id;
            $this->read = _get_data_table($this->table, ['page_account_id' => $account_id]);
            $this->read = (isset($this->read[0])) ? $this->read[0] : false;
        }else{
            $this->account = $_SESSION['account_id'];
            $this->read = _get_data_table($this->table, ['page_account_id' => $this->account]);
            $this->read = (isset($this->read[0])) ? $this->read[0] : false;
        }
        $this->createPage(); 
    }

    /**
     * Retorna os dados da página pela conta do usuário
     * @param Int [ID da conta de usuário] $account_id
     * @return Dip
     */
    public function getPage()
    {
        $Adds = _get_data_table($this->table_adds, ['adds_account_id' => $this->account]);
        $Adds = (Isset($Adds[0]))? $Adds[0] : [];
        return [
            'bool' => ($this->read)? true : false,
            'message' => ($this->read)? 'Página encontrada' : 'Página não existe',
            'output' => ($this->read)? array_merge($this->read, $Adds) : null
        ];
    }


    /**
     * Cria a linha no banco caso a página não existe e retorna o ID criado
     * @return void
     */
    private function createPage()
    {
        $Set = false;
        if(!$this->read){
            $Set = _set_data_table($this->table, ['page_account_id' => $this->account]);
        }
        return $Set;
    }

}