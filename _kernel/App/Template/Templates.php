<?php
/**
 * Class Responsável por povoar a template com as views 
 * @copyright Felipe Oliveira Lourenço 27.05.2019
 * @version 1.1.0
 * @update 04.01.2021
 */

namespace Template;

class Templates extends SEO{
	
	public $url;		// URL da página
	public $type;		// Blog | Page | article | etc
	public $content;
	public $status;
	public $PATH = PATH_THEME;
	
	function __construct(){
		$db = false; //_get_data_table( TB_CONTENTS, [ 'content_url' => URL::ReturnURL()[0] ] );
		if($db):
			$this->content = $db[0];
		else:
			$this->content = [];
		endif;
	}
	

	public function Path($path=null){
		$this->PATH = ($path==null)? $this->PATH : $path;
	}

	/**
	 * Inclui a Doctype com Auxilio do Class SEO 
	 */
	public function Doctype(){
		if(file_exists(PATH_THEME."inc/doctype.php")):
			global $Extra;
			$fill = [
				'assets' => BASE_FRONTEND.'assets/img/',
				'title' => SEO::getTitle(),
				'keywords' => SEO::getKeywords(),
				'description' => SEO::getDescription(),
				'canonical' => BASE,
				'path_themes' => BASE_FRONTEND,
				'google_verification' => GOOGLE_VERIFICATION,
				'facebook_api_id' => FACEBOOK_APP_ID,
				'site_name' => SITE_NAME,
				'perfil' => '@'.str_replace(" ","_",mb_strtolower(SITE_NAME))
			];
			_tpl_fill(PATH_THEME."inc/doctype.php", $Extra, $fill, true);
			//require_once $this->PATH."inc/doctype.php";
		else:
			_ERROR('Crie um arquivo "doctype.php" na pasta "inc" do seu Tema "'.THEMES.'"');
		endif;
	}

	/**
	 * Inclui a Header
	 */
	public function Header(){
		if(file_exists(PATH_THEME."inc/header.php")):
			require_once $this->PATH."inc/header.php";
		else:
			_ERROR('Crie um arquivo "header.php" na pasta "inc" do seu Tema "'.THEMES.'"');
		endif;
	}

	/**
	 * Inclui a footer
	 */
	public function Footer(){
		if(file_exists(PATH_THEME."inc/footer.php")):
			require_once $this->PATH."inc/footer.php";
		else:
			_ERROR('Crie um arquivo "footer.php" na pasta "inc" do seu Tema "'.THEMES.'"');
		endif;
	}

	/**
	 * Inclui a Copyright
	 */
	public function Copyright(){
		if(file_exists(PATH_THEME."inc/copyright.php")):
			require_once $this->PATH."inc/copyright.php";
		else:
			_ERROR('Crie um arquivo "copyright.php" na pasta "inc" do seu Tema "'.THEMES.'"');
		endif;
	}	

	/**
	 * Inclui os scritps
	 */
	public function Script(){
		if(file_exists(PATH_THEME."inc/script.php")):
			require_once $this->PATH."inc/script.php";
		else:
			_ERROR('Crie um arquivo "script.php" na pasta "inc" do seu Tema "'.THEMES.'"');
		endif;
	}

	/**
	 * Inclui um tpl view especificada no parametro
	 * @param [type] $template [description]
	 */
	public function TemplatePart($tpl=null){
		if( $tpl==null ):
			_ERROR('Especifique um template view');
		else:
			require_once $tpl;
		endif;
	}

	/**
	 * Lê o conteúdo do template mantendo a Header | Footer | Script
	 * @param $template [ Indica o arquivo que deseja incluir ]
	 */
	public function TemplateDinamic($template=null){
		$template = ($template ==  null)? 'content' : $template ;
		// Se existe URL [0]
		if(URL::ReturnURL()[0] and URL::ReturnURL()[0] != '' ):				
			// Verifica se o arquivo Existe Primeiro
			// Se não existir arquivo, verifica se tem no banco
			// Checa Valor da URL no banco e joga num array Global $_Template
			// Não existe Valor então inclui 404	
			if(file_exists(PATH_THEME.URL::ReturnURL()[0].".php")):
				$this->content = ''; 
				require_once $this->PATH.URL::ReturnURL()[0].".php";		
			else: 
				$db = _get_data_table( TB_CONTENTS, [ 'content_url' => URL::ReturnURL()[0] ] );
				if($db):
					$this->content = $db[0];
					$_Template = $db[0];
					require_once $this->PATH.$template.".php";
				else:
					$this->content = '';
					require_once $this->PATH."404.php";
				endif;
			endif;
		else:
			$this->content = '';
			require_once $this->PATH."index.php";
		endif;
	}

	/**
	 * Retorna o Conteúdo da Página se existir no Banco
	 */
	public function Content(){
		return $this->content;
	}

	/**
	 * Retorna Array da URL
	 */
	public function GetURL(){
		return URL::ReturnURL();
	}

	/**
	 * Converte Título em URL Amigável
	 * @return [string] [String do título convertida em URL]
	 */
	private function TitleToURL(){
		$Arr = [
			'á'=>'a','à'=>'a','ã'=>'a','â'=>'a','é'=>'e','ê'=>'e','í' =>'i','ó'=>'o','ô'=>'o','õ'=>'o','ú'=>'u','ü'=>'u','ç'=>'c',
			'Á'=>'a','À'=>'a','Ã'=>'a','Â'=>'a','É'=>'e','Ê'=>'e','Í'=>'i','Ó'=>'o','Ô'=>'o','Õ'=>'o','Ú'=>'u','Ü'=>'u','Ç'=>'c',
			'A'=>'a','B'=>'b','C'=>'c','D'=>'d','E'=>'e','F'=>'f','G'=>'g','H'=>'h','I'=>'i','J'=>'j','L'=>'l','K'=>'k','M'=>'m',
			'N'=>'n','O'=>'o','P'=>'p','Q'=>'q','R'=>'r','S'=>'s','T'=>'t','U'=>'u','V'=>'v','W'=>'w','X'=>'x','Y'=>'y','Z'=>'z',
			' '=>'-','.'=>'',','=>'',';'=>'',':'=>'','('=>'',')'=>'','/'=>''
		];
		$this->url = strtr($this->title, $Arr);
	 	$i=1;
	 	while( $i > 0) $this->url = str_replace('--', '-', $this->url, $i);
		if (substr($this->url, -1) == '-') $this->url = substr($this->url, 0, -1);
		return $this->url;
	}

}