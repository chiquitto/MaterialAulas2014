<?php

class PizzaBacon
extends Pizza {
	public function ingredientes() {
		echo "Adicionar bacon\n";

		parent::ingredientes();
	}
}