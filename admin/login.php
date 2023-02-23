<?php
/**
 * Template: Area Administrativa - Lemon Flex Console
 * @copyright Felipe Oliveira  <felipe.game.studio@gmail.com> 25.02.2018
 * @version 2.0 [ Atualizado em 13.11.2021 ]
 */
ob_start();
session_start();
session_destroy();
require_once "../_Kernel/___Kernel.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Plaforma para soluções web personalizadas">
	<meta name="author" content="Felipe Oliveira Lourenço">
	<title>Login FlexApp Smart Plataform</title>

	<link href="<?= BASE_ASSETS ?>fontawesome/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?= BASE_ASSETS ?>uikit/css/uikit.min.css" rel="stylesheet" type="text/css">
	<link href="<?= BASE_ASSETS ?>custom/css/admin.css" rel="stylesheet" type="text/css">

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<!-- <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script> -->
	<script src="<?= BASE_ASSETS ?>jquery/jquery-3.4.0.min.js"></script>
	<script src="<?= BASE_ASSETS ?>uikit/js/uikit.min.js"></script>
	<script src="<?= BASE_ASSETS ?>uikit/js/uikit-icons.min.js"></script>
	<!-- <script src="https://cdn.flexapp.com.br/flexboot/1.4/flexboot.js"></script> -->
	<!-- <script src="<?= BASE_ASSETS ?>liloo/js/lilooJS-2.0.js"></script> -->
	
	<style>
	@media only screen and (max-width: 960px) {
		.liloo-form-mobile {
				display: flex;
				align-items: center;
				justify-content: center;
				position: absolute;
				top: 0px !important;
				bottom: 0px !important;
				overflow: auto;
			}
		}
	</style>
</head>
<body base-url="<?= BASE ?>" root="<?= BASE ?>">
	<div id="page-login">
		<div class="uk-grid-collapse uk-child-width-1-2@m uk-flex uk-flex-middle" uk-grid>
			<div class="uk-background-cover uk-visible@m" style="background-image: url('<?= BASE_ADMIN ?>images/login.jpg');" uk-height-viewport>
			</div>
			<div class="uk-padding-large liloo-form-mobile">
				<div>
					
					<?php
					if(isset($_GET['e'])){
						switch ($_GET['e']) {
							case 'nolevel':
								$msg = 'Você não tem permissão para acessar o painel. Entre em contato conosco para mais informações';
								break;
							
							default:
								$msg = 'Erro desconhecido';
								break;
						}

						echo '
						<div class="uk-alert-danger" uk-alert>
							<a class="uk-alert-close" uk-close></a>
							<p>'.$msg.'</p>
						</div>';
					}
					?>


					<img src="<?= BASE_ADMIN ?>images/logotipo.svg" alt="Login" width="100px">
					<h3>Entrar</h3>			
					<form data-liloo method="post">
						<input type="hidden" name="action" value="account_login">
						<input type="hidden" name="path" value="modules/accounts/ajax/ManagerAccounts">
						<input type="hidden" name="init" value="<?= BASE_ADMIN ?>dash/init/">
						<div class="uk-margin">
							<input name="account_email" class="uk-input uk-width-1-2@m uk-form-large" type="text" placeholder="E-mail" autofocus required>
						</div>
						<div class="uk-margin">
							<input name="account_password" class="uk-input uk-width-1-2@m uk-form-large" type="password" placeholder="Senha" required>
						</div>
						<button class="uk-button uk-button-primary" type="submit">Entrar</button>
						<!-- <p class="uk-margin-large-top"><a href="<?= BASE_ADMIN ?>redefinir-senha/">Esqueci minha senha</a></p> -->
						<!-- <p>Não tem cadastro ainda? <a href="<?= BASE_ADMIN ?>cadastre-se/">Cadastre-se aqui</a></p> -->
						<p class="uk-margin-large-top uk-text-small">Liloo Cloud &copy; 2009 - <?php echo date("Y") ?></p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="callback"></div>
	<script src="<?= BASE_ASSETS ?>liloo/js/lilooJS-2.0.js"></script>
</body>
</html>
<?
ob_end_flush();