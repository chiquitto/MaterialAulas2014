<?php
// Design Pattern Singleton

class Conexao {
	private static $instancia;

	public static function getInstancia() {
		if (self::$instancia === NULL) {
			self::$instancia = new Conexao();
		}
		return self::$instancia;
	}

	public function __construct() {
		// Abrir conexao
	}

	public function query($sql) {
		return mysqli_query(self::getInstancia(), $sql);
	}
}

$bd = Conexao::getInstancia();

$bd->query($sql);
$bd->query($sql);
$bd->query($sql);