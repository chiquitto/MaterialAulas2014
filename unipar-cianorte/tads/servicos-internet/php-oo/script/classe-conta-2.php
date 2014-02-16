<?php

class Conta {
	public $numero;
	public $dono;
	private $saldo = 0;
	protected $limite = 0;

	public function fazerDeposito($vlr) {
		$this->saldo += $vlr;
	}

	public function fazerSaque($vlr) {
		$saldo2 = $this->saldo - $vlr;
		if ($saldo2 < $this->getLimite()) {
			return false;
		}
		$this->saldo = $saldo2;
		return true;
	}

	protected function getLimite() {
		return $this->limite;
	}

	public function getSaldo() {
		return $this->saldo;
	}
}

