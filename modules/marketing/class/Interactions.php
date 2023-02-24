<?php
/**
 * Classe que retorna o total de interações feitas no site coletando os dados da tabela liloo_analytics
 * @copyright Felipe Oliveira 14.01.2022
 * @version 1.0.0	
 */


namespace Module\Marketing;
use App\Database\Read;

class Interactions
{
	private $table = TB_MKT_CONTACTS; // Tabela padrão para consumir os dados
	private $channel; // Qual canal deseja retornar
	private $method; // Se form, botão do whatsapp, telefone e etc
	private $date; // Data da busca (OBS: duas datas separadas por ',' indica um intervalo de busca)
	private $dateRange; 

	function __construct($method='total', $channel='all', $date=null, $dateRange=null){
		$this->method = $method;
		$this->channel = $channel;
		$this->date = $date;
		$this->dateRange = $dateRange;
	}

	/**
	 * Retornar todos os dados em Array
	 */
	public function all(){
		return $this->getResults();
	}


	/**
	 * Retorna o número de resultados
	 */
	public function count(){
		return $this->getCounts();
	}

	/**
	 * Retorna JSON 
	 */
	public function json(){
		return json_encode($this->getResults());	
	}

	/**
	 * Faz as consultas no bando de dados retorando o inteniro
	 */
	private function getCounts(){
		$Count = null;
		if($this->method == 'total' && $this->channel == 'all' && $this->date == null && $this->dateRange == null){
			$Count = _get_data_full(
				"SELECT COUNT(contact_id) AS Result FROM `".$this->table."`"
			);
		
		}elseif($this->channel == 'all' && $this->date == null && $this->dateRange == null){
			$Count = _get_data_full(
				"SELECT COUNT(contact_id) AS Result FROM `".$this->table."` 
				WHERE `contact_method` =:a",
				"a={$this->method}"
			);

		}elseif($this->date == null && $this->dateRange == null){
			$Count = _get_data_full(
				"SELECT COUNT(contact_id) AS Result FROM `".$this->table."` 
				WHERE `contact_method` =:a
				AND `contact_channel` =:b",
				"a={$this->channel}&b={$this->method}"
			);


		}elseif($this->dateRange == null){
			$Count = _get_data_full(
				"SELECT COUNT(contact_id) AS Result FROM `".$this->table."` 
				WHERE `contact_channel` =:a
				AND `contact_method` =:b 
				AND DATE(contact_registered) =:c",
				"a={$this->channel}&b={$this->method}&c={$this->date}"
			);

		}else{
			$Count = _get_data_full(
				"SELECT COUNT(contact_id) AS Result FROM `".$this->table."` 
				WHERE `contact_channel` =:a
				AND `contact_method` =:b 
				AND DATE(contact_registered) BETWEEN :c AND :d",
				"a={$this->channel}&b={$this->method}&c={$this->date}&d={$this->dateRange}"
			);

		}
		return (isset($Count))? (int) $Count[0]['Result'] : 0;
	}

	/**
	 * Realiza as consultas no banco retornando Array de Dados
	 */
	private function getResults(){
		$Count = null;
		if($this->method == 'total' && $this->channel == 'all' && $this->date == null && $this->dateRange == null){
			$Count = _get_data_full(
				"SELECT * FROM `".$this->table."`"
			);
		
		}elseif($this->method == 'total' && $this->date == null && $this->dateRange == null){
			$Count = _get_data_full(
				"SELECT * FROM `".$this->table."` 
				WHERE `contact_channel` =:a",
				"a={$this->channel}"
			);

		}elseif($this->date == null && $this->dateRange == null){
			$Count = _get_data_full(
				"SELECT * FROM `".$this->table."` 
				WHERE `contact_channel` =:a
				AND `contact_method` =:b",
				"a={$this->channel}&b={$this->method}"
			);


		}elseif($this->dateRange == null){
			$Count = _get_data_full(
				"SELECT * FROM `".$this->table."` 
				WHERE `contact_channel` =:a
				AND `contact_method` =:b 
				AND DATE(contact_registered) =:c",
				"a={$this->channel}&b={$this->method}&c={$this->date}"
			);

		}else{
			$Count = _get_data_full(
				"SELECT * FROM `".$this->table."` 
				WHERE `contact_channel` =:a
				AND `contact_method` =:b 
				AND DATE(contact_registered) BETWEEN :c AND :d",
				"a={$this->channel}&b={$this->method}&c={$this->date}&d={$this->dateRange}"
			);

		}
		return (isset($Count))? $Count : null;
	}

}
