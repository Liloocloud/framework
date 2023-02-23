<?php
/**
 * Página de mensagem ao usuário que o email foi enviado
 * e está aguardando validação
 * @copyright Felipe Oliveira Lourenço - 23.04.2020
 */

if(isset(URL()[1])){

	$Tpl = new Templates;
	switch (URL()[1]) {
	
		/******************************************
		 * TEMPO NÃO EXPIRADO, PORÉM STATUS = 0
		 */
		case 'novalidate':
			echo '
			<div class="uk-container uk-container-small uk-text-center uk-padding-large">
				<h1>Ok. Agora só falta validar sua conta!</h1>
				<div class="uk-card uk-card-default uk-card-body">
					<h2>
					Enviamos um link de confirmação para o seu email. <br>
					Verifique a caixa de entrada. Lembre-se de olhar o spam caso não encontre o e-mail.
					</h2>
				</div>
				<p>Falta pouco para você receber orçamentos de clientes no seu seguimento</p>	
				<div class="uk-alert-primary" uk-alert>
					<p>
					Você tem 1 hora para validar sua conta, se não for possível 
					validar neste período refaça seu cadastro.
					</p>
				</div>
				<div class="uk-alert-primary" uk-alert>
					<p>Em casos extremos o email pode demorar até 10 minutos para ser enviado</p>
				</div>
			</div>
			';
			break;

		/******************************************
		 * EXPIRADO, MENSAGEM DE REENVIAR LINK
		 */
		case 'resendlink':
			$Tpl->TemplatePart(PATH_THEME.'tpl/msg_link_expired.tpl');
			break;

		/******************************************
		 * LINK DE VALIDAÇÃO NÃO EXISTE
		 */
		case 'nolink':
			echo '
			<div class="uk-container uk-container-small uk-text-center uk-padding-large">
				<h1>Ops! Este link de validação não existe.</h1>
				<div class="uk-card uk-card-default uk-card-body">
					<h2>Você pode se cadastrar ou logar</h2>
				</div>
				<p>
					<a href="https://vamove.com.br/login/" class="uk-button uk-button-primary">Login</a>
					<a href="https://vamove.com.br/cadastre-se/" class="uk-button uk-button-primary">Cadastre-se</a>
				</p>	
			</div>
			';
			break;


		/******************************************
		 * LINK DE VALIDAÇÃO NÃO EXISTE
		 */
		case 'validaded':
			echo '
			<div class="uk-container uk-container-small uk-text-center uk-padding-large">
				<h1>Sua conta já foi validada.</h1>
				<div class="uk-card uk-card-default uk-card-body">
					<h2>Se você esqueceu suas informações de login entre em contato conosco</h2>
				</div>
			</div>
			';
			break;

		
		/******************************************
		 * MENSAGEM DE TUDO CERTO AGORA SO FALTA VALIDAR A CONTA 
		 */
		case 'sendlink';
			echo '
			<div class="uk-container uk-container-small uk-text-center uk-padding-large">
				<h1>Ok. Agora só falta validar sua conta!</h1>
				<div class="uk-card uk-card-default uk-card-body">
					<h2>Enviamos um link de confirmação para o seu email. <br> Verifique a caixa de entrada. Lembre-se de olhar o spam caso não encontre o e-mail.</h2>
				</div>
				<p>Falta pouco para você receber orçamentos de clientes no seu seguimento</p>	
				<div class="uk-alert-primary" uk-alert>
					<p>Você tem 1 hora para validar sua conta, se não for possível validar neste período refaça seu cadastro.</p>
				</div>
				<div class="uk-alert-primary" uk-alert>
					<p>Em casos extremos o email pode demorar até 10 minutos para ser enviado</p>
				</div>
			</div>
			';
			break;
	}

}else{
	// redirecionar para o cadastro
}
_frontend_messageGET();