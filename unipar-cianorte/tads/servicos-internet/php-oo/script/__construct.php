<?php
class Aluno {
	public $nome;

	public function __construct($nome)
	{
		$this->nome = $nome;
	}
}

$aluno = new Aluno('Ze da Silva');
echo $aluno->nome;