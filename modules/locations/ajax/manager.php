<?php
/**
 * Actions do modulo locations
 * @copyright Felipe Oliveira - 08.02.2023
 * @version 2.0.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../locations.config.php";
require_once "../../../_Kernel/_Sync.inout.v2.php";

switch ($Action){

	/****************************************************************************
	 * CRIA PAÍS
	 */
	case 'create/country':
		$Country = new \Module\Locations\Locate($Sync);
		$Country = $Country->createCountry();
		$JSON = [
			'bool' => ($Country['bool'])? true : false,
			'message' => $Country['message'],
			'type' => ($Country['bool'])? 'success' : 'info',
			'output' => ($Country['bool'])? $Country['output'] : null,
		];
	break;

	/****************************************************************************
	 * CRIA LISTA DO ESTADOS
	 */
	case 'create/states':
		if(isset($Sync['state_listing']) && isset($Sync['country_selected'])){
			$States = explode("\n",trim($Sync['state_listing']));
			$Country = explode(" - ", $Sync['country_selected']);
			$Sync['state_country_id'] = (int) $Country[0];
			// $Sync['state_country_lang'] = $Country[2];
			unset($Sync['state_listing'], $Sync['country_selected']);

			foreach ($States as $Item) {
				if(mb_strpos($Item, ';')){
					$Str = explode(";", $Item);
					$Sync['state_name'] = trim($Str[0]);
					$Sync['state_uf'] = trim($Str[1]);
				}else{
					$Sync['state_name'] = $Item;
					$Sync['state_uf'] = null;
				}
				$Sync = array_filter($Sync);

				$Insert = new \Module\Locations\Locate($Sync);
				$Insert = $Insert->createState();
				if(!$Insert['bool']){
					$JSON = [
						'bool' => false,
						'message' => "O estado \"{$Sync['state_name']}\" já existe. Remova da lista para continuar",
						'type' => 'info',
						'output' => null,
					];
					break;
				}				
				$JSON = [
					'bool' => true,
					'message' => $Insert['message'],
					'type' => 'success',
					'output' => $Insert['output'],
				];
			}	
			unset($Insert, $Sync);
		}
	break;

	/****************************************************************************
	 * CRIA LISTA DE CIDADES
	 */
	case 'create/cities':
		if(isset($Sync['city_listing']) && isset($Sync['state_selected'])){
			$Cities = explode("\n",trim($Sync['city_listing']));
			$State = explode(" - ", $Sync['state_selected']);
			$Sync['city_state_id'] = (int) $State[0];
			unset($Sync['city_listing'], $Sync['state_selected']);

			foreach ($Cities as $Item) {
				if(mb_strpos($Item, ';')){
					$Str = explode(";", $Item);
					$Sync['city_name'] = trim($Str[0]);
					$Sync['city_sigle'] = trim($Str[1]);
				}else{
					$Sync['city_name'] = $Item;
					$Sync['city_sigle'] = null;
				}
				$Sync = array_filter($Sync);
				
				$Insert = new \Module\Locations\Locate($Sync);
				$Insert = $Insert->createCity();
				if(!$Insert['bool']){
					$JSON = [
						'bool' => false,
						'message' => "A cidade \"{$Sync['city_name']}\" já existe. Remova da lista para continuar",
						'type' => 'info',
						'output' => null,
					];
					break;
				}
				$JSON = [
					'bool' => true,
					'message' => $Insert['message'],
					'type' => 'success',
					'output' => $Insert['output'],
				];
			}
			unset($Insert, $Sync);
		}
	break;

	/****************************************************************************
	 * CRIA DISTRITOS OU BAIRROS PARA APRESENTA NA LISTAGEM
	 */
	case 'create/districts':
		if(isset($Sync['district_listing']) && isset($Sync['city_selected'])){
			$District = explode("\n",trim($Sync['district_listing']));
			$City = explode(" - ", $Sync['city_selected']);
			$Sync['district_city_id'] = (int) $City[0];
			unset($Sync['district_listing'], $Sync['city_selected']);

			foreach ($District as $Item) {
				if(mb_strpos($Item, ';')){
					$Str = explode(";", $Item);
					$Sync['district_name'] = trim($Str[0]);
					// $Sync['city_sigle'] = trim($Str[1]);
				}else{
					$Sync['district_name'] = $Item;
					// $Sync['city_sigle'] = null;
				}
				$Sync = array_filter($Sync);
						
				$Insert = new \Module\Locations\Locate($Sync);
				$Insert = $Insert->createDistrict();
				if(!$Insert['bool']){
					$JSON = [
						'bool' => false,
						'message' => "O bairro \"{$Sync['district_name']}\" já existe. Remova da lista para continuar",
						'type' => 'info',
						'output' => null,
					];
					break;
				}
				$JSON = [
					'bool' => true,
					'message' => $Insert['message'],
					'type' => 'success',
					'output' => $Insert['output'],
				];
			}
			unset($Insert, $Sync);
		}
	break;

	/****************************************************************************
	 * BUSCA PAISES PARA APRESENTAR NA LISTAGEM
	 */
	case 'search/country':
		if(isset($Sync)){
			$Countries = _get_data_full("SELECT * FROM `".TB_LOCATIONS_COUNTRIES."` WHERE `country_name` LIKE '%{$Sync}%' LIMIT 15");
			$Co = [];
			foreach ($Countries as $key => $value) {
				array_push($Co, $value['country_id'].' - '.$value['country_name'].' - '.$value['country_lang']);
			}
			$JSON = [
				'bool' => ($Countries)? true : false,
				'message' => ($Countries)? 'Lista de paises encontrada!' : 'Nenhum país encontrado',
				'output' => ($Countries)? $Co : null,
			];
			break;
		}
		$JSON = [
			'bool' => false,
			'output' => null,
			'message' => 'Nenhum país digitado'
		];
	break;

	/****************************************************************************
	 * BUSCA ESTADOS PARA APRESENTAR NA LISTAGEM
	 */
	case 'search/state':
		if(isset($Sync)){
			$States = _get_data_full("SELECT * FROM `".TB_LOCATIONS_STATES."` WHERE `state_name` LIKE '%{$Sync}%' LIMIT 15");
			$St = [];
			foreach ($States as $key => $value) {
				array_push($St, $value['state_id'].' - '.$value['state_name']);
			}
			$JSON = [
				'bool' => ($States)? true : false,
				'message' => ($States)? 'Lista de estados encontrada!' : 'Nenhum estado encontrado',
				'output' => ($States)? $St : null,
			];
			break;
		}
		$JSON = [
			'bool' => false,
			'output' => null,
			'message' => 'Nenhum estado digitado'
		];
	break;

	/****************************************************************************
	 * BUSCA CIDADE PARA APRESENTAR NA LISTAGEM
	 */
	case 'search/city':
		if(isset($Sync)){
			$Cities = _get_data_full("SELECT * FROM `".TB_LOCATIONS_CITIES."` WHERE `city_name` LIKE '%{$Sync}%' LIMIT 15");
			$Ci = [];
			foreach ($Cities as $key => $value) {
				array_push($Ci, $value['city_id'].' - '.$value['city_name']);
			}
			$JSON = [
				'bool' => ($Cities)? true : false,
				'message' => ($Cities)? 'Lista de cidade encontrada!' : 'Nenhum cidade encontrado',
				'output' => ($Cities)? $Ci : null,
			];
			break;
		}
		$JSON = [
			'bool' => false,
			'output' => null,
			'message' => 'Nenhum cidade digitado'
		];
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

}
echo json_encode($JSON, JSON_UNESCAPED_UNICODE);