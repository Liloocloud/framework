<?php
/**
 * SessionAdmin.class [ CORE ]
 * Classe responável por manipular as sessões, tráfego e acesso
 * Cria estatística junto a tabela lemon_statistics
 * 
 * @copyright (c) 2018, Felipe Oliveira Lourenço - Lemon Flex
 */

class Session{
	
	private $Date; // Dia das estatísticas
	private $Cache; // Para poder personalizar o tempo de sessão
	private $Traffic; // Gerenciar o tráfego no site
	private $Browser; // Para fazer a contagem de cada navegador


	/**
	 * Iniciaçlização 
	 * @param [int] $Cache [tempo de sessão]
	 */
	function __construct($Cache = 1440){
		session_start();
		$this->CheckSession($Cache);
	}

	/**
	 * Verifica e Executa todos os métodos da classe
	 */
	private function CheckSession($Cache = null){
		$this->Date = date("Y-m-d");
		$this->Cache = ( (int) $Cache ? $Cache : 1440 );

		if(empty($_SESSION['online_user'])):
			$this->setTraffic();
			$this->setSession();
		else:
			$this->trafficUpdate();
			$this->sessionUpdate();
		endif;

		$this->Date = null;
	}

	/**
	 * Inicial a sessão do usuário
	 */
	private function setSession(){
		$_SESSION['online_user'] = [
			"online_session" => session_id(),
			"online_star_views" => date('Y-m-d H:i:s'),
			"online_end_views" => date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes")),
			"online_ip" => filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP),
			"online_url" => filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT),
			"online_agent" => filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_DEFAULT)
		];
	}

	/**
	 * Atualiza sessão do usuário
	 */
	private function sessionUpdate(){
		$_SESSION['online_user']['online_end_views'] = date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes"));
		$_SESSION['online_user']['online_url'] = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
	}

	/**
	 * Verifica e insere o tréfego na tabela
	 */
	private function setTraffic(){
		$this->getTraffic();
		//var_dump($this->getTraffic());
		if(!$this->Traffic):
			$args = [
				'statistic_date' => $this->Date,
				'statistic_users' => 1,
				'statistic_views' => 1,
				'statistic_pages' => 1	
			];
			_set_data_table(TB_MODULE_STATISTICS, $args);
		else:
			if(!$this->getCookie()):
				$args = [
					'values' => [
						'statistic_users' => $this->Traffic['statistic_users'] + 1,
						'statistic_views' => $this->Traffic['statistic_views'] + 1,
						'statistic_pages' => $this->Traffic['statistic_pages'] + 1
					],
					'where' => [
						'statistic_date' => $this->Date
					]
				];
			else:
				$args = [
					'values' => [
						'statistic_views' => $this->Traffic['statistic_views'] + 1,
						'statistic_pages' => $this->Traffic['statistic_pages'] + 1
					],
					'where' => [
						'statistic_date' => $this->Date
					]
				];
			endif;

			_up_data_table(TB_MODULE_STATISTICS, $args);
		endif;
	}

	/**
	 * Verifica e Atualiza os pageviews
	 */
	private function trafficUpdate(){
		$this->getTraffic();
		$args = [
			'values' => [
				'statistic_pages' => $this->Traffic['statistic_pages'] + 1
			],
			'where' => [
				'statistic_date' => $this->Date
			]
		];
		_up_data_table(TB_MODULE_STATISTICS, $args);
	}	


	/**
	 * Obtém os dados da tabela
	 */
	private function getTraffic(){
		$args = ['statistic_date' => $this->Date ];
		$Views = _get_data_full('SELECT * FROM `'.TB_MODULE_STATISTICS.'` WHERE `statistic_date` = '.$this->Date.'');
		//$Views = _get_data_table(TB_MODULE_STATISTICS, $args);
		if($Views):
			$this->Traffic = $Views;
		endif;
	}

	/**
	 * Método para Obter o s Cokies do navegador
	 */
	private function getCookie(){
		$Cookie = filter_input(INPUT_COOKIE, 'online_user', FILTER_DEFAULT);
		setcookie('online_user', base64_encode("lemonflex"), time() + 86400 );  // Cookie válido por 24 horas
		if(!$Cookie):
			return false;
		else:
			return true;
		endif;
	}

}