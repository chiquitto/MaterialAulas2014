<?php
class Aluno {
	public function __clone() {
		echo 'Objeto clonado';
	}
}

$aluno1 = new Aluno();
$aluno2 = clone $aluno1;