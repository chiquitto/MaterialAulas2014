<?php

require './classe-conta-2.php';
require './classe-conta-poupanca-2.php';

$conta = new ContaPoupanca();

$conta->fazerDeposito(100);

if (!$conta->fazerSaque(100)) {
	echo 'Voce nao pode sacar este valor';
}
else {
	echo 'Valor retirado da conta';
}

echo '<br><br>'
	. 'Voce tem: R$'
	. $conta->getSaldo()
;

