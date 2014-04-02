<?php

function imc($peso, $altura, $echo = true) {
	$imc = $peso / ($altura * $altura);

	if ($echo == true) {
		echo $imc;
	}
	else {
		return $imc;
	}
}

//imc(70, 1.9);
//imc(70, 1.9, true);

$imc = imc(70, 1.8, false);

if ($imc > 25) {
	echo 'Você esta acima do peso';
}




