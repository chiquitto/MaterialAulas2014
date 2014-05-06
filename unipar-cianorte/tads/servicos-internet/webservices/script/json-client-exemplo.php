<?php

//$string = '[{"id":1,"nome":"Cliente Alpha","ativo":true,"conjuge":null},{"id":3,"nome":"Cliente Beta","ativo":false,"conjuge":10}]';

$string = file_get_contents('http://materialaulas2014/unipar-cianorte/tads/servicos-internet/webservices/script/json-server-mysql.php');

$clientes = json_decode($string, 1);

var_dump($clientes);