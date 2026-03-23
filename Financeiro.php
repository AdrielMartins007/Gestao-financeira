<?php

class Financeiro{
    public $saldo;
    public $despesa;
    public $saldoTotal;

    public function __construct()
    {
        $this->saldo = "";
        $this->despesa = "";
        $this->saldoTotal = "";
    }

    function iniciar(){
        echo 'Iniciando o programa...<br>';
    }

    function valorSaldo($saldo){
        $this->saldo = $saldo;
        echo 'Adicionado ' . $saldo . ' reais a conta.<br>';
    }

    function valorDespesa($despesa){
        $this->despesa = $despesa;
        echo 'Adicionado ' . $despesa . ' reais a despesa.<br>';
    }

    function verificarSaldoTotal(){
        $resultado = $this->saldo - $this->despesa;
        echo 'Saldo total: ' . $resultado . ' reais.';
    }
}

?>