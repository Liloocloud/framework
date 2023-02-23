<?php
/**
 * Arquivo responsável por todas as funções nativas do sistema
 * como conversores de texto. Foi unificado a partir da versão 1.2 da FlexAPP.
 * Sendo a primeira função criada em 30.03.2015 pela Centra 7
 * @copyright Felipe Oliveira - 30.07.2020 - 21:36
 * @version 1.0.2
 */

/**
 * Verifica se a ROTA daclarada possui na URL
 * Bom para incluir script PHP de acordo com a URL
 * @param array URL (Rotas) a serem testadas
 */
function pathinfoURLString(array $Array)
{
    $URL = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : '/home/';
    if (in_array($URL, $Array)) {
        return true;
    }
    return false;
}

/**
 * Formata data e hora para padrão Brasileiro
 * @param  [type] $subData [Variavel com o horario a ser convertido]
 * @return [type]          [Retorno HTML]
 */
function format_datetime($subData)
{
    return date('d/m/Y \à\s H:i:s', strtotime($subData));
}
function subData($subData)
{
    return date('d/m/Y', strtotime($subData));
}

/*******************************************************************
 * Função global para redirecionamento
 * @param  [type]  $url    [URL da frontend]
 * @param  boolean $output [Saída echo ou return]
 */
function _redirect_url($url = BASE, $output = false)
{
    if ($output) {
        echo "<script>window.location.href='" . (string) $url . "'</script>";
    } else {
        return "<script>window.location.href='" . (string) $url . "'</script>";
    }

}

/*******************************************************************
 * Personaliza o gatilho de Erros do PHP
 */
function PHPErro($ErrNo, $ErrMsg, $ErrFile = '', $ErrLine = '')
{
    $translate = [
        'HY000' => 'Algum campo obrigatório não foi passado - #Code [HY000]',
        'Undefined variable' => 'Variável indefinida',
        '42S02' => 'Tabela no Banco de Dados Ausente',
        'Undefined index' => 'Índice indefinido',
        'already defined' => 'Já foi definida',
        'Constant' => 'A Variável Constante',
        'Use of undefined constant' => 'Uso de constante indefinida',
        'failed to open stream: No such file or directory' => 'falha ao abrir conteúdo: nenhum arquivo ou diretório',
        'Missing argument' => 'Argumento ausente',
        'Invalid argument supplied for' => 'Argumento inválido em:',
        'Undefined offset' => 'Entrada indefinida',
        'Array to string conversion' => 'Nível de Array incorreto',
        'No such file or directory' => 'Não existe arquivo ou diretório',
        'this will throw an Error in a future version of PHP' => 'Isso vai causar um erro em uma nova versão do PHP',
        'Illegal String Offset' => 'Deslocamento ilegal de sequências',
        'HY093' => 'Algum input não esta sincronizando com a tabela no banco',
        '42S22' => 'Alguma coluna da Tabela está incorreta',
        '22001' => 'Tipo de dado incompatível com a coluna da tabela',
        '42000' => 'Erro sintaxe MySQL',
        'trying to execute an empty query' => 'tentando executar uma consulta vazia',
        'The use statement with non-compound name' => 'A instrução de "use"',
        'Only variables should be passed by reference' => 'Somente as variáveis ​​devem ser passadas por referência',
        'Trying to access array offset on value of type null' => 'Tentando acessar o deslocamento da matriz no valor do tipo nulo',
    ];
    echo '<div style="
        padding: 15px 5% 5px 5%;
        font-size: 1em;
        background: #4c4c4c;
        border-bottom: 5px solid #bd2010;
        /* margin: 10px; */
        word-wrap: break-word;
    ">'
    . '<h3 style="color: #fff">PHP | Erro na linha: #' . $ErrLine . '</h3>'
    . '<p style="color: #fff">' . strtr($ErrMsg, $translate) . '</p>'
        . '<small style="color: #fff; word-wrap: break-word;">' . $ErrFile . '</small>'
        . '</div>';

    // E_ERROR
    // E_PARSE
    // E_CORE_ERROR
    // E_CORE_WARNING
    // E_COMPILE_ERROR
    // E_COMPILE_WARNING
    // E_STRICT
    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}
set_error_handler('PHPErro');

/*******************************************************************
 * [_ERROR Imprimi erros de uso de funções]
 * @param  [string] $gate [ string a ser filtrada ]
 * @return [echo]         [ view ]
 */
