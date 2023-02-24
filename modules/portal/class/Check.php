<?php
/**
 * Class responsável por todo o fluxo de operações
 * do módulo Portal de Anuncios sendo dados unitários
 * @copyright Felipe Oliveira 13.06.2022
 * @version 1.0.0
 */

namespace Module\Portal;

class Check
{
    private $data; // Entrada de dados podendo ser string,int ou array
    private $read; // Dados coletados

    public function __construct($data)
    {
        $this->data = $data;
        $this->get();
    }

    /**
     * Verifica se o anuncio existe
     */
    public function Exists()
    {
        if ($this->read) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'O anúncio existe',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Anúncio inexistente',
        ];
    }

    /**
     * Verifica se data ainda é valida
     * @param int Tempo em minutos a ser comparado Padrão 30 dias (24 * 60 * 30)
     * @param string (Opcional) Outra data que pretende comparar
     */
    public function diffDate($min = 43200, $date = false)
    {
        if (!isset($this->read[0]['ads_registered'])) {
            return [
                'bool' => false,
                'output' => null,
                'message' => 'Não encontramos a data e hora',
            ];
        }
        $init = $this->read[0]['ads_registered'];
        $date = ($date) ? $date : date("Y-m-d H:i:s");
        $time = (strtotime($date) - strtotime($init)) / 60;
        if ($time <= $min) {
            return [
                'bool' => true,
                'output' => $time,
                'message' => 'Tempo de expiração do anúncio não excedido',
            ];
        }
        return [
            'bool' => false,
            'output' => $time,
            'message' => 'Tempo de expiração do anúncio excedido',
        ];
    }

    /**
     * Verifica se o anuncio está ativo ou não
     */
    public function Status()
    {
        if (!isset($this->read[0]['ads_status'])) {
            return [
                'bool' => false,
                'output' => null,
                'message' => 'Não encontramos os dados de status',
            ];
        }
        if ((int) $this->read[0]['ads_status'] == 1) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'Anúncio ativo',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Anúncio inativo',
        ];
    }

    /**
     * Retorna se o usuário aceitou os termos de uso ou não
     */
    public function acceptTerms()
    {
        if (!isset($this->read[0]['ads_accept_terms'])) {
            return [
                'bool' => false,
                'output' => null,
                'message' => 'Não encontramos os dados para verificar os termos',
            ];
        }
        if ((int) $this->read[0]['ads_accept_terms'] == 1) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'Você aceitou os termos e condições de uso',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'Você ainda não aceitou os termos e condições de uso',
        ];
    }

    /**
     * Verifica se o anuncio foi moderado pelo administrados ou não
     */
    public function Moderate()
    {
        if (!isset($this->read[0]['ads_moderate'])) {
            return [
                'bool' => false,
                'output' => null,
                'message' => 'Não encontramos os dados para verificar a moderação',
            ];
        }
        if ((int) $this->read[0]['ads_moderate'] == 1) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'O anúncio já foi moderado',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'O anúncio ainda não foi moderado',
        ];
    }

    /**
     * Verifica se o usuário permiti ver o endereço no 
     * site ou não, se sim o anuncio será apresentado 
     * de forma parcial
     */
    public function viewAddress()
    {
        if (!isset($this->read[0]['ads_address_view'])) {
            return [
                'bool' => false,
                'output' => null,
                'message' => 'Não encontramos os dados para verificar',
            ];
        }
        if ((int) $this->read[0]['ads_address_view'] == 1) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'O endereço pode ser visualizado',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'O endereço não pode ser visualizado',
        ];
    }

    /**
     * Recebe um array para trazer apenas os campos 
     * passados pelo parametro
     * @param array Colunas da tabela liloo_ads
     */
    public function Fields($fields)
    {
        if (!isset($this->read[0])) {
            return [
                'bool' => false,
                'output' => null,
                'message' => 'Não encontramos os dados',
            ];
        }
        $Check = true;
        $fieldOutput = [];
        foreach ($this->read[0] as $key => $field) {
            if (in_array($key, $fields)) {
                if (is_null($field) || empty($field)) {
                    $fieldOutput = $key;
                    $Check = false;
                    break;
                }
                $fieldOutput[$key] = $field;
            }
        }
        if ($Check) {
            return [
                'bool' => true,
                'output' => $fieldOutput,
                'message' => 'Todos os campos foram validados com sucesso',
            ];
        }
        return [
            'bool' => false,
            'output' => $fieldOutput,
            'message' => "O campo \"{$fieldOutput}\" foi o primeiro nulo encontrado",
        ];
    }

    /**
     * Realiza a busca no banco
     */
    private function get()
    {
        switch ($this->data) {
            case (is_array($this->data)):
                $this->read = _get_data_table(TB_PORTAL_ADS, $this->data);
                break;
            case (is_int($this->data)):
                $this->read = _get_data_table(TB_PORTAL_ADS, ['ads_id' => $this->data]);
                break;
            case (is_string($this->data)):
                $this->read = _get_data_full("SELECT * FROM `" . TB_PORTAL_ADS . "` WHERE {$this->data}");
                break;
        }

    }

}
