<?php
/**
 * Arquivo Responsável por Realizar o CRUD através de switch
 * @copyright Felipe Oliveira 16-09-2018
 * @version 1.0
 */
require_once "../../../_Kernel/___Kernel.php";
require_once "../__config.module.php";
// require_once "../presets.php";
// require_once "../fun.php";

$Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$Action 	= $Data['action'];
$_Clients 	= $_Module['_clients'];
$_Module 	= $_Module['ead'];

// Sync DATA
unset($Data['module']);
unset($Data['action']);
if(isset($Data['alldata'][0])){ unset($Data['alldata'][0]); }
if(isset($Data['alldata'][1])){ unset($Data['alldata'][1]); }
$i=2;
foreach ($Data['alldata'] as $value):
    if(in_array($Data['alldata'][$i]['name'], $Data['alldata'][$i])): 
 	  	$Sync[$Data['alldata'][$i]['name']] = $Data['alldata'][$i]['value'];
	endif;
$i++;
endforeach;
session_start();
sleep(0.5);


// ACTIONS
switch ($Action):

	/*******************************************************************************
	 * ADICIONANDO AO CARRINHO
	 */
	case 'add-cart':
		if($Sync['type'] == 'create'):	
			if(!empty($_SESSION['account_id'])):
				$Sync['item_account_id'] 	= $_SESSION['account_id'];
				$args = [ 'item_account_id' 	=> $_SESSION['account_id'] ];
			else:
				setcookie('account_cookie', _get_client_ip());
				$Sync['item_cookie_id'] = $_COOKIE['account_cookie'];
				$args = [ 'item_cookie_id' => $_COOKIE['account_cookie']];
			endif;		
			$Item = _get_data_table(FLEX_PAYMENT_ORDER_ITEMS, ['item_item_id' => $Sync['id']] );
			if(!$Item):
				$Sync['item_item_id'] 		= $Sync['id'];
				$Sync['item_namespace'] 	= $Sync['content'];
				unset($Sync['id'], $Sync['content'], $Sync['type']);		
				$Set = _set_data_table(FLEX_PAYMENT_ORDER_ITEMS, $Sync);
				if($Set):
					$Count = _get_data_table(FLEX_PAYMENT_ORDER_ITEMS, $args);
					$Count = ($Count)? (string) count($Count) : 0 ;
					$JSON['callback'] = '<script>';
					$JSON['callback'].= '$("#add-cart-item").css("visibility","visible");';
					$JSON['callback'].= '$("#add-cart-item").html("'.$Count.'");';
					$JSON['callback'].= '</script>';
					$JSON['callback'].= _uikit_notification('Item adicionado ao carrinho!', 'success', false);	
				else:
					$JSON['callback'] = _uikit_notification('Erro interno: Não foi possível adicionar item ao carrinho.', 'error', false);
				endif;
			else:
				$JSON['callback'] = _uikit_notification('O item já foi adicionado ao carrinho', 'info', false);
			endif;
		endif;
		echo json_encode($JSON);
		break;
	
	
	/*******************************************************************************
	 * RECARREGANDO O CARRINHO NO LOAD DA PÁGINA
	 */
	case 'load-cart':
		if(!empty($_SESSION['account_id'])):
			$args = [ 'item_account_id' 	=> $_SESSION['account_id'] ];
		else:
			$args = [ 'item_cookie_id' => _get_client_ip() ];
		endif;
		$Count = _get_data_table(FLEX_PAYMENT_ORDER_ITEMS, $args);
		$Count = ($Count)? (string) count($Count) : null ;
		if($Count):
			$JSON['callback'] = '<script>';
			$JSON['callback'].= '$("#add-cart-item").css("visibility","visible");';
			$JSON['callback'].= '$("#add-cart-item").html("'.$Count.'");';
			$JSON['callback'].= '</script>';
		else:
			$JSON['callback'] = '';
		endif;
		echo json_encode($JSON);
		break;	


	/*******************************************************************************
	 * EXCLUINDO CURSO DO CARRINHO
	 */
	case 'delete-item-cart':
		if($Sync['type'] == 'delete'):		
			// Exclui item do banco
		    $del = _del_data_table(FLEX_PAYMENT_ORDER_ITEMS, [ 'item_id' => (int) $Sync['id'] ]);
			if($del):	
				// Repoe a listagem				
				if(!empty($_SESSION['account_id'])):
					$args = [ 'item_account_id' 	=> $_SESSION['account_id'] ];
				else:
					$args = [ 'item_cookie_id' => _get_client_ip() ];
				endif;
				$Items = _get_data_table(FLEX_PAYMENT_ORDER_ITEMS, $args);
				$list = '';
				foreach ($Items as $value):
					$Courses = _get_data_table(TB_COURSES, ['course_id' => $value['item_item_id'] ]);
					$Courses = ($Courses)? $Courses[0] : null ;
					if($Courses):
						$Instructor = _get_data_table(TB_ACCOUNTS, ['account_id' => $Courses['course_account_id'] ]);
						$Instructor = ($Instructor)? $Instructor[0]['account_name'] : null ;						
						$Extra = [
							'current_money' => 'R$ ',
							'instructor'    => $Instructor,
							'delete_item_id' => $value['item_id']
						];
						$list.= _tpl_fill(PATH_THEME.'tpl/cart-listing.html', $Courses, $Extra, false);
					endif;
				endforeach;
				$JSON['callback'] = _uikit_notification('Processo excluido com sucesso!', 'success', false);		
				$JSON['callback'].= '<script>$("#cart-listing").html(`'.$list.'`);</script>';
			else:
				$JSON['callback'] = _uikit_notification('Não foi possível excluir o item da lista', 'error', false); 
			endif;
		endif;
		echo json_encode($JSON);
		break;


	/*******************************************************************************
	 * EXCLUINDO ITEM DO CARRINHO
	 */
	case '':
		break;































	case 'upcreate-step-1':
		$id 		= $Sync['course_id'];
		$account 	= $Sync['course_account_id'];
		$redirect 	= $Sync['redirect'];
		$switch		= $Sync['switch'];
		unset($Sync['redirect'], $Sync['course_id'], $Sync['switch']);
		// Converter para o TIPO correspondente a tabela
		$Sync['course_price'] = str_replace('.', '', $Sync['course_price']);
		$Sync['course_price'] = (float) str_replace(',', '.', $Sync['course_price']);	

		// Criando curso
		if($switch == 'create'):
			$Set = _set_data_table(TB_COURSES, $Sync);
			if($Set):
				$JSON['callback'] = '<script>';
				$JSON['callback'].= '$("#step-1").attr("class","legend");';
				$JSON['callback'].= '$("#step-2").attr("class","legend uk-open");';
				$JSON['callback'].= '$("input[id=switch-step-1]").val("update");';
				$JSON['callback'].= '$("button[data-submit=step-1]").html("Atualizar");';
				$JSON['callback'].= '</script>';
				$JSON['callback'].= _uikit_notification('Curso cadastrado com sucesso!', 'success', false);
				$JSON['type'] 	  = 'html';
			else:
				$JSON['callback'] = _uikit_notification('Não foi possível cadastrar o curso.', 'error', false);
			endif;
		
		// Atualizando curso
		elseif($switch == 'update'):
			$args = [
				'values' =>	$Sync,
				'where' => [ 'course_id' => $id ]
			];
			$Up = _up_data_table(TB_COURSES, $args);
			if($Up):
				$JSON['callback'] = '<script>';
				$JSON['callback'].= '$("#step-1").attr("class","legend");';
				$JSON['callback'].= '$("#step-2").attr("class","legend uk-open");';
				$JSON['callback'].= '</script>';
				$JSON['callback'].= _uikit_notification('Curso atualizado com sucesso!', 'success', false);
				$JSON['type'] 	  = 'html';
			else:
				$JSON['callback'] = _uikit_notification('Não foi possível atualizar informação!', 'error', false);	
			endif;
		endif;
		echo json_encode($JSON);
		break;
		
	/*******************************************************************************
	 * STEP 2 - CADASTRO DOS MÓDULOS DO CURSO
	 */
	case 'upcreate-step-2':
		// inicia as variaveis tratadas
		$course_id	= (int) $Sync['module_course_id'];
		$account 	= (int) $Sync['module_account_id'];
		$redirect 	= $Sync['redirect'];
		$switch		= $Sync['switch'];
		unset($Sync['redirect'], $Sync['switch']);
		$JSON['array'] = [];


		// Cria novo Módulo
		if($switch == 'create'):
			$Sync['module_course_id'] = (int) $Sync['module_course_id'];
			$Sync['module_account_id'] = (int) $Sync['module_account_id'];
			$Set = _set_data_table(TB_COURSE_MODULES, $Sync);
			if($Set):
				$JSON['callback'] = '<script>';
				$JSON['callback'].= 'UIkit.modal("#add-modules").toggle();';
				$JSON['callback'].= '$("#form-step-2").trigger("reset");';
				$JSON['callback'].= '</script>';
				$JSON['callback'].= _uikit_notification('Módulo cadastrado com sucesso!', 'success', false);
			else:
				$JSON['callback'] = _uikit_notification('Não foi possível cadastar Módulo!', 'error', false);	
			endif;

		// Atualiza módulo existente
		elseif($switch == 'update'):
			$module_id = (isset($Sync['module_id']))? $Sync['module_id'] : 0;
			$args = [
				'values' =>	$Sync,
				'where' => [ 
					'module_id' => $module_id , 
					'module_course_id' => $course_id, 
					'module_account_id' => $account
					]
				];
			$Up = _up_data_table(TB_COURSE_MODULES, $args);
			if($Up):
				$JSON['callback'] = '<script>';
				$JSON['callback'].= 'UIkit.modal("#add-modules").toggle();';
				$JSON['callback'].= '$("#form-step-2").trigger("reset");';
				$JSON['callback'].= '</script>';
				$JSON['callback'].= _uikit_notification('Módulo atualizado com sucesso!', 'success', false);
			else:
				$JSON['callback'] = _uikit_notification('Não foi possível atualizar Módulo!', 'error', false);	
			endif;
		endif;
		
		// Mostra os módulos atualizados na listagem
		$ListModules = _get_data_full(
			'SELECT * FROM `'.TB_COURSE_MODULES.'`
			WHERE `module_course_id` = '.$course_id.'
			ORDER BY `module_id` DESC
		');
		if($ListModules):
			$Select  = '';
			$Listing = '';
			foreach ($ListModules as $value):
				// Monta o Select
				$Select.= '<option value="'.$value['module_title'].'">'.$value['module_title'].'</option>';
				
				$Listing.= '<tr>';
				$Listing.= '<td>'.$value['module_title'].'</td>';
				$Listing.= '<td>'.$value['module_description'].'</td>';
				$Listing.= '<td>'.$value['module_level'].'</td>';
				$Listing.= '<td>links aqui</td>';
				$Listing.= '</tr>';

			endforeach;

			// Renderiza para o Select no cadastro de aulas
			$ArraySelect = [
				'element' => '#list-modules',
				'type'    => 'html',
				'content' => $Select
			];

			// Repoe na listagem dos Módulos
			$ArrayListing = [
				'element' => '#list-module-into-lessons',
				'type'	  => 'html',
				'content' => $Listing
			];

		endif;
		
		// Repoe a listagem de aulas atualizadas com os módulos
		$DistinctModule = _get_data_full(
			'SELECT DISTINCT `lesson_module_id` 
			FROM `'.TB_COURSE_LESSON.'`
			ORDER BY `lesson_module_id` DESC
			');
		if($DistinctModule):
			$Lessons = '';
			foreach ($DistinctModule as $Mod):
				
				// Pega o title do módulo
				$TitleModule = _get_data_table(TB_COURSE_MODULES, [ 'module_id' => $Mod['lesson_module_id'] ]);
				$TitleModule = ($TitleModule)? '<div class="module"><p>'.$TitleModule[0]['module_title'].'</p></div>' : '';
				$Lessons .= $TitleModule;

				$Aula = _get_data_full(
					'SELECT * FROM `'.TB_COURSE_LESSON.'`
					WHERE `lesson_module_id` = "'.$Mod['lesson_module_id'].'"
					ORDER BY `lesson_id` DESC
					');
				if($Aula):
					foreach ($Aula as $value):
						$Lessons.= '<div class="item" onclick="flex_crud_json(\'ead\',\'list-lessons\','.$value['lesson_id'].')">';
						$Lessons.= '<p class="float-left">'.$value['lesson_title'].'</p>';
						$Lessons.= '<span class="float-right">';
						$Lessons.= '<a class="btn btn-success btn-xsm" href="">Ver</a>';
						$Lessons.= '<a class="btn btn-primary btn-xsm" href="">Editar</a>';
						$Lessons.= '<a class="btn btn-danger btn-xsm" href="">Excluir</a>';
						$Lessons.= '</span>';
						$Lessons.= '</div>';
					endforeach;
				endif;
			endforeach;
			$ArrayLessons = [
				'element' => '#list-lessons',
				'content' => $Lessons
			];
		else:
			_MSG('Clique em adicionar aulas no botão acima', 'info', false);
			$ArrayLessons = '';
		endif;
		$JSON['array'] = [ $ArrayListing, $ArraySelect, $ArrayLessons ];
		echo json_encode($JSON);
		break;
	
	/*******************************************************************************
	 * STEP 3 - CADASTRO DAS AULAS REFERENTES AO ID DO CURSO QUE ESTÁ NA URL
	 */
	case 'upcreate-step-3':

		// Tratar as variaveis
		$redirect 	= $Sync['redirect'];
		$id 		= $Sync['course_id'];
		$account 	= $Sync['course_account_id'];
		$switch 	= $Sync['switch'];

		// Verifica se já existe o curso no banco de dados
		$verify = _get_data_table(TB_COURSES, ['course_id' => $id]);
		if($verify):

			$Days['seg'] = (isset($Sync['seg']))? $Sync['seg'] : ''; 
			$Days['ter'] = (isset($Sync['ter']))? $Sync['ter'] : ''; 
			$Days['qua'] = (isset($Sync['qua']))? $Sync['qua'] : ''; 
			$Days['qui'] = (isset($Sync['qui']))? $Sync['qui'] : ''; 
			$Days['sex'] = (isset($Sync['sex']))? $Sync['sex'] : ''; 
			array_filter($Days);
			
			$Sync['lesson_course_id'] = (int) $id;
			$Sync['lesson_option_values'] = json_encode([
				'lesson_type' => $Sync['lesson_type'],
				'lesson_duration' => $Sync['lesson_duration'],
				'lesson_modality' => $Sync['lesson_modality'],
				'lesson_days' => $Days
			]);
	
			// Inserindo no banco de dados
			if($switch == 'create'):
				unset($Sync['course_id'], $Sync['course_account_id'], $Sync['redirect'], $Sync['switch'],
					  $Sync['seg'], $Sync['ter'], $Sync['qua'], $Sync['qui'], $Sync['sex'], 
					  $Sync['lesson_type'],	$Sync['lesson_duration'], $Sync['lesson_modality']);
				
				$Set = _set_data_table(TB_COURSE_LESSON, $Sync);
				if($Set):
					$JSON['callback'] = _uikit_notification('Aula cadastrada com sucesso!', 'success', false);
					$JSON['callback'].= '<script>';
					$JSON['callback'].= 'UIkit.modal("#add-lesson").toggle();';
					$JSON['callback'].= '$("#form-step-3").trigger("reset");';
					$JSON['callback'].= '</script>';
				else:
					$JSON['callback'] = _uikit_notification('Não foi possível cadastrar aula!', 'error', false);
				endif;
				
			// Atualizando no banco de dados
			elseif($switch == 'update'):
				unset($Sync['redirect'], $Sync['course_id'], $Sync['course_account_id'], $Sync['switch'], 
					  $Sync['seg'], $Sync['ter'], $Sync['qua'], $Sync['qui'], $Sync['sex'], 
					  $Sync['lesson_type'], $Sync['lesson_duration'], $Sync['lesson_modality']);
				
				$args = [ 'values' => $Sync, 'where' => [ 'lesson_course_id' => $id ] ];
				$Up = _up_data_table(TB_COURSE_LESSON, $args);
				if($Up):
					$JSON['callback'] = _uikit_notification('Aula atualizada com sucesso!', 'success', false);
				else:
					$JSON['callback'] = _uikit_notification('Não foi possível atualizar aula!', 'error', false);
				endif;
				sleep(1);
			endif;

			$JSON['element']	= '#list-lessons';
			$JSON['type']		= 'html';
			$JSON['content']	= '';
			$DistinctModule = _get_data_full(
				'SELECT DISTINCT `lesson_parent_module` 
				FROM `'.TB_COURSE_LESSON.'`
				ORDER BY `lesson_parent_module` DESC
				');
			$i=0;
			if($DistinctModule):
				foreach ($DistinctModule as $Mod):
					$JSON['content'].= '<div class="module"><p>'.$Mod['lesson_parent_module'].'</p></div>';
					$Aula = _get_data_full(
						'SELECT * FROM `'.TB_COURSE_LESSON.'`
						WHERE `lesson_parent_module` = "'.$Mod['lesson_parent_module'].'"
						ORDER BY `lesson_id` DESC
						');                                  
					if($Aula):
						foreach ($Aula as $key => $value):
							$JSON['content'].= '<div class="item" onclick="flex_crud_json(\'ead\',\'list-lessons\','.$value['lesson_id'].')">';
							$JSON['content'].= '<p class="float-left">'.$value['lesson_title'].'</p>';
							$JSON['content'].= '<span class="float-right">';
							$JSON['content'].= '<a class="btn btn-success btn-xsm" href="">Ver</a>';
							$JSON['content'].= '<a class="btn btn-primary btn-xsm" href="">Editar</a>';
							$JSON['content'].= '<a class="btn btn-danger btn-xsm" href="">Excluir</a>';
							$JSON['content'].= '</span>';
							$JSON['content'].= '</div>';
						endforeach;
					endif;
				$i++;
				endforeach;
			else:
				_MSG('Clique no botão abaixo e começe a cadastrar suas aulas','info');
			endif;
		else:
			$JSON['callback'] = _uikit_notification('Cadastre as informações do curso primeiro, isso ajudará e se organizar melhor', 'error', false);
			$JSON['callback'].= '<script>';
			$JSON['callback'].= '$("#step-3").attr("class","legend");';
			$JSON['callback'].= '$("#step-1").attr("class","legend uk-open");';
			$JSON['callback'].= 'UIkit.modal("#add-lesson").toggle();';
			$JSON['callback'].= '</script>';
		endif;

		echo json_encode($JSON);
		break;

	/*******************************************************************************
	 * LISTAGEM DOS EXERCÍCIOS APÓS CLICAR NA AULA
	 */
	case 'list-lessons':
		if($Sync['id']):
			$Exercises = _get_data_table(TB_COURSE_SUB_LESSON, ['sub_lesson_id' => $Sync['id']]);
			$JSON['element'] = '#listing-exercises';
			$JSON['content'] = '';
			if($Exercises):
				foreach ($Exercises as $value):				
					$JSON['content'].= '<div class="item ">';
					$JSON['content'].= '<p class="float-left">'.$value['sub_title'].'</p>';
					$JSON['content'].= '<span class="float-right">';
					$JSON['content'].= '<a class="uk-button-primary btn-xsm" href="">Ver</a>';
					$JSON['content'].= '<a class="uk-button-primary btn-xsm" href="">Editar</a>';
					$JSON['content'].= '<a class="uk-button-primary btn-xsm" href="">Excluir</a>';
					$JSON['content'].= '</span>';
					$JSON['content'].= '</div>';
				$i++;
				endforeach;
				$JSON['content'].= '<a href="#" class="btn btn-primary" style="font-size: 13px; padding: 5px; width: 100%;" uk-toggle="target: #create-exercises" onclick="create_data_sublesson(\'ead\',\'upcreate-sub-lesson\','.$Sync['id'].')">Adicionar Exercício</a>';
			else:
				$JSON['content'] = '<a href="#" class="btn btn-primary" style="font-size: 13px; padding: 5px; width: 100%;" uk-toggle="target: #create-exercises" onclick="create_data_sublesson(\'ead\',\'upcreate-sub-lesson\','.$Sync['id'].')">Adicionar Exercício</a>';
				// $JSON['content'] .= _MSG('Selecione uma aula antes de cadastrar seu exercícios','info', false);			
				$JSON['callback'] = _uikit_notification('Nenhum exercício para essa aula', 'info', false);
			endif;
		else:
			$JSON['callback'] = _uikit_notification('Erro interno [#case list-lessons]', 'error', false);
		endif;
		// var_dump($JSON);
		echo json_encode($JSON);
		break;

	/*******************************************************************************
	 * BUSCA DE AULAS COM EVENTO KEYPRESS NO 3 ACORDEON DO CADASTRO
	 */
	case 'search-list-lessons':
		$ListLessons = _get_data_full(
			'SELECT * FROM `'.TB_COURSE_LESSON.'` 
			WHERE `lesson_title` 
			LIKE "%'.$Sync['search'].'%"
			ORDER BY `lesson_id` DESC
			');
		if($ListLessons):
			$JSON['element']	= '#list-lessons';
			$JSON['type']		= 'html';
			$JSON['content']	= '';
			foreach ($ListLessons as $key => $value):
				$JSON['content'].= '<div class="item"onclick="flex_crud_json(\'ead\',\'list-lessons\','.$value['lesson_id'].')">';
				$JSON['content'].= '<p class="float-left">'.$value['lesson_title'].'</p>';
				$JSON['content'].= '<span class="float-right">';
				$JSON['content'].= '<a class="btn btn-success btn-xsm" href="">Ver</a>';
				$JSON['content'].= '<a class="btn btn-primary btn-xsm" href="">Editar</a>';
				$JSON['content'].= '<a class="btn btn-danger btn-xsm" href="">Excluir</a>';
				$JSON['content'].= '</span>';
				$JSON['content'].= '</div>';
			endforeach;
		else:
			$JSON['content'] = '';
		endif;
		echo json_encode($JSON);
		break;

	/*******************************************************************************
	 * CADASTRA O EXERCÍCIO DE ACORDO COM A AULA ESCOLHIDA NA LATERAL DIREITA
	 */
	case 'upcreate-sub-lesson':
		$redirect 	= $Sync['redirect'];
		$id 		= $Sync['lesson_id'];
		$account 	= $Sync['account_id'];
		
		$Sync['sub_lesson_id'] = $Sync['lesson_id'];
		$Sync['sub_option_values'] = json_encode([
			'sub_modality' => $Sync['sub_option_values[sub_lesson_modality]'],
			'sub_video' => $Sync['sub_option_values[sub_lesson_video]']
			// 'sub_lesson_images' => $Sync['sub_option_values[sub_lesson_images]']
			]);

		unset(
			$Sync['lesson_id'],
			$Sync['account_id'],
			$Sync['redirect'],
			$Sync['sub_option_values[sub_lesson_modality]'],
			$Sync['sub_option_values[sub_lesson_video]']
		);

		// var_dump($Sync);
		$Set = _set_data_table(TB_COURSE_SUB_LESSON, $Sync);
		if($Set):
			usleep(1000);
			
			$Get = _get_data_table(TB_COURSE_SUB_LESSON, [ 'sub_lesson_id'=> $id ]);
			if($Get):
				// var_dump($Get);
				$s = 0;
				$JSON['element'] = '#listing-exercises';
				$JSON['content'] = '';
				foreach ($Get as $key => $value):
					$JSON['content'].= '<div class="item ">';
					$JSON['content'].= '<p class="float-left">'.$value['sub_title'].'</p>';
					$JSON['content'].= '<span class="float-right">';
					$JSON['content'].= '<a class="uk-button-primary btn-xsm" href="">Ver</a>';
					$JSON['content'].= '<a class="uk-button-primary btn-xsm" href="">Editar</a>';
					$JSON['content'].= '<a class="uk-button-primary btn-xsm" href="">Excluir</a>';
					$JSON['content'].= '</span>';
					$JSON['content'].= '</div>';
				$s++;
				endforeach;
				$JSON['content'].= '<a href="#" class="btn btn-primary" style="font-size: 13px; padding: 5px; width: 100%;" uk-toggle="target: #create-exercises" onclick="create_data_sublesson(\'ead\',\'upcreate-sub-lesson\','.$id.')">Adicionar Exercício</a>';
			endif;
			$JSON['callback'] = '<script>';	
			$JSON['callback'].= 'UIkit.modal("#create-exercises").toggle();';
			$JSON['callback'].= '$("#form-step-4").trigger("reset");';
			$JSON['callback'].= '</script>';
			$JSON['callback'].= _uikit_notification('Exercício cadastrado com sucesso!', 'success', false);
		else:
			$JSON['callback'] = _uikit_notification('Não foi possível cadastrar aula!', 'error', false);
		endif;
		echo json_encode($JSON);
		break;


	



	case 'action-teste':
		$teste = 'show entrou em action-teste';
		echo json_encode($teste);
		break;




































	/*******************************************************************************
	 * DELETA CURSO DIRETO DA LISTAGEM
	 */
	case 'course-delete':
		if(isset($Sync['id'])):
		    $del = _del_data_table(TB_LOGISTICS_COMEX, [ 'comex_id' => (int) $Sync['id'] ]);
			if($del):	
				_uikit_notification('Processo excluido com sucesso!', 'success');
				echo "<script>setTimeout(function(){
	   					window.location.href='".$_Module['ACTION_MODULE']."process-list';
					 }, 1000);
					 </script>";
			else:
				_uikit_notification('Não foi possível excluir o processo', 'error'); 
			endif;
		endif;
		break;


	/*******************************************************************************
	 * BUSCA DE CURSOS 
	 */
	case 'course-search':
		unset($Data['module']);
		unset($Data['action']);
		unset($Data['alldata'][0]);
		unset($Data['alldata'][1]);

		$Term = (array) trim($Data['alldata'][2]['value']);
		$Term = http_build_query($Term);
		$Term = str_replace('0=', '', $Term);

		echo "<script>window.location.href='".$_Module['ACTION_MODULE']."client-search&search=".$Term."'</script>";
		break;


endswitch;