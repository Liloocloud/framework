<?php
/**
 * Gerencia Todas as Operações da Frontend que Necessitam de AJAX
 * @copyright Felipe Oliveira -  15-05-2020
 * @version 1.0
 *
 * @see 'search_service_term'		[Sistema de busca redirecionando para uma página especificada]
 */

header('Access-Control-Allow-Origin: *');
require_once "../../../_Kernel/___Kernel.php";
// require_once "../__config.frontend.php";
require_once "../presets/presets.php";
require_once "../../../_Kernel/_Sync.inout.php";

switch ($Action):

	/****************************************************************************
	 * TESTE DE NAME
	 */
	case 'teste_teste':
		$Accounts = _get_data_table(TB_ACCOUNTS);
		$JSON['console'] = $Accounts;
		// $JSON['array'][0] = [
		// 	'element' => '#select_company_categories div',
		// 	'content' => 
		// ];

		break;



	/****************************************************************************
	 * TESTE DE NAME
	 */
	// case 'teste_teste':
	// 	if(count($Sync) > 1){
	// 		$Array = [];
	// 		foreach ($Sync as $Key => $Field){
	// 			$Items = explode(';', $Key);
	// 			$Items = array_filter($Items);
	// 			foreach ($Items as $value) {
	// 				$Val = explode('=', $value);
	// 				$Builder[$Val[0]] = $Val[1];
	// 			}		
	// 			array_push($Array, $Builder);
	// 		}
	// 		var_dump($Array);			
	// 	}else{
	// 		$Items = explode(';', array_keys($Sync)[0]);
	// 		$Items = array_filter($Items);
	// 		foreach ($Items as $value) {
	// 			$Val = explode('=', $value);
	// 			$Array[$Val[0]] = $Val[1];
	// 		}		
	// 		var_dump($Array);
	// 	}	
	// 	break;



	/****************************************************************************
	 * REDIRECIONA PARA A BUSCA FEITA NO BUSCADOR 
	 * NUMA TENTATIVA DE EVIAR REENVIO DO FORMULÁRIO
	 */
	case 'search_service_term';
	$Term = trim($Sync['term']);
	if(isset($Term)){
		$Input = array_filter(explode(' ',trim(strtolower($Term))));
		$Input = array_map("strip_tags", $Input);
		$Input = array_map("trim", $Input);

		require_once PATH_THEME."presets/palavras-negativas.php";
		$Term_uniq = array_diff($Input, $preset['negatives']);
		$Term_comp = implode(' ',$Term_uniq);
		$Res = _get_data_full("
			SELECT `service_url` FROM `".TB_SMART_SERVICES."` WHERE 
			`service_terms` LIKE '%{$Term_comp}%'
			");
		$Res = (isset($Res[0]))? $Res[0] : false;

		if($Res){
			$JSON['callback'] = __redirectURL('solicitacao/'.$Res['service_url'].'1/');
		}else{
			$JSON['callback'] = _uikit_notification('Não encontramos nenhum serviço com esse termo', 'info', false);
		}
	}
	break;


	/****************************************************************************
	 * LISTAGEM DOS SERVIÇOS AO CLICAR NO GRUPO DE SERVIÇO
	 */
	case 'list_service_per_group':

		// echo 'Teste';

	$Services = _get_data_full("SELECT `service_category`,`service_url` FROM `".TB_SMART_SERVICES."`
		WHERE `service_id` IN({$Sync['array']}) ORDER BY service_title ASC");
	$Services = (isset($Services))? $Services : false;
	if($Services){
		$view = '';
		foreach ($Services as $Item){
			$view.="<option value='{$Item['service_url']}'>{$Item['service_category']}</option>\r\n";
		}
	}
	$JSON['array'][0] = [
		'element' => '.list_services',
		'content' => $view
	];
	break;


	/****************************************************************************
	 * APÓS SELECIONADO O SERVIÇO REDIRECIONA
	 * PARA A PÁGINA DE SOLICITAÇÃO RESPONSÁVEL PELO 1º PASSO (INFOS DO ORÇAMENTO)
	 */
	case 'search_select_service':
	if(!empty($Sync['service_url']) && isset($Sync['service_url'])){
		$JSON['callback'] = __redirectURL('solicitacao/'.$Sync['service_url'].'1/');
	}
	break;


	/****************************************************************************
	 * FORMAULÁRIO DE SUPORTE DA PÁGINA - FALE CONOSCO
	 */
	case 'support_frontend':
	if(count($Sync) == 4){
			// Preparar o conteúdo HTML
		$Message = "<h3><b>Nome:</b> ".$Sync['support_name']."</h3>\n\r";
		$Message.= "<p><b>E-mail:</b> ".$Sync['support_email']."</p>\n\r";
		$Message.= "<p><b>Assunto:</b> ".$Sync['support_subject']."</p>\n\r";
		$Message.= "<p><b>Mensagem:</b> ".$Sync['support_message']."</p><hr>\n\r";
		$Message.= "<p><b>Data de envio:</b> ".date("d/m/Y H:i:s")."</p>\n\r";
		$Message.= "<p><b>IP:</b> "._get_client_ip()."</p>\n\r";

			// Disparar mensagem para o email padrão de uso do super admin
		$Email = new Email();
		$Email->add(
			'Fale Conosco - '.$Sync['support_subject'],
			$Message,
			FLEX_MAIL['from_name'],
			FLEX_MAIL['from_email']
		);
		if($Email->send()){
			$JSON['callback'] = _uikit_notification('Mensagem enviado com sucesso!', 'success', false);
		}else{
			$JSON['callback'] = _uikit_notification('Não foi possível enviar mensagem. Tente novamente!', 'error', false);
		}
	}else{
		$JSON['callback'] = _uikit_notification('Preencha todas as informações', 'info', false);
	}
	break;

endswitch;
if($JSON!=null)
	echo json_encode($JSON);