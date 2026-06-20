<?php

require_once "classes/Transacao.php";

$transacao = new Transacao();

$transacao->excluir(
    $_GET['id']
);

header(
    "Location: listarTransacoes.php"
);
