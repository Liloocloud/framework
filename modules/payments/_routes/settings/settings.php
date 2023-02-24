<?php
/**
 * Controladora da Rota de configurações do módulo de pagamento
 * @copyright Felipe Oliveira Lourenço - 20.07.2020
 * @version 1.0.0
 */

if(isset($_SESSION['account_level']) && $_SESSION['account_level'] >= 11){

	$Configs = _get_data_table(TB_CONFIGS);
	$Configs = (isset($Configs))? $Configs : false;
	if($Configs){

		$Extra = [
			'base' => BASE,
			'base_module' => BASE_MODULES.'payment/'
		];
		$node1 = ElementMount(
			"\[node1\]",
			"\[\/node1\]", 
			file_get_contents($_Module['THIS_MODULE'].'_routes/settings/settings.tpl')
		);
		_tpl_fill($node1['before'], $Extra, '');
		foreach ($Configs as $key => $Data) {
			
			// Povoando os Recuros de Configuração
			switch ($Data['config_type']) {
				
				// CONST DO TIPO BOOL
				case 'bool':
				if($Data['config_value'] === 'true'){
					
					$Extra['output'] = '<a href="#" id="desable-'.$Data['config_id'].'" onclick="SuperFlex.desable('.$Data['config_id'].')" class="uk-button uk-button-primary uk-button-small">Desativar</a>';
					
					$Extra['output'].= '<a href="#" id="enable-'.$Data['config_id'].'" onclick="SuperFlex.enable('.$Data['config_id'].')" class="uk-button uk-button-default uk-button-small" style="display: none;">Ativar</a>';
				
				}elseif ($Data['config_value'] === 'false') {
					
					$Extra['output'] = '<a href="#" id="desable-'.$Data['config_id'].'" onclick="SuperFlex.desable('.$Data['config_id'].')" class="uk-button uk-button-primary uk-button-small" style="display: none;">Desativar</a>';
					
					$Extra['output'].= '<a href="#" id="enable-'.$Data['config_id'].'" onclick="SuperFlex.enable('.$Data['config_id'].')" class="uk-button uk-button-default uk-button-small">Ativar</a>';
				}
				break;

				// CONST DO TIPO URL (RETORNA UMA URL)
				case 'url':
				$Extra['output'] = '<form data-custom autocomplete="off">';
				$Extra['output'].= '<input type="hidden" name="action" value="config_type_url">';
				$Extra['output'].= '<input type="hidden" name="custom-url" value="_Modules/payment/_php/ManagerPaymentConfig">';
				$Extra['output'].= '<input type="hidden" name="config_id" value="'.$Data['config_id'].'">';
				$Extra['output'].= '<input type="text" class="uk-input uk-form-small" name="config_value" value="'.$Data['config_value'].'">';
				$Extra['output'].= '<button type="submit" class="uk-margin-small-top uk-button uk-button-primary uk-button-small">Atualizar</button>';
				$Extra['output'].= '</form>';
				break;
			}

			_tpl_fill($node1['content'], $Extra, $Data);
		}
		_tpl_fill($node1['after'], $Extra, '');

	}else{
		echo 'Nenhum produto foi cadastrado.';
	}

}else{
	_ERROR('Você não tem permissão para acessar este módulo', 'error');
}