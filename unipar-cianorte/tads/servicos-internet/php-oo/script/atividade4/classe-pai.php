<?php

class Pai extends Pessoa
{
	public function casar(Mae $conjuge) {
		return parent::casar($conjuge);
	}
}

