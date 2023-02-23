<?php



namespace Helpers;

Class Percent 
{

	/**
	 * Adiciona um percentual sob o preço passado no parametro
	 * @param  [type] $price   [Priço inicial]
	 * @param  [type] $percent [Porcentagem]
	 * @return [type]          [Retorna o Valor com  percentual adicionado]
	 */
	public function priceAdd($price, $percent): float
	{
		$newPrice = round($price, 2);
		$finalPrice = ($newPrice * ( $percent / 100 )) + $newPrice;
		return round($finalPrice, 2);
	}
			
}
