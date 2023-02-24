<?php
/**
 * Arquivo Responsável gerenciar as Ações de Pagamento
 * @copyright Felipe Oliveira 15.07.2020
 * @version 1.0.0
 */
// header('Access-Control-Allow-Origin: *');
require_once "../../../_Kernel/___Kernel.php";
require_once "../__fun.module.php";
require_once "../presets.php";
require_once "../../../_Kernel/_Sync.inout.php";

/** 
 * ATENÇÃO:
 * Checar o usuário que está fazendo a alteração 
 * permitindo apenas level 11, sendo assim
 * é necessário estar Logado
 */
$User = (isset($_SESSION) && $_SESSION['account_level'] >= 10)? true : false;


switch ($Action):


	/****************************************************************************
	 * ROTINA QUE HABILITA CONFIGURAÇÕES DO TIPO BOOL PARA TRUE
	 */
	case 'config_enable_type_bool':
	if($User){
		$Up = _up_data_table(TB_CONFIGS, [
			'where' => [ 'config_id' => (int) $Sync['array'] ],
			'values' => [ 'config_value' => 'true' ]
		]);
		if($Up){
			$JSON['callback'] = '<script>SuperFlex.btnEnable('.$Sync['array'].')</script>';
		}else{
			$JSON['callback'] = _uikit_notification('Não foi possível ativar configuração. Tente novamente', 'info', false);
		}
	}else{
		$JSON['callback'] = 'Usuário sem permissão para acessar este conteúdo';
	}
	break;


	/****************************************************************************
	 * ROTINA QUE HABILITA CONFIGURAÇÕES DO TIPO BOOL PARA FALSE
	 */
	case 'config_desable_type_bool':
	if($User){
		$Up = _up_data_table(TB_CONFIGS, [
			'where' => [ 'config_id' => (int) $Sync['array'] ],
			'values' => [ 'config_value' => 'false' ]
		]);
		if($Up){
			$JSON['callback'] = '<script>SuperFlex.btnDesable('.$Sync['array'].')</script>';
		}else{
			$JSON['callback'] = _uikit_notification('Não foi possível desativar configuração. Tente novamente', 'info', false);
		}
	}else{
		$JSON['callback'] = 'Usuário sem permissão para acessar este conteúdo';
	}
	break;


	/****************************************************************************
	 * TROCA O CAMINHO DE UMA CONFIGURAÇÃO ESPECÍFICA NAS CONFIGURAÇÕES
	 */
	case 'config_type_url':
	if($User){
		$Up = _up_data_table(TB_CONFIGS, [
			'where' => [ 'config_id' => (int) $Sync['config_id'] ],
			'values' => [ 'config_value' => $Sync['config_value'] ]
		]);
		if($Up){
			$JSON['callback'] = _uikit_notification('URL atualizada com sucesso. Tente novamente', 'success', false);
		}else{
			$JSON['callback'] = _uikit_notification('Não foi possível desativar configuração. Tente novamente', 'info', false);
		}
	}else{
		$JSON['callback'] = 'Usuário sem permissão para acessar este conteúdo';
	}
	break;

endswitch;
if($JSON!=null)
	echo json_encode($JSON);