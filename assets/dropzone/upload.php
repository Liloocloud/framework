<?php
// echo json_encode($_FILES);
// var_dump($_FILES);
// exit;


define('THIS_ROOT', dirname(__FILE__)."\\");
define('THIS_UPLOAD', './uploads/');


if(isset($_FILES)){
	
	for ($i=0; $i < count($_FILES['files']['name']); $i++) { 
		if(
			move_uploaded_file(
				$_FILES['files']['tmp_name'][$i], 
				THIS_UPLOAD.$_FILES['files']['name'][$i]
			)
		){
			$JSON = [
				'bool' => true,
				'output' => $_FILES,
				'message' => 'Arquivos carregados com sucesso!'
			];
		}else{
			$JSON = [
				'bool' => false,
				'output' => null,
				'message' => 'Não foi possível carregar arquivos'
			];
		}
		
	}

}else{
	$JSON = [
		'bool' => false,
		'output' => null,
		'message' => 'Nenhum dado passado'
	];
}
if($JSON!=null)
	echo json_encode($JSON);