<?php
/**
 * Possue metodos para validação e tratativas nas contas
 * @copyright Felipe Oliveira Lourenço - felipe.game.studio@gmail.com - 24.06.2021
 * @version 1.0.0
 */

namespace Account;
use \Datetime;

class Helpers
{

    /**
     * Verifica se a digitação é um e-mail válido RFC 822
     * https://stackoverflow.com/questions/13719821/email-validation-using-regular-expression-in-php/13719870
     */
    public static function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                "OUTPUT" => $email,
                "BOOL" => true,
                "MESSAGE" => (string) 'E-mail válido',
            ];
        }
        return [
            "OUTPUT" => $email,
            "BOOL" => false,
            "MESSAGE" => (string) 'E-mail inválido',
        ];
        // $regex = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{3,4}$/';
        // preg_match($regex, trim($this->data) ));

            // $DNS = array_pop(explode('@', $this->data));
        // if (checkdnsrr($DNS, "MX")) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    /**
     * Valida nome e sobrenome
     */
    public static function validateName($name)
    {
        if ( preg_match('/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\d\s]+$/', $name)){
            if( strlen($name) >= 2 ){
                return [
                    "OUTPUT" => $name,
                    "BOOL" => true,
                    "MESSAGE" => (string) 'Nome válido',
                ];
            }
            return [
                "OUTPUT" => $name,
                "BOOL" => false,
                "MESSAGE" => (string) 'O nome deve conter no mínimo 2 caracteres',
            ];
        }
        return [
            "OUTPUT" => $name,
            "BOOL" => false,
            "MESSAGE" => (string) 'Isso não parece ser um nome',
        ];
    }

    /**
     * Validando telefone
     */
    public static function validatePhone($phone){
        $phone = trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $phone))))));
        // $regexTelefone = "^[0-9]{11}$";
        // $regexCel = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/'; // Regex para validar somente celular
        if (preg_match("/^[0-9]{10,11}$/", $phone)) {
            return [
                "OUTPUT" => $phone,
                "BOOL" => true,
                "MESSAGE" => (string) 'Telefone válido!',
            ];
        }else{
            return [
                "OUTPUT" => $phone,
                "BOOL" => false,
                "MESSAGE" => (string) 'Telefone inválido!',
            ];
        }
    }

    /**
     * Checa a diferença entre data passando minutos por parametro
     * @param $min [Diferença em minutos]
     * @param $Start [Data inicial, podendo ser account_registered]
     * @param $End [Data final para comparar]
     */
    public static function dataDiff($min, $Start, $End)
    {
        $start_date = new DateTime($Start);
        $since_start = $start_date->diff(new DateTime($End));     
        $minutes  = $since_start->days * 24 * 60;
        $minutes += $since_start->h * 60;
        $minutes += $since_start->i;
        if( $minutes < $min){
            return [
                "OUTPUT" => $Start.' - '.$End,
                "BOOL" => true,
                "MESSAGE" => (string) 'Tempo ok!',
            ];
        }
        return [
            "OUTPUT" => $Start.' - '.$End,
            "BOOL" => false,
            "MESSAGE" => (string) 'Tempo expirou, reenvie seu código.',
        ];       
    }
}