function _ERROR($gate, $type = "ERRO: ")
{
    echo '<div style="
    padding: 15px 5% 5px 5%;
    font-size: 1em;
    background: #4c4c4c;
    border-bottom: 5px solid #bd2010;
    /* margin: 10px; */
    word-wrap: break-word;
    ">';
    echo '<p style="color: #fff"><b>' . $type . '</b> ' . $gate . '</p>';
    echo '</div>';
}

/*******************************************************************
 * [_ERROR Imprimi erros de uso de funções]
 * @param  [string] $gate [ string a ser filtrada ]
 * @return [echo]         [ view ]
 */
function _MESSAGE($gate, $type = "error", $status = true)
{
    $view = '<div class="uk-container uk-cotainer-small uk-padding">';
    if ($type == 'error') {
        $view .= '<div style="
        padding: 15px 5% 5px 5%;
        font-size: 1em;
        background: #4c4c4c;
        border-bottom: 5px solid #bd2010;
        /* margin: 10px; */
        word-wrap: break-word;
        ">';
        $view .= '<p style="color: #fff"><b>ERRO: </b>' . $gate . '</p>';
        $view .= '</div>';
    } elseif ($type == 'info') {
        $view .= '<div style="
        padding: 15px 5% 5px 5%;
        font-size: 1em;
        background: #4c4c4c;
        border-bottom: 5px solid #e8e12a;
        /* margin: 10px; */
        word-wrap: break-word;
        ">';
        $view .= '<p style="color: #fff"><b>INFO: </b>' . $gate . '</p>';
        $view .= '</div>';
    } elseif ($type == 'success') {
        $view .= '<div style="
        padding: 15px 5% 5px 5%;
        font-size: 1em;
        background: #4c4c4c;
        border-bottom: 5px solid #24e820;
        /* margin: 10px; */
        word-wrap: break-word;
        ">';
        $view .= '<p style="color: #fff"><b>OK: </b>' . $gate . '</p>';
        $view .= '</div>';
    }
    $view .= '</div>';
    if ($status):
        echo $view;
    else:
        return $view;
    endif;
}

/*******************************************************************
 * Envia notificações via JS para o usuário
 * @param  [type] $msg  [Mensagem a ser mostrada]
 * @param  string $type [Tipo de mensagem]
 * @return [type]       [View em html]
 */
function _uikit_alert($msg, $type = 'success', $data = true, $element = '.callback-alert')
{
    switch ($type):
case 'success':$tt = 'success';
    break;
case 'info':$tt = 'primary';
    break;
case 'alert':$tt = 'warning';
    break;
case 'error':$tt = 'danger';
    break;
    endswitch;
    $View = "
    <script>
    $('{$element}').prepend(`
    <div class='uk-alert-{$tt}' uk-alert>
        <a class='uk-alert-close' uk-close></a>
        <p>{$msg}</p>
    </div>
    `)
    </script>
    ";
    if ($data) {
            echo $View;
    } else {
        return $View;
    }
}

/*******************************************************************
 * Envia notificações via JS para o usuário
 * @param  [type] $msg  [Mensagem a ser mostrada]
 * @param  string $type [Tipo de mensagem]
 * @return [type]       [View java script]
 */
