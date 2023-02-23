<?php
/**
 * Funções espefíficas para o área admin
 * @copyright Felipe Oliveira - 04.01.2021
 * @version 1.0.0
 */

/**
 * Incluir os módulo no console
 */
function _inc_modules(){
    global $_Module, $Extra, $active_modules, $This, $__ROUTES__;
    $Module = (isset(URL()[1]))? (( is_dir(ROOT.'modules/'.URL()[1]))? URL()[1] : false ) : false ;
    $Action = (isset(URL()[2]))? (( is_dir(ROOT.'modules/'.URL()[1].'/routes/'.URL()[2].'/'))? URL()[2] : false ) : false ;

    // Inicia com a home
    if(!isset(URL()[1])){
        require_once ROOT.'admin/routes/home/home.php';
        return false;
    }

    // Verificar se o módulo existe para incluir os arquivos
    if(isset(URL()[1]) && $Module === false){
        _ERROR("Módulo \"".URL()[1]."\" ausente ou não instalado. Contate o Administrador");
        return false;
    }else{
        require_once ROOT.'modules/'.URL()[1].'/'.URL()[1].'.config.php';
        require_once ROOT.'modules/'.URL()[1].'/_routes.php';
    }

    // Verifica a permissão de uso do módulo
    if($_SESSION['account_level'] < (int) $This[$Module]['USER_LEVEL_MIN']){
        _ERROR("Você não tem permissão para usar este módulo. Contate o administrador");   
        return false;
    }

    // Acesso ao arquivo padrão info.md (markdown)
    if(isset(URL()[2]) && URL()[2] == 'info' && $_SESSION['account_level'] >= 11){
        $Mkd = new Helpers\Markdown;
        echo $Mkd->text(file_get_contents(ROOT.'modules/'.URL()[1].'/info.md'));
        return false;
    }

    // Verificar se a rota existe na pasta "routes"
    if(isset(URL()[2]) && $Action === false){      
        _ERROR("A Rota \"".URL()[2]."\" não existe. Contate o administrador");
        return false;
    }

    // Verifica se a rota foi declarada no arquivo "_routes.php"
    if(!array_key_exists($Action, $__ROUTES__[$Module])){
        _ERROR("A Rota \"".URL()[2]."\" não foi declarada. Contate o administrador");
        return false;
    }

    // Verifica a permissão de acesso a rota - Para personalizar acesso o arquivo "_routes.php"
    if(isset(URL()[1]) && isset(URL()[2]) && is_dir(ROOT.'modules/'.URL()[1]) && $_SESSION['account_level'] < $__ROUTES__[$Module][URL()[2]]['level']){
        _ERROR("Você não tem permissão para acessar este conteúdo. Contate o desenvolvedor");
        header('Location: '.BASE_ADMIN.'accounts/complete/');
        return false;
    }

    // Verifica se o módulo foi declarado em config.modules.php
    if(!in_array($Module, $active_modules)){
        _ERROR("O módulo \"{$Module}\" não está ativado. Contate o administrador");
        return false;
    }

    require_once ROOT.'modules/'.$Module.'/routes/'.$Action.'/'.$Action.'.php';
}