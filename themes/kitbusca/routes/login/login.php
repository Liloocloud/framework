<div class="uk-grid-collapse uk-child-width-1-2@m uk-flex-middle" uk-grid>
	<div class="uk-background-cover uk-visible@m" style="background-image: url('<?php echo BASE_THEMES ?>assets/img/login.jpg');" uk-height-viewport>
	</div>
	<div class="uk-padding-large">
		<a href="<?php echo BASE?>"><img class="mb-4" src="<?php echo SITE_LOGO_SMALL ?>" alt="Login" width="30%"></a>
		<h3 class="uk-heading-small">Login</h3>		
		<?php 	
			$tpl = new Templates;
			$tpl->TemplatePart(PATH_THEME.'tpl/form_login.tpl');
		 ?>
		<p class="uk-margin-top"><a href="<?php echo BASE ?>cadastre-se/">Cadastre-se</a></p>

		<!-- <p>Não tem cadastro ainda? <a href="<?php echo BASE ?>cadastre-se/">Cadastre-se aqui</a></p> -->
		<p class="mt-5 mb-3 text-muted">Vamove.com.br &copy; <?php echo date("Y") ?></p>
	</div>
</div>

<?php
_frontend_messageGET();

$email = URL();
if(isset($email[1])):
	$email = base64_decode($email[1], true);
	if($email):
		echo "<script>
			$('input[name=\"account_email\"]').val('{$email}');
			$('input[name=\"account_password\"]').focus();
		 </script>";
	endif;
endif;
session_destroy();
?>