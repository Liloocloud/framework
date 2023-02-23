<?php
/**
 * Gerencia Todas as informações das Empresas Cadastradas
 * Controle do perfil e configurações do usuário
 * 
 * @copyright Felipe Oliveira 01.05.2020
 * @version 1.0
 *
 * @see 'budget_coins_verify'		[Verifica o saldo de para redirecionar]
 * @see 'budget_salve_favorites'	[Salva o budget em favoritos]
 * @see 'budget_salve_rejected'		[Salva o budget em rejeitados]
 * @see 'budget_accepted_confirm'	[Confirma a solicitação de desbloqueio do contato]
 */
 
require_once "../../../_Kernel/___Kernel.php";
require_once "../__config.frontend.php";
require_once "../presets/presets.php";
require_once "../../../_Kernel/_Sync.inout.php";

switch ($Action):

	
	/****************************************************************************
	 * APÓS O USUÁRIO SELECIONAR A ATIVIDADE MOSTRA O SELECT COM 
	 * AS CATEGORIAS PARA PERMITIR A ESCOLHA
	 */
	case 'select_activity':	
		$Activity = new Companies($_SESSION['account_id']);
		$Activity = $Activity->allServicesCompany();
		$Serv = new Services($Sync['array']);
		$checkbox = '';
		if($Activity){
			$i=0;
			foreach ($Serv->listSubCategoriesPerActivity() as $value):
				if(in_array($value['service_sub_category'], $Activity['subcategories'])){
					$checkbox.= '<label><input class="uk-checkbox" type="checkbox" name="company_sub_category['.$i.']" value="'.$value['service_sub_category'].'" checked> '.$value['service_sub_category'].'</label>';
				}else{
					$checkbox.= '<label><input class="uk-checkbox" type="checkbox" name="company_sub_category['.$i.']" value="'.$value['service_sub_category'].'"> '.$value['service_sub_category'].'</label>';
				}
			$i++;
			endforeach;
		}else{
			$i=0;
			foreach ($Serv->listSubCategoriesPerActivity() as $value):
				$checkbox.= '<label><input class="uk-checkbox" type="checkbox" name="company_sub_category['.$i.']" value="'.$value['service_sub_category'].'"> '.$value['service_sub_category'].'</label>';
			$i++;
			endforeach;
		}
		$JSON['array'][0] = [
			'element' => '#select_company_categories div',
			'content' => $checkbox
		];
		break;

	/****************************************************************************
	 * ATUALIZA NA TABELA COMPANY AS INFORMAÇÕES DE CATEGORIA 
	 * DO USUÁRIO APÓS CLICAR EM ATUALIZAR INFORMAÇÕES
	 */
	case 'company_start_complete':
		$Values['company_zipcode'] 		= $Sync['plugin_zipcode'];
		$Values['company_district'] 	= $Sync['pluging_district'];
		$Values['company_city'] 		= $Sync['pluging_city'];
		$Values['company_state']		= $Sync['pluging_state'];
		$Activity 						= $Sync['company_activity'];
		unset($Sync['plugin_zipcode'], $Sync['pluging_district'], $Sync['pluging_city'], $Sync['pluging_state'], $Sync['company_activity']);

		$Services = new Services($Activity);
		$IDs = $Services->subCategoriesIDs($Sync /* Sync com os checkbox */);
		$Values['company_services_id'] = $IDs[1];
		$Company = new Companies($_SESSION['account_id']);
		if(!$Company->checkCompany()[1]):
			$Company->createCompaniesDB();
			if($IDs[1]):
				$Company->updateCompaniesDB($Values);
				$JSON['callback'] = __redirectURL('meu-painel/orcamentos/?m=company-complete');
			else:
				$JSON['array'][0] = [
					'element' => '.callback-alert',
					'content' => _uikit_alert('Selecione pelo menos uma categoria', 'info', false)
				];
			endif;
		else:
			if(!$Company->companyComplete([
					'company_services_id',
					'company_zipcode',
					'company_state',
					'company_city',
					'company_district'
				])[1]):
				if($IDs[1]):
					$Company->updateCompaniesDB($Values);
					$JSON['callback'] = __redirectURL('meu-painel/orcamentos/?m=company-complete');
				else:
					$JSON['array'][0] = [
						'element' => '.callback-alert',
						'content' => _uikit_alert('Selecione pelo menos uma categoria', 'info', false)
					];	
				endif;
			else:
				$JSON['callback'] = __redirectURL('meu-painel/orcamentos/');
			endif;
		endif;
		break;


	/****************************************************************************
	 * ATUALIZA AS INFORMAÇÕES DA COMPANY APÓS O CADASTRO OU O
	 * SE AS INFORMAÇÕES OBRIGATÓRIAS NÃO FOREM PREENCHIDAS
	 */
	case 'complete_account_company':
		if(count($Sync) >= 2){
			$ID = $Sync['company_account_id'];

			// MONTA COM VIRGULA OS CAMPOS DO CHECBOX
			$Sync['company_groups_id'] = [];
			foreach ($Sync as $key => $value){		
				if (preg_match('/company_groups_id\[/', $key)) {
				  array_push($Sync['company_groups_id'], $value);
				  unset($Sync[$key]);
				}
			}
			if(empty($Sync['company_groups_id'])){
				$Sync['company_groups_id'] = null;
			}
			$Sync = implode(',', $Sync['company_groups_id']);

			// PEGA OS IDS DOS SERVIÇOS PARA INCLUIR EM COMPANY
			$Get = _get_data_full(
				"SELECT `group_services_id` FROM `".TB_SMART_SERVICES_GROUP."` 
				WHERE `group_id` IN({$Sync})"
			);
			$Services = '';
			foreach ($Get as $field){
				$Services.= $field['group_services_id'].',';
			}
			$Services = substr($Services, 0, -1);
			$Services = explode(',', $Services);
			$Services = array_unique($Services);
			asort($Services);
			$Services = implode(',', $Services);

			// ATUALIZA NO BANCO
			if(_up_data_table(TB_SMART_COMPANIES, [
				'where' => [ 'company_account_id' => $ID ],
				'values' => [ 
					'company_groups_id' => $Sync,
					'company_services_id' => $Services
				]	
			])){
				$JSON['callback'] = _uikit_notification('Grupos de serviços atualizado com sucesso!', 'success', false);
			}else{
				$JSON['callback'] = _uikit_notification('Não foi possível atualizar grupos de serviços', 'error', false);
			}
		}else{
			$JSON['array'][0] = [
				'element' => '.callback-alert',
				'content' => _uikit_alert('Escolha pelo menos um serviço', 'info', false)
			];			
		}
		break;

	/****************************************************************************
	 * ATUALIZANDO INFOS DE GRUPOS DE SERVIÇOS
	 */
	case 'update_company_groups':
		if(count($Sync) >= 2 && isset($Sync['company_account_id']) && !empty($Sync['company_account_id'])){
			$ID = $Sync['company_account_id'];
			unset($Sync['company_account_id']);
			$Sync = implode(',', $Sync);
			
			// PEGA OS IDS DOS SERVIÇOS PARA INCLUIR EM COMPANY
			$Get = _get_data_full(
				"SELECT `group_services_id` FROM `".TB_SMART_SERVICES_GROUP."` 
				WHERE `group_id` IN({$Sync})"
			);
			$Services = '';
			foreach ($Get as $field){
				$Services.= $field['group_services_id'].',';
			}
			$Services = substr($Services, 0, -1);
			$Services = explode(',', $Services);
			$Services = array_unique($Services);
			asort($Services);
			$Services = implode(',', $Services);

			if(_up_data_table(TB_SMART_COMPANIES, [
				'where' => [ 'company_account_id' => $ID ],
				'values' => [ 
					'company_groups_id' => $Sync,
					'company_services_id' => $Services
				]	
			])){
				$JSON['callback'] = _uikit_notification('Grupos de serviços atualizado com sucesso!', 'success', false);
			}else{
				$JSON['callback'] = _uikit_notification('Não foi possível atualizar grupos de serviços', 'error', false);
			}
		}else{
			$JSON['callback'] = _uikit_notification('Nenhum serviço foi selecionado', 'error', false);
		}
		break;


	/****************************************************************************
	 * ATUALIZANDO LOCALIZAÇÃO DO PROFISSIONAL
	 */
	case 'update_company_location':
		if(isset($Sync['company_account_id']) && !empty($Sync['company_account_id'])){
			$ID = $Sync['company_account_id'];
			unset($Sync['company_account_id']);
			if(_up_data_table(TB_SMART_COMPANIES, [
				'where' => [ 'company_account_id' => $ID ],
				'values' => $Sync
			])){
				$JSON['callback'] = _uikit_notification('Localização do usuário atualizada com sucesso!', 'success', false);
			}else{
				$JSON['callback'] = _uikit_notification('Não foi possível atualizar localização do usuário', 'error', false);
			}
		}else{
			$JSON['callback'] = _uikit_notification('Nenhum profissional foi selecionado', 'error', false);
		}
		break;

	/****************************************************************************
	 * ATUALIZANDO INFORMAÇÕES DO PROFISSIONAL
	 */
	case 'update_company_infos':
		if(isset($Sync['company_account_id']) && !empty($Sync['company_account_id'])){
			$ID = $Sync['company_account_id'];
			unset($Sync['company_account_id']);
			if(_up_data_table(TB_SMART_COMPANIES,[
				'where' => [ 'company_account_id' => $ID ],
				'values' => $Sync
			])){
				$JSON['callback'] = _uikit_notification('Informações atualizadas!', 'success', false);
			}else{
				$JSON['callback'] = _uikit_notification('Não foi possível atualizar categoria', 'error', false);
			}
		}else{
			$JSON['callback'] = _uikit_notification('Nenhum profissional foi selecionado', 'error', false);
		}
		break;

endswitch;
if($JSON!=null)
	echo json_encode($JSON);