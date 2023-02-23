<div class="uk-container uk-container-medium uk-margin">
	<div uk-grid>
		<div class="uk-width-expand@m">

			<!-- RETORNO DAS MENSAGENS -->
			<div class="callback-alert uk-margin-top"></div>

			<!-- PAINEL DE COINS MOBILE -->
			<div id="money-view" class="uk-hidden@m">
				<p>Incluir os detalhes das moedas aqui</p>
			</div>
			
			<!-- MENU BÁSICO DESKTOP -->
			<style>
				.uk-navbar-nav>li.uk-active>a {
					background: #d4d4d488;
					border-radius: 0px !important;
				}
			</style>
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
			[node1][/node1]

		</div>
		<!-- PAINEL DE COINS DESKTOP -->
		<div class="uk-width-1-4@m uk-visible@m">
			<div class="uk-card uk-card-primary uk-card-body" style="z-index: 20;" uk-sticky="offset: 120; bottom: #top">
				<h3>Minhas Moedas</h3>
				<h4>#account_coin#</h4>
				<a href="#href_coin#" class="uk-button uk-button-default">#btn_coin#</a>
			</div>
		</div>
	</div>
</div>

<!-- MENU BÁSICO MOBILE -->
<div id="navbar-fixed-bottom" class="flex-nav-dashboard uk-hidden@m">
	<div class="uk-flex uk-flex-center uk-child-width-expand">
		<a href="#href_disponiveis#" class="uk-button"><i uk-icon="icon: file-text; ratio: 2"></i></a>
		<a href="#href_aceitos#" class="uk-button"><i uk-icon="icon: unlock; ratio: 2"></i></a>
		<a href="#href_favoritos#" class="uk-button"><i uk-icon="icon: star; ratio: 2"></i></a>
		<a href="#href_rejeitados#" class="uk-button"><i uk-icon="icon: ban; ratio: 2"></i></a>
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