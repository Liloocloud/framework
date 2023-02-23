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

class Search
{
    private $term; // Salva o termo contido na URL para uso geral
    private $table = TB_ACCOUNTS; // Tabela do banco a realizar a busca
    private $limit = 10; // Limite de resultados por página (LIMIT_RESULT_PAGE)
    private $offset = 0; // OFFSET, ou seja, página atual dos resultados (mostra a partir dela)
    private $page; // Página atual
    private $paginator; // Total de páginas para construir paginação
    private $total; // Total de resultados obtidos na busca
    private $totalPages; // Total de paginas que o resultado irá conter
    private $results; // Resultados obtidos
    private $data; // Dados passados pela instancia

    /**
     * Instancia da Class
     * Se o parameto for um Array a metodo ira considerar [chave => valor]
     * Do campos de deseja retornar. Todos os metodos da classe irão
     * Responder a esse filtro passado na instancia
     * @param string Email ou ID Obrigatório, Se array campos personalizados
     */
    public function __construct(array $Data, $table = null)
    {
        $this->table = ($table == null) ? $this->table : $table;
        $this->data = $Data;
        $this->term = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    /**
     * Retorna uma lista de registros com todos os campos
     * da tabela com base no termos passado pelo parametro.
     * @param string $terms Termo de pesquisa (Se o termo for passado, irá subscrever a var $this->term)
     * @param int $limit Limite de resultados
     * @param int $offset Páginação (Página atual dos dados)
     */
    public function Terms($term = null, $limit = null, $offset = null)
    {
        $this->term = ($term != null) ? $term : $this->term;
        if ($this->term == null) {
            return [
                'bool' => false,
                'output' => null,
                'message' => 'Nenhum termo de pesquisa foi realizado',
            ];
        }
        
        $this->limit = ($limit != null) ? $limit : $this->limit;
        $this->totalPages = ($this->total / $this->limit);


        $this->offset = ($offset != null) ? abs($offset) : $this->offset;
        $fields = '';
        foreach ($this->data as $item) {
            $fields .= "`{$item}` LIKE '%{$this->term}%' OR ";
        }
        $fields = substr($fields, 0, -4);
        $Search = _get_data_full("SELECT * FROM `" . TB_ACCOUNTS . "` WHERE {$fields} LIMIT {$this->limit} OFFSET {$this->offset}");    
        if (!empty($Search)) {
            $this->results = $Search;
            return [
                'bool' => true,
                'output' => $Search,
                'message' => "Total de {$this->total} Resultados encontrado com o termo \"{$this->term}\"",
            ];
        }else{
            $this->results = null;
            return [
                'bool' => false,
                'output' => $this->term,
                'message' => "Nenhum resultados encontrado com o termo \"{$this->term}\"",
            ];
        }
    }

    /**
     * Retorna os Resultados obtidos na pesquisa.
     * Esse metodo irá retorna os dados já paginados, ou seja,
     * O numero de resultados da lista corresponde ao
     * total permitido por página
     */
    public function Results()
    {
        return $this->results;
    }
}