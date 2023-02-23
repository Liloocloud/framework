<?php

// Banner dp Imóvel
$uploads = BASE_UPLOADS.'imoveis/'.URL()[2].'/images/';
$imgs = new Explore\OpenDirFile(ROOT_UPLOADS.'imoveis/'.URL()[2].'/images/');
$Listing = $imgs->list();
if($key = array_search('thumbnails', $Listing)) unset($Listing[$key]);
if($Listing){
	echo '<div class="uk-margin-medium-bottom" uk-slider="autoplay: true; autoplay-interval: 4500">';
	echo '<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">';
	echo '<ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" uk-lightbox="animation: slide">';
	foreach ($Listing as $images){
		echo '<li>';
		echo '<a class="uk-inline" href="'.$uploads.$images.'">';
		echo '<img src="'.$uploads.'thumbnails/'.$images.'">';
		echo '</a>';
		echo '</li>';
	}
	echo '</ul>';
	echo '<a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>';
	echo '<a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>';
	echo '</div>';
	echo '</div>';
}
?>

<div class="uk-container">
	<div class="" uk-grid>

		<!-- ---------------------------------------------------------------------
		LATERAL ESQUESDA
		---------------------------------------------------------------------- -->
		<div class="uk-width-expand@m">
			<!-- Titulo -->
			<h1 class="uk-margin-medium"><?= $IMOB['title'] ?></h1>
			<?= ($IMOB['address'] != '')? '<address>'.$IMOB['address'].'</address>' : '' ?>
			<!-- Boqueirão, Santos - SP <a href="#">Ver no mapa</a></address> -->

     		<!-- Preço no mobile -->
			<div class="uk-margin-medium-bottom uk-hidden@m">
				<div class="uk-card uk-card-default uk-padding uk-margin-medium-bottom" >
					<p><small>Ref. <?= $IMOB['ref'] ?></small></p>
					<h5 style="margin-top: -20px"><?= $IMOB['type'] ?></h5>
					<?= ($IMOB['apartir'] == true)? '<p style="margin-bottom: -5px">A partir de:</p>' : ''; ?>
					<h4 class="uk-heading-small uk-margin-remove-top" style="font-size: 2em !important"><?= $IMOB['price'] ?></h4> 
					<!-- <p style="margin-bottom: 0">Documentação: <span class="uk-float-right"><?= $IMOB['document'] ?></span></p>		 -->
					<!-- <p style="margin-top: 0">IPTU: <span class="uk-float-right"><?= $IMOB['iptu'] ?></span></p>		 -->
				</div>	
			</div>

     		<!-- Recursos -->
			<div id="resource" class="liloo-icons uk-child-width-1-3 uk-child-width-1-6@m uk-grid-match uk-grid-small uk-margin-large-bottom uk-text-center" uk-grid>
				<div>
					<div class="uk-card uk-card-default uk-card-body uk-padding-small">
						<img src="<?= BASE_THEME_IMAGES.$IMOB['details']['quarto']["icon"] ?>">
						<p><?= $IMOB['details']['quarto']["qtd"].' '.$IMOB['details']['quarto']["desc"] ?></p>
					</div>
				</div>
				<div>
					<div class="uk-card uk-card-default uk-card-body uk-padding-small">
						<img src="<?= BASE_THEME_IMAGES.$IMOB['details']['suite']["icon"] ?>" alt="">
						<p><?= $IMOB['details']['suite']["qtd"].' '.$IMOB['details']['suite']["desc"] ?></p>
					</div>
				</div>
				<div>
					<div class="uk-card uk-card-default uk-card-body uk-padding-small">
						<img src="<?= BASE_THEME_IMAGES.$IMOB['details']['banheiro']["icon"] ?>" alt="">
						<p><?= $IMOB['details']['banheiro']["qtd"].' '.$IMOB['details']['banheiro']["desc"] ?></p>
					</div>
				</div>
				<div>
					<div class="uk-card uk-card-default uk-card-body uk-padding-small">
						<img src="<?= BASE_THEME_IMAGES.$IMOB['details']['vaga']["icon"] ?>" alt="">
						<p><?= $IMOB['details']['vaga']["qtd"].' '.$IMOB['details']['vaga']["desc"] ?></p>
					</div>
				</div>
				<div>
					<div class="uk-card uk-card-default uk-card-body uk-padding-small">
						<img src="<?= BASE_THEME_IMAGES.$IMOB['details']['area-util']["icon"] ?>" alt="">
						<p><?= $IMOB['details']['area-util']["qtd"].' '.$IMOB['details']['area-util']["desc"] ?></p>
					</div>
				</div>
				<div>
					<div class="uk-card uk-card-default uk-card-body uk-padding-small">
						<img src="<?= BASE_THEME_IMAGES.$IMOB['details']['area-total']["icon"] ?>" alt="">
						<p><?= $IMOB['details']['area-total']["qtd"].' '.$IMOB['details']['area-total']["desc"] ?></p>
					</div>
				</div>
			</div>

			<!-- Ficha técnica se houver -->
			<?php
			if(!empty($IMOB['datasheet'])): ?>
			<div class="uk-margin-medium-bottom">	
				<h2 class="uk-heading-line uk-text-left uk-margin-medium-bottom"><span>Ficha Técnica</span></h2>
				<ul id="liloo-datasheet" class="uk-list uk-child-width-1-1" uk-grid>
					<?php foreach ($IMOB['datasheet'] as $key => $item): ?>
						<li class="uk-margin-remove-top uk-width-1-1"><i uk-icon="check"></i> <?= $key.': <b>'.$item.'</b>' ?></li>
					<?php endforeach; ?>
				</ul>
				<!-- <a href="#" id="liloo-datasheet-btn" class="uk-button uk-button-link uk-margin-top">Ler mais</a> -->
			</div>
			<?php endif; ?>

			<!-- Adicionais e Infraestrutura -->
			<div id="adds" class="uk-margin-medium-bottom">
				<h2 class="uk-heading-line uk-text-left uk-margin-medium-bottom"><span>Recursos Adicionais</span></h2>
				<ul id="liloo-items" class="uk-list uk-child-width-1-1" uk-grid>
					<?php foreach ($IMOB['feature'] as $item): ?>
						<li class="uk-margin-remove-top uk-width-1-1"><i class="far fa-check-square"></i> <?= $item ?></li>
					<?php endforeach; ?>
				</ul>
				<a href="#" id="liloo-items-btn" class="uk-button uk-button-link uk-margin-top">Ler mais</a>
			</div>

			<!-- Descrição -->
			<div id="description" class="uk-margin-medium-bottom">
				<h2 class="uk-heading-line uk-text-left uk-margin-medium-bottom"><span>Descrição do Imóvel</span></h2>
				<div id="liloo-description" style="height: <?= $CONFIG['configuracoes']['height-leia-mais'] ?>; overflow: hidden;">
					<?php
					$MD = new Helpers\Markdown;
					$Text = file_get_contents(ROOT_UPLOADS.'imoveis/'.URL()[2].'/description.md');
					echo $MD->text($Text);
					?>
				</div>
				<a href="#" id="liloo-description-btn" class="uk-button uk-button-link uk-margin-top">Ler mais</a>
			</div>
		</div>

		<!-- ----------------------------------------------------------------------
		LATERAL DIREITA
		---------------------------------------------------------------------- -->
		<div class="uk-width-1-3@m uk-visible@m">		
			<div tyle="z-index: 980;" uk-sticky="offset: <?= $CONFIG['configuracoes']['lateral-fixed-top'] ?>; bottom: <?= $CONFIG['configuracoes']['lateral-fixed-bottom'] ?>">
				<!-- Card com preços de valores -->
				<div class="uk-card uk-card-default uk-padding uk-margin-medium-bottom" >
					<p><small>Ref. <?= $IMOB['ref'] ?></small></p>
					<h5 style="margin-top: -20px"><?= $IMOB['type'] ?></h5>
					<?= ($IMOB['apartir'] == true)? '<p style="margin-bottom: -5px">A partir de:</p>' : ''; ?>
					<h4 class="uk-heading-small uk-margin-remove-top" style="font-size: 2em !important"><?= $IMOB['price'] ?></h4> 
					<!-- <p style="margin-bottom: 0">Documentação: <span class="uk-float-right"><?= $IMOB['document'] ?></span></p> -->
					<!-- <p style="margin-top: 0">IPTU: <span class="uk-float-right"><?= $IMOB['iptu'] ?></span></p> -->
					<a href="<?= BASE.'obrigado/?con=yes&msg=Olá! Gostaria de mais informações do imóvel - ref. '.$IMOB['ref'].' - '.$IMOB['title'] ?>" class="uk-margin-top uk-button uk-button-primary uk-button-large" target="_new">Quero mais informações</a>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- SUGERIDOS -->
