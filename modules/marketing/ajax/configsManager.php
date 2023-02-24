<?php
/**
 * Ajax do Contato pelo Whatsapp
 * @copyright Felipe Oliveira - 17.11.2021
 * @version 1.0
 */

require_once "../../../_Kernel/___Kernel.php";
require_once "../../../_Kernel/_Sync.inout.php";

switch ($Action) {

    // $JSON['array'][0] = [ 
        //     'element' => '.callback-alert',
        //     'content' => _uikit_alert('Mensagem enviado com sucesso! Entraremos em contato em breve. Obrigado!', 'success', false)
    // ]

    /****************************************************************************
     * ATUALIZANDO INFORMAÇÕES DE ATENDIMENTO
     */
    case 'config_attendance':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    /****************************************************************************
     * ATUALIZANDO INFORMAÇÕES DE LOCALIZAÇÃO
     */
    case 'config_location':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    /****************************************************************************
     * ATUALIZANDO INFORMAÇÕES DE SEO BÁSICO
     */
    case 'config_seo':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    /****************************************************************************
     * ATUALIZANDO INFORMAÇÕES DE SEO BÁSICO
     */
    case 'config_midias':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;


    /****************************************************************************
     * UPDATE TAG GOOGLE GTM 
     */
    case 'config_google_tag_gtm':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    /****************************************************************************
     * UPDATE TAG GOOGLE ANALYTICS 
     */
    case 'config_google_tag_analytics':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;
    
    /****************************************************************************
     * UPDATE TAG GOOGLE ADS 
     */
    case 'config_google_tag_ads':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    /****************************************************************************
     * UPDATE TAG GOOGLE ADS CONVERTION 
     */
    case 'config_google_tag_conversion':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    /****************************************************************************
     * UPDATE META WEBMASTER TOOLS 
     */
    case 'config_google_meta_console':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    /****************************************************************************
     * UPDATE PIXEL FACEBOOK GLOBAL 
     */
    case 'config_facebook_pixel':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;
        

    /****************************************************************************
     * UPDATE META SITE VERIFICATION FACEBOOK 
     */
    case 'config_facebook_meta_domain':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    /****************************************************************************
     * UPDATE HOTJAR SCRIPT
     */
    case 'config_hotjar_tag':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    /****************************************************************************
     * UPDATE ADICIONAIS
     */
    case 'config_head_tags_scripts':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;

    
    /****************************************************************************
     * UPDATE ADICIONAIS
     */
    case 'config_seo_site_name':
        foreach ($Sync as $key => $value) {
            $Up = _up_data_table(TB_OPTIONS,[
                'where' => [ 'opt_meta' => $key ],
                'values' => [ 'opt_values' => $value ]
            ]);
        }
        $JSON['notify'] = ['Informações atualizadas com sucesso', 'success'];
        break;


}
if (isset($JSON) && $JSON != null) {
    if (isset($JSON['notify'])) {
        $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
    }
    echo json_encode($JSON);
}