<h1 style="font-size: 35px !important;" class="uk-padding uk-padding-remove-left uk-padding-remove-right">#service_title#</h1>
<div uk-grid>
	<div class="uk-width-expand@m">

		<div class="uk-card uk-card-default uk-card-body uk-padding-large">
			<h2 class="uk-text-center">Preencha as informações do Serviço</h2>
			<p class="uk-text-center" style="margin-bottom: 50px;">Orçamento grátis e online!</p>
			<form data-custom>
				<input type="hidden" name="action" value="budget_client_create">
				<input type="hidden" name="custom-url" value="frontend/vamove/_php/Orders">
				<input type="hidden" name="service_id" value="#service_id#">
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
			<h3 class="uk-card-title">Default</h3>
			<p>Lorem ipsum <a href="#">dolor</a> sit amet</p>
		</div>
	</div>
</div>