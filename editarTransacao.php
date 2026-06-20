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