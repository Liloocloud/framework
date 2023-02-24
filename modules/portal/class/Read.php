<?php
/**
 * Class responsável por todo o fluxo de operações do módulo Portal de Anuncios
 * Create: [13.06.2022] version 1.0.0
 * Update: [20.01.2023]
 * @copyright Felipe Oliveira
 * @version 1.2.0
 */

namespace Module\Portal;

use Helpers\Pagination;
use Taxonomies\Taxonomies as Taxo;

class Read
{
    private $data; // Entrada de dados da classe podendo ser int, array e etc.
    private $ads; // Guarda o resultado dos anuncio para retornar apenas entre a class
    private $type; // Retorna o Tipo de anuncio. Se top, destaque, sidebar e etc. Seguindo a regra de negócio
    private $status = 1; // Seguindo a regra de negócio sendo obrigatório apresentar anuncios ativos
    private $moderate = 1; // Seguindo a regra de negócio sendo obrigatório apresentar anuncios moderados pelo admin
    private $accept = 1; // Seguindo a regra de negócio sendo obrigatório apresentar com termos aceitos
    private $addressView = 1; // Permite que os usuários do site vejam o endereço

    private $check; // Verifica antes de realizar as buscas

    private $select = "*"; // Por padrão "*"
    private $where = ""; // Por padrão where é vazio ""
    private $limit = 10; // Limite de resultados por página (Recurso da class Pagination)
    private $offset = 0; // Paginação inicial
    private $orderBy = 'DESC'; // Ordenação dos valores por padrão DESC
    private $results = null; // Guarda o resultado obtido para retornar para front-end
    private $nav = ''; // Paginação HTML
    private $total = null; // Guarda o total de resultados da pesquisa
    private $sql; // Guarda a sintaxe SQL montada

    /**
     * Monta a estrutura SQL para executar a pesquisa
     * @param string Sintaxe SELECT
     * @param string Sintaxe WHERE
     * @param int Limite de resultados por paginação
     * @param int Página onde deseja inicia a paginação
     * @param string Order dos Resultados DESC, ASC ou RAND
     */
    public function __construct($select = null, $where = null, $limit = null, $offset = null, $orderBy = null)
    {
        $this->select = ($select != null) ? $select : $this->select;
        $this->where = ($where != null) ? $where : $this->where;
        $this->limit = ($limit != null) ? $limit : $this->limit;
        $this->offset = ($offset != null) ? $offset : $this->offset;
        $this->orderBy = ($orderBy != null) ? $orderBy : $this->orderBy;
        $this->sql = "SELECT {$this->select} FROM `" . TB_PORTAL_ADS . "` WHERE {$this->where} ORDER BY `ads_id` {$this->orderBy} LIMIT {$this->limit} OFFSET {$this->offset}";
        $this->results = null;
        $this->total = null;
    }

    /**
     * Retorna todos os anuncios com base nas colunas que são fullText.
     * Excelente para listagem de anucios
     */
    public function fullText($term)
    {
        if(!empty($term)){
            $term = trim($term);
            $sql = "SELECT * FROM `portal_ads`
            WHERE CONCAT_WS(
                ' ',
                `ads_address`,
                `ads_title`,
                `ads_description`,
                `ads_hashtags`
            ) LIKE '%{$term}%'";
            $Sql = _get_data_full($sql);
            
            if($Sql){
                return [
                    'bool' => true,
                    'message' => "Resultados encontrados com o termo {$term}",
                    'reason' => 'fulltext_term_search',
                    'type' => 'success',
                    'output' => $Sql,
                ];
            }
            return [
                'bool' => false,
                'message' => 'Mensagem',
                'reason' => 'no_fulltext_term_search',
                'type' => 'error',
                'output' => null,
            ];

        }
        return [
            'bool' => false,
            'message' => 'Nenhum termo passado',
            'reason' => 'no_terms',
            'type' => 'error',
            'output' => null,
        ];
    }

