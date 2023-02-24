<?php
// https://www.daterangepicker.com/#config

function this_filter_channel($c){
    switch ($c) {
        case 'goa': return 'Google Ads'; break;
        case 'faa': return 'Facebook Ads'; break;
        case 'fao': return 'Facebook Orgânico'; break;
        case 'ina': return 'Instagram Ads'; break;
        case 'ino': return 'Instagram Orgânico'; break;
        case 'qrc': return 'Acesso ao QR-Code'; break;
        case 'ref': return 'Link de Acesso direto'; break;
        case 'rec': return 'Recomendação por link (Indicação)'; break;
        case 'blk': return 'Backlink (Link Building)'; break;
        case 'ytb': return 'Youtube'; break;
        case 'cti': return 'Cartão Interativo'; break;
        case 'lka': return 'Linkedin Ads'; break;
        case 'emk': return 'E-mail Marketing'; break;
        case 'wtl': return 'Lista de Transmissão Whatsapp'; break;
        case 'nda': return 'Desconhecido (possível SEO)'; break;
    }
}


function _card_funil_modal( $args ){
    $Dash = _get_data_full($args['sql']);
    $Dash = (isset($Dash[0]))? (int) $Dash[0]['Form'] : 0 ;
    echo '
    <div>
        <div class="uk-card uk-card-default uk-padding-small">
            
            <div class="uk-flex uk-flex-between uk-padding-remove">
                <img src="'.$args['icon'].'" alt="'.$args['label'].'" width="60px">
                <div>
                    <div class="uk-inline">
                        <a href="" class="uk-icon-button" uk-icon="info"></a>
                        <div uk-drop="mode: click; pos: top-right;">
                            <div class="uk-card uk-card-body uk-card-default uk-padding-small uk-text-small">'.$args['info'].'</div>
                        </div>
                    </div>
                    <div class="uk-inline">
                        <a href="" class="uk-icon-button" uk-icon="more-vertical"></a>
                        <div uk-drop="mode: click; pos: top-right;">
                            <div class="uk-card uk-card-default uk-padding-small">
                                <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
                                    <li><a href="#">Ver relatório</a></li>
                                    <li><a href="#">Ver relatório</a></li>
                                    <li><a href="#">Ver relatório</a></li>
                                    <li><a href="#">Ver relatório</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-grid-small uk-flex-middle uk-margin-small-top" uk-grid>
                <div class="uk-width-expand">
                    <h4 class="uk-margin-remove-bottom">'.$args['label'].': '.$Dash.'</h4>
                    <p class="uk-margin-remove-top uk-text-small">'.$args['text'].'</p>
                    <a href="'.$args['route'].'" class="uk-button uk-button-default uk-button-xsmall">Lista completa</a>
                </div>
            </div>
        </div>
    </div>
    ';
}

// _card_funil_modal([
//     "sql" => "SELECT COUNT(contact_id) AS Form FROM ".TB_CONTACTS." WHERE contact_channel = 'wtl'",
//     "icon" => BASE_THEME_UPLOADS."icons/whatsapp-list.svg",
//     "label" => "Lista de Transmissão",
//     "text" => "Interações de usuários de sua lista de transmissão do whatsapp",
//     "info" => "Se você montou uma lista de transmissão pelo whatsapp e utilizou o link de acompanhamento, todas as interações vindas desse canal serão contabilizadas aqui.",
//     "route" => "reports-whatsapp-list/",
// ]);


function _card_graphic($args){
    $id = uniqid();
    ?>
    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-padding-small">
            <h4><?= $args['title'] ?></h4>
            <p><?= $args['desc'] ?></p>
        </div>
        <div class="uk-card-body">
            <?php if( isset($args['data']) && !empty($args['data']) ): ?>        
            <canvas id="<?= $id ?>"></canvas>
            <script>
            new Chart(
                document.getElementById('<?= $id ?>'), {
                type: '<?= $args['type'] ?>',
                data: {
                labels: [<?= $args['data']['labels'] ?>],
                datasets: [{
                        // label: 'My First dataset',
                        // borderColor: 'rgb(255, 99, 132)',
                        data: [<?= $args['data']['values'] ?>],
                        backgroundColor: [<?= $args['data']['colors'] ?>],
                        hoverOffset: 10
                    }]
                }
            })           
            </script>
            <?php else: ?>
                <p>Nenhum Interação registrada</p>
            <?php endif; ?>
        </div>
    </div>
    <?php
}


function chart_google(){
    ?>
    <div class="uk-card uk-card-default">
        <div class="uk-card-header">
            <h4>Percentual de Contatos</h4>
            <p style="margin-top: -20px; font-size: 12px;">Visual Geral das Interações de Usuário no site</p>
        </div>
        <div class="uk-card-body">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Dados', 'Unidades'],
                    ['Clique no Botão do Whatsapp', <?= $Extra['contacts_clicks'] ?>],
                    ['Contatos pelo Whatsapp',  <?= $Extra['contacts_whatsapp'] ?>],
                    ['Visualização do Telefone',  <?= $Extra['contacts_phone'] ?>],
                    ['Formulários Enviados', <?= $Extra['contacts_form'] ?>]
                    ]);
                    var options = {
                        // title: 'My Daily Activities',
                        is3D: true,
                        pieHole: 1,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                    chart.draw(data, options);
                }
            </script>
            <div id="donutchart"></div>
        </div>
    </div>
    <?php
}