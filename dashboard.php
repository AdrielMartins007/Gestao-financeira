<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}

require_once "classes/Transacao.php";

$transacao = new Transacao();

$dados =
    $transacao->listar(
        $_SESSION['id_usuario']
    );

$receitas = 0;
$despesas = 0;

while ($linha =
    $dados->fetch_assoc()
) {
    if ($linha['tipo'] == "Receita") {
        $receitas +=
            $linha['valor'];
    } else {
        $despesas +=
            $linha['valor'];
    }
}

$saldo =
    $receitas - $despesas;
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
        background-position: center;
        background-repeat: no-repeat;
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        height: 100vh;
    }

    #titulo {
        font-family: 'Segoe UI', sans-serif;
        margin-bottom: 20px;
        margin-top: 0px;
    }

    .container {
        text-align: center;
        width: 65%;
    }

    .container a {
        background-color: #2c6c51;
        color: white;
        padding: 12px;
        border-radius: 15px;
        box-shadow: 0px 1px 3px black;
        width: 200px;
        display: inline-block;
        font-size: 17px;
    }

    a:hover {
        background-color: darkolivegreen;
    }

    #cards {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .cartao {
        background-color: #9cba9f;
        width: 20%;
        padding: 30px;
        color: black;
        text-align: center;
        border-radius: 12px;
    }

    .ladoAlado{
        justify-content: space-around;
        display: flex;
    }

    #btnSair{
        width: 120px;
    }
</style>

<body>

    <div class="container">

        <h2 id="titulo">
            Boas vindas,
            <?php echo $_SESSION['nome']; ?>.
        </h2>

        <div id="cards">
            <div class="cartao">
                <h3>
                    Receitas:
                    R$ <?= number_format(
                            $receitas,
                            2,
                            ',',
                            '.'
                        ); ?>
                </h3>
            </div>
            <div class="cartao">
                <h3>
                    Despesas:
                    R$ <?= number_format(
                            $despesas,
                            2,
                            ',',
                            '.'
                        ); ?>
                </h3>
            </div>
            <div class="cartao">
                <h3>
                    Saldo:
                    R$ <?= number_format(
                            $saldo,
                            2,
                            ',',
                            '.'
                        ); ?>
                </h3>
            </div>
        </div>

        <div class="ladoAlado">
            <a href="cadastrarCategoria.php">
                Cadastrar Categoria
            </a>

            <a href="cadastrarTransacao.php" class="botaoAcao">
                Cadastrar Transação
            </a>

        </div>

        <br>

        <div class="ladoAlado">

            <a href="listarTransacoes.php" class="botaoAcao">
                Listar Transações
            </a>

            <a href="relatorio.php" class="botaoAcao">
                Gráficos
            </a>
        </div>

        <br>

        <a href="logout.php" class="botaoAcao" id="btnSair">
            Sair
        </a>

    </div>

</body>

</html>