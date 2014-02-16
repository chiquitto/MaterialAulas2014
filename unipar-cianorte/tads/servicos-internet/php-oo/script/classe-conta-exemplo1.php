<?php

require './classe-conta-1.php';

$conta = new Conta();
$conta->setDono('Jose Aparecido');
$conta->numero = '123456-7';

echo 'Cliente: '
	. $conta->dono
	. '<br>Conta: '
	. $conta->numero
;

