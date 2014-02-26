<?php

class Conta {
	private $limite = 0;
	private $saldo = 0;
	private $numero;

	public function __construct($numero) {
		$this->limite = -1000;
		$this->numero = $numero;
	}

	public function depositar($valor) {
		if ($valor <= 0) {
			throw new ContaException('Você não pode depositar valores negativos');
		}

		$this->saldo += $valor;
	}
	public function retirar($valor) {
		if ($valor <= 0) {
			throw new ContaException('Você não pode fazer retiradas com valores negativos');
		}

		$novoSaldo = $this->saldo - $valor;

		if ($novoSaldo < $this->limite) {
			throw new LimiteContaException('Você não tem saldo/limite para realizar esta retirada. Seu limite é R$' . $this->limite . ', e seu saldo é R$' . $this->saldo);
		}

		$this->saldo = $novoSaldo;
	}
}

class ContaException extends Exception {}
class LimiteContaException extends ContaException {}

header('content-type:text/html; charset=utf-8');

$conta = new Conta('123456-7');

try {
	$conta->depositar(1000);
	$conta->retirar(1500);
	$conta->retirar(-100);
}
catch(LimiteContaException $e) {
	echo 'LimiteContaException: ', $e->getMessage();
	exit;
}
catch(ContaException $e) {
	echo 'ContaException: ', $e->getMessage();
	exit;
}
catch(Exception $e) {
	echo 'Exception: ', $e->getMessage();
	exit;
}