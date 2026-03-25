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
            </div>

            <div class="info">
                <p>Total Despesas:</p>
            </div>

            <div class="info">
                <p>Saldo Total:</p>
            </div>

        </div>

        <div id="caixa-despesas">
            <div class="despesas">
                <?php 
                
                $usuario->mostrarDespesas();

                ?>
            </div>

            <div id="botao">
                <button onclick="window.location.href = 'despesas.php'">+ Adicionar outras despesas</button>
            </div>

        </div>

    </main>

</body>

</html>