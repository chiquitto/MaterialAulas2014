<?php

// nome, cpf, endereco

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

$sql = "Insert Into pessoa (nome,cpf,endereco)
Values ('$nome','$cpf','$endereco')";
$inserir = mysqli_query($con, $sql);

if (!$inserir) {
	echo 'Não inseriu o registro';
	exit;
}

echo 'Pessoa inserida';