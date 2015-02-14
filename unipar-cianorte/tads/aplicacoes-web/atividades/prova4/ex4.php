<?php

/*
$_SESSION['logado'] = true;
if( $resultado->num_rows != 1 ) {
$resultado = mysqli_query($sql);
header('location:index.php');
session_start();
$linha = mysqli_fetch_assoc($resultado);
$senha = md5($senha);
*/

$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = md5($senha);

$sql = "Select id,nome From usuario Where
  (email = '$email') And (senha = '$senha')";

$resultado = mysqli_query($con, $sql);

if( $resultado->num_rows != 1 ) {
  exit;
}

session_start();
$_SESSION['logado'] = true;
header('location:index.php');
