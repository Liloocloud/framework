<!DOCTYPE html>
<html lang="pt-BR" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="default-src * 'self' blob: data: gap:; style-src * 'self' 'unsafe-inline' blob: data: gap:; script-src * 'self' 'unsafe-eval' 'unsafe-inline' blob: data: gap:; object-src * 'self' blob: data: gap:; img-src * 'self' 'unsafe-inline' blob: data: gap:; connect-src 'self' * 'unsafe-inline' blob: data: gap:; frame-src * 'self' blob: data: gap:;">
	
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?= BASE ?>xmlrpc.php">
	<title><?= $Config['seo_title'] ?></title>

	<meta name="keywords" content="<?= $Config['seo_keywords'] ?>">
	<meta name="description" content="<?= $Config['seo_description'] ?>"/>
	<link rel="canonical" href="<?= BASE ?>" />
	<link rel="icon" type="image/png" href="<?= BASE_UPLOADS ?>favicon.png" />

	<meta property="og:locale" content="pt-BR" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?= $Config['seo_title'] ?>" />
	<meta property="og:description" content="<?= $Config['seo_description'] ?>" />
	<meta property="og:url" content="<?= BASE ?>" />
	<meta property="og:site_name" content="<?= $Config['seo_site_name'] ?>" />
	<meta property="fb:app_id" content=""/>
	<meta property="og:image" content="<?= BASE_UPLOADS ?>perfil-500x500.png" />
	<meta property="og:image:secure_url" content="<?= BASE_UPLOADS ?>perfil-500x500.png" />
	<meta property="og:image:width" content="500" />
	<meta property="og:image:height" content="500" />
	<meta property="og:image:alt" content="Perfil Facebook" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:description" content="<?= $Config['seo_description'] ?>" />
	<meta name="twitter:title" content="<?= $Config['seo_title'] ?>" />
	<meta name="twitter:site" content="<?= $Config['seo_site_name'] ?>" />
	<meta name="twitter:image" content="<?= BASE_UPLOADS ?>perfil-500x500.png" />
	<meta name="twitter:creator" content="<?= $Config['seo_site_name'] ?>" />

	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;700&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

	<link type="text/css" rel="stylesheet" href="<?= BASE_ASSETS ?>uikit/css/uikit.min.css">
	<link type="text/css" rel="stylesheet" href="<?= BASE_ASSETS ?>custom/css/custom-datatable-2.0.css">

	<link rel="preload" href="<?= BASE_ASSETS ?>jquery/jquery-3.6.0.min.js" as="script">
	<script type="text/javascript" src="<?= BASE_ASSETS ?>jquery/jquery-3.6.0.min.js"></script>

	<link rel="preload" href="<?= BASE_ASSETS ?>maskinput/jquery.mask.min.js" as="script">
	<link rel="preload" href="<?= BASE_ASSETS ?>maskinput/maskinput.js" as="script">

	<!-- <link rel="preload" href="https://code.jquery.com/jquery-3.4.0.min.js" as="script">
	<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script> -->

	<!-- <link rel="preload" href="<?= BASE ?>assets/liloo/js/lilooJS-2.0.js" as="script">
	<link rel="preload" href="<?= BASE ?>assets/liloo/js/lilooJS-3.1.js" as="script"> -->
	<link rel="preload" href="<?= BASE_ASSETS ?>liloo/js/lilooJS-2.0.js" as="script">
    <link rel="preload" href="<?= BASE_ASSETS ?>liloo/js/lilooJS-3.0.js" as="script">
	
	<!-- <script rel="preload" src="<?= BASE ?>assets/jquery/js/jquery-3.4.0.min.js"></script> -->
	<script type="text/javascript" src="<?= BASE_ASSETS ?>uikit/js/uikit.min.js"></script>
	<script type="text/javascript" src="<?= BASE_ASSETS ?>uikit/js/uikit-icons.min.js"></script>

	<!-- CARREGAMENTO DO CSS DO TEMA -->
	<link rel="stylesheet" href="<?= BASE_THEME ?>assets/css/style.css">
	
	<!-- CARREGAMENTO DOS CSS DE CADA ROTA -->
    <?php if(isset(URL()[0]) && file_exists(ROOT_THEME_ROUTES.URL()[0].'/style.css')):?>
    <link rel="preload" as="style" href="<?= BASE_THEME_ROUTES.URL()[0] ?>/style.css">
    <link rel="stylesheet" href="<?= BASE_THEME_ROUTES.URL()[0] ?>/style.css" type="text/css">
    <?php endif; ?>

	<!-- Autocomplete -->
	<link rel="preload" as="style" href="<?=BASE_ASSETS?>autocomplete/css/autocomplete.css">
	<link rel="stylesheet" href="<?=BASE_ASSETS?>autocomplete/css/autocomplete.css">
	<link rel="preload" as="style" href="<?=BASE_ASSETS?>autocomplete/css/main.css">
	<link rel="stylesheet" href="<?=BASE_ASSETS?>autocomplete/css/main.css">


	<!-- CARREGAMENTO DOS MODULES  DE CADA ROTA -->
	<?php if (isset(URL()[0]) && file_exists(ROOT_THEME_ROUTES.URL()[0].'/module.js')): ?>
    <script type="module" src="<?= BASE_THEME_ROUTES.URL()[0].'/module.js' ?>"></script>
    <?php endif;?>

	<!-- LottieFiles -->
	<!-- <script src="<?= BASE_THEME ?>assets/lottiefiles/lottie-player.min.js"></script> -->
	<!-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> -->

	<?php 
	echo "<!-- Metas Verification -->\r\n";
	// echo html_entity_decode($Config['google_meta_console'], ENT_QUOTES, 'UTF-8')."\r\n\r\n";
	echo html_entity_decode($Config['facebook_meta_domain'], ENT_QUOTES, 'UTF-8')."\r\n\r\n";

	// echo html_entity_decode($Config['google_tag_gtm'], ENT_QUOTES, 'UTF-8')."\r\n\r\n";
	echo html_entity_decode($Config['google_tag_analytics'], ENT_QUOTES, 'UTF-8')."\r\n\r\n";
	// echo html_entity_decode($Config['google_tag_ads'], ENT_QUOTES, 'UTF-8')."\r\n\r\n";
	echo html_entity_decode($Config['facebook_pixel'], ENT_QUOTES, 'UTF-8')."\r\n\r\n";
	echo html_entity_decode($Config['hotjar_tag'], ENT_QUOTES, 'UTF-8')."\r\n\r\n";
	echo html_entity_decode($Config['head_tags_scripts'], ENT_QUOTES, 'UTF-8')."\r\n\r\n";
	
	if(isset(URL()[0]) && URL()[0] == 'obrigado'){
		echo '<!-- Conversion -->';
		echo html_entity_decode($Config['google_tag_conversion'], ENT_QUOTES, 'UTF-8');
	}
	?>

</head>
<body root="<?= BASE ?>">
<div id="home"></div>
	<div liloo-loader class="no_print">
		<div class="liloo-loader-spinner">
			<span class="uk-margin-small-right" uk-spinner="ratio: 3"></span>
		</div>
	</div>
