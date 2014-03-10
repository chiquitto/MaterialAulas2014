<?php

abstract class Pizzaria
implements IPizzaria {
	public function factory($sabor) {

		$pizza = $this->pegarReceita($sabor);

		$pizza->ingredientes();
		$pizza->prepararMassa();
		$pizza->naForma();
		$pizza->preAssar();
		$pizza->rechear();
		$pizza->assar();
		$pizza->cortar();

		return $pizza;
	}

	public function pegarReceita($sabor) {
		switch ($sabor) {
			case 'calabresa':
				$pizza = new PizzaCalabresa();
				break;
			
			case 'bacon':
				$pizza = new PizzaBacon();
				break;
		}

		return $pizza;
	}
}