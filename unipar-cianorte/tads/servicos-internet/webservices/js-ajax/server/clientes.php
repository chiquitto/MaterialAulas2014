<?php

/*
$clientes = array(
  1 => array(
    'nome' => 'Alisson Chiquitto',
    'email' => 'chiquitto@gmail.com',
    'status' => 1,
  ),
  2 => array(
    'nome' => 'José da Silva',
    'email' => 'jose.silva@gmail.com',
    'status' => 0,
  ),
);
*/

require '../lib/Conexao.php';
$con = Conexao::getInstance();

$sql = "Select
idcliente, nome, email, ativo status
From cliente";

$resultado = $con->query($sql);

//print_r($clientes);exit;

$clientes = array();
while($cliente = $resultado->fetch(PDO::FETCH_ASSOC)) {
  $cliente['idcliente'] = (int) $cliente['idcliente'];
  $clientes[] = $cliente;
}

header('HTTP/1.0 200 OK');
header('Content-Type: application/json;charset=utf-8');

$saida = json_encode($clientes);

echo $saida;

sleep(3);