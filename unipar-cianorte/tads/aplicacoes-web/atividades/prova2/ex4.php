<?php

// produto-estado.php?id=1&bloqueado=1
// produto-estado.php?id=2&bloqueado=0

$id = (int) $_GET['id'];
$bloqueado = $_GET['bloqueado'];

if (($bloqueado != '0') and ($bloqueado != '1')) {
	echo 'O valor de bloqueado esta incorreto';
	exit;
}

// Inicio Maneira 1

$sql = "Select idproduto From produto
Where idproduto = $id";

$registros = mysqli_query($con, $sql);

$produto = mysqli_fetch_assoc($registros);

if (!$produto) {
	echo 'O produto não existe';
	exit;
}

$sql = "Update produto Set bloqueado = '$bloqueado'
Where idproduto = $id";
mysqli_query($con, $sql);

// Maneira 2

$sql = "Update produto Set bloqueado = '$bloqueado'
Where idproduto = $id";
mysqli_query($con, $sql);

if (mysqli_affected_rows($con) == 0) {
	echo 'O produto não existe';
	exit;
}
