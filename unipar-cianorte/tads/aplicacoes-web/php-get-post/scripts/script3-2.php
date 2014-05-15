<?php

date_default_timezone_set('America/Sao_Paulo');

$nome = $_GET['nome'];
$hora = date('H');

if ($hora < 12) {
	echo "Olá $nome, bom dia";
}
elseif ($hora < 18) {
	echo "Olá $nome, boa tarde";	
}
else {
	echo "Olá $nome, boa noite";
}