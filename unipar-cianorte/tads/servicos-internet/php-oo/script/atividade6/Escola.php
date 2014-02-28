<?php

class Escola {
	private $alunos = array();

	public function matricular(Aluno $aluno) {
		$this->alunos[] = $aluno;
	}

	public function mostrarAlunos() {
		foreach ($this->alunos as $aluno) {
			echo $aluno->nome . "\n";
		}
	}
}