<div class="uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="#banner#" uk-img style="min-height: 480px; width: 100%;">
	<div uk-grid>
		<div class="uk-width-1-2@m">
			<h1 style="font-size: 35px !important;">Última Etapa para Solicitação</h1>
			<h2 style="font-size: 25px !important;">#service_title#</h2>
		</div>
		<div></div>
	</div>
</div>


<div class="uk-background-bottom-right uk-background-norepeat" uk-parallax="bgy: -200" style="background-image: url(#uploads#patter_004.svg); min-height: 550px; background-size: 500px;">
	<div class="uk-container uk-container-small uk-padding uk-margin-large-bottom">

		<div class="uk-card uk-card-default uk-card-body uk-padding-large" style="margin: 0 10%; margin-top: -120px;">
			<form data-custom id="flex-form">
				<input type="hidden" name="action" value="budget_finished">
				<input type="hidden" name="custom-url" value="frontend/vamove/_php/Orders">
				<input type="hidden" name="budget_id" value="#budget_id#">

				<div class="uk-margin">
					<div class="uk-form-label">CEP
						<span><a href="#" class="flex-busca-cep" style="float: right;font-size: 16px;">Buscar meu CEP</a></span></div>
						<input type="text" class="uk-input uk-form-medium flex-zipcode" name="budget_zipcode" maxlength="8" required autofocus>
						<input type="hidden" name="pluging_address" required>
						<input type="hidden" name="pluging_district" required>
						<input type="hidden" name="pluging_city" required>
						<input type="hidden" name="pluging_state" required>
						<span id="address" style="display: none;">
							<div class="uk-card uk-card-default uk-card-body margin">
							</div>
						</span>
					</div>

					<div class="uk-margin">
						<div class="uk-form-label">Nome</div>
						<input type="text" class="uk-input uk-form-medium" name="budget_name" required>
					</div>

					<div class="uk-margin">
						<div class="uk-form-label">E-mail</div>
						<input type="mail" class="uk-input uk-form-medium" name="budget_email" required>
					</div>

					<div class="uk-margin">
						<div class="uk-form-label">
							Número do Celular / Whatsapp<br>
							<small style="font-size: 14px; letter-spacing: 0.8px; color: #cf0f0f;">Nós vamos enviar um código de confirmação para smartphone</small>
						</div>
						<div class="uk-grid-collapse" uk-grid>
							<div class="uk-width-expand@m">
								<input type="text" class="uk-input uk-form-medium flex-mask-phone" name="budget_phones" required>
							</div>
							<div class="uk-width-1-3@m">
								<a href="" class="code_verify code_resend uk-button uk-button-primary" style="display: none;">Renviar código</a>
								<a href="" class="code_verify code_send uk-button uk-button-primary">Enviar código</a>
							</div>
						</div>					
						<span id="code_return" style="color: #cf0f0f"></span>
					</div>

					<style>
						.form-client-confirm{
							background: #e4e4e4;
							padding: 25px;
							border-radius: 5px;
						}
					</style>

					<div class="uk-margin form-client-confirm">
						<div class="uk-text-center">
							<div class="uk-form-label">Você vai receber um código de confirmação</div>
							<input type="text" class="uk-input uk-form-medium uk-width-1-2" name="budget_pin" maxlength="4" placeholder="Ex. 2020" required>
						</div>							
					</div>
				<button type="submit" class="uk-button uk-button-primary uk-align-center sender" style="display: none;">Enviar Solicitação Novamente</button>
				<!-- <div class="callback-alert uk-margin-top"></div> -->
				</form>
			</div>
		</div>
	</div>


	<script>
	// Mando o SMS com o PIN
	$('.code_verify').on('click',function(e){
		e.preventDefault()
		let phone = $('input[name="budget_phones"]').val()
		if(phone != ''){
			Flex.RequestServer(
				'budget_pin_generator_and_sender',
				'frontend/vamove/_php/Orders',
				'#budget_id#,'+phone+'',
				true
				)
		}else{
			$('#code_return').fadeIn('slow',function(){
				$(this).html('Preencha com seu número')
			})
		}
		return false
	})

	// Dispara para o Validar PIN
	$('input[name="budget_pin"]').on('keyup', function(e){
		let phone = $('input[name="budget_phones"]').val()
		let PIN   = $(this).val()
		let rule  = /^[0-9]+$/
		if( $(this).val().length == 4 && $(this).val().match(rule)){ 
			Flex.RequestServer(
				'budget_pin_validate',
				'frontend/vamove/_php/Orders',
				'#budget_id#,'+phone+','+PIN+'',
				true
				)
		}
	})

	// Botão Busca CEP
	$('.flex-busca-cep').on('click', function(){
		let URL = 'http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
		window.open(URL, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes')    	
	})

    // Plugin CEP
    $('input[name="budget_zipcode"]').on('keyup', function () {          		
    	if( $(this).val().length === 9 ){
    		var cep = $(this).val() //.replace('-', '').replace('.', '')
    		if (cep.length === 9) {
    			$.get("https://viacep.com.br/ws/"+cep+"/json", function (data){
    				if (!data.erro){
    					$('input[name="pluging_district"]').val(data.bairro)
    					$('input[name="pluging_city"]').val(data.localidade)
    					$('input[name="pluging_address"]').val(data.logradouro)
    					$('input[name="pluging_state"]').val(data.uf)
    					$('#address').show()
    					$('#address div').html(`<h4>${data.logradouro}<br>${data.bairro}, ${data.localidade} - ${data.uf}</h4>`)
    					$('input[name="budget_name"]').focus()
    				}
    			}, 'json')
    		}
    	}
    })

    // Bloqueia o Tecla enter
    $('input').keyup(function (e) {
    	var code = null;
    	code = (e.keyCode ? e.keyCode : e.which)
    	if (code == 13){
    		e.preventDefault()
    		return false
    	}
    })
</script>