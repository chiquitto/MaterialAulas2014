<?php

class PizzaCalabresa
extends Pizza {
	public function ingredientes() {
		echo "Adicionar calabresa\n";

		parent::ingredientes();
	}
}