function _uikit_notification($msg, $type = 'success', $data = true, $pos = 'top-center', $time = '3000')
{
    switch ($type):
case 'error':$msg = $msg . '<span class="error"></span>';
    break;
case 'success':$msg = $msg . '<span class="success"></span>';
    break;
case 'info':$msg = $msg . '<span class="info"></span>';
    break;
    endswitch;
    $View = "
    <style>
    .uk-notification-message .uk-close{ padding: 9px; margin: -9px -5px; }
    .uk-notification-message span{
        width: 100%;
        float: left;
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 99999999999 !important;
    }
    .uk-notification-message{
        background: #f7f7f7 !important;
        color: #16254F !important;
        font-size: 16px !important;
        font-weight: 500 !important;
        padding: 20px 30px !important;
    }
    .uk-notification-message .error{ border-bottom: 5px solid #c50b0b; }
    .uk-notification-message .success{ border-bottom: 5px solid #099a09; }
    .uk-notification-message .info{ border-bottom: 5px solid #e8e12a; }
    .uk-notification-message{
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }
    .uk-notification-message .error,.uk-notification-message .success,.uk-notification-message .info{
        -webkit-border-bottom-right-radius: 5px;
        -webkit-border-bottom-left-radius: 5px;
        -moz-border-radius-bottomright: 5px;
        -moz-border-radius-bottomleft: 5px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
    }
    </style>
    <script>
        UIkit.notification({
        message: '" . $msg . "',
        /* status: 'primary', */
        pos: '" . $pos . "',
        timeout: " . $time . "
        });
    </script>
    ";
    if ($data):
        echo $View;
    else:
        return $View;
    endif;
}

/*******************************************************************
 * Verifica se o arquivo .htaccess existe, senão ele cria um novo na raiz (Root)
 * para garantir o funcionamento correto do sistema
 */
function _check_filehtaccess()
{
        if (!file_exists('.htaccess')):
            $htaccesswrite = "
	        RewriteEngine On\r\n
	        Options All -Indexes\r\n
	        RewriteCond %{SCRIPT_FILENAME} !-f\r\n
	        RewriteCond %{SCRIPT_FILENAME} !-d\r\n
	        RewriteRule ^(.*)$ index.php/$1\r\n
	        RewriteCond %{HTTPS} off\r\n
	        RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=302]\r\n
	        RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]\r\n
	        RewriteRule ^ https://%1%{REQUEST_URI} [R=302,L]\r\n
	        <IfModule mod_expires.c>\r\n
	        ExpiresActive On\r\n
	        ExpiresByType image/jpg \"access 1 year\"\r\n
	        ExpiresByType image/jpeg \"access 1 year\"\r\n
	        ExpiresByType image/gif \"access 1 year\"\r\n
	        ExpiresByType image/png \"access 1 year\"\r\n
	        ExpiresByType text/css \"access 1 month\"\r\n
	        ExpiresByType application/pdf \"access 1 month\"\r\n
	        ExpiresByType text/x-javascript \"access 1 month\"\r\n
	        ExpiresByType application/x-shockwave-flash \"access 1 month\"\r\n
	        ExpiresByType image/x-icon \"access 1 year\"\r\n
	        ExpiresDefault \"access 2 days\"\r\n
	        </IfModule>\r\n
	        <IfModule mod_headers.c>\r\n
	        Header unset ETag\r\n
	        </IfModule>\r\n
	        <ifmodule mod_deflate.c>\r\n
	        AddOutputFilterByType DEFLATE text/text text/html text/plain text/xml text/css application/x-javascript application/javascript\r\n
	        </ifmodule>
	        ";
            $htaccess = fopen('.htaccess', "w");
            fwrite($htaccess, str_replace("'", '"', $htaccesswrite));
            fclose($htaccess);
        endif;
}

/*******************************************************************
 * Faz paginação dos resultados do banco - Compatível apenas com o Bootstrap v.4]
 * @category _do_
 * @param [int] [Por padrão seta 10]
 * @param [string] [tabela do banco para fazer a contagem total de resultados]
 * @param [string] [URL atual para rodar a paginação (para não redirecionar)]
 * @param [string] [limit para implementar na sixtaxe mysql | nav para apresentar o navegador]
 * @param [string] [Sintaxe SQL caso não incluir por padrão retorna o total de resultados]
 * @return [type] [description]
 */
function _do_paginator($page_itens = 10, $table, $url_current, $type = 'limit', $sql = null)
{
    $table = (isset($table)) ? $table : _ERROR('Tabela do banco ausente para a paginação');
    if ($sql == null):
        $sql = _get_data_full('SELECT COUNT(*) FROM ' . $table);
        $limit['total_register'] = $sql[0]['COUNT(*)'];
    else:
        $limit['total_register'] = $sql;
    endif;

    $limit['itens_per_page'] = $page_itens;
    $limit['page_current'] = (isset($_GET['pg']) and $_GET['pg'] != '') ? $_GET['pg'] : 0;
    $limit['total_pages'] = ceil($limit['total_register'] / $limit['itens_per_page']);

    $first = $url_current . '';
    $previus = $url_current . '&pg=' . ($limit['page_current'] - 1);
    $next = $url_current . '&pg=' . ($limit['page_current'] + 1);
    $last = $url_current . '&pg=' . $limit['total_pages'];

    $paginator['nav'] = '<nav aria-label="Page navigation"><ul class="pagination">';

    if ($limit['page_current'] <= 1):
        $paginator['nav'] .= '<li class="page-item disabled"><a class="page-link" href="' . $first . '">Primeira</a></li>';
        $paginator['nav'] .= '<li class="page-item disabled"><a class="page-link" href="' . $previus . '"><<</a></li>';
    else:
        $paginator['nav'] .= '<li class="page-item"><a class="page-link" href="' . $first . '">Primeira</a></li>';
        $paginator['nav'] .= '<li class="page-item"><a class="page-link" href="' . $previus . '"><<</a></li>';
    endif;

    $links = ($limit['total_pages'] >= 5) ? 5 : $limit['total_pages'];
    for ($i = 1; $i < $links; $i++):
        $link = $url_current . '&pg=' . $i;
        $active = ($limit['page_current'] == $i) ? 'active' : '';
        $paginator['nav'] .= '<li class="page-item ' . $active . '"><a class="page-link" href="' . $link . '">' . $i . '</a></li>';
    endfor;
    if (($limit['total_pages'] - 1) <= $limit['page_current']):
        $paginator['nav'] .= '<li class="page-item disabled"><a class="page-link" href="' . $next . '">>></a></li>';
        $paginator['nav'] .= '<li class="page-item disabled"><a class="page-link" href="' . $last . '">Última</a></li>';
    else:
        $paginator['nav'] .= '<li class="page-item"><a class="page-link" href="' . $next . '">>></a></li>';
        $paginator['nav'] .= '<li class="page-item"><a class="page-link" href="' . $last . '">Última</a></li>';
    endif;
    $paginator['nav'] .= '</ul></nav>';
    if ($type == 'limit'):
        return $paginator['limit'] = ' LIMIT ' . $limit['page_current'] . ',' . $limit['itens_per_page'];
    else:
        if ($limit['total_register'] > $limit['itens_per_page']):
            echo $paginator['nav'];
        endif;
    endif;
}

/*******************************************************************
 * Função que zip pastas do sistema. Ideal para disponibilizar
 * download de partes da plataforma no consumo embarcado
 * @copyright 18.12.2020
 * @param  [type] $Folder  [Caminho da pasta]
 * @param  [type] $ZipName [Nome do arquivo ZIP]
 * @return [type]          [Retorno o ZIP]
 */
function _do_zip($Folder, $ZipName)
{
    if (!extension_loaded('zip') || !file_exists($Folder)) {
        return false;
    }
    $zip = new ZipArchive();
    //$zip->open($dest, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true
    if (!$zip->open($ZipName, ZIPARCHIVE::CREATE)) {
        return false;
    }
    $Folder = str_replace('\\', '/', realpath($Folder));

    if (is_dir($Folder) === true) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($Folder), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file) {

            $file = str_replace('\\', '/', $file);
            // Ignore "." and ".." folders
            if (in_array(substr($file, strrpos($file, '/') + 1), array('.', '..'))) {
                continue;
            }
            //$file = realpath($file);
            if (is_dir($file) === true) {
                $zip->addEmptyDir(str_replace($Folder . '/', '', $file . '/'));
            } elseif (is_file($file) === true) {
                $zip->addFromString(str_replace($Folder . '/', '', $file), file_get_contents($file));
            }
        }
    } elseif (is_file($Folder) === true) {
        $zip->addFromString(basename($Folder), file_get_contents($Folder));
    }
    return $zip->close();
}

