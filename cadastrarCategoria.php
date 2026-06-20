<?php

session_start();

require_once "classes/Categoria.php";

if (isset($_POST['cadastrar'])) {
    $categoria = new Categoria();

    $categoria->cadastrar(
        $_POST['nome'],
        $_POST['tipo'],
        $_SESSION['id_usuario']
    );

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Categorias</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">

        <h2>Nova Categoria</h2>

        <form method="POST">

            <input type="text"
                name="nome"
                placeholder="Nome da categoria"
                required>

            <select name="tipo">

                <option value="Receita">
                    Receita
                </option>

                <option value="Despesa">
                    Despesa
                </option>

            </select>

            <button name="cadastrar">
                Cadastrar
            </button>

        </form>

    </div>

</body>

</html>