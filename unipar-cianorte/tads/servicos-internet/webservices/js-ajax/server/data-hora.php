<?php

$saida = array(
  'datahora' => date('c'),
);

$saida = json_encode($saida);

header('HTTP/1.0 200 OK');
header('Content-Type: application/json;charset=utf-8');

echo $saida;

sleep(3);