<?php

require_once "Conexao.php";

class Categoria
{
    private $conexao;

    public function __construct() /* CONSTRUCT DE CONEXAO A CADA NOVO OBJETO CRIADO */
    {
        $db = new Conexao();
        $this->conexao = $db->conectar();
    }

    public function cadastrar($nome, $tipo, $idUsuario) /* CADASTRANDO NOVA CATEGORIA E PEGANDO O NOME, TIPO E O ID DO USUARIO QUE FICA NA SESSION */
    {
        $sql = "INSERT INTO categorias(nome,tipo,id_usuario) /* COMANDO SQL PARA O ENVIO DOS DADOS PARA O BANCO DE DADOS */
                VALUES('$nome','$tipo','$idUsuario')";

        return $this->conexao->query($sql); /* EXECUTANDO O CODIGO SQL */
    }

    public function listar($idUsuario) /* FUNCAO PARA LISTAR TODAS AS CATEGORIAS QUE ESTAO CADASTRADAS NO USUARIO LOGADO */
    {
        $sql = "SELECT * FROM categorias /* COMANDO SQL PARA LISTAR AS CATEGORIAS */
                WHERE id_usuario = '$idUsuario'
                ORDER BY nome";

        return $this->conexao->query($sql);
    }
}
