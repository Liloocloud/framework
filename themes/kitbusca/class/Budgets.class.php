<?php
/**
 * Classe de abstração das informações da tabela 'flex_smart_budgets'
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com - 14.05.2020
 * @version Beta 2.0.0 
 */

use \Read\Read;
use \Update\Update;
use \Create\Create;
require ROOT.'frontend/vamove/class/Coins.class.php';

class Budgets extends Coins{
	
	private $account_id; 	// ID da conta do usuário
	private $budget_id;  	// ID do orçamento
	private $accepeted_id; 	// ID do orçamento aceito
	private $budget;		// Variavel que armazena o retorno do Budget
	
	function __construct($budget_id, $account_id){
		$this->budget_id = $budget_id;
		$this->account_id = $account_id;
	}

	/** 
	 * Retorna todos os dados do Budget pelo ID indicado
	 * @var [$this->budget_id] Necessário
	 * @return bool se for vazio e Data se for True
	 */
	public function Results(){
		$Data = _get_data_table(TB_SMART_BUDGETS, [ 'budget_id' => $this->budget_id ]);
		return $Data = (isset($Data[0]))? $Data[0] : false;
	}
	
	/** 
	 * Checa se Existe o ID na coluna rejeitados, se não tiver inclue
	 * @return [bool] [Mensagem de retorno]
	 */
	public function rejectedIncludeID(){
		$Rejected = self::checkStringID( $this->Results()['budget_rejected'] );
		if(isset($Rejected[2]) && $Rejected[2] === 'nenhum'){
			$up = _up_data_table(TB_SMART_BUDGETS,[
				'where' => [ 'budget_id' => $this->budget_id ],
				'values' => [ 'budget_rejected' => '#'.(string) $this->account_id.'#' ]
			]);
			if($up){
				return ['ID '.$this->budget_id.' adicinado com sucesso', true];
			}else{
				return ['Não foi possível adicinar ID '.$this->budget_id, false];
			}
		}elseif(!isset($Rejected[2]) && $Rejected[1] === false ){
			$IDs = $this->Results()['budget_rejected'].',#'.$this->account_id.'#';
			$up = _up_data_table(TB_SMART_BUDGETS,[
				'where' => [ 'budget_id' => $this->budget_id ],
				'values' => [ 'budget_rejected' => (string) $IDs ]
			]);
			if($up){
				return ['ID '.$this->budget_id.' adicinado com sucesso em rejeitados', true];
			}else{
				return ['Não foi possível adicionar ID '.$this->budget_id.' em rejeitados', false];
			}
		}else{
			return ['O ID '.$this->account_id.' já existe em rejeitados', false];
		}
	}


	/** 
	 * Excluir se o ID estiver em Rejeitados
	 * @return [type] [Mensagem padrão]
	 */
	public function rejectedRemoveID(){
		$Rejected = self::checkStringID( $this->Results()['budget_rejected'] );
		if($Rejected[1]){
			
			$IDs = explode(",", $this->Results()['budget_rejected']);
			$key = array_search('#'.$this->account_id.'#', $IDs );
			unset($IDs[$key]);	
			$IDs = implode(",", $IDs);
			$IDs = ($IDs == '')? 'nenhum' : $IDs ;
			
			$up = _up_data_table(TB_SMART_BUDGETS,[
				'where' => [ 'budget_id' => $this->budget_id ],
				'values' => [ 'budget_rejected' => (string) $IDs ]
			]);
			if($up){
				return ['ID '.$this->account_id.' removido dos rejeitados',true];
			}else{
				return ['Não foi possível atualizar DB', false];
			}
		}else{
			return ['ID '.$this->account_id.' não está em rejeitados',false];
		}
	}


	/** 
	 * Inclui o ID em favoritos se não tiver
	 * @return [type] [Mensagem padrão]
	 */
	public function favoritesIncludeID(){
		$Favorites = self::checkStringID( $this->Results()['budget_favorites'] );
		if(isset($Favorites[2]) && $Favorites[2] === 'nenhum'){
			$up = _up_data_table(TB_SMART_BUDGETS,[
				'where' => [ 'budget_id' => $this->budget_id ],
				'values' => [ 'budget_favorites' => '#'.(string) $this->account_id.'#' ]
			]);
			if($up){
				return ['ID '.$this->budget_id.' adicinado com sucesso em favoritos', true];
			}else{
				return ['Não foi possível adicinar ID '.$this->budget_id.' em favoritos', false];
			}
		}elseif(!isset($Favorites[2]) && $Favorites[1] === false ){
			$IDs = $this->Results()['budget_favorites'].',#'.$this->account_id.'#';
			$up = _up_data_table(TB_SMART_BUDGETS,[
				'where' => [ 'budget_id' => $this->budget_id ],
				'values' => [ 'budget_favorites' => (string) $IDs ]
			]);
			if($up){
				return ['ID '.$this->budget_id.' adicinado com sucesso em favoritos', true];
			}else{
				return ['Não foi possível adicinar ID '.$this->budget_id.' em favoritos', false];
			}
		}else{
			return ['O ID '.$this->account_id.' já existe em favoritos', false];
		}
	}


