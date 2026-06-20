<?php

require_once "Conexao.php";

class Transacao
{
    private $conexao;

    public function __construct()
    {
        $db = new Conexao();
        $this->conexao = $db->conectar();
    }

    public function cadastrar(
        $descricao,
        $valor,
        $data,
        $tipo,
        $idUsuario,
        $idCategoria
    ) {
        $sql = "INSERT INTO transacoes
        (
            descricao,
            valor,
            data,
            tipo,
            id_usuario,
            id_categoria
        )
        VALUES
        (
            '$descricao',
            '$valor',
            '$data',
            '$tipo',
            '$idUsuario',
            '$idCategoria'
        )";

        return $this->conexao->query($sql);
    }

    public function listar($idUsuario)
    {
        $sql = "SELECT t.*,
                       c.nome AS categoria
                FROM transacoes t
                INNER JOIN categorias c
                ON c.id_categoria = t.id_categoria
                WHERE t.id_usuario = '$idUsuario'
                ORDER BY t.data DESC";

        return $this->conexao->query($sql);
    }

    public function buscar($id)
    {
        $sql = "SELECT * FROM transacoes
                WHERE id_transacao = '$id'";

        $resultado = $this->conexao->query($sql);

        return $resultado->fetch_assoc();
    }

    public function editar(
        $id,
        $descricao,
        $valor,
        $data
    ) {
        $sql = "UPDATE transacoes
                SET descricao='$descricao',
                    valor='$valor',
                    data='$data'
                WHERE id_transacao='$id'";

        return $this->conexao->query($sql);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM transacoes
                WHERE id_transacao='$id'";

        return $this->conexao->query($sql);
    }
}
