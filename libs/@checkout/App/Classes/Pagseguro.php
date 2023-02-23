<?php

namespace app\classes;

class Pagseguro
{
    private $pagseguroConfig;
    private $nome;
    private $sobrenome;
    private $email;
    private $ddd;
    private $telefone;
    private $idReferencia;
    private $credenciais;
    private $itemAdd;
    private $dadosCliente;

    public function __construct()
    {
        $this->pagseguroConfig = new \PagSeguroPaymentRequest();
        \PagseguroLibrary::init();
    }

    private function dadosCompra()
    {
        $this->pagseguroConfig->setSender(
            $this->nome.' '.$this->sobrenome,
            $this->email,
            $this->ddd,
            $this->telefone
        );

        $this->pagseguroConfig->setCurrency("BRL");
        $this->pagseguroConfig->setReference($this->idReferencia);
        // $this->pagseguroConfig->setShippingAddress( 'cep', 'rua', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'pais' );
        $this->pagseguroConfig->setShippingAddress(null);

        $this->pagseguroConfig->addItem($this->item['id'], $this->item['produto'], $this->item['qtd'], $this->item['preco']);
    }

    public function enviarPagseguro()
    {
        $this->dadosCompra();
        $this->credenciais = new \PagSeguroAccountCredentials(
            'seu-email-pagseguro',
            'seu-token'
        );

        $url = $this->pagseguroConfig->register($this->credenciais);
        return $url;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setSobreNome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setDdd($ddd)
    {
        $this->ddd = $ddd;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setIdReferencia($idReference)
    {
        $this->idReferencia = $idReference;
    }

    public function setItemAdd($itemAdd)
    {
        $this->itemAdd = $itemAdd;
    }
}
