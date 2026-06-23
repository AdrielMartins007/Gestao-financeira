<?php

session_start();

require_once "classes/Transacao.php"; /* IMPORTANDO DADOS DO ARQUIVO PHP */
require_once "classes/Categoria.php";

$categoria = new Categoria(); /* CRIANDO UM NOVO OBJETO */

$categorias =
    $categoria->listar($_SESSION['id_usuario']); /* ENVIANDO O ID DO USUARIO LOGADO */

if (isset($_POST['salvar'])) { /* CLICANDO NO BOTAO SALVAR, É CRIADO UM NOVO OBJETO */
    $transacao = new Transacao();

    $transacao->cadastrar( /* EM SEGUIDA É CHAMADA A FUNCAO CADASTRAR COM O ENVIO DOS DADOS */
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

                <?php /* COMANDO SQL PARA BUSCAR TODAS AS CATEGORIAS CADASTRADAS NO BANCO DE DADOS */
                while ($cat =
                    $categorias->fetch_assoc()
                ) {
                ?> <!-- CRIANDO AS OPÇÕES COM AS CATEGORIAS CADASTRADAS -->
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