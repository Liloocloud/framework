<?php
/**
 * Class de manipulação de datas. Usar apenas se o PHP não possuir solução
 * pronta para esta finalidade 
 * @copyright Felipe Oliveira Lourenço - 04.01.2021
 * @version 1.0.0
 */

namespace Helpers;


/**
 * Formata data e hora para padrão Brasileiro]
 * @param  [Date] $timestamp 	[Variável do tipo CURRENT_TIMESTAMP]
 * @param  [Strind] $language  	[Opções - pt-BR, en-US]
 * @return [type]            	[Horário do tipo (language) Convertido ]
 */
function _do_convert_timestamp($timestamp, $type=false, $language="pt-BR"){
	switch ($language){
		case 'pt-BR':
			if(!$type){
				return date('d/m/Y \à\s H:i:s', strtotime($timestamp));
			}else{
				return date('d/m/Y', strtotime($timestamp));
			}
			break;
	}
}


/**
 * Compara o tempo em minutos entre duas datas 
 * @param  [type] $init  [data inicial ou do cadastro]
 * @param  [type] $atual [data atual (par padrão insere date())]
 * @return [type]        [Diferença em minutos]
 */
function _do_compare_date_atual($init, $atual=false){
	$atual = ($atual)? $atual : date("Y-m-d H:i:s");
	return (strtotime($atual) - strtotime($init)) / 60;	
}