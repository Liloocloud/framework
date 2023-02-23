<style>
	.uk-navbar-nav>li.uk-active>a {
		background: #d4d4d488;
		border-radius: 0px !important;
	}
	.uk-button-coins{
		padding: 0 !important;
		background-color: #F5A113 !important;
		color: #031424 !important;
		font-size: 16px !important;
		letter-spacing: -0.8px !important;
		font-weight: 500 !important;
	}
	.uk-button-coins:hover{
		color: #FFFFFF !important;
		background-color: #D1227C !important;
	}

	/* LISTVIEW */
	#page-content .uk-icon{
		width: 16px !important;
		margin: -4px 4px 0 0 !important;
	}

</style>

<div style="background: #fff; padding-bottom: 55px;">
	<div class="uk-container uk-container-medium uk-margin">
		<div class="uk-grid-small" uk-grid>
			
			<div class="uk-width-expand@m">

				<!-- RETORNO DAS MENSAGENS -->
				<!-- <div class="callback-alert uk-margin-top"></div> -->

				<!-- PAINEL DE COINS MOBILE -->
				<div class="uk-margin uk-margin-top uk-hidden@m">
					<div class="uk-background-top-center flex-radius uk-background-cover uk-light" data-src="#uploads#dashboard-coins-mobile.jpg" uk-img style="min-height: 50px; padding-top: 70px;">
						<div class="uk-flex uk-flex-middle uk-padding" uk-grid>
							<div class="uk-width-1-2">
								<h4 class="uk-margin-remove-bottom">Você tem</h4>
								<p style="font-size: 30px !important; color: #fff;" class="uk-margin-remove-top">#account_coin# <small style="font-size: 16px;">moedas</small></p>
							</div>
							<div class="uk-width-expand">
								<a href="#href_coin#" class="uk-button uk-button-coins uk-width-1-1">Comprar mais Moedas</a>
							</div>							
						</div>						
					</div>
				</div>

				<!-- MENU BÁSICO DESKTOP -->
				<nav class="flex-nav-dashboard uk-navbar-container uk-margin uk-visible@m" uk-navbar>
					<div class="uk-navbar-center">
						<ul class="uk-navbar-nav">
							<li #link_active_disponiveis#><a href="#href_disponiveis#" class="uk-button uk-button-text uk-text-left"><i uk-icon="icon: file-text;"></i>&nbsp; Disponíveis</a></li>
							<li #link_active_aceitos#><a href="#href_aceitos#" class="uk-button uk-button-text uk-text-left"><i uk-icon="icon: unlock;"></i>&nbsp; Aceitos</a></li>
							<li #link_active_favoritos#><a href="#href_favoritos#" class="uk-button uk-button-text uk-text-left"><i uk-icon="icon: star;"></i>&nbsp; Favoritos</a></li>
							<li #link_active_rejeitados#><a href="#href_rejeitados#" class="uk-button uk-button-text uk-text-left"><i uk-icon="icon: ban;"></i>&nbsp; Rejeitados</a></li>
						</ul>
					</div>
				</nav>

				<!-- CARREGA AS PÁGINAS -->
				<div id="page-content">
					[node1][/node1]
				</div>

			</div>


			<!-- PAINEL DE COINS DESKTOP -->
			<div class="uk-width-1-4@m uk-visible@m">
				<div style="z-index: 20;" uk-sticky="offset: 100; bottom: #top">
					<div class="uk-background-top-center flex-radius uk-background-cover uk-light" data-src="#uploads#dashboard-coins.jpg" uk-img style="min-height: 50px; padding-top: 150px;">
						<div class="uk-padding">
							<h4 class="uk-margin-remove-bottom">Você tem</h4>
							<p style="font-size: 30px; color: #fff;" class="uk-margin-remove-top">#account_coin# 
								<small style="font-size: 16px;">moedas</small>
							</p>
							<a href="#href_coin#" class="uk-button uk-button-coins" style="padding: 0 15px !important;">Comprar mais Moedas</a>			
						</div>						
					</div>
				</div>
			</div>

		</div> <!-- /grid -->
	</div> <!-- /container -->
</div> <!-- /total -->

<!-- MENU BÁSICO MOBILE -->
<div id="navbar-fixed-bottom" class="flex-nav-dashboard uk-hidden@m">
	<div class="uk-flex uk-flex-center uk-child-width-expand">
		<a href="#href_disponiveis#" class="uk-button"><i uk-icon="icon: file-text;"></i></a>
		<a href="#href_aceitos#" class="uk-button"><i uk-icon="icon: unlock;"></i></a>
		<a href="#href_favoritos#" class="uk-button"><i uk-icon="icon: star;"></i></a>
		<a href="#href_rejeitados#" class="uk-button"><i uk-icon="icon: ban;"></i></a>
	</div>
</div>

<!-- MODAL QUE INDICA QUANTIDADE DE MOEDAS E REDIRECIONA PARA A COMPRA -->
<div id="modal-example" uk-modal>
	<div class="uk-modal-dialog uk-modal-body">
		<h2 class="uk-modal-title">Headline</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<p class="uk-text-right">
			<button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
			<button class="uk-button uk-button-primary" type="button">Save</button>
		</p>
	</div>
</div>
