<?php

require 'config.php';

$con = Conexao::getInstance();

$sql = 'Select * From usuario';

$resultado = $con->query($sql);

$clientes = array();
while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
	$clientes[] = $linha;
}

$saida = json_encode($clientes);

header('HTTP/1.0 200 OK');
header('Content-Type: application/json;charset=utf-8');

echo $saida;