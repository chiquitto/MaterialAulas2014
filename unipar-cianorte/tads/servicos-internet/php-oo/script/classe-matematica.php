<?php

class Matematica {
	public static $resultado;

	public static function somar($n1, $n2) {
		self::$resultado = $n1 + $n2;
		return self::$resultado;
	}
}

