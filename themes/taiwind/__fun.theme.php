<?php
/**
 * Arquivo Nativo do Tema, para incluir scripts php
 * @copyright Felipe Oliveira Lourenço - 23/05/2019
 * @updata 27.01.2023
 * @version 1.2.0
 */

/**
 * Reindexa array organizando os indices pelo parametro start
 * @param  Array   $arr   [Array não recursivo]
 * @param  Int $start [Inicio da reindexação]
 * @return Array [Array reindexado]
 */
function _array_reindex($arr, $start = 0)
{
    $arr = array_combine(range($start, count($arr) + ($start - 1)), array_values($arr));
    return $arr;
}

/**
 * Validade Telefone Celular
 * @param String [type] $phone [número do telefone]
 */
function _frontend_phone_validate($phone)
{
    $phone = strtr($phone, ['(' => '', ')' => '', ' ' => '', '-' => '', '.' => '']);
    if (strlen($phone) >= 10 and strlen($phone) <= 11 and ctype_digit($phone)) {
        return true;
    }
    return false;
}

/**
 * Construtor de menu do tema. Roda apenas os links dentro das divs
 * @param Json [type] $json_menu [arquivo JSON com Rótulo |  href  ]
 * @return Html
 */
function frontend_builder_menu($json_menu = null)
{
    if (!isset($json_menu)) {
        $Data = json_decode($json_menu, true);
    } else {
        $Data = json_decode($json_menu, true);
    }

    if ($Data) {
        $menu = '';
        foreach ($Data as $key => $value) {
            if (!is_array($value)) {
                $menu .= '<li><a href="' . $value . '">' . $key . '</a></li>';
            } else {
                $menu .= '<li><a href="#">' . $key . '</a>';
                $menu .= '<div class="uk-navbar-dropdown">';
                $menu .= '<ul class="uk-nav uk-navbar-dropdown-nav">';
                foreach ($value as $subkey => $subvalue) {
                    $menu .= '<li><a href="' . $subvalue . '">' . $subkey . '</a></li>';
                }
                $menu .= '</ul></div></li>';
            }
        }
        echo $menu;
    } else {
        echo '';
    }
}

/**
 * Contagem de Horas
 * @param Datetime [type] $hour [Variavel com As Horas]
 * @return String [type] - [Retorna HTML com as Horas]
 */
function timeHoras($hour)
{
    $bit2 = array(' hora' => $hour / 3600 % 24);
    foreach ($bit2 as $k => $v) {
        if ($v > 1) {
            $ret2[] = $v . $k . 's';
        }

        if ($v == 1) {
            $ret2[] = $v . $k;
        }

    }
    array_splice($ret2, count($ret2) - 1, 0);
    $ret2[] = 'atrás.';
    return join(' ', $ret2);
}

/**
 * Contagem de minutos
 * @param  [type] $secs [Variavel com Segundos]
 * @return [type]       [Retorna HTML com os minutos]
 */
function timeMinutos($secs)
{
    $bit = array(' minuto' => $secs / 60 % 60);
    foreach ($bit as $k => $v) {
        if ($v > 1) {
            $ret[] = $v . $k . 's';
        }

        if ($v == 1) {
            $ret[] = $v . $k;
        }

    }
    array_splice($ret, count($ret) - 1, 0);
    $ret[] = 'atrás.';
    return join(' ', $ret);
}

/**
 * Formata data e hora para padrão Brasileiro
 * @param  [type] $subData [Variavel com o horario a ser convertido]
 * @return [type]          [Retorno HTML]
 */
function subDataHora($subData)
{
    return date('d/m/Y \à\s H:i:s', strtotime($subData));
}

/**
 * Conta o tempo de publicação do post
 * @param  [type] $hora_inicial [Hora em Timestamp]
 * @return [type]               [Retorno HTML]
 */
function timePost($hora_inicial, $time = true)
{
    $HoraIni = strtotime($hora_inicial);
    $HoraFim = time();
    $segundos = ($HoraFim - $HoraIni);
    if ($segundos <= 3600) {
        return timeMinutos($segundos);
    } else if ($segundos >= 3601 and $segundos <= 86400) {
        return timeHoras($segundos);
    } else if ($time) {
        return subDataHora($hora_inicial);
    } else {
        return subData($hora_inicial);
    }

}