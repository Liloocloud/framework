<div class="uk-flex uk-flex-center  uk-background-cover uk-light" data-src="#uploads#patter_001.svg" uk-img style="min-height: 620px;">
	<div class="uk-container uk-text-center uk-container-small  uk-padding-large">
		
		<a class="uk-hidden@m" href="#base#"><img class="mb-4" src="#logo_small_white#" alt="Login" width="70%"></a>
		<a class="uk-visible@m" href="#base#"><img class="mb-4" src="#logo_small_white#" alt="Login" width="30%"></a>

		<h1 style="font-size: 55px !important; color: #fff; line-height: 50px">
		Precisa de <span style="color: #ff1b95">Clientes?</span><br> A Vamovê tem pra Você!
		<p style="font-size: 22px" class="uk-margin-bottom">Cadastre-se e Veja os Serviços Disponíveis!</p>
		<p style="font-size: 18px">Sem mensalidades, sem pegadinhas! Você investe apenas em serviços que realmente interessam e fica com 100% do valor do serviço realizado.</p>
	</div>
</div>

<div class="uk-background-center-left uk-background-norepeat" uk-parallax="bgy: -300" style="background-image: url(#uploads#patter_003.svg); min-height: 550px; background-size: 500px;">
	<div class="uk-container uk-container-small">

		<div class="uk-visible@m" style="margin-top: -200px;"></div>

		<div class="uk-child-width-1-2@m uk-flex-middle" uk-grid>
			<div class="uk-background-cover uk-visible@m uk-padding-large">
				<img src="#uploads#preencha-o-formulario-para-se-cadastrar.png" alt="">
			</div>
			<div>
				<div class="uk-card uk-card-default uk-card-body">
					<form data-custom>
						<input type="hidden" name="action" value="account_create_email">
						<input type="hidden" name="custom-url" value="_Modules/_account/actions/_CRUD">

						<div class="uk-margin-small">
							<label class="uk-form-label">Nome</label>
							<input class="uk-input" type="text" name="account_name" autofocus required autocomplete="cc-name">
						</div>

						<div class="uk-margin-small">
							<label class="uk-form-label">E-mail</label>
							<input class="uk-input" type="email" name="account_email" required>
						</div>

						<div class="uk-margin-small">
							<div class="uk-form-label">Crie uma senha</div>
							<div flex-form-password name="account_password"></div>
						</div>

						<div class="uk-margin-medium-top">
							<p style="font-size: 13px">Ver o <a href="#modal-contract" uk-toggle>contrato</a> da Vamovê. Ao cadastrar-me, declaro que sou maior de idade e aceito as <a href="#modal-private" uk-toggle>Políticas de Privacidade</a> e os <a href="#modal-terms" uk-toggle>Termos e Condições de Uso</a> da Vamovê.</p>
						</div>

						<button class="uk-button uk-button-primary uk-margin-top" type="submit">Criar conta</button>
						<p class="uk-margin-top"><a href="#base#login/">Já tenho uma conta</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Caracteristicas -->
<div id="como-funciona" class="uk-container uk-text-center uk-padding uk-margin-large-bottom">
	<h2 style="font-size: 35px !important;">O que é e como Funciona a Plataforma Vamove?</h2>
	<p class="uk-margin-large-bottom">
		Somos uma plataforma de serviços, onde potenciais clientes solicitam orçamentos de qualquer lugar do Brasil. 
	Esses orçamentos ficam disponíveis no painel interno dos profissionais cadastrados. Conectamos esses Profissionais a Clientes com necessidades reais de serviço. Veja como é facil receber orçamentos na Plataforma Vamove!</p>

	<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
		<div>
			<div class="uk-card uk-card-default uk-card-body">
				<p><img width="50px" height="50px" src="#base_themes#assets/img/search.svg" alt="Pesquisa de Serviços"></p>
				<h3 class="uk-card-title">Seleção do serviço</h3>
				<p>O cliente seleciona o serviço desejado pelo nosso buscador ou menu de forma rápida, fácil e gratuita!</p>
			</div>
		</div>
		<div>
			<div class="uk-card uk-card-default uk-card-body">
				<p><img width="50px" height="50px" src="#base_themes#assets/img/order.svg" alt="Escolha a Empresa"></p>
				<h3 class="uk-card-title">Preencha o Formulário</h3>
				<p>O Cliente Preencha o formulário com as informações do serviço que deseja contratar.</p>
			</div>
		</div>
		<div>
			<div class="uk-card uk-card-default uk-card-body">
				<p><img width="50px" height="50px" src="#base_themes#assets/img/paper.svg" alt="Receba Orçamentos"></p>
				<h3 class="uk-card-title">Receba Orçamentos</h3>
				<p>Visualize as solicitações de orçamentos em sua dashboard e negocie as melhores condições para você.</p>
			</div>
		</div>
	</div>	
</div>

<img src="#uploads#banner-cadastre-se.jpg" alt="">

<div style="background: #012545;">
	<div class="uk-container uk-padding uk-light uk-text-center">

		<div class="uk-child-width-1-2@m uk-flex-middle" uk-grid>
			<div>
				<h2>Faça parte desta jornada você também! Nós estaremos sempre juntos para fazer do mercado um lugar melhor.</h2>
			</div>
			<div>
				<a href="#" class="uk-button uk-button-primary uk-button-large" style="color: #fff; font-size: 20px;">Cadastre-se agora</a>
			</div>
		</div>
	
	</div>
</div>

<div class="uk-padding-small uk-text-center uk-light" style="background: #001528;">
	<p>Vamove.com.br &copy; #date#</p>	
</div>


<!-- Modal do Contrato -->
<div id="modal-contract" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header">
			<h2 class="uk-modal-title">Contrato de Adesão</h2>
		</div>
		<div class="uk-modal-body" uk-overflow-auto>
			#content_contract#
		</div>
		<div class="uk-modal-footer uk-text-right">
			<button class="uk-button uk-button-primary uk-modal-close" type="button">Fechar</button>
		</div>
	</div>
</div>



<!-- Modal da política  -->
<div id="modal-private" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header">
			<h2 class="uk-modal-title">Política de Privacidade</h2>
		</div>
		<div class="uk-modal-body" uk-overflow-auto>
			#content_private#
		</div>
		<div class="uk-modal-footer uk-text-right">
			<button class="uk-button uk-button-primary uk-modal-close" type="button">Fechar</button>
		</div>
	</div>
</div>

<!-- Modal dos termos e condições -->
<div id="modal-terms" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header">
			<h2 class="uk-modal-title">Termos e Condições de Uso</h2>
		</div>
		<div class="uk-modal-body" uk-overflow-auto>
			#content_terms#
		</div>
		<div class="uk-modal-footer uk-text-right">
			<button class="uk-button uk-button-primary uk-modal-close" type="button">Fechar</button>
		</div>
	</div>
</div>


