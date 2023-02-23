<div style="background-color: #052847">
	<div class="uk-container uk-text-center uk-container-small uk-light">
		<h1 class="uk-margin-large-top">Dúvidas frequentes</h1>
		<p style="font-size: 22px" class="uk-margin-large-bottom">Estamos sempre prontos para te ajudar!</p>
	</div>	
</div>

<div class="uk-container uk-container-small uk-padding-large">
	<div class="uk-text-center" uk-switcher="animation: uk-animation-fade; toggle: > *">
		<button class="uk-button uk-button-primary" type="button">Sou Cliente</button>
		<button class="uk-button uk-button-primary" type="button">Sou Anunciante</button>
	</div>
	<ul class="uk-switcher uk-margin">
		
		<!-- Cliente -->
		<li>
			<ul uk-accordion>
				<?php
				require_once PATH_THEME.ROUTES.'duvidas-frequentes/faq-client.php';
				foreach ($faq['client'] as $client):
					_tpl_fill(PATH_THEME.ROUTES.'duvidas-frequentes/comp_accordion.tpl','',$client);
				endforeach;
				?>
			</ul>
		</li>

		<!-- Anunciante -->
		<li>
			<ul uk-accordion>
				<?php
				require_once PATH_THEME.ROUTES.'duvidas-frequentes/faq-company.php';
				foreach ($faq['company'] as $company):
					_tpl_fill(PATH_THEME.ROUTES.'duvidas-frequentes/comp_accordion.tpl','',$company);
				endforeach;
				?>	
			</ul>
		</li>
	</ul>
</div>