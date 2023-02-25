<?php
/**
 * Carregamento automatico das class do sistema pela Namespace
 * @copyright 11.01.2021 - Felipe Oliveira Lourenço
 * @update 25.02.2023
 * @version 2.2.2
 */

function __autoLoadClass($Class){   
    $Module     = ROOT.'_Modules/';
    $Plugin     = ROOT.'_Plugins/';
    $Front      = ROOT_KERNEL.'Class/';
    $Kernel     = ROOT_KERNEL.'App/';
    $Libs       = ROOT_KERNEL.'Libs/';
    $Components = ROOT_KERNEL.'Src/';

    $PATH      = [
        'Module' => 'modules/'
    ];

    $Class     = str_replace('\\','/', $Class);
    $Ext       = '.php';   
    $Namespace = explode('/', $Class);

    // Verifica se o Termo Module se encontra no namespace 
    if(in_array('Module', $Namespace)){
     
        if(isset($Namespace[0])){
            $PathModule = ROOT.strtolower($Namespace[0]).'s/';
            if(isset($Namespace[1])){
                $PathModule = $PathModule.strtolower($Namespace[1]).'/';
                if(isset($Namespace[2])){
                    $PathModule.'class/'.$Namespace[2].'.php';
                    if(file_exists($PathModule.'class/'.$Namespace[2].'.php')){
                        require_once $PathModule.'class/'.$Namespace[2].'.php';
                    }else{
                        _MESSAGE("Não foi possível carregar a classe '{$Class}' em \"modules\"");
                    }
                }
            }
        }

        // $Namespace[0] = ($Namespace[0] == 'Module')? $PATH['Module'] : '';
        // if(isset($Namespace[3])){
        //     if(file_exists(ROOT.$Namespace[0].$Namespace[1].'/Class/'.$Namespace[2].'/'.$Namespace[3].'.php')){
        //         require_once ROOT.$Namespace[0].$Namespace[1].'/Class/'.$Namespace[2].'/'.$Namespace[3].'.php';
        //     }else{
        //         _MESSAGE("Não foi possível carregar a classe '{$Class}' em '_Modules");
        //     }       
        // }else{
        //     if(file_exists(ROOT.$Namespace[0].$Namespace[1].'/Class/'.$Namespace[2].'.php')){
        //         require_once ROOT.$Namespace[0].$Namespace[1].'/Class/'.$Namespace[2].'.php';
        //     }else{
        //         _MESSAGE("Não foi possível carregar a classe '{$Class}' em '_Modules");
        //     }
        // }

         
    // Verifica se o Termo Module se encontra no namespace 
    }elseif(in_array('Plugin', $Namespace)){
        $Namespace[0] = ($Namespace[0] == 'Plugin')? '_Plugins/' : '';
        if(isset($Namespace[3])){
            if(file_exists(ROOT_KERNEL.$Namespace[0].$Namespace[1].'/Class/'.$Namespace[2].'/'.$Namespace[3].'.php')){
                require_once ROOT_KERNEL.$Namespace[0].$Namespace[1].'/Class/'.$Namespace[2].'/'.$Namespace[3].'.php';
            }else{
                _MESSAGE("Não foi possível carregar a classe '{$Class}' em '_Plugins");
            }       
        }else{
            if(file_exists(ROOT_KERNEL.$Namespace[0].$Namespace[1].'/Class/'.$Namespace[2].'.php')){
                require_once ROOT_KERNEL.$Namespace[0].$Namespace[1].'/Class/'.$Namespace[2].'.php';
            }else{
                _MESSAGE("Não foi possível carregar a classe '{$Class}' em '_Plugins");
            }
        }

    // Verifica se o Termo Frontend se encontra no namespace
    }elseif(in_array('Frontend', $Namespace)){
        if(isset($Namespace[2])){
            if(file_exists($Front.$Namespace[1].'/'.$Namespace[2].'.php')){
                require_once $Front.$Namespace[1].'/'.$Namespace[2].'.php';
            }else{
                _MESSAGE("Não foi possível carregar a classe '{$Class}' pela 'Frontend");
            }
        }else{
            if(file_exists($Front.$Namespace[1].'.php')){
                require_once $Front.$Namespace[1].'.php';
            }else{
                _MESSAGE("Não foi possível carregar a classe '{$Class}' pela 'Frontend");
            }
        }

    // Verifica se o Termo Components se encontra no namespace
    }elseif(in_array('Components', $Namespace)){
        $This = $Components.strtolower($Namespace[0]).'/'.strtolower($Namespace[1]).'/';
        if(isset($Namespace) && file_exists($This.$Namespace[1].'.php')){     
            require_once $This.$Namespace[1].'.php';
        }else{
            _MESSAGE("Não foi possível carregar a classe '{$Class}' pela 'Components");
        }

    // Verifica se o namespace se encontra na Kernel
    }else{
        if(file_exists($Kernel.$Class.$Ext)){
            require_once $Kernel.$Class.$Ext;
        }else{
            _MESSAGE("
                Não foi possível carregar a classe '{$Class}' pela 'Kernel' <br>
                <b>PATH:</b> {$Kernel}{$Class}{$Ext}
            ");
            throw new Exception("Erro no Módulo", 2);
        }


    }

}
spl_autoload_register('__autoLoadClass');
