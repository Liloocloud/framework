<?php
/**
 * Controla a paginação completa com todos os links em Uikit
 * @copyright Felipe Oliveira - 22-11-2019
 * @version 1.4.0
 */

namespace Helpers;

class Paginator{
	private $page;    // Atualiza a página corrente
	private $limit=5; // Limite de resulatados por página
	private $table;   // Tabela do banco que será utilizada
	private $args;    // Argumentos WHERE em array para busca no banco
	private $total;   // Após setada a tabela, conta o total de resultados
	private $url;     // Trás a URL atual para avitar paginação em outro link
	private $sintaxe; // Sintaxe Adicional ao Comando SQL (Ex. ORDER BY xxx DESC)
	private $sql; 	  // Sintaxe SQL caso o sistema necessite de algo em específico

	function __construct($PG, $LIMIT, $TABLE, $ARGS, $URL=BASE, $SINTAXE='', $SQL=false){
		$this->page = $PG;
		$this->limit = $LIMIT;
		$this->table = $TABLE;
		$this->args = $ARGS;
		$this->url = $URL;
		$this->sintaxe = $SINTAXE;
		$this->sql = $SQL;
	}

	/**
	 * Retorna todos os valores do banco 
	 */
	public function Results(){
		if($this->Page() and $this->sql == false):

			if( isset($this->args) OR $this->args != '' ){
				$where = 'WHERE ';
				$statement 	= '';			
				foreach ($this->args as $key => $value):
					$where 	  .= "`{$key}` = :{$key} AND "; 
					$statement.= "{$key}={$value}&";
				endforeach;
				$where = substr($where, 0, -4);
				$select = "SELECT * FROM `{$this->table}` {$where}{$this->AddSintaxe()}{$this->Limit()}";
				$statement = substr($statement, 0, -1);
				$res = _get_data_full( $select, $statement );	
			
			}else{
				$select = 'SELECT * FROM `'.$this->table.'` '.$this->AddSintaxe().$this->Limit();
				$res = _get_data_full( $select );
			}

			return ($res)? $res : false;
		else:
			$res = _get_data_full( $this->sql.$this->Limit() );
			return ($res)? $res : false;
		endif;
	}

	/**
	 * Retorna o HTML da paginação (Compatível com o UIKIT)
	 * já com os cáculos de paginação
	 */
	public function Navigation($output=true){
		if($this->Results()):
			$Total =  ( $this->Total() / $this->limit );
			$Check = strpos( $Total, '.' );
			if($Check):
				$Check = explode('.', $Total)[1];
				$Total = (int) ($Check > 0)? floor($Total) + 1 : $Total;
			else:
				$Total = (int) $Total;
			endif; 
			$view = '<ul class="uk-pagination uk-flex uk-flex-center">';

			// Anterior
			if($this->Page() <= 1) $view.= '<li class="uk-disabled fix"><a href="">Anterior</a></li>';
			else $view.= '<li class="fix"><a href="'.$this->url.'page='.($this->Page() - 1).'">Anterior</a></li>';

			// Primeira página
			if($this->Page() == 1) $view.= '<li class="uk-disabled uk-visible@m"><a href="">1</a></li>';
			else $view.= '<li class="uk-visible@m"><a href="'.$this->url.'page=1">1</a></li>';
			
			// Separador
			$view.= '<li class="uk-disabled uk-visible@m"><span>...</span></li>';

			// 3 Anteriores
			if($this->Page())
				for ($i=3; $i >= 1 ; $i--):
					$n[$i] = $this->Page() - $i;
					if($n[$i] > 1)
						$view.= '<li class="uk-visible@m"><a href="'.$this->url.'page='.$n[$i].'">'.$n[$i].'</a></li>';
				endfor;
		
			// Página atual
			if($this->Page()) $view.= '<li class="uk-active uk-visible@m"><span>'.$this->Page().'</span></li>';

			// 3 Próximas
			if($this->Page())
				for ($i=1; $i <= 3 ; $i++):
					$n[$i] = $this->Page() + $i;
					if($n[$i] < $Total)
						$view.= '<li clas="uk-visible@m"><a href="'.$this->url.'page='.$n[$i].'">'.$n[$i].'</a></li>';
				endfor;
		
			// Separador
			$view.= '<li class="uk-disabled uk-visible@m"><span>...</span></li>';

			// última página
			if($this->Page() == $Total) $view.= '<li class="uk-disabled uk-visible@m"><a href="">'.$Total.'</a></li>';
			else $view.= '<li class="uk-visible@m"><a href="'.$this->url.'page='.($Total).'">'.$Total.'</a></li>';
			
			// Próxima
			if( $this->Page() <= ($Total-1)) $view.= '<li class="fix"><a href="'.$this->url.'page='.($this->Page() +1).'">Próximo</a></li>';
			else $view.= '<li class="uk-disabled fix"><a href="">Próximo</a></li>';

			$view.= '</ul>';
			if($output){
				echo $view;
			}else{
				return $view;
			}
		endif;
	}

	### METODES PRIVATES ###

	/**
	 * 	Retorna o Total de resultados da tabela
	 */
	public function Total(){
		if($this->sql == false):

			if( isset($this->args) OR $this->args != '' ){
				$fileds	= ''; 
				$where = 'WHERE '; 
				$statement = '';
				foreach ($this->args as $key => $value):
					$fileds   .= "{$key},";
					$where    .= "`{$key}` = :{$key} AND "; 
					$statement.= "{$key}={$value}&";
				endforeach;		
				$fileds		= substr($fileds, 0, -1);
				$where 		= substr($where, 0, -4);
				$statement  = substr($statement, 0, -1);
				
				$count = _get_data_full("
					SELECT COUNT('{$fileds }') AS total FROM ".$this->table." {$where}",
					"{$statement}"
				);

			}else{
				$count = _get_data_full("SELECT COUNT(*) AS total FROM ".$this->table );				
			}

			return ($count)? (int) $count[0]['total'] : false;
		else:
			$count = _get_data_full( $this->sql );
			return count($count);
		endif;


	}

	/**
	 * Retorna o calculo da página atual
	 */
	private function Page(){
		if($this->page == '') $this->page = 'page=1';
		$page = ($this->page)? explode('=', $this->page)[1] : 1;
		$page = ( $page[1] < 1 )? 1 : $page[1];
		return (int) $page;
	}

	/**
	 * Monta a sintaxe do LIMIT para incluir no SQL
	 */
	private function Limit(){
		if($this->Page() <= 1)
			return 'LIMIT '.($this->Page()-1).','.$this->limit;
		else
			return 'LIMIT '.( $this->limit * ($this->Page()-1) ).','.$this->limit;
	}

	/**
	 * Monta a sinta ADICIONAL para incluir no SLQ
	 */
	private function AddSintaxe(){
		if($this->sintaxe != '')
			return "{$this->sintaxe} ";
		else
			return '';
	}
	
}