<?php
/**
 * Classe de abstração das informações da tabela 'FLEX_SMART_SERVICES'
 * responsável por listar informações para alimentação de selects HTML 
 * verificar categorias por seleção e ações pertinentes a controle da
 * tabela de serviços do projeto vamove
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com - 19.05.2020 
 */

namespace Items;

class Categories{

	private $service_id; 			// Id do serviço no banco
	private $service_activity;  	// Guarda o ramo de atividade que o ID do serviço pertence
	private $service_category;  	// Guarda a categoria que o ID do serviço pertence
	private $service_sub_category; 	// Guarda a sub categoria que o ID do serviço pertence
	private $sync;					// Dados do formulário ou variavel array de dados

	function __construct($activity=''){
		$this->service_activity = $activity;
	}	

	/** Obtem a categoria passada pelo parametro */
	public function setCategory($category){
		return $this->service_category = $category;
	}

	/** Obtem a sub categoria passado pelo parametro */
	public function setSubCategory($subcategory){
		return $this->service_sub_category = $subcategory;
	}

	/** Retorna Todas as Atividades */
	public function allActivities(){
		$Activity = _get_data_full("SELECT DISTINCT `service_activity` FROM `".TB_SMART_SERVICES."`");
		$options = [];
		foreach ($Activity as $value):
			array_push($options, $value['service_activity']);
		endforeach;
		return $options;
	}

	/** Retorna Todas as Categorias */
	public function allCategories(){
		$Categories = _get_data_full("SELECT DISTINCT `service_category` FROM `".TB_SMART_SERVICES."`");
		$options = [];
		foreach ($Categories as $value):
			array_push($options, $value['service_category']);
		endforeach;
		return $options;
	}

	/** Retorna Todas as Categorias */
	public function allSubCategories(){
		$SubCategories = _get_data_full("SELECT DISTINCT `service_sub_category` FROM `".TB_SMART_SERVICES."`");
		$options = [];
		foreach ($SubCategories as $value):
			array_push($options, $value['service_sub_category']);
		endforeach;
		return $options;
	}

	/** Obtem uma lista de Categorias pela atividade passada pelo parametro */
	public function listCategoriesPerActivity(){
		$Categories = _get_data_full("
			SELECT DISTINCT `service_category` FROM `".TB_SMART_SERVICES."` WHERE
			`service_activity` =:a", "a={$this->service_activity}");
		return $Categories;
	}

	/** Obtem uma lista de sub categorias pela atividade passada pelo parametro   */
	public function listSubCategoriesPerActivity(){
		$SubCategories = _get_data_full("
			SELECT DISTINCT `service_sub_category` FROM `".TB_SMART_SERVICES."` WHERE
			`service_activity` =:a", "a={$this->service_activity}");
		return $SubCategories;
	}

	/** Retorna Todos os IDs das atividades passada pelo parametro */
	public function activitiesIDs(){}

	/** 
	 * Retorna Todos os IDs das categorias 
	 * no formato de string separado por vírgula
	 * @var requer a $this->service_activity 
	 * @var requer a $sync
	 * @return [type] [description]
	 */
	public function categoriesIDs($sync){
		if(!empty($sync)):
			$Sintaxe = '';
			foreach ($sync as $sin):
				$Sintaxe.= " `service_category` = '{$sin}' OR";
			endforeach;
			$Sintaxe = substr($Sintaxe, 0, -2);
			
			$IDs = _get_data_full(
				"SELECT `service_id` FROM `".TB_SMART_SERVICES."`
				WHERE `service_activity` =:a AND
				( {$Sintaxe} )","a={$this->service_activity}");
			$IDs = (isset($IDs))? $IDs : false ;
			if($IDs):
				$i = '';
				foreach ($IDs as $ser):
					$i.= $ser['service_id'].','; 
				endforeach;
				return ['IDs da Categoria retornados com sucesso!', substr($i, 0, -1)];
			else:
				return ['Não foi possível retornar IDs da categoria', false];
			endif;
		else:
			return ['dataSync() está vazio', false];
		endif;
	}

	/** 
	 * Retorna Todos os IDs das (SUB) categorias 
	 * no formato de string separado por vírgula
	 * @var requer a $this->service_activity 
	 * @var requer a $sync
	 * @return [type] [description]
	 */
	public function subCategoriesIDs($sync){
		if(!empty($sync)):
			$Sintaxe = '';
			foreach ($sync as $sin):
				$Sintaxe.= " `service_sub_category` = '{$sin}' OR";
			endforeach;
			$Sintaxe = substr($Sintaxe, 0, -2);
			
			$IDs = _get_data_full(
				"SELECT `service_id` FROM `".TB_SMART_SERVICES."`
				WHERE `service_activity` =:a AND 
				( {$Sintaxe} )","a={$this->service_activity}");
			$IDs = (isset($IDs))? $IDs : false ;
			if($IDs):
				$i = '';
				foreach ($IDs as $ser):
					$i.= $ser['service_id'].','; 
				endforeach;
				return ['IDs da Sub Categoria retornados com sucesso!', substr($i, 0, -1)];
			else:
				return ['Não foi possível retornar IDs da sub categoria', false];
			endif;
		else:
			return ['Parametro em subCategoriesIDs() está vazio', false];
		endif;
	}

}