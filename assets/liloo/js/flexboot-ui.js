/**
 * Conjunto de ferramentas para auxilio no desenvolvimento de 
 * interações com o usuário. É necessário o uso da flexboot.1.4.js
 * ou versões superiores e o CSS de UIKIT
 *
 * @copyright Felpe Oliveira Lourenço - 22.04.2020
 */

/**
 * LOADER NO CARREGAMENTO DAS PÁGINA
 */
$('[flex-loader]').show()
window.onload = function(){
	$('[flex-loader]').hide()
}


/************************************************************************
 * ZIPCODE - PLUGIN QUE AUTOMATIZA A BUSCA DO CEP
 * INSERIRNDO CAMPOS NO FORMULÁRIO
 * USO: basta inserir o elemento "<div flex-form-zipcode></div>"
 */
 $('[flex-form-zipcode]').html(`
 	<input class="uk-input flex-zipcode" type="text" name="plugin_zipcode" required>\r\n
 	<input type="hidden" name="pluging_district">\r\n
 	<input type="hidden" name="pluging_city">\r\n
 	<input type="hidden" name="pluging_address">\r\n
 	<input type="hidden" name="pluging_state">\r\n
 	<span id="address" style="display: none;">\r\n
 	<div class="uk-card uk-card-default uk-card-body uk-padding-small"></div>\r\n
 	</span>
 	`)
 $('input[name="plugin_zipcode"]').on('keyup', function () {          		
 	if( $(this).val().length === 9 ){
		var cep = $(this).val() //.replace('-', '').replace('.', '')
		if (cep.length === 9) {
			$.get("https://viacep.com.br/ws/" + cep + "/json", function (data) {
				if (!data.erro) {
					$('input[name="pluging_district"]').val(data.bairro)
					$('input[name="pluging_city"]').val(data.localidade)
					$('input[name="pluging_address"]').val(data.logradouro)
					$('input[name="pluging_state"]').val(data.uf)
					$('#address').show()
					$('#address div').html(`
						<p>
						${data.logradouro}<br>
						${data.bairro}, 
						${data.localidade} - 
						${data.uf}
						</p>`)
				}
			}, 'json')}}})


/************************************************************************
 * VIEW PASSWORD - PLUGIN QUE MOSTRA UM ÍCONE COM OLHO NOS INPUTS 
 * DE PASSWORD. PERMITINDO VER A SENHA AO PASSAR O MOUSE
 * USO: "<div flex-form-password name="account_password" required></div>"
 */
 $('[flex-form-password]').html(`
 	<div class="uk-inline">\r\n
 	<span 
 	class="uk-form-icon uk-form-icon-flip" 
 	uk-icon="icon: info" 
 	style="cursor: pointer !important; pointer-events: auto;"
 	></span>\r\n
 	<input type="password" class="uk-input" required autocomplete="new-password">\r\n
 	</div>
 	`)
 window.addEventListener("load", function(event){
 	let element  = document.querySelector('[flex-form-password]')
 	if(element){
	 	let span 	 = document.querySelector('[flex-form-password] span[uk-icon]')
	 	let input    = document.querySelector('[flex-form-password] input')
	 	let name 	 = element.getAttribute('name')
	 	// let required = element.getAttribute('required') 	
	 	$(span).on('touchstart',function(){ input.type = 'text' })
	    $(span).on('touchend',function(){ input.type = 'password' })
	    $(span).on('touchmove',function(){ input.type = 'password' })
	 	input.setAttribute("name", name)
	 	span.addEventListener('mousedown', function(){ input.type = 'text' })
	 	span.addEventListener('mouseup', function() { input.type = 'password' })
	 	span.addEventListener('mousemove', function() { input.type = 'password' })
 	}
 })


/************************************************************************
 * BLOQUEIO DA TECLA ENTER
 */
 $('input').keyup(function (e) {
 	var code = null;
 	code = (e.keyCode ? e.keyCode : e.which)
 	if (code == 13){
 		e.preventDefault()
 		return false
 	}
 })