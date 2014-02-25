<?php

class Escola {
	public function matricular(Humano $aluno) {

	}
}

interface Humano {}
class Pessoa implements Humano {}
class Aluno extends Pessoa {}

$escola = new Escola();
$escola->matricular(new Aluno());