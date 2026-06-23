<?php

session_start();

require_once "classes/Transacao.php";

$transacao = new Transacao(); /* CRIANDO UM NOVO OBJETO */

$dados =
    $transacao->listar($_SESSION['id_usuario']); /* CHAMANDO A FUNCAO LISTAR DE ACORDO COM O ID DO USUSARIO LOGADO */
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

    th {
        background-color: #2c6c51;
    }

    .container {
        text-align: center;
        width: 65%;
        margin: 20px auto;
    }

    #btnVoltar {
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

    #btnVoltar:hover {
        background-color: darkolivegreen;
    }

    .editarExcluir {
        color: #2c6c51;
    }

    .editarExcluir:hover {
        color: black;
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
                $dados->fetch_assoc() /* ORGANIZANDO OS DADOS E MANDANDO PARA DENTRO DA VARIAVEL */
            ) {
            ?>
                <tr>

                    <td><?= $linha['descricao']; ?></td> <!-- MOSTRANDO O NOME DA TRANSAÇÃO -->

                    <td>
                        R$ <?= number_format( /* ORGANIZANDO O FORMATO DOS NUMEROS */
                                $linha['valor'],
                                2,
                                ',',
                                '.'
                            ); ?>
                    </td>

                    <td><?= $linha['tipo']; ?></td> <!-- INFORMANDO O TIPO -->

                    <td><?= $linha['categoria']; ?></td> <!-- INFORMANDO A CATEGORIA -->

                    <td>

                        <a href="editarTransacao.php?id=<?= $linha['id_transacao']; ?>" class="editarExcluir">
                            Editar <!-- FUNCAO DE EDITAR QUE AO CLICAR É MANDADO O ID PARA A VARIAVEL QUE IRÁ EXECUTAR A FUNCAO -->
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