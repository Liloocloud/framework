<div class="uk-grid-small uk-child-width-1-2@m" uk-grid="masonry: false" uk-height-match="target: > div > .uk-card">
	[node1]
	<div>
		<div class="uk-card uk-card-default uk-card-body ">
			<h3>#config_title#</h3>
			<p>#config_description#</p>
			<p><b>META:</b> #config_meta#<br>
			<b>TIPO:</b> #config_type#</p>
			#output#
		</div>
	</div>
	[/node1]
</div>


<script>
// Scripts utilizados apenas no painel superadmin
var SuperFlex = {

	/** Habilitar carrinho de compras */
	enable: function(id){
		Flex.RequestServer(
			'config_enable_type_bool',
			'_Modules/payment/_php/ManagerPaymentConfig',
			id,
			true
			)
	},

	/** Desabilitar carrinho de compras */
	desable: function(id){
		Flex.RequestServer(
			'config_desable_type_bool',
			'_Modules/payment/_php/ManagerPaymentConfig',
			id,
			true
			)
	},

	/** Troca os botões para ativar */
	btnEnable: function(eid){
		$('#enable-'+eid).fadeOut()
		setInterval(function(){ 
			$('#desable-'+eid).fadeIn()
		}, 300)
	},

	/** Troca os botões para desativar */
	btnDesable: function(did){
		$('#desable-'+did).fadeOut()
		setInterval(function(){ 
			$('#enable-'+did).fadeIn()
		}, 300)
	}

}
</script>
<div class="callback"></div>