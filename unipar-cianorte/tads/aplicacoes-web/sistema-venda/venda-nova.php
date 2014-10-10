<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$data = date('Y-m-d');

//pegar id cliente
$idcliente = $_GET['idcliente'];

//pegar id usuario
$idusuario = $_SESSION['idusuario'];

//Criar um registro na tabela venda
$sql = "Insert into venda
(data, idcliente, status, idusuario)
Values
('$data', $idcliente, '0', $idusuario)";
$result = mysqli_query($con, $sql);

//Pegar o codigo da venda
$idvenda = mysqli_insert_id($con);

//Salvar codigo da venda em sessao
$_SESSION['idvenda'] = $idvenda;

//Redirecionar usuario para venda-produto.php
header('location:venda-produto.php');

