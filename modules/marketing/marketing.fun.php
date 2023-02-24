<?php
/**
 * Arquivo que contém função para uso na TPL
 */

/**
 * Cria o gráfico utilizando os dados passados pelo Array
 */
function _card_graphic($args)
{
    $id = uniqid();
    $View = '<div class="uk-card uk-card-default">';
    $View .= '<div class="uk-card-header uk-padding-small">';
    $View .= '<h4>' . $args['title'] . '</h4>';
    $View .= '<p>' . $args['desc'] . '</p>';
    $View .= '</div>';
    $View .= '<div class="uk-card-body">';
    if (isset($args['data']) && !empty($args['data'])) {
        $View .= '
            <canvas id="' . $id . '"></canvas>
            <script>
            new Chart(
                document.getElementById(\'' . $id . '\'), {
                type: \'' . $args['type'] . '\',
                data: {
                labels: [' . $args['data']['labels'] . '],
                datasets: [{
                        data: [' . $args['data']['values'] . '],
                        backgroundColor: [' . $args['data']['colors'] . '],
                        hoverOffset: 10
                    }]
                }
            })
            </script>
            ';
    } else {
        $View .= '<p>Nenhum Interação registrada</p>';
    }
    $View .= '</div>';
    $View .= '</div>';
    return $View;
}
