<?php

abstract class Pizza
implements IPizza {
	public function ingredientes() {
		echo "Adicionar queijo\n";
		echo "Adicionar molho\n";
	}

	public function prepararMassa() {
		echo "Preparar massa\n";	
	}

	public function naForma() {
		echo "Na Forma\n";	
	}

	public function preAssar() {
		$this->assar();
	}

	public function rechear() {
		echo "Rechear\n";	
	}

	public function assar() {
		echo "Assar\n";	
	}

	public function cortar() {
		echo "Cortar\n";	
	}
}