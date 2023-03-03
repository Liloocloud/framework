<?php
/**
 * Gestão de componentes HTML Lightbox do Uikit
 * @copyright 28.02.2023 Felipe Oliveira Lourenço
 * @version 1.0.0
 */

namespace Components;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Components
{
    private $options;
    private $data;
    private $path = ROOT_COMPONENTS;
    private $cache = false;
    private $component;
    private $render;

    public function __construct($comp, $opt, $fun = null)
    {
        $this->options = $opt;
        $this->component = $comp;
        $this->cache = (isset($opt['cache']))? $opt['cache'] : false;
        $this->path = (isset($opt['path']))? $opt['path'] : $this->path;
        $this->data = (isset($opt))? $opt : $this->data;
    
        $loader = new FilesystemLoader($this->path.$this->component.'/');
        if ($this->cache) {
            $twig = new Environment($loader, ['cache' => ROOT . 'cache/']);
        } else {
            $twig = new Environment($loader);
        }

        $this->render = $twig->render($this->component.'.twig', $this->data);
        if($fun){
            $fun($this->render);
        }
    }

    /**
     * Para caso onde não seja necessário renderizar na instancia
     *
     * @return void
     */
    public function output()
    {
        return $this->render;
    }
}