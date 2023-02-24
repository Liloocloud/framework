<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA followup
 * @copyright Felipe Oliveira - 30.03.2022
 * @version 2.0
 */

// if(isset($_SESSION['account_level']) && $_SESSION['account_level'] < 10){
// 	exit;
// }

require_once "../../../../../_Kernel/___Kernel.php";
require_once "../../../agency.config.php";
require_once "../../../../../_Kernel/_Sync.inout.v2.php";


switch ($Action):

	/****************************************************************************
	 * CARREGA OS USUÁRIO AO INICIAR
	 */
	case 'agency/workers/init':
		$Workers = _get_data_table(TB_ACCOUNTS, [
			'account_this_id' => $_SESSION['account_id']
		]);
		if(!$Workers){
			$JSON['notify'] = ['Nenhum colaborador encontrado com o termo "'.$Sync['worker_search'].'"', 'error'];
			break;
		}else{
			$JSON = $Workers;
		}
	break;

	/****************************************************************************
	 * POVOA A MODAL COM OS DADOS DO COLABORADOR
	 */
	case 'agency/workers/modal':	
		if(isset($Sync)){
			$Workers = _get_data_full(
				"SELECT * FROM `".TB_ACCOUNTS."`
					INNER JOIN `".TB_MATRIX_COWORKERS."` ON ".TB_ACCOUNTS.".account_id = ".TB_MATRIX_COWORKERS.".cow_account_id								
					WHERE `account_id` =:a
					AND `account_this_id` =:b",
					"a={$Sync}&b={$_SESSION['account_id']}");
			$i = 0;
			foreach ($Workers as $key => $value) {
				$Cat = _get_data_full("SELECT `categ_title` FROM  `".TB_MATRIX_COWORKER_CATEGORY."` 
				WHERE `categ_id` IN({$value['cow_inner_category']})");			
				$Workers[$i]['categ_title'] = '';
				foreach ($Cat as $Val) {
					$Workers[$i]['categ_title'] .= $Val['categ_title'].',';
				}
				$Workers[$i]['categ_title'] = str_replace(",",", ", $Workers[$i]['categ_title']);
				$Workers[$i]['categ_title'] = substr($Workers[$i]['categ_title'], 0, -2);		
				$i++;
			}
			if(!$Workers){
				$JSON['notify'] = ['Nenhum colaborador encontrado com o termo "'.$Sync.'"', 'error'];
				break;
			}else{
				$JSON = $Workers;
			}
			unset($JSON[0]['account_password']);
		}else{
			$JSON['notify'] = ['Erro ao abrir modal', 'error'];
		}
	break;

	/****************************************************************************
	 * FILTRO DE BUSCA
	 */
	case 'agency/workers/search':						
		// INNER JOIN `".TB_MATRIX_COWORKER_CATEGORY."` ON ".TB_MATRIX_COWORKERS.".cow_account_id = ".TB_MATRIX_COWORKER_CATEGORY.".categ_id
		// UNION ALL 
		// SELECT * FROM `".TB_MATRIX_COWORKER_CATEGORY."`
		$Workers = _get_data_full(
			"SELECT * FROM `".TB_ACCOUNTS."`
				INNER JOIN `".TB_MATRIX_COWORKERS."` ON ".TB_ACCOUNTS.".account_id = ".TB_MATRIX_COWORKERS.".cow_account_id								
				WHERE `account_name` LIKE '%{$Sync['worker_search']}%'
				OR `account_lastname` LIKE '%{$Sync['worker_search']}%'
				OR `account_cpf` LIKE '%{$Sync['worker_search']}%'
				OR `account_cnpj` LIKE '%{$Sync['worker_search']}%'
				OR `account_phone` LIKE '%{$Sync['worker_search']}%'
				AND `account_this_id` =:a",
				"a={$_SESSION['account_id']}");
		$i = 0;
		foreach ($Workers as $key => $value) {
			$Cat = _get_data_full("SELECT `categ_title` FROM  `".TB_MATRIX_COWORKER_CATEGORY."` 
			WHERE `categ_id` =:a", "a={$value['cow_category_id']}");
			$Workers[$i]['categ_tile'] = $Cat[0]['categ_title'];
			$i++;
		}
		if(!$Workers){
			$JSON['notify'] = ['Nenhum colaborador encontrado com o termo "'.$Sync['worker_search'].'"', 'error'];
			break;
		}else{
			$JSON = $Workers;
		}
	break;

	/****************************************************************************
	 * EDITAR COLABORADOR
	 */
	case 'agency/workers/button/edit':
		$JSON['notify'] = ['Estamos editando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * DELETAR COLABORADOR
	 */
	case 'agency/workers/button/delete':
		$JSON['notify'] = ['Estamos deletando '.$Sync['data'], 'success'];
	break;

	/****************************************************************************
	 * CRIA NOVO COLABORADOR
	 */
	case 'agency/workers/create':	
	break;
	
	/****************************************************************************
	 * FILTRO DE BUSCA TESTE
	 */
	case 'agency/workers/search-test':						
		if($Sync['worker_search'] == ''){
			$JSON['callback'] = '<script>$(\'input[name="worker_search"]\').addClass("uk-form-danger").focus()</script>';
			$JSON['notify'] = ['Campo vazio', 'error'];
			break;
		}
		$Workers = _get_data_full(
			"SELECT 
			`account_name`,
			`account_lastname`,
			`account_cpf`,
			`account_cnpj`,
			`account_phone`,
			`account_email`
			FROM `".TB_ACCOUNTS."` 
			WHERE `account_name` LIKE '%{$Sync['worker_search']}%'
			OR `account_lastname` LIKE '%{$Sync['worker_search']}%'
			OR `account_cpf` LIKE '%{$Sync['worker_search']}%'
			OR `account_cnpj` LIKE '%{$Sync['worker_search']}%'
			OR `account_phone` LIKE '%{$Sync['worker_search']}%'
			AND `account_this_id` =:a", "a={$_SESSION['account_id']}");		
		if(!$Workers){
			$JSON['notify'] = ['Nenhum colaborador encontrado com o termo "'.$Sync['worker_search'].'"', 'error'];
			break;
		}
		$li = '';
		foreach ($Workers as $Data) {
			$li.= _tpl_fill(file_get_contents('./tpl/workers-li.tpl'), $Data, '', false);
		}	
		$JSON['callback'] = '<script>$(\'input[name="worker_search"]\').removeClass("uk-form-danger")</script>';
		$JSON['array'][0] = [
			'element' => '#agency_workers_list',
			'content' => $li
		];
	break;

endswitch;
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}