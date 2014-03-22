<?php

//$cargo = 'Vendedor';

switch ($cargo) {
	case 'Gerente':
		echo 'Sala bacana <br>';
	case 'Vendedor':
		echo 'Comissao <br>';
	case 'Tiozinho do café':
		echo 'Pode toma cafe <br>';
	default:
		echo 'Entrar pela porta da frente <br>';
}