<?php
/**
 * Classe que trata as informações de Moedas da plataforma vamove
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com - 14.05.2020 
 */

use \Read\Read;
use \Update\Update;
use \Create\Create;

class Coins{
	
	private $account_id; 		// ID da conta do usuário
	private $account_coins;		// Quantoda de moedas da conta do usuário

	/**
	 * Recebe o ID da conta do usuário
	 * @param [type] $account_id [description]
	 */
	public function accountID($account_id){
		$this->account_id = (int) $account_id;
	}

	/** Verifica a quantida de moedas na conta do usuário */
	public function totalCoins(){
		$account_coins = _get_data_full("
 			SELECT `account_coin` FROM ".TB_ACCOUNTS."
 			WHERE `account_id` =:a LIMIT 1
 		", "a={$this->account_id}");
 		return $account_coins = (isset($account_coins[0]))? (int) $account_coins[0]['account_coin'] : false ;
	}

	/**
	 * Subtrai as moedas na account
	 * @param [int] $budget_coin [Valor de moedas que deseja subtrair da account]
	 */
	public function subtractCoins($budget_coin){
		$Total = ( self::totalCoins() - (int) $budget_coin);
		$Coins = ( $Total >= 0 )? $Total : 0 ;
		if(_up_data_table(TB_ACCOUNTS, [
			'where' => [ 'account_id' => $this->account_id ],
			'values' => [ 'account_coin' => $Coins ]
		]))
			return ['Coins subtraidos com sucesso!', true];
		else
			return ['Não foi possível subtrair coins', false];
	}

}