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

$sql = "Select * From cliente";

$con = Conexao::getInstance();
$resultado = $con->query($sql);

$clientes = array();
while ($cliente = $resultado->fetch(PDO::FETCH_ASSOC)) {
  $cliente['idcliente'] = (int) $cliente['idcliente'];
  $cliente['status'] = $cliente['ativo'];
  unset($cliente['ativo']);
  $clientes[] = $cliente;
}

//print_r($clientes);exit;

header('HTTP/1.0 200 OK');
header('Content-Type: application/json;charset=utf-8');

$saida = json_encode($clientes);
echo $saida;

sleep(3);