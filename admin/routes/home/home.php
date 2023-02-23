<?php
// Se o usuário não completou o cadastro
// if(ACCOUNT_COMPLETE == false){
//     header('Location: '.BASE_ADMIN.'accounts/complete/');
// }


//**********************


// Card para propagandas
// Setor de notificações
// Indique um amigo

// Ultimos acessos no site (sessão) + link para o analytics
$Session = _get_data_full(
    "SELECT COUNT(contact_id) AS Total FROM " . TB_MKT_CONTACTS . " 
    WHERE contact_method = 'session' 
    AND contact_account_id = {$_SESSION['account_id']}  
    AND contact_registered >= DATE_SUB(NOW(), INTERVAL 7 DAY)
");
$Extra['session_total'] = (isset($Session[0]['Total']))? $Session[0]['Total'] : 0;


//**********************


// Total de clientes cadastrados + link para o modulo clientes
$Client = _get_data_full(
    "SELECT COUNT(client_id) AS Total FROM " . TB_CLIENTS . " 
    WHERE client_account_id = {$_SESSION['account_id']}
");
$Extra['client_total'] = (isset($Client[0]['Total']))? $Client[0]['Total'] : 0;


//**********************


// Total de campanhas + link para a rota
$Camp = _get_data_full(
    "SELECT COUNT(camp_id) AS Total FROM " . TB_MKT_CAMPAIGNS . " 
    WHERE camp_account_id = {$_SESSION['account_id']}
    AND camp_ative = 1
");
$Extra['camp_total'] = (isset($Camp[0]['Total']))? $Camp[0]['Total'] : 0;




_tpl_fill(ROOT_ADMIN_ROUTES.'home/home.tpl', $Extra, '');