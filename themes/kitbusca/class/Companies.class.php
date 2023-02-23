<?php
/**
 * Classe de abstração das informações da tabela 'flex_smart_companies'
 * também responsável por validar informações pertinentes a company
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com - 14.05.2020 
 */

use \Read\Read;
use \Update\Update;
use \Create\Create;

class Companies{
	
	private $company_id; 		// ID da company
	private $account_id;		// ID da account, pois ele é a chave estrangeira de companies
	private $company;			// Recebe o retorno da class

	function __construct($AccountID, $CompanyID=null){
		$this->account_id = (int) $AccountID;
		$this->company_id = $CompanyID;	
	}

	/** Retorna todos os dados de Account e Companies pelo ID indicado */
	public function Results(){
		$Data = _get_data_full("
			SELECT * FROM `".TB_ACCOUNTS."` INNER JOIN `".TB_SMART_COMPANIES."`
			ON ".TB_ACCOUNTS.".account_id = ".TB_SMART_COMPANIES.".company_account_id 
			WHERE `account_id` =:a","a={$this->account_id}");
		return $Data = (isset($Data[0]))? $Data[0] : false;
	}

	/** 
     * Verifica se os campos obrigatório da campany estão preenchidos
     * Se não tiver não permite visualizar outra página antes de completar 
     * o cadastro obrigatório
     * @param [array] $array 		[Campos da Tabela de preenchimento obrigatório]
	 */
	public function companyComplete($array=null){
		$Check = self::checkCompany();
		if($Check[1]):
			// Checar se os campos correspondem com os do banco
			$selects = '`'.implode('`,`', $array).'`';
			$DB = _get_data_full("
				SELECT {$selects} FROM `".TB_SMART_COMPANIES."`
				WHERE `company_account_id` =:a", "a={$this->account_id}");
			$DB = (isset($DB))? true : false;
			if($DB):
				// Remonta os arrays do banco com os do parametro
				$Check = [];
				foreach ($array as $fields):
					if( array_key_exists($fields, self::Results()) ):
						array_push($Check, self::Results()[$fields]);
					endif;
				endforeach;
				// Checa se existe algum indice do array vazio
				$var=true;
				$i=0;
				while ($var == true AND $i < count($Check)):
					$var = ($Check[$i])? true : false ;
					$i++;
				endwhile;


				if($var)
					return ['Todos os campos foram preenchidos', true];
				else
					return ['Existe algum campo obrigatório vazio', false];
			else:
				return ['Nome da coluna está incorreto', false];
			endif;
		else:
			return $Check;
		endif;
	}


	/** 
	 * Verificar se a conta existe na tabela company
	 * @return [bool] true
	 */
	public function checkCompany(){
		if(_get_data_table(TB_SMART_COMPANIES, [ 'company_account_id' => $this->account_id ])):
			return ['Company já cadastrada!', true];
		else:
			return ['Company não cadastrada!', false];
		endif;
	}

	/**
	 * Atualiza a os dados na tabela de acordo com os valores passado pelo parametro
	 */
	public function updateCompaniesDB($Values=null){
		if($Values != null):
			$Up = _up_data_table(TB_SMART_COMPANIES, [
				'where' => [ 'company_account_id' => $_SESSION['account_id'] ],
				'values' => $Values
			]);
			return ['Company atualizado com sucesso!', true];
		else:
			return ['Parametro passado em updateCompaniesDB(); está vazio', false];
		endif;
	}

	/** Cria uma linha em Companies associada a tabela account */
	public function createCompaniesDB(){
		if(!$this->checkCompany()[1]){
			$Set = _set_data_table(TB_SMART_COMPANIES, [
				'company_account_id' => $this->account_id
			]);
			if($Set)
				return ['Company cadastrada com sucesso!', true];
			else
				return ['Erro interno, não foi possível cadastrar company', false];
		}else{
			return ['Erro, não foi possível cadastrar company', false];
		}

	}
}