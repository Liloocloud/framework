<div class="callback"></div>
<script src="<?=BASE_ASSETS?>maskinput/jquery.mask.min.js"></script>
<script src="<?=BASE_ASSETS?>maskinput/maskinput.js"></script>
<script src="<?=BASE_ASSETS?>liloo/js/lilooJS-2.0.js"></script>
<script src="<?=BASE_ASSETS?>liloo/js/lilooJS-3.0.js"></script>
<script src="<?=BASE_ASSETS?>liloo/js/lilooJS-4.0.js"></script>
<script src="<?=BASE_ASSETS?>datepicker/js/main.js"></script>

<!-- REMOTE -->
<script src="<?=BASE_ASSETS?>jquery/jquery.ui.touch-punch.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script> -->

<!-- Semantic-UI -->
<script src="<?=BASE_ASSETS?>semantic-ui/semantic.min.js"></script>

<!-- CARREGAMENTO DOS SCRIPTS DE CADA ROTA -->
<?php if (isset(URL()[1]) && isset(URL()[2]) && file_exists(ROOT_MODULE . URL()[1] . '/routes/' . URL()[2] . '/script.js')): ?>
<script src="<?=BASE_MODULE . URL()[1]?>/routes/<?=URL()[2]?>/script.js"></script>
<?php endif;?>

<!-- Ajustes Markdown -->
<?php if (isset(URL()[1]) && isset(URL()[2]) && URL()[2] == 'info'): ?>
<script>$('table').addClass('uk-table uk-table-divider uk-card uk-card-default uk-padding-small')</script>
<?php endif;?>

<script src="<?= BASE_ASSETS ?>liloo/js/lilooJSAdmin-1.0.js"></script>
</body>
</html>