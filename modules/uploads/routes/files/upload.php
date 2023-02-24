<?php
/**
 * Receba a requisição do Dropzone
 * @copyright Felipe Oliveira - 26.05.2022
 * @version 1.0.0 
 */

require '../../../../_Kernel/___Kernel.php';
// require '../../../../_Kernel/_Sync.inout.v2.php';

define('SETTINGS_UPLOADS', [
    // Prefixo inicial do novo nome dos arquivos
    'PREFIX_NAME_FILE' => (isset($_SESSION['account_id']))? $_SESSION['account_id'].'-'.date("dmYHis"): '',
    // Largura padrão de Arquivos do tipo Imagem
    'IMAGE_WIDTH' => 1200,
    // Altura padrão de Arquivos do tipo Imagem
    'IMAGE_HEIGHT'=> 800,
    // Diretório Raiz padrão para salvar os arquivos
    'BASE_DIR' => 'uploads/',
    // Habilitar subpastas por data sendo ano e mes
    'SUBFOLDER_DATE_NAME' => true,
    // Define se o sistema deverá criar as miniaturas ou não
    'THUMBNAILS_CREATE' => true,
    // Lista de miniaturas a serem criadas. Sempre L x A (Largura x Altura)
    // Evite Criar miniaturas com o mesmo padrão da imagem principal
    'THUMBNAILS_SET_LIST' => [
        // ['w' => 400, 'h' => 250],
        ['w' => 250, 'h' => 150],
        ['w' => 100, 'h' => 70]
    ],
    // Criar Marca d'água
    'WATERMARK_CREATE' => true,
    // Cria a Marca D'água usando o logotipo da conta do usuário
    'WATERMARK_ACCOUNT_LOGO' => true,
    // Salva os dados dos arquivos upados para o banco
    'SAVE_INTO_DATABASE' => true
]);

$Action = (isset($_POST['action'])) ? $_POST['action'] : false;
$Data   = (isset($_POST['data'])) ? $_POST['data'] : false;
$Files  = (isset($_FILES)) ? $_FILES : false;

if(!$Action){
    $JSON = [
        'bool' => false,
        'output' => null,
        'message' => "O parametro 'action' não foi passado"
    ];
    echo json_encode($JSON);
    exit;
}

if(!$Data){
    $JSON = [
        'bool' => false,
        'output' => null,
        'message' => "O parametro 'data' espera {meta, module}"
    ];
    echo json_encode($JSON);
    exit;
}

if(!$Files){
    $JSON = [
        'bool' => false,
        'output' => null,
        'message' => "Nenhum arquivo foi passado"
    ];
    echo json_encode($JSON);
    exit;
}

if(isset($_POST['action'])){

    switch ($Action) {
        
        /**********************************************************
         * FAZ UPLOAD DOS ARQUIVOS MULTIPLOS
         */
        case 'upload/files':
            if(!empty($_SESSION['account_id'])){
                $ID = json_decode($Data, true);
                if(array_key_exists('id', $ID) && $ID['id'] != ''){
                    $Up = new Uploads\Upload($_FILES, $Data, 'assets/');
                    $Up->MoveFiles();
                    $JSON = $Up->DipSwitch();
                }else{
                    $JSON = [
                        'bool' => false,
                        'output' => null,
                        'message' => 'É necessário passar um ID',
                    ];
                    break;
                }               
            }else{
                $JSON = [
                    'bool' => false,
                    'output' => null,
                    'message' => 'Conta de Usuário não Encontrada',
                ];
            }
        break;


    }

}

if (isset($JSON) && $JSON != null)
    echo json_encode($JSON);