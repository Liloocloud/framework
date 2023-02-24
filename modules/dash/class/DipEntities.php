<?php
/**
 * Dip do Módulo Account
 *
 * @copyright Felipe Oliveira Lourenço - 12.01.2021
 * @version 1.0.0
 */

// Novas Atulizações
// -- Usar Variaveis public ou private para uso na cadeia dos DIps


namespace Module\Accounts;
use Account\Account;
use Account\Entities;

trait DipEntities
{

	/**
	 * Pega todas as informações unificados pelo tabela accout e entities
	 * genericas da plataforma
	 */
	public function getJoinEntities():array
	{
		$Entities = _get_data_full("
			SELECT * FROM `".TB_ACCOUNTS."` INNER JOIN 
			`".TB_ACCOUNT_ENTITIES."` ON 
			".TB_ACCOUNTS.".account_id = ".TB_ACCOUNT_ENTITIES.".entity_account_id 
			WHERE `entity_account_id` =:a","a={$_SESSION['account_id']}");
		$Entities = (isset($Entities[0]))? $Entities[0] : [];
		return [
			"OUTPUT" => $Entities,
			"BOOL" => true,
			"MESSAGE" => 'Usuário encontrado com sucesso!',
			"CALLBACK" => $this->callback()
		];
	}

	/**
	 * Usa a class nativa "Entities" para retornar em formato DIP
	 * Responsável por verificar se os campos passados pelo parametro
	 * possuem valor no banco. Ideal para sistema onde há a necessidade
	 * de dados confirmados
	 */	
	public function checkCompleteEntities(array $Array):array
	{
		if(array_key_exists('id', $Array)){
			$EntityId = (int) $Array['id'];
		}else{
			return [
				"OUTPUT" => null,
				"BOOL" => false,
				"MESSAGE" => "O Método 'checkCompleteEntities' está aguardando a Chave de Array 'id'",
				"CALLBACK" => $this->callback()
			];
		}
		if(array_key_exists('fields', $Array)){
			$EntityFields = (array) $Array['fields'];
		}else{
			return [
				"OUTPUT" => null,
				"BOOL" => false,
				"MESSAGE" => "O Método 'checkCompleteEntities' está aguardando a Chave de Array 'fields'",
				"CALLBACK" => $this->callback()
			];
		}
		$Entities = new Entities($EntityId);
		$Data = $Entities->complete($EntityFields);
		if($Data[1]){
			return [
				"OUTPUT" => $Data[0],
				"BOOL" => true,
				"MESSAGE" => 'Todos os campos solicitados foram preenchidos',
				"CALLBACK" => $this->callback()
			];
		}else{
			return [
				"OUTPUT" => null,
				"BOOL" => false,
				"MESSAGE" => 'Existe algum campo obrigatório está vazio',
				"CALLBACK" => $this->callback()
			];
		}
	}


	/**
	 * Atualiza as informação da Entities de acordo com 
	 * o ID informado. É necessário o usuário ter uma conta em Accounts.
	 */
	public function upDataEntities(array $Array):array
	{
		if(isset($Array) && $Array != null){
			if(isset($Array['entity_account_id'])){
				$Entity = new Entities((int) $Array['entity_account_id']);
				unset(
					$Sync['entity_account_id'],
					$Sync['entity_name_cpf'],
					$Sync['entity_document_cpf'],
					$Sync['entity_name_cnpj'],
					$Sync['entity_document_cnpj']
				);
				$Entity = $Entity->update($Sync);
				var_dump($Entity);
				if($Entity[1]){

				}else{

				}		
			}else{
				return [
					"OUTPUT" => null,
					"BOOL" => false,
					"MESSAGE" => "O valor 'entity_account_id' deve ser informado",
					"CALLBACK" => $this->callback()
				];
			}
		}else{
			return [
				"OUTPUT" => null,
				"BOOL" => false,
				"MESSAGE" => 'Nenhum parametro foi passado',
				"CALLBACK" => $this->callback()
			];
		}
	}


























	/**
	 * Checa o nível do usuário
	 * @param  [type] $id [description]
	 * @copyright Vinicius Benedito
	 */
	public function checkLevelAccount($id=null)
	{

		return true;
		//var_dump($id);
		if (!isset($id)) {
			
		}









		// // verificar se a $_SESSION['account_id'] está vazia ou nula
		// if (isset($id) && !is_null($id) && !empty($_SESSION)) {
		// 	if ($id) {
		// 		# code...
		// 	}

		// 	return [
		// 		"OUTPUT" => $Entities,
		// 		"BOOL" => true,
		// 		"MESSAGE" => 'Usuário encontrado com sucesso!',
		// 		"CALLBACK" => $this->callback()
		// 	];
		// } else {
		// 	# code...
		// }
		
		// // 
	}

}

