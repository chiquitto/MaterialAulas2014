<?php

require './classe-pessoa.php';
require './classe-pai.php';
require './classe-mae.php';
require './classe-filho.php';

$pai1 = new Pai();
$pai1->setNome('Pai UM');

$mae1 = new Mae();
$mae1->setNome('Mae UM');

$pai1->casar($mae1);
$mae1->casar($pai1);

$filho1 = new Filho();
$filho1->setNome('Filho UM');

$filho1->setPai($pai1);
$filho1->setMae($mae1);

$pai1->morrer();

$pai2 = new Pai();
$pai2->setNome('Pai DOIS');

$mae2 = new Mae();
$mae2->setNome('Mae DOIS');

$filho2 = new Filho();
$filho2->setNome('Filho DOIS');

$pai2->casar($mae1);
$mae1->casar($pai2);

$filho2->setPai($pai2);
$filho2->setMae($mae1);

$pai2->divorciar();
$mae1->divorciar();

$pai2->casar($mae2);
$mae2->casar($pai2);

header('content-type:text/plain; charset=utf-8');

echo 'Pai1=', print_r($pai1, 1);
echo 'Mae1=', print_r($mae1, 1);
echo 'Filho1=', print_r($filho1, 1);

echo 'Pai2=', print_r($pai2, 1);
echo 'Mae2=', print_r($mae2, 1);
echo 'Filho2=', print_r($filho2, 1);