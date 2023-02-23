<?php
/**
 * Responsável por gerenciar o acesso ao sistema embarcado
 * que fica dentro do tema.
 * @copyright Felipe Oliveira Lourenço - 23.02.2021
 * @version 1.0.0
 */

namespace Embedded;
use Explore\Modules;

class Admin
{
    private $url; // Guarda a URL
    private $tpl; // Guarda a TPL
    private $config = FRONT_REQUIRE_MODULE_ROUTES; // Module Requires

    /**
     * Valida o uso das rotas dos módulos
     * declarados na __config.frontend.php do tema
     */
    public function checkRoutes()
    {
        $MODULE = (isset(URL()[1])) ? URL()[1] : false; // Nível de URL que representa o módulo
        $ROUTE = (isset(URL()[2])) ? URL()[2] : false; // Nível de URL que representa a rota
        if ($MODULE && array_key_exists($MODULE, $this->config)) {
            if ($ROUTE && array_key_exists($ROUTE, $this->config[$MODULE])) {
                if ($this->config[$MODULE][$ROUTE]['level'] <= $_SESSION['account_level']) {
                    return [
                        $this->config[$MODULE][$ROUTE]['path'],
                        'SUCCESS',
                        true,
                    ];
                } else {
                    return [
                        'Você não tem permissão para acessar este conteúdo',
                        'ERROR_PERMISSION',
                        false,
                    ];
                }
            } else {
                return [
                    'URL não existe.',
                    'ERROR_ROUTE',
                    false,
                ];
            }
        }
        return [
            'Módulo não encontrado.',
            'ERROR_MODULE',
            false,
        ];
    }

    /**
     * Página inicial ou página coringa. Usada para
     * redirecionamento caso o caminho especificado
     * não seja encontrado
     */
    public function initPage($path='tpl/initial.tpl')
    {  
        global $Extra;
        $node1 = ElementMount(
            "\[node1\]",
            "\[\/node1\]",
            file_get_contents(PATH_THEME . 'admin/'.$path)
        );
        $view = _tpl_fill($node1['before'], $Extra, '', false);
        $M = new Modules;
        foreach ($M->allData() as $key => $Vals) {
            $view.= _tpl_fill($node1['content'], $Extra, $Vals, false);
        }
        $view.=_tpl_fill($node1['after'], $Extra, '', false);
        return $view;
    }

}
