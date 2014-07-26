<?php

$con = mysqli_connect('localhost', 'root', '123456', 'vendas');

// Maneira 1

$sql = 'Select count(*)
From produto
Where status = 0';

$resultado = mysqli_query($con, $sql);

$contador = mysqli_fetch_array($resultado);

echo $contador[0];

// Maneira 2

$sql = 'Select * From produto Where status = 0';
$produtos = mysqli_query($con, $sql);

echo $produtos->num_rows;

// Maneira 3
$sql = 'Select * From produto Where status = 0';
$produtos = mysqli_query($con, $sql);

$i=0;
while($produto = mysqli_fetch_assoc($produtos)) {
	$i++;
}
echo $i;












