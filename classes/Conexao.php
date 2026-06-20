<?php

class Conexao
{
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "password";
    private $banco = "sistema_financeiro";

    public function conectar()
    {
        $conexao = new mysqli(
            $this->host,
            $this->usuario,
            $this->senha,
            $this->banco
        );

        if ($conexao->connect_error) {
            die("Erro: " . $conexao->connect_error);
        }

        return $conexao;
    }
}
