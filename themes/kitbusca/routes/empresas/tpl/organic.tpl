<div id="item-listview-#ads_id#" class="item-listview uk-card uk-card-hover uk-card-default uk-margin-bottom uk-padding-small">
	<div class="uk-grid-small" uk-grid>
		
		<div class="uk-width-expand">
			<div onclick="clickListview('#ads_id#','#ads_account_id#','click_ads_link','#ads_url#')">
				<h2 class="title">#ads_title#</h2>
				<h3 class="categ">#tax_inner_id#</h3>
				<p class="description">#ads_description#</p>
			</div>
			<div class="opening opening-#ads_id#">
				<ul class="uk-width-1-2" uk-accordion>
					<li>
						<a class="uk-accordion-title" href="#" onclick="clickListviewHours('#ads_id#','#ads_account_id#',)">
							<!-- <span class="hours">Hoje: 08h00 - 18h00 </span> -->
							<span>Horário</span>
						</a>
						<div class="uk-accordion-content list">							
						</div>
					</li>
				</ul>
			</div>

			<!-- <div class="description">
				<span class="uk-text-top"></span>
				<address>#ads_address_district# - #ads_address_city# - #ads_address_state#/#ads_address_uf#</address>
			</div> -->
		</div>

		<div class="uk-width-1-5@s uk-margin-bottom">
			<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="sets: true">
				<ul class="uk-slider-items uk-child-width-1-3 uk-child-width-1-1@m uk-grid-small" uk-grid>
					<li><img width="100%" src="https://unsplash.it/100/100/?image=221" alt="" class="uk-border-rounded"></li>
					<li><img width="100%" src="https://unsplash.it/100/100/?image=222" alt="" class="uk-border-rounded"></li>
				</ul>
				<a class="uk-position-center-left uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
				<a class="uk-position-center-right uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
				<!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul> -->
			</div>
		</div>

		<div class="uk-width-1-1 uk-margin-remove">
    		<div class="buttons">
				<button class="phone" onclick="clickListview('#ads_id#','#ads_account_id#','click_ads_view_phone')"><i class="fas fa-phone-alt"></i> Telefone</button>
				<button class="whatsapp" onclick="clickListview('#ads_id#','#ads_account_id#','click_ads_button_whatsapp')"><i class="fab fa-whatsapp"></i> Whatsapp</button>
				<button class="maps" onclick="modalRouteMap('#ads_id#','#ads_account_id#','click_ads_how_togo')"><i class="fas fa-map-marker-alt"></i> Como Chegar</button>
				<button class="contact" onclick="clickListview('#ads_id#','#ads_account_id#','click_ads_contact')"><i class="far fa-envelope"></i> Contato</button>
				<button class="site" onclick="clickListview('#ads_id#','#ads_account_id#','click_ads_link_site')"><i class="far fa-globe"></i> Site</button>
				<button class="social" onclick="clickListview('#ads_id#','#ads_account_id#','click_ads_smm')"><i class="fas fa-share-alt"></i> Social</button>
				<!-- <button class="details" onclick="singlePage('#ads_id#','#ads_url#')"><i class="far fa-info-circle"></i> Detalhes</button> -->
			</div>
		</div>

	</div>	
</div>