<?php

$sxe = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><clientes></clientes>');

$cliente = $sxe->addChild('cliente');
$cliente->addChild('nome', 'Cliente 1');
$cliente->addChild('email', 'cliente1@gmail.com');
$cliente->addChild('fone', '1111-1111');

$cliente = $sxe->addChild('cliente');
$cliente->addAttribute('nome', 'Cliente 2');
$cliente->addAttribute('email', 'cliente2@gmail.com');
$cliente->addAttribute('fone', '2222-2222');

header('HTTP/1.0 200 OK');
header('Content-Type: text/xml;charset=utf-8');

echo $sxe->asXML();