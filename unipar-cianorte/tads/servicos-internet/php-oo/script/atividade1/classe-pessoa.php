<?php

class Pessoa
{
	public $nome;
	public $anoNascimento;
	public $pai;
	public $mae;

	public function getNome() {
		return $this->nome;
	}

	public function getIdade() {
		return date('Y') - $this->anoNascimento;
	}
}

