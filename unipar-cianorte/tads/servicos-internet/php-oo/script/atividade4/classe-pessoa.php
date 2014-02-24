<?php

class Pessoa
{
	private $nome;
	private $anoNascimento;
	private $pai;
	private $mae;
	private $conjuge;
	private $filhos = array();

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

	public function adicionarFilho(Filho $filho) {
		//$this->filhos[] = $filho;
	}

	public function getAnoNascimento() {
		return $this->anoNascimento;
	}

	public function getEstadoCivil() {
		return $this->estadoCivil;
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

	public function setMae(Mae $mae) {
		$mae->adicionarFilho($this);
		$this->mae = $mae;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setPai(Pai $pai) {
		$pai->adicionarFilho($this);
		$this->pai = $pai;
	}

	protected function casar(Pessoa $conjuge) {
		if ($this->estadoCivil == 1) {
			return false;
		}

		$this->conjuge = $conjuge;
		$this->estadoCivil = 1;

		/**
		  Este bloco de codigo existe para que no momento do casamento,
		  nao haver a necessidade de casar as duas pessoas.

		  Este bloco casa as duas Pessoas
		*/
		if ($conjuge->getEstadoCivil() != 1) {
			$this->conjuge->casar($this);
		}

		return true;
	}

	public function divorciar() {
		if ($this->estadoCivil != 1) {
			return false;
		}

		$this->estadoCivil = 2;

		if ($this->conjuge->getEstadoCivil() != 2) {
			$this->conjuge->divorciar();
		}

		$this->conjuge = null;

		return true;
	}

	private function ficarViuvo() {
		$this->estadoCivil = 3;
		$this->conjuge = null;

		return true;
	}

	public function morrer() {
		$this->vivo = 0;

		if ($this->estadoCivil == 1) {
			$this->conjuge->ficarViuvo();
		}

		return true;
	}
}

