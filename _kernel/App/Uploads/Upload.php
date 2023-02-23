<?php
/**
 * Class para gerenciamento arquivos e uploads
 *
 * @copyright Felipe Oliveira Lourenço - 28.05.2022
 * @version 0.0.1
 */

namespace Uploads;

require ROOT . '_Kernel/Libs/ImageCustom/vendor/autoload.php';
use \Uploads\Resources;

class Upload
{
    /** Arquivo */
    private $FormFiles; // Recebe a variável Global $_FILES vinda de um Formulário
    private $Name; // Nome do Arquivo. Podendo ser reescrito durante o processamento
    private $PrefixName = SETTINGS_UPLOADS['PREFIX_NAME_FILE']; // Prefixo Padrão ao Renomear os Arquivos

    /** Diretórios */
    private $SubFolder = ''; // SubPasta para Salvar os arquivos
    private $BaseDir = SETTINGS_UPLOADS['BASE_DIR']; // Diretório padrão para salvar os arquivos
    private $Path; // Receber o resultado do caminho do Arquivo
    private $Url; // Receber o resultado da URL do Arquivo

    /** Configs */
    private $DipSwitch; // Armazena o retorno com os 3 Arrays Globais 'BOOL','OUTPUT','MESSAGE'
    private $SyncData; // Informações passadas pelo parametro 'data: {}' da requisição

    /**
     * Inicia verificando se o diretório atual Existe
     * @param $FormFiles = Recebe a Variavel $_FILES Global do Formulário
     * @param $SyncData = Recebe a Veriavel "data" da requisição no padrão 'data:{meta, module}'
     * @param $SubFolder = Criar uma subpasta para incluir os arquivos (Bom para organizar)
     * @param $PrefixName = Cria um prefixo para o nome do arquivo. Finalize com '/'
     * @param $BaseDir = Recebe o caminho do diretório personalizado. Finalize com '/'
     */
    public function __construct(
        array $FormFiles,
        string $SyncData,
        string $SubFolder = null,
        string $PrefixName = null,
        string $BaseDir = null
    ) {
        // Verifica se $_FILES foi passado
        if (empty($FormFiles)) {
            $this->DipSwitch = [
                "BOOL" => false,
                "OUTPUT" => $FormFiles,
                "MESSAGE" => 'Nenhum arquivo foi passado pelo 1º Parametro',
            ];
            return;
        } else {
            $this->FormFiles = $FormFiles;
        }

        // Verifica se $SyncData foi passada
        if (empty($SyncData)) {
            $this->SyncData = [
                "BOOL" => false,
                "OUTPUT" => $SyncData,
                "MESSAGE" => 'A Classe espera o parametro data: {meta, module e etc}',
            ];
            return;
        } else {
            $this->SyncData = $SyncData;
        }

        $this->SubFolder = $SubFolder;
        $this->Path = ROOT . $this->BaseDir . $this->SubFolder;
        $this->Url = $this->BaseDir . $this->SubFolder;

        // Verifica se o diretorio existe, se não cria
        if (!file_exists(ROOT . $this->BaseDir) && !is_dir(ROOT . $this->BaseDir)) {
            $this->Path = ROOT . $this->BaseDir;
            $this->Url = $this->BaseDir;
            $this->CreateFolder($this->Path);
        }

        // Verifica se a subpasta passada existe, se não cria
        if (!file_exists(ROOT . $this->BaseDir . $this->SubFolder) && !is_dir(ROOT . $this->BaseDir . $this->SubFolder)) {
            $this->Path = ROOT . $this->BaseDir . $this->SubFolder;
            $this->Url = $this->BaseDir . $this->SubFolder;
            $this->CreateFolder($this->Path);
        }

        // Verifica se SUBFOLDER_DATE_NAME == true
        if (SETTINGS_UPLOADS['SUBFOLDER_DATE_NAME']) {
            list($y, $m) = explode('/', date('Y/m'));

            if (!file_exists("{$this->Path}{$y}/") && !is_dir("{$this->Path}{$y}/")) {
                $this->CreateFolder("{$this->Path}{$y}/");
            }
            if (!file_exists("{$this->Path}{$y}/{$m}/") && !is_dir("{$this->Path}{$y}/{$m}/")) {
                $this->CreateFolder("{$this->Path}{$y}/{$m}/");
            }
            $this->Path = ROOT . "{$this->BaseDir}{$this->SubFolder}{$y}/{$m}/";
            $this->Url = "{$this->BaseDir}{$this->SubFolder}{$y}/{$m}/";
        } else {
            $this->Path = ROOT . "{$this->BaseDir}{$this->SubFolder}";
            $this->Url = "{$this->BaseDir}{$this->SubFolder}";
        }
    }

