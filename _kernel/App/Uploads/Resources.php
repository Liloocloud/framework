<?php
/**
 * Class responsável por tratar as imagens já upadas no servidor
 * Essa classe Extende a Class "Gregwar"
 * Teremos alguns recursos interessantes no uso dessa classe como:
 * @see Criação de Diversas Mimiaturas das Imagens
 * @see Marca d'água com posicionamento
 */

namespace Uploads;

require ROOT . '_Kernel/Libs/ImageCustom/vendor/autoload.php';
use \Gregwar\Image\Image;

class Resources
{
    /** Imagem */
    private $Image; // Caminho completao da Imagem a ser manipulada
    private $Width = SETTINGS_UPLOADS['IMAGE_WIDTH']; // Altura padrão das Imagens
    private $Height = SETTINGS_UPLOADS['IMAGE_HEIGHT']; // Largura padrão das Imagens
    private $Path; // Guarda o Caminho da imagem
    /** Configs */
    private $ThumbnailsCreate = SETTINGS_UPLOADS['THUMBNAILS_CREATE']; // Permite criar as minuaturas. Padrão = true
    private $ThumbnailsList = SETTINGS_UPLOADS['THUMBNAILS_SET_LIST']; // Lista de miniaturas a serem criadas
    private $Thumbnais; // Retorna um a lista de miniaturas para ser entregue para outra classe
    private $DipSwitch;

    /**
     * Inicia a Class com uma imagem
     * @param $Imagem = Caminho da imagem ser Tratada
     * @param $Path = Local onde salvar
     */
    public function __construct($Image, $NewPath = null)
    {
        if (!$Image) {
            return [
                'BOOL' => false,
                'OUTPUT' => null,
                'MESSAGE' => 'Nenhuma imagem foi passada na instância!',
            ];
        }
        $this->Image = $Image;
        $this->NewPath = $NewPath;
    }

    /**
     * Retorna com os 3 Arrays Globais 'BOOL','OUTPUT','MESSAGE'
     */
    public function DipSwitch()
    {
        return $this->DipSwitch;
    }

    /**
     * Cria a lista de miniaturas configuradas em THUMBNAILS_SET_LIST.
     * Obs.: esse método só será chamada para arquivos do tipo "image/*"
     * @return = Os caminhos das miniaturas para ser guardado no banco
     */
    public function CreateThumbnails()
    {
        $Image = getimagesize($this->Image);
        $Path = explode('/', $this->Image);
        $Path = end($Path);
        $Path = str_replace($Path, '', $this->Image);
        $this->Path = $Path;

        if (strstr($Image['mime'], 'image/')) {
            if ($this->ThumbnailsCreate == true) {
                $this->Thumbnais = [];
                foreach ($this->ThumbnailsList as $Val) {
                    $W = (int) $Val['w'];
                    $H = (int) $Val['h'];
                    $New_H = floor(($W * $Image[1]) / $Image[0]);
                    $FileSave = pathinfo($this->Image);
                    $FileSave = $FileSave['filename'] . '-' . $W . 'x' . $New_H . '.' . $FileSave['extension'];
                    array_push($this->Thumbnais, $FileSave);

                    // if (SETTINGS_UPLOADS['WATERMARK_CREATE']) {
                    Image::open($this->Image)
                        ->cropResize($W)
                    // ->merge(
                    //     Image::open(ROOT . 'uploads/logotipos/1-logotipo.png')->cropResize(50, 50),
                    //     150,
                    //     125
                    // )
                    // ->contrast(255)
                        ->save($this->Path . $FileSave, 'jpg', 50);
                    // }

                }
            }
        }
        return false;
    }

    /**
     * Retorna a lista JSON de miniaturas
     */
    public function getThumbs()
    {
        if($this->ThumbnailsCreate){
            if(isset($this->Thumbnais)){
                $i = 0;
                foreach ($this->Thumbnais as $value) {
                    $Img = getimagesize($this->Path . $value);
                    $Thumb[$i] = ['width' => $Img[0], 'height' => $Img[1], 'mime' => $Img['mime'], 'image' => $value];
                    $i++;
                }
                return json_encode($Thumb);
            }           
        }
        return null;      
    }

    /**
     * Cria Marca d'água na Imagem passada
     */
    private function WaterMark($ImgWater)
    {
        $Im = Image::open(ROOT . $this->Path . $ImgWater)
            ->merge(
                Image::open(ROOT . 'uploads/logotipos/1-logotipo.png')->cropResize(70, 70)
            )
            ->save(ROOT . $this->Path . $ImgWater);
        // var_dump($Im);
    }

}
