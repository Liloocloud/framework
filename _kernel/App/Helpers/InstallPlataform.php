<?php
/**
 * Classe responsável por realizar a instalação da platform
 * onde será soliciada as informações de conexão com o banco de dados
 * @copyright Felipe Oliveira 22-01-2020 
 * @version 1.0.0
 */

namespace Helpers;

class InstallPlataform{

	function __construct(){

		$Data = (bool) _get_data_table(TB_ACCOUNTS)[0];
		if($Data === false):
			$servername = DB_HOST;
			$username = DB_USER;
			$password = DB_PASS;
			$dbname = DB_DBSA;
			$sql = file_get_contents(ROOT."_Kernel/database.sql");
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conn->exec($sql);
				$msg = new disparaMSG();
				$msg->msgSucesso("Tabela criada com sucesso!");
			}
			catch(PDOException $e){
				_ERROR($sql."<br>".$e->getMessage());
				_ERROR('Não foi possível instalar o banco de dados');
			}
			$conn = null;
		// else:
		// 	_ERROR('Não foi possível instalar o banco de dados');
		endif;

	}
}