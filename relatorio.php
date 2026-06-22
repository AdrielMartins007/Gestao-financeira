<?php

session_start();

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
    <title>Relatório</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    body {
        background: linear-gradient(#9cba9f, white, #9cba9f);
        background-attachment: fixed;
    }

    #titulo {
        background-color: #2c6c51;
        color: white;
        padding: 20px;
        border-radius: 20px;
        font-size: 30px;
    }

    a {
        width: 15%;
        display: block;
        margin: auto;
        border-radius: 15px;
        box-shadow: 0px 1px 3px black;
        background-color: #2c6c51;
        color: white;
        text-align: center;
        padding: 10px;
    }

    #tabelaResumo{
        background-color: #d4e4d6;
        padding: 5px;
        border-radius: 20px;
        margin-bottom: 20px;
    }
</style>

<body>

    <div class="container">

        <h2 id="titulo">Resumo Financeiro</h2>

        <div id="tabelaResumo">
            <h3>
                Receitas:
                R$ <?= number_format(
                        $receitas,
                        2,
                        ',',
                        '.'
                    ); ?>
            </h3>

            <h3>
                Despesas:
                R$ <?= number_format(
                        $despesas,
                        2,
                        ',',
                        '.'
                    ); ?>
            </h3>

            <h2>
                Saldo:
                R$ <?= number_format(
                        $saldo,
                        2,
                        ',',
                        '.'
                    ); ?>
            </h2>
        </div>

        <a href="dashboard.php">
            Voltar
        </a>

    </div>

</body>

</html>