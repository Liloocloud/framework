<?php
/**
 * Auxiliar a Class Nativa Create | Read | Update | Delete
 * @copyright Felipe Oliveira - 07.04.2017
 * @update 11.01.2021
 * @update 09.09.2022 - $limit na funcão _get_data_table com 3º param
 * @update 27.01.2023 - Erro ao atualizar somando +4 no banco
 * @version 2.2.2
 */

/**
 * Montar a sintaxe "WHERE" para ser utilizada nas funções abaixo
 * @see Função apenas de uso deste documento
 * MQWS - Mount Query Where and Statements
 * @param Array Condições WHERE por campo e valor em cada array
 */
function _this_MQWH($where)
{
	$w = "WHERE "; $s = ''; $i = 1;
    foreach ($where as $key => $value) {
        $w .= "`{$key}` =:a{$i} AND ";
        $s .= "a{$i}={$value}&";
        $i++;
    }
    $w = substr($w, 0, -5);
    $s = substr($s, 0, -1);
	return [ 'w' => $w, 's' => $s ];
}

/**
 * Pega dados por condição WHERE
 * @param String [$table] Passa o nome da tabela
 * @param Array $args (array['values']) e (array['where']) valores e condições where a serem alterados
 * @param Int [$limit] Passar todas as condições em array associativo
 * @return Array
 */
function _get_data_table(string $table, array $args = [],  int $limit = null)
{
	$limit = ($limit != null)? " LIMIT {$limit}" : '';
    $data = new Database\Read;
    if ($args){
		$w = _this_MQWH($args)['w'].$limit;
        $data->ExeRead($table, $w, _this_MQWH($args)['s']);       
	}else{
        $data->ExeRead($table);
	}
	return $data->getResult();
}

/**
 * Pega dados do banco por condicões em modo avançado com prepare statements
 * @param String [$terms] Termo completo da sintaxe do banco | Valores por prepare statements
 * @var String [$statement]  Sequencia das variaveis dos termos
 */
function _get_data_full(string $terms, $statements = '')
{
    $data = new Database\Read;
    $data->FullRead($terms, $statements);
    return $data->getResult();
}

/**
 * Inserir dados em uma tabela
 * @param String [$table] Tabela
 * @param Array [$args] Campos da table em array Key=>value
 * @return Array/Boolean
 */
function _set_data_table($table, array $args)
{
    $Set = new Database\Create;
    $Set->ExeCreate($table, $args);
    $Result = $Set->getResult();
    if ($Result){
        return $Result;
	}
	return false;    
}

/**
 * Atualiza dados em uma tabela por condição where genericamente
 * @param String $table (string) noma da tabela
 * @param Array $args (array['values']) e (array['where']) valores e condições where a serem alterados
 * @return Boolean
 */
function _up_data_table($table, array $args)
{
    $Up = new Database\Update;
    $Up->ExeUpdate($table, $args['values'], _this_MQWH($args['where'])['w'], _this_MQWH($args['where'])['s']);
    if ($Up->getResult()) {
        return true;
    }
    return false;
}

/**
 * Deleta linha do banco por condição where
 * @param String [$table] Tabela
 * @param Array [$args] Condições da clausua WHERE
 * @return Boolean
 */

function _del_data_table($table, $args = [])
{
    $data = new Database\Delete;
    $data->ExeDelete($table, _this_MQWH($args)['w'], _this_MQWH($args)['s']);
    if ($data->getResult()){
        return true;
	}
    return false;
}