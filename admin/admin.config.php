<?php
/**
 * Arquivo de configuração base do painel administrativo
 * @copyright Felipe Oliveira - 05.01.2022
 */

// Tempo de sessão em minutos
define('ADMIN_TIME_SESSION', 180);          
// Nível máximo permitido dos usuário
define('ADMIN_LEVEL_PERMISSION', 7);        
// Configura projetos onde o usuário necessita completar cadastro
define('ACCOUNT_COMPLETE_ENABLE', true);    
// Rota de entrada. Essa é a rota que o usuário verá após realizar o login
define('ADMIN_ROUTE_INIT', '');
// Habilitar Rota "completar o cadastro"
define('ACCOUNT_COMPLETE_BOOL', false);
// Campos exigidos para completar conta de usuário. Funcional apenas se "ACCOUNT_COMPLETE_BOOL" for true
define('FIELDS_AUTOCOMPLETE', [
    'account_lastname',
    'account_phone',
    'account_cover'
]);

$Extra['SESSION_ID'] = (isset($_SESSION['account_id']))? $_SESSION['account_id'] : '';

/**
 * Controladora
 */
if(ACCOUNT_COMPLETE_BOOL){
    $Def = new Accounts\Check($_SESSION['account_email']);
    define( 'ACCOUNT_COMPLETE' , $Def = $Def->Fields(FIELDS_AUTOCOMPLETE));
}


// Retorna se TRUE ou FALSE
// if(ACCOUNT_COMPLETE_ENABLE && $_SESSION['account_level'] <= 8){
//     $Account = new Accounts\Check($_SESSION['account_email']);
//     $Check = $Account->Fields([
//         'account_plan',
//         'account_lastname',
//         'account_phone',
//         'account_cover',
//         'account_url'
//     ]);
//     if($Check['bool'] == false){
//         define('ACCOUNT_COMPLETE', false);
//     }else{
//         define('ACCOUNT_COMPLETE', true);
//     }
// }else{
//     define('ACCOUNT_COMPLETE', true);
// }
