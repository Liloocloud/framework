<?php

namespace Module\Accounts;

use Account\Create;

class CreateAccountStep1
{
    private static $Sync; // Dados do formulário
    private static $Data; // Returna Os Dados do Banco de dados 'lillo_accounts'
    private static $Email; // Guardo o e-mail do usuário
    // private $Return; // Retorna os dados para ser utilizado pelo método

    /**
     * Cria o primeiro passo do cadastro de usuário seguindo
     * a regra de negócio, sendo criação em passos
     */
    public static function One(array $Sync)
    {
        $Sync['account_level'] = 8;
        self::$Sync = $Sync;
        $Proc = [
            self::CheckEmail(),
            self::CreateAccount(),
        ];
        $Return = null;
        foreach ($Proc as $Func) {
            if ($Func['bool'] == false) {
                return $Func;
            }
            $Return = $Func;
        }
        return $Return;

    }

    /**
     * Cria a linha do banco de dados com todos as
     * informaçõe doa primeira etapa do formulário
     */
    private static function CreateAccount()
    {
        $User = new Create(self::$Sync);
        $Add = $User->create();
        if ($Add['bool']) {
            $Send = $User->sendMailConfirm(
                'Portal Busque Já - Valide seu Cadastro para Começar a Anunciar',
                self::$Sync['account_name'],
                self::$Sync['account_email']
            );
            if ($Send['bool']) {
                $JSON = $Send;
                $JSON['output']['account_id'] = $Send['output'];
                return $JSON;
            }
            return $Send;
        }
        return $Add;
    }

    /**
     * Verifica se foi passado um e-mail no array da instancia
     */
    private static function CheckEmail()
    {
        if (!isset(self::$Sync['account_email']) || empty(self::$Sync['account_email'])) {
            return [
                'bool' => false,
                'output' => null,
                'message' => 'Nenhum e-mail foi passado. Digite seu e-mail!',
            ];
        }
        $Data = _get_data_table(TB_ACCOUNTS, ['account_email' => self::$Sync['account_email']]);
        self::$Data = (isset($Data[0])) ? $Data[0] : false;
        self::$Email = self::$Sync['account_email'];
        if (self::$Data != false) {
            return [
                'bool' => true,
                'output' => null,
                'message' => 'Esse e-mail já foi cadastrado',
            ];
        }
        return [
            'bool' => false,
            'output' => null,
            'message' => 'E-mail não cadastrado',
        ];
    }

}
