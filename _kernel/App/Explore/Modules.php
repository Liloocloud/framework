<?php
/**
 * Responsável por manipular as regras de desenvolvimento dos módulo.
 * Responsável também pela manipulação dos arquivos como: listagem, require,
 * permissões e etc.
 * @copyright Felipe Oliveira Lourenço - 24.02.2021
 * @version 1.0.0
 *
 */
namespace Explore;

class Modules
{

	private $globals;
    private $queue;

    function __construct()
    {
		global $_Module;
		$this->globals = $_Module;
		$this->queue = json_decode(file_get_contents(MODULE_QUEUE), true);

    }

	/**	
	 * Lista todos os módulos ativos no sistema
	 * Pega como referencia o arquivo modules.json
	 */
    public function active()
    {
		return $this->queue['active_modules'];
    }

	/**	
	 * Lista todos os módulos ativos no sistema
	 * Pega como referencia o arquivo modules.json
	 */
    public function activeSidebarQueue()
    {
		return $this->queue['active_sidebar_modules_queue'];
    }

	/**	
	 * Lista todos os módulos ativos no sistema
	 * Pega como referencia o arquivo modules.json
	 */
    public function activeSidebarConfig()
    {
		return $this->queue['active_sidebar_modules_config'];
    }

	/**	
	 * Retorna todas as informações dos módulos como:
	 * Caminho dos arquivos ajax, imagem de capa, versão atual do módulo,
	 * todas a rotas disponíveis e etc. tudo isso para uso e manipulação
	 * no painel admin ou console
	 */
	public function allData()
	{		
		$Data = [];
		foreach ($this->globals as $key => $value) {
			$Data[$key] = [
				'NAME_MODULE' => $value['NAME_MODULE'],
				'DESCRIPTION' => $value['DESCRIPTION'],
				'ICON_MODULE' => $value['ICON_MODULE'],
				'SCREEN' => $value['SCREEN'],
				'VERSION' => $value['VERSION'],
				'INIT' => $value['ROUTES']['INIT'],
			];			
		}
		return $Data;
	}

}
