<div class="callback"></div>
<script type="text/javascript" src="<?=BASE_ASSETS?>maskinput/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?=BASE_ASSETS?>maskinput/maskinput.js"></script>
<script type="text/javascript" src="<?=BASE_ASSETS?>liloo/js/lilooJS-2.0.js"></script>
<script type="text/javascript" src="<?=BASE_ASSETS?>liloo/js/lilooJS-3.0.js"></script>
<!-- <script type="text/javascript" src="<?=BASE_ASSETS?>liloo/js/lilooJS-4.0.js"></script> -->

<!-- CARREGAMENTO DOS SCRIPTS DE CADA ROTA DA FRONTEND -->
<?php if (isset(URL()[0]) && file_exists(ROOT_THEME_ROUTES . URL()[0] . '/script.js')): ?>
  <script type="text/javascript" src="<?=BASE_THEME_ROUTES . URL()[0]?>/script.js"></script>
  <script type="module" src="<?=BASE_THEME_ROUTES . URL()[0]?>/module.js"></script>
<?php else: ?>
  <script type="text/javascript" src="<?=BASE_THEME_ROUTES?>home/script.js"></script>
  <script type="module" src="<?=BASE_THEME_ROUTES?>home/module.js"></script>
<?php endif;?>


<script type="text/javascript">
// lilooJS.Event({
//   action: 'session_view_load',
//   path: 'themes//ajax/ContactSystem',
//   data: 'session'
// })
// function lilooLoader(){
$('[liloo-loader]').hide()
// }
</script>
</body>
</html>