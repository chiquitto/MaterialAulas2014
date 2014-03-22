<?php

/*
$i = -1;
while($i < 10) {
	$i++;

	if (($i % 2) != 0) {
		continue;
	}

	echo $i;
}
*/

$i = -1;
do {
	$i++;
	if (($i % 2) != 0) {
		continue;
	}
	echo $i;
	
} while ($i < 8);