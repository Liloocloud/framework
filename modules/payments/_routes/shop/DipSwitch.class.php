<?php
/**
 * Matriz de desenvolvimento de regras de negócio. O Intuitu deste arquivo
 * é seguir o conceito planejado, afim de acelerar o dev. diminuindo
 * a quantidade de estrutura de controle em "ifs". Com isso precisamos incluir 
 * o máximo de interruptores (switchs) 
 * @copyright Criado por Felipe Oliveira - felipe.game.studio@gmail.com
 * @since 24.07.2020
 * @version 1.0.0 
 * @see Dê uma olhada na documentação
 * @category bool_ métodos que retornam bool 
 * @category json_ métodos que retornam json
 * @category xml_ métodos que retornam xml
 * @category array_ métodos que retornam xml
 * @category href_ métodos que retornam redirecionando
 * @category do_ métodos que executam tarefas especificas e retorna void,bool ou dados
 */

use \Create\Create;
use \Read\Read;
use \Update\Update;
use \Delete\Delete;

Class DipSwitch(){


	public function checkAccount(){
		return ['Sua mensagem genérica aqui', 'dip #0001', true];
	}


}
