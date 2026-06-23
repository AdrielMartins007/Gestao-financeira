<?php

class Conexao /* ARQUIVO DE CONEXAO COM O BANCO DE DADOS */
{
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "password";
    private $banco = "sistema_financeiro"; /* COLOCANDO INFORMAÇÕES E O NOME DO BANCO DE DADOS */

    public function conectar() /* FUNCAO PARA CONECTAR AO BANCO DE DADOS */
    {
        $conexao = new mysqli(
            $this->host,
            $this->usuario,
            $this->senha,
            $this->banco
        );

        if ($conexao->connect_error) { /* CONDIÇÃO SE CASO NAO CONECTAR, ELE EXIBE UMA MENSAGEM DE ERRO */
            die("Erro: " . $conexao->connect_error);
        }

        return $conexao;
    }
}
