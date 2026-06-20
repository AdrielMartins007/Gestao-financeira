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

                        <a href="editarTransacao.php?id=<?= $linha['id_transacao']; ?>">
                            Editar
                        </a>

                        |

                        <a href="excluirTransacao.php?id=<?= $linha['id_transacao']; ?>">
                            Excluir
                        </a>

                    </td>

                </tr>
            <?php
            }
            ?>

        </table>

        <br>

        <a href="dashboard.php">
            Voltar
        </a>

    </div>

</body>

</html>