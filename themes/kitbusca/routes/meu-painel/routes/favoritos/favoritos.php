<?php
/**
 * Page: Lista de orçamentos favoritados pelos usuários
 * Permission: Apenas no Dashboard do anunciante
 * @copyright Felipe Oliveira Lourenço - 12.05.2020
 */

// BUSCA NO BANCO JÁ PAGINANDO
$Budgets = new Paginator(		
	(isset(URL()[2]))? URL()[2] : 0,	// Página atual para manter na mesma página
	6,									// Limite de resultados por apagina
	TB_SMART_BUDGETS,					// Tabela do Bando								
	'', 				  	     		// Condições (Where) caso tenha		
	BASE.URL()[0].'/'.URL()[1].'/',		// URL onde fará a páginação	
	'',									// Sintaxe Adicional Utilizando os recuros acima		
	// SQL Espacífica para casos extremos
	"SELECT * FROM `".TB_SMART_BUDGETS."` 
	WHERE `budget_accepted` <= 3 
	AND `budget_status` = 'ativo' 
	AND `budget_service_id` IN ({$SubCategories}) 
	
	AND `budget_rejected` NOT LIKE '%#{$Company['account_id']}#%' 
	AND	`budget_companies_id` NOT LIKE '%#{$Company['account_id']}#%' 
	AND `budget_favorites` LIKE '%#{$Company['account_id']}#%'

	ORDER BY budget_id DESC "
);

if($Budgets->Results()):
	$tpl='';
	foreach ($Budgets->Results() as $Budget):
		
		// ACESSA AS INFOS DO SERVIÇO
		$Service = _get_data_table(TB_SMART_SERVICES,['service_id' => $Budget['budget_service_id']]);
		$Service = isset($Service)? $Service[0] : [] ;

		// MONTA A VIEW DE EMPRESAS QUE ACEITARÃO ORÇAMENTO
		$Accept = '';
		for($i=1; $i<=4; $i++): 
			if( $i <= $Budget['budget_accepted'] ):
				$Accept.= '<span class="list-accepteds list-true"></span>';
			else:
				$Accept.= '<span class="list-accepteds"></span>';
			endif;
		endfor;

		// MONTA OS DETALHES DO SERVIÇO
		$bud_details = json_decode($Budget['budget_details'], true);
		$ser_details = json_decode($Service['service_form_json'], true);
		
		// CALCULA O VALOR EM MOEDAS DO SERVIÇO
		$Coins = _frontend_calculator_coins(
			$bud_details['add_urgency'], 	// Nível de urgencia
			$Budget['budget_city'],			// Cidado do Budget
			$Budget['budget_service_id'],	// Id do serviço em Budget
			$Budget['budget_accepted']		// Número de Aceitos
		);	
		
		// VARRE A VARIAVEL MATRIZ PARA MONTAR A VIEW
		$details = '';
		foreach ($bud_details as $key => $value):
			switch ($key){
				case 'add_additional':
					if(!empty($value)){
						$details.= "<p>Informações Adicionais<br>";
						$details.= "<b>{$value}</b></p>";
					}
					break;
				
				case 'add_checkbox':
					$details.= "<p>Opções selecionadas<br>";
					foreach ($value as $checked){
						$details.="<b>• {$checked}</b><br>";
					}
					$details.= "</p>";
					break;

				case 'add_urgency':
					$details.= "<p>Para quando precisa do serviço?<br>";
					$details.= "<b>{$value}</b></p>";
					break;

				// CASO DE ERROS, CRIAR UM CASE PARA CADA NAME
				default:
					$details.= "<p>{$ser_details[$key]['label']}<br>";
					$details.= "<b>{$value}</b></p>";
					break;
			}
		endforeach;

		// AJUSTES PARA POVOAR A VIEW
		$Extra = [
			'icon_user_white' => BASE_THEMES.'assets/img/user-white.svg',
			'icon_phone_white' => BASE_THEMES.'assets/img/phone-white.svg',
			'icon_email_white' => BASE_THEMES.'assets/img/email-white.svg',

			'icon_unlock' => BASE_THEMES.'assets/img/unlock.svg',
			'icon_padlock' => BASE_THEMES.'assets/img/padlock.svg',
			'icon_calendar' => BASE_THEMES.'assets/img/calendar.svg',
			'icon_coin' => BASE_THEMES.'assets/img/coin-vamove.svg',	
			'icon_padlock_coin' => BASE_THEMES.'assets/img/padlock-coin-white.svg',

			'budget_count' => ($Budget['budget_accepted'] != null)? "{$Budget['budget_accepted']}/4" : "0/4",
			'budget_accept' => $Accept,
			'budget_value_coin' => $Coins,
			'account_coin_rest' => ((int) $Company['account_coin'] - (int) $Coins ),
					
			'service_details' => $details,

			'client_name' => _do_resume_text($Budget['budget_name'], 8),
			'client_phone' => ($Budget['budget_phones'])? substr(explode(',',$Budget['budget_phones'])[0], 0, -7).'**.****' : '',
			'client_email' => ($Budget['budget_email'])? substr($Budget['budget_email'], 0, 5).'****@****.***' : '',
			
			// BOTÃO REJEITADOS DA MODAL
			'btn_rejected' => "<a href=\"javascript:void(0);\" onclick=\"Flex.RequestServer('budget_salve_rejected','frontend/vamove/_php/Budgets','{$Budget['budget_id']},{$Company['account_id']}',true)\" class=\"uk-icon-button\" uk-icon=\"ban\"></a>",

			'btn_favorites' => ''
	

			// 'client_message' => _do_resume_text($Client['client_message'], 100),
			// 'budget_register' => _do_convert_timestamp($Budget['budget_register']),
		];

		// UNIFICANDO TODOS OS ARRAYS
		$Extra = array_merge($Extra, $Budget, $Service, $Company);

		// POVOANDO A TPL
		$tpl.= _tpl_fill($PATH_DASH.'routes/favoritos/listview.tpl', '', $Extra, false);

	endforeach;
	echo $tpl;
	$Budgets->Navigation();

	_frontend_messageGET();

else:
	$Tpl->TemplatePart($PATH_DASH.'routes/favoritos/no-results.tpl');
endif;