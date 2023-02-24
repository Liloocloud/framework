<?php
/**
 * Gerenciamento dos Anúncios do Portal
 * @copyright Felipe Oliveira 06.02.2023
 * @version 1.0.0
 */

namespace Module\Portal;
use Email\Email;
use Generic\Read;

class Ads
{
    private $table = TB_PORTAL_USERPAGE;
    private $table_adds = TB_PORTAL_USERPAGE_ADDS;
    private $table_account = TB_ACCOUNTS;
    private $table_ads = TB_PORTAL_ADS;
    private $where;

    public function __construct(string $table = null, $where = null)
    {
        $this->table = ($table) ? $table : $this->table;
        $this->where = ($where) ? $where : $this->where;
    }

    /**
     * Contabiliza um comportamento do usuário, contando quantas vezes um determinado
     * elemento recebeu de cliques. Se existe atualizar, se não cria
     * @param Array Campos que deseja inserir, também servirão para condição WHERE
     */
    public function addAction($fields)
    {
        if (!isset($fields['repo_ads_id'])) {
            return 'É necessário passar o ID do aúncio';
        }

        $Insert = $fields;
        foreach ($fields as $key => $value) {
            if (mb_strpos($key, 'subject') or mb_strpos($key, 'message')) {
                unset($fields[$key]);
            }
        }
        $this->where = $fields;
        $Check = $this->checkReport();
        $Insert['repo_ads_cookie'] = (isset($_COOKIE['click_ads'])) ? $_COOKIE['click_ads'] : null;
        $Insert['repo_values'] = ($Check) ? ($Check['repo_values'] + 1) : 1;
        $Insert = array_filter($Insert, 'strlen');
        $Ads = $this->getAdsID($fields['repo_ads_id']);

        // Create
        if (!$Check) {
            $Set = _set_data_table($this->table, $Insert);
            return [
                'bool' => ($Set) ? true : false,
                'message' => ($Set) ? 'Inserido com sucesso' : 'Não foi possível inserir',
                'output' => ['id' => ['repo_id' => $Set], 'fields' => $Insert, 'ads' => $Ads],
            ];

            // Update
        } else {
            $Up = _up_data_table($this->table, ['where' => $fields, 'values' => $Insert]);
            return [
                'bool' => ($Up) ? true : false,
                'message' => ($Up) ? 'Atualizado com sucesso' : 'Não foi possível atualizar',
                'output' => ['check' => $Check, 'fields' => $Insert, 'ads' => $Ads],
            ];
        }
    }

    /**
     * Envia o email para o servidor
     * @param Array Informações do contato em array
     * @param Int ID da conta do usuário (Assinante)
     */
    public function sendForm(array $infos, int $account_id)
    {
        $this->where = $infos;
        $Check = new Read($this->table_account, ['account_id' => $account_id]);
        $Check = $Check->check();
        if(!$Check['bool']){
            return [ 'bool' => false, 'message' => 'Usuário não existe', 'output' => null ];
        }
        $recipient_name = (string) trim($Check['output'][0]['account_name'].' '. $Check['output'][0]['account_lastname']);
        $recipient_email = $Check['output'][0]['account_email'];

        if ($this->checkStrKey('email') && $this->checkStrKey('name')) {
            $email = new Email();
            $email->add(
                'Contato recebido pelo portal ' . SITE_NAME,
                "<h3>Mais um cliente em potencial para você!</h3>
                <a href='" . BASE . "admin/'>Faça o login para ver o contato</a>
                <p>Desejamos muito sucesso e boas vendas!</p>",
                $recipient_name,
                $recipient_email
            );
            $Send = $email->send();
            return [
                'bool' => ($Send)? true : false,
                'message' => ($Send)? 'E-mail enviado com sucesso' : 'Não foi possível enviar e-mail',
                'output' => ($Send)? $Check['output'] : null,
            ];  
        }
        return [ 'bool' => false, 'message' => 'Envie nome e e-mail do remetente', 'output' => null ];
    }

    /**
     * Verifica se existe uma string na chave do array pelo termo passada pelo parametro
     * Ideal para verificar informações obrigatórias
     */
    private function checkStrKey(string $term)
    {
        foreach ($this->where as $key => $value) {
            if (mb_strpos($key, $term)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Verifica se o registro existe
     * @param Array Condição WHERE
     */
    private function checkReport()
    {
        $Check = _get_data_table($this->table, $this->where);
        return (isset($Check[0])) ? $Check[0] : false;
    }

    /**
     * Retornar o anuncio da tabale de anuncio para associar com o relatório
     * @param String|Int ID do anuncio
     */
    private function getAdsID($id)
    {
        $Ads = _get_data_table($this->table_ads, ['ads_id' => $id]);
        return (isset($Ads[0])) ? $Ads[0] : false;
    }

}
