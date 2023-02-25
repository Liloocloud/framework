<?php
/**
 * Gestão de componentes HTML
 * @copyright 25.02.2023 Felipe Oliveira Lourenço
 * @version 1.0.0
 */

namespace Components;

use Generic\Read;

class Accordion
{

    private $options;
    private $output;
    private $template;

    /**
     * Instancia da class inicial
     *
     * @param [type] $template - Caminho do arquivo *.tpl a ser renderizado
     * @param [type] $optins - Opções adicionais
     */
    public function __construct($template, $fun)
    {
        $this->template = $template['template'];

        $Item = new Read($template['sql']['table']);
        $Itens = $Item->getArray($template['sql']['where']);
        $View = '<ul uk-accordion>';
        foreach ($Itens['output'] as $key => $Val) {

            $View .= '
            <li>
                <a class="uk-accordion-title" href="#">' . $Val[$template['sql']['fields']['title']] . '</a>
                <div class="uk-accordion-content">
                    <p>' . $Val[$template['sql']['fields']['text']] . '</p>
                </div>
            </li>';
        }
        $View .= '</ul>';

        // $this->options = ($options == null) ? '' : $options;
        $fun($View);
    }

    private function render()
    {
        $tpl = file_get_contents($this->template);
        return $tpl;
    }

}
