<?php

require_once "Conexao.php";

class Usuario
{
    private $conexao;

    public function __construct()
    {
        $db = new Conexao();
        $this->conexao = $db->conectar();
    }

    public function cadastrar($nome, $email, $senha)
    {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios(nome,email,senha)
                VALUES('$nome','$email','$senhaHash')";

        return $this->conexao->query($sql);
    }

    public function login($email, $senha)
    {
        $sql = "SELECT * FROM usuarios
                WHERE email='$email'";

        $resultado = $this->conexao->query($sql);

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                return $usuario;
            }
        }

        return false;
    }
}
