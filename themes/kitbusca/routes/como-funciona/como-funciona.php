<?php
/**
 * Controladora da página Como funciona do tema Vamove
 * @copyright Felipe Oliveira Lourenço - 01-23-2020
 */

$T = new Module\Marketing\Matrix;
$Res = $T->addLead([
    'lead_name' => (isset($fields['repo_name'])) ? $fields['repo_name'] : null,
    'lead_account_id' => (isset($fields['repo_account_id'])) ? $fields['repo_account_id'] : null,
    'lead_method' => (isset($fields['repo_key'])) ? $fields['repo_key'] : null,
    'lead_email' => (isset($fields['repo_email'])) ? $fields['repo_email'] : null,
    'lead_phone_1' => (isset($fields['repo_phone'])) ? $fields['repo_phone'] : null,
    'lead_whatsapp' => (isset($fields['repo_whatsapp'])) ? $fields['repo_whatsapp'] : null,
    'lead_subject' => (isset($fields['repo_subject'])) ? $fields['repo_subject'] : null,
    'lead_message' => (isset($fields['repo_message'])) ? $fields['repo_message'] : null,
]);
