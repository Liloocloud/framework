<?php
/**
 * Gerencia Todas as informações das Empresas Cadastradas
 * Manipular os disponíveis, rejeitados, favotitos, aceitos e etc
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
	 * BOTÃO "DESBLOQUEAR CONTATO". O CASE VERIFICA SE O SALDO DE MOEDAS NA
	 * CONTA DO USUÁRIO É O SUFICIENTE E REDIRECIONA PARA OS DEVIDOS LUGARES
	 */
	case 'budget_coins_verify':
		$Sync['array'] 	= explode(',', $Sync['array']);
		$budget_id 		= $Sync['array'][0];
		$budget_coin 	= $Sync['array'][1]; 
		$account_id 	= $Sync['array'][2];
		$Coins = new Budgets($budget_id, $account_id);
		$Coins = $Coins->accountCoins();
 		if($Coins):
 			if( ($Coins - (int) $budget_coin ) >= 0 ): // SALDO SUFICIENTE
				$JSON['callback'] = '<script>UIkit.modal("#modal-coins_'.$budget_id.'", {stack: true} ).show()</script>';
 			else: // SALDO INSUFICIENTE
				$JSON['callback'] = '<script>UIkit.modal("#modal-coins-none_'.$budget_id.'", {stack: true} ).show()</script>';
 			endif;
 		else: // NÃO TEM MOEDAS
			$JSON['callback'] = '<script>UIkit.modal("#modal-coins-none_'.$budget_id.'", {stack: true} ).show()</script>';
 		endif;
		break;

	/****************************************************************************
	 * APÓS CLICADO EM DESBLOQUEAR CONTATO, CASO NÃO TENHA MOEDAS
	 * A CASE É RESPONSÁVEL POR FAVORITAR O CONTATO, REDIRECIONAR PARA O SHOP 
	 * E RETIRAR O ID DA CONTA DOS REJEITADOS
	 */
	case 'budget_salve_favorites':
		$budget_id  = explode(',', $Sync['array'])[0];
		$account_id = explode(',', $Sync['array'])[1];
		$Bud = new Budgets($budget_id, $account_id);
		if($Bud->Results()):
			$Bud->rejectedRemoveID();
			$Bud->favoritesIncludeID();
			$JSON['callback'] = __redirectURL('meu-painel/shop/?m=salve-favorites');
		else:
			$JSON['console'] = 'Erro ao conectar com o banco';
		endif;
		break;

	/****************************************************************************
	 * CLICA NO BOTÃO PARA FAVORITAR ORÇAMENTO
	 */
	case 'budget_button_favorites':
		$budget_id  = explode(',', $Sync['array'])[0];
		$account_id = explode(',', $Sync['array'])[1];
		$Bud = new Budgets($budget_id, $account_id);
		if($Bud->Results()):
			$Bud->rejectedRemoveID();
			$Bud->favoritesIncludeID();
			$JSON['callback'] = __redirectURL('meu-painel/favoritos/');
		else:
			$JSON['console'] = 'Erro ao conectar com o banco';
		endif;
		break;

	/****************************************************************************
	 * REJEITA O ORÇAMENTO INCLUINDO O BUDGET_ID NA COLUNA
	 * BUDGET_REJECTED DA TABELA TB_SMART_BUDGETS
	 */
	case 'budget_salve_rejected':
		$budget_id  = explode(',',$Sync['array'])[0];
		$account_id = explode(',',$Sync['array'])[1];
		$Bud = new Budgets($budget_id, $account_id);
		if($Bud->Results()):
			$Bud->favoritesRemoveID();
			$Bud->rejectedIncludeID();
			$JSON['callback'] = '<script>';
			$JSON['callback'].= 'UIkit.modal("#_'.$budget_id.'").hide();';
			$JSON['callback'].= 'window.setTimeout(function(){ Flex.RemoveElementDOM("#item-'.$budget_id.'") }, 1000);';
			$JSON['callback'].= 'window.setTimeout(function(){ window.location.href="'.BASE.'meu-painel/orcamentos/?m=add-rejected" }, 1000);';
			$JSON['callback'].= '</script>';
		else:
			$JSON['console'] = 'Erro ao conectar com o banco';
		endif;
		break;

	/****************************************************************************
	 * CONFIRMARÇÃO DE DESBLOUEIO DO CONTATO APÓS APRESENTAÇÃO DA MODAL ABERTA
	 * PELO CASE ACIMA "BUDGET_ACCEPTED"
	 */
	case 'budget_accepted_confirm':
		$Sync['array'] 	= explode(',', $Sync['array']);
		$budget_id 		= $Sync['array'][0];
		$budget_coin 	= $Sync['array'][1]; 
		$company_id 	= $Sync['array'][2];
		$account_id 	= $Sync['array'][3];
		unset($Sync['array']);	
		// Instancia as class Necessárias
		$Budget = new Budgets($budget_id, $account_id);
		$Coins = new Coins;
		$Coins->accountID($account_id);
		// Se ainda não foi aceito
		if(!$Budget->checkAccepted()[1]):
			// Prepara a Sync
			$Sync['accepted_budget_id'] 	= $budget_id;
			$Sync['accepted_account_id']	= $account_id;
			$Sync['accepted_coins']			= $budget_coin;
			$Sync['accepted_ip']			= _get_client_ip();
			//$Sync['accepted_status']		= 'accepted';
			$Set = _set_data_table(TB_SMART_BUDGET_ACCEPTED, $Sync);
			if($Set):
				// Incluir o ID em companies ( se true continua... )
				$Budget = new Budgets($budget_id, $account_id);
				if($Budget->companiesIncludeID()[1]):
					// Subtrai o Numero de moedas ( se true continua... )
					if($Coins->subtractCoins($budget_coin)[1]):
						// Retira dos rejeitados
						$Budget->rejectedRemoveID();
						// Retira dos favoritos
						$Budget->favoritesRemoveID();
						// Envia um email de notificação de compra
						sleep(0.7);
						$Email = new Email();
						$Email->add(
							'Contato Desbloqueado',
							_tpl_fill(PATH_THEME.'tpl/email/desbloqueio-de-orcamento.tpl' , [], '', false),
							$_SESSION['account_name'],
							$_SESSION['account_email']
						)->send();						
						// Redireciona para lista  aceitos ( Fim )
						$JSON['callback'] = __redirectURL('meu-painel/aceitos/?m=accepted-yes');
					else:
						// Erro ao debitar moedas
						$JSON['callback'] = __redirectURL('meu-painel/aceitos/?m=error001');
					endif;
				else:
					// Não foi possível aceitar
					$JSON['callback'] = __redirectURL('meu-painel/aceitos/?m=accepted-invalid');
				endif;
			else:
				// Não conseguiu inserir
				$JSON['callback'] = __redirectURL('meu-painel/aceitos/?m=error001');
			endif;
		else:
			// Orçamento já foi aceito
			$JSON['callback'] = __redirectURL('meu-painel/aceitos/?m=accepted-invalid');
		endif;
		break;

endswitch;
if($JSON!=null)
	echo json_encode($JSON);