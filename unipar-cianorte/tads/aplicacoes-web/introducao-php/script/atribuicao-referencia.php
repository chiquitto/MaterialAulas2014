<?php

$x = 'Valor 1';
$y = & $x;

$y = 'Valor 2';

echo $x;
// Valor 2
echo $y;
// Valor 2

?>

