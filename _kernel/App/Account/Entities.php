<?php
/**
 * Classe de abstração das informações da tabela 'flex_smart_companies'
 * também responsável por validar informações pertinentes a company
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com - 14.05.2020
 * @version 2.0.0
 */

namespace Account;
use Account\Account;

class Entities /*extends Account*/{
	
	private $account_id;	// ID da account, pois ele é a chave estrangeira de companies
	private $output; 		// Guarda os dados da solicitação feita pela construct
	private $check; 		// Guarda true ou false da verificação do usuário existente na entities no banco
	private $inputs; 		// Guarda os dados array que para o uso da função _set_data_table()

	function __construct($id)
	{
		$this->account_id = (int) $id;
		$this->output();
		$this->check();
	}

	/** 
     * Verifica se os campos obrigatório da campany estão preenchidos
     * Se não tiver não permite visualizar outra página antes de completar 
     * o cadastro obrigatório
     * @param [array] $fields 		[Campos da Tabela de preenchimento obrigatório]
	 */
	public function complete($fields=null):array
	{
		if($this->check){
			$selects = '`'.implode('`,`', $fields).'`';
			// Checar se os campos correspondem com os do banco
			$DB = _get_data_full("
				SELECT {$selects} FROM `".TB_ACCOUNT_ENTITIES."`
				WHERE `entity_account_id` =:a", "a={$this->account_id}");
			$DB = (isset($DB))? true : false;
			if($DB){
				// Remonta os arrays do banco com os do parametro
				$Check = [];
				foreach ($fields as $field){
					if( array_key_exists($field, $this->output) ){
						array_push($Check, $this->output[$field]);
					}
				}
				// Checa se existe algum indice do array vazio
				$var=true;
				$i=0;
				while ($var == true AND $i < count($Check)){
					$var = (isset($Check[$i]))? true : false ;
					$i++;
				}
				if($var){
					return [ $this->output, true ];
				}else{
					return ['Existe algum campo obrigatório vazio', false];
				}
			}else{
				return ['Nome da coluna está incorreto', false];
			}
		}else{
			return ['Nenhum dado na entities desta conta', false];
		}
	}

	/**
	 * Atualiza a os dados na tabela de acordo com os valores passado pelo parametro
	 */
	public function update($Values=null):array
	{
		if($Values != null){
			if(in_array('entity_account_id', $Values)){
				unset($Values['entity_account_id']);
			}
			if(empty($Values['entity_entity'])){
				return ['Não foi informado pessoa física/jurídica', false, $Values];
			}
			$Up = _up_data_table(TB_ACCOUNT_ENTITIES, [
				'where' => [ 'entity_account_id' => $this->account_id ],
				'values' => $Values
			]);
			if($Up){
				return ['Conta atualizada com sucesso!', true];
			}else{
				return ['Não foi possível atualizar conta', false];
			}
		}else{
			return ['Parametro passado em update(); está vazio', false];
		}
	}

	/**
	 * Cria uma linha em Entities associada a tabela accounts
	 * Se a linha for criada com sucesso o return será o ID inserido
	 * @param  [array] $Inputs [Dados a serem inseridos]
	 */
	public function create($Inputs=null):array
	{
		if(!isset($Inputs)){
			// return ["Error: Nenhum parâmetro informado no método 'create()'", false];
			$Inputs = ['entity_account_id'=>$this->account_id];
		}
		if(is_array($Inputs)){			
			$this->inputs = $Inputs;
			if(!$this->check){
					// se existir 'entity_account_id' excluir (Criar essa parte)
				$Inputs = array_merge($Inputs, ['entity_account_id'=>$this->account_id]);
				if($Res = _set_data_table(TB_ACCOUNT_ENTITIES, $Inputs)){
					return ['Success: Entidade cadastrada com sucesso!', true, $Res];
				}else{
					return ['Error: Não foi possível cadastrar entidade', false];
				}
			}else{
				return ['Info: Esta entidade já está cadastrada', false];
			}
		}else{
			return ["Error: O parâmetro informado deve ser um 'ARRAY' em 'create()'", false];
		}
	}

	/** 
	 * Verificar se a conta existe na tabela entities
	 * Antes de verificar se existe na Accounts
	 */
	private function check():bool
	{
		$CheckAccount = new Account($this->account_id);
		if($CheckAccount->checkAccountID()){	
			if($Res = _get_data_table(TB_ACCOUNT_ENTITIES, [ 'entity_account_id' => $this->account_id ])){			
				return $this->check = true;
			}else{
				return $this->check = false;
			}
		}else{
			return $this->check = false;
		}
	}

	/** 
	 * Retorna todos os dados de Account e Entities pelo ID indicado
	 * se o ID não conter dados retorna false
	 */
	private function output()
	{
		$Data = _get_data_full("
			SELECT * FROM `".TB_ACCOUNTS."` INNER JOIN `".TB_ACCOUNT_ENTITIES."`
			ON ".TB_ACCOUNTS.".account_id = ".TB_ACCOUNT_ENTITIES.".entity_account_id 
			WHERE `account_id` =:a","a={$this->account_id}");
		if(isset($Data[0])){
			return $this->output = $Data[0];
		}
		return $this->output = false;
	}
}