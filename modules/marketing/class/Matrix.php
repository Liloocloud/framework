<?php
/**
 * Classe que retorna o total de interações feitas no site coletando os dados da tabela liloo_analytics
 * @copyright Felipe Oliveira 14.01.2022
 * @version 1.0.0
 */
namespace Module\Marketing;

class Matrix
{

    private $where;
    private $table = TB_MATRIX;
    private $table_leads = TB_MATRIX_LEADS;
    private $check;
    private $sql;

    /**
     * @param String Tabela do banco de dados
     * @param Array Condição WHERE
     */
    public function __construct($where = null)
    {
        $this->where = ($where) ? $where : null;
    }

    /**
     * Adiciona novo lead a Tabela padrão "TB_MATRIX"
     * @param Array key=values com os campos que deseja criar
     * @return Dip
     */
    public function addLead(array $fields)
    {
        $Insert = $fields;
        foreach ($fields as $key => $value) {
            if (mb_strpos($key, 'subject') or mb_strpos($key, 'message')) {
                unset($fields[$key]);
            }
        }
        $this->where = $fields;
        $Insert = array_filter($Insert, 'strlen');
        $Insert['lead_code'] = $this->lastLead();
        $Check = $this->checkLead();

        // Lead ainda não existe
        if (!$Check) {
            $Lead = _set_data_table($this->table_leads, $Insert);
            return [
                'bool' => (isset($Lead)) ? true : false,
                'message' => (isset($Lead)) ? 'Lead cadastrado com sucesso!' : 'Não foi possível cadastrar lead',
                'output' => (isset($Lead)) ? array_merge( ['lead_id'=> $Lead], $fields) : null,
            ];
            // Lead já existe
        } else {
            $Up = _up_data_table($this->table_leads, [
                'where' => $this->where,
                'values' => $Insert,
            ]);
            return [
                'bool' => (isset($Up)) ? true : false,
                'message' => (isset($Up)) ? 'Informações do lead atualizadas' : 'Não foi possível atualizar informaçoes',
                'output' => (isset($Up)) ? array_merge($Check, $fields) : null,
            ];
        }

    }

    /**
     * Adiciona um item a pipelina do CRM
     * @param Array key=values com os campos que deseja criar Correspondente aos campos da tabela
     */
    public function addPipe($fields = null)
    {
        $Insert = [
            'matrix_code' => $this->lastMatrix(),
            'matrix_pipeline' => 1,
            'matrix_pipeline_active' => 1,
        ];
        $fields = array_filter($fields, 'strlen');
        $Insert = array_merge($fields, $Insert);
        $this->where = $fields;
        if(!$this->checkMatrix()){
            $Set = _set_data_table($this->table, $Insert );
        }else{
            $Set = false;
        }
        return [
            'bool' => (isset($Set))? true : false,
            'message' => (isset($Set))? 'Matrix cadastrada com sucesso!' : 'Não foi possível cadastrar matrix',
            'output' => (isset($Set))? $Set : null,
        ];        
    }

    /**
     * Retorno o Codigo da ultima matriz  registrada + 1
     */
    private function lastMatrix()
    {
        $Code = _get_data_full("SELECT MAX(`matrix_code`) as LastMatrix FROM `" . $this->table . "` LIMIT 1");
        return (isset($Code[0])) ? ((int) $Code[0]['LastMatrix'] + 1) : 1;
    }

    /**
     * Retorno o Codigo do ultimo Lead registrado + 1
     */
    private function lastLead()
    {
        $Code = _get_data_full("SELECT MAX(`lead_code`) as LastLead FROM `" . $this->table_leads . "` LIMIT 1");
        return (isset($Code[0])) ? ((int) $Code[0]['LastLead'] + 1) : 1;
    }

    /**
     * Verifica o existe a linha na tabela matrix
     */
    private function checkMatrix()
    {
        $Chk = _get_data_table($this->table, $this->where);
        return (isset($Chk[0])) ? $Chk[0] : false;
    }

    /**
     * Verifica o existe a linha na tabela passad
     */
    private function checkLead()
    {
        $Chk = _get_data_table($this->table_leads, $this->where);
        return (isset($Chk[0])) ? $Chk[0] : false;
    }

}
