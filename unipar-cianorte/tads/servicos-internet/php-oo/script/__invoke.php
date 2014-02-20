<?php
class Aluno {
	public $nome;

	public function __construct($nome)
	{
		$this->nome = $nome;
	}

	public function __invoke() {
		echo $this->nome;
	}
}

$aluno = new Aluno('Ze da Silva');
$aluno();