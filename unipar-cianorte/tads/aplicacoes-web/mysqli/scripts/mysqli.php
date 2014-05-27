<?php

$con = mysqli_connect('localhost','root','teste','chiquitto');

$sql = 'Select * From cliente';
$resultado = mysqli_query($con, $sql);

if ( $resultado === false ) {
	echo mysqli_error($con);
	exit;
}

$error = mysqli_error($con);
if ($error != '') {
	echo $error;
	exit;
}

while( $registro = mysqli_fetch_array($resultado) ) {
	echo $registro['nome'] . '<br>';
}

echo 'Registros encontrados: ' . 
$resultado->num_rows;

mysqli_close($con);