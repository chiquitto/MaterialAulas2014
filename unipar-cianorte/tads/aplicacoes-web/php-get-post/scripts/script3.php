<?php

//date_default_timezone_set('Europe/London');
//print_r(timezone_identifiers_list());exit;

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