<?php

class Pai extends Pessoa
{
	private $esposa;

	public function casar($conjuge) {
		if ($this->estadoCivil == 1) {
			return false;
		}

		$this->esposa = $conjuge;
		$this->estadoCivil = 1;

		return true;
	}

	public function divorciar() {
		if ($this->estadoCivil != 1) {
			return false;
		}

		$this->estadoCivil = 2;
		$this->esposa = null;

		return true;
	}

	public function ficarViuvo() {
		$this->estadoCivil = 3;
		$this->esposa = null;

		return true;
	}

	public function morrer() {
		$this->vivo = 0;

		if ($this->estadoCivil == 1) {
			$this->esposa->ficarViuvo();
		}

		return true;
	}
}

