<?php

$con = mysqli_connect(BD_HOST, BD_USUARIO, BD_SENHA, BD_NOME);

if (!$con) {
	echo '<h1>Erro para conectar no banco de dados.</h1>';
	exit;
}