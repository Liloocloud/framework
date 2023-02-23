<?php
/**
 * Página que recebe o link do email de confirmação de conta
 * @copyright Felipe Oliveira Lourenço - 26.04.2020
 */

if(isset(URL()[1])):
	switch (URL()[1]):
		
		// Não foi possível atualizar
		case 'noupdate':
			echo '
			<div class="uk-container uk-container-small uk-text-center uk-padding-large">
				<h1>Houve um erro interno na atualização da sua senha</h1>
				<div class="uk-card uk-card-default uk-card-body">
					<h2>Pedimos que solicite novamente a alteração de senha</h2>
				</div>
				<div class="uk-alert-primary" uk-alert>
					<p>Em casos extremos o email pode demorar até 10 minutos para ser enviado</p>
				</div>
			</div>
			';
			break;
		
		// Expirou
		case 'expired':
			echo '
			<div class="uk-container uk-container-small uk-text-center uk-padding-large">
				<h1>Seu link de redefinição de senha expirou!</h1>
				<div class="uk-card uk-card-default uk-card-body">
					<h2>Pedimos que solicite novamente a alteração de senha</h2>
				</div>
				<div class="uk-alert-primary" uk-alert>
					<p>Em casos extremos o email pode demorar até 10 minutos para ser enviado</p>
				</div>
			</div>
			';
			break;

		// Redefinicação de Senha Expirou
		case 'rpexpired':
			echo '
			<div class="uk-container uk-container-small uk-text-center uk-padding-large">
				<h1>Este link de redefinição não é mais válido!</h1>
				<div class="uk-card uk-card-default uk-card-body">
					<h2>Pedimos que solicite novamente a alteração de senha</h2>
				</div>
			</div>
			';
			break;

		// Usuário não existe
		case 'nouser':
			echo '
			<div class="uk-container uk-container-small uk-text-center uk-padding-large">
				<h1>A conta que você está tentando alterar não existe</h1>

				<div class="uk-card uk-card-default uk-card-body">
					<h2>Você pode se cadastrar clicanco no link abaixo</h2>
					<a href="https://vamove.com.br/cadastre-se/" class="uk-button uk-button-primary">Cadastre-se</a>
				</div>

				<div class="uk-alert-primary" uk-alert>
					<p>Em casos extremos o email pode demorar até 10 minutos para ser enviado</p>
				</div>
			</div>
			';
			break;

	endswitch;
endif;

if(isset($_GET['account']) && isset($_GET['key'])){
	echo "<script>
		window.addEventListener('load', function(event){
			Flex.RequestServer(
				'account_password_validate_redefine',
				'_Modules/_account/actions/_CRUD',
				'{$_GET['account']},{$_GET['key']}',
				true
				)
		})
		</script>";
}else{
	echo 'Nada encontrado';
}


