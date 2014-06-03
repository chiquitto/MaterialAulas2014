<?php

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

$saida = json_encode($clientes);

header('HTTP/1.0 200 OK');
header('Content-Type: application/json;charset=utf-8');

echo $saida;

sleep(3);