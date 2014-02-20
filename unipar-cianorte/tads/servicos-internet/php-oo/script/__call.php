<?php
class Aluno {
	public $nome;

	public function __construct($nome)
	{
		$this->nome = $nome;
	}

	public function __call($metodo, $params) {
		if ($metodo == 'oi') {
			echo $params[0] . $this->nome;
		}
	}
}

$aluno = new Aluno('Ze da Silva');

$aluno->oi('OLA');