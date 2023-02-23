<div id="item-#budget_id#" class="flex-listview">
	<!-- View -->
	<a href="#_#budget_id#" style="text-decoration: none" uk-toggle>
		<div class="flex-list-item uk-card uk-card-default uk-card-hover uk-card-body uk-margin-bottom" style="border-left: 3px solid #182c61;">

			<div uk-grid>
				<div class="uk-width-expand@m">
					<h4 style="margin-bottom: -15px;">#budget_district# - #budget_city#, #budget_state#</h4>
					<p><i uk-icon="location"></i> #service_title#</p>
					<div style="padding-top: 10px;">
						#budget_accept#
						<img src="#icon_unlock#" alt="Empresas Concorrentes" width="15px" style="float: left; margin: 0px 0 0 10px;">
						<span style="font-size: 13px; margin: -2px 0 0 4px; float: left;">#budget_count#</span>
					</div>
				</div>
				<div class="uk-width-1-2@m">
					<p style="font-size: 14px;">
						<span uk-icon="user"></span>&nbsp;&nbsp; #client_name#<br>
						<span uk-icon="receiver"></span>&nbsp;&nbsp; #client_phone#<br>
						<span uk-icon="mail"></span>&nbsp;&nbsp; #client_email#
					</p>
				</div>
			</div>

		</div>
	</a>

	<!-- <a href="#" onclick="Flex.RequestServer('teste_json','frontend/vamove/_php/CompanyManager','',true)" class="uk-icon-button" uk-icon="ban"></a> -->

	<!-- Modal  -->
	<div id="_#budget_id#" class="uk-modal-full" uk-modal>
		<div class="uk-modal-dialog" style="min-height: 720px">
			<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
			<div class="uk-background-cover">
				<div class="uk-grid-collapse uk-child-width-1-2@s" uk-grid>		

					<!-- Lateral Esquerda -->
					<div class="uk-padding-large">					
						<h3>Solicitação de Orçamento</h3>	
						<p style="margin-top: -15px"><i uk-icon="location" style="width: 14px"></i><b> #budget_district# - #budget_city#, #budget_state#</b></p>
						<h2><b>Pedido:</b> #service_title#</h2>
						<p>
							<b>Serviço: </b>#budget_group_title#<br>
							<b>Especialidade: </b>#service_category#
						</p>

						<h2><b>Detalhes:</b> Informações do Serviço</h2>
						#service_details#
					</div>

					<!-- Lateral direita -->
					<div class="uk-padding-large">

						<!-- Numero de aceitos -->
						<div class="uk-card uk-card-default uk-card-body uk-margin">
							<p style="font-size: 14px;">Empresas que aceitaram o orçamento</p>
							#budget_accept#
							<img src="#icon_unlock#" alt="Empresas Concorrentes" width="15px" style="float: left; margin: 0px 0 0 10px;">
							<span style="font-size: 13px; margin: -2px 0 0 4px; float: left;">#budget_count#</span>
						</div>

						<!-- Contato com o Cliente -->
						<div class="uk-card uk-card-primary uk-card-body uk-margin-bottom">
							<div uk-grid>
								<div class="uk-width-expand@m">
									<h3 class="uk-card-title">Contado do cliente</h3>
									<p><img src="#icon_user_white#" alt="#client_name#" width="18px" style="float: left; margin: 2px 10px 0 0;"> #client_name#</p>
									<p><img src="#icon_phone_white#" alt="#client_name#" width="18px" style="float: left; margin: 3px 10px 0 0;"> #client_phone#</p>
									<p><img src="#icon_email_white#" alt="#client_name#" width="18px" style="float: left; margin: 4px 10px 0 0;"> #client_email#</p>
								</div>
								<div class="uk-width-1-4@m">
									<span>
										<img src="#icon_padlock_coin#" width="55px" alt="">
										<p style="font-size: 22px">#budget_value_coin#</p>
									</span>
								</div>
							</div>
						</div>

						<!-- Botões -->
						<div uk-grid>
							<div class="uk-width-expand@m">
								<button class="uk-button uk-button-primary uk-width-1-1" onclick="Flex.RequestServer('budget_coins_verify','frontend/vamove/_php/Budgets','#budget_id#,#budget_value_coin#,#account_id#',true)">
									<i uk-icon="unlock"></i>&nbsp; Desbloquear Contato
								</button>
							</div>
							<div class="uk-width-1-2@m uk-text-right">
								<a href="javascript:void(0);" onclick="UIkit.modal('#_#budget_id#').hide()" class="uk-icon-button" uk-icon="reply"></a>
								#btn_rejected#
								#btn_favorites#
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- MODAL QUE MOSTRA A SOMA DAS MOEDAS -->
	<div id="modal-coins_#budget_id#" uk-modal>
		<div class="uk-modal-dialog">
			<button class="uk-modal-close-default" type="button" uk-close></button>
			<div class="uk-modal-header">
				<h2 class="uk-modal-title">Seu Saldo de Moedas</h2>
			</div>
			<div class="uk-modal-body">
				<ul class="uk-list uk-list-divider">
					<li class="uk-child-width-1-2" uk-grid>		
						<div>Total de moedas:</div>
						<div><b>#account_coin#</b></div>
					</li>
					<li class="uk-child-width-1-2" uk-grid>		
						<div>Valor deste orçamento:</div>
						<div><b>#budget_value_coin# -</b></div>
					</li>
					<li class="uk-child-width-1-2" uk-grid>		
						<div>Saldo restante de moedas:</div>
						<div><b>#account_coin_rest#</b></div>
					</li>
				</ul>            
			</div>
			<div class="uk-modal-footer">
				<button class="uk-margin-remove-bottom uk-button uk-button-default uk-modal-close uk-align-left" type="button">Cancelar</button>
				<a href="#" class="uk-button uk-button-primary uk-align-right" onclick="Flex.RequestServer('budget_accepted_confirm','frontend/vamove/_php/Budgets','#budget_id#,#budget_value_coin#,#company_id#,#account_id#',true)"><i uk-icon="unlock"></i>&nbsp; Confirmar Desbloqueio do Contato</a>
			</div>
		</div>
	</div>

	<!-- MODAL QUE MOSTRA A MENSAGEM DE SALDO INSUFICIENTE -->
	<div id="modal-coins-none_#budget_id#" uk-modal>
		<div class="uk-modal-dialog">
			<button class="uk-modal-close-default" type="button" uk-close></button>
			<div class="uk-modal-header">
				<h2 class="uk-modal-title">Seu Saldo de Moedas</h2>
			</div>
			<div class="uk-modal-body">
				<h2>Você não tem mais moedas :(</h2>
				<p>Clique abaixo para comprar mais moedas e depois acesse a guia "Favoritos", nós salvamos esse contato para você visualizá-lo depois</p>
			</div>
			<div class="uk-modal-footer">
				<button class="uk-margin-remove-bottom uk-button uk-button-default uk-modal-close uk-align-left" type="button">Cancelar</button>
				<a href="#" class="uk-button uk-button-primary uk-align-right" onclick="Flex.RequestServer('budget_salve_favorites','frontend/vamove/_php/Budgets','#budget_id#,#account_id#',true)">Comprar mais moedas</a>
			</div>
		</div>
	</div>

</div>
