<?php
/**
 * Arquivo específico para tratamento AJAX da ROTA files Uploads
 * @copyright Felipe Oliveira - 01.06.2022
 * @version 1.0
 */

// if(isset($_SESSION['account_level']) && $_SESSION['account_level'] < 10){
//     exit;
// }

require_once "../../../../_Kernel/___Kernel.php";
require_once "../../uploads.config.php";
require_once "../../../../_Kernel/_Sync.inout.v2.php";

switch ($Action):

/****************************************************************************
 * RETORNA OS DADOS DOS ARQUIVOS PARA USO GERAL. NO PAINEL DE
 * CONTROLE INTERNO O RETORNO SERÁ USADO PARA MOSTRAR AS INFORMAÇÕES
 * NA LATERAL DIREITA
 */
case 'upload/getfile':
    $File = _get_data_table(TB_UPLOADS, ['upload_id' => $Sync]);
    $File = (isset($File[0])) ? $File[0] : false;
    if ($File) {
            $Mime = (strstr($File['upload_mime'], '/')) ? explode('/', $File['upload_mime'])[0] : $File['upload_mime'];
            switch ($Mime) {
                case 'image':
                    $Url = '<img src="' . BASE . $File['upload_url'] . $File['upload_name'] . '" alt="" title="">';
                    break;
                case 'audio':
                    $Url = '<audio controls><source src="' . BASE . $File['upload_url'] . $File['upload_name'] . '" type="' . $File['upload_mime'] . '"></audio>';
                    break;
                case 'video':
                    $Url = '<video width="100%" controls><source src="' . BASE . $File['upload_url'] . $File['upload_name'] . '" type="' . $File['upload_mime'] . '"></video>';
                    break;
                case 'text':
                case 'application':
                    $Url = '<object data="' . BASE . $File['upload_url'] . $File['upload_name'] . '" type="' . $File['upload_mime'] . '"><p>Seu navegador não tem um suporte para ' . $Mime . '</p></object>';
                    break;
            }
            $File['upload_href'] = '<a href="' . BASE . $File['upload_url'] . $File['upload_name'] . '" target="_new">' . $File['upload_name'] . '</a>';
            $File['upload_url'] = $Url;
            $Size = round(((int) $File['upload_size'] / 1024), 1);
            $File['upload_size'] = ($Size >= 1000) ? round(($Size / 1024),1) . ' Mb' : $Size . ' Kb';
            $JSON = [
                'bool' => true,
                'output' => $File,
                'message' => 'Dados do arquivo encontrado',
            ];
    } else {
        $JSON = [
            'bool' => false,
            'output' => null,
            'message' => 'Nenhum arquivo foi encontrado',
        ];
    }
    break;

/****************************************************************************
 * POVOA A MODAL COM OS DADOS
 */
case 'ads/item/modal':
    if (isset($Sync)) {
        $Ads = _get_data_full("SELECT * FROM `" . TB_ADS . "` WHERE `ads_id` =:a", "a={$Sync}");
        if ($Ads) {
            $Ads[0]['ads_registered'] = format_datetime($Ads[0]['ads_registered']);
            $Ads[0]['ads_modify'] = format_datetime($Ads[0]['ads_modify']);
            $Ads[0]['ads_status'] = (isset($Ads[0]['ads_status']) == 0) ? 'Inativo' : 'Ativo';
            $Ads[0]['ads_moderate'] = (isset($Ads[0]['ads_moderate']) == 0) ? 'Em processo' : 'Validado';
            $JSON = [
                'bool' => true,
                'output' => $Ads,
                'message' => 'Resultados encontrados',
            ];
            break;
        } else {
            $JSON = [
                'bool' => false,
                'output' => null,
                'message' => 'Nenhum anúncio encontrado com o termo "' . $Sync . '"',
            ];
            break;
        }
    } else {
        $JSON = [
            'bool' => false,
            'output' => null,
            'message' => 'Erro ao abrir modal',
        ];
    }
    break;

/****************************************************************************
 * FILTRO DE BUSCA
 */
case 'ads/users/search':
    $Accounts = _get_data_full(
        "SELECT * FROM `" . TB_ACCOUNTS . "`
				WHERE `account_name` LIKE '%{$Sync['users_search']}%'
				OR `account_lastname` LIKE '%{$Sync['users_search']}%'
				OR `account_cpf` LIKE '%{$Sync['users_search']}%'
				OR `account_cnpj` LIKE '%{$Sync['users_search']}%'
				OR `account_phone` LIKE '%{$Sync['users_search']}%'
				");
    if (!$Accounts) {
        $JSON['notify'] = ['Nenhum conta encontrada com o termo "' . $Sync['users_search'] . '"', 'error'];
        break;
    } else {
        $JSON = $Accounts;
    }
    break;

/****************************************************************************
 * EDITAR
 */
case 'ads/users/button/edit':
    $JSON['notify'] = ['Estamos editando ' . $Sync['data'], 'success'];
    break;

/****************************************************************************
 * DELETAR
 */
case 'ads/users/button/delete':
    $JSON['notify'] = ['Estamos deletando ' . $Sync['data'], 'success'];
    break;

/****************************************************************************
 * CRIA NOVO
 */
case 'ads/users/create':
    $Email = new Account\Check($Sync['account_email']);
    $Check = $Email->check();
    if (!$Check['BOOL']) {
        $Account = _set_data_table(TB_ACCOUNTS, $Sync);
        if ($Account) {
            $JSON = true;
        } else {
            $JSON = [
                'bool' => false,
                'message' => 'Erro ao cadastrar usuário',
            ];
            break;
        }
    } else {
        $JSON = [
            'bool' => false,
            'message' => 'Usuário já existe',
        ];
        break;
    }
    break;

/****************************************************************************
 * CARREGA OS DADOS DO CARD "TOTAL DE USUÁRIOS"
 */
case 'ads/users/reports':
    switch ($Sync) {
        case 'valid':$Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `" . TB_ACCOUNTS . "` WHERE `account_auth` =:a", "a=1");
            break;
        case 'term':$Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `" . TB_ACCOUNTS . "` WHERE `account_accept_terms` =:a", "a=1");
            break;
        case 'active':$Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `" . TB_ACCOUNTS . "` WHERE `account_status` =:a", "a=1");
            break;
        case 'inactive':$Report = _get_data_full("SELECT count(`account_id`) AS Total FROM `" . TB_ACCOUNTS . "` WHERE `account_status` =:a", "a=0");
            break;
    }
    if ($Report && isset($Report[0])) {
        $JSON = $Report[0]['Total'];
    } else {
        $JSON = '';
    }
    break;

    endswitch;
    if (isset($JSON) && $JSON != null) {
        if (isset($JSON['notify'])) {
            $JSON['notify'] = _uikit_notification($JSON['notify'][0], $JSON['notify'][1], false);
        }
        echo json_encode($JSON);
    }
