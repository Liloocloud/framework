<?php
/**
 * Classe de gerenciamento de localidades
 * @copyright Felipe Oliveira 08.02.2023
 * @version 1.0.0
 */
namespace Module\Locations;

use Generic\Create;

class Locate
{

    private $where;
    private $table_countries = TB_LOCATIONS_COUNTRIES;
    private $table_states = TB_LOCATIONS_STATES;
    private $table_cities = TB_LOCATIONS_CITIES;
    private $table_districts = TB_LOCATIONS_DISTRICTS;
    // private $check;

    /**
     * @param Array Condição WHERE e ao mesmo tempo os campos a serem criados
     */
    public function __construct($where = null)
    {
        $this->where = ($where) ? $where : null;
    }

    /**
     * Cria um novo país no banco de dados
     * @return Dip
     */
    public function createCountry()
    {
        $Country = new Create($this->table_countries, $this->where);
        $Country = $Country->insertItem();
        return [
            'bool' => ($Country['bool'])? true : false,
            'message' => ($Country['bool'])? 'País adicionado com sucesso' : 'Erro ou cadastrar ou país já existe',
            'output' => ($Country['bool'])? $Country['output'] : null,
        ];
    }

    /**
     * Cria um novo país no banco de dados
     * @return Dip
     */
    public function createState()
    {
        $State = new Create($this->table_states, $this->where);
        $State = $State->insertItem();
        return [
            'bool' => ($State['bool'])? true : false,
            'message' => ($State['bool'])? 'Estados adicionados com sucesso' : 'Estados já existem',
            'output' => ($State['bool'])? $State['output'] : null,
        ];
    }

    /**
     * Cria uma nova cidade no banco de dados
     * @return Dip
     */
    public function createCity()
    {
        $City = new Create($this->table_cities, $this->where);
        $City = $City->insertItem();
        return [
            'bool' => ($City['bool'])? true : false,
            'message' => ($City['bool'])? 'Cidades adicionadas com sucesso' : 'Cidades já existem',
            'output' => ($City['bool'])? $City['output'] : null,
        ];
    }

    /**
     * Cria um novo bairo/distrito no banco de dados
     * @return Dip
     */
    public function createDistrict()
    {
        $District = new Create($this->table_districts, $this->where);
        $District = $District->insertItem();
        return [
            'bool' => ($District['bool'])? true : false,
            'message' => ($District['bool'])? 'Bairros adicionados com sucesso' : 'Bairros já existem',
            'output' => ($District['bool'])? $District['output'] : null,
        ];
    }

    /**
     * Retorna uma lista de cidades com base no parametro
     * @param Array $where Condição WHERE
     * @return Dip
     */
    public function getCities($where)
    {
        var_dump($where);
    }

}
