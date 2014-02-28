<?php

class CiaPizza
extends Pizzaria {
	public function factory($sabor) {
		$pizza = $this->pegarReceita($sabor);

		$pizza->ingredientes();
		$pizza->prepararMassa();
		$pizza->naForma();
		$pizza->preAssar();
		$pizza->rechear();
		
		$pizza->assar();
		$pizza->assar();

		$pizza->cortar();

		return $pizza;
	}
}