<div id="others" class="uk-container uk-padding uk-margin-bottom">
	<?php
	for ($i= 1000; $i <= 1003 ; $i++) { 
		if((int) URL()[2] != $i){
			$Immob[$i] = file_get_contents(ROOT_UPLOADS.'imoveis/'.$i.'/infos.json');
		}
	}
    ?>
	<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
		<?php
		foreach ($Immob as $Item) {
			$Item = json_decode($Item, true);		
			echo '
			<div>
				<div class="uk-card uk-card-default">
					<div class="uk-card-media-top" style="overflow: hidden !important;">
						<img src="'.BASE_UPLOADS.$Item['cover'].'" alt="" style="height: 300px !important;">
					</div>
					<div class="uk-card-body">
						<p class="uk-label">'.$Item['price'].'</p>
						<h4 class="uk-margin-remove-top">'.$Item['title'].'</h4>
						<div class="uk-child-width-1-4 uk-text-center uk-grid-collapse uk-text-small" uk-grid>					
							<div>
								<div class="uk-padding-small"><img src="'.BASE_THEME_IMAGES.$Item['details']['quarto']['icon'].'" width="20px"><br> '.$Item['details']['quarto']['qtd'].$Item['details']['quarto']['desc'].'</div>
							</div>
							<div>
								<div class="uk-padding-small"><img src="'.BASE_THEME_IMAGES.$Item['details']['suite']['icon'].'" width="20px"><br> '.$Item['details']['suite']['qtd'].$Item['details']['suite']['desc'].'</div>
							</div>					
							<div>
								<div class="uk-padding-small"><img src="'.BASE_THEME_IMAGES.$Item['details']['banheiro']['icon'].'" width="20px"><br> '.$Item['details']['banheiro']['qtd'].$Item['details']['banheiro']['desc'].'</div>
							</div>			
							<div>
								<div class="uk-padding-small"><img src="'.BASE_THEME_IMAGES.$Item['details']['vaga']['icon'].'" width="20px"><br> '.$Item['details']['vaga']['qtd'].$Item['details']['vaga']['desc'].'</div>
							</div>
						</div>
						<a href="'.BASE.'imovel/'.$Item['url'].'" class="uk-button uk-button-primary uk-margin-top">Ver detalhes</a>
					</div>
				</div>
			</div>
			';
		}
		?>
	</div>
