<div class="uk-background-center-left uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="#banner#" uk-img style="min-height: 480px; width: 100%;">
	<div uk-grid>
		<div class="uk-width-1-2@m">
			<h1 style="font-size: 35px !important;" class="uk-padding">#service_title#</h1>
		</div>
		<div></div>
	</div>
</div>


<div class="uk-background-center-left uk-background-norepeat" style="background-image: url(#uploads#patter_003.svg);">
	<div class="uk-container uk-padding">
		<div uk-grid>
			<div class="uk-width-expand@m">

				<div class="uk-card uk-card-default uk-card-body uk-padding-large" style="margin-top: -120px;">
					<h2 class="uk-text-center">Preencha as informações do Serviço</h2>
					<p class="uk-text-center" style="margin-bottom: 50px;">Orçamento grátis e online!</p>
					<form data-custom>
						<input type="hidden" name="action" value="budget_client_create">
						<input type="hidden" name="custom-url" value="frontend/vamove/_php/Orders">
						<input type="hidden" name="service_id" value="#service_id#">
						<input type="hidden" name="group_title" value="#group_title#">
						<input type="hidden" name="service_url" value="#service_url#">
						#require#
						<div class="uk-margin">
							<div class="uk-form-label">Informações Adicionais</div>
							<textarea class="uk-textarea uk-form-medium" name="add_additional" rows="3"></textarea>
						</div>
						<div class="uk-margin">
							<div class="uk-form-label">Para quando precisa do serviço?</div>
							<select name="add_urgency" class="uk-select uk-form-medium" required>
								<option value="">Selecione uma opção</option>
								<option value="O mais breve possível">O mais breve possível</option>
								<option value="Próxima semana">Próxima semana</option>
								<option value="Até 30 dias">Até 30 dias</option>
								<option value="Até 2 meses">Até 2 meses</option>
								<option value="Sem data definida">Sem data definida</option>
							</select>
						</div>
						<button type="submit" class="uk-button uk-button-primary uk-width-1-1 uk-button-large">Solicitar Orçamento</button>
					</form>
				</div>


			</div>
			<div class="uk-width-1-3@m">
				<div class="uk-card uk-card-default uk-card-body">
					<h2>Busque por outro serviço caso você tenha mudado de ideia</h2>
					<p class="uk-margin-bottom">Receba orçamentos de profissionais. Orçamento gratuito e com segurança!</p>
					#form_search#
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Desktop -->
<div class="uk-background-bottom-right uk-background-norepeat" uk-parallax="bgy: -200" style="background-image: url(#uploads#patter_004.svg); min-height: 550px; background-size: 500px;">
	<div class="uk-container uk-margin-large-bottom">
		<div class="uk-flex uk-flex-middle" uk-grid>
			<div class="uk-width-expand@m uk-text-center uk-padding-large">
				<h2 style="font-size: 35px !important;">Você é um profissional?<br> Cadastre-se Agora!</h2>
				<p>A Vamove recebe muitas solicitações de Orçamento. Procuramos Profissionais como você para oferecer seus Serviços. Vamo vê do que você profissional será capaz? Estamos aqui para dar um empurrãozinho!</p>
				<a href="#base#cadastre-se/" class="uk-button uk-button-primary uk-margin-top">Seja um Profissional <i class="fa fa-arrow-circle-right"></i></a>
				<a href="#base#como-funciona/" class="uk-button uk-button-primary uk-margin-top">Como funciona? <i class="fa fa-question-circle"></i></a>
			</div>
			<div class="uk-width-1-3@m uk-text-right">
				
			</div>
		</div>
	</div>
</div>


<script>
	$('.alter_search').on('click', function(){
		$('.form_dig').show()
		$('.form_dig input[name="term"]').focus()
		$('.alter_term').show()
		$('.form_cat').hide()
		$('.alter_search').hide()
	})
	$('.alter_term').on('click', function(){
		$('.form_dig').hide()
		$('.alter_term').hide()
		$('.form_cat').show()
		$('.alter_search').show()
	})

	// LISTA CIDADES APÓS SELECIONAR ESTADO
	$('.select_groups').on('change', function(){
		var group = $(this).val();
		Flex.RequestServer(
			'list_service_per_group',
			'frontend/vamove/_php/Frontend',
			''+group+'',
			true
			)
	})
</script>