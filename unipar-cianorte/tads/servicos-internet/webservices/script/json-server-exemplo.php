<?php

$clientes = array();

$clientes[] = array(
	'id' => 1,
	'nome' => 'Cliente Alpha',
	'ativo' => true,
	'conjuge' => NULL,
);

$clientes[] = array(
	'id' => 3,
	'nome' => 'Cliente Beta',
	'ativo' => false,
	'conjuge' => 10,
);

$saida = json_encode($clientes);

header('HTTP/1.0 200 OK');
header('Content-Type: application/json;charset=utf-8');

echo $saida;