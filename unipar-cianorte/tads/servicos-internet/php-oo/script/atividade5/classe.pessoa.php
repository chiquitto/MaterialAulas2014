<?php

abstract class Pessoa {
	private $nome;
	private $ano;
	private $estadoCivil;
	private $vivo;
	private $conjuge;
	private $filhos = array();
	private $pai;
	private $mae;

	public function __construct($nome) {
		$this->setNome($nome);
		$this->estadoCivil = 0;
		$this->vivo = 1;
	}

	public function adicionarFilho(Pessoa $filho) {
		$this->filhos[] = $filho;
	}

	public function getEstadoCivil() {
		return $this->estadoCivil;
	}

	public function setNome($nome) {
		$this->nome = strtoupper($nome);
	}

	public function setPai(Homem $pai) {
		$this->pai = $pai;

		$pai->adicionarFilho($this);
	}

	public function setMae(Mulher $mae) {
		$this->mae = $mae;

		$mae->adicionarFilho($this);
	}

	public function casar(Pessoa $conjuge) {
		if ($this->getEstadoCivil() == 1) {
			return false;
		}

		if ($this instanceof Homem) {
			if ($conjuge instanceof Homem) {
				throw new CasamentoInvalidoException();
			}
		}
		if ($this instanceof Mulher) {
			if ($conjuge instanceof Mulher) {
				throw new CasamentoInvalidoException();
			}
		}

		$this->conjuge = $conjuge;
		$this->estadoCivil = 1;

		$conjuge->casar($this);
	}

	public function ficarViuvo() {
		$this->estadoCivil = 3;
		$this->conjuge = null;
	}

	public function morrer() {
		$this->vivo = 0;

		if ($this->getEstadoCivil() == 1) {
			$this->conjuge->ficarViuvo();
		}
	}

	public function divorciar() {
		if ($this->getEstadoCivil() != 1) {
			return false;
		}

		$this->estadoCivil = 2;

		$this->conjuge->divorciar();
		$this->conjuge = null;
	}
}