/*******************************************************************
 * Função que converte string em url amigável
 * @category _do_
 * @param  string $text [text a ser convertido]
 * @return [type]       [view]
 */
function _do_string_to_url($text = '', $view = false)
{
    $arrCaracter = array(
        'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'é' => 'e', 'ê' => 'e', 'í' => 'i', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ú' => 'u', 'ü' => 'u', 'ç' => 'c',
        'Á' => 'a', 'À' => 'a', 'Ã' => 'a', 'Â' => 'a', 'É' => 'e', 'Ê' => 'e', 'Í' => 'i', 'Ó' => 'o', 'Ô' => 'o', 'Õ' => 'o', 'Ú' => 'u', 'Ü' => 'u', 'Ç' => 'c',
        'A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd', 'E' => 'e', 'F' => 'f', 'G' => 'g', 'H' => 'h', 'I' => 'i', 'J' => 'j', 'L' => 'l', 'K' => 'k', 'M' => 'm',
        'N' => 'n', 'O' => 'o', 'P' => 'p', 'Q' => 'q', 'R' => 'r', 'S' => 's', 'T' => 't', 'U' => 'u', 'V' => 'v', 'W' => 'w', 'X' => 'x', 'Y' => 'y', 'Z' => 'z',
        ' ' => '-', '.' => '', ',' => '', ';' => '', ':' => '', '(' => '', ')' => '', '/' => '', '²' => '2',
    );
    $newtext = strtr($text, $arrCaracter);
    $i = 1;
    while ($i > 0) {
        $newtext = str_replace('--', '-', $newtext, $i);
    }

    if (substr($newtext, -1) == '-') {
        $newtext = substr($newtext, 0, -1);
    }

    if ($view):
        echo $newtext;
    else:
        return $newtext;
    endif;
}

