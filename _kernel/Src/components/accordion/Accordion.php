<?php
/**
 * Gestão de componentes HTML
 * @copyright 25.02.2023 Felipe Oliveira Lourenço
 * @version 1.0.0
 */

namespace Components;

use Generic\Read;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Accordion
{

    private $options;
    private $output;
    private $cache = false;
    private $data;
    private $sql;
    private $path_tpl = ROOT_COMPONENTS . 'accordion/';
    private $tpl = 'uikit.twig';

    /**
     * Instancia da class inicial
     *
     * @param [type] $template - Caminho do arquivo *.tpl a ser renderizado
     * @param [type] $optins - Opções adicionais
     */
    public function __construct($options, $fun)
    {
        $this->options = $options;
        if (isset($options['tpl'])) {
            $this->tpl = $options['tpl'];
        }
        if (isset($options['sql'])) {
            $this->data = $this->get($options['sql']['table'], $options['sql']['where']);
        }
        if (isset($options['content'])) {
            $this->data = $options['content'];
        }

        // var_dump($this->data);

        // $Item = new Read($template['sql']['table']);
        // $Itens = $Item->getArray($template['sql']['where']);
        // $View = '<ul uk-accordion>';
        // foreach ($Itens['output'] as $key => $Val) {

        //     $View .= '
        //     <li>
        //         <a class="uk-accordion-title" href="#">' . $Val[$template['sql']['fields']['title']] . '</a>
        //         <div class="uk-accordion-content">
        //             <p>' . $Val[$template['sql']['fields']['text']] . '</p>
        //         </div>
        //     </li>';
        // }
        // $View .= '</ul>';

        // $this->options = ($options == null) ? '' : $options;
        $fun($this->render());
    }

    /**
     * Exporta a Tpl para ser renderizada
     *
     * @return void
     */
    public function tpl()
    {
        return $this->tpl;
    }

    /**
     * Renderização com Twig
     *
     * @return void
     */
    private function render()
    {
        $loader = new FilesystemLoader($this->path_tpl);
        $twig = new Environment($loader, [
            // 'cache' => ROOT.'cache/',
        ]);
        return $twig->render($this->tpl, [ 'data' => $this->data ]);
    }

    /**
     * Responsável por coletar informações do banco de dados
     * caso seja solicitado
     *
     * @return void
     */
    private function get($table, $where)
    {
        $this->sql = new Read($table);
        $this->sql = $this->sql->getArray($where);
        if ($this->sql['bool']) {
            return $this->sql['output'];
        }
        return false;
    }

}
