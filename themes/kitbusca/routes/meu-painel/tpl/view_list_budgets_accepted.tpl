<div id="item-#budget_id#" class="flex-listview">
	<!-- LISTVIEW -->
	<a href="#_#budget_id#" style="text-decoration: none" uk-toggle>
		<div class="flex-list-item uk-card uk-card-default uk-card-hover uk-card-body uk-margin-bottom" style="border-left: 3px solid #12b1db;">
			<div uk-grid>
				<div class="uk-width-expand@m">
					<h4 style="margin-bottom: -15px;"><i uk-icon="location" style="width: 14px;"></i> #budget_district# - #budget_city#, #budget_state#</h4>
					<p>#service_title#</p>
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

	<!-- MODAL  -->
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
							<b>Setor: </b>#service_activity# <br>
							<b>Categoria: </b>#service_category# <br>
							<b>Especialidade: </b>#service_sub_category#
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
									
									<p><a href="tel:+55#client_phone#" class="uk-button uk-button-default" target="_new"><img src="#icon_phone_white#" alt="#client_name#" width="18px" style="margin: 0px 10px 0px 0px;">#client_phone#</a></p>

									<p><a href="https://api.whatsapp.com/send?phone=55#client_phone#&text=Oi%20#budget_name#.%20Sou%20#account_name#.%20Recebi%20seu%20pedido%20de%20orçamento%20de%20#service_title#%20na%20plataforma%20Vamove." class="uk-button uk-button-default" target="_new"><img src="#icon_whatsapp_white#" alt="#client_name#" width="18px" style="margin: 0px 10px 0px 0px;">#client_phone#</a></p>
									<i><p style="color: #dedede; font-size:12px;">O usuário pode não ter o número cadastrado no Whatsapp</p></i>

									<p><img src="#icon_email_white#" alt="#client_name#" width="18px" style="float: left; margin: 4px 10px 0 0;"><a href="mailto:#client_email#" target="_new">#client_email#</a></p>

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
							<div class="uk-width-1-1@m uk-text-right">
								<a href="" onclick="UIkit.modal('#_#budget_id#').hide()" class="uk-icon-button uk-margin-small-right" uk-icon="reply"></a>
								#btn_rejected#
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>