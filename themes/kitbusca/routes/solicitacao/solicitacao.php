<?php
/**
 * Página que recebe as busca para montar o formulári correspondente a escolha
 * @copyright Felipe Oliveira Lourenço - 01.04.2020
 *
 * @see A url '1' é para o primeiro passo da solicitação
 * @see A url '2' é para o segundo passo, onde as informações do usuário são solicitadas
 * @see A url 'success' é para indicar que a operação foi realiza para poder mandar a mensagem ao usuário
 */


$GroupsCategories = _get_data_full("
	SELECT `group_services_id`,`group_title` 
	FROM `".TB_SMART_SERVICES_GROUP."`
	ORDER BY group_title ASC ");
$View = '';
foreach ($GroupsCategories as $item) {
	$View.= "<option value='{$item['group_services_id']}'>{$item['group_title']}</option>";
}

$Extra['uploads'] = BASE_UPLOADS;
$Extra['form_search'] = _tpl_fill(PATH_THEME.ROUTES.'solicitacao/search.tpl', ['list_groups' => $View], '', false);
$Extra['base'] = BASE;

/**
 * 2º PASSO DA SOLICITAÇÃO
 */
if(isset($_SESSION['budget_id_step_2']) && isset(URL()[1]) && isset(URL()[2]) && URL()[2]== '2'){
	
	$Form = _get_data_table(TB_SMART_SERVICES, ['service_url' => URL()[1].'/' ]);
	if($Form[0]){
		$Form = $Form[0];
		$Extra['budget_id'] = $_SESSION['budget_id_step_2'];
		$Extra['banner'] = BASE_UPLOADS.'services/'.$Form['service_image'];
		_tpl_fill(PATH_THEME.ROUTES.'solicitacao/solicitacao_step_2.tpl', $Form, $Extra, true);	
	}else{
		echo 'Erro interno (Redirect for: home)';
	}

/**
 * 1º PASSO DA SOLICITAÇÃO
 */
}elseif(isset(URL()[1]) && isset(URL()[2]) && URL()[2]== '1'){
	
	$Form = _get_data_table(TB_SMART_SERVICES, ['service_url' => URL()[1].'/' ]);
	if($Form[0]){
		$Form = $Form[0];
		$Group = _get_data_full("
			SELECT `group_title`,`group_image` FROM `".TB_SMART_SERVICES_GROUP."` WHERE
			`group_services_id` LIKE '%{$Form['service_id']}%'
			");
		$Group = (isset($Group[0]))? $Group[0] : false;
		if($Group){
			$Form = array_merge($Form, $Group);
		}

		$Extra['require'] = _form_render_db($Form['service_form_json'], false);
		$Extra['banner'] = BASE_UPLOADS.'services/'.$Form['service_image'];
		_tpl_fill(PATH_THEME.ROUTES.'solicitacao/solicitacao_step_1.tpl', $Form, $Extra, true);

	}else{
		echo 'Mostrar buscador da home';		
	}

/**
 * SUCCESS - OPERAÇÃO REALIZADA
 */
}elseif(!isset(URL()[2]) && isset(URL()[1]) && URL()[1]== 'success'){
	_tpl_fill(PATH_THEME.ROUTES.'solicitacao/solicitacao_success.tpl', $Extra, '', true);
}