<?php
/**
 * Dip do Módulo Account
 *
 * @copyright Felipe Oliveira Lourenço - 12.01.2021
 * @version 1.0.0
 */

namespace Module\Accounts;
use Account\Account;

trait DipAccount
{

	private $message;
	private $line;
	private $method;
	private $callback = [
		"METHOD" => null,
		"LINE" => null,
		"PATH" => __FILE__
	];

	private function callback(){
		$this->callback["LINE"] = $this->line;
		$this->callback["METHOD"] = $this->method;
		return $this->callback;
	}


	/**
	 * Pega os dados na tabela liloo_accounts pelos parametros passados
	 * @param  array $args  [Parametros indicando as colunas]
	 */
	function getDataAccount($args=false):array
	{
		$this->line = (__LINE__-2);
		$this->method = __METHOD__;	
		if($args){
			$User = _get_data_table(TB_ACCOUNTS, $args);
			$User = (isset($User[0]))? $User[0]: false;
			if($User){
				return [
					"OUTPUT" => $User,
					"BOOL" => true,
					"MESSAGE" => 'Usuário encontrado com sucesso!',
					"CALLBACK" => $this->callback()
				];
			}else{
				return [
					"OUTPUT" => null,
					"BOOL" => false,
					"MESSAGE" => 'Usuário não encontrado',
					"CALLBACK" => $this->callback()
				];
			}
		}else{
			return [
				"OUTPUT" => null,
				"BOOL" => false,
				"MESSAGE" => "Parâmetro esperado não é um 'Array'",
				"CALLBACK" => $this->callback()
			];
		}
	}

	/**
	 * Verifica se o usuário existe e está ativo no sistem
	 * @param  [type]  $id     [ID do usuário no banco]
	 * @param  integer $status [Por padrão verifica 1 = usuário 'ativo']
	 */
	function checkAccount(int $id):array
	{
		$this->line = (__LINE__-2);
		$this->method = __METHOD__;
		if(isset($id)){	
			$User = _get_data_full(
				"SELECT account_id,account_status FROM `".TB_ACCOUNTS."`
				WHERE `account_id` = :a
				","a={$id}"
			);
			$User = (isset($User[0]))? $User[0]: false;
			if($User){
				if($User['account_status'] == 1){
					return [
						"OUTPUT" => $User,
						"BOOL" => true,
						"MESSAGE" => "Usuário existente",
						"CALLBACK" => $this->callback()
					];
				}else{
					return [
						"OUTPUT" => null,
						"BOOL" => false,
						"MESSAGE" => "Usuário existe, mas não está ativo",
						"CALLBACK" => $this->callback()
					];
				}				
			}else{
				return [
					"OUTPUT" => null,
					"BOOL" => false,
					"MESSAGE" => "Conta de usuário não existe",
					"CALLBACK" => $this->callback()
				];
			}
		}else{
			return [
				"OUTPUT" => null,
				"BOOL" => false,
				"MESSAGE" => "Parâmetro ID está ausente",
				"CALLBACK" => $this->callback()
			];
		}
	}


}