    /**
     * Retorna todos os anúncios pelo id da conta de usuário
     */
    public function getID(int $id = null)
    {
        $Ads = _get_data_table(TB_PORTAL_ADS, ['ads_account_id' => $id]);
        if($Ads){
            return [
                'bool' => true,
                'message' => 'Todos os anúncios do usuário "{$id}"',
                'reason' => 'all_ads_account',
                'type' => 'success',
                'output' => $Ads,
            ];
        }
        return [
            'bool' => false,
            'message' => 'Nehum anúncio encontrado',
            'reason' => 'no_ads_account',
            'type' => 'error',
            'output' => null,
        ];
    }

    /**
     * Conta o total de anuncio status = 1 (Ativo)
     */
    public function countStatusAds()
    {
        $Count = _get_data_full("SELECT COUNT(`ads_id`) as Total FROM `".TB_PORTAL_ADS."` WHERE `ads_status` =:a ","a=1");
        if(isset($Count[0]['Total'])){
            return [    
                'bool' => true,
                'message' => 'Total de anúncios ativos',
                'reason' => 'total_active_ads',
                'type' => 'success',
                'output' => (int) $Count[0]['Total']
            ];
        }else{
            return [
                'bool' => false,
                'message' => 'Nenhum anúncio ativo',
                'reason' => 'no_active_ads',
                'type' => 'error',
                'output' => null
            ];
        }
    }

    /**
     * Retorna todos os anúncio já com paginação inclusa
     */
    public function getAllPagination()
    {
        $this->total = null;
        $this->nav = '';
        $this->results = null;
        if ($this->where != '') {
            $this->where .= " AND `ads_moderate` = {$this->moderate}";
            $this->where .= " AND `ads_status` = {$this->status}";
            $this->where .= " AND `ads_accept_terms` = {$this->accept}";
        }
        $Ads = new Pagination(TB_PORTAL_ADS, "*", null, $this->limit, null);
        $Res = $Ads->Results();
        if ($Res['bool']) {
            $this->total = $Ads->Total();
            $this->nav = $Ads->Nav();
            $this->results = $Res['output'];
            return [
                'bool' => true,
                'output' => $this->results,
                'message' => 'Anúncios encontrados',
                'reason' => 'read_ads',
                'type' => 'success'
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Nenhum anúncio encontrado',
            'reason' => 'read_ads_failed',
            'type' => 'error'
        ];
    }

    /**
     * Retorna uma lista com paginação de anuncio com base 
     * na sintaxe SQL passada pelos parametros da instancia da class.
     * O Objetivo e ser Generico para qualquer filtro de busca
     */
    public function getSQL()
    {
        $this->total = null;
        $this->nav = '';
        $this->results = null;
        if ($this->where != '') {
            $this->where .= " AND `ads_moderate` = {$this->moderate}";
            $this->where .= " AND `ads_status` = {$this->status}";
            $this->where .= " AND `ads_accept_terms` = {$this->accept}";
        }
        $Ads = new Pagination(TB_PORTAL_ADS, $this->select, $this->where, $this->limit, $this->offset);
        $Res = $Ads->Results();
        if ($Res['bool']) {
            $this->total = $Ads->Total();
            $this->nav = $Ads->Nav();
            $this->results = $Res['output'];
            return [
                'bool' => true,
                'message' => 'Anúncios encontrados',
                'reason' => 'read_ads_sql',
                'type' => 'success',
                'output' => $this->results,
            ];
        }
        return [
            'bool' => false,
            'message' => 'Nenhum anúncio encontrado',
            'reason' => 'read_ads_sql',
            'type' => 'success',
            'output' => null,
        ];
    }

    /**
     * Retorna o html com os links da paginação dos resultados, 
     * só irá funcionar com metodos que retornam dados paginados
     */
    public function Navigation()
    {
        return [
            'bool' => true,
            'message' => 'Html da paginação',
            'reason' => 'script_pagination_html',
            'type' => 'success',
            'output' => $this->nav,
        ];
    }


}