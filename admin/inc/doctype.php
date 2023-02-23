<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta http-equiv="Content-Security-Policy" content="default-src * self blob: data: gap:; style-src * self 'unsafe-inline' blob: data: gap:; script-src * 'self' 'unsafe-eval' 'unsafe-inline' blob: data: gap:; object-src * 'self' blob: data: gap:; img-src * self 'unsafe-inline' blob: data: gap:; connect-src self * 'unsafe-inline' blob: data: gap:; frame-src * self blob: data: gap:;">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?= BASE_ADMIN ?>images/favicon-64x64.png" />
    <title>Liloo Cloud - Dashboard</title>
    
    <!-- Custom fonts for this template-->
    <!-- <link href="<?= BASE_ASSETS ?>fontawesome/web-6.2.1/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <script src="<?= BASE_ASSETS ?>jfontawesome/web-6.2.1/js/all.min.css"></script> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
       
    <link rel="preload" as="style" href="<?= BASE_ASSETS ?>semantic-ui/semantic.min.css">
    <link rel="preload" as="script" href="<?= BASE_ASSETS ?>semantic-ui/semantic.min.js">
    <link rel="stylesheet" href="<?= BASE_ASSETS ?>semantic-ui/semantic.min.css" />

    <link href="<?= BASE_ASSETS ?>uikit/css/uikit.min.css" rel="stylesheet">
    <link href="<?= BASE_ASSETS ?>custom/css/admin.css" rel="stylesheet">
    <link href="<?= BASE_ASSETS ?>liloo/css/lilooAutocomplete.min.css" rel="stylesheet">

    <script src="<?= BASE_ASSETS ?>jquery/jquery-3.6.0.min.js"></script>

	<script src="<?= BASE_ASSETS ?>uikit/js/uikit.min.js" async></script>
	<script src="<?= BASE_ASSETS ?>uikit/js/uikit-icons.min.js" async></script>
    <script src="<?= BASE_ASSETS ?>liloo/js/lilooAutocomplete-1.0.js" async></script>   
    
    
    <?php if(isset(URL()[1]) && isset(URL()[2]) && file_exists(ROOT_MODULE.URL()[1].'/routes/'.URL()[2].'/script.js')):?>
    <link rel="preload" href="<?= BASE_MODULE.URL()[1] ?>/routes/<?= URL()[2] ?>/script.js" as="script">
    <?php endif; ?>

    <!-- Jquery Ui -->
    <link rel="stylesheet" href="<?= BASE_ASSETS ?>jquery/css/jquery-ui.min.css"/>
    <script src="<?= BASE_ASSETS ?>jquery/jquery-ui.min.js" async></script>

    <!-- Sweet Alert -->
    <link rel="stylesheet" type="text/css" href="<?= BASE ?>libs/@sweetalert/sweet.css">
    <script type="text/javascript" src="<?= BASE ?>libs/@sweetalert/dist/sweetalert2.all.min.js"></script>

    <!-- Datarangepicker -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_ASSETS ?>datepicker/css/datepicker.min.css" />
    <script type="text/javascript" src="<?= BASE_ASSETS ?>datepicker/js/datepicker.js"></script>
    <script type="text/javascript" src="<?= BASE_ASSETS ?>datepicker/js/moment.min.js"></script>
    <script type="text/javascript" src="<?= BASE_ASSETS ?>datepicker/js/daterangepicker.min.js"></script>

    <!-- DropZone -->
    <link rel="preload" as="style" href="<?= BASE_ASSETS ?>dropzone/vendor/dropzone/dist/dropzone.min.css" />
    <link rel="stylesheet" href="<?= BASE_ASSETS ?>dropzone/vendor/dropzone/dist/dropzone.min.css" />
    <link rel="preload" as="script" href="<?= BASE_ASSETS ?>dropzone/vendor/dropzone/dist/min/dropzone.min.js">
    <script src="<?= BASE_ASSETS ?>dropzone/vendor/dropzone/dist/min/dropzone.min.js"></script>

    <!-- TinyMCE -->
    <script type="text/javascript" src="<?= BASE ?>libs/@tinymce/tinymce.min.js"></script>

    <!-- Chart JS -->
    <script src="<?= BASE_ASSETS ?>chartjs/chart.js"></script>
    
    <!-- Liloo CSS -->
    <link rel="preload" href="<?= BASE_ASSETS ?>liloo/js/lilooJS-2.0.js" as="script">
    <link rel="preload" href="<?= BASE_ASSETS ?>liloo/js/lilooJS-3.0.js" as="script">
    <!-- <link rel="preload" href="<?= BASE_ASSETS ?>liloo/js/lilooJS-4.0.js" as="script"> -->
    <!-- <script src="<?= BASE_ASSETS ?>liloo/js/lilooJS-2.0.js"></script> -->


    <!-- CARREGAMENTO DOS CSS/JS DE CADA ROTA -->
    <?php if(isset(URL()[1]) && isset(URL()[2]) && file_exists(ROOT_MODULE.URL()[1].'/routes/'.URL()[2].'/style.css')):?>
    <link rel="preload" as="style" href="<?= BASE_MODULE.URL()[1] ?>/routes/<?= URL()[2] ?>/style.css">
    <link rel="stylesheet" href="<?= BASE_MODULE.URL()[1] ?>/routes/<?= URL()[2] ?>/style.css" type="text/css">
    <?php endif; ?>

    <!-- CARREGAMENTO DOS SCRIPTS  DE CADA ROTA -->
    <?php if (isset(URL()[1]) && isset(URL()[2]) && file_exists(ROOT_MODULE.URL()[1].'/routes/'. URL()[2].'/module.js')): ?>
    <script type="module" src="<?=BASE_MODULE . URL()[1]?>/routes/<?=URL()[2]?>/module.js"></script>
    <?php endif;?>

</head>
<body id="page-top" root="<?= BASE ?>" onload="lilooLoader()" liloo-mode>
    <div liloo-loader class="no_print">
		<div class="liloo-loader-spinner">
			<span class="uk-margin-small-right" uk-spinner="ratio: 3"></span>
		</div>
	</div>