/*******************************************************************
 * Função limita texto
 * @param  [string] $var    [variável com o texto]
 * @param  [string] $limit [Limite de caracteres]
 * @return [string]         [Texto resumido]
 */
function _do_resume_text($var, $limit)
{
    if (strlen($var) > $limit):
        return substr_replace($var, '...', $limit);
    else:
        return substr_replace($var, '', $limit);
    endif;
}

/*******************************************************************
 * Verifica a porcentagem de dados de um formulário
 * @param  [type] $countData [valor array ou database]
 * @return [type]            [Valor percentual]
 */
function _do_percent_data($countData = null)
{
    if ($countData):
        $countData = (isset($countData[0])) ? json_decode($countData, true) : $countData;
        $numberFields = count($countData);
        $totalFields = array_filter($countData);
        $totalFields = count($totalFields);
        $countData = ($totalFields * 100) / $numberFields;
        $countData = round($countData, 1);

        echo '<p>O perfil desta informação está em ' . $countData . '%</p>';
        echo '<div class="progress">';
        echo '<div class="progress-bar bg-primary" role="progressbar" style="width: ' . $countData . '%" aria-valuenow="' . $totalFields . '" aria-valuemin="0" aria-valuemax="' . $totalFields . '"></div>';
        echo '</div>';
        echo '<br>';
    else:
        echo '<h5>Complete com informações de sua Empresa</h5>';
        echo '<p>O perfil desta informação está em 0%</p>';
        echo '<div class="progress">';
        echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="12"></div>';
        echo '</div>';
        echo '<br>';
    endif;
}

/*******************************************************************
 * Captura o IP atual do usuário
 */
function _get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    if ($ipaddress == '::1') {
        return SITE_IP_INIT;
    } else {
        return $ipaddress;
    }

}

/*******************************************************************
 * Utiliza a API do ipapi.com para verificar a Localização do IP
 * @param  [type] $ip [Número do ipv4]
 * @return [type]     [response JSON OU ARRAY]
 */
function _geo_ip_location($ip, $return = false)
{
    $access_key = IPAPI_ACCESS_KEY;
    $url = 'http://api.ipapi.com/' . $ip . '?access_key=' . $access_key;
    $headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $response = curl_exec($curl);
    curl_close($curl);

    //$response = simplexml_load_string($response);
    if ($return):
        echo '<pre>';
        print_r(json_decode($response));
        echo '</pre>';
    else:
        return json_decode($response, true);
    endif;
    // $idSessao = $xml -> id;
    // echo $idSessao;
    //exit;
    //return $codigoRedirecionamento;
}

/*******************************************************************
 * Limpa HTML de uma String
 * @category  _filter_
 * @param  [type]  $text   [ String a ser filtrada ]
 * @param  string  $tags   [ tag permitida ]
 * @param  boolean $invert [ Inverter o resultado true | false ]
 * @return void com valor filtrado
 */
