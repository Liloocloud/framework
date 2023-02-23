<?php
/**
 * Gerencia Todas as Operações da Dashboard como:
 * Relatório e estatísticas, gestão de busca na dashboard,
 * Gráficos e outras tarefas pertinentes ao painel de controle
 * Apresentação de conteúdo de páginas
 * 
 * @copyright Felipe Oliveira 01.05.2020
 * @version 1.0
 *
 * @see 'company_verify_perfil_complete'		[Verifica se o usuário finalizaou seu cadastro]
 */
 
require_once "../../../_Kernel/___Kernel.php";
require_once "../__config.frontend.php";
require_once "../presets/presets.php";
require_once "../../../_Kernel/_Sync.inout.php";

switch ($Action):


	/****************************************************************************
	 * VERIFICAR SE O USUÁRIO COMPLETOU O CADASTRO COM AS DEMAIS 
	 * INFORMAÇÃO DA TB COMPANY
	 */
	case 'company_verify_perfil_complete':
		break;


endswitch;
if($JSON!=null)
	echo json_encode($JSON);