    /**
     * Retorna com os 3 Arrays Globais 'BOOL','OUTPUT','MESSAGE'
     */
    public function DipSwitch()
    {
        return $this->DipSwitch;
    }

    /**
     * Apenas para realizar o Upload podendo ser Um ou Mais Arquivos
     * Move os Arquivos para a Pasta padrão do Sistema
     */
    public function MoveFiles()
    {
        if (file_exists($this->Path) && is_dir($this->Path)) {
            for ($i = 0; $i < count($this->FormFiles['files']['name']); $i++) {

                $this->Name = $this->RenameFile($this->FormFiles['files']['name'][$i]);

                $MoveUp = move_uploaded_file(
                    $this->FormFiles['files']['tmp_name'][$i],
                    $this->Path . $this->Name
                );
                if ($MoveUp) {

                    // Criando as miniaturas
                    $Resource = new \Uploads\Resources($this->Path . $this->Name);
                    $Resource->CreateThumbnails();
                    $Thumbs = $Resource->getThumbs();

                    // Salvando no banco
                    if (SETTINGS_UPLOADS['SAVE_INTO_DATABASE']) {
                        $File = getimagesize($this->Path . $this->Name);
                        $File = [
                            'name' => $this->Name,
                            'size' => $this->FormFiles['files']['size'][$i],
                            'type' => $this->FormFiles['files']['type'][$i],
                            'thumbs' => $Thumbs,
                            'dimension' => $File[0] . 'x' . $File[1],
                        ];
                        $this->SaveData($File);
                    }

                } else {
                    $this->DipSwitch = [
                        'BOOL' => false,
                        'OUTPUT' => null,
                        'MESSAGE' => 'Não foi possível carregar arquivos',
                    ];
                    return;
                }

            }
        } else {
            $this->DipSwitch = [
                'BOOL' => true,
                'OUTPUT' => $this->Path,
                'MESSAGE' => 'Diretório não encontrado',
            ];
            return;
        }
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    /**
     * Renomeia o Arquivo passado pelo Parametro
     */
    private function RenameFile($Name)
    {
        $FileName = strtolower(substr($Name, 0, strrpos($Name, '.')));
        $FileName = preg_replace('/[ _.-]+/', '-', $FileName);
        return $this->PrefixName . '-' . $FileName . '.' . pathinfo($Name)['extension'];
    }

    /**
     * Responsável por armazenar na tabela nativa 'liloo_uploads'
     * Com todas as informções sincronizadas. Lembrando que Armazena
     * Apenas um linha por vez. Irá mesclar o array do parametro com o dados do arquivo
     * @param $Sync = Aguarda um Array com todas as informações de "APENAS UM ARQUIVO" EX.: name, size e type
     */
    private function SaveData(array $DataFile)
    {
        $ParamData = json_decode($this->SyncData, true);
        $Sync['upload_account_id'] = (int) $_SESSION['account_id'];
        $Sync['upload_ref_id'] = (isset($ParamData['id']))? $ParamData['id'] : null;
        $Sync['upload_meta'] = $ParamData['meta'];
        $Sync['upload_module'] = $ParamData['module'];
        $Sync['upload_name'] = $DataFile['name'];
        $Sync['upload_size'] = $DataFile['size'];
        $Sync['upload_type'] = ($DataFile['type'])? explode('/',$DataFile['type'])[1] : $DataFile['type'];
        $Sync['upload_mime'] = $DataFile['type'];
        $Sync['upload_url'] = $this->Url;
        $Sync['upload_thumbnails'] = $DataFile['thumbs'];
        $Sync['upload_dimension'] = $DataFile['dimension'];
        $Set = _set_data_table(TB_UPLOADS, $Sync);
        if ($Set) {
            $this->DipSwitch = [
                'BOOL' => true,
                'OUTPUT' => [$Set, $Sync, $this->Path, $this->FormFiles, $this->SyncData],
                'MESSAGE' => 'Arquivos inseridos com sucesso!',
            ];
        } else {
            $this->DipSwitch = [
                'BOOL' => false,
                'OUTPUT' => [$Set, $Sync],
                'MESSAGE' => 'Não foi possível inserir arquivos',
            ];
        }
    }

    /**
     * Tratamento do Arquivo Antes do Envio
     */
    private function File()
    {}

    /**
     * Motor para criar Pastas
     * @param $Folder = Recebe o caminho completo (absoluto) da pasta
     */
    private function CreateFolder($Folder)
    {
        if (!file_exists($Folder) && !is_dir($Folder)) {
            mkdir($Folder, 0777);
        } else {
            $this->DipSwitch = [
                'BOOL' => false,
                'OUTPUT' => null,
                'MESSAGE' => 'A pasta que está tentando criar já existe',
            ];
        }
    }

}
