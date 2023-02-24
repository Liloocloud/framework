<li class="uk-parent">
    <a href="#"><?= $This['portal']['ICON'] ?>
    <?php echo ($_SESSION['account_level'] >= 11)? 'Portal' : 'Portal'; ?>
    </a>
    <ul class="uk-nav-sub">
        <li><a href="<?= BASE_ADMIN ?>portal/adverts/">Anúncios</a></li>
        <li><a href="<?= BASE_ADMIN ?>portal/categs/">Categorias</a></li>
        <li><a href="<?= BASE_ADMIN ?>portal/reports/">Relatórios</a></li>
    </ul>
</li>

