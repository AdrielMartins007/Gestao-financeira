<?php

class Financeiro
{
    public $tipoDespesa;
    public $valorDespesa;
    public $saldo;
    public $valorTotal;

    public static $lista = [];

    public function __construct()
    {
        $this->tipoDespesa = "";
        $this->valorDespesa = "";
        $this->saldo = "";
        $this->valorTotal = "";
    }

    public function enviardados($tipoDespesa, $valorDespesa){
        self::$lista[] = [
            'tipo' => $tipoDespesa,
            'valor' => $valorDespesa
        ];

        echo "<script>alert('Dados enviados com sucesso!');
        window.location.href = 'index.php';
        </script>";
    }

    public function mostrarDespesas(){
        foreach(self::$lista as $valor){
            echo "tipo: " . $valor['tipo'] . " | Valor: " . $valor['valor']; 
        }
    }
}
