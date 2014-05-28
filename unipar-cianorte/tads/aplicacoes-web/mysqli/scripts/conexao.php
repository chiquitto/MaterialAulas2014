<?php

$con = mysqli_connect('localhost', 'root', '123456', 'aula');

//var_dump($con);

//mysqli_close($con);

$sql = 'Select * From cliente';

$registros = mysqli_query($con, $sql);

if (!$registros) {
	echo mysqli_error($con);
	exit;
}

while($linha = mysqli_fetch_assoc($registros)) {
	echo $linha['nome'], '<br>';
}