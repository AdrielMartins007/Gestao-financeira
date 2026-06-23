<?php

session_start(); /* INCIANDO A SESSAO DO USUARIO */

require_once "classes/Categoria.php";

if (isset($_POST['cadastrar'])) { /* CONDIÇÃO PARA AO CLICAR O BOTAO CADASTRAR, UM NOVO OBJETO É CRIADO */
    $categoria = new Categoria();

    $categoria->cadastrar( /* EM SEGUIDA A FUNCAO CADASTRAR É EXECUTADA COM O ENVIO DOS DADOS */
        $_POST['nome'],
        $_POST['tipo'],
        $_SESSION['id_usuario']
    );

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Categorias</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    body {
        background: linear-gradient(#9cba9f, white, #9cba9f);
        background-attachment: fixed;
    }

    button {
        width: 30%;
        display: block;
        border-radius: 15px;
        box-shadow: 0px 1px 3px black;
        margin: auto;
        background-color: #2c6c51;
        color: white;
    }

    button:hover {
        background-color: darkolivegreen;
    }

    input,
    select {
        width: 90%;
        text-align: center;
        display: block;
        margin: 10px auto;
        border-radius: 10px;
        border: 1px solid black;
    }

    .container {
        margin-top: 30px;
    }

    a {
        width: 30%;
        display: block;
        border-radius: 15px;
        box-shadow: 0px 1px 3px black;
        margin: auto;
        background-color: #2c6c51;
        color: white;
        padding: 8px;
        text-align: center;
        font-size: 14px;
    }

    .botao{
        display: flex;
        justify-content: space-around;
    }
</style>

<body>

    <div class="container">

        <h2>Nova Categoria</h2>

        <form method="POST">

            <input type="text"
                name="nome"
                placeholder="Nome da categoria"
                required>

            <select name="tipo">

                <option value="Receita">
                    Receita
                </option>

                <option value="Despesa">
                    Despesa
                </option>

            </select>

            <div class="botao">
                <button name="cadastrar">
                    Cadastrar
                </button>

                <a href="dashboard.php" id="btnVoltar">
                    Voltar
                </a>
            </div>

        </form>

    </div>

</body>

</html>