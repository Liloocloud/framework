<?php
/**
 * Gestão de componentes HTML
 * @copyright 25.02.2023 Felipe Oliveira Lourenço
 * @version 1.0.0
 */

namespace Components;

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
    public function __construct($template, $optins = null)
    {
        $this->template = $template;
        $this->options = ($optins == null) ? '' : $optins;
    }

    public function render()
    {     
        echo $this->comp();
        // return $this->options;
    }

    private function comp()
    {
        $tpl = file_get_contents($this->template);
        return $tpl;
    }

}
