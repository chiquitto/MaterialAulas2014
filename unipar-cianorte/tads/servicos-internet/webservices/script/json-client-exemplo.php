<?php

$string = '
[{"id":1,"nome":"Cliente Alpha","ativo":true,"conjuge":null},{"id":3,"nome":"Cliente Beta","ativo":false,"conjuge":10}]';

$clientes = json_decode($string, 1);

print_r($clientes);