	/** 
	 * Remove o ID dos favoritos se tiver (Seguindo o padrão #ID#)
	 * @return [bool]
	 */
	public function favoritesRemoveID(){
		$Favorites = self::checkStringID( $this->Results()['budget_favorites'] );
		if($Favorites[1]){

			$IDs = explode(",", $this->Results()['budget_favorites']);
			$key = array_search('#'.$this->account_id.'#', $IDs );
			unset($IDs[$key]);	
			$IDs = implode(",", $IDs);
			$IDs = ($IDs == '')? 'nenhum' : $IDs ;

			$up = _up_data_table(TB_SMART_BUDGETS,[
				'where' => [ 'budget_id' => $this->budget_id ],
				'values' => [ 'budget_favorites' => (string) $IDs ]
			]);
			if($up){
				return ['ID '.$this->account_id.' removido dos favoritos',true];
			}else{
				return ['Não foi possível atualizar DB', false];
			}
		}else{
			return ['ID '.$this->account_id.' não está em favoritos',false];
		}
	}


	/** 
	 * Incluir ID em Companies se não existir e adiciona +1 em budget_accepted
	 * @return [type] [description]
	 */
	public function companiesIncludeID(){
		$Companies = self::checkStringID( $this->Results()['budget_companies_id'] );
		if(isset($Companies[2]) && $Companies[2] === 'nenhum'){
			$up = _up_data_table(TB_SMART_BUDGETS,[
				'where' => [ 'budget_id' => $this->budget_id ],
				'values' => [ 
					'budget_companies_id' => '#'.(string) $this->account_id.'#',
					'budget_accepted'  	  => ( $this->Results()['budget_accepted'] + 1 )
				]
			]);
			if($up){
				return ['ID '.$this->budget_id.' adicinado com sucesso em companies', true];
			}else{
				return ['Não foi possível adicinar ID '.$this->budget_id.' em companies', false];
			}
		
		}elseif(!isset($Companies[2]) && $Companies[1] === false ){
			$IDs = $this->Results()['budget_companies_id'].',#'.$this->account_id.'#';
			$up = _up_data_table(TB_SMART_BUDGETS,[
				'where' => [ 'budget_id' => $this->budget_id ],
				'values' => [ 
					'budget_companies_id' => (string) $IDs,
					'budget_accepted'  	  => ( $this->Results()['budget_accepted'] + 1 )
				]
			]);
			if($up){
				return ['ID '.$this->budget_id.' adicinado com sucesso em companies', true];
			}else{
				return ['Não foi possível adicinar ID '.$this->budget_id.' em companies', false];
			}
		
		}else{
			return ['O ID '.$this->account_id.' já existe em companies', false];
		}
	}

	/** 
	 * Checa se está disponível para aceitar sendo aceitos <= 3 e não estando em companies
	 * @return [type] [Mensagem padrão]
	 */
	public function checkAccepted(){
		$Bud = _get_data_full("
			SELECT * FROM `".TB_SMART_BUDGETS."` 
			WHERE `budget_id` =:a 
			AND `budget_accepted` <= 3 
			AND `budget_companies_id` NOT LIKE '%#{$this->account_id}#%'
			", "a={$this->budget_id}"
		);
		if(isset($Bud[0])){
			return [ $Bud[0], false];
		}else{
			return ['Este orçamento já foi aceito', true];
		}
	}

	/** 
	 * Retorno o Saldo Total de moedas da Contado do usuário
	 * @return [type] [Mensagem padrão]
	 */
	public function accountCoins(){
		Coins::accountID($this->account_id);
		return Coins::totalCoins();
	}

	/**
	 * Verifica se existe o ID no Valor Passado pelo parametro
	 * @param  [string]  $Data   [Valor da string vinda da tabela ]
	 */
	private function checkStringID( $Data ){
		if(isset($Data) && $Data !== 'nenhum'){		
			if(preg_match("/#".$this->account_id."#/", $Data)){
				return ['ID '.$this->account_id.' foi encontrado', true];
			}else{
				return ['O ID '.$this->account_id.' não foi encontrado', false];
			}	
		}else{
			return ['Nenhum ID ainda foi registrado', false, 'nenhum'];
		}
	}


}