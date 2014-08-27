<?php

/**
 * @example php parametros2.php 'nome=Alisson&idade=18'
 */

parse_str(trim($argv[1]), $a);

echo "Os parametros de entrada foram: ";
print_r($argv);
echo PHP_EOL;

echo "Os parametros processados são: ";
print_r($a);
echo PHP_EOL;

echo $a['nome'];
echo PHP_EOL;