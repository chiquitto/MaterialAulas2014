<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

//pegar id cliente
$idcliente = $_GET['idcliente'];

//pegar id usuario
$idusuario = $_SESSION['idusuario'];

// Verificar se existe uma venda aberta para $idcliente
// Se existir não abrir outra venda
$sql = "Select idvenda
From venda
Where
  (idcliente = $idcliente)
  And (status = " . VENDA_ABERTA . ")";
$consulta = mysqli_query($con, $sql);
$venda = mysqli_fetch_assoc($consulta);
if ($venda) {
  // Existe outra venda
  header('location:venda-nova.php?idvenda=' . $venda['idvenda']);
  exit;
}

// Criar uma venda
//Criar um registro na tabela venda
$data = date('Y-m-d');
$status = VENDA_ABERTA;

$sql = "Insert into venda
(data, idcliente, status, idusuario)
Values
('$data', $idcliente, $status, $idusuario)";
$result = mysqli_query($con, $sql);

//Pegar o codigo da venda
$idvenda = mysqli_insert_id($con);

//Salvar codigo da venda em sessao
$_SESSION['idvenda'] = $idvenda;

//Redirecionar usuario para venda-produto.php
header('location:venda-produto.php');

