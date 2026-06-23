<?php

session_start();

require_once "classes/Usuario.php";

if (isset($_POST['entrar'])) { /* CONDICAO QUE QUANDO O BOTAO ENTRAR FOR CLICADO... */
    $usuario = new Usuario(); /* É CRIADO UM NOVO OBJETO USUARIO */

    $dados = $usuario->login( /* É CHAMADA A FUNCAO LOGIN E MANDADO OS DADOS QUE O USUARIO INSERIU */
        $_POST['email'],
        $_POST['senha']
    );

    if ($dados) { /* CONDICAO QUE VERIFICA SE OS DADOS BATEM COM OS CADASTRADOS NO BANCO DE DADOS*/
        $_SESSION['id_usuario'] =
            $dados['id_usuario'];

        $_SESSION['nome'] =
            $dados['nome'];

        header("Location: dashboard.php"); /* SE TUDO DER CERTO, É MANDADO PARA A TELA PRINCIPAL */
    } else {
        echo "Login inválido"; /* CASO CONTRARIO, MENSAGEM DE ERRO */
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    h2{
        font-family: 'Segoe UI', sans-serif;
        font-size: 30px;
        color: #1b4232;
    }

    body {
        background: linear-gradient(#9cba9f, white, #9cba9f);
        background-attachment: fixed;
    }

    .container{
        box-shadow: 0px 1px 5px black;
        margin-top: 30px;
    }

    input {
        width: 90%;
        text-align: center;
        display: block;
        margin: 10px auto;
        border-radius: 10px;
        border: 1px solid black;
    }

    button {
        width: 30%;
        display: block;
        margin: 20px auto;
        border-radius: 12px;
        box-shadow: 0px 1px 3px black;
        background-color: #2c6c51;
        color: white;
    }

    button:hover{
        background-color: darkolivegreen;
    }

    #criarConta {
        font-size: 11px;
    }

    #criarConta:hover{
        text-decoration: underline;
    }

    a:hover{
        color: black;
    }

    #imagem{
        margin: 0px;
        padding: 0px;
    }

    img{
        width: 220px;
        margin: auto;
        display: block;
    }
</style>

<body>

    <div class="container">

        <div id="imagem">
            <img src="img/nome-logo-site.png" alt="logo do financeiro">
        </div>

        <h2>Login</h2>

        <form method="POST">

            <input type="email"
                name="email"
                placeholder="Email"
                required>

            <input type="password"
                name="senha"
                placeholder="Senha"
                required>

            <button type="submit"
                name="entrar">
                Entrar
            </button>

        </form>

        <div id="criarConta">
            <a href="cadastrarUsuario.php">
                Não possui uma conta? Cadastre-se agora!
            </a>
        </div>

    </div>

</body>

</html>