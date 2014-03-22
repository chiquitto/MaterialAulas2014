<?php

$a = array(10 => 'a', 'b', 'c', 'd', 'e', 'f');
$a[6] = 'h';

foreach ($a as $key => $value) {
	if (($key % 2) != 0) {
		continue;
	}
	echo "O valor de $key = $value <br>";
}