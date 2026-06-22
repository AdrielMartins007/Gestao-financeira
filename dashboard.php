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

<style>
    body {
        background: linear-gradient(#9cba9f, white, #9cba9f);
        background-attachment: fixed;
    }

    #titulo {
        font-family: 'Segoe UI', sans-serif;
    }

    .container {
        text-align: center;
    }

    .container a {
        background-color: #2c6c51;
        color: white;
        padding: 10px;
        border-radius: 15px;
        box-shadow: 0px 1px 3px black;
    }

    a:hover{
        background-color: darkolivegreen;
    }
</style>

<body>

    <div class="container">

        <h1 id="titulo">
            Boas vindas,
            <?php echo $_SESSION['nome']; ?>!
            <div>
                O que deseja realizar?
            </div>
        </h1>

        <a href="cadastrarCategoria.php">
            Cadastrar Categoria
        </a>

        <br><br><br>

        <a href="cadastrarTransacao.php">
            Cadastrar Transação
        </a>

        <br><br><br>

        <a href="listarTransacoes.php">
            Listar Transações
        </a>

        <br><br><br>

        <a href="relatorio.php">
            Relatório
        </a>

        <br><br><br>

        <a href="logout.php">
            Sair
        </a>

    </div>

</body>

</html>