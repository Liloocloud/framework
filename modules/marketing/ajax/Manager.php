<?php
/**
 * Ajax do Contato pelo Whatsapp
 * @copyright Felipe Oliveira - 17.11.2021
 * @version 1.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../../../_Kernel/_Sync.inout.php";
require_once "../marketing.fun.php";

switch ($Action) {

    /****************************************************************************
     * COLETA OS DADOS DO FILTRO POR DATA E APLICA NOS ELEMENTOS HTML
     */
    case 'report_daterange_session':
        sleep(1);
        if($Sync['data']){
            $Between = explode('-', $Sync['data']);
            $Between[0] = date('Y-m-d', strtotime(  str_replace('/','-', $Between[0])) );
            $Between[1] = date('Y-m-d', strtotime(  str_replace('/','-', $Between[1])) );
            
            // Retorna total de sessões
            $Session = _get_data_full(
                "SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'session' AND DATE(contact_registered) BETWEEN :a AND :b","a={$Between[0]}&b={$Between[1]}");
            $Session = (isset($Session[0]))? (int) $Session[0]['A'] : 0;
            $JSON['array'][0] = [
                'element' => '.reports_sessions_return',
                'content' => $Session
            ];
           
            // Retorna total de interações
            $Interaction = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` != 'session' AND DATE(contact_registered) BETWEEN :a AND :b","a={$Between[0]}&b={$Between[1]}");
            $Interaction = (isset($Interaction[0]))? (int) $Interaction[0]['A'] : 0;
            $JSON['array'][1] = [
                'element' => '.reports_interactions_return',
                'content' => $Interaction
            ];

            // Retorna total de cliques no botão do whastapp
            $Clicks = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'click' AND DATE(contact_registered) BETWEEN :a AND :b","a={$Between[0]}&b={$Between[1]}");
            $Clicks = (isset($Clicks[0]))? (int) $Clicks[0]['A'] : 0;
            $JSON['array'][2] = [
                'element' => '.reports_clicks_return',
                'content' => $Clicks
            ];

            // Retorna total de pessoas que iniciaram uma conversa no whastapp
            $Whatsapp = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'whatsapp' AND DATE(contact_registered) BETWEEN :a AND :b","a={$Between[0]}&b={$Between[1]}");
            $Whatsapp = (isset($Whatsapp[0]))? (int) $Whatsapp[0]['A'] : 0;
            $JSON['array'][3] = [
                'element' => '.reports_whatsapp_return',
                'content' => $Whatsapp
            ];

            // Retorna total cliques no botão do telefone
            $Phone = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'phone' AND DATE(contact_registered) BETWEEN :a AND :b","a={$Between[0]}&b={$Between[1]}");
            $Phone = (isset($Phone[0]))? (int) $Phone[0]['A'] : 0;
            $JSON['array'][4] = [
                'element' => '.reports_phone_return',
                'content' => $Phone
            ];

            // Retorna total envios do formulário
            $Form = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'form' AND DATE(contact_registered) BETWEEN :a AND :b","a={$Between[0]}&b={$Between[1]}");
            $Form = (isset($Form[0]))? (int) $Form[0]['A'] : 0;
            $JSON['array'][5] = [
                'element' => '.reports_form_return',
                'content' => $Form
            ];

            // Retorna total de conversões
            $Convertion = _get_data_full(
                "SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` 
                WHERE `contact_method` = 'form'
                OR `contact_method` = 'whatsapp'
                OR `contact_method` = 'call'
                AND DATE(contact_registered) BETWEEN :a AND :b","a={$Between[0]}&b={$Between[1]}");
            $Convertion = (isset($Convertion[0]))? (int) $Convertion[0]['A'] : 0;
            $JSON['array'][6] = [
                'element' => '.reports_convertions_return',
                'content' => $Convertion
            ];

            // Retorna total de interações vindas pelo "Facebook Ads"
            $FAA = _get_data_full(
                "SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` 
                WHERE `contact_method` = 'form'
                OR `contact_method` = 'whatsapp'
                OR `contact_method` = 'call'
                AND `contact_channel` = 'faa'
                AND DATE(contact_registered) BETWEEN :a AND :b","a={$Between[0]}&b={$Between[1]}");
            $FAA = (isset($FAA[0]))? (int) $FAA[0]['A'] : 0;
            $JSON['array'][7] = [
                'element' => '.reports_interactions_faa_return',
                'content' => $FAA
            ];


        }
    break;

    /****************************************************************************
     * COLETA A DATA INICIAL E APLICA NOS ELEMENTOS HTML
     */
    case 'report_all_data':


        // Retorna total de sessões
        $Session = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'session'");
        $Session = (isset($Session[0]))? (int) $Session[0]['A'] : 0;
        $JSON['array'][0] = [
            'element' => '.reports_sessions_return',
            'content' => $Session
        ];

        // Retorna total de interações
        $Interaction = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` != 'session'");
        $Interaction = (isset($Interaction[0]))? (int) $Interaction[0]['A'] : 0;
        $JSON['array'][1] = [
            'element' => '.reports_interactions_return',
            'content' => $Interaction
        ];

        // Retorna total de cliques no botão do whastapp
        $Clicks = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'click'");
        $Clicks = (isset($Clicks[0]))? (int) $Clicks[0]['A'] : 0;
        $JSON['array'][2] = [
            'element' => '.reports_clicks_return',
            'content' => $Clicks
        ];

        // Retorna total de pessoas que iniciaram uma conversa no whastapp
        $Whatsapp = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'whatsapp'");
        $Whatsapp = (isset($Whatsapp[0]))? (int) $Whatsapp[0]['A'] : 0;
        $JSON['array'][3] = [
            'element' => '.reports_whatsapp_return',
            'content' => $Whatsapp
        ];

        // Retorna total cliques no botão do telefone
        $Phone = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'phone'");
        $Phone = (isset($Phone[0]))? (int) $Phone[0]['A'] : 0;
        $JSON['array'][4] = [
            'element' => '.reports_phone_return',
            'content' => $Phone
        ];

        // Retorna total envios do formulário
        $Form = _get_data_full("SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` WHERE `contact_method` = 'form'");
        $Form = (isset($Form[0]))? (int) $Form[0]['A'] : 0;
        $JSON['array'][5] = [
            'element' => '.reports_form_return',
            'content' => $Form
        ];

        // Retorna total de conversões
        $Convertion = _get_data_full(
            "SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` 
            WHERE `contact_method` = 'form'
            OR `contact_method` = 'whatsapp'
            OR `contact_method` = 'call'");
        $Convertion = (isset($Convertion[0]))? (int) $Convertion[0]['A'] : 0;
        $JSON['array'][6] = [
            'element' => '.reports_convertions_return',
            'content' => $Convertion
        ];

        // Retorna total de interações vindas pelo "Facebook Ads"
        $FAA = _get_data_full(
            "SELECT COUNT(contact_id) AS A FROM `".TB_MKT_CONTACTS."` 
            WHERE `contact_method` = 'form'
            OR `contact_method` = 'whatsapp'
            OR `contact_method` = 'call'
            AND `contact_channel` = 'faa'");
        $FAA = (isset($FAA[0]))? (int) $FAA[0]['A'] : 0;
        $JSON['array'][7] = [
            'element' => '.reports_interactions_faa_return',
            'content' => $FAA
        ];
    break;

    /****************************************************************************
     * FACEBOOK ADS (FAA) CONTROLADORA
     */
    case 'report_all_faa':      
        $JSON['array'][0] = [
            'element' => '.teste-liloo-graphics',
            'content' => _card_graphic([
                "title" => "Percentual de Contatos",
                "desc" => "Visual Geral das Interações de Usuário no site",
                "type" => "doughnut",
                "data" => [
                    "labels" => "
                        'Clique no Botão do Whatsapp',
                        'Contatos pelo Whatsapp',
                        'Visualizações do Telefone',
                        'Formulários Enviados'
                    ",
                    "values" => "
                        '58',
                        '15',
                        '25',
                        '8'
                    ",
                    "colors" => "
                        'rgb(16,149,24)',
                        'rgb(54, 162, 235)',
                        'rgb(255,153,0)',
                        'rgb(220,57,18)'
                    "
                ],
            ])
        ];
    break;


}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}