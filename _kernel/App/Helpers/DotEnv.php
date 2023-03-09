<?php
/**
 * Gerenciamento de variável de ambiente
 * @copyright 08.03.2023 - Felipe Oliveira Lourenço
 * @version 1.0.0
 */
namespace Helpers;

class DotEnv
{
    private static $path = ROOT.'.env';

    /**
     * Carregamento de Variáveis de ambiente
     */
    public static function load($dir = null)
    {
        if(!file_exists(self::$path)){
            return false;
        }

        $lines = file(self::$path);
        foreach ($lines as $line) {
            $line = trim($line);
            if(!empty($line)){
                putenv($line);
            }
        }
    } 
}