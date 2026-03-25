<?php

require_once 'Financeiro.php';

$usuario = new Financeiro;
$usuario->enviardados($_POST['nomeDespesa'], $_POST['valorDespesa']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Despesas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="tela-novas-despesas">

    <form id="tela-novo" method="post">

        <div id="titulo-tela-novo">Incluir Nova Despesa</div>

        <div id="valor">

            <h2>Informe a descrição da despesa</h2>
            <input id="input-descricao" type="text" name="nomeDespesa">

            <div id="selecao-categoria">

                <h2>Selecione a Categoria da despesa</h2>
                <select name="categoria" id="selecaoCategoria">
                    <option value="alimentacao">Alimentação</option>
                    <option value="transporte">Transporte</option>
                    <option value="feira">Feira</option>
                    <option value="outros">Outros</option>
                </select>


            </div>

            <h2>Informe o valor da despesa</h2>
            <input id="input-valor" type="Number" name="valorDespesa">

        </div>

        <div id="botao-tela-novo">
            <button id="botao-novo" type="submit">Incluir</button>
        </div>

    </form>

</body>

</html>