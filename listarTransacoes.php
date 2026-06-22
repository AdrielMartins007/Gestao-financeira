<?php

session_start();

require_once "classes/Transacao.php";

$transacao = new Transacao();

$dados =
    $transacao->listar($_SESSION['id_usuario']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Transações</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    body {
        background: linear-gradient(#9cba9f, white, #9cba9f);
        background-attachment: fixed;
    }

    th{
        background-color: #2c6c51;
    }

    #btnVoltar{
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

    #btnVoltar:hover{
        background-color: darkolivegreen;
    }

    .editarExcluir{
        color: #2c6c51;
    }

    .editarExcluir:hover{
        color: green;
    }
</style>

<body>

    <div class="container">

        <h2>Transações</h2>

        <table border="1" width="100%">

            <tr>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Tipo</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>

            <?php
            while ($linha =
                $dados->fetch_assoc()
            ) {
            ?>
                <tr>

                    <td><?= $linha['descricao']; ?></td>

                    <td>
                        R$ <?= number_format(
                                $linha['valor'],
                                2,
                                ',',
                                '.'
                            ); ?>
                    </td>

                    <td><?= $linha['tipo']; ?></td>

                    <td><?= $linha['categoria']; ?></td>

                    <td>

                        <a href="editarTransacao.php?id=<?= $linha['id_transacao']; ?>" class="editarExcluir">
                            Editar
                        </a>

                        <a href="excluirTransacao.php?id=<?= $linha['id_transacao']; ?>" class="editarExcluir">
                            Excluir
                        </a>

                    </td>

                </tr>
            <?php
            }
            ?>

        </table>

        <br>

        <a href="dashboard.php" id="btnVoltar">
            Voltar
        </a>

    </div>

</body>

</html>