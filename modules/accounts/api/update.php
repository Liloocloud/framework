<?php
/**
 * [WIDGET]
 * ATUALIZAÇÃO DE CONTA DE USUÁRIO
 * @copyright Felipe Olivera Lourenço - 20.04.2021
 * @version 1.0.0
 */

$Sync['account_id'] = (int) $Sync['account_id'];
$Sync['account_level'] = (int) $Sync['account_level'];
$Sync['account_coin'] = (int) $Sync['account_coin'];
$Sync['account_status'] = (int) $Sync['account_status'];
$ID = $Sync['account_id'];
unset($Sync['account_id']);
if (_up_data_table(TB_ACCOUNTS, [
    'where' => ['account_id' => $ID],
    'values' => $Sync
])) {
    $JSON['notify'] = ['Conta atualizada com sucesso!', 'success'];
    // $JSON['callback'] = '<script>setTimeout(function(){ window.location.href="'.BASE.'console/accounts/manager/" }, 1400)</script>';
} else {
    $JSON['notify'] = ['Não foi possível atualizar. Tente novamente.', 'error'];
}
