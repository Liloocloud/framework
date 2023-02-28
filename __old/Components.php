<?php
/**
 * Gestão de componentes HTML Lightbox do Uikit
 * @copyright 28.02.2023 Felipe Oliveira Lourenço
 * @version 1.0.0
 */

namespace Components;

use Generic\Read;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Components
{

    private $options;
    private $data;
    private $callback;
    private $path_tpl = ROOT_COMPONENTS;
    private $tpl;
    private $cache = false;
    private $component;

    public function __construct($comp, $opt, $fun)
    {
        $this->options = $opt;
        $this->callback = $fun;
        $this->component = $comp;
        if(isset($opt['join'])){
            $Join = new Read($opt['join']['tables'][0]);
            $tb1 = $opt['join']['tables'][0];
            $tb2 = $opt['join']['tables'][1];
            $on1 = $tb1.".".$opt['join']['on'][0];
            $on2 = $tb2.".".$opt['join']['on'][1];
            $whr = key($opt['join']['where']);
            $val = $opt['join']['where'][$whr];            
            $Res = $Join->join(
                "INNER JOIN `" . $tb2 . "` ON " . $on1 . " = " . $on2 . "
                WHERE " . $whr . " = ". $val, // Parte da sintaxe INNER JOIN + WHERE
                10, // Limite de resultados paginados
                "" // Statement passando chave e valor
            );
            if($Res['bool']){
                $this->data['data'] = $Res['output'];              
            }

            $fun($this->out());

        }
    }


    public function out()
    {

        return call_user_func('accordion');
    }

    public function accordion()
    {
        echo 'accordion ok';   

    }


    /**
     * Renderização com Twig
     *
     * @return array
     */
    private function render()
    {
        $loader = new FilesystemLoader($this->path_tpl);
        if ($this->cache) {
            $twig = new Environment($loader, ['cache' => ROOT . 'cache/']);
        } else {
            $twig = new Environment($loader);
        }
        return $twig->render($this->tpl, $this->data);
    }


}
