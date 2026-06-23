<?php

require_once "Conexao.php";

class Usuario /* CRIANDO A CLASSE USUARIO */
{
    private $conexao;

    public function __construct() /* CONSTRUCT PARA QUE TODA VEZ QUE UM NOVO OBJETO FOR CRIADO, ELE SE CONECTAR AUTOMATICAMENTE */
    {
        $db = new Conexao();
        $this->conexao = $db->conectar(); /* CHAMANDO A FUNCAO CONECTAR */
    }

    public function cadastrar($nome, $email, $senha) /* FUNCAO CADASTRAR NOVO USUARIO ONDE VAI RECEBER O NOME, EMAIL E SENHA */
    {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT); /* METODO DE CRIPTOGRAFIA DA SENHA PARA O BANCO DE DADOS */

        $sql = "INSERT INTO usuarios(nome,email,senha) /* COMANDO SQL PARA O ENVIO DOS DADOS PARA O BANCO DE DADOS */
                VALUES('$nome','$email','$senhaHash')";

        return $this->conexao->query($sql); /* EXECUTANDO E ENVIANDO OS DADOS PARA O BANCO DE DADOS COM O RETORNO DE TRUE OU FALSE */
    }

    public function login($email, $senha) /* FUNCAO DE LOGIN ONDE VAI MANDAR O EMAIL E SENHA QUE O USUARIO DIGITOU */
    {
        $sql = "SELECT * FROM usuarios /* COMANDO SQL ONDE ELE TA PROCURANDO O EMAIL DO USUARIO NO BANCO DE DADOS */
                WHERE email='$email'";

        $resultado = $this->conexao->query($sql);

        if ($resultado->num_rows > 0) { /* CONDICAO PARA RESULTADOS MAIORES QUE ZERO */
            $usuario = $resultado->fetch_assoc(); /* ARRAY ASSOCIATIVO PARA PEGAR TODOS OS DADOS DO EMAIL CADASTRADO */

            if (password_verify($senha, $usuario['senha'])) { /* VERIFICANDO SE A SENHA QUE O USUARIO CADASTROU BATE COM A SENHA CADASTRADA NO BANCO DE DADOS */
                return $usuario; /* RETORNANDO TRUE DA CONDIÇÃO */
            }
        }

        return false;/* OU SE TUDO DER ERRADO, RETORNA FALSO */
    }
}
