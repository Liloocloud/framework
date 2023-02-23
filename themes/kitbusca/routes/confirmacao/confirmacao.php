<?php
/**
 * Página que recebe o link do email de confirmação de conta
 * @copyright Felipe Oliveira Lourenço - 26.04.2020
 */

// var_dump(URL());

if(isset(URL()[1])){
echo "<script>
	window.addEventListener('load', function(event){
		Flex.RequestServer(
			'account_validation_email',
			'_Modules/_account/actions/_CRUD',
			'".URL()[1]."',
			true
			)
	})
	</script>";
}