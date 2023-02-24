<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../locations.config.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";


switch ($Action):

	/****************************************************************************
	 * FILTRO DE BUSCA
	 */
	case 'portal/users/search':						
		$Portal = _get_data_full(
			"SELECT * FROM `".TB_TAXONOMIES."`							
				WHERE `tax_name` LIKE '%{$Sync['users_search']}%'
				OR `tax_id` LIKE '{$Sync['users_search']}'
				LIMIT 15");
		if(!$Portal){
			$JSON = [
				'bool' => false,
				'message' => 'Nenhum conta encontrada com o termo "'.$Sync['users_search'].'"'];
			break;
		}else{
			$JSON = [
				'bool' => true,
				'output' => $Portal
			];
		}
	break;



	/****************************************************************************
	 * BUSCA PAISES
	 */
	case 'portal/locations/search/country':
		if(isset($Sync)){
			$Countries = _get_data_full(
				"SELECT * FROM `".TB_LOCATIONS_COUNTRIES."` 
				WHERE `country_name` LIKE '%{$Sync}%' LIMIT 15");
			if($Countries){

				$Co = [];
				foreach ($Countries as $key => $value) {
					array_push($Co, $value['country_name']);
				}

				$JSON = [
					'bool' => true,
					'output' => $Co,
					'message' => 'Lista de paises encontrada!'
				];
			}else{
				$JSON = [
					'bool' => false,
					'output' => null,
					'message' => 'Nenhum país encontrado'
				];
			}
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Nenhum país digitado'
			];
		}
	break;

	/****************************************************************************
	 * BUSCA ESTADOS
	 */
	case 'portal/locations/search/state':
		if(isset($Sync)){
			$States = _get_data_full(
				"SELECT * FROM `".TB_LOCATIONS_STATES."` 
				WHERE `state_name` LIKE '%{$Sync}%' LIMIT 15");
			if($States){

				$St = [];
				foreach ($States as $key => $value) {
					array_push($St, $value['state_name'].' - Cód.'.$value['state_id']);
				}

				$JSON = [
					'bool' => true,
					'output' => $St,
					'message' => 'Lista de estados encontrada!'
				];
			}else{
				$JSON = [
					'bool' => false,
					'output' => null,
					'message' => 'Nenhum estado encontrado'
				];
			}
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Nenhum estado digitado'
			];
		}
	break;

	/****************************************************************************
	 * BUSCA CIDADES
	 */
	case 'portal/locations/search/city':
		if(isset($Sync)){
			$Cities = _get_data_full(
				"SELECT * FROM `".TB_LOCATIONS_CITIES."` 
				WHERE `city_name` LIKE '%{$Sync}%' LIMIT 15");
			if($Cities){

				$St = [];
				foreach ($Cities as $key => $value) {
					array_push($St, $value['city_name']);
				}

				$JSON = [
					'bool' => true,
					'output' => $St,
					'message' => 'Lista de cidade encontrada!'
				];
			}else{
				$JSON = [
					'bool' => false,
					'output' => null,
					'message' => 'Nenhum cidade encontrado'
				];
			}
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Nenhum cidade digitado'
			];
		}
	break;





	/****************************************************************************
	 * CRIA PAIS
	 */
	case 'portal/locations/create/list/country':
		// $JSON = nl2br($Sync['tax_listing']);
		if(isset($Sync['tax_listing'])){
			$Categs = explode("\n",trim($Sync['tax_listing']));	
			foreach ($Categs as $Item) {
				$Check = _get_data_full("SELECT `tax_id` FROM `".TB_TAXONOMIES."` WHERE `tax_name` =:a","a={$Item}");
				$Check = ($Check)? true : false;			
				if(!$Check){
					$Set = _set_data_table(TB_TAXONOMIES,[
						'tax_meta' => $Sync['tax_meta'],
						'tax_inner_id' => $Sync['tax_inner_id'],
						'tax_name' => trim($Item)
					]);
				}	
			}
			$JSON = [
				'bool' => true,
				'message' => 'Lista de categorias cadastrada com sucesso!'
			];
		}else{
			$JSON = [
				'bool' => false,
				'message' => 'Nenhum dado passado'
			];
		}
	break;

	/****************************************************************************
	 * CRIA ESTADOS
	 */
	case 'portal/locations/create/list/states':
		// $JSON = nl2br($Sync['tax_listing']);
		if(isset($Sync['tax_listing'])){
			$Categs = explode("\n",trim($Sync['tax_listing']));	
			foreach ($Categs as $Item) {
				$Check = _get_data_full("SELECT `tax_id` FROM `".TB_TAXONOMIES."` WHERE `tax_name` =:a","a={$Item}");
				$Check = ($Check)? true : false;			
				if(!$Check){
					$Set = _set_data_table(TB_TAXONOMIES,[
						'tax_meta' => $Sync['tax_meta'],
						'tax_inner_id' => $Sync['tax_inner_id'],
						'tax_name' => trim($Item)
					]);
				}	
			}
			$JSON = [
				'bool' => true,
				'message' => 'Lista de categorias cadastrada com sucesso!'
			];
		}else{
			$JSON = [
				'bool' => false,
				'message' => 'Nenhum dado passado'
			];
		}
	break;

	/****************************************************************************
	 * CRIA CIDADES
	 */
	case 'portal/locations/create/list/cities':
		if(isset($Sync['city_listing'])){
			$Cities = explode("\n",trim($Sync['city_listing']));
			foreach ($Cities as $Item) {
				$Bool = false;
				$Check = _get_data_full(
					"SELECT `city_state_id` FROM `".TB_LOCATIONS_CITIES."` 
					WHERE `city_name` =:a
					AND `city_state_id` =:b","a={$Item}&b={$Sync['state_selected']}");
				$Check = ($Check)? true : false;
				if(!$Check){
					$Set = _set_data_table(TB_LOCATIONS_CITIES,[
						'city_state_id' => $Sync['state_selected'],
						'city_name' => trim($Item)
					]);
					$Bool = true;
				}else{
					$JSON = [
						'bool' => false,
						'output' => null,
						'message' => 'Remova da lista os valores a partir de "'.trim($Item).'" para continuar o cadastro'
					];
					break;
				}	
			}
			if($Bool == true){
				$JSON = [
					'bool' => true,
					'output' => null,
					'message' => 'Lista de cidades cadastrada com sucesso!'
				];
			}
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Nenhum dado passado'
			];
		}
	break;

	/****************************************************************************
	 * CRIA DISTRITOS OU BAIRROS
	 */
	case 'portal/locations/create/list/districts':
		// $JSON = nl2br($Sync['tax_listing']);
		if(isset($Sync['tax_listing'])){
			$Categs = explode("\n",trim($Sync['tax_listing']));	
			foreach ($Categs as $Item) {
				$Check = _get_data_full("SELECT `tax_id` FROM `".TB_TAXONOMIES."` WHERE `tax_name` =:a","a={$Item}");
				$Check = ($Check)? true : false;			
				if(!$Check){
					$Set = _set_data_table(TB_TAXONOMIES,[
						'tax_meta' => $Sync['tax_meta'],
						'tax_inner_id' => $Sync['tax_inner_id'],
						'tax_name' => trim($Item)
					]);
				}	
			}
			$JSON = [
				'bool' => true,
				'message' => 'Lista de categorias cadastrada com sucesso!'
			];
		}else{
			$JSON = [
				'bool' => false,
				'message' => 'Nenhum dado passado'
			];
		}
	break;





	/****************************************************************************
	 * CARREGA LISTAS DE CIDADES AO INICIAR
	 */
	case 'portal/locations/cities/refresh':
		$Locations = _get_data_full("SELECT * FROM `".TB_LOCATIONS_CITIES."` ORDER BY `city_id` DESC LIMIT 15");
		if($Locations){
			$JSON = [
				'bool' => true,
				'output' => $Locations,
				'message' => 'Lista das cidades cadastradas'
			];
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Nenhuma cidade cadastrada'
			];
		}
	break;

	/****************************************************************************
	 * CARREGA LISTAS DE BAIRROS AO INICIAR
	 */
	case 'portal/locations/districts/refresh':
		$Locations = _get_data_full("SELECT * FROM `".TB_LOCATIONS_DISTRICTS."` ORDER BY `district_id` DESC LIMIT 15");
		if($Locations){
			$JSON = [
				'bool' => true,
				'output' => $Locations,
				'message' => 'Lista dos bairros cadastrados'
			];
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Nenhuma bairro cadastrado'
			];
		}
	break;









	/****************************************************************************
	 * POVOA A MODAL COM OS DADOS
	 */
	case 'portal/users/modal':	
		if(isset($Sync)){
			$Portal = _get_data_full("SELECT * FROM `".TB_TAXONOMIES."` WHERE `tax_id` =:a", "a={$Sync}");
			if(!$Portal){
				$JSON['notify'] = ['Nenhuma categoria encontrada com o termo "'.$Sync.'"', 'error'];
				break;
			}else{
				$Portal[0]['tax_registered'] = format_datetime($Portal[0]['tax_registered']);
				$Portal[0]['tax_active'] = (isset($Portal[0]['tax_active']) == 0)? 'Inativa' : 'Ativa';
				$JSON = $Portal[0];
			}
		}else{
			$JSON['notify'] = ['Erro ao abrir modal', 'error'];
		}
	break;

	/****************************************************************************
	 * FILTRO DE BUSCA
	 */
	case 'portal/users/search':						
		$Portal = _get_data_full(
			"SELECT * FROM `".TB_TAXONOMIES."`							
				WHERE `tax_name` LIKE '%{$Sync['users_search']}%'
				OR `tax_id` LIKE '{$Sync['users_search']}'
				LIMIT 15");
		if(!$Portal){
			$JSON = [
				'bool' => false,
				'message' => 'Nenhum conta encontrada com o termo "'.$Sync['users_search'].'"'];
			break;
		}else{
			$JSON = [
				'bool' => true,
				'output' => $Portal
			];
		}
	break;

	/****************************************************************************
	 * EDITAR
	 */
	case 'portal/users/button/edit':
		$JSON['notify'] = ['Estamos editando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * DELETAR
	 */
	case 'portal/users/button/delete':
		$JSON['notify'] = ['Estamos deletando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * CRIA NOVO
	 */
	case 'portal/users/create':
		$Email = new Account\Check($Sync['account_email']);
		$Check = $Email->check();
		if(!$Check['BOOL']){
			$Account = _set_data_table(TB_ACCOUNTS, $Sync);
			if($Account){
				$JSON = true;
			}else{
				$JSON = [
					'bool' => false,
					'message' => 'Erro ao cadastrar usuário'
				];
				break;
			}
		}else{
			$JSON = [
				'bool' => false,
				'message' => 'Usuário já existe'
			];
			break;
		}
	break;
	
	/****************************************************************************
	 * CARREGA OS DADOS DO CARD "TOTAL DE USUÁRIOS"
	 */
	case 'portal/users/reports':
		switch ($Sync) {
			case 'valid': $Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `".TB_ACCOUNTS."` WHERE `account_auth` =:a","a=1"); break;
			case 'term': $Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `".TB_ACCOUNTS."` WHERE `account_accept_terms` =:a","a=1"); break;
			case 'active': $Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `".TB_ACCOUNTS."` WHERE `account_status` =:a","a=1"); break;
			case 'inactive': $Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `".TB_ACCOUNTS."` WHERE `account_status` =:a","a=0"); break;
		}
		if($Report && isset($Report[0])){
			$JSON = $Report[0]['Total'];
		}else{
			$JSON = '';
		}
	break;


endswitch;
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON, JSON_UNESCAPED_UNICODE);
}