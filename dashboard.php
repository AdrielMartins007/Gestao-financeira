<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Painel</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">

        <h1>
            Bem-vindo,
            <?php echo $_SESSION['nome']; ?>
        </h1>

        <a href="cadastrarCategoria.php">
            Cadastrar Categoria
        </a>

        <br><br>

        <a href="cadastrarTransacao.php">
            Cadastrar Transação
        </a>

        <br><br>

        <a href="listarTransacoes.php">
            Listar Transações
        </a>

        <br><br>

        <a href="relatorio.php">
            Relatório
        </a>

        <br><br>

        <a href="logout.php">
            Sair
        </a>

    </div>

</body>

</html>