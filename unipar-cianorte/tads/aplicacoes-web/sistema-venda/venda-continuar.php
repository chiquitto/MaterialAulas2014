<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

// Pegar idvenda
if (!isset($_GET['idvenda'])) {
  header('location:vendas.php');
  exit;
}
$idvenda = (int) $_GET['idvenda'];

// Validar idvenda
$sql = "Select idvenda
From venda
Where
    (idvenda = $idvenda)
    And (status = " . VENDA_ABERTA . ")";
$consulta = mysqli_query($con, $sql);
$venda = mysqli_fetch_assoc($consulta);

if (!$venda) {
  header('location:vendas.php');
  exit;
}

// Criar o idvenda na sessao
$_SESSION['idvenda'] = $venda['idvenda'];

// Redirecionar usuario para vendas.php
header('location:venda-produto.php');
