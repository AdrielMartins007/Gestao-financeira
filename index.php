<?php

require_once 'Financeiro.php';

$usuario = new Financeiro();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestao e Controle Financeiro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main>

        <div id="titulo">
            <h1>Olá Adriel</h1>
        </div>

        <div id="caixa-info">

            <div class="info">
                <p>Saldo Conta:</p>
                <?php

                echo number_format($usuario->saldo, 3, '.');

                ?>
            </div>

            <div class="info">
                <p>Total Despesas:</p>
                <?php

                echo number_format($usuario->despesa, 3, '.');

                ?>
            </div>

            <div class="info">
                <p>Saldo Total:</p>
                <?php

                echo number_format($usuario->saldoTotal, 3, '.');

                ?>
            </div>

        </div>

        <div id="caixa-despesas">
            <div class="despesas">
                <p>Alimentação: R$: 3.558,835</p>
            </div>

            <div class="despesas">
                <p>Gasolina: R$: 3.558,835</p>
            </div>

            <div class="despesas">
                <p>Feira: R$: 3.558,835</p>
            </div>

            <div class="despesas">
                <p>Outros Gastos: R$: 3.558,835</p>
            </div>

            <div id="botao">
                <button onclick="window.location.href = 'despesas.html'">+ Adicionar outras despesas</button>
            </div>

        </div>

    </main>

</body>

</html>