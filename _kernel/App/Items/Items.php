<?php
/**
 * Abstração da Tabela nativa Items, sendo responsável por
 * manipular os dados para diversas finalizadades de projetos como:
 * splite (sistema de comissão para fornecedores, representação, consignado e loja virtual).
 * O objetivo e permitir que varias regras de negócio sejam capaz de operar nessa classe
 * @copyright Felip Oliveira - 17.02.2021
 */

namespace Items;

use Account\Account;
use Helpers\Percent;

class Items
{

	private $account_id;


	function __construct($id)
	{
		$this->account_id = (int) $id;
	}

	/**
	 * Total de registros por Conta de usuário
	 * Recupera os registros pelo ID do usuário passado
	 */
	public function itemsAccount(): array
	{
		$Items = _get_data_table(TB_ITEMS, ['item_account_id' => $this->account_id]);
		return $Items;
	}

	/**
	 * Retorna o Total de Items por Conta de Usuário
	 */
	public function itemsAccountTotal(): int
	{
		$Items = _get_data_full(
			"SELECT COUNT(`item_id`) as Total FROM `".TB_ITEMS."` WHERE `item_account_id` =:a"
			,"a={$this->account_id}"
		);
		return (isset($Items[0]['Total']))? $Items[0]['Total'] : 0;
	}

	/**
	 * Retorna o item Copy do Admin Splitando os Fornecedores. Ou seja,
	 * a coluna 'item_copy' será usada como referencia para os items, isso
	 * significa que o sistema é Splite (Comissão e repasse de valores)
	 */
	// public function itemsSpliteCopy(float $price, float $percent)
	// {
	// 	$Percent = new Percent;
	// 	return $Percent->priceAdd($price, $percent);
	// }

	


}