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