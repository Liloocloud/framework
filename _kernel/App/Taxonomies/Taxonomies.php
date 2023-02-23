<?php
/**
 * Abstração da lógica de toxonimia de categorias da plataforma
 * Recomendamos que dê uma olhada na documentação
 * @copyright Felip Oliveira - 19.02.2021
 * @version 1.0.0
 */

namespace Taxonomies;
use Database\Read;

class Taxonomies
{
	
	// Guarda o primeiro nível de categorias
	private $primary; 		
	
	// private $others;		// Guarda as sequencias por nível hierarquico sendo 'inner_id'
	// private $inner;
	
	// Permitir visualizar por Status
	private $status = __GLOBAL__['taxonomy_config_status'];
	
	// Permitir visualizar ativados ou desativados
	private $active = __GLOBAL__['taxonomy_config_active'];
	
	// Faz a leitura de divisor do caracter 
	private $separator = '|';

	function __construct()
	{
		$sql = _get_data_full(
			"SELECT `taxonomy_id`,`taxonomy_inner_id`,`taxonomy_name` FROM `".TB_TAXONOMY."`
			WHERE `taxonomy_inner_id` IS NULL
			AND `taxonomy_active` =:a
			AND `taxonomy_status` =:b
			", "a={$this->active}&b={$this->status}"
		);
		$sql = (isset($sql))? $sql : false;
		if($sql){
			$this->primary = $sql;
		}else{
			$this->primary = false;
		}

	}

	/**
	 * Retorna todas as categorias + IDs do primeiro nível,
	 * sendo a coluna 'taxonomy_inner_id' = null
	 * @return [type] [description]
	 */
	public function primary()
	{
		if($this->primary){
			return [$this->primary, true];
		}
		return ['Nenhuma categoria definida', false];
	}
	
	/**
	 * Retorna todos os IDs do primeiro nível
	 * @return [array] [Todos os ids]
	 */
	public function primaryIds()
	{
		$IDs = [];
		foreach ($this->primary as $Val) {
			array_push($IDs, (int) $Val['taxonomy_id']);
		}
		if(!empty($IDs)){
			return [$IDs, true];
		}
		return ['Nenhum ID encontrado', false];

	}

	/**
	 * Retorna todas as categorias pelo parametro passado
	 * @param [type] $innerID [Passar o ID desejado]
	 */
	public function innerId(string $innerID=null)
	{
		if(isset($innerID)){
			$sql = _get_data_full(
				"SELECT `taxonomy_id`,`taxonomy_inner_id`,`taxonomy_name` FROM `".TB_TAXONOMY."`
				WHERE `taxonomy_inner_id` =:a
				AND `taxonomy_active` =:b
				AND `taxonomy_status` =:c
				", "a={$innerID}&b={$this->active}&c={$this->status}"
			);
			$sql = (isset($sql))? $sql : false;
			if($sql){
				return [$sql, true];
			}
			return ['Nenhuma categoria foi encontrada', false];
		}
		return ['O parametro ID é obrigatório', false];
	}


	/**
	 * Retorna todas as categorias aninhadas em sequencia de
	 * até 3 níveis sendo o ultimo nível de valor null
	 * @return [type] [description]
	 */
	public function sequenceLevel3()
	{
		$Taxonomies = [];
		$__S__ = $this->separator;
		foreach ($this->primary as $_1) {
			// 1º NIVEL
			if ($_1['taxonomy_inner_id'] == null) {		
				// 2º NIVEL
				if($this->innerID($__S__.$_1['taxonomy_id'].$__S__)[1]){
					$Pri = $__S__.$_1['taxonomy_id'].$__S__.'#'. $_1['taxonomy_name'];
					$Taxonomies[$Pri] = [];
					foreach ($this->innerID($__S__.$_1['taxonomy_id'].$__S__)[0] as $_2) { 
						$Sec = $__S__.$_1['taxonomy_id'].$__S__.$_2['taxonomy_id'].$__S__.'#'.$_2['taxonomy_name'];
						$Taxonomies[$Pri][$Sec] = null;
						// 3º NIVEL
						if($this->innerID($__S__.$_1['taxonomy_id'].$__S__.$_2['taxonomy_id'].$__S__)[1]){
							foreach ($this->innerID($__S__.$_1['taxonomy_id'].$__S__.$_2['taxonomy_id'].$__S__)[0] as $_3) {			
								$Ter = $__S__.$_1['taxonomy_id'].$__S__.$_2['taxonomy_id'].$__S__.$_3['taxonomy_id'].$__S__.'#'.$_3['taxonomy_name'];
								$Taxonomies[$Pri][$Sec][$Ter] = null;
							}
						}
					}
				}
			}
		}
		return $Taxonomies;
	}

	/**	
	 * Retorna a listagem com as TPL pre definidas
	 * Esta etapa contem função javascript com diretrizes
	 * para o CRUD (ajax). Obs.: As tpl deste método são
	 * fixas, ou seja, não é recomendado mudar seu local
	 * de armazenamento
	 */
	public function renderLevel3()
	{
		$view = '';
		$__S__ = $this->separator;
		foreach ($this->sequenceLevel3() as $key_1 => $val_1) {	
			// 1º NIVEL
			$Inner_1 = explode('#', $key_1);
			$Pri['inner_id'] = $Inner_1[0];
			$Pri['title'] = $Inner_1[1];
			if ((int) substr_count($Inner_1[0], $__S__) == 2) {
				$view .= _tpl_fill(PATH_MODULE . 'taxonomies/_routes/manager/sequece-level-001.tpl', [], $Pri, false);
				// 2º NIVEL
				if ($val_1 != null) {
					foreach ($val_1 as $key_2 => $val_2) {

						$Inner_2 = explode('#', $key_2);
						$Sec['inner_id'] = $Inner_2[0];
						$Sec['title'] = $Inner_2[1];
						if ((int) substr_count($Inner_2[0], $__S__) == 3) {
							$view .= _tpl_fill(PATH_MODULE . 'taxonomies/_routes/manager/sequece-level-002.tpl', [], $Sec, false);

							// 3º NIVEL
							if ($val_2 != null) {
								foreach ($val_2 as $key_3 => $val_3) {

									$Inner_3 = explode('#', $key_3);
									$Ter['inner_id'] = $Inner_3[0];
									$Ter['title'] = $Inner_3[1];
									if ((int) substr_count($Inner_3[0], $__S__) == 4) {
										$view .= _tpl_fill(PATH_MODULE . 'taxonomies/_routes/manager/sequece-level-003.tpl', [], $Ter, false);

									}
								}
							}
						}
					}
				}
			}
		}
		return $view;
	}



}