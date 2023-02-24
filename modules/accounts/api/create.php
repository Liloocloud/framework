<?php
/**
 * Método que cria uma nova conta de usuário com pelo meno o e-mail sendo obrigatório
 * @copyright Felipe Oliveira - 11.04.2021
 * @version 1.0.2
 */

$Params = [
    // Requer parametros na requisição. Valida a var global $_REQUEST
    'request_void'  => false,
    // Requer autenticação com usuário e senha na header da requisição
    'authorization' => true,
    // Indica o método que está esperando 
    'method'        => 'POST'
];
require_once './check.modules.php';

// Entrega de dados
$JSON = [
	"output"    => _get_data_table(TB_ACCOUNTS),
	"bool"      => true,
	"message"   => "Conta de usuário criada com sucesso"
];
// $JSON['json'] = $Sync;
// $JSON['entities'] = _get_data_table(TB_ACCOUNT_ENTITIES);

var_dump($Sync);
exit;
if (filter_var($Sync['account_email'], FILTER_VALIDATE_EMAIL)) {



    // Verificar se a conta já existe
    $Account = new \Account\Account;
    $Account->email($Sync['account_email']);
    if (!$Account->checkAccount()) {
        $Sync['account_coin'] = (int) $Sync['account_coin'];
        $Sync['account_status'] = (int) $Sync['account_status'];
        $Sync['account_level'] = (int) $Sync['account_level'];

        $Generator = 'v' . bin2hex(random_bytes(3));
        $Sync['account_password'] = $Account->passGenerator($Generator);
        // Criar usuário já ativo, sem a necessidade de validação
        $Set = _set_data_table(TB_ACCOUNTS, $Sync);
        if ($Set) {
            // Enviar um email com a senha para o novo usuário
            $email = new Email\Email();
            $email->add(
                'Sua senha de acesso a plataforma ' . SITE_NAME,
                "
                <h3>
                Login: {$Sync['account_email']}<br>
                Senha: {$Generator}
                </h3>
                <a href='" . BASE . "login/'>" . BASE . "login/</a>
                <p>Caso ocorra algum problema, entre em contato conosco para que possamos te ajudar</p>
                ",
                $Sync['account_name'],
                $Sync['account_email']
            );
            if ($email->send()) {

                $JSON['callback'] = '<script>UIkit.modal("#modal-overflow").hide();</script>';
                $JSON['callback'] .= _uikit_notification('Conta criada com sucesso! A senha criada é ' . $Generator, 'success', false);
                $JSON['callback'] .= '<script>setTimeout(function(){ window.location.href="' . BASE_ADMIN . '_account/update-account/" }, 1400)</script>';
            } else {
                $JSON['array'][0] = [
                    'element' => '.callback-alert', 'content' =>
                    _uikit_alert('Não foi possível disparar e-mail. A senha criada é ' . $Generator, 'error', false)
                ];
            }
        } else {
            $JSON['array'][0] = [
                'element' => '.callback-alert', 'content' =>
                _uikit_alert('Não foi possível criar usuário. Tente novamente.', 'error', false)
            ];
        }
    } else {
        $JSON['array'][0] = [
            'element' => '.callback-alert', 'content' =>
            _uikit_alert('Este email já possui conta.', 'info', false)
        ];
    }
} else {
    $JSON['array'][0] = [
        'element' => '.callback-alert', 'content' =>
        _uikit_alert('Digite um e-mail válido.', 'error', false)
    ];
}