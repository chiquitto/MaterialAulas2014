<?php

class Mulher extends Pessoa {
	public function gerarFilho($nome, Homem $pai) {
		if (mt_rand(0,1) == 1) {
			$filho = new Homem($nome);
		}
		else {
			$filho = new Mulher($nome);
		}

		$filho->setMae($this);
		$filho->setPai($pai);

		return $filho;
	}
}