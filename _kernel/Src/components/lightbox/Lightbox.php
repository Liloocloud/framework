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

class Lightbox
{

    private $options;
    private $cache;
    private $data;
    private $sql;
    private $path_tpl = ROOT_COMPONENTS . 'lightbox/';
    private $tpl = 'lightbox.twig';

    /**
     * Instancia da class inicial
     *
     * @param Array $options - Configurações e informações de entrada da classe
     * @param Fun $fun - Recebe uma função com callback para retornar o template
     */
    public function __construct($options, $fun)
    {    
        $this->cache = (isset($options['cache'])) ? $options['cache'] : false;
        $this->options = $options;
        if (isset($options['tpl'])) {
            $this->tpl = $options['tpl'];
        }
        if (isset($options['sql'])) {
            $this->data = $this->get($options['sql']['table'], $options['sql']['where']);
            $RenderItens['data'] = [];
            $i = 0;
            foreach ($this->data as $Item) {
                $RenderItens['data'][$i]['title'] = $Item[$options['sql']['fields']['title']];
                $RenderItens['data'][$i]['text'] = $Item[$options['sql']['fields']['text']];
                $i++;
            }
            $this->data = $RenderItens;

        }
        if (isset($options['data'])) {
            $this->data['data'] = $options['data'];
        }
        $fun($this->render());
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

    /**
     * Responsável por coletar informações do banco de dados
     * caso seja solicitado
     *
     * @param String $table - Tabela do banco de dados
     * @param Array $where - Condição a ser verificada no Sql
     * @return array|bool
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