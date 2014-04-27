<?php

1)

interface Impressora {}

abstract class Hp implements Impressora {}

class LaserJet extends Hp {

	private function testar()
	{
		return true;
	}

	public function imprimir($nome){
		$a = $this->testar();
		if($a == true){
			echo $nome;
		}
	}
}

$imprimir = new Laserjet();
$imprimir->imprimir("Impressao");

2)

class Teste {
	private static $instance;

	public static function Single(){
		if(self::$instance == NULL){
			self::$instance = new Teste();
		}
		return self::$instance;
	}
}

3)

class Calculadora {
	public static function somar($x, $y){
		$soma = $x + $y;
		return $soma;
	}

	public static function subtrair($x, $y){
		return $x-$y;
	}

	public static function dividir($x,$y){
		return $x/$y;
	}

	public static function multiplicar($x,$y) {
		return $x*$y;
	}

	public static function quadrado($x){
		return self::multiplicar($x, $x);
	}
}