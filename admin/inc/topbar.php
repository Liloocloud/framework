<?php
$Notices = new Notifications\Notice();
$View = $Notices->getNoticesUser();
$ViewSys = $Notices->getNoticesGlobal();
$NoticeBtn = ($View['bool'] == true) ? 'orange' : '';
?>

<!-- MENU TOP -->
<div id="liloo-admin-topbar">

    <nav class="uk-navbar-container" uk-navbar="mode: click">
        <div class="uk-navbar-item offcanvas-button">
            <a href="#offcanvas-usage" uk-toggle class="uk-icon-button uk-margin-small-right" uk-icon="menu"></a>
            <a href="<?=BASE?>admin/">
                <img src="<?=BASE_ADMIN?>logotipo/logotipo.svg" alt="<?=SITE_NAME?>" width="90px">
            </a>
        </div>

        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav">

                <!-- User -->
                <li>
                    <div class="uk-navbar-item">
                        <div class="ui mini circular top right pointing icon dropdown">
                            <span><?=$_SESSION['account_name']?></span>
                            <i class="user icon"></i>
                            <div class="menu">
                                <div class="item">Ver em nova aba</div>
                                <div class="item">Alterar informações</div>
                                <div class="item">Excluir arquivo</div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Nofity -->
                <li>
                    <div class="uk-navbar-item" uk-toggle="target: #offcanvas-flip">
                        <a class="ui mini <?=$NoticeBtn?> icon button">Notificações <i class="bell icon"></i></a>
                    </div>
                </li>

                <!-- Other -->
                <li>
                    <div class="uk-navbar-item">
                        <button type="button" class="ui mini circular icon button" id="liloo-mode-btn" onclick="lilooMode()"></button>
                        <buttom type="button" class="ui mini circular icon button"><i class="sign-out icon"></i></buttom>
                    </div>
                </li>

            </ul>

        </div>
    </nav>

</div>

<div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar uk-padding-small">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <h3>Notificações</h3>
        <div>
            <?php
if ($ViewSys['bool'] == true) {
    foreach ($ViewSys['output'] as $NoticeSys) {
        echo '
                    <div uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <div onclick="lilooDash.NoticeURL(\'' . BASE_ADMIN . $NoticeSys['notify_redirect_url'] . '\')">
                            <i class="question circle icon"></i>
                            <h3>' . $NoticeSys['notify_title'] . '</h3>
                            <p class="uk-text-small">' . $NoticeSys['notify_description'] . '</p>
                        </div>
                    </div>
                    ';
    }
}
if ($View['bool'] == true) {
    foreach ($View['output'] as $Notice) {
        echo '
                    <div uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <div onclick="lilooDash.NoticeURL(\'' . BASE_ADMIN . $Notice['notify_redirect_url'] . '\')">
                            <i class="question circle icon"></i>
                            <h3>' . $Notice['notify_title'] . '</h3>
                            <p class="uk-text-small">' . $Notice['notify_description'] . '</p>
                        </div>
                    </div>
                    ';
    }
} else {
    echo '
                <div uk-alert>
                    <i class="question circle icon"></i>
                    <p class="uk-text-small">' . $View['message'] . '</p>
                </div>
                ';
}
?>
        </div>
    </div>
</div>
