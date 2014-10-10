<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

// Pegar idcliente
$idcliente = $_GET['idcliente'];

// Abrir venda para cliente
$data = date('Y-m-d');

$sql = "insert into venda (data, idcliente, status) values ('$data', $idcliente, 0)";
$insert = mysqli_query($con, $sql);

// Pegar idvenda
$idvenda = mysqli_insert_id($con);

// Salvar idvenda na sessao
$_SESSION['idvenda'] = $idvenda;

// Redirecionar usuario para venda-produto.php

header('location:venda-produto.php');

