<?php

session_start();

session_destroy(); /* FUNCAO QUE APAGA TODOS OS DADOS DA SESSAO ATUAL */

header("Location: index.php"); /* VOLTA PARA A TELA DE LOGIN NOVAMENTE */