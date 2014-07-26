<?php

$id = $_GET['id'];
$bloqueado = $_GET['bloqueado'];

if (($bloqueado != '1') and ($bloqueado != '0')) {
	echo 'Valor para Bloqueado invalido';
	exit;
}

// Maneira Update direto

$sql = "Update produto Set
bloqueado = '$bloqueado'
Where idproduto = $id";
mysqli_query($con, $sql);

if (mysqli_affected_rows($con) == 0) {
	echo 'Produto inexistente';
	exit;
}

// Maneira com Select depois Update

$sql = "Select idproduto
From produto
Where idproduto = $id";
$consulta = mysqli_query($con, $sql);

$produto = mysqli_fetch_assoc($consulta);

if (!$produto) {
	echo 'Produto não existe';
	exit;
}

$sql = "Update produto
Set bloqueado = '$bloqueado'
Where idproduto = $id";
mysqli_query($con, $sql);






