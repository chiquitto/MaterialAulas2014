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

$cd = (int) $_GET['cd'];

$sql = "Select * From cliente Where idcliente=$cd";

$con = Conexao::getInstance();
$resultado = $con->query($sql);

$cliente = $resultado->fetch(PDO::FETCH_ASSOC);

if (!$cliente) {
	header('HTTP/1.1 404 Not Found');
	exit;
}

$cliente['idcliente'] = (int) $cliente['idcliente'];
$cliente['status'] = $cliente['ativo'];
unset($cliente['ativo']);

$saida = json_encode($cliente);

header('HTTP/1.0 200 OK');
header('Content-Type: application/json;charset=utf-8');

echo $saida;

sleep(3);