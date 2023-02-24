<?php
/**
 * DIPs são Métodos que Retornar 3 paratros obrigatoriamente
 * Esses parametros permiter uma estrutura de controle em cascata 
 * sendo lidas pela class DipSwicth. 
 */

namespace Module\Accounts;
require_once 'DipAccount.php';
require_once 'DipEntities.php';

class Source
{
	use DipAccount;
	use DipEntities;
	
}
