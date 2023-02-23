<style>
    .uk-nav-header{
        margin-left: 10px;
        color:  #dedede;
    }
</style>

<!-- SIDEBAR -->
<div id="liloo-admin-sidebar" >

    <!-- LOGO -->
    <div class="sidebar-logo" style="background: #f1f1f1">
        <img src="<?= BASE_ADMIN ?>images/logotipo.png" alt="<?= SITE_NAME ?>">
    </div>

    <!-- MENU -->
    <div class="sidebar-menu">

        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>           
            <li><a href="<?= BASE_ADMIN.ADMIN_ROUTE_INIT ?>"><i class="fad fa-tachometer-alt"></i> Painel Inicial</a></li>
                       
            <?php
            // Inclui os menus dos módulos
            $Menus = new Explore\OpenDirFile(ROOT_MODULE);
            foreach($active_modules as $inc){       
                if($This[$inc]['USER_LEVEL_MIN'] <=  $_SESSION['account_level']){
                    if(in_array($inc, $Menus->listDir())){                
                        include ROOT_MODULE.$inc.'/_routes.php'; 
                        
                        // Menu aberto
                        if(isset($__ROUTES__[$inc]['__open__'])){
                            unset($__ROUTES__[$inc]['__open__']);
                            foreach ($__ROUTES__[$inc] as $m => $b) {
                                $Show = (isset($b['show']) && $b['show'] == false)? false : true;
                                if( $b['level'] <=  $_SESSION['account_level'] && $Show){
                                    ?>
                                        <li><a href="<?= BASE_ADMIN.$inc.'/'.$m.'/' ?>"><?= $b['icon'].' '.$b['text'] ?></a></li>
                                    <?php
                                }
                            }

                        // Menu com submenu
                        }else{
                            ?>
                            <li class="uk-parent">
                                <a href="#"><?= $This[$inc]['ICON'].' '.$This[$inc]['TITLE'] ?></a>
                                <ul class="uk-nav-sub">
                                    <?php
                                    foreach ($__ROUTES__[$inc] as $k => $a){
                                        if( $a['level'] <=  $_SESSION['account_level']){
                                            $Show = (isset($a['show']))? $a['show'] : true ; 
                                            if($Show){
                                                ?>
                                                    <li><a href="<?= BASE_ADMIN.$inc.'/'.$k.'/' ?>"><?= $a['text'] ?></a></li>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                 </ul> 
                            </li>
                            <?php
                        }
                    }
                }
            }
            ?>
            <li class="uk-nav-divider"></li>
            <li><a href="<?= BASE ?>" target="_new"><i class="fad fa-globe"></i> Acessar o site</a></li>
            <li><a href="<?= BASE ?>conta/login/"><i class="fad fa-sign-out-alt"></i> Sair</a></li>
        </ul>
    </div>

</div>