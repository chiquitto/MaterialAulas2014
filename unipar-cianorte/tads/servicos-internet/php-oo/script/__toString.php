<?php
class Aluno {
	public $nome;

	public function __construct($nome)
	{
		$this->nome = $nome;
	}

	public function __toString() {
		return $this->nome . ' ' . time();
	}
}

$aluno = new Aluno('Ze da Silva');

echo $aluno;