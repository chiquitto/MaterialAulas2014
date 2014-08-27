<?php

/**
 * @example php valor-terminal.php
 */

echo "Digite seu nome: ";
$nome = trim(fgets(STDIN));

echo "Digite seu sobrenome: ";
$sobrenome = trim(fgets(STDIN));

echo "Seu nome completo é $nome $sobrenome";
echo PHP_EOL, PHP_EOL;