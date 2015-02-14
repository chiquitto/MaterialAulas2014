<?php





// yesterday
$diaAnterior = strtotime('today-1day');

echo date('c', $diaAnterior);