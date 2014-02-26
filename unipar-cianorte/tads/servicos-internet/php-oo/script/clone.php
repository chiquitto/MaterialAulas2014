<?php
class Aluno {
	public $nome;
}

$aluno1 = new Aluno();
$aluno1->nome = 'X';

$aluno2 = clone $aluno1;

$aluno2->nome = 'Y';

echo $aluno1->nome;
echo $aluno2->nome;