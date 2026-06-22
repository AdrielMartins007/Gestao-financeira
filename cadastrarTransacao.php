<?php

session_start();

require_once "classes/Transacao.php";
require_once "classes/Categoria.php";

$categoria = new Categoria();

$categorias =
    $categoria->listar($_SESSION['id_usuario']);

if (isset($_POST['salvar'])) {
    $transacao = new Transacao();

    $transacao->cadastrar(
        $_POST['descricao'],
        $_POST['valor'],
        $_POST['data'],
        $_POST['tipo'],
        $_SESSION['id_usuario'],
        $_POST['categoria']
    );

    header("Location: listarTransacoes.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Nova Transação</title>
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

    button:hover{
        background-color: darkolivegreen;
    }

    input, select{
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

        <h2>Nova Transação</h2>

        <form method="POST">

            <input type="text"
                name="descricao"
                placeholder="Descrição"
                required>

            <input type="number"
                step="0.01"
                name="valor"
                placeholder="Valor"
                required>

            <input type="date"
                name="data"
                required>

            <select name="tipo">

                <option value="Receita">
                    Receita
                </option>

                <option value="Despesa">
                    Despesa
                </option>

            </select>

            <select name="categoria">

                <?php
                while ($cat =
                    $categorias->fetch_assoc()
                ) {
                ?>
                    <option
                        value="<?= $cat['id_categoria']; ?>">
                        <?= $cat['nome']; ?>
                    </option>
                <?php
                }
                ?>

            </select>

            <button name="salvar">
                Salvar
            </button>

        </form>

    </div>

</body>

</html>