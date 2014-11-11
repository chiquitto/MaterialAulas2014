<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

// Pegar idvenda
$idvenda = $_GET['idvenda'];

// Validar idvenda
$sql = "Select idvenda From venda
Where
  (idvenda = $idvenda)
  And (status = '" . VENDA_ABERTA . "')
";
$consulta = mysqli_query($con, $sql);
$venda = mysqli_fetch_assoc($consulta);
if (!$venda) {
  // Nao encontrou a venda
  header('location:vendas.php');
  exit;
}

// Criar o idvenda na sessao
$_SESSION['idvenda'] = $idvenda;

// Redirecionar usuario para venda-produto.php
header('location:venda-produto.php');







