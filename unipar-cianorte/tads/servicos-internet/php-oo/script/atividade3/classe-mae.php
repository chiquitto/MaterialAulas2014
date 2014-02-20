<?php

class Mae extends Pessoa
{
	private $marido;

	public function casar($conjuge) {
		if ($this->estadoCivil == 1) {
			return false;
		}

		$this->marido = $conjuge;
		$this->estadoCivil = 1;

		return true;
	}

	public function divorciar() {
		if ($this->estadoCivil != 1) {
			return false;
		}

		$this->estadoCivil = 2;
		$this->marido = null;

		return true;
	}

	public function ficarViuvo() {
		$this->estadoCivil = 3;
		$this->marido = null;

		return true;
	}

	public function morrer() {
		$this->vivo = 0;

		if ($this->estadoCivil == 1) {
			$this->marido->ficarViuvo();
		}

		return true;
	}
}

