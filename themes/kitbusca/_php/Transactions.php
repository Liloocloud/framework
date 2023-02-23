<?php
/**
 * Controle de informações de pagamento e etc (Trabalhar abstraindo a class 
 * nativa de pagamento)
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

	

endswitch;
if($JSON!=null)
	echo json_encode($JSON);