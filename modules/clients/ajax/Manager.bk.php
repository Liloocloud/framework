<?php
/**
 * Ajax do Contato pelo Whatsapp
 * @copyright Felipe Oliveira - 17.11.2021
 * @version 1.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../../../_Kernel/_Sync.inout.php";

switch ($Action) {

    /****************************************************************************
     * CADASTRANDO NOVO CLIENTE
     */
    case 'client_create':
        $Sync['client_code'] = str_replace(' ', '', $Sync['client_code']);
        if(isset($Sync)){   
            // Verificar se o cliente já existe pelo código 
            $Code = _get_data_full("SELECT `client_code` FROM `".TB_CLIENTS."` WHERE `client_code` =:a", "a={$Sync['client_code']}");
            $Code = (isset($Code) && !empty($Code))? true : false;
            if($Code){
                $JSON['notify'] = ["Já existe um cliente com o Código {$Sync['client_code']}", 'error'];
                $JSON['callback'] = '<script>';
                $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
                $JSON['callback'].= '$("input[name=\'client_code\']").addClass("uk-form-danger").focus();';
                $JSON['callback'].= '</script>';
                break;
            }
            // Verificar se o cliente já existe pelo e-mail
            $Email = _get_data_full("SELECT `client_email` FROM `".TB_CLIENTS."` WHERE `client_email` =:a", "a={$Sync['client_email']}");
            $Email = (isset($Email) && !empty($Email))? true : false;
            if($Email){
                $JSON['notify'] = ["Já existe um cliente com esse e-mail", 'error'];
                $JSON['callback'] = '<script>';
                $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
                $JSON['callback'].= '$("input[name=\'client_email\']").addClass("uk-form-danger").focus();';
                $JSON['callback'].= '</script>';
                break;
            }
            // Verificar se o cliente já existe pelo document
            $Doc = _get_data_full("SELECT `client_document` FROM `".TB_CLIENTS."` WHERE `client_document` =:a", "a={$Sync['client_document']}");
            $Doc = (isset($Doc) && !empty($Doc))? true : false;
            if($Doc){
                $JSON['notify'] = ["Já existe um cliente com esse documento", 'error'];
                $JSON['callback'] = '<script>';
                $JSON['callback'].= '$("form input").removeClass("uk-form-danger");';
                $JSON['callback'].= '$("input[name=\'client_document\']").addClass("uk-form-danger").focus();';
                $JSON['callback'].= '</script>';
                break;
            }

            $Add = _set_data_table(TB_CLIENTS, $Sync);
            if($Add){
                $JSON['notify'] = ['Cliente adicionado com sucesso', 'success'];
                $JSON['callback'] = _redirect_url(BASE_ADMIN.'client-manager/');
            }else{
                $JSON['notify'] = ['Não foi possível adicionar cliente. Tente novamente', 'error'];
            }
        }else{
            $JSON['notify'] = ['Não foi possível adicionar cliente. Tente novamente', 'error'];
        }
    break;

    /****************************************************************************
     * CONTABILIZA OS CLIQUES NO BOTÃO DO WHATSAPP
     */
    case 'modal_client_view':
        if(isset($Sync)){
            $Client = _get_data_table(TB_CLIENTS, ['client_id' => $Sync['data']]);
            $JSON['json'] = $Client;
            // $JSON['notify'] = ['Erro: Tente novamente', 'error'];
        }
    break;

    /****************************************************************************
     * CONTABILIZA OS CLIQUES NO BOTÃO DO WHATSAPP
     */
    case 'click_btn_whatsapp':
        $Sync['contact_channel'] = 'click';
        $Sync['contact_ip'] = _get_client_ip();
        unset($Sync['data']);
        if(isset($Sync)){
            $Set = _set_data_table(TB_CONTACTS, $Sync);
        }
    break;

    /****************************************************************************
     * CONTABILIZA OS CLIQUES NO BOTÃO TELEFONE, INDICANDO QUE O USUÁRIO TEVE INTERESSE
     */
    case 'click_btn_phone':
        $Sync['contact_channel'] = 'phone';
        $Sync['contact_ip'] = _get_client_ip();
        unset($Sync['data']);
        if(isset($Sync)){
            $Set = _set_data_table(TB_CONTACTS, $Sync);
        }
    break;

    /****************************************************************************
     * SALVA A MENSAGEM E ENVIA PARA O WHATSAPP PELA URL NA PÁGINA 
     * OBRIGADO DO TEMA
     */
    case 'send_message_whatsapp':      
        if(isset($Sync)){
            $Sync['contact_message'] = $Sync['contact_message'].' '.$Sync['company'];
            $Sync['contact_channel'] = 'Whatsapp';
            $Sync['contact_ip'] = _get_client_ip();
            unset($Sync['company']);
            $Set = _set_data_table(TB_CONTACTS, $Sync);
            if($Set){
                $JSON['callback'] = "
                    <script>window.open(
                        '".BASE.'obrigado/?con=yes&msg='.$Sync['contact_message']."',
                        '_blank'
                    );</script>
                    ";
            }else{
                $JSON['notify'] = ['Erro: Tente novamente', 'error'];
            }
        }else{
            $JSON['notify'] = ['Erro: Tente novamente', 'error'];
        }
    break;
  
    /****************************************************************************
     * SALVA A MENSAGEM E ENVIA PARA O E-MAIL
     */
    case 'send_form_email':      
        if(isset($Sync)){
            $Sync['contact_channel'] = 'form';
            $Sync['contact_ip'] = _get_client_ip();
            $Set = _set_data_table(TB_CONTACTS, $Sync);
            if($Set){
                $JSON['callback'] = '<script>$(".callback-alert").show()</script>';
                $JSON['array'][0] = [ 
                    'element' => '.callback-alert',
                    'content' => _uikit_alert('Mensagem enviado com sucesso! Entraremos em contato em breve. Obrigado!', 'success', false)
                ];
                // $JSON['notify'] = ['Mensagem enviado com sucesso! Entraremos em contato em breve. Obrigado!', 'success'];

                // Envio do e-mail
                $Message = "<h3><b>Nome:</b> ".$Sync['contact_name']."</h3>\n\r";
                $Message.= "<p><b>E-mail:</b> ".$Sync['contact_email']."</p>\n\r";
                $Message.= "<p><b>Assunto:</b> ".$Sync['contact_subject']."</p>\n\r";
                $Message.= "<p><b>Telefone:</b> ".$Sync['contact_phone']."</p>\n\r";
                $Message.= "<p><b>Mensagem:</b> ".$Sync['contact_message']."</p><hr>\n\r";
                $Message.= "<p><b>Data de envio:</b> ".date("d/m/Y H:i:s")."</p>\n\r";
                $Message.= "<p><b>IP:</b> ".$Sync['contact_ip']."</p>\n\r";    

                $Email = new Email\Email();
                $Email->add(
                    'Fale Conosco - '.$Sync['contact_subject'],
                    $Message,
                    __THEME__['mail_from_name'],
                    __THEME__['mail_from_email']
                );
                $Email->send();
                // if($Email->send()){
                //     $JSON['notify'] = ['Mensagem enviado com sucesso!', 'success'];
                //     // sleep(2);
                //     $JSON['callback'] = "
                //         <script>window.open(
                //             '".BASE."obrigado/?con=yes',
                //             '_blank'
                //         );</script>
                //         ";
                // }
                // else{
                //     $JSON['notify'] = ['Não foi possível enviar mensagem. Tente novamente!', 'error'];
                // }

            }else{
                $JSON['notify'] = ['Erro: Tente novamente', 'error'];
            }
        }else{
            $JSON['notify'] = ['Erro: Tente novamente', 'error'];
        }
    break;

}

if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}