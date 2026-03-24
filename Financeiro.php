<?php

class Financeiro
{
    public $saldo;
    public $despesa;
    public $saldoTotal;

    public function __construct()
    {
        $this->saldo = 20.000;
        $this->despesa = 15.000;
        $this->saldoTotal = 5.000;
    }

    function valorSaldo($saldo)
    {
        $this->saldo = $saldo;
        echo 'Adicionado ' . $saldo . ' reais a conta.<br>';
    }

    function valorDespesa($despesa)
    {
        $this->despesa = $despesa;
        echo 'Adicionado ' . $despesa . ' reais a despesa.<br>';
    }

    function verificarSaldoTotal()
    {
        $resultado = $this->saldo - $this->despesa;
        echo 'Saldo total: ' . $resultado . ' reais.';
    }
}
