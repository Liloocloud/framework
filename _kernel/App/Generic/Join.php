<?php
/**
 * Classe genérica para realizar leituras no banco de dados
 * @copyright Felipe Oliveira Lourenço - 23.01.2023
 * @version 1.0.0
 */
namespace Generic;

use Helpers\Pagination;

class Join
{
    private $sql;
    private $where = "";
    private $table;
    private $limit = 10;
    private $navegation = "";

    public function __construct($table, $where = null)
    {
        $this->table = $table;
        $this->where = (isset($where)) ? $where : $this->where;
        $this->sql = "SELECT * FROM `" . $table . "`";
    }

    /**
     * Retorna os valores pelo array de condição "where"
     * @param Array Monta o array como condição where
     * @param Int Número de resultados por página
     */
    public function getArray(array $array, int $limit = null)
    {
        $limit = ($limit == null) ? $this->limit : $limit;
        $w = $this->mountWhere($array)['w'];
        $s = $this->mountWhere($array)['s'];
        $List = new Pagination($this->table, '*', $w, $limit, null, $s);
        if ($List->Results()['bool']) {
            $this->navegation = $List->Nav();
            return [
                'bool' => true,
                'message' => 'Resultados encontrados',
                'output' => $List->Results()['output'],
            ];
        }
        $this->navegation = '';
        return [
            'bool' => false,
            'message' => 'Nenhum resultado encontrado',
            'output' => null,
        ];
    }

    /**
     * Retorna HTML da paginação para ser utilizado na front-end
     */
    public function Pagination()
    {
        if ($this->navegation) {
            return [
                'bool' => true,
                'message' => 'Paginação HTML',
                'output' => $this->navegation,
            ];
        }
        return [
            'bool' => false,
            'message' => 'Não há paginação',
            'output' => null,
        ];
    }

    /**
     * Verifica se o linha para atualizar existe. ideal para casos onde os dados são mais sensíveis
     * @param Array Sintaxe where para verificação
     */
    public function check($where = null)
    {
        $this->where = ($where == null) ? $this->where : $where;
        $Chk = _get_data_table($this->table, $this->where);
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

    /**
     * Monta o clausula Where para uso global
     * retornando "where" e "statement"
     */
    private function mountWhere($array)
    {
        if (is_array($array)) {
            $w = "WHERE ";
            $s = "";
            $i = 1;
            foreach ($array as $key => $value) {
                $w .= "`{$key}` =:a{$i} AND ";
                $s .= "a{$i}={$value}&";
                $i++;
            }
            $w = substr($w, 0, -5);
            $s = substr($s, 0, -1);
            return ['w' => $w, 's' => $s];
        }
        return ['w' => '', 's' => ''];
    }

}
