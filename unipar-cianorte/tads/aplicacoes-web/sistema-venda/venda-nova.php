<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$data = date('Y-m-d');
//pegar id cliente
$idcliente = $_GET['idcliente'];


//Criar um registro na tabela venda
$sql = "insert into venda values(null,'$data',$idcliente,'0')";
$result = mysqli_query($con, $sql);


//Pegar o codigo da venda
$idvenda = mysqli_insert_id($con);


//SALVAR CODIGO DA VENDA EM SESSAO
$_SESSION['idvenda'] = $idvenda;


//Redirecionar usuario
//venda-produto.php
header('location:venda-produto.php');

