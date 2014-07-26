<?php

$con = mysqli_connect('localhost', 'root', '123456', 'vendas');

// Maneira 1

$sql = 'Select count(*) c From produto
Where status = 1';

$registros = mysqli_query($con, $sql);

$linha = mysqli_fetch_assoc($registros);

echo $linha['c'];

// Maneira 2

$sql = 'Select idproduto From produto';
$registros = mysqli_query($con, $sql);

echo $registros->num_rows;

// Maneira 3

$i = 0;
while($linha = mysqli_fetch_assoc($registros)) {
	$i++;
}
echo $i;