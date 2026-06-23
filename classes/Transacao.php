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

    public function cadastrar( /* FUNCAO CADASTRAR ONDE VAI PEGAR VALORES QUE SERA INCLUIDOS NO INPUT */
        $descricao,
        $valor,
        $data,
        $tipo,
        $idUsuario,
        $idCategoria
    ) {
        $sql = "INSERT INTO transacoes /* COMANDO SQL PARA O ENVIO DOS DADOS PARA O BANCO DE DADOS */
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

        return $this->conexao->query($sql); /* EXECUTANDO O COMANDO SQL E ENVIANDO OS DADOS */
    }

    public function listar($idUsuario) /* LISTANDO TODAS AS TRANSAÇÕES CADASTRADAS NO USUARIO LOGADO */
    {
        $sql = "SELECT t.*, /* COMANDO SQL PARA BUSCAR DO BANCO DE DADOS */
                       c.nome AS categoria
                FROM transacoes t
                INNER JOIN categorias c
                ON c.id_categoria = t.id_categoria
                WHERE t.id_usuario = '$idUsuario'
                ORDER BY t.data DESC";

        return $this->conexao->query($sql); /* EXECUTANDO O COMANDO SQL */
    }

    public function buscar($id) /* FUNCAO QUE ESTA LIGADO COM O BOTAO 'EDITAR' */
    {
        $sql = "SELECT * FROM transacoes /* COMANDO SQL PARA LISTAR TODAS AS TRANSAÇÕES LIGADAS AO ID DO USUARIO */
                WHERE id_transacao = '$id'";

        $resultado = $this->conexao->query($sql);

        return $resultado->fetch_assoc();
    }

    public function editar( /* FUNCAO EDITAR VALORES DA TRANSAÇÃO */
        $id,
        $descricao,
        $valor,
        $data
    ) {
        $sql = "UPDATE transacoes /* COMANDO SQL PARA O ENVIO DOS VALORES ATUALIZADOS */
                SET descricao='$descricao',
                    valor='$valor',
                    data='$data'
                WHERE id_transacao='$id'";

        return $this->conexao->query($sql);
    }

    public function excluir($id) /* FUNCAO PARA EXCLUIR TRANSAÇÃO CADASTRADA NO USUARIO LOGADO */
    {
        $sql = "DELETE FROM transacoes /* COMANDO SQL PARA EXLUIR A TRANSAÇÃO SELECIONADA */
                WHERE id_transacao='$id'";

        return $this->conexao->query($sql); /* EXECUTANDO O COMANDO */
    }
}
