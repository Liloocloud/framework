<?php
/**
 * Responsável por verificar se todos os arquivos 
 * obrigatórios estão instalados
 * @copyright Felipe Oliveira - 04.05.2019
 * @version 1.6.0
 */

/*******************************************************************
 * inclui os arquivos necessários da frontend
 */
// if(file_exists(ROOT.'/__config.php')){
//     require_once ROOT.'/__config.php';
//     if(file_exists(ROOT."__fun.php")){
//         require_once ROOT."__fun.php";
//     }else{
//         _ERROR('Arquivo "__fun.php" é Obrigatório e não está na pasta do seu Tema"');
//         exit;
//     }
// }else{
//     _ERROR('Arquivo "__config.php" é Obrigatório e não está na pasta do seu Tema"');
// }

$Modules = new Explore\OpenDirFile(ROOT.'modules/'); 
if($Modules){  
    $Modules = (array) $Modules->list();
    $GetQueueJson = json_decode(file_get_contents(ROOT.'modules/modules.json'), true);
    foreach ($GetQueueJson['active_modules'] as $Config){
        $Con = ROOT.'modules/'.$Config.'/__config.module.php';
        $Fun = ROOT.'modules/'.$Config.'/__fun.module.php';   
        if(is_dir(ROOT.'modules/'.$Config.'/')){
            if(file_exists($Con)){
                global $Modules;
                require_once ROOT.'modules/'.$Config.'/__config.module.php';
            }else{
                _ERROR('Arquivo "__config.module.php" do Módulo <b>"'.$Config.'</b>" está ausente, pedimos que corriga esse erro para garantirmos que não haja bugs indesejados');
                exit;
            }
        }
        if(file_exists($Fun)){
            require_once ROOT.'modules/'.$Config.'/__fun.module.php';
        }
    }
}