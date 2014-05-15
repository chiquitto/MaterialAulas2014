<?php

// Se $_GET['n1'] existir, escreve-o;
if (isset($_GET['n1'])) {
	echo $_GET['n1'];
}

// Se $_GET['n2'] existir, escreve-o;
if (isset($_GET['n2'])) {
	echo $_GET['n2'];
}

// Se os dois existir, entao escreve a soma
if (isset($_GET['n1']) and isset($_GET['n2'])) {
	echo $_GET['n1'] + $_GET['n2'];
}