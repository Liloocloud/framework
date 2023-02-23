<?php
/**
 * Leitor dos Dips utilizando Traits como parte dos módulos
 * @copyright Criado por Felipe Oliveira - felipe.game.studio@gmail.com
 * @since 31.07.2020
 * @version 3.1.1 
 */

namespace Dipswitch;

class DipRead{

	private $param; 	  // Parametros em array da Class
	private $bool;  	  // Saída True ou False para pausar o script
	private $fail;		  // Mensagem do primeiro Dip que falhar    
	public $methodFail;  // Retorna o metodo que falhou
	private $output;	  // Todos os resultados de todos os Dips
	// private $message;  // Sistema de mensagem da class
	private $exec; 		  // Guarda os dados da função exec();

	function __construct(array $param=[])
	{
		if(!empty($param) && is_array($param)){
			$this->param = $param;
		}else{
			$this->param = null;
		}
		$this->exec();
	}

	/**
	 * Retorna a mensagem do primeiro Dip que parou a execução
	 */
	public function fail()
	{
		$Out = null;
		foreach ($this->exec as $key => $value){
			if($this->exec[$key]['OUTPUT'] == null && $this->exec[$key]['BOOL'] === false){
				$Out =  $this->exec[$key]['MESSAGE']; 
			}
		}
		return $Out;
	}

	/**
	 * Saída true ou false para interromper a execução 
	 * caso necessária. Ideal para verificar se, a cadeia
	 * de dips funcionou retornando true, senão para e retorna false
	 */
	public function bool():bool
	{	
		$i=0;
		foreach ($this->exec as $key => $DipBool){
			$DipBool = $this->exec[$key]['BOOL'];
			if($DipBool === false){
				$Bool[$i] = false;
				$this->fail = $this->exec[$key]['MESSAGE'];
				break;
			}
			$Bool[$i] = $DipBool;
			$i++;	
		}
		$Output = array_filter($Bool);
		if(count($Bool) != count($Output)){
			$Bool = false;
		}else{
			$Bool = true;
		}
		return $this->output = $Bool;
	}


	/**
	 * Metodo público para obter os dados da execução
	 */
	public function output():array
	{
		return $this->exec;
	}


	/**
	 * Executa todos os Dips da cadeia e retorna todos os resultados mesmo sendo true ou false
	 */
	private function exec():array
	{	
		// $Dip = 'Dip_'.(string) rand(0,9999);
		$i=1;		
		foreach ($this->param as $Key => $type) {	
			$Res = preg_split('/=|->/', $Key); // Divide a string para pegar o namespace
			$Return[$Res[1]] = []; // Inicia a var do retorno
			@eval("\$Dip_{$i} = new {$Res[0]};"); // Instancia as Classes com eval()
			if(is_array($type)){
				$Array = '[';			
				foreach ($type as $ind => $data){
					if(!is_array($data)){ // Array simples
						$Array.= "'{$ind}' => '{$data}',";
					}else{ // Array multidimensional (array dentro do array)
						$mArr = "[";
						foreach ($data as $akey => $aval) {
							$mArr.= "{$akey} => '$aval',";
						}
						$mArr = substr($mArr, 0, -1);
						$mArr.= "]";
						$Array.= "'{$ind}' => {$mArr},";
					}
				}
				$Array = substr($Array, 0, -1);
				$Array.=']';
				@eval("array_push(\$Return[\$Res[1]], \$Dip_{$i}->{$Res[1]}({$Array}));");
			}
			elseif(is_null($type)){
				@eval("array_push(\$Return[\$Res[1]], \$Dip_{$i}->{$Res[1]}());");

			}
			else{
				@eval("array_push(\$Return[\$Res[1]], \$Dip_{$i}->{$Res[1]}({$type}));");
			}
			$i++;
			$Return[$Res[1]] = $Return[$Res[1]][0];
		}
		return $this->exec = $Return;
	}
}