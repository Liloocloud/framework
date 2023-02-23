<?php
/**
 * Page: Lista de transações feitas pelo anunciante
 * Permission: Apenas no Dashboard do anunciante
 * @copyright Felipe Oliveira Lourenço - 01.04.2020
 */

$Transaction = new Paginator(
	(isset(URL()[2]))? URL()[2] : 0,  	// Página atuali
	5, 									// Limite de resultados por apagina
	TB_PAY_TRANSACTIONS,				// Tabela do Bando
	'', 								// Condições (Where) caso tenha
	BASE.URL()[0].'/'.URL()[1].'/',		// URL onde fará a páginação
	'ORDER BY transaction_id DESC'		// Sintaxe Adicional ao SQL
);

if($Transaction->Results()):
	$tpl='';
	foreach ($Transaction->Results() as $Pay):
		// $Client = _get_data_table(TB_SMART_CLIENTS, ['client_id' => $Pay['list_client_id']]);
		// $Client = isset($Client[0])? $Client[0] : null ;

		switch ($Pay['transaction_status']):
			case 'Aguardando pagamento': $color = 'background: gray; color: #fff;'; break;
			case 'Aprovado': $color = 'background: green; color: #fff;'; break;
			case 'Reprovado': $color = 'background: red; color: #fff;'; break;
		endswitch;

		$Extra = [
			'color_status' => $color
		];

		$tpl.= _tpl_fill(PATH_THEME.'tpl/listing_transactions.tpl', $Pay, $Extra, false);
	endforeach;
	echo $tpl;
	$Transaction->Navigation();

// $tpl = new Templates;
// $tpl->TemplatePart(PATH_THEME.'tpl/listing_transactions.tpl');
//_tpl_fill(PATH_THEME.'tpl/listing_transactions.tpl', ['transaction_type'=> 'caraca muleque'] );

else:
	?>
	<div class="uk-text-center" uk-alert>
	    <a class="uk-alert-close" uk-close></a>
	    <h3>Você ainda não realizou nenhuma transações.</h3>
	    <p>Atenção - Oferecer pacotes aqui!!!</p>
	</div>
	<?php 
endif;