</div>


<!-- CTA -->
<div id="cta" style="background: #F2F2F2;">
	<div class="uk-container uk-padding uk-padding-remove-bottom">
		<div class="uk-margin-medium-bottom">
			<div class="uk-child-width-1-3@s uk-text-center uk-grid-small" uk-grid>	
				<div>
					<div class="uk-card uk-card-default uk-padding">
						<h3><i class="fab fa-whatsapp fa-2x"></i></h3>
						<a href="<?= BASE.$CONFIG['pagina-de-obrigado'] ?>" class="uk-button uk-button-primary" target="_new">Atendimento pelo Whatsapp</a>		
					</div>		
				</div>
				<div>
					<div class="uk-card uk-card-default uk-padding">
						<h3><i class="fas fa-phone fa-2x"></i></h3>
						<a href="tel:<?= $CONFIG['link-tel'] ?>" class="uk-button uk-button-primary">Central de Vendas</a>		
					</div>		
				</div>
				<div>
					<div class="uk-card uk-card-default uk-padding">
						<h3><i class="far fa-envelope fa-2x"></i></h3>
						<a href="#" class="uk-button uk-button-primary">Atendimento por e-mail</a>		
					</div>		
				</div>
			</div>		
		</div>
	</div>
</div>


<!-- Scripts -->
<script>
// Descrição
$('#liloo-description-btn').on('click', function(){
	$('#liloo-description').attr('style', 'height: auto;')
	if($("#liloo-description-btn").text() === 'Ler mais') {
		$("#liloo-description-btn").text('Ler menos')
		$('#liloo-description').attr('style', 'height: auto; overflow: hidden;')
	} else {
		$("#liloo-description-btn").text('Ler mais')
		$('#liloo-description').attr('style', 'height: <?= $CONFIG['configuracoes']['height-leia-mais'] ?>; overflow: hidden;')
	}
	return false
})
// Caracteristicas
$('#liloo-items-btn').on('click', function(){
	$('#liloo-items').attr('style', 'height: auto;')
	if($("#liloo-items-btn").text() === 'Ler mais') {
		$("#liloo-items-btn").text('Ler menos')
		$('#liloo-items').attr('style', 'height: auto; overflow: hidden;')
	} else {
		$("#liloo-items-btn").text('Ler mais')
		$('#liloo-items').attr('style', 'height: <?= $CONFIG['configuracoes']['height-leia-mais'] ?>; overflow: hidden;')
	}
	return false
})
// datasheet
$('#liloo-datasheet-btn').on('click', function(){
	$('#liloo-datasheet').attr('style', 'height: auto;')
	if($("#liloo-datasheet-btn").text() === 'Ler mais') {
		$("#liloo-datasheet-btn").text('Ler menos')
		$('#liloo-datasheet').attr('style', 'height: auto; overflow: hidden;')
	} else {
		$("#liloo-datasheet-btn").text('Ler mais')
		$('#liloo-datasheet').attr('style', 'height: <?= $CONFIG['configuracoes']['height-leia-mais'] ?>; overflow: hidden;')
	}
	return false
})
</script>