function _filter_tags_content($text = '', $tags = '', $invert = false)
{
    preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
    $tags = array_unique($tags[1]);
    if (is_array($tags) and count($tags) > 0):
        if ($invert == false):
            return preg_replace('@<(?!(?:' . implode('|', $tags) . ')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
        else:
            return preg_replace('@<(' . implode('|', $tags) . ')\b.*?>.*?</\1>@si', '', $text);
        endif;
    elseif ($invert == false):
        return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
    endif;
    return $text;
}

/*******************************************************************
 * Limpa Telefone de uma String
 * @category  _filter_
 * @param  [type] $extel  [ String a ser filtrada ]
 * @return [void] com valor filtrado
 */
function _filter_phone_string($extel)
{
    $saidaRe = preg_replace("/(\([0-9]{2,3}\)|[0-9]{2,3}|)[{ ,}]?[0-9]{4,5}[-. ]?[0-9]{4}/i", "", $extel);
    return $saidaRe;
}

/*******************************************************************
 * Limpa cep de uma String
 * @category  _filter_
 * @param  [type] $excep  [ String a ser filtrada ]
 * @return [void] com valor filtrado
 */
function _filter_cep_string($excep)
{
    $cep = preg_match("/([0-9]{5}[-][0-9]{3}|[0-9]{8})/i", $excep);
    if ($cep) {
        return true;
    } else {
        return false;
    }
}

/*******************************************************************
 * Povoa Template HTML com os mesmos nomes das colunas do banco de dados excelente para MVC
 *
 * @param  [file] $tpl              [arquivo HTML com as #nome_do_campo# ou html direto]
 * @param  [array] $dataTableFields [array com os valores do banco]
 * @param  [array] $extraFields     [array com valores adicionais (Mescla com o array do DB)]
 * @param  [boolean]                 [True retorna view - false retorna data]
 * @return [view]                   [retorna HTML povoado com valores dos campos do DB]
 */
function _tpl_fill($tpl, $dataTableFields = '', $extraFields = '', $return = true)
{

    if (file_exists($tpl)) {
        $tpl = file_get_contents($tpl);
    } else {
        $tpl = $tpl;
    }

    if ($dataTableFields != '' and $extraFields != ''):
        $Data[0] = $dataTableFields = array_merge($dataTableFields, $extraFields);

    elseif ($dataTableFields != '' and $extraFields == ''):
        $Data[0] = $dataTableFields;

    else:
        $Data[0] = $extraFields;
    endif;

    foreach ($Data as $values):
        extract($values);
        $links = "#" . implode("#&#", array_keys($values)) . "#";
        $links = explode('&', $links);
        $links = str_replace($links, array_values($values), $tpl);
    endforeach;

    if ($return == true):
        echo $links;
    else:
        return $links;
    endif;
}

/**
 * Método que desmonta a monta a string
 * Sapara nó de String pelo parametro passado
 * e monta novamente com os valores povoados
 * @param [string] $before [valor de início]
 * @param [string] $after  [valor do final]
 * @param [string] $string [string na qual deseja obter o nó]
 * @return array 'before, content e after'
 */
function ElementMount($before, $after, $string)
{
    $string = trim(str_replace(["\n", "\t"], "", $string));
    preg_match_all('/' . $before . '(.*?)' . $after . '/', $string, $Element);
    if (!isset($Element[1][1])):
        $tags = explode($Element[0][0], $string, 3);
        $tpl['before'] = $tags[0];
        $tpl['content'] = $Element[1][0];
        $tpl['after'] = $tags[1];
        return $tpl;
    else:
        return 'Erro ElementMount(): Só é permitido um nó com o mesmo nome em uma TPL';
    endif;
}

/*******************************************************************
 * Método que desmonta a monta a string
 * Sapara nó de String pelo parametro passado
 * e monta novamente com os valores povoados
 * @param [string] $before [valor de início]
 * @param [string] $after  [valor do final]
 * @param [string] $string [string na qual deseja obter o nó]
 * @return array 'before, content e after'
 */
function _tpl_mount($node = 'node1', $string = null, $output = false)
{
    $before = (string) '\[' . $node . '\]';
    $after = (string) '\[\/' . $node . '\]';
    if (strpos($string, '.tpl') || strpos($string, '.html')) {
        $string = (string) file_get_contents($string);
        $string = trim(str_replace(["\n", "\t"], "", $string));
        preg_match_all('/' . $before . '(.*?)' . $after . '/', $string, $Element);
        if (!isset($Element[1][1])) {
            $tags = explode($Element[0][0], $string, 3);
            $tpl['before'] = $tags[0];
            $tpl['content'] = $Element[1][0];
            $tpl['after'] = $tags[1];
            if ($output) {
                echo $tpl;
            } else {
                return $tpl;
            }
        } else {
            if ($output) {
                echo 'Só é permitido um "nó" em um mesm arquivo';
            } else {
                return 'Só é permitido um "nó" em um mesm arquivo';
            }
        }
    } else {
        if ($output) {
            echo 'O 2º parâmetro deve ser um Arquivo do tipo "tpl" ou "html"';
        } else {
            return 'O 2º parâmetro deve ser um Arquivo do tipo "tpl" ou "html"';
        }
    }
}

/*******************************************************************
 * Pega o menu do módulo e inclui na sidebar do painel admin
 * @return string com os links
 */
function _inc_module_sidebar()
{
    $Queue = file_get_contents(ROOT . "_Modules/modules.json");
    $Queue = json_decode($Queue, true);
    ksort($Queue);
    if ($Queue) {
        foreach ($Queue as $Name) {
            $File = file_exists(ROOT . '_Modules/' . $Name . '/sidebar.php');
            if ($File) {
                $_Module = $GLOBALS['_Module'];
                require_once ROOT . '_Modules/' . $Name . '/sidebar.php';
            }
        }
    }
}

/*******************************************************************
 * Motor de URL dos Módulos atraves do metodo GET URL
 * Responsavel por fazer a troca e leitura das telas
 * de todos os módulos da aplicação
 * @return [view] [Retorna require_once das telas de acordo com parametro action]
 * @deprecated desde a versão 1.4.0
 */
function _inc_module($routes = '/actions/', $callback = false)
{
    // Inicio das regras do módulo
    global $_Module, $Extra;
    $URL = filter_input_array(INPUT_GET);
    $Module = $URL['module'];
    $Action = $URL['action'];
    $Query = ($URL) ? '?' . http_build_query($URL) : '';
    $Queue = file_get_contents(ROOT . "_Modules/modules.json");
    $Queue = json_decode($Queue, true);

    if (isset($Module)):
        if ($Queue['active_modules']):
            if (!empty($_SESSION) and $_SESSION['account_level'] >= (int) $_Module[$Module]['USER_LEVEL']):

                // Inclue o preset se existir
                if (file_exists(ROOT . '_Modules/' . $Module . '/presets.php')):
                    require ROOT . '_Modules/' . $Module . '/presets.php';
                endif;

                if (!is_dir(ROOT . '_Modules/' . $Module)):
                    _ERROR('O módulo <b>"' . $Module . '"</b> não foi encontrado');

                elseif (!isset($Action) or empty($Action)):
                    _ERROR('Action Vazia<br>Ação do Módulo "' . $Module . '" Ausente');

                elseif (file_exists(ROOT . '_Modules/' . $Module . $routes . $Action . '.php')):

                    //$_Module = $GLOBALS['_Module'];
                    $_Module = $_Module[$Module];
                    require ROOT . '_Modules/' . $Module . $routes . $Action . '.php';
                    echo $callback = ($callback) ? '<div class="callback"></div>' : '';

                else:
                    _ERROR('Página "' . $Action . '" do módulo "' . $Module . '" ausente!');
                endif;
            else:
                _ERROR('Você não Tem Permissão para usar este Módulo. Contate seu Administrador');
            endif;
        else:
            _ERROR('O módulo "' . $Module . '" não está ativado. Contate a FlexAPP');
        endif;
    else:
        _ERROR('O módulo "' . $Module . '" não existe, contate a FlexAPP');
    endif;
}

/*******************************************************************
 * Motor de URL (ROUTES) dos Módulo
 */
function _inc_module_routes($callback = false)
{
    global $_Module, $Extra;
    $Module = URL()[1];
    $Action = (isset(URL()[2])) ? URL()[2] : false;
    $Queue = json_decode(file_get_contents(ROOT . "_Modules/modules.json"), true);
    if (isset($_Module[$Module]['ROUTES'][$Action])) {
        $Route = ($Action) ? ROOT_MODULE . $Module . '/_routes/' . $Action . '/' . $_Module[$Module]['ROUTES'][$Action]['php'] : '';
        if (isset($Module)) {
            if (isset($Action) || !empty($Action)) {
                if (!empty($_SESSION) && $_SESSION['account_level'] >= (int) $_Module[$Module]['USER_LEVEL']) {
                    if ($Queue['active_modules']) {
                        if (file_exists($Route)) {
                            $_Module = $_Module[$Module];
                            require $Route;
                            echo $callback = ($callback) ? '<div class="callback"></div>' : '';
                        } else {
                            _ERROR("Erro ao abrir rota [{$Action}] do módulo {$Module}.");
                        }
                    } else {
                        _ERROR("O módulo {$Module} não está ativado. Contate o administrador");
                    }
                } else {
                    _ERROR("Você não tem permissão para usar este módulo. Contate o administrador");
                }
            } else {
                _ERROR("A rota/action do módulo {$Module} está ausente!");
            }
        } else {
            _ERROR("O módulo {$Module} não existe ou a rota pode estar incorreta!");
        }
    } else {
        _ERROR("A rota deste módulo não foi declarada");
    }

}

/*******************************************************************
 * Motor de URL dos Módulos atraves do metodo GET URL
 * Responsavel por fazer a troca e leitura das telas
 * de todos os módulos da aplicação
 * @return [view] [Retorna require_once das telas de acordo com parametro action]
 */
function _inc_listing_module()
{
    global $_Module;
    //$_Module = $_Module[$_GET['module']];
    if (!empty($_SESSION) and $_SESSION['account_level'] >= (int) $_Module['USER_LEVEL']) {
        if (isset($_GET['module'])) {
            $URL = filter_input_array(INPUT_GET);
            $Module = $URL['module'];
            if (file_exists(ROOT . '_Modules/' . $Module . '/presets.php')) {
                require_once ROOT . '_Modules/' . $Module . '/presets.php';
            }
            if (!is_dir(ROOT . '_Modules/' . $Module)) {
                _ERROR('O módulo <b>"' . $Module . '"</b> não foi encontrado');
            } elseif (file_exists(ROOT . '_Modules/' . $Module . '/actions/_listing.php')) {
                $_Module = $GLOBALS['_Module'];
                require_once ROOT . '_Modules/' . $Module . '/actions/_listing.php';
            } else {
                _ERROR('Página "' . $Action . '" do módulo "' . $Module . '" ausente!');
            }
        } else {
            echo '<script>window.location.href="' . BASE_ADMIN . '?module=_dash&action=dash-initial";</script>';
        }
    } else {
        _ERROR('Você não Tem Permissão para usar este Módulo. Contate seu Administrador');
    }
}

/**
 * validação de email
 */
function _validationMail($email)
{
    if (!preg_match("/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(.[[:lower:]]{2,3})(.[[:lower:]]{2})?$/", $email)) {
        return ['E-mail inválido', false];
    } else {
        $dominio = explode('@', $email);
        if (!checkdnsrr($dominio[1], 'A')) {
            return ['E-mail inválido', false];
        } else {
            return ['E-mail validado', true];
        }
    }
}

/*******************************************************************
 * Execulta o var_dump completo para ser possivel visualizar as variaveis longas
 * @param  [type] $val [valores a debugar]
 */
function _var_dump($val)
{
    ini_set("xdebug.var_display_max_children", -1);
    ini_set("xdebug.var_display_max_data", -1);
    ini_set("xdebug.var_display_max_depth", -1);
    var_dump($val);
}

/**
 * [_checkValueArray Verifica se o indice existe, não é nulo ou não é vazio]
 * @param  [string] $value   [Valor a ser verificado]
 * @param  [array]  $array   [Valor array vindo do banco podendo ser Null ou Void]
 * @param  [bool]   $unset   [Se true retorno o array com o value excluído]
 * @param  [bool]   $set     [Se true retorno o array com o value incluído]
 * @return [type]            [bool ou Array]
 */
function _checkValueArray($value, $array, $unset = false, $set = false)
{
    // VERIFICA SE NÃO ESTA VAZIO, NULO OU O ID ESTÁ NO JSON
    // DA COLUNA DO BANCO (TRANSFORMAR EM METODO DE CLASS)
    if ($array or $array == '[]'): // TRUE
        $array = json_decode($array, true);
        if ($key = array_search($value, $array)): // contem o id
            if ($unset == true):
                unset($array[$key]);
                return $array;
            elseif ($unset == false and $set == true):
                return $array;
            else:
                return true;
            endif;
        else: // não contem o id
            if ($set == true):
                array_push($array, $value);
                return $array;
            else:
                return false;
            endif;
        endif;
    else: // null e não contem o id
        if ($set == true):
            return [$value];
        else:
            return false;
        endif;
    endif;
}
