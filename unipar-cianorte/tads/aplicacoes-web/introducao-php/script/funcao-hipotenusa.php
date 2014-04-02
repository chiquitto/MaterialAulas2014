<?php

function hipotenusa($b, $c) {
	$b2 = $b * $b;
	$c2 = $c * $c;
	$a2 = $b2 + $c2;
	$a = sqrt($a2);
	echo $a;
}

hipotenusa(10,10);