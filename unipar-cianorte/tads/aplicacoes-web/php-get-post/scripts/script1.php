<?php

if (isset($_GET['n1'])) {
	echo 'n1=', $_GET['n1'];
}

if (isset($_GET['n2'])) {
	echo 'n2=', $_GET['n2'];
}

if (isset($_GET['n1']) and isset($_GET['n2'])) {
	echo 'soma=', $_GET['n1'] + $_GET['n2'];
}