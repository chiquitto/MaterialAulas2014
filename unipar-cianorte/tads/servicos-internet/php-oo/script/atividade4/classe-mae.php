<?php

class Mae extends Pessoa
{
	public function casar(Pai $conjuge) {
		return parent::casar($conjuge);
	}
}

