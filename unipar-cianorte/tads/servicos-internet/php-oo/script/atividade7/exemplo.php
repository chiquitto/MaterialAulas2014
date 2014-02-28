<?php

class Aritmetica {
	protected $n1;
	protected $n2;

	public function setN1($n) {
		$this->n1 = $n;
	}

	public function setN2($n) {
		$this->n2 = $n;
	}
}

class Soma extends Aritmetica {
	public function somar(){
		return $this->n1 + $this->n2;
	}
}

class Divisao extends Aritmetica {
	public function dividir() {
		return $this->n1 / $this->n2;
	}

	public function mod() {
		return $this->n1 % $this->n2;
	}
}

$soma = new Soma();
$soma->setN1(5);
$soma->setN2(6);

$dividir = new Divisao();
$dividir->setN1(10);
$dividir->setN2(5);

echo $dividir->mod();