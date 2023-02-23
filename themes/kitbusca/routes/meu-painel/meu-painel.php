<?php
/**
 * Painel de controle do Anunciante dashboard do tema
 * @copyright Felipe Oliveira Lourenço - 01.04.2020
 */

// INICIA A INSTANCIA DA CLASS TPL
$Tpl = new Templates;

// CONTROLE DA SESSÃO
$Session = new Account;
$Session->checkSession();

// PATH
$PATH_DASH = PATH_THEME.ROUTES.'meu-painel/';
$BASE_DASH = BASE.'meu-painel/';

if(!empty($_SESSION) AND isset($_SESSION['account_level'])):
	if($_SESSION['account_level'] >= 8 ):

		#################### DISPONÍVEL NO ESCOPO DA DASHBOARD ###################

		// PEGAS AS INFORMAÇÕES DA EMPRESA CADASTRADA
		$Company = _get_data_full("
			SELECT * FROM `".TB_ACCOUNTS."` INNER JOIN 
			`".TB_SMART_COMPANIES."` ON 
			".TB_ACCOUNTS.".account_id = ".TB_SMART_COMPANIES.".company_account_id 
			WHERE `company_account_id` =:a","a={$_SESSION['account_id']}");
		$Company = (isset($Company[0]))? $Company[0] : [];

		// PEGA OS DADOS DA CONTA DE USUÁRIO
		// $Account = _get_data_table(TB_ACCOUNTS, ['account_id' => $_SESSION['account_id'] ]);
		// $Account = (isset($Account[0]))? $Account[0] : [] ;


		// MONTA A BUSCA PELO IDS DE SERVIÇOS
		if(isset($Company['company_services_id'])):
			$SubCategories = '';
			foreach (explode(',',$Company['company_services_id']) as $Subs):
				$SubCategories.= "'{$Subs}',";
			endforeach;
			$SubCategories = substr($SubCategories, 0, -1);
		else:
			$SubCategories = '';
		endif;

		##########################################################################

		// INICIANDO A VARIÁVEL $_Adds
		$_Adds = [
			'logo_medium' 		=> SITE_LOGO_MEDIUM,
			'logo_mono' 		=> SITE_LOGO_MONO,
			'base' 				=> BASE,
			'uploads'			=> BASE_UPLOADS,
			'base_adm'			=> $BASE_DASH,
			'href_disponiveis' 	=> $BASE_DASH.'orcamentos/',
			'href_aceitos' 		=> $BASE_DASH.'aceitos/',
			'href_favoritos' 	=> $BASE_DASH.'favoritos/',
			'href_rejeitados' 	=> $BASE_DASH.'rejeitados/'
		];

		// PAINEL DAS MOEDAS
		if($Company):
			$_Adds['account_coin'] 	= $Company['account_coin'];
			$_Adds['href_coin'] 	= BASE.'meu-painel/shop/';
		else:
			//echo '<a href="#" class="uk-button uk-button-primary uk-width-1-1">Comprar Moedas</a>';
		endif;

		// LINK ATIVO PARA IDENTIFICAÇÃO DE PÁGINA
		switch ((isset(URL()[1]))? URL()[1] : ''){
			case 'orcamentos': 	$_Adds['link_active_disponiveis'] = 'class="uk-active"'; break;
			case 'aceitos': 	$_Adds['link_active_aceitos'] = 'class="uk-active"'; break;
			case 'favoritos': 	$_Adds['link_active_favoritos'] = 'class="uk-active"'; break;
			case 'rejeitados': 	$_Adds['link_active_rejeitados'] = 'class="uk-active"'; break;
		}

		$_Adds = array_merge($_Adds, $Company);

		######################### POVOANDO TPL #########################
		// MENU TOP
		_tpl_fill($PATH_DASH.'tpl/navbar.tpl', '', $_Adds);
		// UTILIZANDO OS NÓS DA TPL
		$node1 = ElementMount(
			"\[node1\]",
			"\[\/node1\]", 
			file_get_contents($PATH_DASH.'meu-painel.tpl')
		);
		
		// BEFORE PAGE
		_tpl_fill($node1['before'],'',$_Adds);
		// VERIFICAR SE O USUÁRIO COMPLETOU O CADASTRO
		$Complete = new Companies($_SESSION['account_id']);
		$CheckCompany = $Complete->checkCompany()[1];
		$CompleteCompany = $Complete->companyComplete([
			'company_groups_id',
			'company_zipcode',
			'company_state',
			'company_city',
			'company_district'
		])[1];
		if($CheckCompany AND $CompleteCompany){
			// PAGES
			if(isset(URL()[1]) and URL()[1] != '' ){               			
				if(file_exists($PATH_DASH.'routes/'.URL()[1].'/'.URL()[1].".php")){
					require_once $PATH_DASH.'routes/'.URL()[1].'/'.URL()[1].".php";    
				}else{
					require_once $PATH_DASH.'routes/404/404.php';
				}
			}else{
				require_once $PATH_DASH.'routes/inicial/inicial.php';
			}
		}else{
			$Complete->createCompaniesDB();
			require_once $PATH_DASH.'routes/completando-cadastro/completando-cadastro.php';
		}			
		
		// AFTER PAGE
		_tpl_fill($node1['after'],'',$_Adds);

	################################################################
	else:
		$Tpl->TemplatePart($PATH_DASH.'tpl/view_nopermission.tpl');
	endif;
else:
	$Tpl->TemplatePart($PATH_DASH.'tpl/view_nopermission.tpl');
endif;