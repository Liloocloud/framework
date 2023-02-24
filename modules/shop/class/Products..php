<?php
/**
 * Abstração da tabela "liloo_shop_products
 * @copyright Felipe Oliveira 22.09.2022
 * @version 1.0.0
 */

namespace Module\Shop;

class Products
{

    private $term; // armazena o busca por termo de pesquisa , idela para verificar se o
    private $read;

    // public function __construct()
    // {

    // }

    

    /**
     * Verifica se o produto existe pelo Code
     */
    public function CheckCode($code=null)
    {
        if($code){
            $Check = _get_data_table(TB_SHOP_PRODUCTS, ['prod_code' => $code]);
            $Check = (isset($Check[0]))? $Check[0] : false;
            if($Check != false){
                return [
                    'bool' => false,
                    'output' => $Check,
                    'message' => 'O id é obrigatório'
                ];
            }
            return [
                'bool' => false,
                'output' => null,
                'message' => 'Nenhum produto encontrado'
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'O id é obrigatório'
        ];
    }

}
