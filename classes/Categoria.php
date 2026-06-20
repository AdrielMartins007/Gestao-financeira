<?php

require_once "Conexao.php";

class Categoria
{
    private $conexao;

    public function __construct()
    {
        $db = new Conexao();
        $this->conexao = $db->conectar();
    }

    public function cadastrar($nome, $tipo, $idUsuario)
    {
        $sql = "INSERT INTO categorias(nome,tipo,id_usuario)
                VALUES('$nome','$tipo','$idUsuario')";

        return $this->conexao->query($sql);
    }

    public function listar($idUsuario)
    {
        $sql = "SELECT * FROM categorias
                WHERE id_usuario = '$idUsuario'
                ORDER BY nome";

        return $this->conexao->query($sql);
    }
}
