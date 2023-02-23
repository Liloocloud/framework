<?php
/**
 * Class responsável com compilar formulários em JSON 
 * não terá acesso a banco de dados, apenas manipulador de array e json
 * 
 * @copyright (c) 2020 - Felipe Oliveira Lourenço - 22.04
 */

namespace Helpers;

class FormCompile{
	
	private $data;  	// Array com  as informações Array ou JSON
	private $tpl;		// Defina qual TPL o campo será renderizado
	private $typeField;	// Tipo do campo que está compilando 

	function __construct($data){
		$this->data = $data;
	}

	public function render($tpl, $typeField){
		
	}


}