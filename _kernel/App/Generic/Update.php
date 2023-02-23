<?php
/**
 * Classe genérica para realizar atualizações no banco de dados
 * @copyright Felipe Oliveira Lourenço - 30.01.2023
 * @version 1.0.0
 */
namespace Generic;

class Update
{
    private $where = "";
    private $table;

    public function __construct($table, $where = null)
    {
        $this->table = $table;
        $this->where = (isset($where)) ? $where : $this->where;
    }

    /**
     * Adiciona soma a um campo com valor numérico
     * @param String nome do campo que deseja adicionar +1
     * @param Int valore interiro a somar por padrão (+1)
     * @param Array Campos para a condição WHERE
     */
    public function addPlus($field, $more = 1, $where = null)
    {
        $this->where = ($where == null) ? $this->where : $where;
        $Chk = $this->check($this->where);
        if ($Chk['bool']) {
            $Add = _up_data_table($this->table, [
                'where' => $this->where,
                'values' => [
                    $field => ($Chk['output'][0][$field] + $more),
                ],
            ]);
            if ($Add) {
                return [
                    'bool' => true,
                    'message' => 'Valor alterado com sucesso',
                    'output' => $Add,
                ];
            }
        }
        return [
            'bool' => false,
            'message' => 'Registro não existe',
            'output' => null,
        ];
    }

    /**
     * Atualiza os campos pelo array passado
     * @param Array Valore key=value de cada campo a ser alterado
     * @param Array Campos para a condição WHERE
     */
    public function upFields(array $fields, $where = null)
    {
        $this->where = ($where == null) ? $this->where : $where;
        $Chk = $this->check($this->where);
        if ($Chk['bool']) {
            $Add = _up_data_table($this->table, [
                'where' => $this->where,
                'values' => $fields,
            ]);
            if ($Add) {
                return [
                    'bool' => true,
                    'message' => 'Valor alterado com sucesso',
                    'output' => $Add,
                ];
            }
        }
        return [
            'bool' => false,
            'message' => 'Registro não existe',
            'output' => null,
        ];
    }

    /**
     * Atualiza os campos para null pelo array simples passado
     * @param Array [Apenas os campos] de cada campo a ser alterado
     * @param Array Campos para a condição WHERE
     */
    public function setNull(array $fields, $where = null)
    {
        $this->where = ($where == null) ? $this->where : $where;
        $Chk = $this->check($this->where);
        if ($Chk['bool']) {
            foreach ($fields as $fill) {
                $fld[$fill] = null;
            }
            $Add = _up_data_table($this->table, [
                'where' => $this->where,
                'values' => $fld,
            ]);
            if ($Add) {
                return [
                    'bool' => true,
                    'message' => 'Valor alterado com sucesso',
                    'output' => $Add,
                ];
            }
        }
        return [
            'bool' => false,
            'message' => 'Registro não existe',
            'output' => null,
        ];
    }

    /******************************************
    /*********** PRIVATE METODES **************
    /******************************************

    /**
     * Verifica se o linha para atualizar existe. ideal para casos onde os dados são mais sensíveis
     * @param Array Sintaxe where para verificação
     */
    private function check($where)
    {
        $Chk = _get_data_table($this->table, $where);
        if ($Chk) {
            return [
                'bool' => true,
                'message' => 'O registro já existe',
                'output' => $Chk,
            ];
        }
        return [
            'bool' => false,
            'message' => 'O registro não existe',
            'output' => null,
        ];
    }

}
