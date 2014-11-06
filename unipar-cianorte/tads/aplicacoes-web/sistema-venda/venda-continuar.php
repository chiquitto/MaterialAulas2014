<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

// Pegar idvenda
$idvenda = $_GET['idvenda'];

// Validar idvenda
$sql = "select idvenda from venda
        where idvenda = $idvenda
        and status = " . VENDA_ABERTA;
$r = mysqli_query($con, $sql);
$venda = mysqli_fetch_assoc($r);
if (!$venda) {
  header('location: vendas.php');
  exit;
} 

// Criar o idvenda na sessao
$_SESSION['idvenda'] = $idvenda;

// Redirecionar usuario para venda-produto.php
header('location: venda-produto.php');
