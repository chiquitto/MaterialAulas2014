<?php
class Aluno {
	public $data = array();

	public function __construct($nome)
	{
		$this->nome = $nome;
	}

	public function __set($atributo, $valor) {
		$this->data[$atributo] = $valor;
	}

	public function __get($atributo) {
		return $this->data[$atributo];
	}
}

$aluno = new Aluno('Zeze');

echo $aluno->nome;

//print_r($aluno);