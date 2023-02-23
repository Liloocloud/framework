<div style="background: #f8f8f8">
	<div class="uk-container uk-padding">
		<h1 style="font-size: 35px !important;" class="uk-padding uk-padding-remove-left uk-padding-remove-right">#service_title#</h1>
		<div uk-grid>
			<div class="uk-width-expand@m">

				<div class="uk-card uk-card-default uk-card-body uk-padding-large">
					<h2 class="uk-text-center">Preencha as informações do Serviço</h2>
					<p class="uk-text-center" style="margin-bottom: 50px;">Orçamento grátis e online!</p>

					<form data-custom>
						<input type="hidden" name="action" value="#action#">
						<input type="hidden" name="custom-url" value="#custom_url#">
						<input type="hidden" name="service_id" value="#service_id#">
						#require#
						<div class="uk-margin">
							<div class="uk-form-label">Informações Adicionais</div>
							<textarea class="uk-textarea uk-form-medium" name="add_additional" rows="3"></textarea>
						</div>
						<button type="submit" class="uk-button uk-button-primary #submit_class#">#submit_label#</button>
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

	</div>
</div>