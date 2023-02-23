<?php 
/**
 * Gerencia os Arquivos e pastas dos módulo para servir os sistema
 * de automação de carregamento de arquivos 
 * @copyright Felipe Oliveira Lourenço - 07.01.2021
 * @version 1.0.0
 */


namespace Explore;
use Explore\OpenDirFile;

class Explore extends OpenDirFile
{
	private $Path = ROOT.'_Modules/'; 	// Pasta dos Módulos
	private $allPaths;  				// Guarda a lista de todas pastas da pasta setada
	
	function __construct($path=null){
		$this->Path = (isset($path))? $path : $this->Path;
		$List = new OpenDirFile($this->Path); 
		$listing = [];
		foreach ($List->list() as $dirs){
	      if(is_dir($this->Path.$dirs)){
	      	array_push($listing, $dirs);
	      }
	    }
		$this->allPaths = $listing;
	}

	/**
	 * Listagem de todas os módulos existente (Dado pelo nome da pasta)
	 */
	public function list():array
	{
		return [
			"RETURN" => $this->allPaths,
			"BOOL" => true,
			"MESSAGE" => "Lista de todas as pastas da PATH: \"{$this->Path}\"",
		];
	}

	/**
	 * Acessa a pasta indicada no parametro ('class' será a pasta padrão) de cada módulo. Lembrando que, caso 
	 * seja feito refactoring o nome da pasta 'class' será incorreta
	 */
	public function allReadDir($dir='class'):array
	{
		$All=[];
		foreach ($this->allPaths as $Directories) {
			$All[$Directories][$dir] = [];
			if(is_dir($this->Path.$Directories.'/'.$dir)){
				$Files = scandir($this->Path.$Directories.'/'.$dir);
				$key = array_search('..', $Files);
				if($key!==false){
				    unset($Files[0]);
				    unset($Files[1]);
				}
				// array_push($All[$Directories][$dir], $Files);
				$All[$Directories][$dir] = $Files;
			}else{
				unset($All[$Directories]);
			}
		}
		return [
			"RETURN" => $All,
			"BOOL" => true,
			"MESSAGE" => "Este é o conteúdo da pasta \"{$dir}\" da PATH: \"{$this->Path}\"",
		];
	}
}