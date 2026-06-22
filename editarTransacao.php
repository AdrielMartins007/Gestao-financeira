<?php

require_once "classes/Transacao.php";

$transacao = new Transacao();

$id = $_GET['id'];

$dados =
    $transacao->buscar($id);

if (isset($_POST['editar'])) {
    $transacao->editar(
        $id,
        $_POST['descricao'],
        $_POST['valor'],
        $_POST['data']
    );

    header("Location: listarTransacoes.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    body {
        background: linear-gradient(#9cba9f, white, #9cba9f);
        background-attachment: fixed;
    }

    input{
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
        border-radius: 15px;
        box-shadow: 0px 1px 3px black;
        margin: auto;
        background-color: #2c6c51;
        color: white;
    }

    button:hover{
        background-color: darkolivegreen;
    }
</style>

<body>

    <div class="container">

        <form method="POST">

            <input type="text"
                name="descricao"
                value="<?= $dados['descricao']; ?>">

            <input type="number"
                step="0.01"
                name="valor"
                value="<?= $dados['valor']; ?>">

            <input type="date"
                name="data"
                value="<?= $dados['data']; ?>">

            <button name="editar">
                Salvar Alterações
            </button>

        </form>

    </div>

</body>

</html>