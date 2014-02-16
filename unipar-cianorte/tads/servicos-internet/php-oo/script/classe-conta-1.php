<?php

class Conta {
	public $numero;
	public $dono;
	public $saldo = 0;
	public $limite = 0;

	public function setDono($dono) {
		$this->dono = $dono;
	}
}

