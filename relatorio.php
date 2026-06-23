<?php

session_start();

require_once "classes/Transacao.php";

$transacao = new Transacao();

$dados = $transacao->listar($_SESSION['id_usuario']);

$receitas = 0;
$despesas = 0;

$qtdReceitas = 0;
$qtdDespesas = 0;

while ($linha = $dados->fetch_assoc()) {

    if ($linha['tipo'] == "Receita") {
        $receitas += $linha['valor'];
        $qtdReceitas++;
    } else {
        $despesas += $linha['valor'];
        $qtdDespesas++;
    }
}

$saldo = $receitas - $despesas;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Relatório Financeiro</title>

    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<style>
    body {
        background: linear-gradient(#9cba9f, white, #9cba9f);
        background-attachment: fixed;
    }

    .container{
        width: 80%;
    }

    #titulo {
        background-color: #2c6c51;
        color: white;
        padding: 20px;
        border-radius: 20px;
        text-align: center;
    }

    .resumo {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-top: 20px;
        gap: 15px;
    }

    .card {
        background: #d4e4d6;
        padding: 20px;
        border-radius: 15px;
        width: 200px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
    }

    .graficos {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        margin-top: 30px;
    }

    .grafico {
        width: 300px;
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
    }

    #btnVoltar {
        width: 150px;
        display: block;
        margin: 30px auto;
        border-radius: 15px;
        box-shadow: 0px 1px 3px black;
        background-color: #2c6c51;
        color: white;
        text-align: center;
        padding: 10px;
        text-decoration: none;
    }

    #btnVoltar:hover {
        background-color: darkolivegreen;
    }
</style>

<body>

    <div class="container">

        <h2 id="titulo">
            Gráfico Financeiro
        </h2>

        <div class="graficos">

            <div class="grafico">
                <canvas id="graficoPizza"></canvas>
            </div>

            <div class="grafico">
                <canvas id="graficoBarra"></canvas>
            </div>

        </div>

        <a href="dashboard.php" id="btnVoltar">
            Voltar
        </a>

    </div>

    <script>
        new Chart(
            document.getElementById('graficoPizza'), {
                type: 'pie',
                data: {
                    labels: ['Receitas', 'Despesas'],
                    datasets: [{
                        data: [
                            <?= $receitas ?>,
                            <?= $despesas ?>
                        ],
                        backgroundColor: [
                            '#2c6c51',
                            '#c0392b'
                        ]
                    }]
                }
            }
        );

        new Chart(
            document.getElementById('graficoBarra'), {
                type: 'bar',
                data: {
                    labels: ['Receitas', 'Despesas'],
                    datasets: [{
                        label: 'Valores (R$)',
                        data: [
                            <?= $receitas ?>,
                            <?= $despesas ?>
                        ],
                        backgroundColor: [
                            '#2c6c51',
                            '#c0392b'
                        ]
                    }]
                },
                options: {
                    responsive: true
                }
            }
        );
    </script>

</body>

</html>