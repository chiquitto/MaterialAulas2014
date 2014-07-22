<?php

/*
Criar um array no PHP com os mesmos dados do XML do exercício anterior. Por fim, gerar uma saída JSON com os dados do array criado.
*/

$carros = array('Corsa', 'Palio', '206');

echo json_encode($carros);