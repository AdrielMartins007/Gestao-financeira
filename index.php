<?php

session_start();

require_once "classes/Usuario.php";

if (isset($_POST['entrar'])) {
    $usuario = new Usuario();

    $dados = $usuario->login(
        $_POST['email'],
        $_POST['senha']
    );

    if ($dados) {
        $_SESSION['id_usuario'] =
            $dados['id_usuario'];

        $_SESSION['nome'] =
            $dados['nome'];

        header("Location: dashboard.php");
    } else {
        echo "Login inválido";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    h2{
        font-family: 'Segoe UI', sans-serif;
        font-size: 30px;
    }

    body {
        background: linear-gradient(#9cba9f, white, #9cba9f);
        background-attachment: fixed;
    }

    .container{
        box-shadow: 0px 1px 5px black;
    }

    input {
        width: 90%;
        text-align: center;
        display: block;
        margin: 10px auto;
        border-radius: 10px;
        border: 1px solid black;
    }

    button {
        width: 30%;
        display: block;
        margin: 20px auto;
        border-radius: 12px;
        box-shadow: 0px 1px 3px black;
        background-color: #2c6c51;
        color: white;
    }

    button:hover{
        background-color: darkolivegreen;
    }

    #criarConta {
        font-size: 11px;
    }

    #criarConta:hover{
        text-decoration: underline;
    }

    a:hover{
        color: black;
    }
</style>

<body>

    <div class="container">

        <h2>Login</h2>

        <form method="POST">

            <input type="email"
                name="email"
                placeholder="Email"
                required>

            <input type="password"
                name="senha"
                placeholder="Senha"
                required>

            <button type="submit"
                name="entrar">
                Entrar
            </button>

        </form>

        <div id="criarConta">
            <a href="cadastrarUsuario.php">
                Não possui uma conta? Cadastre-se agora!
            </a>
        </div>

    </div>

</body>

</html>