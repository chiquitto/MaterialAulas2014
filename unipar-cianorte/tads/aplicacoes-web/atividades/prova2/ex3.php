<?php

// login & senha

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "INSERT INTO cliente (login,senha)
VALUES ('$login', '$senha')";

$registros = mysqli_query($con, $sql);

if (!$registros) {
	echo 'Não foi possível inserir o registro';
	exit;
}

echo 'Registro inserido';