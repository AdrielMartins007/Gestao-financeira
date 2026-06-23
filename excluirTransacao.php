<?php

require_once "classes/Transacao.php";

$transacao = new Transacao(); /* CRIANDO UM NOVO OBJETO */

$transacao->excluir( /* EXECUTANDO A FUNCAO EXLUIR */
    $_GET['id'] /* PEGANDO O ID DA TRANSAÇAO QUE FOI MANDADO NO ARQUIVO 'listarTransacoes.php' */
);

header(
    "Location: listarTransacoes.php"
);
