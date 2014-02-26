<?php

class Pessoa
{
	protected $nome;
	protected $anoNascimento;
	protected $pai;
	protected $mae;

	/**
	* 0 = Solteiro
	* 1 = Casado
	* 2 = Divorciado
	* 3 = Viúvo
	*/
	protected $estadoCivil = 0;

	/**
	* 0 = Não
	* 1 = Sim
	*/
	protected $vivo = 1;

	public function getAnoNascimento() {
		return $this->anoNascimento;
	}

	public function getIdade() {
		return date('Y') - $this->anoNascimento;
	}

	public function getMae() {
		return $this->mae;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getPai() {
		return $this->pai;
	}

	public function setAnoNascimento($anoNascimento) {
		$this->anoNascimento = $anoNascimento;
	}

	public function setMae($mae) {
		$this->mae = $mae;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setPai($pai) {
		$this->pai = $pai;
	}
}

