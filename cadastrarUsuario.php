<?php

require_once "classes/Usuario.php";

if (isset($_POST['cadastrar'])) {
    $usuario = new Usuario();

    $usuario->cadastrar(
        $_POST['nome'],
        $_POST['email'],
        $_POST['senha']
    );

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">

        <h2>Cadastrar Usuário</h2>

        <form method="POST">

            <input type="text"
                name="nome"
                placeholder="Nome"
                required>

            <input type="email"
                name="email"
                placeholder="Email"
                required>

            <input type="password"
                name="senha"
                placeholder="Senha"
                required>

            <button type="submit"
                name="cadastrar">
                Cadastrar
            </button>

        </form>

        <a href="index.php">Voltar</a>

    </div>

</body>

</html>