<?php

require_once "classes/Usuario.php";

if (isset($_POST['cadastrar'])) { /* COMANDO PARA QUANDO O BOTAO CADASTRAR FOR CLICADO, UM NOVO OBJETO É CRIADO... */
    $usuario = new Usuario();

    $usuario->cadastrar( /* E É CHAMADO A FUNCAO PARA O ENVIO DOS DADOS DO NOVO USUARIO */
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

<style>
    body {
        background: linear-gradient(#9cba9f, white, #9cba9f);
        background-attachment: fixed;
    }

    button{
        width: 30%;
        display: block;
        border-radius: 15px;
        box-shadow: 0px 1px 3px black;
        margin: auto;
        background-color: #2c6c51;
        color: white;
    }

    #btnVoltar{
        width: 20%;
        display: block;
        border-radius: 15px;
        box-shadow: 0px 1px 3px black;
        margin: 15px auto;
        background-color: #2c6c51;
        color: white;
        padding: 8px;
        text-align: center;
    }

    input{
        width: 90%;
        text-align: center;
        display: block;
        margin: 10px auto;
        border-radius: 10px;
        border: 1px solid black;
    }
</style>

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

        <a href="index.php" id="btnVoltar">Voltar</a>

    </div>

</body>

</html>