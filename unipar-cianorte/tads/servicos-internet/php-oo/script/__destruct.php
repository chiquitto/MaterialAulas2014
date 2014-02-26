<?php
class BancoDados {
	
	public function __construct() {
		echo 'Conectar ao Banco';
	}

	public function enviarSQL() {
		echo 'Enviar SQL';
	}

	public function __destruct() {
		echo 'Desconectar do BD';
	}
}

$aluno = new BancoDados();
$aluno->enviarSQL();