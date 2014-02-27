<?php

require './class.CasamentoInvalidoException.php';
require './classe.pessoa.php';
require './classe.homem.php';
require './classe.mulher.php';

header('content-type:text/plain;charset=utf-8');

$homem1 = new Homem('Julio');
$mulher1 = new Mulher('Maria');

$homem1->casar($mulher1);

$filho = $mulher1->gerarFilho('Waldisnei', $homem1);

$homem1->divorciar();

$homem1->casar($mulher1);

print_r($homem1);
print_r($mulher1);
print_r($filho);