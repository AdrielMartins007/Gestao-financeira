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

<body>

    <div class="container">

        <h2>Resumo Financeiro</h2>

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

        <a href="dashboard.php">
            Voltar
        </a>

    </div>

</body>

</html>