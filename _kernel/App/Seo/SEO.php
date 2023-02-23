<?php
/**
 * Class Responsável por povoar a template com as views
 * @copyright Felipe Oliveira Lourenço 27/05/2019
 * @version 1.0.0
 */

class SEO extends URL{
	
	public $title;
	public $description;
	public $keywords;

	/**
	 * Retorna Title da página do Banco se URL[0] existir no banco
	 * @return [type] [Title do banco senão coloca SITE_TITLE]
	 */
	public function getTitle(){
		// if(URL::ReturnURL()[0]):
			// $db = _get_data_table(TB_ADS, [ 'ads_url' =>URL::ReturnURL()[0] ] );
			// return ($db)? $db[0]['ads_title'] : SITE_TITLE;
		// else:
			return SITE_TITLE;
		// endif;
	}
	
	/**
	 * Retorna a Descrição da página do Banco se URL[0] existir no banco
	 * @return [type] [Title do banco senão coloca SITE_TITLE]
	 */
	public function getDescription(){
		// if(URL::ReturnURL()[0]):
			// $db = _get_data_table(TB_ADS, [ 'ads_url' =>URL::ReturnURL()[0] ] );
			// return ($db)? $db[0]['ads_title'] : SITE_TITLE;
		// else:
			return SITE_TITLE;
		// endif;
	}

	/**
	 * Retorna a palavras-chave da página do Banco se URL[0] existir no banco
	 * @return [type] [Title do banco senão coloca SITE_TITLE]
	 */
	public function getKeywords(){
		// if(URL::ReturnURL()[0]):
			// $db = _get_data_table(TB_ADS, [ 'ads_url' =>URL::ReturnURL()[0] ] );
			// return ($db)? $db[0]['ads_tags'] : SITE_TITLE;
		// else:
			return SITE_TITLE;
		// endif;
	}
}